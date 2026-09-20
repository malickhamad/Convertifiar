@extends('components.app')
@section('meta')
    <title>Image Rotator - Rotate JPG, PNG & WebP Online | Tool Baazar</title>
    <meta name="description"
        content="Rotate JPG, PNG, WebP and GIF images online to any angle from 0° to 360°. Fast, secure and easy image rotation with Tool Baazar.">
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
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <i class="fas fa-chevron-right mx-2"></i>
                    <span>Image Rotator</span>
                </div>
            </div>
        </section>
        {{-- =========================================================
        UPLOAD SECTION
        ORIGINAL DESIGN PRESERVED
    ========================================================== --}}
        <!-- Hero / Upload Section -->
        <section class="crop-hero-section" id="rotatorUploadSection">
            <div class="container">
                <div class="crop-heading">
                    <span class="crop-small-badge">
                        <i class="fas fa-sync-alt"></i>
                        Image Tool
                    </span>
                    <h1>
                        Rotate Your Images<br>
                        <span>With Ease.</span>
                    </h1>
                    <p>
                        Rotate your images to the perfect orientation.
                        Turn images 90°, 180°, or 270° with a simple,
                        fast, and easy-to-use online tool.
                    </p>
                </div>
                <!-- Upload Box -->
                <div class="crop-upload-box cursor-pointer" onclick="document.getElementById('rotateImageInput').click()">
                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h3>Upload your image</h3>
                    <p class="crop-upload-text">
                        Drag & drop your image here or
                    </p>
                    <label for="rotateImageInput" class="crop-upload-btn">
                        <i class="fas fa-upload"></i>
                        Choose File
                    </label>
                    <input type="file" id="rotateImageInput" accept="image/jpeg,image/png,image/webp,image/gif" hidden>
                    <p class="crop-upload-info">
                        Supports JPG, PNG, WebP, GIF
                        <span>|</span>
                        Max size: 50MB
                    </p>
                </div>
            </div>
        </section>
        {{-- =========================================================
        EDITOR SECTION
        COMPACT / PROFESSIONAL
    ========================================================== --}}
        <section id="rotatorEditorSection" class="py-3 d-none" style="margin-top:70px;">
            <div class="container">
                <div class="row g-3 align-items-stretch">
                    {{-- =================================================
                    LEFT INFORMATION PANEL
                ================================================== --}}
                    <div class="col-lg-3">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 shadow-sm h-100">
                            <div class="card-body p-3">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary"
                                            style="width:34px;height:34px;">
                                            <i class="fas fa-sync-alt"></i>
                                        </span>
                                        <span class="text-primary small fw-semibold">
                                            IMAGE ROTATOR
                                        </span>
                                    </div>
                                    <h4 class="text-white fw-bold mb-1">
                                        Rotate Image
                                    </h4>
                                    <p class="text-secondary small mb-0">
                                        Adjust the angle and preview your image
                                        instantly.
                                    </p>
                                </div>
                                {{-- Feature 1 --}}
                                <div class="d-flex align-items-center border-top border-secondary border-opacity-25 py-2">
                                    <span
                                        class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary flex-shrink-0"
                                        style="width:32px;height:32px;">
                                        <i class="fas fa-sliders-h small"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="text-white small fw-semibold">
                                            Any Angle
                                        </div>
                                        <div class="text-secondary" style="font-size:11px;">
                                            0° to 360° control
                                        </div>
                                    </div>
                                </div>
                                {{-- Feature 2 --}}
                                <div class="d-flex align-items-center border-top border-secondary border-opacity-25 py-2">
                                    <span
                                        class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary flex-shrink-0"
                                        style="width:32px;height:32px;">
                                        <i class="fas fa-eye small"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="text-white small fw-semibold">
                                            Live Preview
                                        </div>
                                        <div class="text-secondary" style="font-size:11px;">
                                            See changes instantly
                                        </div>
                                    </div>
                                </div>
                                {{-- Feature 3 --}}
                                <div class="d-flex align-items-center border-top border-secondary border-opacity-25 py-2">
                                    <span
                                        class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary flex-shrink-0"
                                        style="width:32px;height:32px;">
                                        <i class="fas fa-shield-alt small"></i>
                                    </span>
                                    <div class="ms-2">
                                        <div class="text-white small fw-semibold">
                                            Private
                                        </div>
                                        <div class="text-secondary" style="font-size:11px;">
                                            Processed in browser
                                        </div>
                                    </div>
                                </div>
                                {{-- File Info --}}
                                <div class="mt-3 p-2 rounded-3 bg-black border border-secondary border-opacity-25">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-secondary" style="font-size:11px;">
                                            Current Angle
                                        </span>
                                        <span class="badge bg-primary" id="sideRotationAngle">
                                            0°
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- =================================================
                    RIGHT EDITOR
                ================================================== --}}
                    <div class="col-lg-9">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 shadow-sm">
                            <div class="card-body p-2 p-md-3">
                                {{-- =====================================
                                PREVIEW
                            ====================================== --}}
                                <div class="rounded-3 border border-secondary border-opacity-25 bg-black overflow-hidden">
                                    <div
                                        class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom border-secondary border-opacity-25">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fas fa-image text-primary small"></i>
                                            <span class="text-secondary fw-semibold" style="font-size:11px;">
                                                IMAGE PREVIEW
                                            </span>
                                        </div>
                                        <span
                                            class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-2 py-1"
                                            id="rotationAngle">
                                            0°
                                        </span>
                                    </div>
                                    {{-- Preview Area --}}
                                    <div class="d-flex align-items-center justify-content-center p-2 p-md-3"
                                        style="height:280px;">
                                        <div id="previewContainer"
                                            class="w-100 h-100 d-flex align-items-center justify-content-center overflow-hidden">
                                            <img id="rotatePreviewImage" src="" alt="Image rotation preview"
                                                class="img-fluid rounded-3"
                                                style="max-width:90%;max-height:245px;object-fit:contain;transition:transform .2s ease;">
                                        </div>
                                    </div>
                                </div>
                                {{-- =====================================
                                ROTATION CONTROLS
                            ====================================== --}}
                                <div class="mt-2">
                                    <div class="card bg-black border border-secondary border-opacity-25 rounded-3">
                                        <div class="card-body p-3">
                                            {{-- Heading --}}
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <div class="text-white small fw-semibold">
                                                        Rotation Angle
                                                    </div>
                                                    <div class="text-secondary" style="font-size:11px;">
                                                        Drag slider or enter exact angle
                                                    </div>
                                                </div>
                                                <span class="badge bg-primary rounded-pill px-3 py-2"
                                                    id="rotationAngleLarge">
                                                    0°
                                                </span>
                                            </div>
                                            {{-- Slider --}}
                                            <div class="px-1">
                                                <input type="range" class="form-range" id="rotationSlider"
                                                    min="0" max="360" step="1" value="0">
                                                <div class="d-flex justify-content-between text-secondary"
                                                    style="font-size:10px;">
                                                    <span>0°</span>
                                                    <span>90°</span>
                                                    <span>180°</span>
                                                    <span>270°</span>
                                                    <span>360°</span>
                                                </div>
                                            </div>
                                            {{-- Exact Angle --}}
                                            <div class="row g-2 mt-2 align-items-end">
                                                <div class="col-7 col-sm-6">
                                                    <label for="rotationInput" class="form-label text-secondary mb-1"
                                                        style="font-size:11px;">
                                                        Exact Angle
                                                    </label>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" id="rotationInput"
                                                            class="form-control bg-dark text-white border-secondary"
                                                            min="0" max="360" step="1" value="0"
                                                            placeholder="0">
                                                        <span
                                                            class="input-group-text bg-dark text-secondary border-secondary">
                                                            °
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-sm-6">
                                                    <button type="button" id="rotationInputApply"
                                                        class="btn btn-outline-primary btn-sm w-100">
                                                        <i class="fas fa-check me-1"></i>
                                                        Apply
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- Quick Rotation --}}
                                            <div class="row g-2 mt-2">
                                                <div class="col-4">
                                                    <button type="button" id="rotate90Left"
                                                        class="btn btn-dark border border-secondary text-white btn-sm w-100 py-2">
                                                        <i class="fas fa-undo-alt me-1"></i>
                                                        −90°
                                                    </button>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" id="rotate90Right"
                                                        class="btn btn-dark border border-secondary text-white btn-sm w-100 py-2">
                                                        <i class="fas fa-redo-alt me-1"></i>
                                                        +90°
                                                    </button>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" id="rotate180"
                                                        class="btn btn-dark border border-secondary text-white btn-sm w-100 py-2">
                                                        <i class="fas fa-sync-alt me-1"></i>
                                                        180°
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- =====================================
                                ACTION BUTTONS
                            ====================================== --}}
                                <div class="row g-2 mt-2">
                                    <div class="col-4">
                                        <button type="button" id="rotateReset"
                                            class="btn btn-outline-light btn-sm w-100 py-2">
                                            <i class="fas fa-undo me-1"></i>
                                            Reset
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" id="chooseAnotherImage"
                                            class="btn btn-dark border border-secondary text-white btn-sm w-100 py-2">
                                            <i class="fas fa-image me-1"></i>
                                            Another
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" id="rotateDownload"
                                            class="btn btn-primary btn-sm w-100 py-2">
                                            <i class="fas fa-download me-1"></i>
                                            Download
                                        </button>
                                    </div>
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
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="text-primary small fw-semibold text-uppercase">
                        Why Tool Baazar?
                    </span>
                    <h2 class="text-white fw-bold mt-2">
                        Simple. Fast. Secure.
                    </h2>
                    <p class="text-secondary mb-0">
                        Rotate your images without complicated software.
                    </p>
                </div>
                <div class="row g-3">
                    {{-- Fast --}}
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-bolt"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">
                                    Fast Processing
                                </h6>
                                <p class="text-secondary small mb-0">
                                    Rotate images instantly in your browser.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Any Angle --}}
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-sliders-h"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">
                                    Any Rotation
                                </h6>
                                <p class="text-secondary small mb-0">
                                    Choose any angle from 0° to 360°.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Secure --}}
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-shield-alt"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">
                                    Secure & Private
                                </h6>
                                <p class="text-secondary small mb-0">
                                    Your image stays on your device.
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
        document.addEventListener('DOMContentLoaded', function() {
            /* =========================================================
               NAVBAR
            ========================================================== */
            const navbar = document.getElementById('morphNavbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    navbar.classList.toggle(
                        'shadow-lg',
                        window.scrollY > 30
                    );
                });
            }
            /* =========================================================
               ELEMENTS
            ========================================================== */
            const imageInput =
                document.getElementById('rotateImageInput');
            const uploadSection =
                document.getElementById('rotatorUploadSection');
            const editorSection =
                document.getElementById('rotatorEditorSection');
            const previewImage =
                document.getElementById('rotatePreviewImage');
            const rotationSlider =
                document.getElementById('rotationSlider');
            const rotationInput =
                document.getElementById('rotationInput');
            const rotationInputApply =
                document.getElementById('rotationInputApply');
            const rotationAngle =
                document.getElementById('rotationAngle');
            const rotationAngleLarge =
                document.getElementById('rotationAngleLarge');
            const sideRotationAngle =
                document.getElementById('sideRotationAngle');
            const rotateLeftButton =
                document.getElementById('rotate90Left');
            const rotateRightButton =
                document.getElementById('rotate90Right');
            const rotate180Button =
                document.getElementById('rotate180');
            const resetButton =
                document.getElementById('rotateReset');
            const downloadButton =
                document.getElementById('rotateDownload');
            const chooseAnotherButton =
                document.getElementById('chooseAnotherImage');
            /* =========================================================
               VARIABLES
            ========================================================== */
            let originalImage = null;
            let originalFileName = 'rotated-image';
            let originalMimeType = 'image/jpeg';
            let currentRotation = 0;
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp',
                'image/gif'
            ];
            const maxSize =
                50 * 1024 * 1024;
            /* =========================================================
               ANGLE NORMALIZATION
            ========================================================== */
            function normalizeAngle(angle) {
                angle = Number(angle);
                if (!Number.isFinite(angle)) {
                    return 0;
                }
                angle = Math.round(angle);
                angle = angle % 360;
                if (angle < 0) {
                    angle += 360;
                }
                return angle;
            }
            /* =========================================================
               UPDATE UI
            ========================================================== */
            function updateRotation() {
                currentRotation =
                    normalizeAngle(currentRotation);
                if (previewImage) {
                    previewImage.style.transform =
                        `rotate(${currentRotation}deg)`;
                }
                if (rotationSlider) {
                    rotationSlider.value =
                        currentRotation;
                }
                if (rotationInput) {
                    rotationInput.value =
                        currentRotation;
                }
                if (rotationAngle) {
                    rotationAngle.textContent =
                        `${currentRotation}°`;
                }
                if (rotationAngleLarge) {
                    rotationAngleLarge.textContent =
                        `${currentRotation}°`;
                }
                if (sideRotationAngle) {
                    sideRotationAngle.textContent =
                        `${currentRotation}°`;
                }
            }
            /* =========================================================
               SHOW EDITOR
            ========================================================== */
            function showEditor() {
                uploadSection.classList.add('d-none');
                editorSection.classList.remove('d-none');
                setTimeout(function() {
                    editorSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            }
            /* =========================================================
               SHOW UPLOAD
            ========================================================== */
            function showUpload() {
                editorSection.classList.add('d-none');
                uploadSection.classList.remove('d-none');
                uploadSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            /* =========================================================
               IMAGE UPLOAD
            ========================================================== */
            if (imageInput) {
                imageInput.addEventListener(
                    'change',
                    function(event) {
                        const file =
                            event.target.files[0];
                        if (!file) {
                            return;
                        }
                        if (!allowedTypes.includes(file.type)) {
                            alert(
                                'Please select a JPG, PNG, WebP or GIF image.'
                            );
                            imageInput.value = '';
                            return;
                        }
                        if (file.size > maxSize) {
                            alert(
                                'Image size must be less than 50MB.'
                            );
                            imageInput.value = '';
                            return;
                        }
                        if (originalImage) {
                            URL.revokeObjectURL(
                                originalImage
                            );
                        }
                        originalImage =
                            URL.createObjectURL(file);
                        originalFileName =
                            file.name.replace(
                                /\.[^/.]+$/,
                                ''
                            );
                        originalMimeType =
                            file.type;
                        currentRotation = 0;
                        previewImage.src =
                            originalImage;
                        updateRotation();
                        showEditor();
                    }
                );
            }
            /* =========================================================
               SLIDER
            ========================================================== */
            if (rotationSlider) {
                rotationSlider.addEventListener(
                    'input',
                    function() {
                        currentRotation =
                            Number(this.value);
                        updateRotation();
                    }
                );
            }
            /* =========================================================
               EXACT ANGLE APPLY
            ========================================================== */
            function applyExactAngle() {
                const angle =
                    Number(rotationInput.value);
                if (!Number.isFinite(angle)) {
                    alert(
                        'Please enter a valid angle.'
                    );
                    return;
                }
                if (angle < 0 || angle > 360) {
                    alert(
                        'Please enter an angle between 0° and 360°.'
                    );
                    return;
                }
                currentRotation =
                    angle;
                updateRotation();
            }
            if (rotationInputApply) {
                rotationInputApply.addEventListener(
                    'click',
                    applyExactAngle
                );
            }
            if (rotationInput) {
                rotationInput.addEventListener(
                    'keydown',
                    function(event) {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                            applyExactAngle();
                        }
                    }
                );
            }
            /* =========================================================
               ROTATE LEFT
            ========================================================== */
            if (rotateLeftButton) {
                rotateLeftButton.addEventListener(
                    'click',
                    function() {
                        currentRotation -= 90;
                        updateRotation();
                    }
                );
            }
            /* =========================================================
               ROTATE RIGHT
            ========================================================== */
            if (rotateRightButton) {
                rotateRightButton.addEventListener(
                    'click',
                    function() {
                        currentRotation += 90;
                        updateRotation();
                    }
                );
            }
            /* =========================================================
               ROTATE 180
            ========================================================== */
            if (rotate180Button) {
                rotate180Button.addEventListener(
                    'click',
                    function() {
                        currentRotation += 180;
                        updateRotation();
                    }
                );
            }
            /* =========================================================
               RESET
            ========================================================== */
            if (resetButton) {
                resetButton.addEventListener(
                    'click',
                    function() {
                        currentRotation = 0;
                        updateRotation();
                    }
                );
            }
            /* =========================================================
               CHOOSE ANOTHER IMAGE
            ========================================================== */
            if (chooseAnotherButton) {
                chooseAnotherButton.addEventListener(
                    'click',
                    function() {
                        if (originalImage) {
                            URL.revokeObjectURL(
                                originalImage
                            );
                        }
                        originalImage = null;
                        originalFileName =
                            'rotated-image';
                        originalMimeType =
                            'image/jpeg';
                        currentRotation = 0;
                        imageInput.value = '';
                        previewImage.src = '';
                        previewImage.style.transform =
                            'rotate(0deg)';
                        updateRotation();
                        showUpload();
                    }
                );
            }
            /* =========================================================
               DOWNLOAD ROTATED IMAGE
            ========================================================== */
            if (downloadButton) {
                downloadButton.addEventListener(
                    'click',
                    function() {
                        if (!originalImage) {
                            alert(
                                'Please upload an image first.'
                            );
                            return;
                        }
                        downloadButton.disabled = true;
                        downloadButton.innerHTML =
                            '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';
                        const image =
                            new Image();
                        image.onload =
                            function() {
                                const angle =
                                    normalizeAngle(
                                        currentRotation
                                    );
                                const radians =
                                    angle *
                                    Math.PI /
                                    180;
                                const sin =
                                    Math.abs(
                                        Math.sin(radians)
                                    );
                                const cos =
                                    Math.abs(
                                        Math.cos(radians)
                                    );
                                const width =
                                    image.naturalWidth;
                                const height =
                                    image.naturalHeight;
                                const canvas =
                                    document.createElement(
                                        'canvas'
                                    );
                                canvas.width =
                                    Math.max(
                                        1,
                                        Math.ceil(
                                            width * cos +
                                            height * sin
                                        )
                                    );
                                canvas.height =
                                    Math.max(
                                        1,
                                        Math.ceil(
                                            width * sin +
                                            height * cos
                                        )
                                    );
                                const context =
                                    canvas.getContext(
                                        '2d'
                                    );
                                if (!context) {
                                    alert(
                                        'Unable to process this image.'
                                    );
                                    resetDownloadButton();
                                    return;
                                }
                                context.imageSmoothingEnabled =
                                    true;
                                context.imageSmoothingQuality =
                                    'high';
                                context.clearRect(
                                    0,
                                    0,
                                    canvas.width,
                                    canvas.height
                                );
                                context.translate(
                                    canvas.width / 2,
                                    canvas.height / 2
                                );
                                context.rotate(
                                    radians
                                );
                                context.drawImage(
                                    image,
                                    -width / 2,
                                    -height / 2,
                                    width,
                                    height
                                );
                                /* -----------------------------------------
                                   OUTPUT FORMAT
                                ------------------------------------------ */
                                let outputType =
                                    originalMimeType;
                                let extension =
                                    'jpg';
                                if (
                                    originalMimeType ===
                                    'image/gif'
                                ) {
                                    /*
                                     * Canvas cannot preserve animated GIFs.
                                     * Export first frame as PNG.
                                     */
                                    outputType =
                                        'image/png';
                                    extension =
                                        'png';
                                }
                                if (
                                    originalMimeType ===
                                    'image/png'
                                ) {
                                    outputType =
                                        'image/png';
                                    extension =
                                        'png';
                                }
                                if (
                                    originalMimeType ===
                                    'image/webp'
                                ) {
                                    outputType =
                                        'image/webp';
                                    extension =
                                        'webp';
                                }
                                if (
                                    originalMimeType ===
                                    'image/jpeg'
                                ) {
                                    outputType =
                                        'image/jpeg';
                                    extension =
                                        'jpg';
                                }
                                canvas.toBlob(
                                    function(blob) {
                                        if (!blob) {
                                            alert(
                                                'Unable to create the rotated image.'
                                            );
                                            resetDownloadButton();
                                            return;
                                        }
                                        const downloadURL =
                                            URL.createObjectURL(
                                                blob
                                            );
                                        const link =
                                            document.createElement(
                                                'a'
                                            );
                                        link.href =
                                            downloadURL;
                                        link.download =
                                            `${originalFileName}-rotated-${angle}deg.${extension}`;
                                        document.body.appendChild(
                                            link
                                        );
                                        link.click();
                                        document.body.removeChild(
                                            link
                                        );
                                        setTimeout(
                                            function() {
                                                URL.revokeObjectURL(
                                                    downloadURL
                                                );
                                            },
                                            1000
                                        );
                                        resetDownloadButton();
                                    },
                                    outputType,
                                    originalMimeType ===
                                    'image/jpeg' ?
                                    0.95 :
                                    undefined
                                );
                            };
                        image.onerror =
                            function() {
                                alert(
                                    'Unable to process this image.'
                                );
                                resetDownloadButton();
                            };
                        image.src =
                            originalImage;
                    }
                );
            }
            /* =========================================================
               RESET DOWNLOAD BUTTON
            ========================================================== */
            function resetDownloadButton() {
                if (!downloadButton) {
                    return;
                }
                downloadButton.disabled = false;
                downloadButton.innerHTML =
                    '<i class="fas fa-download me-1"></i> Download';
            }
            /* =========================================================
               INITIAL STATE
            ========================================================== */
            updateRotation();
        });
    </script>
@endsection