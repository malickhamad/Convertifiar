<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\PdfToWordController;
use App\Http\Controllers\WordToPdfController;
use App\Http\Controllers\VideoToAudioConverterController;
use App\Http\Controllers\Admin\AdminLoginController;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');

Route::get('/terms-and-conditions', [PageController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])
    ->name('sitemap');

// routes for tools
Route::get('/image-cropper', [PageController::class, 'imageCropper'])->name('image.cropper');

Route::get('/image-compressor', [PageController::class, 'imageCompressor'])->name('image.compressor');


Route::get('/image-resizer', [PageController::class, 'imageResizer'])->name('image.resizer');

Route::get('/image-converter', [PageController::class, 'imageConverter'])->name('image.converter');

Route::get('/background-remover', [PageController::class, 'backgroundRemover'])->name('image.background_remover');


Route::get('/admin/login', [AdminLoginController::class, 'create'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'store'])
    ->middleware('throttle:admin-login')
    ->name('admin.login.store');

Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');

Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', AdminBlogController::class);
});



Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');

Route::get('/image-to-jpg', [PageController::class, 'imageToJpg'])->name('image.to.jpg');

Route::get('/video-to-audio', [PageController::class, 'videoToAudio'])->name('video.to.audio');

Route::get('/image-rotator', [PageController::class, 'imageRotator'])
    ->name('image.rotator');
Route::get('/pdf-editor', [PageController::class, 'pdfEditor'])
    ->name('pdf.editor');
// PDF to Word Tool
Route::get('/pdf-to-word', [PdfToWordController::class, 'index'])
    ->name('pdf.to.word');

Route::post('/pdf-to-word/convert', [PdfToWordController::class, 'convert'])
    ->name('pdf.word.convert');

// One-shot download (deletes file after sending)
Route::get('/pdf-to-word/download/{batch}', [PdfToWordController::class, 'download'])
    ->name('pdf.word.download');

// ZIP download (deletes whole batch after sending)
Route::get('/pdf-to-word/download-zip/{batch}', [PdfToWordController::class, 'downloadZip'])
    ->name('pdf.word.downloadZip');

Route::post('/video-to-audio/convert', [VideoToAudioConverterController::class, 'convert'])
    ->name('video.to.audio.convert');

Route::get('/video-to-audio/download/{filename}', [
    VideoToAudioConverterController::class,
    'download'
])->name('video.to.audio.download');


Route::prefix('word-to-pdf')->name('word.pdf.')->group(function () {
    Route::get('/', [WordToPdfController::class, 'index'])->name('index');
    Route::post('/convert', [WordToPdfController::class, 'convert'])->name('convert');
    Route::get('/download/{batch}', [WordToPdfController::class, 'download'])->name('download');
    Route::get('/download-zip/{batch}', [WordToPdfController::class, 'downloadZip'])->name('downloadZip');
});


Route::get('/watermark-remover', [PageController::class, 'watermarkRemover'])->name('watermark.remover');

Route::get('/metadata-remover', [PageController::class, 'metadataRemover'])->name('metadata.remover');