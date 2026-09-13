<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class VideoToAudioConverterController extends Controller
{
    /**
     * Show Video to Audio Converter.
     */
    public function index()
    {
        return view('tools.video-to-audio');
    }

    /**
     * Convert uploaded video to audio.
     */
    public function convert(Request $request)
    {
        $request->validate([
            'video' => 'required|file|max:51200|mimes:mp4,mov,avi,webm,mkv,mpeg,mpg,flv,3gp',
            'format' => 'required|in:mp3,wav,m4a',
        ]);

        $format = strtolower($request->format);

        /*
        |--------------------------------------------------------------------------
        | FFmpeg executable
        |--------------------------------------------------------------------------
        */

        $ffmpeg = env('FFMPEG_BINARIES', 'ffmpeg');


        if (!file_exists($ffmpeg)) {
            return response()->json([
                'success' => false,
                'message' => 'FFmpeg was not found. Please check the FFmpeg installation path.',
            ], 500);
        }

        /*
        |--------------------------------------------------------------------------
        | Prepare folders
        |--------------------------------------------------------------------------
        */
        $inputDirectory = storage_path('app/video-temp');
        $outputDirectory = storage_path('app/public/audio');

        if (!is_dir($inputDirectory)) {
            mkdir($inputDirectory, 0755, true);
        }

        if (!is_dir($outputDirectory)) {
            mkdir($outputDirectory, 0755, true);
        }

        /*
        |--------------------------------------------------------------------------
        | Store uploaded video temporarily
        |--------------------------------------------------------------------------
        */
        $originalName = pathinfo(
            $request->file('video')->getClientOriginalName(),
            PATHINFO_FILENAME
        );

        $safeName = Str::slug($originalName) ?: 'video';

        $inputFilename = $safeName . '-' . Str::random(10) . '.' .
            $request->file('video')->getClientOriginalExtension();

        $request->file('video')->move(
            $inputDirectory,
            $inputFilename
        );

        $inputPath = $inputDirectory . DIRECTORY_SEPARATOR . $inputFilename;

        /*
        |--------------------------------------------------------------------------
        | Output filename
        |--------------------------------------------------------------------------
        */
        $outputFilename = $safeName . '-' . now()->format('YmdHis') .
            '-' . Str::random(6) . '.' . $format;

        $outputPath = $outputDirectory . DIRECTORY_SEPARATOR . $outputFilename;

        /*
        |--------------------------------------------------------------------------
        | FFmpeg command
        |--------------------------------------------------------------------------
        */
        $command = [
            $ffmpeg,
            '-y',
            '-hide_banner',
            '-loglevel',
            'error',
            '-nostdin',
            '-i',
            $inputPath,
            '-vn',
            '-map',
            '0:a:0',
        ];

        /*
        |--------------------------------------------------------------------------
        | Audio format settings
        |--------------------------------------------------------------------------
        */
        if ($format === 'mp3') {

            $command = array_merge($command, [
                '-c:a',
                'libmp3lame',
                '-b:a',
                '192k',
                '-ar',
                '44100',
                '-ac',
                '2',
                '-id3v2_version',
                '3',
                $outputPath,
            ]);
        } elseif ($format === 'wav') {

            $command = array_merge($command, [
                '-c:a',
                'pcm_s16le',
                '-ar',
                '44100',
                '-ac',
                '2',
                $outputPath,
            ]);
        } elseif ($format === 'm4a') {

            $command = array_merge($command, [
                '-c:a',
                'aac',
                '-b:a',
                '192k',
                '-ar',
                '44100',
                '-ac',
                '2',
                '-movflags',
                '+faststart',
                $outputPath,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Run FFmpeg
        |--------------------------------------------------------------------------
        */
        try {

            $process = new Process($command);

            $process->setTimeout(600);
            $process->setIdleTimeout(600);

            $process->run();

            /*
            |--------------------------------------------------------------------------
            | Check conversion result
            |--------------------------------------------------------------------------
            */
            if (!$process->isSuccessful() || !file_exists($outputPath)) {

                $error = trim($process->getErrorOutput());

                if (empty($error)) {
                    $error = trim($process->getOutput());
                }

                logger()->error('FFmpeg conversion failed', [
                    'error' => $error,
                    'command' => $command,
                ]);

                if (file_exists($inputPath)) {
                    @unlink($inputPath);
                }

                if (file_exists($outputPath)) {
                    @unlink($outputPath);
                }

                return response()->json([
                    'success' => false,
                    'message' => 'FFmpeg conversion failed.',
                    'error' => $error,
                ], 500);
            }

            /*
            |--------------------------------------------------------------------------
            | Remove temporary input video
            |--------------------------------------------------------------------------
            */
            if (file_exists($inputPath)) {
                @unlink($inputPath);
            }

            /*
            |--------------------------------------------------------------------------
            | Return download URL
            |--------------------------------------------------------------------------
            */
            return response()->json([
                'success' => true,
                'message' => 'Video converted successfully.',
                'download' => route(
                    'video.to.audio.download',
                    ['filename' => $outputFilename]
                ),
                'filename' => $outputFilename,
                'format' => $format,
            ]);
        } catch (\Throwable $e) {

            if (file_exists($inputPath)) {
                @unlink($inputPath);
            }

            if (file_exists($outputPath)) {
                @unlink($outputPath);
            }

            logger()->error('Video to Audio Exception', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unable to convert the video.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Download converted audio.
     */
    public function download($filename)
    {
        $filename = basename($filename);

        $path = storage_path('app/public/audio/' . $filename);

        if (!file_exists($path)) {
            return response()->json([
                'success' => false,
                'message' => 'Audio file not found.'
            ], 404);
        }

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $mimeTypes = [
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/wav',
            'm4a' => 'audio/mp4',
        ];

        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';

        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate',
            'Pragma' => 'no-cache',
        ])->deleteFileAfterSend(true);
    }
}
