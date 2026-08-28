<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
    
    Route::get('/image-to-jpg', [PageController::class, 'imageToJpg'])->name('image.to.jpg');

    Route::get('/background-remover', [PageController::class, 'backgroundRemover'])->name('image.background_remover');