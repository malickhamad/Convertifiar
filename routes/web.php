<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', AdminBlogController::class);
});



Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');
