<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            abort_unless(Auth::user()->is_admin, 403);

            return redirect()->route('admin.blogs.index');
        }

        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            abort_unless(Auth::user()->is_admin, 403);

            return redirect()->route('admin.blogs.index');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials + ['is_admin' => true])) {
            throw ValidationException::withMessages([
                'email' => 'Login details are incorrect.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.blogs.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
