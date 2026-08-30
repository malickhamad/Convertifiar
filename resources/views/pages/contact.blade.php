@extends('components.app')

@section('meta')
    <title>Contact Us | Tool Baazar</title>

    <meta name="description"
        content="Contact Tool Baazar for questions, suggestions, feedback, or support. We are here to help you get the most from our online tools.">

    <meta property="og:title" content="Contact Us | Tool Baazar">
    <meta property="og:description" content="Get in touch with Tool Baazar for questions, feedback, suggestions, or support.">
@endsection

@section('content')
    <style>
        .form-control:focus {
            border-color: #fff !important;
            box-shadow: none;
        }
    </style>
    <div class="min-vh-100 bg-dark text-white">

        {{-- Hero Section --}}
        <section class="py-5 position-relative overflow-hidden">

            <div class="position-absolute top-0 start-50 translate-middle"
                style="width: 500px; height: 300px;
                   background: rgba(13, 110, 253, .20);
                   filter: blur(100px);
                   border-radius: 50%;">
            </div>

            <div class="container position-relative py-5">

                <div class="text-center mx-auto" style="max-width: 750px;">

                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background: rgba(13,110,253,.15);
                           color: #6ea8fe;
                           border: 1px solid rgba(13,110,253,.25);">
                        GET IN TOUCH
                    </span>

                    <h1 class="display-4 fw-bold mb-3">
                        We'd Love to
                        <span class="text-primary">Hear From You</span>
                    </h1>

                    <p class="lead text-secondary mb-0">
                        Have a question, suggestion, or need help?
                        Send us a message and we'll be happy to hear from you.
                    </p>

                </div>

            </div>

        </section>


        {{-- Contact Section --}}
        <section class="pb-5">

            <div class="container">

                <div class="row g-4 align-items-stretch">

                    {{-- Contact Information --}}
                    <div class="col-lg-5">

                        <div class="h-100 p-4 p-lg-5 rounded-4 border border-secondary-subtle"
                            style="background: linear-gradient(145deg, #111827, #0b1220);">

                            <h2 class="fw-bold mb-3">
                                Let's Talk
                            </h2>

                            <p class="text-secondary mb-4">
                                Whether you have feedback about one of our tools,
                                want to report an issue, or simply want to say hello,
                                feel free to contact us.
                            </p>


                            {{-- Email --}}
                            <div class="d-flex align-items-start gap-3 mb-4">

                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width:48px;height:48px;
                                       background:rgba(13,110,253,.15);
                                       color:#6ea8fe;">

                                    <i class="fa-solid fa-envelope"></i>

                                </div>

                                <div>

                                    <small class="text-secondary d-block">
                                        Email
                                    </small>

                                    <span class="fw-semibold">
                                        info@convertifire.com
                                    </span>

                                </div>

                            </div>


                            {{-- Support --}}
                            <div class="d-flex align-items-start gap-3 mb-4">

                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width:48px;height:48px;
                                       background:rgba(13,110,253,.15);
                                       color:#6ea8fe;">

                                    <i class="fa-solid fa-headset"></i>

                                </div>

                                <div>

                                    <small class="text-secondary d-block">
                                        Support
                                    </small>

                                    <span class="fw-semibold">
                                        We're here to help
                                    </span>

                                </div>

                            </div>


                            {{-- Response --}}
                            <div class="d-flex align-items-start gap-3 mb-4">

                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width:48px;height:48px;
                                       background:rgba(13,110,253,.15);
                                       color:#6ea8fe;">

                                    <i class="fa-solid fa-clock"></i>

                                </div>

                                <div>

                                    <small class="text-secondary d-block">
                                        Response Time
                                    </small>

                                    <span class="fw-semibold">
                                        Usually within 24–48 hours
                                    </span>

                                </div>

                            </div>


                            {{-- Bottom Note --}}
                            <div class="mt-5 p-3 rounded-3"
                                style="background:rgba(13,110,253,.08);
                                   border:1px solid rgba(13,110,253,.15);">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-circle-info text-primary mt-1"></i>

                                    <small class="text-secondary">
                                        Please provide as much information as possible
                                        so we can assist you quickly.
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Contact Form --}}
                    <div class="col-lg-7">

                        <div class="h-100 p-4 p-lg-5 rounded-4 border border-secondary-subtle" style="background:#111827;">

                            <h2 class="fw-bold mb-2">
                                Send Us a Message
                            </h2>

                            <p class="text-secondary mb-4">
                                Fill out the form below and we'll get back to you.
                            </p>


                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Message Sent!',
                                        text: "{{ session('success') }}",
                                        background: '#111827',
                                        color: '#fff',
                                        confirmButtonColor: '#0d6efd',
                                        timer: 4000
                                    });
                                </script>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" id="contactForm">

                                @csrf

                                <div class="row g-3">

                                    {{-- Name --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            Your Name
                                        </label>

                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-lg bg-black text-white border-secondary"
                                            placeholder="Enter your name" required>

                                        @error('name')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>


                                    {{-- Email --}}
                                    <div class="col-md-6">

                                        <label class="form-label">
                                            Email Address
                                        </label>

                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg bg-black text-white border-secondary"
                                            placeholder="you@example.com" required>

                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>


                                    {{-- Subject --}}
                                    <div class="col-12">

                                        <label class="form-label">
                                            Subject
                                        </label>

                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                            class="form-control form-control-lg bg-black text-white border-secondary"
                                            placeholder="How can we help?" required>

                                        @error('subject')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>


                                    {{-- Message --}}
                                    <div class="col-12">

                                        <label class="form-label">
                                            Message
                                        </label>

                                        <textarea name="message" rows="6" class="form-control bg-black text-white border-secondary"
                                            placeholder="Write your message here..." required>{{ old('message') }}</textarea>

                                        @error('message')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>


                                    {{-- Submit --}}
                                    <div class="col-12 mt-3">



                                        <button type="submit"
                                            class="btn btn-primary btn-lg rounded-3 fw-semibold px-4 mx-auto d-block">
                                            <i class="fa-solid fa-paper-plane me-2"></i>
                                            Send Message
                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- Bottom CTA --}}
        <section class="py-5">

            <div class="container">

                <div class="rounded-4 p-4 p-md-5 text-center position-relative overflow-hidden"
                    style="background:linear-gradient(135deg,#0d6efd,#084298);">

                    <div class="position-relative">

                        <h2 class="fw-bold mb-2">
                            Have an idea for a new tool?
                        </h2>

                        <p class="mb-0 opacity-75">
                            We'd love to hear your suggestions and feedback.
                        </p>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('scripts')
    <SCRipt>
        $('#contactForm').on('submit', function() {
            $(this).find('button[type="submit"]')
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-2"></span> Sending...');
        });
    </SCRipt>
@endsection
