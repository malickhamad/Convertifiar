@extends('app')

@section('meta')
    <title>Image cropper</title>
    <meta name="description"
        content="Main Image cropper Description" />

    <meta property="og:title" content="Image cropper">
    <meta property="og:description"
        content="Main Image cropper Description">

    <meta property="twitter:title" content="Image cropper">
    <meta property="twitter:description"
        content="Main Image cropper Description">
@endsection

@section('content')
    <main class="crop-page">

        <!-- Breadcrumb -->
        <section class="crop-breadcrumb-section">
            <div class="container">
                <div class="crop-breadcrumb">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>

                    <span>
                        <i class="fas fa-chevron-right"></i>
                    </span>

                    <span>Image Crop</span>
                </div>
            </div>
        </section>


        <!-- Hero / Upload Section -->
        <section class="crop-hero-section">

            <div class="container">

                <div class="crop-heading">

                    <span class="crop-small-badge">
                        <i class="fas fa-crop-alt"></i>
                        Image Tool
                    </span>

                    <h1>
                        Crop Your Images<br>
                        <span>With Precision.</span>
                    </h1>

                    <p>
                        Easily crop your images to the perfect size,
                        aspect ratio, and composition. Fast, simple,
                        and completely online.
                    </p>

                </div>


                <!-- Upload Box -->
                <div class="crop-upload-box">

                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>

                    <h3>Upload your image</h3>

                    <p class="crop-upload-text">
                        Drag & drop your image here or
                    </p>

                    <label for="cropImageInput" class="crop-upload-btn">
                        <i class="fas fa-upload"></i>
                        Choose File
                    </label>

                    <input type="file" id="cropImageInput" accept="image/jpeg,image/png,image/webp,image/gif" hidden>

                    <p class="crop-upload-info">
                        Supports JPG, PNG, WebP, GIF
                        <span>|</span>
                        Max size: 50MB
                    </p>

                </div>

            </div>

        </section>


        <!-- Crop Information Section -->
        <section class="crop-info-section">

            <div class="container">

                <div class="crop-info-card">

                    <!-- Left Content -->
                    <div class="crop-info-content">

                        <span class="crop-info-badge">
                            ABOUT
                        </span>

                        <h2>
                            Crop Images<br>
                            <span>with Precision</span>
                        </h2>

                        <p class="crop-info-description">
                            Easily crop your images to any custom size
                            or choose from popular aspect ratios. Remove
                            unwanted areas and focus on what matters most
                            in just a few clicks.
                        </p>


                        <!-- Feature 01 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-blue">
                                <i class="fas fa-crop-alt"></i>
                            </div>

                            <div>
                                <h4>Custom Dimensions</h4>
                                <p>
                                    Crop to any width and height you need.
                                </p>
                            </div>

                        </div>


                        <!-- Feature 02 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-purple">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </div>

                            <div>
                                <h4>Aspect Ratios</h4>
                                <p>
                                    Choose from popular preset ratios.
                                </p>
                            </div>

                        </div>


                        <!-- Feature 03 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-green">
                                <i class="fas fa-crosshairs"></i>
                            </div>

                            <div>
                                <h4>Focus & Composition</h4>
                                <p>
                                    Keep the important part of your image
                                    perfectly framed.
                                </p>
                            </div>

                        </div>

                    </div>


                    <!-- Right Image Preview -->
                    <div class="crop-preview-wrapper">

                        <div class="crop-preview-card">

                            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="Image Crop Preview" class="crop-preview-image">

                            <!-- Crop Overlay -->
                            <div class="crop-overlay">

                                <div class="crop-grid-line horizontal-one"></div>
                                <div class="crop-grid-line horizontal-two"></div>

                                <div class="crop-grid-line vertical-one"></div>
                                <div class="crop-grid-line vertical-two"></div>

                                <!-- Corners -->
                                <span class="crop-handle top-left"></span>
                                <span class="crop-handle top-right"></span>
                                <span class="crop-handle bottom-left"></span>
                                <span class="crop-handle bottom-right"></span>

                                <!-- Side Handles -->
                                <span class="crop-handle side-top"></span>
                                <span class="crop-handle side-bottom"></span>
                                <span class="crop-handle side-left"></span>
                                <span class="crop-handle side-right"></span>

                            </div>

                        </div>


                        <!-- Aspect Ratio Panel -->
                        <div class="crop-ratio-panel">

                            <span class="crop-ratio-title">
                                Aspect Ratio
                            </span>

                            <div class="crop-ratio-buttons">

                                <button class="crop-ratio-btn active">
                                    Free
                                </button>

                                <button class="crop-ratio-btn">
                                    1:1
                                </button>

                                <button class="crop-ratio-btn">
                                    4:3
                                </button>

                                <button class="crop-ratio-btn">
                                    16:9
                                </button>

                                <button class="crop-ratio-btn">
                                    9:16
                                </button>

                                <button class="crop-ratio-btn">
                                    3:4
                                </button>

                            </div>

                        </div>
                        <div class="crop-action-buttons">

                            <button type="button" id="cropRotateLeft">
                                <i class="fas fa-undo"></i>
                                Rotate Left
                            </button>

                            <button type="button" id="cropRotateRight">
                                <i class="fas fa-redo"></i>
                                Rotate Right
                            </button>

                            <button type="button" id="cropReset">
                                <i class="fas fa-sync-alt"></i>
                                Reset
                            </button>

                            <button type="button" id="cropDownload" class="crop-download-btn">
                                <i class="fas fa-download"></i>
                                Download
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- Small Bottom Benefits -->
        <section class="crop-benefits-section">

            <div class="container">

                <div class="crop-benefits-heading">

                    <span>
                        WHY USE PIXELFLOW
                    </span>

                    <h2>
                        Simple. Fast. <strong>Precise.</strong>
                    </h2>

                    <p>
                        Everything you need to crop your images without
                        complicated software.
                    </p>

                </div>


                <div class="row g-4">

                    <!-- Benefit -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">
                                <i class="fas fa-bolt"></i>
                            </div>

                            <div>
                                <h4>Fast Processing</h4>
                                <p>
                                    Crop images quickly without installing
                                    any software.
                                </p>
                            </div>

                        </div>

                    </div>


                    <!-- Benefit -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>

                            <div>
                                <h4>Flexible Cropping</h4>
                                <p>
                                    Use custom dimensions or predefined
                                    aspect ratios.
                                </p>
                            </div>

                        </div>

                    </div>


                    <!-- Benefit -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>

                            <div>
                                <h4>Secure & Private</h4>
                                <p>
                                    Your images remain protected while
                                    using our online image tools.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

