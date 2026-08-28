@extends('components.app')

@section('meta')
    <title>Home</title>
    <meta name="description" content="Main Description" />

    <meta property="og:title" content="Home">
    <meta property="og:description" content="Main Description">

    <meta property="twitter:title" content="Home">
    <meta property="twitter:description" content="Main Description">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">

        <!-- Background Video -->
        <video class="hero-bg-video" autoplay loop muted playsinline>
            <source src="https://myaio.com/wp-content/uploads/2026/07/My-AIO-Demo-Video-For-Website-Full-video.mp4"
                type="video/mp4">
        </video>

        <!-- Dark Overlay over Video -->
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-8"> <!-- Column to keep content on the left side -->

                    <div data-aos="fade-right" data-aos-duration="1000">
                        <span class="tag-badge"><i class="fas fa-magic text-light me-2"></i> Free Online Toolkit</span>
                    </div>

                    <h2 class="hero-title" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
                        Every tool you could want to edit images in bulk
                    </h2>

                    <p class="hero-subtitle" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                        Your online photo editor is here and forever free! Compress, resize, convert, and edit your visual
                        assets safely with bank-level security.
                    </p>

                    <!-- Filters (Left Aligned) -->
                    <div class="filter-pills" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                        <button class="pill active">All</button>
                        <button class="pill">Optimize</button>
                        <button class="pill">Create</button>
                        <button class="pill">Edit</button>
                        <button class="pill">Convert</button>
                        <button class="pill">Security</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Tools Grid Section (Exact 12 Cards) -->
    <section class="container tools-grid mt-5">
        <div class="row g-4">

            <!-- Tool 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                <a target="_blank" href="{{ route('image.compressor') }}" class="text-decoration-none">
                    <div class="tool-card  anim-border">
                        <div class="icon-box bg-green"><i class="fas fa-compress-arrows-alt"></i></div>
                        <h5>Compress IMAGE</h5>
                        <p>Compress JPG, PNG, SVG, and GIFs while saving space and maintaining quality.</p>
                    </div>
                </a>
            </div>
            <!-- Tool 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <a target="_blank" href="{{ route('image.resizer') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-blue"><i class="fas fa-expand-arrows-alt"></i></div>
                        <h5>Resize IMAGE</h5>
                        <p>Define your dimensions, by percent or pixel, and resize your JPG, PNG, SVG, and GIF images.</p>
                    </div>
                </a>
            </div>

            <!-- Tool 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                <a target="_blank" href="{{ route('image.cropper') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-cyan"><i class="fas fa-crop-alt"></i></div>
                        <h5>Crop IMAGE</h5>
                        <p>Crop JPG, PNG, or GIFs with ease; Choose pixels to define your rectangle or use our visual
                            editor.
                        </p>
                    </div>
                </a>

            </div>

            <!-- Tool 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <a target="_blank" href="{{ route('image.to.jpg') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-yellow"><i class="fas fa-file-export"></i></div>
                        <h5>Convert to JPG</h5>
                        <p>Turn PNG, GIF, TIF, PSD, SVG, WEBP, HEIC, or RAW format images to JPG in bulk with ease.</p>
                    </div>
                </a>

            </div>

            <!-- Tool 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                <div class="tool-card anim-border">
                    <div class="icon-box bg-yellow"><i class="fas fa-file-import"></i></div>
                    <h5>Convert from JPG</h5>
                    <p>Turn JPG images to PNG and GIF. Choose several JPGs to create an animated GIF in seconds!</p>
                </div>
            </div>

            <!-- Tool 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <div class="tool-card anim-border">
                    <div class="icon-box bg-purple"><i class="fas fa-paint-brush"></i></div>
                    <h5>Photo editor</h5>
                    <p>Spice up your pictures with text, effects, frames or stickers. Simple editing tools for your image
                        needs.</p>
                </div>
            </div>

            <!-- Tool 7 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <div class="tool-card anim-border">
                    <span class="badge-new">New!</span>
                    <div class="icon-box bg-green"><i class="fas fa-search-plus"></i></div>
                    <h5>Upscale Image</h5>
                    <p>Enlarge your images with high resolution. Easily increase the size of your JPG and PNG images.</p>
                </div>
            </div>

            <!-- Tool 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <div class="tool-card anim-border">
                    <span class="badge-new">New!</span>
                    <div class="icon-box bg-red"><i class="fas fa-eraser"></i></div>
                    <h5>Remove background</h5>
                    <p>Quickly remove image backgrounds with high accuracy. Instantly detect objects and cut out
                        backgrounds.</p>
                </div>
            </div>

            <!-- Tool 9 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="450">
                <div class="tool-card anim-border">
                    <div class="icon-box bg-blue"><i class="fas fa-stamp"></i></div>
                    <h5>Watermark IMAGE</h5>
                    <p>Stamp an image or text over your images in seconds. Choose the typography, transparency and position.
                    </p>
                </div>
            </div>

            <!-- Tool 10 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                <div class="tool-card anim-border">
                    <div class="icon-box bg-purple"><i class="far fa-laugh-squint"></i></div>
                    <h5>Meme generator</h5>
                    <p>Create your memes online with ease. Caption meme images or upload your pictures to make custom memes.
                    </p>
                </div>
            </div>

            <!-- Tool 11 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="550">
                <div class="tool-card anim-border">
                    <div class="icon-box bg-cyan"><i class="fas fa-sync-alt"></i></div>
                    <h5>Rotate IMAGE</h5>
                    <p>Rotate many images JPG, PNG or GIF at same time. Choose to rotate only landscape or portrait images!
                    </p>
                </div>
            </div>

            <!-- Tool 12 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="600">
                <div class="tool-card anim-border">
                    <span class="badge-new">New!</span>
                    <div class="icon-box bg-blue"><i class="fas fa-user-secret"></i></div>
                    <h5>Blur face</h5>
                    <p>Easily blur out faces in photos. You can also blur licence plates and other objects to hide private
                        info.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Advanced Bento Grid Section -->
    <section class="container py-5 mt-5 mb-5">
        <div class="row g-4">
            <!-- Left Large Box with Embedded Video -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="grid-box h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-dark border border-secondary mb-3">For Developers</span>
                        <h3>Powerful Image API Engine</h3>
                        <p>Integrate our fast processing engine directly into your app. Resize, crop, and convert images
                            automatically using our REST API.</p>
                    </div>
                    <!-- 3rd Video Placement inside Bento Box -->
                    <video class="bento-video" autoplay loop muted playsinline>
                        <source
                            src="https://myaio.com/wp-content/uploads/2026/07/My-AIO-Demo-Video-For-Website-Full-video.mp4"
                            type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- Right Small Boxes -->
            <div class="col-lg-6">
                <div class="row g-4 h-100">
                    <div class="col-12 h-50" data-aos="fade-up" data-aos-delay="100">
                        <div class="grid-box h-100 d-flex flex-column justify-content-center"
                            style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), var(--card-bg);">
                            <i class="fas fa-cloud-upload-alt fa-3x text-light mb-3"></i>
                            <h3>Batch Processing</h3>
                            <p>Drag and drop up to 100 images at once. Apply the same edits, watermarks, or conversions
                                across your entire gallery in one click.</p>
                        </div>
                    </div>
                    <div class="col-12 h-50" data-aos="fade-up" data-aos-delay="200">
                        <div class="grid-box h-100 d-flex flex-column justify-content-center">
                            <i class="fas fa-mobile-alt fa-3x text-light mb-3"></i>
                            <h3>Works on Any Device</h3>
                            <p>No software installation required. Access your full image editing suite directly from your
                                mobile, tablet, or desktop browser seamlessly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies Marquee -->
    <section class="py-5 text-center mt-3 border-top border-dark">
        <div data-aos="fade-up">
            <span class="tag-badge">Trusted Infrastructure</span>
            <h2 class="fw-bold mt-2 mb-5">Powered by industry-leading<br>cloud technology.</h2>
        </div>

        <div class="marquee-container" data-aos="fade-up" data-aos-delay="100">
            <div class="marquee-content">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg"
                    alt="AWS">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Microsoft_Azure_Logo.svg" alt="Azure">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Apple_logo_black.svg" alt="Apple">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg"
                    alt="AWS">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Microsoft_Azure_Logo.svg" alt="Azure">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud">
            </div>
        </div>
    </section>
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
        window.addEventListener('scroll', function() {
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

        mobileToggleBtn.addEventListener('click', function() {
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

        dropdowns.forEach(function(dropdown) {
            var trigger = dropdown.querySelector('.dropdown-trigger');

            trigger.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    // Close other open dropdowns (accordion behavior)
                    dropdowns.forEach(function(other) {
                        if (other !== dropdown) other.classList.remove('open');
                    });
                    dropdown.classList.toggle('open');
                }
            });
        });

        // Close mobile menu / dropdowns on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                navLinksWrapper.classList.remove('mobile-open');
                mobileToggleBtn.querySelector('i').classList.remove('fa-times');
                mobileToggleBtn.querySelector('i').classList.add('fa-bars');
                dropdowns.forEach(function(d) {
                    d.classList.remove('open');
                });
            }
        });
    </script>
@endsection
