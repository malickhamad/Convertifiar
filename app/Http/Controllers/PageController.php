<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy-policy');
    }

    public function terms()
    {
        return view('pages.terms-and-conditions');
    }
    public function sitemap()
    {
        return response()
            ->view('pages.sitemap')
            ->header('Content-Type', 'application/xml');
    }
    public function imageCropper()
    {
        return view('pages.image_cropper');
    }
    public function imageCompressor()
{
    return view('pages.image_compressor');
}
    public function imageResizer()
{
    return view('pages.image_resizer');
}
    public function imageToJpg()
{
    return view('pages.image_to_jpg');
}
public function backgroundRemover()
{
    return view('pages.background_remover');
}
}
