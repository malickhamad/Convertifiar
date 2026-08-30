
@extends('components.app')

@section('meta')

<title>Privacy Policy | Tool Baazar</title>

<meta name="description"
    content="Learn how Tool Baazar collects, uses, protects, and handles information when you use our online tools and services.">

<meta property="og:title" content="Privacy Policy | Tool Baazar">

<meta property="og:description"
    content="Learn how Tool Baazar handles your information and protects your privacy.">

@endsection


@section('content')

<div class="min-vh-100 bg-transparent text-white mt-5 pt-3">


    {{-- ================= HERO ================= --}}
    <section class="position-relative overflow-hidden">

        <div class="container py-5">

            <div class="text-center mx-auto">

                <div class="mb-4">

                    <span class="badge rounded-pill px-3 py-2 fw-medium
                                 bg-primary bg-opacity-10
                                 text-primary border border-primary border-opacity-25">

                        <i class="fa-solid fa-shield-halved me-2"></i>

                        PRIVACY & SECURITY

                    </span>

                </div>


                <h1 class="display-4 fw-bold mb-3">

                    Privacy
                    <span class="text-primary">Policy</span>

                </h1>


                <p class="lead text-secondary mx-auto mb-4 col-lg-8 col-10">

                    We respect your privacy. Here's a clear explanation
                    of how Tool Baazar handles information when you use
                    our website and online tools.

                </p>


                <div class="d-inline-flex align-items-center gap-2
                            rounded-pill px-3 py-2
                            bg-white bg-opacity-10
                            border border-secondary border-opacity-25">

                    <i class="fa-regular fa-calendar text-primary"></i>

                    <small class="text-white">

                        Last updated {{ date('F, Y') }}

                    </small>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= QUICK OVERVIEW ================= --}}
    <section class="pb-4">

        <div class="container">

            <div class="rounded-4 p-4
                        bg-dark
                        border border-secondary
                        border-opacity-25">

                <div class="row g-4 align-items-center">


                    <div class="col-lg-4">

                        <div class="d-flex align-items-center gap-3">

                            <div class="rounded-3 d-flex align-items-center
                                        justify-content-center
                                        bg-primary bg-opacity-10
                                        text-primary flex-shrink-0"
                                style="width:50px;height:50px;">

                                <i class="fa-solid fa-lock fs-5"></i>

                            </div>


                            <div>

                                <h6 class="fw-bold text-white mb-1">

                                    Privacy at a Glance

                                </h6>

                                <small class="text-secondary">

                                    Simple and transparent.

                                </small>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-8">

                        <div class="row g-3">


                            <div class="col-md-4">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-check text-primary mt-1"></i>

                                    <small class="text-secondary">

                                        We only collect information needed
                                        to provide our services.

                                    </small>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-check text-primary mt-1"></i>

                                    <small class="text-secondary">

                                        Uploaded files are used for their
                                        intended tool functionality.

                                    </small>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-check text-primary mt-1"></i>

                                    <small class="text-secondary">

                                        You can contact us with privacy
                                        questions or concerns.

                                    </small>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= POLICY CONTENT ================= --}}
    <section class="pb-5">

        <div class="container">

            <div class="row g-4">


                {{-- ================= SIDEBAR ================= --}}
                <div class="col-lg-3">

                    <div class="position-sticky" style="top:100px;">

                        <div class="rounded-4 p-4
                                    bg-dark
                                    border border-secondary
                                    border-opacity-25">


                            {{-- Sidebar Heading --}}
                            <div class="d-flex align-items-center gap-2 mb-3">

                                <span class="rounded-2 d-flex
                                             align-items-center
                                             justify-content-center
                                             bg-primary bg-opacity-10
                                             text-primary flex-shrink-0"
                                    style="width:32px;height:32px;">

                                    <i class="fa-solid fa-list-ul small"></i>

                                </span>


                                <span class="fw-bold text-white">

                                    ON THIS PAGE

                                </span>

                            </div>



                            {{-- Sidebar Navigation --}}
                            <nav class="nav flex-column">


                                <a href="#introduction"
                                   data-section="introduction"
                                   class="privacy-link nav-link px-0 py-2 text-primary fw-semibold">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Introduction

                                </a>



                                <a href="#information"
                                   data-section="information"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Information We Collect

                                </a>



                                <a href="#files"
                                   data-section="files"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Uploaded Files

                                </a>



                                <a href="#usage"
                                   data-section="usage"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    How We Use Information

                                </a>



                                <a href="#cookies"
                                   data-section="cookies"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Cookies

                                </a>



                                <a href="#third-party"
                                   data-section="third-party"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Third-Party Services

                                </a>



                                <a href="#security"
                                   data-section="security"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Data Security

                                </a>



                                <a href="#children"
                                   data-section="children"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Children's Privacy

                                </a>



                                <a href="#changes"
                                   data-section="changes"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Policy Changes

                                </a>



                                <a href="#contact"
                                   data-section="contact"
                                   class="privacy-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Contact Us

                                </a>


                            </nav>

                        </div>

                    </div>

                </div>



                {{-- ================= MAIN CONTENT ================= --}}
                <div class="col-lg-9">

                    <div class="rounded-4
                                bg-dark
                                border border-secondary
                                border-opacity-25">

                        <div class="p-4 p-md-5">


                            {{-- ================= 01 ================= --}}
                            <div id="introduction"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        01

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Introduction

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Welcome to Tool Baazar. We respect your
                                    privacy and are committed to protecting
                                    your personal information. This Privacy
                                    Policy explains what information may be
                                    collected when you use our website and
                                    online tools, how that information may be
                                    used, and the choices available to you.

                                </p>

                            </div>



                            {{-- ================= 02 ================= --}}
                            <div id="information"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        02

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Information We Collect

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg">

                                    We may collect limited information that
                                    you voluntarily provide when using certain
                                    features of our website, such as when you
                                    contact us.

                                </p>


                                <ul class="text-secondary lh-lg mb-0">

                                    <li class="mb-2">

                                        Your name and email address when
                                        submitted through our contact form.

                                    </li>

                                    <li class="mb-2">

                                        Information contained in messages
                                        or inquiries you send to us.

                                    </li>

                                    <li>

                                        Basic technical information required
                                        for website operation and security.

                                    </li>

                                </ul>

                            </div>



                            {{-- ================= 03 ================= --}}
                            <div id="files"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        03

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Uploaded Files

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Some Tool Baazar tools may allow you to
                                    upload files for processing. Uploaded files
                                    are used for the purpose of providing the
                                    requested tool functionality. Where
                                    applicable, files may be automatically
                                    removed after processing.

                                </p>

                            </div>



                            {{-- ================= 04 ================= --}}
                            <div id="usage"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        04

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        How We Use Information

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg">

                                    Information we receive may be used to:

                                </p>


                                <ul class="text-secondary lh-lg mb-0">

                                    <li class="mb-2">

                                        Provide and improve our online tools.

                                    </li>

                                    <li class="mb-2">

                                        Respond to questions and support
                                        requests.

                                    </li>

                                    <li class="mb-2">

                                        Maintain website security and
                                        reliability.

                                    </li>

                                    <li>

                                        Detect and prevent misuse of our
                                        services.

                                    </li>

                                </ul>

                            </div>



                            {{-- ================= 05 ================= --}}
                            <div id="cookies"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        05

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Cookies

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Tool Baazar may use cookies or similar
                                    technologies to help the website function
                                    properly, remember preferences, and
                                    understand how visitors use the website.
                                    You can control cookies through your
                                    browser settings.

                                </p>

                            </div>



                            {{-- ================= 06 ================= --}}
                            <div id="third-party"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        06

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Third-Party Services

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    We may use trusted third-party services
                                    for hosting, analytics, security,
                                    advertising, or other website
                                    functionality. These services may process
                                    information according to their own privacy
                                    policies.

                                </p>

                            </div>



                            {{-- ================= 07 ================= --}}
                            <div id="security"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        07

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Data Security

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    We take reasonable measures to protect
                                    information handled through our website.
                                    However, no method of transmission or
                                    storage over the internet can be guaranteed
                                    to be completely secure.

                                </p>

                            </div>



                            {{-- ================= 08 ================= --}}
                            <div id="children"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        08

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Children's Privacy

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Our website is not intended to knowingly
                                    collect personal information from
                                    children. If you believe that a child has
                                    provided personal information through our
                                    website, please contact us so that
                                    appropriate action can be taken.

                                </p>

                            </div>



                            {{-- ================= 09 ================= --}}
                            <div id="changes"
                                 class="privacy-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        09

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Changes to This Privacy Policy

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    We may update this Privacy Policy from
                                    time to time. Any changes will be posted
                                    on this page with an updated revision date.

                                </p>

                            </div>



                            {{-- ================= 10 CONTACT ================= --}}
                            <div id="contact"
                                 class="privacy-section">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        10

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Contact Us

                                    </h2>

                                </div>


                                <div class="rounded-4 p-4 p-md-5
                                            bg-primary bg-opacity-10
                                            border border-primary
                                            border-opacity-25">

                                    <div class="row align-items-center g-4">


                                        <div class="col-md-8">

                                            <div class="d-flex align-items-center
                                                        gap-2 mb-2">

                                                <i class="fa-solid fa-envelope text-primary"></i>

                                                <span class="text-primary fw-semibold">

                                                    HAVE A QUESTION?

                                                </span>

                                            </div>


                                            <p class="text-secondary mb-0">

                                                If you have questions about this
                                                Privacy Policy or how we handle
                                                information, feel free to
                                                contact us.

                                            </p>

                                        </div>



                                        <div class="col-md-4 text-md-end">

                                            <a href="{{ route('contact') }}"
                                               class="btn btn-primary rounded-3 px-4">

                                                <i class="fa-solid fa-paper-plane me-2"></i>

                                                Contact Us

                                            </a>

                                        </div>


                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= BOTTOM CTA ================= --}}
    <section class="pb-5">

        <div class="container">

            <div class="rounded-4 p-4 p-md-5 text-center bg-primary">

                <div class="mb-3">

                    <i class="fa-solid fa-shield-halved fs-2"></i>

                </div>


                <h2 class="fw-bold mb-2">

                    Your Privacy Matters

                </h2>


                <p class="mb-0 opacity-75">

                    We aim to keep Tool Baazar simple, useful, secure,
                    and respectful of your privacy.

                </p>

            </div>

        </div>

    </section>

</div>



@endsection

@section('scripts')

{{-- ========================================================= --}}
{{-- SIDEBAR ACTIVE SECTION --}}
{{-- ========================================================= --}}

<script>

$(document).ready(function () {

    function updateSidebar() {

        let scrollTop = $(window).scrollTop();
        let current = '';

        $('.privacy-section').each(function () {

            if (scrollTop >= $(this).offset().top - 180) {

                current = $(this).attr('id');

            }

        });


        $('.privacy-link')
            .removeClass('text-primary fw-semibold')
            .addClass('text-white');


        if (current) {

            $('.privacy-link[data-section="' + current + '"]')
                .removeClass('text-white')
                .addClass('text-primary fw-semibold');

        }

    }


    $(window).on('scroll', updateSidebar);

    updateSidebar();


    {{-- Smooth Sidebar Navigation --}}

    $('.privacy-link').on('click', function (e) {

        e.preventDefault();

        let target = $(this).attr('href');

        $('html, body').animate({

            scrollTop: $(target).offset().top - 100

        }, 400);

    });

});

</script>

@endsection