@endsection

@section('scripts')

    <script>
        // Initialize AOS Animations
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // =========================================
        // Dynamic Navbar Scroll Logic
        // =========================================
        window.addEventListener('scroll', function () {
            var navbar = document.getElementById('morphNavbar');
            if (window.scrollY > 50) {
                // Adds the pill shape and blue glow
                navbar.classList.add('scrolled');
            } else {
                // Returns to the separated layout
                navbar.classList.remove('scrolled');
            }
        });

        // =========================================
        // Mobile Menu Toggle
        // =========================================
        var mobileToggleBtn = document.getElementById('mobileToggleBtn');
        var navLinksWrapper = document.getElementById('navLinksWrapper');

        mobileToggleBtn.addEventListener('click', function () {
            navLinksWrapper.classList.toggle('mobile-open');
            var icon = mobileToggleBtn.querySelector('i');
            if (navLinksWrapper.classList.contains('mobile-open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // =========================================
        // Dropdown Logic (Tools / API Docs)
        // - Desktop (>=992px): hover handled purely by CSS
        // - Mobile (<992px): click/tap toggles accordion
        // =========================================
        var dropdowns = document.querySelectorAll('.nav-item-dropdown');

        dropdowns.forEach(function (dropdown) {
            var trigger = dropdown.querySelector('.dropdown-trigger');

            trigger.addEventListener('click', function (e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    // Close other open dropdowns (accordion behavior)
                    dropdowns.forEach(function (other) {
                        if (other !== dropdown) other.classList.remove('open');
                    });
                    dropdown.classList.toggle('open');
                }
            });
        });

        // Close mobile menu / dropdowns on resize to desktop
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 992) {
                navLinksWrapper.classList.remove('mobile-open');
                mobileToggleBtn.querySelector('i').classList.remove('fa-times');
                mobileToggleBtn.querySelector('i').classList.add('fa-bars');
                dropdowns.forEach(function (d) { d.classList.remove('open'); });
            }
        });
    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =========================================
               ELEMENTS
            ========================================= */

            const imageInput = document.getElementById('cropImageInput');
            const previewImage = document.querySelector('.crop-preview-image');

            const ratioButtons = document.querySelectorAll('.crop-ratio-btn');

            const downloadButton = document.getElementById('cropDownload');
            const rotateLeftButton = document.getElementById('cropRotateLeft');
            const rotateRightButton = document.getElementById('cropRotateRight');
            const resetButton = document.getElementById('cropReset');

            let cropper = null;
            let originalImage = previewImage ? previewImage.src : null;


            /* =========================================
               INITIAL CROP OPTIONS
            ========================================= */

            const cropOptions = {
                aspectRatio: NaN,
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                responsive: true,
                restore: true,
                checkCrossOrigin: false,
                background: false,
                movable: true,
                zoomable: true,
                rotatable: true,
                scalable: true,
                guides: true,
                center: true,
                highlight: true
            };


            /* =========================================
               INITIALIZE CROPPER
            ========================================= */

            function initializeCropper() {

                if (!previewImage) {
                    return;
                }

                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }

                cropper = new Cropper(
                    previewImage,
                    cropOptions
                );
            }


            /* =========================================
               INITIAL PREVIEW
            ========================================= */

            if (previewImage && previewImage.complete) {

                initializeCropper();

            } else if (previewImage) {

                previewImage.addEventListener(
                    'load',
                    initializeCropper,
                    { once: true }
                );

            }


            /* =========================================
               IMAGE UPLOAD
            ========================================= */

            if (imageInput) {

                imageInput.addEventListener('change', function (event) {

                    const file = event.target.files[0];

                    if (!file) {
                        return;
                    }


                    /* Validate file type */

                    const allowedTypes = [
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/gif'
                    ];

                    if (!allowedTypes.includes(file.type)) {

                        alert(
                            'Please select a JPG, PNG, WebP or GIF image.'
                        );

                        imageInput.value = '';

                        return;
                    }


                    /* Validate file size */

                    const maxSize = 50 * 1024 * 1024;

                    if (file.size > maxSize) {

                        alert(
                            'Image size must be less than 50MB.'
                        );

                        imageInput.value = '';

                        return;
                    }


                    /* Create preview URL */

                    const imageURL = URL.createObjectURL(file);

                    originalImage = imageURL;


                    /* Replace preview */

                    if (previewImage) {

                        previewImage.src = imageURL;

                        previewImage.onload = function () {

                            initializeCropper();

                        };

                    }
                    /* =========================================
   SCROLL TO CROP SECTION AFTER UPLOAD
========================================= */

                    const cropInfoSection = document.querySelector('.crop-info-section');

                    if (cropInfoSection) {

                        setTimeout(function () {

                            cropInfoSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });

                        }, 300);

                    }

                });

            }


            /* =========================================
               ASPECT RATIO BUTTONS
            ========================================= */

            ratioButtons.forEach(function (button) {

                button.addEventListener('click', function () {

                    /* Remove active */

                    ratioButtons.forEach(function (btn) {

                        btn.classList.remove('active');

                    });


                    /* Add active */

                    this.classList.add('active');


                    /* Get ratio */

                    const ratio = this.textContent.trim();


                    if (!cropper) {
                        return;
                    }


                    /* Free crop */

                    if (ratio === 'Free') {

                        cropper.setAspectRatio(NaN);

                        return;
                    }


                    /* 1:1 */

                    if (ratio === '1:1') {

                        cropper.setAspectRatio(1);

                        return;
                    }


                    /* 4:3 */

                    if (ratio === '4:3') {

                        cropper.setAspectRatio(4 / 3);

                        return;
                    }


                    /* 16:9 */

                    if (ratio === '16:9') {

                        cropper.setAspectRatio(16 / 9);

                        return;
                    }


                    /* 9:16 */

                    if (ratio === '9:16') {

                        cropper.setAspectRatio(9 / 16);

                        return;
                    }


                    /* 3:4 */

                    if (ratio === '3:4') {

                        cropper.setAspectRatio(3 / 4);

                        return;
                    }

                });

            });


            /* =========================================
               ROTATE LEFT
            ========================================= */

            if (rotateLeftButton) {

                rotateLeftButton.addEventListener('click', function () {

                    if (!cropper) {
                        return;
                    }

                    cropper.rotate(-90);

                });

            }


            /* =========================================
               ROTATE RIGHT
            ========================================= */

            if (rotateRightButton) {

                rotateRightButton.addEventListener('click', function () {

                    if (!cropper) {
                        return;
                    }

                    cropper.rotate(90);

                });

            }


            /* =========================================
               RESET
            ========================================= */

            if (resetButton) {

                resetButton.addEventListener('click', function () {

                    if (!cropper) {
                        return;
                    }

                    cropper.reset();

                });

            }


            /* =========================================
               DOWNLOAD CROPPED IMAGE
            ========================================= */

            if (downloadButton) {

                downloadButton.addEventListener('click', function () {

                    if (!cropper) {

                        alert(
                            'Please upload an image first.'
                        );

                        return;
                    }


                    const canvas = cropper.getCroppedCanvas({

                        imageSmoothingEnabled: true,

                        imageSmoothingQuality: 'high'

                    });


                    if (!canvas) {

                        alert(
                            'Unable to crop this image.'
                        );

                        return;
                    }


                    /* Convert canvas to JPG */

                    canvas.toBlob(
                        function (blob) {

                            if (!blob) {
                                return;
                            }


                            const downloadURL =
                                URL.createObjectURL(blob);


                            const link =
                                document.createElement('a');


                            link.href = downloadURL;

                            link.download =
                                'pixelflow-cropped-image.jpg';


                            document.body.appendChild(link);

                            link.click();

                            document.body.removeChild(link);


                            setTimeout(function () {

                                URL.revokeObjectURL(
                                    downloadURL
                                );

                            }, 1000);

                        },

                        'image/jpeg',

                        0.95

                    );

                });

            }

        });

    </script>

@endsection