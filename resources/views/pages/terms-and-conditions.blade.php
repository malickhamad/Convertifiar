
@extends('components.app')

@section('meta')

<title>Terms & Conditions | Tool Baazar</title>

<meta name="description"
    content="Read the Terms & Conditions of Tool Baazar to understand the rules and conditions for using our online tools and services.">

<meta property="og:title" content="Terms & Conditions | Tool Baazar">

<meta property="og:description"
    content="Review the terms and conditions that apply when using Tool Baazar online tools and services.">

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

                        <i class="fa-solid fa-file-contract me-2"></i>

                        TERMS & CONDITIONS

                    </span>

                </div>


                <h1 class="display-4 fw-bold mb-3">

                    Terms &
                    <span class="text-primary">Conditions</span>

                </h1>


                <p class="lead text-secondary mx-auto mx-auto mb-4 col-lg-6 col-10">

                    Please read these terms carefully before using
                    Tool Baazar and its online tools and services.

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

                                <i class="fa-solid fa-scale-balanced fs-5"></i>

                            </div>


                            <div>

                                <h6 class="fw-bold text-white mb-1">

                                    Terms at a Glance

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

                                        Use our tools responsibly and
                                        for lawful purposes.

                                    </small>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-check text-primary mt-1"></i>

                                    <small class="text-secondary">

                                        Tool results may vary depending
                                        on the files and inputs provided.

                                    </small>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <div class="d-flex gap-2">

                                    <i class="fa-solid fa-check text-primary mt-1"></i>

                                    <small class="text-secondary">

                                        By using Tool Baazar, you agree
                                        to these terms.

                                    </small>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= TERMS CONTENT ================= --}}
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
                                   class="terms-link nav-link px-0 py-2 text-primary fw-semibold">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Introduction

                                </a>



                                <a href="#acceptance"
                                   data-section="acceptance"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Acceptance of Terms

                                </a>



                                <a href="#use"
                                   data-section="use"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Use of Our Services

                                </a>



                                <a href="#tools"
                                   data-section="tools"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Online Tools

                                </a>



                                <a href="#uploads"
                                   data-section="uploads"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Uploaded Content

                                </a>



                                <a href="#prohibited"
                                   data-section="prohibited"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Prohibited Activities

                                </a>



                                <a href="#intellectual"
                                   data-section="intellectual"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Intellectual Property

                                </a>



                                <a href="#availability"
                                   data-section="availability"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Service Availability

                                </a>



                                <a href="#disclaimer"
                                   data-section="disclaimer"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Disclaimer

                                </a>



                                <a href="#liability"
                                   data-section="liability"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Limitation of Liability

                                </a>



                                <a href="#changes"
                                   data-section="changes"
                                   class="terms-link nav-link px-0 py-2 text-white">

                                    <i class="fa-solid fa-angle-right me-2 small"></i>

                                    Changes to Terms

                                </a>



                                <a href="#contact"
                                   data-section="contact"
                                   class="terms-link nav-link px-0 py-2 text-white">

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
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        01

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Introduction

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Welcome to Tool Baazar. These Terms &
                                    Conditions govern your access to and use
                                    of our website, online tools, and related
                                    services. By accessing or using Tool Baazar,
                                    you agree to comply with these terms.

                                </p>

                            </div>



                            {{-- ================= 02 ================= --}}
                            <div id="acceptance"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        02

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Acceptance of Terms

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    By accessing or using Tool Baazar, you
                                    acknowledge that you have read, understood,
                                    and agreed to these Terms & Conditions. If
                                    you do not agree with any part of these
                                    terms, please do not use our services.

                                </p>

                            </div>



                            {{-- ================= 03 ================= --}}
                            <div id="use"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        03

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Use of Our Services

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg">

                                    You agree to use Tool Baazar only for
                                    lawful and appropriate purposes. You are
                                    responsible for ensuring that your use of
                                    our services complies with applicable laws
                                    and regulations.

                                </p>


                                <ul class="text-secondary lh-lg mb-0">

                                    <li class="mb-2">

                                        Use the website only for legitimate
                                        purposes.

                                    </li>

                                    <li class="mb-2">

                                        Do not attempt to interfere with the
                                        operation or security of the website.

                                    </li>

                                    <li>

                                        Do not misuse or abuse our online tools.

                                    </li>

                                </ul>

                            </div>



                            {{-- ================= 04 ================= --}}
                            <div id="tools"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        04

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Online Tools

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Tool Baazar provides various online tools
                                    designed to perform specific tasks.
                                    Results may depend on the files, data,
                                    settings, or inputs provided by the user.
                                    We do not guarantee that every tool will
                                    produce perfectly accurate results in every
                                    situation.

                                </p>

                            </div>



                            {{-- ================= 05 ================= --}}
                            <div id="uploads"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        05

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Uploaded Content

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Some Tool Baazar tools may allow you to
                                    upload files for processing. You are
                                    responsible for ensuring that you have the
                                    necessary rights and permissions to upload
                                    and process such content.

                                </p>

                            </div>



                            {{-- ================= 06 ================= --}}
                            <div id="prohibited"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        06

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Prohibited Activities

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg">

                                    When using Tool Baazar, you must not:

                                </p>


                                <ul class="text-secondary lh-lg mb-0">

                                    <li class="mb-2">

                                        Attempt to gain unauthorized access
                                        to our systems.

                                    </li>

                                    <li class="mb-2">

                                        Introduce malicious code or harmful
                                        software.

                                    </li>

                                    <li class="mb-2">

                                        Use our services to violate applicable
                                        laws or regulations.

                                    </li>

                                    <li>

                                        Interfere with the normal operation
                                        of the website.

                                    </li>

                                </ul>

                            </div>



                            {{-- ================= 07 ================= --}}
                            <div id="intellectual"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        07

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Intellectual Property

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    The Tool Baazar website, branding, design,
                                    text, graphics, logos, and other original
                                    content are protected by applicable
                                    intellectual property laws. You may not
                                    reproduce, modify, distribute, or use our
                                    content without appropriate permission.

                                </p>

                            </div>



                            {{-- ================= 08 ================= --}}
                            <div id="availability"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        08

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Service Availability

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    We aim to keep Tool Baazar available and
                                    reliable, but we do not guarantee that the
                                    website or any individual tool will always
                                    be available, uninterrupted, or free from
                                    errors. Services may occasionally be
                                    modified, updated, suspended, or
                                    discontinued.

                                </p>

                            </div>



                            {{-- ================= 09 ================= --}}
                            <div id="disclaimer"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        09

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Disclaimer

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    Tool Baazar provides its website and tools
                                    on an "as available" basis. While we make
                                    reasonable efforts to provide useful and
                                    reliable services, we make no guarantee
                                    that the tools will meet every user's
                                    specific requirements or that results will
                                    always be accurate or complete.

                                </p>

                            </div>



                            {{-- ================= 10 ================= --}}
                            <div id="liability"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        10

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Limitation of Liability

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    To the extent permitted by applicable law,
                                    Tool Baazar shall not be responsible for
                                    indirect, incidental, or consequential
                                    losses arising from your use of the
                                    website, online tools, or services.

                                </p>

                            </div>



                            {{-- ================= 11 ================= --}}
                            <div id="changes"
                                 class="terms-section mb-5">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        11

                                    </span>

                                    <h2 class="h3 fw-bold text-white mb-0">

                                        Changes to These Terms

                                    </h2>

                                </div>


                                <p class="text-secondary lh-lg mb-0">

                                    We may update these Terms & Conditions from
                                    time to time. Changes will be posted on
                                    this page along with an updated revision
                                    date. Your continued use of Tool Baazar
                                    after changes are posted means that you
                                    accept the updated terms.

                                </p>

                            </div>



                            {{-- ================= 12 CONTACT ================= --}}
                            <div id="contact"
                                 class="terms-section">

                                <div class="d-flex align-items-center gap-3 mb-3">

                                    <span class="text-primary fw-bold">

                                        12

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

                                                If you have any questions about
                                                these Terms & Conditions or our
                                                services, feel free to contact
                                                us.

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

                    <i class="fa-solid fa-scale-balanced fs-2"></i>

                </div>


                <h2 class="fw-bold mb-2">

                    Use Tool Baazar Responsibly

                </h2>


                <p class="mb-0 opacity-75">

                    We aim to provide simple, useful, and reliable online
                    tools while keeping our services safe and accessible.

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

        $('.terms-section').each(function () {

            if (scrollTop >= $(this).offset().top - 180) {

                current = $(this).attr('id');

            }

        });


        $('.terms-link')
            .removeClass('text-primary fw-semibold')
            .addClass('text-white');


        if (current) {

            $('.terms-link[data-section="' + current + '"]')
                .removeClass('text-white')
                .addClass('text-primary fw-semibold');

        }

    }


    $(window).on('scroll', updateSidebar);

    updateSidebar();


    // Smooth sidebar navigation

    $('.terms-link').on('click', function (e) {

        e.preventDefault();

        let target = $(this).attr('href');

        $('html, body').animate({

            scrollTop: $(target).offset().top - 100

        }, 400);

    });

});

</script>

@endsection