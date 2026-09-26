@extends('components.app')
@section('meta')
    <title>Video to Audio Converter | Tool Baazar</title>
    <meta name="description"
        content="Convert video files to MP3, WAV and M4A audio online with Tool Baazar. Fast, secure and easy to use.">
@endsection
@section('content')
    <main class="crop-page bg-black">
        {{-- =========================================================
             BREADCRUMB
        ========================================================== --}}
        <section class="crop-breadcrumb-section">
            <div class="container">
                <div class="crop-breadcrumb">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <i class="fas fa-home me-2"></i>
                        Home
                    </a>
                    <i class="fas fa-chevron-right mx-2"></i>
                    <span>Video to Audio Converter</span>
                </div>
            </div>
        </section>
        {{-- =========================================================
             FIRST SECTION
             THIS SECTION DISAPPEARS AFTER FILE SELECTION
        ========================================================== --}}
        <section class="crop-hero-section" id="videoUploadSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-wave-square me-2"></i>
                        Video Tool
                    </div>
                    <h1>
                        Convert Your Videos
                        <br>
                        <span>To Audio.</span>
                    </h1>
                    <p>
                        Extract high-quality audio from your videos and download it
                        instantly as MP3, WAV or M4A.
                    </p>
                </div>
                {{-- Upload Box --}}
                <div class="crop-upload-box mx-auto cursor-pointer" id="uploadArea" onclick="document.getElementById('videoInput').click()">
                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4 class="text-white mb-2">
                        Upload your video
                    </h4>
                    <p class="text-secondary mb-4">
                        Drag & drop your video here or choose a file
                    </p>
                    <label for="videoInput" class="crop-upload-btn">
                        <i class="fas fa-upload me-2"></i>
                        Choose Video
                    </label>
                    <input type="file" id="videoInput" class="d-none"
                        accept=".mp4,.mov,.avi,.webm,.mkv,.mpeg,.mpg,.flv,.3gp,video/*">
                    <div class="small text-secondary mt-3">
                        MP4, MOV, AVI, WebM, MKV, MPEG, MPG, FLV, 3GP
                        <br>
                        Maximum file size: 50MB
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             COMPACT CONVERTER SECTION
        ========================================================== --}}
        <section class="py-4 d-none" id="videoEditorSection">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="card bg-dark border-secondary shadow-lg rounded-4 overflow-hidden">
                            {{-- Header --}}
                            <div class="card-header bg-dark border-secondary px-3 px-md-4 py-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="bg-primary bg-opacity-10
                                                   rounded-3 p-2 me-3">
                                            <i class="fas fa-headphones text-primary">
                                            </i>
                                        </div>
                                        <div>
                                            <h6 class="text-white mb-0">
                                                Video Audio Converter
                                            </h6>
                                            <small class="text-secondary">
                                                Extract audio from your video
                                            </small>
                                        </div>
                                    </div>
                                    <span
                                        class="badge bg-success bg-opacity-10
                                               text-success border border-success
                                               rounded-pill px-2 py-1 small">
                                        <i class="fas fa-shield-alt me-1"></i>
                                        Secure
                                    </span>
                                </div>
                            </div>
                            {{-- Body --}}
                            <div class="card-body p-3 p-md-4">
                                {{-- Selected File --}}
                                <div
                                    class="bg-black border border-secondary
                                           rounded-3 p-2 p-md-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="bg-primary bg-opacity-10
                                                   rounded-3 p-2 me-2">
                                            <i
                                                class="fas fa-file-video
                                                       text-primary">
                                            </i>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div id="fileName"
                                                class="text-white fw-semibold
                                                       small text-truncate">
                                                Selected video
                                            </div>
                                            <div id="fileSize" class="text-secondary" style="font-size:12px;">
                                                0 Bytes
                                            </div>
                                        </div>
                                        <button type="button" id="removeFile"
                                            class="btn btn-sm btn-outline-danger
                                                   ms-2 px-2 py-1"
                                            title="Remove video">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- Video To Audio --}}
                                <div class="text-center mb-3">
                                    <div
                                        class="d-inline-flex align-items-center
                                               gap-2">
                                        <span
                                            class="badge bg-black border
                                                   border-secondary text-white
                                                   px-2 py-1">
                                            <i class="fas fa-video me-1"></i>
                                            Video
                                        </span>
                                        <i
                                            class="fas fa-arrow-right
                                                   text-primary small">
                                        </i>
                                        <span
                                            class="badge bg-primary
                                                   text-white px-2 py-1">
                                            <i class="fas fa-headphones me-1"></i>
                                            Audio
                                        </span>
                                    </div>
                                </div>
                                {{-- Format Heading --}}
                                <div
                                    class="d-flex align-items-center
                                           justify-content-between mb-2">
                                    <div>
                                        <div class="text-white fw-semibold small">
                                            Output Format
                                        </div>
                                        <div class="text-secondary" style="font-size:11px;">
                                            Select your preferred audio format
                                        </div>
                                    </div>
                                    <i
                                        class="fas fa-sliders-h
                                               text-primary small">
                                    </i>
                                </div>
                                {{-- Format Buttons --}}
                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <button type="button"
                                            class="audio-format-btn btn btn-dark
                                                   border-secondary w-100
                                                   rounded-3 py-2"
                                            data-format="mp3">
                                            <i
                                                class="fas fa-music
                                                       text-primary d-block mb-1">
                                            </i>
                                            <span
                                                class="text-white fw-semibold
                                                       small">
                                                MP3
                                            </span>
                                            <small class="d-block text-secondary" style="font-size:10px;">
                                                192 kbps
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button"
                                            class="audio-format-btn btn btn-dark
                                                   border-secondary w-100
                                                   rounded-3 py-2"
                                            data-format="wav">
                                            <i
                                                class="fas fa-wave-square
                                                       text-primary d-block mb-1">
                                            </i>
                                            <span
                                                class="text-white fw-semibold
                                                       small">
                                                WAV
                                            </span>
                                            <small class="d-block text-secondary" style="font-size:10px;">
                                                Lossless
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button"
                                            class="audio-format-btn btn btn-dark
                                                   border-secondary w-100
                                                   rounded-3 py-2"
                                            data-format="m4a">
                                            <i
                                                class="fas fa-volume-up
                                                       text-primary d-block mb-1">
                                            </i>
                                            <span
                                                class="text-white fw-semibold
                                                       small">
                                                M4A
                                            </span>
                                            <small class="d-block text-secondary" style="font-size:10px;">
                                                AAC
                                            </small>
                                        </button>
                                    </div>
                                </div>
                                {{-- Professional Select --}}
                                <div class="mb-3">
                                    <label for="audioFormat"
                                        class="form-label text-secondary
                                               small mb-1">
                                        Output format
                                    </label>
                                    <select id="audioFormat"
                                        class="form-select bg-black text-white
                                               border-secondary rounded-3">
                                        <option value="mp3" class="bg-black text-white">
                                            MP3 — Recommended • 192 kbps
                                        </option>
                                        <option value="wav" class="bg-black text-white">
                                            WAV — High Quality • Lossless
                                        </option>
                                        <option value="m4a" class="bg-black text-white">
                                            M4A — Compact • AAC
                                        </option>
                                    </select>
                                </div>
                                {{-- Convert --}}
                                <button type="button" id="convertBtn"
                                    class="btn btn-primary w-100
                                           rounded-3 py-2">
                                    <i class="fas fa-bolt me-2"></i>
                                    Convert Video to Audio
                                </button>
                                {{-- Security --}}
                                <div class="text-center mt-2">
                                    <small class="text-secondary" style="font-size:11px;">
                                        <i class="fas fa-lock text-success me-1">
                                        </i>
                                        Secure processing • Maximum 50MB
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             PROCESSING
        ========================================================== --}}
        <section class="py-4 d-none" id="processingSection">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="card bg-dark border-secondary
                                   shadow-lg rounded-4">
                            <div class="card-body p-4 text-center">
                                <div class="bg-primary bg-opacity-10
                                           rounded-circle
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center mb-3"
                                    style="width:65px;height:65px;">
                                    <i
                                        class="fas fa-cog fa-spin
                                               text-primary fs-4">
                                    </i>
                                </div>
                                <h5 class="text-white mb-1">
                                    Converting Your Video
                                </h5>
                                <p class="text-secondary small mb-3">
                                    Extracting your audio. Please wait...
                                </p>
                                <div class="mx-auto" style="max-width:600px;">
                                    <div
                                        class="d-flex justify-content-between
                                               mb-1">
                                        <span id="progressText" class="text-secondary" style="font-size:12px;">
                                            Starting conversion...
                                        </span>
                                        <strong id="progressPercent" class="text-primary" style="font-size:12px;">
                                            0%
                                        </strong>
                                    </div>
                                    <div class="progress bg-black border
                                               border-secondary"
                                        style="height:7px;">
                                        <div id="progressBar"
                                            class="progress-bar
                                                   progress-bar-striped
                                                   progress-bar-animated
                                                   bg-primary"
                                            role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-secondary mt-3" style="font-size:11px;">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Keep this page open until conversion is complete.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             RESULT
        ========================================================== --}}
        <section class="py-4 d-none" id="resultSection">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="card bg-dark border-secondary
                                   shadow-lg rounded-4">
                            <div class="card-body p-4 text-center">
                                <div class="bg-success bg-opacity-10
                                           rounded-circle
                                           d-inline-flex
                                           align-items-center
                                           justify-content-center mb-3"
                                    style="width:65px;height:65px;">
                                    <i
                                        class="fas fa-check
                                               text-success fs-4">
                                    </i>
                                </div>
                                <h5 class="text-white mb-1">
                                    Conversion Complete
                                </h5>
                                <p class="text-secondary small mb-3">
                                    Your audio file is ready to download.
                                </p>
                                <div class="mx-auto" style="max-width:500px;">
                                    <button type="button" id="downloadBtn"
                                        class="btn btn-success w-100
                                               rounded-3 py-2">
                                        <i class="fas fa-download me-2"></i>
                                        Download Audio
                                    </button>
                                    <button type="button" id="newVideoBtn"
                                        class="btn btn-outline-secondary
                                               w-100 rounded-3 py-2 mt-2">
                                        <i class="fas fa-plus me-2"></i>
                                        Convert Another Video
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
             BENEFITS
        ========================================================== --}}
        <section class="crop-benefits-section">
            <div class="container">
                <div class="text-center mb-5">
                    <div class="crop-small-badge">
                        WHY USE TOOL BAAZAR
                    </div>
                    <h2 class="text-white">
                        Simple. Fast. <span>Easy.</span>
                    </h2>
                    <p class="text-secondary mx-auto" style="max-width:650px;">
                        Everything you need to extract audio from your videos
                        without complicated software.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="crop-benefit-card h-100">
                            <div class="crop-feature-icon
                                       crop-icon-blue mb-4">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h5 class="text-white">
                                Fast Processing
                            </h5>
                            <p class="text-secondary mb-0">
                                Convert your videos quickly and get your audio
                                without unnecessary steps.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="crop-benefit-card h-100">
                            <div class="crop-feature-icon
                                       crop-icon-purple mb-4">
                                <i class="fas fa-file-audio"></i>
                            </div>
                            <h5 class="text-white">
                                Multiple Formats
                            </h5>
                            <p class="text-secondary mb-0">
                                Choose MP3, WAV or M4A depending on your
                                quality and compatibility requirements.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="crop-benefit-card h-100">
                            <div class="crop-feature-icon
                                       crop-icon-green mb-4">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="text-white">
                                Secure & Private
                            </h5>
                            <p class="text-secondary mb-0">
                                Your files are processed securely so you can
                                convert with confidence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/video-to-audio.js')
@endsection