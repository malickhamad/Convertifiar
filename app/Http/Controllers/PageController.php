<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function termsAndConditions()
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
    public function imageConverter()
{
    return view('pages.image_converter');
}
public function backgroundRemover()
{
    return view('pages.background_remover');
}

public function contactStore(Request $request)
{
    // dd($request->all());
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'subject' => 'required|string|max:200',
        'message' => 'required|string|max:5000',
    ]);

    Mail::raw(
        "Name: {$request->name}\n" .
        "Email: {$request->email}\n\n" .
        "Message:\n{$request->message}",
        function ($mail) use ($request) {

            $mail->to('adrashumair01@gmail.com')
                 ->subject($request->subject)
                 ->replyTo($request->email, $request->name);
        }
    );

    return back()->with(
        'success',
        'Thank you for contacting us. Your message has been sent successfully.'
    );
}


}
