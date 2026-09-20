<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use ZipArchive;

class WordToPdfController extends Controller
{
    /**
     * Allowed Word file extensions.
     */
    protected array $allowedExtensions = ['doc', 'docx'];

    /**
     * Maximum file size in KB (50 MB).
     */
    protected int $maxFileSize = 51200;

    /**
     * How long (in minutes) converted files stay on disk.
     */
    protected int $fileLifetime = 60;

    /* =============================================================
     |  Public Actions
     ============================================================= */

    /**
     * Show the Word → PDF upload page.
     * Bootstraps the storage folder so it always exists.
     */
    public function index()
    {
        $this->ensureStorageReady();

        return view('pages.word_to_pdf'); // adjust to your blade path if needed
    }

    /**
     * Handle the conversion request.
     */
    public function convert(Request $request)
    {
        // ---------------------------------------------------------
        // 1. Validate uploaded files
        // ---------------------------------------------------------
        $request->validate([
            'word'   => 'required|array|min:1',
            'word.*' => [
                'required',
                'file',
                'max:' . $this->maxFileSize,
                function ($attribute, $value, $fail) {
                    $ext = strtolower($value->getClientOriginalExtension());
                    if (!in_array($ext, $this->allowedExtensions, true)) {
                        $fail('The file must be a DOC or DOCX file.');
                    }
                },
            ],
        ]);

        // ---------------------------------------------------------
        // 2. Ensure storage folder exists
        // ---------------------------------------------------------
        $basePath = storage_path('app/conversions');

        if (!File::isDirectory($basePath)) {
            File::makeDirectory($basePath, 0755, true, true);
        }

        if (!File::isDirectory($basePath)) {
            return back()->withErrors([
                'word' => 'Storage folder could not be created. Check permissions on storage/app.',
            ]);
        }

        // ---------------------------------------------------------
        // 3. Prepare batch folders
        // ---------------------------------------------------------
        $batchId   = (string) Str::uuid();
        $batchPath = "{$basePath}/{$batchId}";
        $inputDir  = "{$batchPath}/input";
        $outputDir = "{$batchPath}/output";

        File::makeDirectory($inputDir, 0755, true, true);
        File::makeDirectory($outputDir, 0755, true, true);

        if (!File::isDirectory($inputDir) || !File::isDirectory($outputDir)) {
            return back()->withErrors([
                'word' => 'Could not prepare conversion folders. Check write permissions.',
            ]);
        }

        // ---------------------------------------------------------
        // 4. Move uploaded files into input folder
        // ---------------------------------------------------------
        foreach ($request->file('word') as $file) {
            $safeName = $this->sanitizeFilename($file->getClientOriginalName());
            $file->move($inputDir, $safeName);
        }

        // ---------------------------------------------------------
        // 5. Configure PHPWord PDF renderer (Dompdf)
        // ---------------------------------------------------------
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));

        // ---------------------------------------------------------
        // 6. Convert each Word file to PDF
        // ---------------------------------------------------------
        $convertedFiles = [];

        foreach (File::files($inputDir) as $fileInfo) {
            $inputFile = $fileInfo->getPathname();
            $baseName  = $fileInfo->getFilenameWithoutExtension();
            $pdfName   = $baseName . '.pdf';
            $pdfPath   = "{$outputDir}/{$pdfName}";

            try {
                $phpWord   = IOFactory::load($inputFile);
                $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
                $pdfWriter->save($pdfPath);

                if (File::exists($pdfPath) && File::size($pdfPath) > 0) {
                    $convertedFiles[] = $pdfName;
                }
            } catch (\Throwable $e) {
                \Log::error('PHPWord conversion failed', [
                    'file'  => $inputFile,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
            }
        }

        // ---------------------------------------------------------
        // 7. Handle zero conversions
        // ---------------------------------------------------------
        if (empty($convertedFiles)) {
            File::deleteDirectory($batchPath);

            return back()->withErrors([
                'word' => 'Conversion failed. Please make sure your Word files are valid DOCX files.',
            ]);
        }

        // ---------------------------------------------------------
        // 8. Build downloads payload for the session
        // ---------------------------------------------------------
        $downloads = array_map(function ($name) use ($batchId) {
            return [
                'name'  => $name,
                'batch' => $batchId,
            ];
        }, $convertedFiles);

        // ---------------------------------------------------------
        // 9. Create ZIP if more than one file
        // ---------------------------------------------------------
        $zipData = null;

        if (count($convertedFiles) > 1) {
            $zipName = 'word-to-pdf-' . now()->format('Ymd-His') . '.zip';
            $zipPath = "{$batchPath}/{$zipName}";

            if ($this->createZip($outputDir, $convertedFiles, $zipPath)) {
                $zipData = [
                    'batch' => $batchId,
                    'name'  => $zipName,
                ];
            }
        }

        // ---------------------------------------------------------
        // 10. Schedule cleanup (delete after $fileLifetime minutes)
        // ---------------------------------------------------------
        $this->scheduleCleanup($batchPath);

        // ---------------------------------------------------------
        // 11. Return with session data
        // ---------------------------------------------------------
        return back()->with([
            'downloads' => $downloads,
            'zip'       => $zipData,
        ]);
    }

    /**
     * Download a single PDF file.
     */
    public function download(Request $request, string $batch)
    {
        $file = basename($request->query('file', ''));

        if ($file === '') {
            abort(400, 'Missing file parameter.');
        }

        $path = storage_path("app/conversions/{$batch}/output/{$file}");

        if (!File::exists($path)) {
            abort(404, 'File not found or already deleted.');
        }

        return response()->download($path, $file);
    }

    /**
     * Download all converted PDFs as a ZIP.
     */
    public function downloadZip(Request $request, string $batch)
    {
        $file = basename($request->query('file', ''));

        if ($file === '') {
            abort(400, 'Missing file parameter.');
        }

        $path = storage_path("app/conversions/{$batch}/{$file}");

        if (!File::exists($path)) {
            abort(404, 'ZIP not found or already deleted.');
        }

        return response()->download($path, $file);
    }

    /* =============================================================
     |  Helpers
     ============================================================= */

    /**
     * Make sure the conversions directory and cleanup registry exist.
     */
    protected function ensureStorageReady(): void
    {
        $basePath = storage_path('app/conversions');

        if (!File::isDirectory($basePath)) {
            File::makeDirectory($basePath, 0755, true, true);
        }

        $registry = "{$basePath}/cleanup.json";

        if (!File::exists($registry)) {
            File::put($registry, json_encode([], JSON_PRETTY_PRINT));
        }
    }

    /**
     * Create a ZIP archive from converted PDFs.
     */
    protected function createZip(string $sourceDir, array $files, string $zipPath): bool
    {
        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return false;
        }

        foreach ($files as $fileName) {
            $fullPath = "{$sourceDir}/{$fileName}";

            if (File::exists($fullPath)) {
                $zip->addFile($fullPath, $fileName);
            }
        }

        return $zip->close();
    }

    /**
     * Register batch folder for scheduled deletion.
     */
    protected function scheduleCleanup(string $batchPath): void
    {
        $this->ensureStorageReady();

        $registryFile = storage_path('app/conversions/cleanup.json');

        $entries = File::exists($registryFile)
            ? (json_decode(File::get($registryFile), true) ?: [])
            : [];

        $entries[] = [
            'path'      => $batchPath,
            'delete_at' => now()->addMinutes($this->fileLifetime)->timestamp,
        ];

        File::put($registryFile, json_encode($entries, JSON_PRETTY_PRINT));
    }

    /**
     * Remove unsafe characters from a filename.
     */
    protected function sanitizeFilename(string $name): string
    {
        // Strip directory components
        $name = basename($name);

        // Replace anything that isn't alphanumeric, dash, underscore, dot, or space
        $name = preg_replace('/[^A-Za-z0-9._\- ]/', '_', $name);

        // Collapse multiple spaces/underscores into one underscore
        $name = preg_replace('/[\s_]+/', '_', $name);

        return trim($name, '._-') ?: 'file';
    }
}