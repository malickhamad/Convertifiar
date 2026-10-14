@extends('components.app')
@section('meta')
    <title>FREE Image Rotator: Rotate Images Online | XConvertifire</title>
    <meta name="description"
        content="Rotate JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Choose any angle from 0° to 360° for fast, secure, and precise image rotation.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="FREE Image Rotator: Rotate Images Online | XConvertifire">
    <meta property="og:description"
        content="Rotate JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Choose any angle from 0° to 360° for fast, secure, and precise image rotation.">
    <meta property="og:url" content="{{ route('image.rotator') }}">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE Image Rotator: Rotate Images Online | XConvertifire">
    <meta name="twitter:description"
        content="Rotate JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Choose any angle from 0° to 360° for fast, secure, and precise image rotation.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
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
                        Rotate Images Online<br>
                        <span>By Any Angle.</span>
                    </h1>
                    <p>
                        Rotate JPG, PNG, WebP and GIF images by 90°, 180°,
                        or a custom whole-degree angle with an online image rotator.
                    </p>
                </div>
                <!-- Upload Box -->
                <div class="crop-upload-box cursor-pointer" onclick="document.getElementById('rotateImageInput').click()">
                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h3>Upload your image</h3>
                    <p class="crop-upload-text">
                        Select a JPG, PNG, WebP or GIF image
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
                        Why Convertifire?
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

        <section class="rotator-seo-section">
            <div class="container">
                <div class="rotator-seo-wrap">
                    <h2>Free Image Rotator to Rotate Photos Online</h2>
                    <p>A sideways photo, an upside-down scan or a screenshot saved at the wrong angle can be difficult to use. XConvertifire's free image rotator helps you rotate an image online by choosing a useful preset or entering the angle that fits your picture.</p>
                    <p>Rotate a photo online, preview its orientation and export it. The selected image is processed in your browser and the download is created with canvas. This describes image processing, not all network activity on the website.</p>
                    <p>The tool accepts one JPG/JPEG, PNG, WebP or GIF image at a time, up to 50 MB. Its controls cover standard right-angle turns as well as custom whole-degree angles from 0° to 360°.</p>

                    <h2>How to Rotate an Image Online</h2>
                    <p>Rotate an image with four steps using the uploader and editor on this page.</p>
                    <div class="row g-4 rotator-seo-steps">
                        <div class="col-lg-3 col-md-6">
                            <article class="rotator-seo-step">
                                <h3>1. Upload Your Image</h3>
                                <p>Choose a JPG/JPEG, PNG, WebP or GIF file up to 50 MB using the file picker. The editor works with one image at a time. Drag-and-drop and batch uploads are not available.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="rotator-seo-step">
                                <h3>2. Choose the Rotation Angle</h3>
                                <p>Use the slider for adjustments, enter a whole-degree value in the exact-angle field and apply it, or choose a quick control for -90°, +90° or 180°.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="rotator-seo-step">
                                <h3>3. Preview and Adjust</h3>
                                <p>Check the live preview as you change the angle. Adjust the value until the image is oriented as intended. Reset returns the angle to its starting position.</p>
                            </article>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <article class="rotator-seo-step">
                                <h3>4. Download the Rotated Image</h3>
                                <p>Use Download when the preview looks right. The exported format depends on the uploaded format and browser encoding support; check the saved file before using or sharing it.</p>
                            </article>
                        </div>
                    </div>

                    <h2>Rotate Images by 90°, 180° or 270°</h2>
                    <p>Quarter turns correct pictures with the wrong orientation. The left and right controls turn by 90° increments, making 90°, 180° or 270° turns easy to apply.</p>

                    <h3>Rotate an Image 90 Degrees</h3>
                    <p>A 90-degree turn can correct a portrait photo displayed sideways or turn a landscape image upright. Choose the needed direction and confirm it in the preview.</p>

                    <h3>Rotate an Image 180 Degrees</h3>
                    <p>A 180-degree turn corrects an upside-down screenshot, scan or photograph without mirroring it. Use the dedicated button and check that text and subjects are upright.</p>

                    <h3>Rotate an Image 270 Degrees</h3>
                    <p>A 270-degree turn in one direction equals a 90-degree turn the other way. Use the left or right control and preview the orientation.</p>

                    <h2>Rotate an Image to a Custom Angle</h2>
                    <p>Not every adjustment is a quarter turn. The rotation slider and exact-angle number field let you choose a whole-degree value from 0° through 360°. Enter a value and press Apply, or use the slider to fine-tune the image while watching its live preview.</p>
                    <p>A slight 5° or 10° adjustment may help level a tilted photo. Values use whole degrees, not decimals. Rotation does not automatically remove a background or crop the full rotated image area.</p>
                    <p>When an image turns by an angle other than a multiple of 90°, its rectangular bounds need more canvas area to contain the rotated corners. This can create empty space around the image. Inspect the exported result to decide whether its framing works for your use.</p>

                    <h2>Rotate JPG, PNG, WebP and GIF Images</h2>
                    <p>Input formats do not all have the same export behavior. The format used for the download and its characteristics depend on the source format and, for WebP, browser encoding support.</p>

                    <h3>Rotate JPG and JPEG Photos</h3>
                    <p>JPG and JPEG are common formats for photographs. Rotated JPEG input is exported as JPEG. Exporting requires encoding the image again, which may affect file size or visual quality. Keep the original if you need an untouched copy, and inspect fine details in the downloaded result.</p>

                    <h3>Rotate PNG Images</h3>
                    <p>PNG images are often used for screenshots, illustrations and graphics. PNG input is exported as PNG. Transparency may be retained where the browser-based canvas export supports it. Check the saved file if transparent edges or overlays matter for your project.</p>

                    <h3>Rotate WebP Images</h3>
                    <p>The rotator requests WebP output for WebP input. Whether the browser can encode that format affects the actual result, so do not assume every browser will preserve WebP output. Confirm the downloaded format and appearance before replacing the source.</p>

                    <h3>Rotate GIF Images</h3>
                    <p>GIF input is accepted, but the tool exports a static PNG image. Animated GIF frames and playback are not preserved. If animation is important, keep the original GIF and use a workflow designed to edit animated images.</p>

                    <h2>Image Rotation vs Cropping vs Resizing</h2>
                    <p>These operations solve different problems. Rotation changes an image's orientation; it does not by itself remove unwanted content or set a target pixel size.</p>
                    <ul class="rotator-seo-list">
                        <li><strong>Rotation</strong> turns the image to correct its orientation or adjust its angle.</li>
                        <li><strong>Cropping</strong> removes areas outside a selected frame. Use the <a href="{{ route('image.cropper') }}">online image cropper</a> when you need to change composition or trim the edges.</li>
                        <li><strong>Resizing</strong> changes the image's pixel dimensions. Use the <a href="{{ route('image.resizer') }}">image resizer</a> when a particular width or height is needed.</li>
                        <li><strong>Compression</strong> focuses on reducing file size. The <a href="{{ route('image.compressor') }}">image compressor</a> is for trying to reduce an image's storage or download size.</li>
                    </ul>
                    <p>A project may combine these operations: rotate a photo, crop its composition, resize it for a page and compress a copy for delivery.</p>

                    <h2>Common Reasons to Rotate Images</h2>

                    <h3>Fix Sideways Photos</h3>
                    <p>Photos can appear sideways after being transferred between devices or apps. A 90-degree turn in the appropriate direction can correct the visible orientation. Check the whole image, including any text, before downloading.</p>

                    <h3>Correct Upside-Down Pictures</h3>
                    <p>When a photograph, document scan or screenshot is upside down, use the 180° control to turn it around. This changes orientation without flipping the image like a mirror.</p>

                    <h3>Adjust Screenshots and Scanned Images</h3>
                    <p>Rotate a screenshot or scan saved in landscape when it should be portrait, or vice versa. Rotation does not fix skewed perspective or straighten lines independently.</p>

                    <h3>Prepare Images for Websites and Documents</h3>
                    <p>Correct orientation helps images fit articles, presentations and documents. Check the dimensions and format required by the destination.</p>

                    <h3>Fine-Tune Photos with Custom Angles</h3>
                    <p>A small custom turn can level a horizon or building. You may need to crop the extra canvas space created by a non-right-angle turn.</p>

                    <h2>Tips for Rotating Images Without Unnecessary Quality Loss</h2>
                    <ul class="rotator-seo-list">
                        <li><strong>Start with the original resolution.</strong> Rotation cannot restore detail that is missing from a small or blurry source. Keep a copy of the original so you can return to it if needed.</li>
                        <li><strong>Avoid repeated JPEG exports.</strong> JPEG encoding is lossy. Re-encoding may change image quality, so rotate from the original rather than repeatedly exporting and reusing an already compressed copy when possible.</li>
                        <li><strong>Choose a suitable format.</strong> PNG can be useful for screenshots and graphics where sharp edges or transparency matter, subject to browser support for canvas output. JPEG output is not lossless.</li>
                        <li><strong>Review non-right-angle turns.</strong> A rotated rectangle needs different bounds and may have empty canvas space near its corners. This tool does not automatically crop or fill that area.</li>
                        <li><strong>Inspect the downloaded file.</strong> Verify orientation, edges, transparency, format and visual details in the actual export, not only in the editor preview.</li>
                        <li><strong>Consider browser limits.</strong> Large images can use substantial memory during canvas processing. Browser memory and canvas size limits may constrain very large files even when they are below the upload limit.</li>
                        <li><strong>Keep animated originals.</strong> GIF exports are static PNG files, so the animation is not preserved by this tool.</li>
                    </ul>
                    <p>For technical background, see MDN's documentation on <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/rotate" target="_blank" rel="noopener noreferrer">rotating a canvas drawing</a> and <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob" target="_blank" rel="noopener noreferrer">creating an image file from a canvas</a>.</p>

                    <h2>Frequently Asked Questions About Image Rotation</h2>
                    <div class="rotator-seo-faq">
                        <h3>Is XConvertifire's image rotator free?</h3>
                        <p>Yes. Rotate and download one supported image at a time in your browser.</p>

                        <h3>Which image formats can I rotate?</h3>
                        <p>The uploader accepts JPG/JPEG, PNG, WebP and GIF files. Output behavior depends on the input format and browser support.</p>

                        <h3>Can I rotate a photo 90 degrees?</h3>
                        <p>Yes. Use the left or right 90-degree control and check the preview.</p>

                        <h3>Can I rotate a picture 180 or 270 degrees?</h3>
                        <p>Yes. Use the 180° button, or make a 270° turn with three 90-degree turns or a turn in the opposite direction.</p>

                        <h3>Can I choose an exact rotation angle?</h3>
                        <p>Yes. Enter and apply a whole-degree angle from 0° to 360°, or use the slider. Decimal precision is not available.</p>

                        <h3>Can I rotate an image without installing software?</h3>
                        <p>Yes. The rotator processes the image in a browser and creates the download with canvas.</p>

                        <h3>Will rotating an image reduce its quality?</h3>
                        <p>JPEG re-encoding may affect quality. PNG may retain transparency where supported. Inspect the download.</p>

                        <h3>Can I rotate a PNG image with transparency?</h3>
                        <p>PNG input is exported as PNG, and transparency may be retained where supported by the browser-based export. Verify the downloaded image if transparency is important.</p>

                        <h3>Can I rotate an animated GIF without losing animation?</h3>
                        <p>No. GIF input is exported as a static PNG, so its animation is not preserved.</p>

                        <h3>Can I rotate multiple images at once?</h3>
                        <p>No. The current editor handles one image at a time and does not provide batch rotation.</p>

                        <h3>What is the maximum upload size?</h3>
                        <p>The maximum supported file size is 50 MB for one image.</p>

                        <h3>Are my image files uploaded to a server for rotation?</h3>
                        <p>The selected image is processed in the browser and canvas creates the download. This describes image processing, not all website activity.</p>
                    </div>

                    <div class="rotator-seo-final">
                        <h2>Rotate Your Image Online for Free</h2>
                        <p>Upload a JPG, PNG, WebP or GIF image, choose the rotation angle you need, preview the result and download your rotated image.</p>
                        <a href="#rotatorUploadSection" class="rotator-seo-cta" id="rotatorSeoCta">Rotate Your Image Now</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <style>
        .rotator-seo-section {
            padding: 24px 0 72px;
        }

        .rotator-seo-wrap {
            max-width: 960px;
            margin: 0 auto;
        }

        .rotator-seo-wrap > h2:not(:first-child) {
            margin-top: 42px;
        }

        .rotator-seo-section h2 {
            color: #fff;
            font-size: clamp(2rem, 3vw, 2.7rem);
            line-height: 1.2;
            margin: 0 0 18px;
            letter-spacing: -0.03em;
        }

        .rotator-seo-section h3 {
            color: #fff;
            font-size: 1.25rem;
            margin: 28px 0 12px;
        }

        .rotator-seo-section p,
        .rotator-seo-section li {
            color: rgba(255, 255, 255, 0.76);
            font-size: 1.03rem;
            line-height: 1.75;
            margin: 0 0 16px;
        }

        .rotator-seo-section a:not(.rotator-seo-cta) {
            color: #60a5fa;
            text-decoration: underline;
            text-underline-offset: 0.18em;
        }

        .rotator-seo-section a:not(.rotator-seo-cta):hover,
        .rotator-seo-section a:not(.rotator-seo-cta):focus-visible {
            color: #93c5fd;
        }

        .rotator-seo-steps {
            margin-top: 8px;
            margin-bottom: 24px;
        }

        .rotator-seo-step {
            height: 100%;
            padding: 22px 18px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 18px;
        }

        .rotator-seo-step h3 {
            margin-top: 0;
            font-size: 1.05rem;
        }

        .rotator-seo-step p {
            margin-bottom: 0;
            font-size: 0.98rem;
        }

        .rotator-seo-list {
            margin: 0 0 20px;
            padding-left: 1.4rem;
        }

        .rotator-seo-faq h3 {
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .rotator-seo-final {
            margin-top: 40px;
            padding: 28px 24px;
            text-align: center;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(96, 165, 250, 0.28);
            border-radius: 18px;
        }

        .rotator-seo-final h2 {
            margin-bottom: 14px;
        }

        .rotator-seo-final p {
            max-width: 720px;
            margin: 0 auto 20px;
        }

        .rotator-seo-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border: 1px solid #2563eb;
            border-radius: 10px;
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .rotator-seo-cta:hover,
        .rotator-seo-cta:focus-visible {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #fff;
        }

        .rotator-seo-cta:focus-visible {
            outline: 2px solid #93c5fd;
            outline-offset: 3px;
        }

        @media (max-width: 767px) {
            .rotator-seo-section {
                padding-top: 14px;
            }

            .rotator-seo-wrap > h2:not(:first-child) {
                margin-top: 32px;
            }

            .rotator-seo-section h2 {
                font-size: 1.9rem;
            }

            .rotator-seo-section p,
            .rotator-seo-section li {
                font-size: 0.98rem;
            }

            .rotator-seo-final {
                padding: 22px 18px;
            }

            .rotator-seo-cta {
                max-width: 100%;
                white-space: normal;
            }
        }
    </style>
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
            const seoCta =
                document.getElementById('rotatorSeoCta');

            if (seoCta) {
                seoCta.addEventListener('click', function(event) {
                    event.preventDefault();
                    const target = editorSection.classList.contains('d-none')
                        ? uploadSection
                        : editorSection;
                    const reduceMotion = window.matchMedia(
                        '(prefers-reduced-motion: reduce)'
                    ).matches;

                    target.scrollIntoView({
                        behavior: reduceMotion ? 'auto' : 'smooth',
                        block: 'start'
                    });
                });
            }
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