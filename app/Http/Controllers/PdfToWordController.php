<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use ZipArchive;

class PdfToWordController extends Controller
{
    /**
     * Root temp folder name for this tool.
     * Auto-created inside storage/app/
     */
    private string $toolFolder = 'pdf-to-word';

    public function index()
    {
        // Auto-create the tool folder on page load
        $this->ensureToolFolder();

        // Optional: cleanup abandoned files
        $this->cleanupOldFiles();

        return view('pages.pdf_to_word');
    }

    public function convert(Request $request)
    {
        $request->validate([
            'pdf'   => 'required|array',
            'pdf.*' => 'file|mimes:pdf|max:51200',
        ]);

        // Make sure the tool folder exists
        $this->ensureToolFolder();

        // Unique batch folder inside pdf-to-word
        $batchId = Str::random(20);
        $folder  = $this->toolFolder . '/' . $batchId;
        $absoluteFolder = storage_path('app/' . $folder);
        if (!is_dir($absoluteFolder)) {
            mkdir($absoluteFolder, 0755, true);
        }
        $downloads = [];
        $parser    = new Parser();

        foreach ($request->file('pdf') as $file) {

            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName     = Str::slug($originalName) ?: 'document';
            $docxName     = $safeName . '-' . Str::random(6) . '.docx';
            $docxPath     = storage_path('app/' . $folder . '/' . $docxName);

            // --- Extract text from PDF ---
            try {
                $pdf  = $parser->parseFile($file->getRealPath());
                $text = $pdf->getText();
            } catch (\Exception $e) {
                $text = '';
            }

            // --- Build DOCX ---
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();

            foreach (preg_split('/\r\n|\r|\n/', $text) as $line) {
                $section->addText($line, ['name' => 'Calibri', 'size' => 11]);
            }

            IOFactory::createWriter($phpWord, 'Word2007')->save($docxPath);

            $downloads[] = [
                'name'  => $docxName,
                'batch' => $batchId,
            ];
        }

        // --- ZIP if more than one file ---
        $zip = null;
        if (count($downloads) > 1) {
            $zipName = 'converted-' . Str::random(6) . '.zip';
            $zipPath = storage_path('app/' . $folder . '/' . $zipName);

            $zipArchive = new ZipArchive();
            if ($zipArchive->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                foreach ($downloads as $d) {
                    $zipArchive->addFile(
                        storage_path('app/' . $folder . '/' . $d['name']),
                        $d['name']
                    );
                }
                $zipArchive->close();
            }

            $zip = [
                'name'  => $zipName,
                'batch' => $batchId,
            ];
        }

        return back()
            ->with('downloads', $downloads)
            ->with('zip', $zip)
            ->with('success', 'Conversion complete.');
    }

    /**
     * One-shot download: send DOCX, then delete it.
     */
    public function download(string $batch, Request $request)
    {
        $filename = basename($request->query('file', ''));
        abort_unless($filename, 404);

        $path = storage_path('app/' . $this->toolFolder . '/' . $batch . '/' . $filename);
        abort_unless(is_file($path), 404);

        return response()->download($path, $filename);
    }

    /**
     * ZIP download: send zip, then wipe the whole batch folder.
     */
    public function downloadZip(string $batch, Request $request)
    {
        $filename = basename($request->query('file', ''));
        abort_unless($filename, 404);

        $dir  = storage_path('app/' . $this->toolFolder . '/' . $batch);
        $path = $dir . '/' . $filename;
        abort_unless(is_file($path), 404);

        // Delete the whole batch folder after the response finishes
        // (register a shutdown function — runs after the file is fully sent)
        $cleanupDir = $dir;
        app()->terminating(function () use ($cleanupDir) {
            if (is_dir($cleanupDir)) {
                foreach (glob($cleanupDir . '/*') as $f) {
                    @unlink($f);
                }
                @rmdir($cleanupDir);
            }
        });

        return response()
            ->download($path, $filename);
    }
    /**
     * Auto-create the tool folder if missing.
     */
    private function ensureToolFolder(): void
    {
        $path = storage_path('app/' . $this->toolFolder);

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        // Keep the folder out of git
        $gitignore = $path . '/.gitignore';
        if (!file_exists($gitignore)) {
            file_put_contents($gitignore, "*\n!.gitignore\n");
        }
    }

    /**
     * Delete batch folders older than 1 hour (fallback cleanup).
     */
    private function cleanupOldFiles(): void
    {
        $root = storage_path('app/' . $this->toolFolder);
        if (!is_dir($root)) return;

        foreach (glob($root . '/*', GLOB_ONLYDIR) as $dir) {
            if (filemtime($dir) < time() - 3600) {
                foreach (glob($dir . '/*') as $f) {
                    @unlink($f);
                }
                @rmdir($dir);
            }
        }
    }
}
