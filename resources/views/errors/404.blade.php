@extends('components.app')

@section('meta')

<title>404 - Page Not Found | Tool Baazar</title>

<meta name="description" content="The page you are looking for could not be found or may have been moved.">
@endsection

@section('content')

<style>
    .error-code {
        font-size: clamp(100px, 18vw, 190px);
        line-height: .85;
        font-weight: 900;
        letter-spacing: -8px;

        background: linear-gradient(
            135deg,
            #2563eb 0%,
            #06b6d4 45%,
            #8b5cf6 100%
        );

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;

        filter: drop-shadow(0 10px 30px rgba(37, 99, 235, .25));
    }

    .error-icon {
        width: 100px;
        height: 100px;

        background: linear-gradient(
            135deg,
            rgba(37, 99, 235, .15),
            rgba(139, 92, 246, .15)
        );

        border: 1px solid rgba(96, 165, 250, .25);
        box-shadow: 0 15px 40px rgba(0, 0, 0, .25);
    }

    .error-title {
        background: linear-gradient(
            90deg,
            #ffffff,
            #93c5fd,
            #c4b5fd
        );

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .error-card {
        background: rgba(255, 255, 255, .02);
        border: 1px solid rgba(255, 255, 255, .07);
        border-radius: 24px;
    }
</style>

<div class="container mt-5 py-5">

<div class="row mt-3 justify-content-center align-items-center min-vh-100">

    <div class="col-lg-8 col-md-10 text-center">

        {{-- Icon --}}
        <div class="d-flex justify-content-center mb-4">

            <div class="error-icon rounded-circle d-flex align-items-center justify-content-center">

                <i class="fas fa-compass text-info" style="font-size: 42px;"></i>

            </div>

        </div>

        {{-- 404 --}}
        <div class="error-code mb-4">
            404
        </div>

        {{-- Title --}}
        <h1 class="error-title fw-bold display-5 mb-3">
            Page Not Found
        </h1>

        {{-- Description --}}
        <p class="text-secondary fs-5 mx-auto mb-4"
           style="max-width: 620px;">

            The page you're looking for doesn't exist, may have been moved,
            or is temporarily unavailable.

        </p>

        {{-- Buttons --}}
        <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">

            <a href="{{ route('home') }}"
               class="btn btn-primary btn-lg px-4 rounded-pill shadow">

                <i class="fas fa-home me-2"></i>
                Back to Home

            </a>

            <a href="javascript:history.back()"
               class="btn btn-outline-light btn-lg px-4 rounded-pill">

                <i class="fas fa-arrow-left me-2"></i>
                Go Back

            </a>

        </div>

        {{-- Helpful Links --}}
        <div class="error-card p-4 mx-auto"
             style="max-width: 650px;">

            <p class="text-white fw-semibold mb-3">
                Explore Tool Baazar
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-2">

                <a href="{{ route('home') }}"
                   class="btn btn-sm btn-outline-primary rounded-pill px-3">

                    <i class="fas fa-home me-1"></i>
                    Home

                </a>

                <a href="{{ route('contact') }}"
                   class="btn btn-sm btn-outline-info rounded-pill px-3">

                    <i class="fas fa-envelope me-1"></i>
                    Contact

                </a>

                <a href="{{ route('blog.index') }}"
                   class="btn btn-sm btn-outline-light rounded-pill px-3">

                    <i class="fas fa-blog me-1"></i>
                    Blog

                </a>

            </div>

        </div>

        <p class="text-secondary small mt-4 mb-0">
            Tool Baazar — Simple tools. Better results.
        </p>

    </div>

</div>

</div>

@endsection
