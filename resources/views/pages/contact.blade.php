@extends('components.app')

@section('meta')
    <title>Contact Us | Tool Baazar</title>

    <meta name="description"
        content="Contact Tool Baazar for questions, suggestions, feedback, or support. We are here to help you get the most from our online tools.">

    <meta property="og:title" content="Contact Us | Tool Baazar">
    <meta property="og:description" content="Get in touch with Tool Baazar for questions, feedback, suggestions, or support.">
@endsection

@section('content')

    <!-- ========================================= -->
    <!-- HERO SECTION -->
    <!-- ========================================= -->
    <section class="contact-hero">
        <div class="contact-hero-glow"></div>

        <div class="container position-relative">
            <div class="contact-hero-content text-center mx-auto">

                <span class="tag-badge" data-aos="fade-down">
                    <i class="fas fa-comments me-2"></i> Get In Touch
                </span>

                <h1 class="contact-hero-title" data-aos="fade-up" data-aos-delay="100">
                    We'd Love to <span>Hear From You</span>
                </h1>

                <p class="contact-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Have a question, suggestion, or need help? Send us a message
                    and our team will be happy to hear from you.
                </p>

            </div>
        </div>
    </section>


    <!-- ========================================= -->
    <!-- CONTACT SECTION -->
    <!-- ========================================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                <!-- ===== Contact Information ===== -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-card h-100">

                        <h2 class="contact-card-title">Let's Talk</h2>

                        <p class="contact-card-desc">
                            Whether you have feedback about one of our tools,
                            want to report an issue, or simply want to say hello,
                            feel free to reach out.
                        </p>

                        <!-- Email -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <small class="contact-info-label">Email</small>
                                <span class="contact-info-value">info@xconvertifire.com</span>
                            </div>
                        </div>

                        <!-- Support -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div>
                                <small class="contact-info-label">Support</small>
                                <span class="contact-info-value">We're here to help</span>
                            </div>
                        </div>

                        <!-- Response -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <small class="contact-info-label">Response Time</small>
                                <span class="contact-info-value">Usually within 24–48 hours</span>
                            </div>
                        </div>

                        <!-- Bottom Note -->
                        <div class="contact-note">
                            <i class="fas fa-circle-info"></i>
                            <small>
                                Please provide as much information as possible
                                so we can assist you quickly.
                            </small>
                        </div>

                    </div>
                </div>


                <!-- ===== Contact Form ===== -->
                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
                    <div class="contact-form-card h-100">

                        <h2 class="contact-card-title mb-2">Send Us a Message</h2>
                        <p class="contact-card-desc mb-4">
                            Fill out the form below and we'll get back to you shortly.
                        </p>

                        @if (session('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Message Sent!',
                                    text: "{{ session('success') }}",
                                    background: '#111827',
                                    color: '#fff',
                                    confirmButtonColor: '#3b82f6',
                                    timer: 4000
                                });
                            </script>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                            @csrf

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="contact-label">Your Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="contact-input" placeholder="Enter your name" required>
                                    @error('name')
                                        <small class="contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="contact-label">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="contact-input" placeholder="you@example.com" required>
                                    @error('email')
                                        <small class="contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Subject -->
                                <div class="col-12">
                                    <label class="contact-label">Subject</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}"
                                        class="contact-input" placeholder="How can we help?" required>
                                    @error('subject')
                                        <small class="contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label class="contact-label">Message</label>
                                    <textarea name="message" rows="6" class="contact-input"
                                        placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <small class="contact-error">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="col-12 mt-2">
                                    <button type="submit" class="contact-submit-btn">
                                        <i class="fas fa-paper-plane me-2"></i>
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


    <!-- ========================================= -->
    <!-- BOTTOM CTA -->
    <!-- ========================================= -->
    <section class="contact-cta-section">
        <div class="container">
            <div class="contact-cta-box" data-aos="fade-up">

                <div class="contact-cta-glow"></div>

                <div class="contact-cta-content">
                    <h2 class="contact-cta-title">
                        Have an idea for a new tool?
                    </h2>
                    <p class="contact-cta-subtitle">
                        We'd love to hear your suggestions and feedback.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- ========================================= -->
    <!-- PAGE STYLES -->
    <!-- ========================================= -->
    <style>
        /* ===== HERO ===== */
        .contact-hero {
            position: relative;
            padding: 200px 0 80px;
            overflow: hidden;
        }

        .contact-hero-glow {
            position: absolute;
            top: -80px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 400px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.18), transparent 70%);
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }

        .contact-hero-content {
            position: relative;
            z-index: 2;
            max-width: 750px;
        }

        .contact-hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin: 0 0 22px;
    background: linear-gradient(to right, #ffffff, #71717a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact-hero-title span {
    background: linear-gradient(90deg, #ffffff, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact-hero-subtitle {
            font-size: 1.15rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 600px;
            margin: 0 auto;
        }


        /* ===== SECTION WRAPPER ===== */
        .contact-section {
            padding: 20px 0 90px;
        }


        /* ===== CARD TITLES ===== */
        .contact-card-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
            margin: 0;
        }

        .contact-card-desc {
            color: var(--text-muted);
            font-size: 0.92rem;
            line-height: 1.7;
            margin: 0 0 30px;
        }


        /* ===== INFO CARD ===== */
        .contact-info-card {
            position: relative;
            overflow: hidden;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 42px 38px;
            transition: background-color 0.3s ease;
        }

        .contact-info-card::before {
            content: "";
            position: absolute;
            top: -180px;
            right: -120px;
            width: 320px;
            height: 320px;
            background: rgba(59, 130, 246, 0.08);
            filter: blur(70px);
            pointer-events: none;
        }

        .contact-info-item {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 26px;
        }

        .contact-info-item:last-of-type {
            margin-bottom: 0;
        }

        .contact-info-icon {
            flex: 0 0 48px;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            color: #60a5fa;
            background: rgba(59, 130, 246, 0.12);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .contact-info-label {
            display: block;
            color: var(--text-soft);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .contact-info-value {
            color: var(--text-main);
            font-size: 0.95rem;
            font-weight: 600;
        }

        .contact-note {
            position: relative;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-top: 36px;
            padding: 16px 18px;
            border-radius: 14px;
            background: rgba(59, 130, 246, 0.07);
            border: 1px solid rgba(59, 130, 246, 0.15);
        }

        .contact-note i {
            color: #60a5fa;
            font-size: 0.95rem;
            margin-top: 2px;
        }

        .contact-note small {
            color: var(--text-muted);
            font-size: 0.82rem;
            line-height: 1.6;
        }


        /* ===== FORM CARD ===== */
        .contact-form-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 42px 38px;
            transition: background-color 0.3s ease;
        }

        .contact-label {
            display: block;
            color: var(--text-muted);
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .contact-input {
            width: 100%;
            padding: 14px 18px;
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            transition: all 0.25s ease;
            outline: none;
        }

        .contact-input::placeholder {
            color: var(--text-soft);
            opacity: 0.7;
        }

        .contact-input:focus {
            border-color: rgba(59, 130, 246, 0.55);
            background: var(--card-bg-alt);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        textarea.contact-input {
            resize: vertical;
            min-height: 130px;
        }

        .contact-error {
            display: block;
            margin-top: 6px;
            color: #f87171;
            font-size: 0.78rem;
        }


        /* ===== SUBMIT BUTTON ===== */
        .contact-submit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 34px;
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 50px;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .contact-submit-btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(37, 99, 235, 0.3);
        }

        .contact-submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }


        /* ===== BOTTOM CTA ===== */
        .contact-cta-section {
            padding: 20px 0 100px;
        }

        .contact-cta-box {
            position: relative;
            overflow: hidden;
            padding: 55px 40px;
            border-radius: 24px;
            text-align: center;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
        }

        .contact-cta-glow {
            position: absolute;
            top: -60%;
            left: 50%;
            transform: translateX(-50%);
            width: 500px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.25), transparent 70%);
            filter: blur(60px);
            pointer-events: none;
        }

        .contact-cta-content {
            position: relative;
            z-index: 2;
        }

        .contact-cta-title {
            font-size: 1.9rem;
            font-weight: 800;
            color: #fff;
            margin: 0 0 10px;
            letter-spacing: -0.5px;
        }

        .contact-cta-subtitle {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
            margin: 0;
        }


        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .contact-hero {
                padding: 180px 0 60px;
            }

            .contact-hero-title {
                font-size: 3rem;
            }

            .contact-info-card,
            .contact-form-card {
                padding: 34px 28px;
            }
        }

        @media (max-width: 767px) {
            .contact-hero {
                padding: 160px 0 40px;
            }

            .contact-hero-title {
                font-size: 2.4rem;
                letter-spacing: -1px;
            }

            .contact-hero-subtitle {
                font-size: 1rem;
            }

            .contact-card-title {
                font-size: 1.5rem;
            }

            .contact-info-card,
            .contact-form-card {
                padding: 28px 22px;
                border-radius: 20px;
            }

            .contact-cta-box {
                padding: 40px 24px;
                border-radius: 20px;
            }

            .contact-cta-title {
                font-size: 1.5rem;
            }

            .contact-submit-btn {
                width: 100%;
            }
        }
    </style>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function() {
                $(this).find('button[type="submit"]')
                    .prop('disabled', true)
                    .html('<span class="spinner-border spinner-border-sm me-2"></span> Sending...');
            });
        });
    </script>
@endsection
