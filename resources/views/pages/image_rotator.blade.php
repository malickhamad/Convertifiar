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
        UPLOAD SECTION (unchanged)
    ========================================================== --}}
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
        EDITOR SECTION  (same layout as Image Resizer)
        Left: big preview  |  Right: info + controls panel
    ========================================================== --}}
        <section id="rotatorEditorSection" class="rot-editor d-none">
            <div class="container">

                {{-- Heading + cancel --}}
                <div class="rot-head">
                    <h2 class="rot-title">Rotate Your <span>Image</span></h2>
                    <button type="button" id="chooseAnotherImage" class="rot-cancel">
                        <i class="fas fa-xmark"></i>
                        Cancel &amp; Upload New
                    </button>
                </div>

                <div class="row g-4">

                    {{-- ============ LEFT: PREVIEW ============ --}}
                    <div class="col-lg-8">
                        <div class="rot-preview">
                            <span class="rot-angle-chip" id="rotationAngle">0°</span>
                            <div class="rot-stage" id="previewContainer">
                                <img id="rotatePreviewImage" src="" alt="Image rotation preview">
                            </div>
                        </div>
                    </div>

                    {{-- ============ RIGHT: PANEL ============ --}}
                    <div class="col-lg-4">
                        <div class="rot-panel">

                            {{-- Info rows --}}
                            <div class="rot-info">
                                <span class="rot-info-label">File Name</span>
                                <span class="rot-info-value" id="rotFileName">—</span>
                            </div>
                            <div class="rot-info">
                                <span class="rot-info-label">Dimensions</span>
                                <span class="rot-info-value" id="rotDimensions">—</span>
                            </div>
                            <div class="rot-info">
                                <span class="rot-info-label">Size</span>
                                <span class="rot-info-value" id="rotFileSize">—</span>
                            </div>

                            {{-- Rotation controls --}}
                            <div class="rot-section-head">
                                <span class="rot-section-label">Rotation Angle</span>
                                <span class="rot-badge" id="rotationAngleLarge">0°</span>
                            </div>

                            <input type="range" class="form-range rot-range" id="rotationSlider" min="0"
                                max="360" step="1" value="0">
                            <div class="rot-scale">
                                <span>0°</span>
                                <span>90°</span>
                                <span>180°</span>
                                <span>270°</span>
                                <span>360°</span>
                            </div>

                            <div class="rot-field-row">
                                <div class="rot-field">
                                    <label for="rotationInput" class="rot-section-label">Exact Angle</label>
                                    <div class="rot-input-wrap">
                                        <input type="number" id="rotationInput" class="rot-input" min="0"
                                            max="360" step="1" value="0" placeholder="0">
                                        <span class="rot-input-unit">°</span>
                                    </div>
                                </div>
                                <button type="button" id="rotationInputApply" class="rot-apply">
                                    <i class="fas fa-check"></i>
                                    Apply
                                </button>
                            </div>

                            <div class="rot-quick">
                                <button type="button" id="rotate90Left" class="rot-quick-btn">
                                    <i class="fas fa-undo-alt"></i> −90°
                                </button>
                                <button type="button" id="rotate90Right" class="rot-quick-btn">
                                    <i class="fas fa-redo-alt"></i> +90°
                                </button>
                                <button type="button" id="rotate180" class="rot-quick-btn">
                                    <i class="fas fa-sync-alt"></i> 180°
                                </button>
                            </div>

                            <button type="button" id="rotateReset" class="rot-reset">
                                <i class="fas fa-undo"></i>
                                Reset
                            </button>

                            <button type="button" id="rotateDownload" class="rot-download">
                                <i class="fas fa-download"></i>
                                Download Image
                            </button>
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
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-bolt"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">Fast Processing</h6>
                                <p class="text-secondary small mb-0">Rotate images instantly in your browser.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-sliders-h"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">Any Rotation</h6>
                                <p class="text-secondary small mb-0">Choose any angle from 0° to 360°.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark border border-secondary border-opacity-25 rounded-4 h-100">
                            <div class="card-body text-center p-3">
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary mb-2"
                                    style="width:48px;height:48px;">
                                    <i class="fas fa-shield-alt"></i>
                                </span>
                                <h6 class="text-white fw-semibold mb-1">Secure &amp; Private</h6>
                                <p class="text-secondary small mb-0">Your image stays on your device.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- =========================================================
        SEO CONTENT (unchanged)
    ========================================================== --}}
        <section class="py-5">
    <div class="container">

        <!-- ═══ HERO ═══ -->
        <div class="seo-card shadow-lg mb-5">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">
                    <i class="fas fa-sync-alt me-1"></i> Image Rotation Guide
                </span>
                <h2 class="text-white fw-bold mb-3">Free Image Rotator to Rotate Photos Online</h2>
                <p class="text-secondary mb-3">A sideways photo, an upside-down scan or a screenshot saved at the wrong angle can be difficult to use. XConvertifire's free image rotator helps you rotate an image online by choosing a useful preset or entering the angle that fits your picture.</p>
                <p class="text-secondary mb-3">Rotate a photo online, preview its orientation and export it. The selected image is processed in your browser and the download is created with canvas. This describes image processing, not all network activity on the website.</p>
                <p class="text-secondary mb-0">The tool accepts one JPG/JPEG, PNG, WebP or GIF image at a time, up to 50 MB. Its controls cover standard right-angle turns as well as custom whole-degree angles from 0° to 360°.</p>
            </div>
        </div>

        <!-- ═══ STEPS ═══ -->
        <div class="text-center mb-4">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">How It Works</span>
            <h2 class="text-white fw-bold mb-2">How to Rotate an Image Online</h2>
            <p class="text-secondary mb-0">Rotate an image with four steps using the uploader and editor on this page.</p>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">1. Upload Your Image</h3>
                        <p class="text-secondary small mb-0">Choose a JPG/JPEG, PNG, WebP or GIF file up to 50 MB using the file picker. The editor works with one image at a time. Drag-and-drop and batch uploads are not available.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">2. Choose the Rotation Angle</h3>
                        <p class="text-secondary small mb-0">Use the slider for adjustments, enter a whole-degree value in the exact-angle field and apply it, or choose a quick control for -90°, +90° or 180°.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">3. Preview and Adjust</h3>
                        <p class="text-secondary small mb-0">Check the live preview as you change the angle. Adjust the value until the image is oriented as intended. Reset returns the angle to its starting position.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-download"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">4. Download the Rotated Image</h3>
                        <p class="text-secondary small mb-0">Use Download when the preview looks right. The exported format depends on the uploaded format and browser encoding support; check the saved file before using or sharing it.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ 90/180/270 ═══ -->
        <div class="seo-card shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-white fw-bold h4 mb-3">Rotate Images by 90°, 180° or 270°</h2>
                <p class="text-secondary mb-4">Quarter turns correct pictures with the wrong orientation. The left and right controls turn by 90° increments, making 90°, 180° or 270° turns easy to apply.</p>

                <h3 class="text-white fw-semibold h6 mb-2">Rotate an Image 90 Degrees</h3>
                <p class="text-secondary mb-4">A 90-degree turn can correct a portrait photo displayed sideways or turn a landscape image upright. Choose the needed direction and confirm it in the preview.</p>

                <h3 class="text-white fw-semibold h6 mb-2">Rotate an Image 180 Degrees</h3>
                <p class="text-secondary mb-4">A 180-degree turn corrects an upside-down screenshot, scan or photograph without mirroring it. Use the dedicated button and check that text and subjects are upright.</p>

                <h3 class="text-white fw-semibold h6 mb-2">Rotate an Image 270 Degrees</h3>
                <p class="text-secondary mb-0">A 270-degree turn in one direction equals a 90-degree turn the other way. Use the left or right control and preview the orientation.</p>
            </div>
        </div>

        <!-- ═══ CUSTOM ANGLE ═══ -->
        <div class="seo-card shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-white fw-bold h4 mb-3">Rotate an Image to a Custom Angle</h2>
                <p class="text-secondary mb-3">Not every adjustment is a quarter turn. The rotation slider and exact-angle number field let you choose a whole-degree value from 0° through 360°. Enter a value and press Apply, or use the slider to fine-tune the image while watching its live preview.</p>
                <p class="text-secondary mb-3">A slight 5° or 10° adjustment may help level a tilted photo. Values use whole degrees, not decimals. Rotation does not automatically remove a background or crop the full rotated image area.</p>
                <p class="text-secondary mb-0">When an image turns by an angle other than a multiple of 90°, its rectangular bounds need more canvas area to contain the rotated corners. This can create empty space around the image. Inspect the exported result to decide whether its framing works for your use.</p>
            </div>
        </div>

        <!-- ═══ FORMATS ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">Format Guide</span>
            <h2 class="text-white fw-bold mb-0">Rotate JPG, PNG, WebP and GIF Images</h2>
        </div>

        <p class="text-secondary text-center mb-4">Input formats do not all have the same export behavior. The format used for the download and its characteristics depend on the source format and, for WebP, browser encoding support. If you need a separate format conversion after rotating, use the <a href="{{ route('image.converter') }}" class="text-primary">image converter</a> and check its available output options.</p>

        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-warning bg-opacity-10 border border-warning border-opacity-25 text-warning mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Rotate JPG and JPEG Photos</h3>
                        <p class="text-secondary small mb-0">JPG and JPEG are common formats for photographs. Rotated JPEG input is exported as JPEG. Exporting requires encoding the image again, which may affect file size or visual quality. Keep the original if you need an untouched copy, and inspect fine details in the downloaded result.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-info bg-opacity-10 border border-info border-opacity-25 text-info mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Rotate PNG Images</h3>
                        <p class="text-secondary small mb-0">PNG images are often used for screenshots, illustrations and graphics. PNG input is exported as PNG. Transparency may be retained where the browser-based canvas export supports it. Check the saved file if transparent edges or overlays matter for your project.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-success bg-opacity-10 border border-success border-opacity-25 text-success mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Rotate WebP Images</h3>
                        <p class="text-secondary small mb-0">The rotator requests WebP output for WebP input. Whether the browser can encode that format affects the actual result, so do not assume every browser will preserve WebP output. Confirm the downloaded format and appearance before replacing the source.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-danger bg-opacity-10 border border-danger border-opacity-25 text-danger mb-3">
                            <i class="fas fa-film"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Rotate GIF Images</h3>
                        <p class="text-secondary small mb-0">GIF input is accepted, but the tool exports a static PNG image. Animated GIF frames and playback are not preserved. If animation is important, keep the original GIF and use a workflow designed to edit animated images.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ ROTATE VS CROP VS RESIZE ═══ -->
        <div class="seo-card shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-white fw-bold h4 mb-3">Image Rotation vs Cropping vs Resizing</h2>
                <p class="text-secondary mb-4">These operations solve different problems. Rotation changes an image's orientation; it does not by itself remove unwanted content or set a target pixel size.</p>
                <ul class="text-secondary mb-4 ps-3">
                    <li class="mb-2"><strong class="text-white">Rotation</strong> turns the image to correct its orientation or adjust its angle.</li>
                    <li class="mb-2"><strong class="text-white">Cropping</strong> removes areas outside a selected frame. Use the <a href="{{ route('image.cropper') }}" class="text-primary">online image cropper</a> when you need to change composition or trim the edges.</li>
                    <li class="mb-2"><strong class="text-white">Resizing</strong> changes the image's pixel dimensions. Use the <a href="{{ route('image.resizer') }}" class="text-primary">image resizer</a> when a particular width or height is needed.</li>
                    <li class="mb-2"><strong class="text-white">Compression</strong> focuses on reducing file size. The <a href="{{ route('image.compressor') }}" class="text-primary">image compressor</a> is for trying to reduce an image's storage or download size.</li>
                </ul>
                <p class="text-secondary mb-0">A project may combine these operations: rotate a photo, crop its composition, resize it for a page and compress a copy for delivery.</p>
            </div>
        </div>

        <!-- ═══ WHY ROTATE ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">Common Uses</span>
            <h2 class="text-white fw-bold mb-0">Common Reasons to Rotate Images</h2>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Fix Sideways Photos</h3>
                        <p class="text-secondary small mb-0">Photos can appear sideways after being transferred between devices or apps. A 90-degree turn in the appropriate direction can correct the visible orientation. Check the whole image, including any text, before downloading.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Correct Upside-Down Pictures</h3>
                        <p class="text-secondary small mb-0">When a photograph, document scan or screenshot is upside down, use the 180° control to turn it around. This changes orientation without flipping the image like a mirror.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Adjust Screenshots and Scanned Images</h3>
                        <p class="text-secondary small mb-0">Rotate a screenshot or scan saved in landscape when it should be portrait, or vice versa. Rotation does not fix skewed perspective or straighten lines independently.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Prepare Images for Websites and Documents</h3>
                        <p class="text-secondary small mb-0">Correct orientation helps images fit articles, presentations and documents. Check the dimensions and format required by the destination.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-magic"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Fine-Tune Photos with Custom Angles</h3>
                        <p class="text-secondary small mb-0">A small custom turn can level a horizon or building. You may need to crop the extra canvas space created by a non-right-angle turn.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ TIPS ═══ -->
        <div class="seo-card shadow-sm mb-5">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 mb-3">Best Practices</span>
                <h2 class="text-white fw-bold h4 mb-4">Tips for Rotating Images Without Unnecessary Quality Loss</h2>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Start with the original resolution.</strong> Rotation cannot restore detail that is missing from a small or blurry source. Keep a copy of the original so you can return to it if needed.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Avoid repeated JPEG exports.</strong> JPEG encoding is lossy. Re-encoding may change image quality, so rotate from the original rather than repeatedly exporting and reusing an already compressed copy when possible.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Choose a suitable format.</strong> PNG can be useful for screenshots and graphics where sharp edges or transparency matter, subject to browser support for canvas output. JPEG output is not lossless.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Review non-right-angle turns.</strong> A rotated rectangle needs different bounds and may have empty canvas space near its corners. This tool does not automatically crop or fill that area.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Inspect the downloaded file.</strong> Verify orientation, edges, transparency, format and visual details in the actual export, not only in the editor preview.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Consider browser limits.</strong> Large images can use substantial memory during canvas processing. Browser memory and canvas size limits may constrain very large files even when they are below the upload limit.</p>
                    </div>
                </div>
                <p class="text-secondary small mt-4 mb-0">For technical background, see MDN's documentation on <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/rotate" target="_blank" rel="noopener noreferrer" class="text-primary">rotating a canvas drawing</a> and <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob" target="_blank" rel="noopener noreferrer" class="text-primary">creating an image file from a canvas</a>.</p>
            </div>
        </div>

        <!-- ═══ FAQ ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">FAQ</span>
            <h2 class="text-white fw-bold mb-0">Frequently Asked Questions About Image Rotation</h2>
        </div>

        <div class="accordion mb-5" id="rotatorFaqAccordion">

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqOne">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Is XConvertifire's image rotator free?
                    </button>
                </h3>
                <div id="rofaqOne" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Rotate and download one supported image at a time in your browser.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqTwo">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Which image formats can I rotate?
                    </button>
                </h3>
                <div id="rofaqTwo" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        The uploader accepts JPG/JPEG, PNG, WebP and GIF files. Output behavior depends on the input format and browser support.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqThree">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate a photo 90 degrees?
                    </button>
                </h3>
                <div id="rofaqThree" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Use the left or right 90-degree control and check the preview.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqFour">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate a picture 180 or 270 degrees?
                    </button>
                </h3>
                <div id="rofaqFour" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Use the 180° button, or make a 270° turn with three 90-degree turns or a turn in the opposite direction.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqFive">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I choose an exact rotation angle?
                    </button>
                </h3>
                <div id="rofaqFive" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Enter and apply a whole-degree angle from 0° to 360°, or use the slider. Decimal precision is not available.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqSix">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate an image without installing software?
                    </button>
                </h3>
                <div id="rofaqSix" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        Yes. The rotator processes the image in a browser and creates the download with canvas.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqSeven">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Will rotating an image reduce its quality?
                    </button>
                </h3>
                <div id="rofaqSeven" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        JPEG re-encoding may affect quality. PNG may retain transparency where supported. Inspect the download.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqEight">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate a PNG image with transparency?
                    </button>
                </h3>
                <div id="rofaqEight" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        PNG input is exported as PNG, and transparency may be retained where supported by the browser-based export. Verify the downloaded image if transparency is important.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqNine">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate an animated GIF without losing animation?
                    </button>
                </h3>
                <div id="rofaqNine" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        No. GIF input is exported as a static PNG, so its animation is not preserved.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqTen">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate multiple images at once?
                    </button>
                </h3>
                <div id="rofaqTen" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        No. The current editor handles one image at a time and does not provide batch rotation.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqEleven">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        What is the maximum upload size?
                    </button>
                </h3>
                <div id="rofaqEleven" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        The maximum supported file size is 50 MB for one image.
                    </div>
                </div>
            </div>

            <div class="seo-card overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rofaqTwelve">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Are my image files uploaded to a server for rotation?
                    </button>
                </h3>
                <div id="rofaqTwelve" class="accordion-collapse collapse" data-bs-parent="#rotatorFaqAccordion">
                    <div class="accordion-body small">
                        The selected image is processed in the browser and canvas creates the download. This describes image processing, not all website activity.
                    </div>
                </div>
            </div>

        </div>

        <!-- ═══ FINAL CTA ═══ -->
        <div class="seo-card shadow-lg">
            <div class="card-body p-4 p-md-5 text-center">
                <h2 class="text-white fw-bold mb-3">Rotate Your Image Online for Free</h2>
                <p class="text-secondary mb-4">Upload a JPG, PNG, WebP or GIF image, choose the rotation angle you need, preview the result and download your rotated image.</p>
                <a href="#rotatorUploadSection" id="rotatorSeoCta" class="btn btn-primary btn-lg fw-semibold px-4 py-2">
                    <i class="fas fa-sync-alt me-2"></i>Rotate Your Image Now
                </a>
            </div>
        </div>

    </div>
