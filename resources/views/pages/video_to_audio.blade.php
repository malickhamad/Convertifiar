@extends('components.app')
@section('meta')
    <title>FREE Video to Audio Converter: Extract MP3 | XConvertifire</title>
    <meta name="description"
        content="Convert MP4, MOV, AVI, WebM, MKV, MPEG, MPG, FLV, and 3GP videos to MP3, WAV, or M4A for FREE with XConvertifire. Fast, secure video-to-audio conversion.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="FREE Video to Audio Converter: Extract MP3 | XConvertifire">
    <meta property="og:description"
        content="Convert MP4, MOV, AVI, WebM, MKV, MPEG, MPG, FLV, and 3GP videos to MP3, WAV, or M4A for FREE with XConvertifire. Fast, secure video-to-audio conversion.">
    <meta property="og:url" content="{{ route('video.to.audio') }}">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE Video to Audio Converter: Extract MP3 | XConvertifire">
    <meta name="twitter:description"
        content="Convert MP4, MOV, AVI, WebM, MKV, MPEG, MPG, FLV, and 3GP videos to MP3, WAV, or M4A for FREE with XConvertifire. Fast, secure video-to-audio conversion.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <style>
        .video-audio-seo-section {
            padding: 24px 0 72px;
        }

        .video-audio-seo-wrap {
            max-width: 960px;
            margin: 0 auto;
        }

        .video-audio-seo-wrap > h2:not(:first-child) {
            margin-top: 42px;
        }

        .video-audio-seo-section h2 {
            color: #fff;
            font-size: clamp(2rem, 3vw, 2.7rem);
            line-height: 1.2;
            margin: 0 0 18px;
            letter-spacing: -0.03em;
        }

        .video-audio-seo-section h3 {
            color: #fff;
            font-size: 1.25rem;
            margin: 28px 0 12px;
        }

        .video-audio-seo-section p,
        .video-audio-seo-section li {
            color: rgba(255, 255, 255, 0.76);
            font-size: 1.03rem;
            line-height: 1.75;
            margin: 0 0 16px;
        }

        .video-audio-seo-section a:not(.video-audio-seo-cta) {
            color: #60a5fa;
            text-decoration: underline;
            text-underline-offset: 0.18em;
        }

        .video-audio-seo-section a:not(.video-audio-seo-cta):hover,
        .video-audio-seo-section a:not(.video-audio-seo-cta):focus-visible {
            color: #93c5fd;
        }

        .video-audio-seo-steps {
            margin: 8px 0 24px;
        }

        .video-audio-seo-step,
        .video-audio-seo-card {
            height: 100%;
            padding: 22px 18px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 18px;
        }

        .video-audio-seo-step h3,
        .video-audio-seo-card h3 {
            margin-top: 0;
            font-size: 1.05rem;
        }

        .video-audio-seo-step p,
        .video-audio-seo-card p {
            margin-bottom: 0;
            font-size: 0.98rem;
        }

        .video-audio-seo-list {
            margin: 0 0 20px;
            padding-left: 1.4rem;
        }

        .video-audio-seo-table-wrap {
            width: 100%;
            margin: 0 0 22px;
            overflow-x: auto;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }

        .video-audio-seo-table {
            width: 100%;
            min-width: 520px;
            margin: 0;
            color: rgba(255, 255, 255, 0.8);
            border-collapse: collapse;
        }

        .video-audio-seo-table th,
        .video-audio-seo-table td {
            padding: 12px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-align: left;
            vertical-align: top;
        }

        .video-audio-seo-table th {
            color: #fff;
            background: rgba(255, 255, 255, 0.04);
        }

        .video-audio-seo-faq h3 {
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .video-audio-seo-final {
            margin-top: 40px;
            padding: 28px 24px;
            text-align: center;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(96, 165, 250, 0.28);
            border-radius: 18px;
        }

        .video-audio-seo-final h2 {
            margin-bottom: 14px;
        }

        .video-audio-seo-final p {
            max-width: 720px;
            margin: 0 auto 20px;
        }

        .video-audio-seo-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            max-width: 100%;
            padding: 12px 18px;
            border: 1px solid #2563eb;
            border-radius: 10px;
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .video-audio-seo-cta:hover,
        .video-audio-seo-cta:focus-visible {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #fff;
        }

        .video-audio-seo-cta:focus-visible {
            outline: 2px solid #93c5fd;
            outline-offset: 3px;
        }

        @media (max-width: 767px) {
            .video-audio-seo-section {
                padding-top: 14px;
            }

            .video-audio-seo-wrap > h2:not(:first-child) {
                margin-top: 32px;
            }

            .video-audio-seo-section h2 {
                font-size: 1.9rem;
            }

            .video-audio-seo-section p,
            .video-audio-seo-section li {
                font-size: 0.98rem;
            }

            .video-audio-seo-final {
                padding: 22px 18px;
            }
        }
    </style>
@endsection
@section('content')

<style>
    .crop-benefit-card {
    display: flex;
    flex-direction: column;   /* 👈 ADD THIS LINE ONLY */
}
</style>
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
                        Convert Video to Audio Online
                        <br>
                        <span>MP3, WAV or M4A</span>
                    </h1>
                    <p>
                        Extract audio from a supported video file and choose MP3, WAV or M4A
                        for your downloaded audio.
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
                                        In-browser
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
                                                PCM output
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
                                            MP3: Recommended • 192 kbps
                                        </option>
                                        <option value="wav" class="bg-black text-white">
                                            WAV: 16-bit PCM • 44.1 kHz
                                        </option>
                                        <option value="m4a" class="bg-black text-white">
                                            M4A: Compact • AAC
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
                                        Browser processing • Maximum 50MB
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
                        WHY USE X Convertifire
                    </div>
                    <h2 class="text-white">
                        Simple. Clear. <span>Easy.</span>
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
                                       crop-icon-blue mb-2">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h5 class="text-white">
                                Processing Progress
                            </h5>
                            <p class="text-secondary mb-0">
                                Processing time depends on the video, codecs and device.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="crop-benefit-card h-100">
                            <div class="crop-feature-icon
                                       crop-icon-purple mb-2">
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
                                       crop-icon-green mb-2">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="text-white">
                                Browser-Based Processing
                            </h5>
                            <p class="text-secondary mb-0">
                                This page processes the selected video with browser-based FFmpeg.
                                Application assets may need to load from the website.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="video-audio-seo-section">
            <div class="container">
                <div class="video-audio-seo-wrap">
                    <h2>Free Video to Audio Converter Online</h2>
                    <p>A video to audio converter extracts a video's audio stream into a file for listening, sharing or editing. Use this video to MP3 converter to extract audio from a recording you own or have permission to use.</p>
                    <p>This interface uses FFmpeg WebAssembly in your browser to convert video to audio online. It handles one video at a time and offers MP3, WAV and M4A. Decoding depends on the video's codecs and the available browser build.</p>

                    <h2>How to Convert Video to Audio Online</h2>
                    <p>Follow the steps below to choose a video, select an audio format and save the generated file.</p>
                    <div class="row g-4 video-audio-seo-steps">
                        <div class="col-lg-3 col-md-6">
                            <article class="video-audio-seo-step">
                                <h3>1. Upload Your Video</h3>
                                <p>Select a supported video or drag and drop one file into the upload area. The maximum file size is 50 MB. The video needs a decodable audio track for extraction to succeed.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="video-audio-seo-step">
                                <h3>2. Choose MP3, WAV or M4A</h3>
                                <p>Pick an output format based on how you plan to use the audio. The format controls and output selector offer MP3, WAV and M4A.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="video-audio-seo-step">
                                <h3>3. Start Audio Conversion</h3>
                                <p>Start the conversion and keep the page open while the progress display updates. Processing time depends on the file, codecs, browser resources and device performance.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="video-audio-seo-step">
                                <h3>4. Download the Audio File</h3>
                                <p>When the completed state appears, use Download Audio to save the generated file. Listen to it and check the format before sharing or editing it.</p>
                            </article>
                        </div>
                    </div>

                    <h2>Convert Video to MP3, WAV or M4A</h2>
                    <p>Each output option uses different audio encoding. Consider device compatibility, editing needs and the characteristics of the source recording when choosing.</p>

                    <h3>Convert Video to MP3</h3>
                    <p>MP3 is widely supported by music players, phones, browsers and audio applications. This converter encodes it at 192 kbps and 44.1 kHz stereo. MP3 is lossy, so the output is not lossless and may differ from the source.</p>

                    <h3>Extract Audio as WAV</h3>
                    <p>WAV output uses 16-bit PCM at 44.1 kHz stereo. PCM is uncompressed audio data and may be convenient for workflows that expect WAV files, such as further editing or importing into audio software. An uncompressed WAV does not restore information already lost in a compressed or low-quality source recording.</p>

                    <h3>Convert Video to M4A</h3>
                    <p>M4A is an audio container commonly used with AAC. This converter encodes it at 192 kbps and 44.1 kHz stereo. It offers compressed audio, but compatibility varies between players and services.</p>

                    <h2>Supported Video Formats</h2>
                    <p>Video containers can hold different codecs. A listed extension may be accepted while its streams fail to decode in the browser FFmpeg build.</p>

                    <h3>MP4 to MP3 and Other Audio Formats</h3>
                    <p>MP4 is common for recorded video. Choose MP3, WAV or M4A if its audio stream can be decoded. The contained codecs matter as well as the extension.</p>

                    <h3>MOV and AVI Video Files</h3>
                    <p>MOV and AVI are accepted, but their codecs vary. Confirm the video contains audio; some files may not decode successfully.</p>

                    <h3>WebM and MKV Containers</h3>
                    <p>WebM and MKV can contain different audio streams. Results depend on whether this page's FFmpeg build supports the file's codec.</p>

                    <h3>MPEG, MPG, FLV and 3GP Files</h3>
                    <p>MPEG, MPG, FLV and 3GP extensions are accepted too, though codec support varies. Test the specific file.</p>

                    <h2>MP3 vs WAV vs M4A: Which Format Should You Choose?</h2>
                    <p>Use the intended playback or editing workflow to guide your choice. The table summarizes the output settings used by this converter.</p>
                    <div class="video-audio-seo-table-wrap">
                        <table class="video-audio-seo-table">
                            <thead>
                                <tr>
                                    <th scope="col">Format</th>
                                    <th scope="col">Current output</th>
                                    <th scope="col">Often useful for</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">MP3</th>
                                    <td>192 kbps, 44.1 kHz stereo</td>
                                    <td>Broad playback and sharing compatibility</td>
                                </tr>
                                <tr>
                                    <th scope="row">WAV</th>
                                    <td>16-bit PCM, 44.1 kHz stereo</td>
                                    <td>Audio editing workflows that use uncompressed PCM</td>
                                </tr>
                                <tr>
                                    <th scope="row">M4A</th>
                                    <td>AAC, 192 kbps, 44.1 kHz stereo</td>
                                    <td>A compressed audio file where supported</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>These settings describe the output, not the source recording's quality or compatibility with every device. Check your intended player or editor.</p>

                    <h2>Understanding Audio Quality and Bitrate</h2>
                    <p>Bitrate is the amount of encoded data used per second. For lossy MP3 and AAC, it affects the encoded result but cannot add detail missing from the source.</p>
                    <p>MP3 and M4A/AAC use 192 kbps at 44.1 kHz stereo. WAV uses uncompressed 16-bit PCM at 44.1 kHz stereo, but cannot recover information discarded by a compressed source.</p>
                    <p>Recording conditions, codecs and the source stream also affect quality. Listen to the downloaded audio before using it. The converter has no custom bitrate or audio-enhancement controls.</p>

                    <h2>Common Reasons to Extract Audio from Video</h2>

                    <h3>Save Spoken Audio from Your Own Videos</h3>
                    <p>Extract audio from a personal recording, interview or presentation you created. Confirm it contains an audio track and that you have permission to use it.</p>

                    <h3>Prepare Audio for Permitted Editing Projects</h3>
                    <p>A separate audio file may be easier to import into an editing project. This tool does not trim clips, remove noise, isolate vocals or edit audio.</p>
                    <p>If you are also preparing a supporting image, the <a href="{{ route('image.converter') }}">Image Converter</a> handles image-format conversions separately; it does not edit the extracted audio.</p>

                    <h3>Use Audio in Presentations</h3>
                    <p>A permitted sound clip can be prepared for a presentation. Confirm the output works in the software you will use.</p>

                    <h3>Work with Recordings and Educational Material</h3>
                    <p>A separate audio file can help organize educational recordings you may use. The converter does not create transcripts or captions.</p>

                    <h2>How Browser-Based Video to Audio Conversion Works</h2>
                    <p>This page uses FFmpeg WebAssembly to read a video's streams, decode audio and encode the selected output in the browser.</p>
                    <p>The browser may first load FFmpeg assets from the website. This page's processing is browser-side, but that does not mean the entire website works offline or every site workflow is browser-only. A separate server conversion endpoint also exists in the project.</p>
                    <p>Memory, device performance and codec support affect processing. An unsupported stream or video without decodable audio cannot produce the intended output.</p>

                    <h2>Tips for Better Video to Audio Results</h2>
                    <ul class="video-audio-seo-list">
                        <li><strong>Choose for the intended use.</strong> MP3 is common for playback, WAV PCM can suit editing workflows and M4A/AAC is a compressed option where supported.</li>
                        <li><strong>Check that the video has sound.</strong> A silent video or unsupported audio stream may not produce an audio file.</li>
                        <li><strong>Start with a clear source recording.</strong> Conversion cannot repair poor microphone quality, clipping or missing audio detail.</li>
                        <li><strong>Keep the file within 50 MB.</strong> The page rejects larger videos. Large accepted files may still need substantial browser memory.</li>
                        <li><strong>Allow time for processing.</strong> Duration depends on the video, codec, browser and device; no fixed conversion speed is guaranteed.</li>
                        <li><strong>Listen to the export.</strong> Confirm the audio is present, plays as expected and is suitable before sharing or publishing.</li>
                        <li><strong>Consider codec and resource limits.</strong> Unsupported streams, low available memory or device constraints can cause conversion to fail.</li>
                    </ul>
                    <p>For additional technical background, read MDN's guide to <a href="https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Audio_codecs" target="_blank" rel="noopener noreferrer">audio codecs for web media</a> and the <a href="https://ffmpegwasm.netlify.app/docs/overview/" target="_blank" rel="noopener noreferrer">ffmpeg.wasm overview</a>.</p>

                    <h2>Frequently Asked Questions About Video to Audio Conversion</h2>
                    <div class="video-audio-seo-faq">
                        <h3>Is XConvertifire's video to audio converter free?</h3>
                        <p>Yes. The page provides MP3, WAV and M4A output options for supported videos. Conversion still depends on the file and browser capabilities.</p>

                        <h3>Can I convert MP4 to MP3?</h3>
                        <p>Yes, if the MP4 contains an audio stream that the browser FFmpeg build can decode. Select MP3 and start conversion.</p>

                        <h3>Which video formats can I upload?</h3>
                        <p>The uploader accepts MP4, MOV, AVI, WebM, MKV, MPEG, MPG, FLV and 3GP files up to 50 MB. Codec support can vary within each format.</p>

                        <h3>Can I extract WAV audio from a video?</h3>
                        <p>Yes. Choose WAV for 16-bit PCM output at 44.1 kHz stereo. This does not restore quality missing from the source.</p>

                        <h3>Can I convert video to M4A?</h3>
                        <p>Yes. M4A output uses AAC at 192 kbps and 44.1 kHz stereo, subject to successful decoding of the source video.</p>

                        <h3>What is the maximum video upload size?</h3>
                        <p>The page accepts one video file up to 50 MB.</p>

                        <h3>Can I convert multiple videos together?</h3>
                        <p>No. The current interface processes one video at a time.</p>

                        <h3>Does the converter work directly in my browser?</h3>
                        <p>Yes. This page uses browser-side FFmpeg WebAssembly. Its application assets may need to load from the website first.</p>

                        <h3>Are my videos uploaded to a server during this page's conversion workflow?</h3>
                        <p>This page's conversion workflow processes the selected video in the browser. This statement describes this interface, not all workflows elsewhere on the website.</p>

                        <h3>Why might a video fail to convert?</h3>
                        <p>The codec may not be supported, the file may be damaged, it may lack a decodable audio track, or the browser may not have enough resources to process it.</p>

                        <h3>Will converting video to WAV improve the original audio quality?</h3>
                        <p>No. WAV is uncompressed PCM output, but it cannot restore details already lost in a compressed or poor-quality source.</p>

                        <h3>What bitrate does MP3 conversion use?</h3>
                        <p>The current MP3 output uses 192 kbps at 44.1 kHz stereo.</p>

                        <h3>Can I trim or edit the audio?</h3>
                        <p>No. This tool extracts audio and does not include trimming or audio editing controls.</p>

                        <h3>Does video-to-audio conversion remove the video track?</h3>
                        <p>The generated output is an audio file. The original video is not edited by this browser conversion workflow.</p>

                        <h3>Can I extract audio from a video with no sound?</h3>
                        <p>No audio can be extracted when a video has no decodable audio stream. A silent file may therefore fail to produce the expected result.</p>
                    </div>

                    <div class="video-audio-seo-final">
                        <h2>Convert Your Video to Audio Online</h2>
                        <p>Choose a supported video file, select MP3, WAV or M4A, and extract your audio using XConvertifire's online converter.</p>
                        <a href="#videoUploadSection" class="video-audio-seo-cta" id="videoAudioSeoCta">Convert Video to Audio Now</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/video-to-audio.js')
    <script>
        const videoAudioSeoCta = document.getElementById('videoAudioSeoCta');
        const videoAudioTargets = [
            document.getElementById('resultSection'),
            document.getElementById('processingSection'),
            document.getElementById('videoEditorSection'),
            document.getElementById('videoUploadSection')
        ];

        function isVisibleVideoAudioTarget(element) {
            return element &&
                !element.classList.contains('d-none') &&
                window.getComputedStyle(element).display !== 'none' &&
                element.getClientRects().length > 0;
        }

        if (videoAudioSeoCta) {
            videoAudioSeoCta.addEventListener('click', function(event) {
                event.preventDefault();

                const target = videoAudioTargets.find(isVisibleVideoAudioTarget);
                if (!target) {
                    return;
                }

                const reduceMotion = window.matchMedia(
                    '(prefers-reduced-motion: reduce)'
                ).matches;

                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            });
        }
    </script>
@endsection