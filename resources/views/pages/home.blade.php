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
        <video class="hero-bg-video" autoplay loop muted playsinline
            poster="{{ asset('assets/video/convertifire-poster.jpg') }}">
            <source src="{{ asset('assets/video/convertifire.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
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
                        All your file tools — in one free toolkit.
                    </h2>

                    <p class="hero-subtitle" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                        Convertifire: convert, compress, edit. Images, videos, PDFs, documents. Done.
                    </p>

                    <!-- Filters (Left Aligned) -->
                    <div class="filter-pills" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">
                        <button class="pill" data-target="documents">All</button>
                         <button class="pill active" data-target="images">Images</button>
                         <button class="pill" data-target="videos">Videos</button>
                         <button class="pill" data-target="pdfs">PDFs</button>
                        {{-- <button class="pill">Archives</button> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Tools Grid Section (Exact 12 Cards) -->
    <section class="container tools-grid mt-5">
        <div class="row g-4">

            <!-- Tool 1 -->
            <div id="images" class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
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

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                <a target="_blank" href="{{ route('image.rotator') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-cyan">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h5>Rotate IMAGE</h5>
                        <p>Rotate JPG, PNG, GIF, and WebP images easily by 90°, 180°, or 270° with a simple online tool.</p>
                    </div>
                </a>
            </div>



            <!-- Tool 5 -->

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <a target="_blank" href="{{ route('image.converter') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-yellow"><i class="fas fa-file-export"></i></div>
                        <h5>Image Converter</h5>
                        <p>Convert PNG, JPG, WebP, GIF, SVG or PDF images to any format in bulk — fast, free and right in
                            your browser..</p>
                    </div>
                </a>

            </div>


            <!-- Tool 6 -->

            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                <a target="_blank" href="{{ route('image.background_remover') }}" class="text-decoration-none">

                    <div class="tool-card anim-border">
                        <span class="badge-new">New!</span>
                        <div class="icon-box bg-red"><i class="fas fa-eraser"></i></div>
                        <h5>Remove background</h5>
                        <p>Quickly remove image backgrounds with high accuracy. Instantly detect objects and cut out
                            backgrounds.</p>
                    </div>
                </a>

            </div>

            <!-- Tool 7 -->


            <div id="videos" class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <a target="_blank" href="{{ route('video.to.audio') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <div class="icon-box bg-purple"><i class="fas fa-music"></i></div>
                        <h5>Video to Audio</h5>
                        <p>Convert your videos into high-quality audio files quickly and easily. Upload a video, convert it,
                            and download the audio.</p>
                    </div>
                </a>
            </div>


            <!-- Tool 8 -->

            <div id="pdfs" class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <a target="_blank" href="{{ route('pdf.editor') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <span class="badge-new">New!</span>

                        <div class="icon-box bg-green">
                            <i class="fas fa-file-pdf"></i>
                        </div>

                        <h5>PDF Editor</h5>

                        <p>
                            Edit PDF files online with ease. Add text, rotate, reorder,
                            duplicate and delete pages, then download your edited PDF.
                        </p>
                    </div>
                </a>
            </div>




            <!-- Tool 9 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <a target="_blank" href="{{ route('pdf.to.word') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <span class="badge-new">New!</span>

                        <div class="icon-box bg-green">
                            <i class="fas fa-file-word"></i>
                        </div>

                        <h5>PDF to Word</h5>

                        <p>
                            Convert PDF files into editable Word documents quickly,
                            accurately and securely.
                        </p>
                    </div>
                </a>
            </div>

            <!-- Tool 10 -->
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                <a target="_blank" href="{{ route('word.pdf.index') }}" class="text-decoration-none">
                    <div class="tool-card anim-border">
                        <span class="badge-new">New!</span>

                        <div class="icon-box bg-red">
                            <i class="fas fa-file-pdf"></i>
                        </div>

                        <h5>Word to PDF</h5>

                        <p>
                            Convert Word documents into universally compatible PDF files
                            quickly, accurately and securely.
                        </p>
                    </div>
                </a>
            </div>
            {{-- <!-- Tool 11 -->
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
            </div> --}}

        </div>
    </section>

    <!-- Advanced Bento Grid Section -->
    <section class="container py-5 mt-5 mb-5">
        <div class="row g-4">
            <!-- Left Large Box with Embedded Video -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="grid-box h-100 d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-dark border border-secondary mb-3">All-in-One Online Tools</span>
                        <h3>Everything You Need to Work with Files</h3>
                        <p>Compress, resize, crop, rotate and convert images, edit PDF files, convert PDF and Word
                            documents, remove image backgrounds, or extract audio from videos — all from one simple online
                            platform.</p>
                    </div>
                    <!-- 3rd Video Placement inside Bento Box -->
                    <video class="" autoplay loop muted playsinline>
                        <source src="{{ asset('assets/video/convertifire.mp4') }}" type="video/mp4">
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
                            <h3>Fast Processing</h3>
                            <p>Get your files processed quickly with easy-to-use tools designed for everyday image, video,
                                and PDF tasks. No complicated software or technical knowledge required.</p>
                        </div>
                    </div>
                    <div class="col-12 h-50" data-aos="fade-up" data-aos-delay="200">
                        <div class="grid-box h-100 d-flex flex-column justify-content-center">
                            <i class="fas fa-mobile-alt fa-3x text-light mb-3"></i>
                            <h3>Works on Any Device</h3>
                            <p>Use Tool Baazar directly from your browser on mobile, tablet, or desktop. No software
                                installation required — just upload your file and get started.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies Marquee -->
    <section class="py-5 text-center mt-3 border-top border-dark">
        <div data-aos="fade-up">
            <span class="tag-badge">Work Smarter</span>
            <h2 class="fw-bold mt-2 mb-5">Transform, optimize and manage <br>your files in just a few clicks.</h2>
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
$(document).ready(function () {

    $('.pill').click(function () {

        $('.pill').removeClass('active');
        $(this).addClass('active');

        let target = $(this).data('target');

        $('#' + target)[0].scrollIntoView({
            behavior: 'smooth'
        });

    });

});
</script>
@endsection