</section>

    </main>
@endsection
@section('scripts')
<style>
    /* ---------- SEO cards (unchanged) ---------- */
    .seo-card {
        background: #151515 !important;
        border: 1px solid rgba(255, 255, 255, 0.25) !important;
        border-radius: 1rem !important;
    }
    .seo-card .accordion-button {
        background: #151515 !important;
        color: #fff !important;
        box-shadow: none !important;
        font-weight: 600;
    }
    .seo-card .accordion-button:not(.collapsed) {
        background: rgba(59, 130, 246, 0.08) !important;
        color: #60a5fa !important;
    }
    .seo-card .accordion-button::after { filter: invert(1); }
    .seo-card .accordion-body {
        background: #151515 !important;
        color: rgba(255, 255, 255, 0.7) !important;
    }

    /* =========================================================
       ROTATOR EDITOR  (same look as Image Resizer editor)
    ========================================================== */
    .rot-editor {
        padding: 18px 0 60px;
    }

    .rot-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .rot-title {
        margin: 0;
        color: #fff;
        font-weight: 700;
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        letter-spacing: -0.02em;
    }

    .rot-title span {
        color: rgba(255, 255, 255, 0.7);
    }

    .rot-cancel {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border: 0;
        border-radius: 12px;
        background: #f87171;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s ease, transform .2s ease;
    }

    .rot-cancel:hover {
        background: #ef4444;
    }

    .rot-cancel:focus-visible,
    .rot-quick-btn:focus-visible,
    .rot-apply:focus-visible,
    .rot-reset:focus-visible,
    .rot-download:focus-visible {
        outline: 2px solid #93c5fd;
        outline-offset: 2px;
    }

    /* ---------- Preview ---------- */
    .rot-preview {
        position: relative;
        height: 100%;
        min-height: 480px;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background-color: #0b0b0c;
        background-image:
            linear-gradient(45deg, #141414 25%, transparent 25%),
            linear-gradient(-45deg, #141414 25%, transparent 25%),
            linear-gradient(45deg, transparent 75%, #141414 75%),
            linear-gradient(-45deg, transparent 75%, #141414 75%);
        background-size: 20px 20px;
        background-position: 0 0, 0 10px, 10px -10px, -10px 0;
        overflow: hidden;
    }

    .rot-stage {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .rot-stage img {
        display: block;
        max-width: none;
        max-height: none;
        border-radius: 4px;
        transition: transform .18s ease;
        transform-origin: center center;
        user-select: none;
        -webkit-user-drag: none;
    }

    .rot-angle-chip {
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 2;
        padding: 5px 12px;
        border-radius: 999px;
        background: rgba(0, 0, 0, 0.65);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #60a5fa;
        font-size: 0.78rem;
        font-weight: 600;
        backdrop-filter: blur(6px);
    }

    /* ---------- Side panel ---------- */
    .rot-panel {
        padding: 22px;
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: #101011;
    }

    .rot-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 16px;
        margin-bottom: 10px;
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: #161617;
    }

    .rot-info-label,
    .rot-section-label {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.68rem;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .rot-info-value {
        color: #fff;
        font-size: 0.85rem;
        font-weight: 700;
        text-align: right;
        word-break: break-word;
        min-width: 0;
    }

    .rot-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 22px 0 10px;
    }

    .rot-badge {
        padding: 5px 14px;
        border-radius: 999px;
        background: #3b82f6;
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .rot-range {
        margin-bottom: 2px;
    }

    .rot-scale {
        display: flex;
        justify-content: space-between;
        color: rgba(255, 255, 255, 0.4);
        font-size: 0.65rem;
    }

    .rot-field-row {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        margin-top: 18px;
    }

    .rot-field {
        flex: 1 1 auto;
        min-width: 0;
    }

    .rot-field .rot-section-label {
        display: block;
        margin-bottom: 8px;
    }

    .rot-input-wrap {
        position: relative;
    }

    .rot-input {
        width: 100%;
        height: 46px;
        padding: 0 34px 0 14px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #161617;
        color: #fff;
        font-size: 0.95rem;
    }

    .rot-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    .rot-input-unit {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
    }

    .rot-apply {
        flex: 0 0 auto;
        height: 46px;
        padding: 0 20px;
        border-radius: 12px;
        border: 1px solid rgba(96, 165, 250, 0.4);
        background: rgba(59, 130, 246, 0.12);
        color: #60a5fa;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s ease;
    }

    .rot-apply:hover {
        background: rgba(59, 130, 246, 0.22);
    }

    .rot-quick {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 14px;
    }

    .rot-quick-btn {
        height: 44px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: #161617;
        color: #fff;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease;
    }

    .rot-quick-btn:hover {
        background: #1d1d1f;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .rot-quick-btn i {
        margin-right: 4px;
        font-size: 0.75rem;
    }

    .rot-reset {
        width: 100%;
        height: 44px;
        margin-top: 14px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: transparent;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s ease;
    }

    .rot-reset:hover {
        background: rgba(255, 255, 255, 0.06);
    }

    .rot-reset i {
        margin-right: 6px;
    }

    .rot-download {
        width: 100%;
        height: 50px;
        margin-top: 12px;
        border: 0;
        border-radius: 14px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.3);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .rot-download:hover:not(:disabled) {
        transform: translateY(-1px);
        box-shadow: 0 14px 28px rgba(37, 99, 235, 0.4);
    }

    .rot-download:disabled {
        opacity: .7;
        cursor: not-allowed;
    }

    .rot-download i {
        margin-right: 8px;
    }

    @media (max-width: 991px) {
        .rot-preview {
            min-height: 380px;
        }
    }

    @media (max-width: 575px) {
        .rot-preview {
            min-height: 320px;
            border-radius: 18px;
        }

        .rot-panel {
            padding: 16px;
            border-radius: 18px;
        }

        .rot-cancel {
            width: 100%;
            justify-content: center;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .rot-stage img {
            transition: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* =========================================================
           ELEMENTS
        ========================================================== */
        const navbar = document.getElementById('morphNavbar');
        if (navbar) {
            window.addEventListener('scroll', function() {
                navbar.classList.toggle('shadow-lg', window.scrollY > 30);
            });
        }

        const imageInput = document.getElementById('rotateImageInput');
        const uploadSection = document.getElementById('rotatorUploadSection');
        const editorSection = document.getElementById('rotatorEditorSection');
        const previewImage = document.getElementById('rotatePreviewImage');
        const previewStage = document.getElementById('previewContainer');
        const rotationSlider = document.getElementById('rotationSlider');
        const rotationInput = document.getElementById('rotationInput');
        const rotationInputApply = document.getElementById('rotationInputApply');
        const rotationAngle = document.getElementById('rotationAngle');
        const rotationAngleLarge = document.getElementById('rotationAngleLarge');
        const rotateLeftButton = document.getElementById('rotate90Left');
        const rotateRightButton = document.getElementById('rotate90Right');
        const rotate180Button = document.getElementById('rotate180');
        const resetButton = document.getElementById('rotateReset');
        const downloadButton = document.getElementById('rotateDownload');
        const chooseAnotherButton = document.getElementById('chooseAnotherImage');
        const seoCta = document.getElementById('rotatorSeoCta');

        const fileNameEl = document.getElementById('rotFileName');
        const dimensionsEl = document.getElementById('rotDimensions');
        const fileSizeEl = document.getElementById('rotFileSize');

        /* =========================================================
           STATE
        ========================================================== */
        let originalImage = null;
        let originalFileName = 'rotated-image';
        let originalMimeType = 'image/jpeg';
        let currentRotation = 0;

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        const maxSize = 50 * 1024 * 1024;

        const downloadDefaultHtml = '<i class="fas fa-download"></i> Download Image';

        /* =========================================================
           HELPERS
        ========================================================== */
        function normalizeAngle(angle) {
            angle = Number(angle);
            if (!Number.isFinite(angle)) {
                return 0;
            }
            angle = Math.round(angle) % 360;
            if (angle < 0) {
                angle += 360;
            }
            return angle;
        }

        function formatBytes(n) {
            if (!n) {
                return '0 B';
            }
            const units = ['B', 'KB', 'MB', 'GB'];
            const i = Math.min(units.length - 1, Math.floor(Math.log(n) / Math.log(1024)));
            return (n / Math.pow(1024, i)).toFixed(i ? 2 : 0) + ' ' + units[i];
        }

        /*
         * Fit the rotated preview inside the stage
         * (so rotated corners never get cut off)
         */
        function fitPreview() {
            if (!previewImage.getAttribute('src') || !previewImage.naturalWidth) {
                return;
            }

            const pad = 40;
            const cw = Math.max(50, previewStage.clientWidth - pad);
            const ch = Math.max(50, previewStage.clientHeight - pad);

            const nw = previewImage.naturalWidth;
            const nh = previewImage.naturalHeight;

            const base = Math.min(cw / nw, ch / nh, 1);
            const w = nw * base;
            const h = nh * base;

            previewImage.style.width = w + 'px';
            previewImage.style.height = h + 'px';

            const rad = currentRotation * Math.PI / 180;
            const sin = Math.abs(Math.sin(rad));
            const cos = Math.abs(Math.cos(rad));

            const bw = w * cos + h * sin;
            const bh = w * sin + h * cos;

            const scale = Math.min(1, cw / bw, ch / bh);

            previewImage.style.transform =
                `rotate(${currentRotation}deg) scale(${scale})`;
        }

        /* =========================================================
           UPDATE UI
        ========================================================== */
        function updateRotation() {
            currentRotation = normalizeAngle(currentRotation);

            fitPreview();

            if (rotationSlider) {
                rotationSlider.value = currentRotation;
            }
            if (rotationInput) {
                rotationInput.value = currentRotation;
            }
            if (rotationAngle) {
                rotationAngle.textContent = `${currentRotation}°`;
            }
            if (rotationAngleLarge) {
                rotationAngleLarge.textContent = `${currentRotation}°`;
            }
        }

        function showEditor() {
            uploadSection.classList.add('d-none');
            editorSection.classList.remove('d-none');
            fitPreview();
            setTimeout(function() {
                editorSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 100);
        }

        function showUpload() {
            editorSection.classList.add('d-none');
            uploadSection.classList.remove('d-none');
            uploadSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function resetDownloadButton() {
            if (!downloadButton) {
                return;
            }
            downloadButton.disabled = false;
            downloadButton.innerHTML = downloadDefaultHtml;
        }

        /* =========================================================
           SEO CTA
        ========================================================== */
        if (seoCta) {
            seoCta.addEventListener('click', function(event) {
                event.preventDefault();
                const target = editorSection.classList.contains('d-none') ?
                    uploadSection :
                    editorSection;
                const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            });
        }

        /* =========================================================
           IMAGE UPLOAD
        ========================================================== */
        if (imageInput) {
            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a JPG, PNG, WebP or GIF image.');
                    imageInput.value = '';
                    return;
                }

                if (file.size > maxSize) {
                    alert('Image size must be less than 50MB.');
                    imageInput.value = '';
                    return;
                }

                if (originalImage) {
                    URL.revokeObjectURL(originalImage);
                }

                originalImage = URL.createObjectURL(file);
                originalFileName = file.name.replace(/\.[^/.]+$/, '');
                originalMimeType = file.type;
                currentRotation = 0;

                fileNameEl.textContent = file.name;
                fileSizeEl.textContent = formatBytes(file.size);
                dimensionsEl.textContent = '—';

                previewImage.onload = function() {
                    dimensionsEl.textContent =
                        previewImage.naturalWidth + ' × ' + previewImage.naturalHeight + ' px';
                    fitPreview();
                };

                previewImage.src = originalImage;

                updateRotation();
                showEditor();
            });
        }

        /* =========================================================
           SLIDER
        ========================================================== */
        if (rotationSlider) {
            rotationSlider.addEventListener('input', function() {
                currentRotation = Number(this.value);
                updateRotation();
            });
        }

        /* =========================================================
           EXACT ANGLE
        ========================================================== */
        function applyExactAngle() {
            const angle = Number(rotationInput.value);

            if (rotationInput.value === '' || !Number.isFinite(angle)) {
                alert('Please enter a valid angle.');
                return;
            }

            if (angle < 0 || angle > 360) {
                alert('Please enter an angle between 0° and 360°.');
                return;
            }

            currentRotation = angle;
            updateRotation();
        }

        if (rotationInputApply) {
            rotationInputApply.addEventListener('click', applyExactAngle);
        }

        if (rotationInput) {
            rotationInput.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    applyExactAngle();
                }
            });
        }

        /* =========================================================
           QUICK BUTTONS
        ========================================================== */
        if (rotateLeftButton) {
            rotateLeftButton.addEventListener('click', function() {
                currentRotation -= 90;
                updateRotation();
            });
        }

        if (rotateRightButton) {
            rotateRightButton.addEventListener('click', function() {
                currentRotation += 90;
                updateRotation();
            });
        }

        if (rotate180Button) {
            rotate180Button.addEventListener('click', function() {
                currentRotation += 180;
                updateRotation();
            });
        }

        if (resetButton) {
            resetButton.addEventListener('click', function() {
                currentRotation = 0;
                updateRotation();
            });
        }

        /* =========================================================
           CANCEL & UPLOAD NEW
        ========================================================== */
        if (chooseAnotherButton) {
            chooseAnotherButton.addEventListener('click', function() {
                if (originalImage) {
                    URL.revokeObjectURL(originalImage);
                }

                originalImage = null;
                originalFileName = 'rotated-image';
                originalMimeType = 'image/jpeg';
                currentRotation = 0;

                imageInput.value = '';
                previewImage.onload = null;
                previewImage.removeAttribute('src');
                previewImage.style.width = '';
                previewImage.style.height = '';
                previewImage.style.transform = 'rotate(0deg)';

                fileNameEl.textContent = '—';
                dimensionsEl.textContent = '—';
                fileSizeEl.textContent = '—';

                updateRotation();
                showUpload();
            });
        }

        /* =========================================================
           DOWNLOAD
        ========================================================== */
        if (downloadButton) {
            downloadButton.addEventListener('click', function() {
                if (!originalImage) {
                    alert('Please upload an image first.');
                    return;
                }

                downloadButton.disabled = true;
                downloadButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span> Processing...';

                const image = new Image();

                image.onload = function() {
                    const angle = normalizeAngle(currentRotation);
                    const radians = angle * Math.PI / 180;
                    const sin = Math.abs(Math.sin(radians));
                    const cos = Math.abs(Math.cos(radians));

                    const width = image.naturalWidth;
                    const height = image.naturalHeight;

                    const canvas = document.createElement('canvas');
                    canvas.width = Math.max(1, Math.ceil(width * cos + height * sin));
                    canvas.height = Math.max(1, Math.ceil(width * sin + height * cos));

                    const context = canvas.getContext('2d');

                    if (!context) {
                        alert('Unable to process this image.');
                        resetDownloadButton();
                        return;
                    }

                    context.imageSmoothingEnabled = true;
                    context.imageSmoothingQuality = 'high';
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    context.translate(canvas.width / 2, canvas.height / 2);
                    context.rotate(radians);
                    context.drawImage(image, -width / 2, -height / 2, width, height);

                    /* ---------- OUTPUT FORMAT ---------- */
                    let outputType = originalMimeType;
                    let extension = 'jpg';

                    if (originalMimeType === 'image/gif') {
                        // Canvas cannot keep animated GIFs -> export as static PNG
                        outputType = 'image/png';
                        extension = 'png';
                    }
                    if (originalMimeType === 'image/png') {
                        outputType = 'image/png';
                        extension = 'png';
                    }
                    if (originalMimeType === 'image/webp') {
                        outputType = 'image/webp';
                        extension = 'webp';
                    }
                    if (originalMimeType === 'image/jpeg') {
                        outputType = 'image/jpeg';
                        extension = 'jpg';
                    }

                    canvas.toBlob(function(blob) {
                        if (!blob) {
                            alert('Unable to create the rotated image.');
                            resetDownloadButton();
                            return;
                        }

                        const downloadURL = URL.createObjectURL(blob);
                        const link = document.createElement('a');

                        link.href = downloadURL;
                        link.download = `${originalFileName}-rotated-${angle}deg.${extension}`;

                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        setTimeout(function() {
                            URL.revokeObjectURL(downloadURL);
                        }, 1000);

                        resetDownloadButton();
                    }, outputType, originalMimeType === 'image/jpeg' ? 0.95 : undefined);
                };

                image.onerror = function() {
                    alert('Unable to process this image.');
                    resetDownloadButton();
                };

                image.src = originalImage;
            });
        }

        /* =========================================================
           KEEP PREVIEW FITTED ON RESIZE
        ========================================================== */
        window.addEventListener('resize', fitPreview);

        /* =========================================================
           INITIAL STATE
        ========================================================== */
        updateRotation();
    });
</script>
@endsection
