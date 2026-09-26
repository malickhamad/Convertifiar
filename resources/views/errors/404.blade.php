@extends('components.app')

@section('meta')

<title>404 - Page Not Found | Tool Baazar</title>

<meta name="description" content="The page you are looking for could not be found or may have been moved.">
@endsection

@section('content')

{{-- Lottie Player Script --}}
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<style>
    /* Lottie animation sizing */
    .error-lottie {
        width: 100%;
        max-width: 380px;
        height: auto;
        margin: 0 auto;
    }

    @media (min-width: 992px) {
        .error-lottie {
            max-width: 460px;
        }
    }

    .error-code {
        font-size: clamp(60px, 12vw, 110px);
        line-height: .85;
        font-weight: 900;
        letter-spacing: -4px;

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

        opacity: 0;
        animation: fadeScaleIn 0.9s cubic-bezier(.2, .8, .2, 1) 0.2s forwards;
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

        opacity: 0;
        animation: fadeUp 0.8s ease-out 0.5s forwards;
    }

    .error-desc {
        opacity: 0;
        animation: fadeUp 0.8s ease-out 0.7s forwards;
    }

    .error-buttons {
        opacity: 0;
        animation: fadeUp 0.8s ease-out 0.9s forwards;
    }

    .error-card {
        background: rgba(255, 255, 255, .02);
        border: 1px solid rgba(255, 255, 255, .07);
        border-radius: 24px;

        opacity: 0;
        animation: fadeUp 0.8s ease-out 1.1s forwards;
    }

    .error-footer {
        opacity: 0;
        animation: fadeIn 0.8s ease-out 1.4s forwards;
    }

    /* ===== Floating playful particles ===== */
    .error-particles {
        position: fixed;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
        z-index: 0;
    }

    .error-particles span {
        position: absolute;
        display: block;
        font-size: 22px;
        opacity: 0;
        animation: floatUp linear infinite;
        filter: drop-shadow(0 0 10px rgba(96, 165, 250, .35));
    }

    .error-particles span:nth-child(1)  { left: 6%;  font-size: 20px; animation-duration: 14s; animation-delay: 0s;   }
    .error-particles span:nth-child(2)  { left: 18%; font-size: 14px; animation-duration: 18s; animation-delay: 2s;   }
    .error-particles span:nth-child(3)  { left: 30%; font-size: 26px; animation-duration: 16s; animation-delay: 4s;   }
    .error-particles span:nth-child(4)  { left: 42%; font-size: 16px; animation-duration: 20s; animation-delay: 1s;   }
    .error-particles span:nth-child(5)  { left: 55%; font-size: 22px; animation-duration: 15s; animation-delay: 3s;   }
    .error-particles span:nth-child(6)  { left: 68%; font-size: 18px; animation-duration: 19s; animation-delay: 5s;   }
    .error-particles span:nth-child(7)  { left: 80%; font-size: 24px; animation-duration: 17s; animation-delay: 2.5s; }
    .error-particles span:nth-child(8)  { left: 92%; font-size: 14px; animation-duration: 21s; animation-delay: 4.5s; }
    .error-particles span:nth-child(9)  { left: 12%; font-size: 18px; animation-duration: 22s; animation-delay: 6s;   }
    .error-particles span:nth-child(10) { left: 74%; font-size: 20px; animation-duration: 16s; animation-delay: 7s;   }

    /* Keyframes */
    @keyframes fadeScaleIn {
        0%   { opacity: 0; transform: scale(0.7) translateY(30px); }
        60%  { opacity: 1; transform: scale(1.05) translateY(-5px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    @keyframes fadeUp {
        0%   { opacity: 0; transform: translateY(25px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
        0%   { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes floatUp {
        0% {
            transform: translateY(20vh) rotate(0deg) scale(0.7);
            opacity: 0;
        }
        15% {
            opacity: 0.7;
        }
        50% {
            transform: translateY(-40vh) rotate(180deg) scale(1);
            opacity: 0.9;
        }
        85% {
            opacity: 0.5;
        }
        100% {
            transform: translateY(-110vh) rotate(360deg) scale(0.7);
            opacity: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

{{-- Floating playful particles (background) --}}


<div class="container mt-5 py-5 position-relative" style="z-index: 1;">

<div class="row mt-3 justify-content-center align-items-center min-vh-100">

    <div class="col-lg-8 col-md-10 text-center">

        {{-- Lottie Animation --}}
        <lottie-player
            src="https://assets9.lottiefiles.com/packages/lf20_u1xuufn3.json"
            background="transparent"
            speed="1"
            loop
            autoplay
            class="error-lottie mb-3">
        </lottie-player>

      
      {{-- Title --}}
        <h1 class="error-title fw-bold display-5 mb-3">
            Page Not Found
        </h1>

        {{-- Description --}}
        <p class="error-desc text-secondary mx-auto mb-4"
           style="max-width: 620px;">

            The page you're looking for doesn't exist, may have been moved,
            or is temporarily unavailable.

        </p>

        {{-- Buttons --}}
        <div class="error-buttons d-flex flex-wrap justify-content-center gap-3 mb-5">

            <a href="{{ route('home') }}"
               class="btn btn-primary btn-lg px-4 rounded-pill shadow">

                <i class="fas fa-home me-2"></i>
                Back to Home

            </a>

        </div>


    </div>

</div>

</div>

<script>
    // Auto-redirect to home page after 10 seconds
    // setTimeout(function () {
    //     window.location.href = "{{ route('home') }}";
    // }, 10000);
</script>

@endsection