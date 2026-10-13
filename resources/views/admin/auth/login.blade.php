@extends('components.app')

@section('meta')
    <title>Admin Login | X Convertifire</title>
@endsection

@section('robots', 'noindex, nofollow')

@section('content')
    <style>
        .admin-login-page {
            padding-top: clamp(7.5rem, 18vh, 10rem);
            padding-bottom: 3rem;
        }
    </style>

    <main class="container admin-login-page">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <h1 class="mb-4">Admin Login</h1>

                <form method="POST" action="{{ route('admin.login.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    @error('email')
                        <p class="text-danger" role="alert">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </main>
@endsection
