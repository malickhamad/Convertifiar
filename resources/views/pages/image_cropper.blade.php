@extends('components.app')

@section('meta')
    <title>FREE Image Cropper: Crop Images Online | XConvertifire</title>
    <meta name="description" content="Crop JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Use custom sizes or aspect ratios for fast, secure, and precise image cropping." />
    <meta property="og:title" content="FREE Image Cropper: Crop Images Online | XConvertifire">
    <meta property="og:description" content="Crop JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Use custom sizes or aspect ratios for fast, secure, and precise image cropping.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('image.cropper') }}">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta property="og:site_name" content="XConvertifire">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE Image Cropper: Crop Images Online | XConvertifire">
    <meta name="twitter:description" content="Crop JPG, PNG, WebP, and GIF images online for FREE with XConvertifire. Use custom sizes or aspect ratios for fast, secure, and precise image cropping.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <meta name="twitter:image:alt" content="XConvertifire logo">
@endsection

@section('content')
    <main class="crop-page">

        <!-- Breadcrumb -->
        <section class="crop-breadcrumb-section">
            <div class="container">
                <div class="crop-breadcrumb">
                    <a href="{{ route('home') }}">
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
        <section class="crop-hero-section" id="heroSection">
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
                <div class="crop-upload-box cursor-pointer" id="uploadBox" onclick="document.getElementById('cropImageInput').click()">
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

        <!-- Crop Workspace (hidden initially) -->
        <section class="crop-workspace-section" id="cropWorkspace" style="display: none;">
            <div class="container">
                <div class="crop-workspace-header">
                    <h2>Edit Your Image</h2>
                    <button type="button" class="crop-cancel-btn" id="cancelCropBtn">
                        <i class="fas fa-times"></i>
                        Cancel & Upload New
                    </button>
                </div>

                <div class="crop-main-grid">
                    <!-- Left: Image Preview -->
                    <div class="crop-image-panel">
                        <div class="crop-image-container">
                            <img id="cropPreviewImage" src="" alt="Crop Preview">
                        </div>
                    </div>

                    <!-- Right: Controls -->
                    <div class="crop-controls-panel">
                        <!-- Aspect Ratio -->
                        <div class="crop-control-group">
                            <label class="crop-control-label">Aspect Ratio</label>
                            <div class="crop-ratio-buttons">
                                <button type="button" class="crop-ratio-btn active" data-ratio="free">Free</button>
                                <button type="button" class="crop-ratio-btn" data-ratio="1:1">1:1</button>
                                <button type="button" class="crop-ratio-btn" data-ratio="4:3">4:3</button>
                                <button type="button" class="crop-ratio-btn" data-ratio="16:9">16:9</button>
                                <button type="button" class="crop-ratio-btn" data-ratio="9:16">9:16</button>
                                <button type="button" class="crop-ratio-btn" data-ratio="3:4">3:4</button>
                            </div>
                        </div>

                        <!-- Dimensions -->
                        <div class="crop-control-group">
                            <label class="crop-control-label">Dimensions</label>
                            <div class="crop-input-row">
                                <div class="crop-input-wrapper">
                                    <span class="crop-input-prefix">W</span>
                                    <input type="number" id="cropWidthInput" class="crop-number-input" placeholder="Auto" min="1">
                                    <span class="crop-input-suffix">px</span>
                                </div>
                                <div class="crop-input-wrapper">
                                    <span class="crop-input-prefix">H</span>
                                    <input type="number" id="cropHeightInput" class="crop-number-input" placeholder="Auto" min="1">
                                    <span class="crop-input-suffix">px</span>
                                </div>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="crop-control-group">
                            <label class="crop-control-label">Position</label>
                            <div class="crop-input-row">
                                <div class="crop-input-wrapper">
                                    <span class="crop-input-prefix">X</span>
                                    <input type="number" id="cropXInput" class="crop-number-input" placeholder="0" step="1">
                                    <span class="crop-input-suffix">px</span>
                                </div>
                                <div class="crop-input-wrapper">
                                    <span class="crop-input-prefix">Y</span>
                                    <input type="number" id="cropYInput" class="crop-number-input" placeholder="0" step="1">
                                    <span class="crop-input-suffix">px</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="crop-action-buttons">
                            <button type="button" class="crop-action-btn" id="rotateLeftBtn">
                                <i class="fas fa-undo"></i>
                                Rotate Left
                            </button>
                            <button type="button" class="crop-action-btn" id="rotateRightBtn">
                                <i class="fas fa-redo"></i>
                                Rotate Right
                            </button>

                        </div>


                        <!-- Reset Button (separate, styled like cancel) -->
                        <button type="button" class="crop-reset-btn" id="resetCropBtn">
                            <i class="fas fa-sync-alt"></i>
                            Reset Changes
                        </button>
                          <button type="button" class="crop-action-btn crop-download-btn" id="downloadCroppedBtn">
                                <i class="fas fa-download"></i>
                                Download
                            </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bottom Benefits -->
        <section class="crop-benefits-section">
            <div class="container">
                <div class="crop-benefits-heading">
                    <span>WHY USE X Convertifire</span>
                    <h2>Simple. Fast. <strong>Precise.</strong></h2>
                    <p>Everything you need to crop your images without complicated software.</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="crop-benefit-card">
                            <div class="crop-benefit-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div>
                                <h4>Fast Processing</h4>
                                <p>Crop images quickly without installing any software.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="crop-benefit-card">
                            <div class="crop-benefit-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <div>
                                <h4>Flexible Cropping</h4>
                                <p>Use custom dimensions or predefined aspect ratios.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="crop-benefit-card">
                            <div class="crop-benefit-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h4>Secure & Private</h4>
                                <p>Your images remain protected while using our online image tools.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Cropper SEO guidance: informational content only -->
        {{-- <section class="crop-seo-section" aria-label="Image cropping guide">
            <div class="container">
                <div class="crop-seo-wrap">
                    <header class="crop-seo-intro">
                        <span class="crop-seo-eyebrow">IMAGE CROPPING GUIDE</span>
                        <h2>Free Image Cropper to Crop Photos Online</h2>
                        <p>Want to remove unwanted edges, focus on a subject, or prepare a picture for a particular layout? XConvertifire's free image cropper lets you crop images online using an interactive selection area and familiar aspect ratios.</p>
                        <p>Select a JPG, PNG, WebP, or GIF image up to 50 MB, adjust the area you want to keep, and download the cropped result. The current tool processes your image in your browser without requiring separate editing software.</p>
                        <p><strong>Important:</strong> The current cropper downloads a JPEG image, regardless of the input format. Transparent areas and animated GIF frames are not preserved in the output.</p>
                    </header>

                    <div class="crop-seo-block">
                        <h2>How to Crop an Image Online</h2>
                        <p>Follow these steps to make a crop with XConvertifire:</p>
                        <div class="crop-seo-steps">
                            <div class="crop-seo-step"><h3>1. Choose an Image</h3><p>Click <strong>Choose File</strong> and select a JPG/JPEG, PNG, WebP, or GIF file. The maximum accepted size is 50 MB per image, and the tool handles one image at a time.</p></div>
                            <div class="crop-seo-step"><h3>2. Select the Crop Area</h3><p>When the editing workspace opens, drag or adjust the crop box around the part of the image you want to keep. Review the framing before exporting.</p></div>
                            <div class="crop-seo-step"><h3>3. Pick an Aspect Ratio</h3><p>Choose <strong>Free</strong> for a flexible crop, or select 1:1, 4:3, 16:9, 9:16, or 3:4. Width and height inputs influence the selection and its proportions; they do not guarantee exact output pixel dimensions.</p></div>
                            <div class="crop-seo-step"><h3>4. Rotate or Reset</h3><p>Use <strong>Rotate Left</strong> or <strong>Rotate Right</strong> to turn the image in 90-degree increments. Choose <strong>Reset Changes</strong> to start over with the crop settings.</p></div>
                            <div class="crop-seo-step"><h3>5. Download Your Crop</h3><p>Click <strong>Download</strong>. The result is a JPEG called <code>X Convertifire-cropped-image.jpg</code>. Open it to confirm the composition, image quality, and dimensions before publishing.</p></div>
                        </div>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Understanding Image Crop Aspect Ratios</h2>
                        <p>An aspect ratio is the relationship between the width and height of the selected area. Picking the right ratio helps an image fit its destination without stretching the subject.</p>
                        <div class="crop-seo-grid">
                            <div class="crop-seo-card"><h3>Free Crop</h3><p>Adjust the crop area without locking it to a preset shape. Useful for removing a border or framing an unusual subject.</p></div>
                            <div class="crop-seo-card"><h3>1:1 Square</h3><p>Equal width and height. Useful for avatars, product tiles, and square profile pictures.</p></div>
                            <div class="crop-seo-card"><h3>4:3 Landscape</h3><p>A moderate landscape shape often suitable for photographs, galleries, and presentations.</p></div>
                            <div class="crop-seo-card"><h3>16:9 Widescreen</h3><p>A wide composition commonly used for website banners and landscape thumbnails. It does not set a specific pixel resolution.</p></div>
                            <div class="crop-seo-card"><h3>9:16 Portrait</h3><p>A tall vertical frame for mobile-first visuals and portrait-oriented layouts. Always check platform requirements.</p></div>
                            <div class="crop-seo-card"><h3>3:4 Portrait</h3><p>A shorter portrait option for photos that need a more moderate vertical composition.</p></div>
                        </div>
                    </div>

                    <div class="crop-seo-block">
                        <h2>How to Crop a Photo Without Stretching It</h2>
                        <p>Cropping removes the portions outside a selected rectangle. Stretching changes the relationship between width and height, potentially making people and objects look too narrow or wide.</p>
                        <p>For example, a 1200 &times; 800 pixel photo has a 3:2 aspect ratio. You can take a square crop from it without stretching the subjects, but content near its edges will be removed. Protect faces, text, and other details when positioning the crop.</p>
                        <p>If you want to change an entire image's width and height without removing part of the composition, resizing is a better fit.</p>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Crop JPG, PNG, WebP, and GIF Images</h2>
                        <h3>Crop JPG and JPEG Photos</h3>
                        <p>JPG/JPEG photographs can be reframed to remove distracting edges or emphasize a subject. The downloaded JPEG is re-encoded, so it should not be considered pixel-for-pixel identical to the original.</p>
                        <h3>Crop PNG Images</h3>
                        <p>PNG is common for screenshots, graphics, and images with transparency. You can upload a PNG, but the cropper exports JPEG, which does not support transparent pixels. If transparent output is essential, this cropper's current export workflow will not preserve it. For separate file-format tasks, explore the <a href="{{ route('image.converter') }}">online image converter</a> and confirm its available output formats.</p>
                        <h3>Crop WebP Images</h3>
                        <p>WebP works well for many modern web images. A WebP input can be cropped here, but the result will be JPEG rather than WebP. Check image appearance and file size after export.</p>
                        <h3>Crop GIF Images</h3>
                        <p>GIF input is accepted, including files containing animation. However, the current cropper exports one static JPEG image, not a new animated GIF. Use a dedicated animation editor if you need to preserve motion.</p>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Crop, Resize, or Compress: Which Tool Should You Use?</h2>
                        <h3>Crop to Improve Composition</h3>
                        <p>Choose cropping when you want to remove unwanted surroundings, center a subject, or create a new frame shape. A crop keeps only the selected area.</p>
                        <h3>Resize to Change Image Dimensions</h3>
                        <p>Resizing scales the image to a different width or height. It is more appropriate for specified pixel dimensions. Try the <a href="{{ route('image.resizer') }}">free image resizer</a> when exact image sizing matters.</p>
                        <h3>Compress to Reduce File Size</h3>
                        <p>Compression focuses on the amount of data in the file, measured in KB or MB. A crop can change file size but cannot guarantee a target KB value. For that goal, try the <a href="{{ route('image.compressor') }}">free image compressor</a>. Depending on your workflow, you may crop first, resize next, and then compress if needed.</p>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Practical Reasons to Crop Images</h2>
                        <h3>Profile Photos and Avatars</h3>
                        <p>A square crop helps you place a person in the center and remove distractions. Leave enough space around the face to avoid an awkward final frame.</p>
                        <h3>Website Banners and Blog Images</h3>
                        <p>Wide ratios help prepare landscape-oriented visuals, but a wide crop may cut off the top or bottom of the original picture. Google's <a href="https://web.dev/learn/design/responsive-images">responsive images guidance</a> explains how images can adapt to different layouts.</p>
                        <h3>Product Photography</h3>
                        <p>Crop unnecessary surroundings to draw attention to a product. Keep all essential features visible and avoid creating a misleading representation.</p>
                        <h3>Presentations and Documents</h3>
                        <p>Improve the framing of pictures placed in slides or documents without distorting the subject to force a particular shape.</p>
                        <h3>Screenshots and Graphics</h3>
                        <p>Remove empty borders or unrelated interface elements. Be careful with small text because JPEG export may be less suitable than the original lossless PNG for sharp screenshot details.</p>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Tips for Better Image Cropping Results</h2>
                        <ul class="crop-seo-tips">
                            <li><strong>Start with the subject.</strong> Decide what the viewer should notice before moving the selection.</li>
                            <li><strong>Choose the correct ratio.</strong> A square avatar and a wide banner require different framing.</li>
                            <li><strong>Protect important details.</strong> Keep faces, logos, product features, and essential text within the crop.</li>
                            <li><strong>Avoid excessive trimming.</strong> A tiny crop from a low-resolution source may lack the detail needed at its destination.</li>
                            <li><strong>Keep the original.</strong> An untouched file makes future crops easier.</li>
                            <li><strong>Review the exported file.</strong> Inspect the composition and fine detail after JPEG encoding.</li>
                        </ul>
                        <p>For technical background on how browser canvases produce downloadable image files, see MDN's <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob">Canvas toBlob documentation</a>.</p>
                    </div>

                    <div class="crop-seo-block">
                        <h2>Frequently Asked Questions About Image Cropping</h2>
                        <div class="crop-seo-faq">
                            <h3>Is XConvertifire's image cropper free?</h3>
                            <p>Yes. The image cropper is offered as a free online tool for selecting and downloading cropped portions of supported images.</p>
                            <h3>Which formats can I upload?</h3>
                            <p>JPG/JPEG, PNG, WebP, and GIF files up to 50 MB per image. The downloaded output is JPEG.</p>
                            <h3>Can I crop a picture into a square?</h3>
                            <p>Yes. Select 1:1 and position the crop box around the subject.</p>
                            <h3>Can I use 16:9 or 9:16?</h3>
                            <p>Yes. Both are available, alongside Free, 1:1, 4:3, and 3:4 aspect ratios.</p>
                            <h3>Can I rotate the image?</h3>
                            <p>Yes. The Rotate Left and Rotate Right buttons each turn the image by 90 degrees. For a separate rotation workflow, use the <a href="{{ route('image.rotator') }}">Image Rotator</a>.</p>
                            <h3>Can I set exact crop dimensions?</h3>
                            <p>The width and height fields influence the crop selection and its proportions, but the current export does not guarantee exact output pixel dimensions. Use the resizer for that separate task.</p>
                            <h3>Will a cropped PNG keep its transparency?</h3>
                            <p>No. The downloaded result is JPEG, which cannot store transparency.</p>
                            <h3>Can I crop an animated GIF and preserve its animation?</h3>
                            <p>No. The current export is a single static JPEG image.</p>
                            <h3>Does cropping always reduce the file size?</h3>
                            <p>No. File size also depends on dimensions, image content, and JPEG encoding. A smaller file is not guaranteed.</p>
                            <h3>Are images sent to a server for cropping?</h3>
                            <p>The current crop operation uses browser-side Cropper.js and canvas export; it does not require sending the selected file to a server-side cropping endpoint.</p>
                        </div>
                    </div>

                    <div class="crop-seo-block crop-seo-final">
                        <h2>Crop Your Image Online for Free</h2>
                        <p>Choose a supported image, select the composition you want, and inspect the resulting JPEG before sharing it. Start with the image uploader above.</p>
                        <a class="crop-seo-cta" href="#heroSection">Start Cropping Your Image</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="py-5">
    <div class="container">

        <!-- ═══ HERO ═══ -->
        <div class="seo-card shadow-lg mb-5">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">
                    <i class="fas fa-crop-alt me-1"></i> Image Cropping Guide
                </span>
                <h2 class="text-white fw-bold mb-3">Free Image Cropper to Crop Photos Online</h2>
                <p class="text-secondary mb-3">Want to remove unwanted edges, focus on a subject, or prepare a picture for a particular layout? XConvertifire's free image cropper lets you crop images online using an interactive selection area and familiar aspect ratios.</p>
                <p class="text-secondary mb-3">Select a JPG, PNG, WebP, or GIF image up to 50 MB, adjust the area you want to keep, and download the cropped result. The current tool processes your image in your browser without requiring separate editing software.</p>
                <p class="text-secondary mb-0"><strong class="text-white">Important:</strong> The current cropper downloads a JPEG image, regardless of the input format. Transparent areas and animated GIF frames are not preserved in the output.</p>
            </div>
        </div>

        <!-- ═══ STEPS ═══ -->
        <div class="text-center mb-4">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">How It Works</span>
            <h2 class="text-white fw-bold mb-2">How to Crop an Image Online</h2>
            <p class="text-secondary mb-0">Follow these steps to make a crop with XConvertifire:</p>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">1. Choose an Image</h3>
                        <p class="text-secondary small mb-0">Click <strong class="text-white">Choose File</strong> and select a JPG/JPEG, PNG, WebP, or GIF file. The maximum accepted size is 50 MB per image, and the tool handles one image at a time.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-crop-alt"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">2. Select the Crop Area</h3>
                        <p class="text-secondary small mb-0">When the editing workspace opens, drag or adjust the crop box around the part of the image you want to keep. Review the framing before exporting.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">3. Pick an Aspect Ratio</h3>
                        <p class="text-secondary small mb-0">Choose <strong class="text-white">Free</strong> for a flexible crop, or select 1:1, 4:3, 16:9, 9:16, or 3:4. Width and height inputs influence the selection and its proportions; they do not guarantee exact output pixel dimensions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">4. Rotate or Reset</h3>
                        <p class="text-secondary small mb-0">Use <strong class="text-white">Rotate Left</strong> or <strong class="text-white">Rotate Right</strong> to turn the image in 90-degree increments. Choose <strong class="text-white">Reset Changes</strong> to start over with the crop settings.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-download"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-2">5. Download Your Crop</h3>
                        <p class="text-secondary small mb-0">Click <strong class="text-white">Download</strong>. The result is a JPEG called <code class="text-white">X Convertifire-cropped-image.jpg</code>. Open it to confirm the composition, image quality, and dimensions before publishing.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ ASPECT RATIOS ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">Aspect Ratios</span>
            <h2 class="text-white fw-bold mb-2">Understanding Image Crop Aspect Ratios</h2>
            <p class="text-secondary mb-0">An aspect ratio is the relationship between the width and height of the selected area. Picking the right ratio helps an image fit its destination without stretching the subject.</p>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-expand text-primary me-2"></i>Free Crop</h3>
                        <p class="text-secondary small mb-0">Adjust the crop area without locking it to a preset shape. Useful for removing a border or framing an unusual subject.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-square text-primary me-2"></i>1:1 Square</h3>
                        <p class="text-secondary small mb-0">Equal width and height. Useful for avatars, product tiles, and square profile pictures.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-image text-primary me-2"></i>4:3 Landscape</h3>
                        <p class="text-secondary small mb-0">A moderate landscape shape often suitable for photographs, galleries, and presentations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-tv text-primary me-2"></i>16:9 Widescreen</h3>
                        <p class="text-secondary small mb-0">A wide composition commonly used for website banners and landscape thumbnails. It does not set a specific pixel resolution.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-mobile-alt text-primary me-2"></i>9:16 Portrait</h3>
                        <p class="text-secondary small mb-0">A tall vertical frame for mobile-first visuals and portrait-oriented layouts. Always check platform requirements.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h6 text-white fw-semibold mb-3"><i class="fas fa-user text-primary me-2"></i>3:4 Portrait</h3>
                        <p class="text-secondary small mb-0">A shorter portrait option for photos that need a more moderate vertical composition.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ WITHOUT STRETCHING ═══ -->
        <div class="seo-card shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-white fw-bold h4 mb-3">How to Crop a Photo Without Stretching It</h2>
                <p class="text-secondary mb-3">Cropping removes the portions outside a selected rectangle. Stretching changes the relationship between width and height, potentially making people and objects look too narrow or wide.</p>
                <p class="text-secondary mb-3">For example, a 1200 &times; 800 pixel photo has a 3:2 aspect ratio. You can take a square crop from it without stretching the subjects, but content near its edges will be removed. Protect faces, text, and other details when positioning the crop.</p>
                <p class="text-secondary mb-0">If you want to change an entire image's width and height without removing part of the composition, resizing is a better fit.</p>
            </div>
        </div>

        <!-- ═══ FORMATS ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">Format Guide</span>
            <h2 class="text-white fw-bold mb-0">Crop JPG, PNG, WebP, and GIF Images</h2>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-warning bg-opacity-10 border border-warning border-opacity-25 text-warning mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Crop JPG and JPEG Photos</h3>
                        <p class="text-secondary small mb-0">JPG/JPEG photographs can be reframed to remove distracting edges or emphasize a subject. The downloaded JPEG is re-encoded, so it should not be considered pixel-for-pixel identical to the original.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-info bg-opacity-10 border border-info border-opacity-25 text-info mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Crop PNG Images</h3>
                        <p class="text-secondary small mb-0">PNG is common for screenshots, graphics, and images with transparency. You can upload a PNG, but the cropper exports JPEG, which does not support transparent pixels. If transparent output is essential, this cropper's current export workflow will not preserve it. For separate file-format tasks, explore the <a href="{{ route('image.converter') }}" class="text-primary">online image converter</a> and confirm its available output formats.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-success bg-opacity-10 border border-success border-opacity-25 text-success mb-3">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Crop WebP Images</h3>
                        <p class="text-secondary small mb-0">WebP works well for many modern web images. A WebP input can be cropped here, but the result will be JPEG rather than WebP. Check image appearance and file size after export.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-danger bg-opacity-10 border border-danger border-opacity-25 text-danger mb-3">
                            <i class="fas fa-film"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Crop GIF Images</h3>
                        <p class="text-secondary small mb-0">GIF input is accepted, including files containing animation. However, the current cropper exports one static JPEG image, not a new animated GIF. Use a dedicated animation editor if you need to preserve motion.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ CROP VS RESIZE VS COMPRESS ═══ -->
        <div class="seo-card shadow-sm mb-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-white fw-bold h4 mb-3">Crop, Resize, or Compress: Which Tool Should You Use?</h2>

                <h3 class="text-white fw-semibold h6 mt-4 mb-2">Crop to Improve Composition</h3>
                <p class="text-secondary mb-4">Choose cropping when you want to remove unwanted surroundings, center a subject, or create a new frame shape. A crop keeps only the selected area.</p>

                <h3 class="text-white fw-semibold h6 mb-2">Resize to Change Image Dimensions</h3>
                <p class="text-secondary mb-4">Resizing scales the image to a different width or height. It is more appropriate for specified pixel dimensions. Try the <a href="{{ route('image.resizer') }}" class="text-primary">free image resizer</a> when exact image sizing matters.</p>

                <h3 class="text-white fw-semibold h6 mb-2">Compress to Reduce File Size</h3>
                <p class="text-secondary mb-0">Compression focuses on the amount of data in the file, measured in KB or MB. A crop can change file size but cannot guarantee a target KB value. For that goal, try the <a href="{{ route('image.compressor') }}" class="text-primary">free image compressor</a>. Depending on your workflow, you may crop first, resize next, and then compress if needed.</p>
            </div>
        </div>

        <!-- ═══ WHY CROP ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">Common Uses</span>
            <h2 class="text-white fw-bold mb-0">Practical Reasons to Crop Images</h2>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Profile Photos and Avatars</h3>
                        <p class="text-secondary small mb-0">A square crop helps you place a person in the center and remove distractions. Leave enough space around the face to avoid an awkward final frame.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Website Banners and Blog Images</h3>
                        <p class="text-secondary small mb-0">Wide ratios help prepare landscape-oriented visuals, but a wide crop may cut off the top or bottom of the original picture. Google's <a href="https://web.dev/learn/design/responsive-images" class="text-primary">responsive images guidance</a> explains how images can adapt to different layouts.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Product Photography</h3>
                        <p class="text-secondary small mb-0">Crop unnecessary surroundings to draw attention to a product. Keep all essential features visible and avoid creating a misleading representation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-file-powerpoint"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Presentations and Documents</h3>
                        <p class="text-secondary small mb-0">Improve the framing of pictures placed in slides or documents without distorting the subject to force a particular shape.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="seo-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-3 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-primary mb-3">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h3 class="h6 text-white fw-semibold mb-3">Screenshots and Graphics</h3>
                        <p class="text-secondary small mb-0">Remove empty borders or unrelated interface elements. Be careful with small text because JPEG export may be less suitable than the original lossless PNG for sharp screenshot details.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ TIPS ═══ -->
        <div class="seo-card shadow-sm mb-5">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 mb-3">Best Practices</span>
                <h2 class="text-white fw-bold h4 mb-4">Tips for Better Image Cropping Results</h2>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Start with the subject.</strong> Decide what the viewer should notice before moving the selection.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Choose the correct ratio.</strong> A square avatar and a wide banner require different framing.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Protect important details.</strong> Keep faces, logos, product features, and essential text within the crop.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Avoid excessive trimming.</strong> A tiny crop from a low-resolution source may lack the detail needed at its destination.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Keep the original.</strong> An untouched file makes future crops easier.</p>
                    </div>
                    <div class="d-flex gap-3">
                        <i class="fas fa-check-circle text-success mt-1 flex-shrink-0"></i>
                        <p class="text-secondary small mb-0"><strong class="text-white">Review the exported file.</strong> Inspect the composition and fine detail after JPEG encoding.</p>
                    </div>
                </div>
                <p class="text-secondary small mt-4 mb-0">For technical background on how browser canvases produce downloadable image files, see MDN's <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob" class="text-primary">Canvas toBlob documentation</a>.</p>
            </div>
        </div>

        <!-- ═══ FAQ ═══ -->
        <div class="text-center mb-4 mt-5">
            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 mb-3">FAQ</span>
            <h2 class="text-white fw-bold mb-0">Frequently Asked Questions About Image Cropping</h2>
        </div>

        <div class="accordion mb-5" id="cropperFaqAccordion">

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqOne">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Is XConvertifire's image cropper free?
                    </button>
                </h3>
                <div id="cfaqOne" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        Yes. The image cropper is offered as a free online tool for selecting and downloading cropped portions of supported images.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqTwo">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Which formats can I upload?
                    </button>
                </h3>
                <div id="cfaqTwo" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        JPG/JPEG, PNG, WebP, and GIF files up to 50 MB per image. The downloaded output is JPEG.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqThree">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I crop a picture into a square?
                    </button>
                </h3>
                <div id="cfaqThree" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Select 1:1 and position the crop box around the subject.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqFour">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I use 16:9 or 9:16?
                    </button>
                </h3>
                <div id="cfaqFour" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        Yes. Both are available, alongside Free, 1:1, 4:3, and 3:4 aspect ratios.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqFive">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I rotate the image?
                    </button>
                </h3>
                <div id="cfaqFive" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        Yes. The Rotate Left and Rotate Right buttons each turn the image by 90 degrees. For a separate rotation workflow, use the <a href="{{ route('image.rotator') }}" class="text-primary">Image Rotator</a>.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqSix">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I set exact crop dimensions?
                    </button>
                </h3>
                <div id="cfaqSix" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        The width and height fields influence the crop selection and its proportions, but the current export does not guarantee exact output pixel dimensions. Use the resizer for that separate task.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqSeven">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Will a cropped PNG keep its transparency?
                    </button>
                </h3>
                <div id="cfaqSeven" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        No. The downloaded result is JPEG, which cannot store transparency.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqEight">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Can I crop an animated GIF and preserve its animation?
                    </button>
                </h3>
                <div id="cfaqEight" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        No. The current export is a single static JPEG image.
                    </div>
                </div>
            </div>

            <div class="seo-card mb-2 overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqNine">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Does cropping always reduce the file size?
                    </button>
                </h3>
                <div id="cfaqNine" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        No. File size also depends on dimensions, image content, and JPEG encoding. A smaller file is not guaranteed.
                    </div>
                </div>
            </div>

            <div class="seo-card overflow-hidden">
                <h3 class="accordion-header m-0">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cfaqTen">
                        <i class="fas fa-question-circle text-primary me-2"></i>
                        Are images sent to a server for cropping?
                    </button>
                </h3>
                <div id="cfaqTen" class="accordion-collapse collapse" data-bs-parent="#cropperFaqAccordion">
                    <div class="accordion-body small">
                        The current crop operation uses browser-side Cropper.js and canvas export; it does not require sending the selected file to a server-side cropping endpoint.
                    </div>
                </div>
            </div>

        </div>

        <!-- ═══ FINAL CTA ═══ -->
        <div class="seo-card shadow-lg">
            <div class="card-body p-4 p-md-5 text-center">
                <h2 class="text-white fw-bold mb-3">Crop Your Image Online for Free</h2>
                <p class="text-secondary mb-4">Choose a supported image, select the composition you want, and inspect the resulting JPEG before sharing it. Start with the image uploader above.</p>
                <a href="#heroSection" class="btn btn-primary btn-lg fw-semibold px-4 py-2">
                    <i class="fas fa-crop-alt me-2"></i>Start Cropping Your Image
                </a>
            </div>
        </div>

    </div>
</section>


    </main>
@endsection

@section('scripts')
    <!-- Cropper.js CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

    <style>
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
</style>

    <style>
        /* Image Cropper SEO information only. Never affects crop workspace. */
        .crop-seo-section { padding: 12px 0 96px; }
        .crop-seo-wrap { max-width: 960px; margin: 0 auto; color: #d4d4d8; line-height: 1.75; overflow-wrap: anywhere; }
        .crop-seo-intro { text-align: center; margin-bottom: 46px; }
        .crop-seo-eyebrow { display: inline-block; margin-bottom: 15px; color: #93c5fd; font-size: .72rem; font-weight: 700; letter-spacing: .12em; }
        .crop-seo-wrap h2 { color: #f8fafc; font-weight: 750; font-size: clamp(1.55rem, 3vw, 2.05rem); line-height: 1.3; margin: 0 0 18px; }
        .crop-seo-wrap h3 { color: #f4f4f5; font-size: 1.1rem; line-height: 1.4; font-weight: 700; margin: 26px 0 10px; }
        .crop-seo-wrap p { margin: 0 0 17px; color: #b5b5bf; line-height: 1.78; }
        .crop-seo-wrap strong { color: #f4f4f5; }
        .crop-seo-wrap a:not(.crop-seo-cta) { color: #93c5fd; text-decoration: underline; text-underline-offset: 3px; }
        .crop-seo-wrap a:hover, .crop-seo-wrap a:focus-visible { color: #bfdbfe; }
        .crop-seo-wrap a:focus-visible { outline: 2px solid #60a5fa; outline-offset: 3px; }
        .crop-seo-block { margin: 0 0 52px; }
        .crop-seo-steps { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; margin-top: 24px; }
        .crop-seo-step, .crop-seo-card { min-width: 0; border: 1px solid rgba(255,255,255,.11); border-radius: 16px; background: #111113; padding: 22px; }
        .crop-seo-step h3, .crop-seo-card h3 { margin: 0 0 10px; }
        .crop-seo-step p:last-child, .crop-seo-card p:last-child { margin-bottom: 0; }
        .crop-seo-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; margin-top: 24px; }
        .crop-seo-tips { padding-left: 23px; margin: 0 0 22px; }
        .crop-seo-tips li { margin-bottom: 11px; color: #b5b5bf; }
        .crop-seo-faq h3 { padding-top: 9px; border-top: 1px solid rgba(255,255,255,.08); }
        .crop-seo-final { text-align: center; padding: 26px 20px; border: 1px solid rgba(96,165,250,.3); border-radius: 17px; background: rgba(59,130,246,.055); }
        .crop-seo-cta { display: inline-flex; justify-content: center; align-items: center; margin-top: 8px; padding: 12px 24px; border: 1px solid #60a5fa; border-radius: 10px; color: #fff; background: #2563eb; font-weight: 700; text-decoration: none; }
        .crop-seo-cta:hover, .crop-seo-cta:focus-visible { background: #1d4ed8; color: #fff; }
        @media (max-width: 767px) {
            .crop-seo-section { padding: 8px 0 66px; }
            .crop-seo-intro { margin-bottom: 34px; }
            .crop-seo-block { margin-bottom: 40px; }
            .crop-seo-steps, .crop-seo-grid { grid-template-columns: minmax(0, 1fr); gap: 12px; }
            .crop-seo-step, .crop-seo-card { padding: 18px; }
            .crop-seo-final { padding: 24px 16px; }
        }
        /* =========================================
           CROP WORKSPACE STYLES
        ========================================= */
        .crop-workspace-section {
            padding: 30px 0 60px;
        }

        .crop-workspace-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .crop-workspace-header h2 {
            margin: 0;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .crop-cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            color: #d4d4d8;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .crop-cancel-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.4);
            color: #f87171;
            transform: translateY(-1px);
        }

        .crop-main-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 30px;
            align-items: start;
        }

        /* Left Image Panel */
        .crop-image-panel {
            position: relative;
        }

        .crop-image-container {
            width: 100%;
            max-height: 600px;
            background: #0a0a0a;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
        }

        .crop-image-container img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        /* Right Controls Panel */
        .crop-controls-panel {
            background: #111113;
            border: 1px solid #1f1f23;
            border-radius: 20px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .crop-control-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .crop-control-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #a1a1aa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .crop-ratio-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .crop-ratio-btn {
            padding: 9px 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.04);
            color: #a1a1aa;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .crop-ratio-btn:hover,
        .crop-ratio-btn.active {
            background: rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
            color: #60a5fa;
        }

        .crop-input-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .crop-input-wrapper {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 0 12px;
            transition: border-color 0.25s ease;
        }

        .crop-input-wrapper:focus-within {
            border-color: rgba(59, 130, 246, 0.6);
        }

        .crop-input-prefix {
            font-size: 0.8rem;
            font-weight: 700;
            color: #71717a;
            margin-right: 8px;
        }

        .crop-input-suffix {
            font-size: 0.8rem;
            color: #71717a;
            margin-left: 8px;
        }

        .crop-number-input {
            width: 70px;
            background: transparent;
            border: none;
            outline: none;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 11px 0;
            text-align: center;
        }

        .crop-number-input::placeholder {
            color: #52525b;
        }

        .crop-number-input::-webkit-inner-spin-button,
        .crop-number-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .crop-number-input[type="number"] {
            -moz-appearance: textfield;
        }

        .crop-action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 4px;
        }

        .crop-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.04);
            color: #a1a1aa;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            flex: 1;
            min-width: 100px;
        }

        .crop-action-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .crop-action-btn i {
            font-size: 0.8rem;
        }

        .crop-download-btn {
            background: #3b82f6;
            border-color: #3b82f6;
            color: #fff;
            flex: 2;
        }

        .crop-download-btn:hover {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        /* Reset Button (styled like cancel button) */
        .crop-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            color: #d4d4d8;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: -8px;
        }

        .crop-reset-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.4);
            color: #f87171;
            transform: translateY(-1px);
        }

        .crop-reset-btn i {
            font-size: 0.85rem;
        }

        /* Cropper.js Dark Theme Overrides */
        .crop-image-container .cropper-container {
            background: #0a0a0a;
        }

        .crop-image-container .cropper-modal {
            background-color: #000;
            opacity: 0.55;
        }

        .crop-image-container .cropper-view-box {
            outline: 2px solid #3b82f6;
            outline-color: #3b82f6;
        }

        .crop-image-container .cropper-face {
            background: transparent;
        }

        .crop-image-container .cropper-line {
            background-color: #3b82f6;
        }

        .crop-image-container .cropper-point {
            background-color: #fff;
            width: 9px;
            height: 9px;
            opacity: 1;
        }

        .crop-image-container .cropper-dashed {
            border-color: rgba(255, 255, 255, 0.35);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .crop-main-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .crop-controls-panel {
                order: 2;
            }

            .crop-image-container {
                max-height: 450px;
            }
        }

        @media (max-width: 600px) {
            .crop-workspace-header {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .crop-workspace-header h2 {
                font-size: 1.4rem;
            }

            .crop-controls-panel {
                padding: 20px 16px;
            }

            .crop-input-wrapper {
                flex: 1;
            }

            .crop-number-input {
                width: 100%;
            }

            .crop-action-btn {
                min-width: calc(50% - 4px);
                flex: 0 0 calc(50% - 4px);
            }

            .crop-download-btn {
                flex: 0 0 100%;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Elements
            const uploadBox = document.getElementById('uploadBox');
            const heroSection = document.getElementById('heroSection');
            const cropWorkspace = document.getElementById('cropWorkspace');
            const cropCta = document.querySelector('.crop-seo-final .crop-seo-cta');
            const fileInput = document.getElementById('cropImageInput');
            const previewImage = document.getElementById('cropPreviewImage');
            const cancelBtn = document.getElementById('cancelCropBtn');

            const ratioBtns = document.querySelectorAll('.crop-ratio-btn');
            const widthInput = document.getElementById('cropWidthInput');
            const heightInput = document.getElementById('cropHeightInput');
            const xInput = document.getElementById('cropXInput');
            const yInput = document.getElementById('cropYInput');

            const rotateLeftBtn = document.getElementById('rotateLeftBtn');
            const rotateRightBtn = document.getElementById('rotateRightBtn');
            const resetBtn = document.getElementById('resetCropBtn');
            const downloadBtn = document.getElementById('downloadCroppedBtn');

            let cropper = null;
            let originalImageUrl = null;
            let updatingInputs = false;

            cropCta.addEventListener('click', function (event) {
                event.preventDefault();

                const target = window.getComputedStyle(heroSection).display === 'none'
                    ? cropWorkspace
                    : heroSection;
                const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            });

            function initCropper() {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }

                cropper = new Cropper(previewImage, {
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
                    highlight: true,
                    ready: function() {
                        updatePositionInputs();
                    },
                    crop: function() {
                        updatePositionInputs();
                    },
                    cropend: function() {
                        updatePositionInputs();
                    }
                });
            }

            function updatePositionInputs() {
                if (!cropper || updatingInputs) return;

                const data = cropper.getCropBoxData();
                updatingInputs = true;
                xInput.value = Math.round(data.left);
                yInput.value = Math.round(data.top);
                updatingInputs = false;
            }

            // File upload
            fileInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                if (!file) return;

                const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a JPG, PNG, WebP or GIF image.');
                    fileInput.value = '';
                    return;
                }

                const maxSize = 50 * 1024 * 1024;
                if (file.size > maxSize) {
                    alert('Image size must be less than 50MB.');
                    fileInput.value = '';
                    return;
                }

                const imageURL = URL.createObjectURL(file);
                originalImageUrl = imageURL;

                previewImage.src = imageURL;
                previewImage.onload = function () {
                    // Hide upload section, show workspace
                    uploadBox.classList.add('hidden');
                    heroSection.style.display = 'none';
                    cropWorkspace.style.display = 'block';

                    initCropper();

                    // Scroll to workspace
                    setTimeout(function() {
                        cropWorkspace.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 200);
                };
            });

            // Cancel button
            cancelBtn.addEventListener('click', function () {
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }

                if (originalImageUrl) {
                    URL.revokeObjectURL(originalImageUrl);
                    originalImageUrl = null;
                }

                // Reset inputs
                fileInput.value = '';
                widthInput.value = '';
                heightInput.value = '';
                xInput.value = '';
                yInput.value = '';

                // Show upload section, hide workspace
                uploadBox.classList.remove('hidden');
                heroSection.style.display = 'block';
                cropWorkspace.style.display = 'none';

                // Reset ratio buttons
                ratioBtns.forEach(btn => btn.classList.remove('active'));
                ratioBtns[0].classList.add('active');

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Aspect ratio buttons
            ratioBtns.forEach(function (button) {
                button.addEventListener('click', function () {
                    ratioBtns.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    if (!cropper) return;

                    const ratio = this.dataset.ratio;

                    switch (ratio) {
                        case 'free':
                            cropper.setAspectRatio(NaN);
                            break;
                        case '1:1':
                            cropper.setAspectRatio(1);
                            break;
                        case '4:3':
                            cropper.setAspectRatio(4 / 3);
                            break;
                        case '16:9':
                            cropper.setAspectRatio(16 / 9);
                            break;
                        case '9:16':
                            cropper.setAspectRatio(9 / 16);
                            break;
                        case '3:4':
                            cropper.setAspectRatio(3 / 4);
                            break;
                    }
                });
            });

            // Auto-apply width/height
            widthInput.addEventListener('input', function () {
                if (!cropper) return;
                const w = parseFloat(this.value);
                const h = parseFloat(heightInput.value);

                if (w > 0 && h > 0) {
                    cropper.setAspectRatio(w / h);
                } else if (w > 0) {
                    // Only width set, adjust height based on current ratio
                    const data = cropper.getCropBoxData();
                    if (data.height > 0) {
                        const ratio = data.width / data.height;
                        heightInput.value = Math.round(w / ratio);
                        cropper.setAspectRatio(w / (w / ratio));
                    }
                }
            });

            heightInput.addEventListener('input', function () {
                if (!cropper) return;
                const w = parseFloat(widthInput.value);
                const h = parseFloat(this.value);

                if (w > 0 && h > 0) {
                    cropper.setAspectRatio(w / h);
                } else if (h > 0) {
                    const data = cropper.getCropBoxData();
                    if (data.width > 0) {
                        const ratio = data.width / data.height;
                        widthInput.value = Math.round(h * ratio);
                        cropper.setAspectRatio((h * ratio) / h);
                    }
                }
            });

            // Auto-apply position
            xInput.addEventListener('input', function () {
                if (!cropper || updatingInputs) return;
                const x = parseFloat(this.value);
                if (!isNaN(x)) {
                    const data = cropper.getCropBoxData();
                    const canvasData = cropper.getCanvasData();
                    const newX = Math.min(Math.max(x, 0), canvasData.width - data.width);
                    cropper.setCropBoxData({ left: newX });
                }
            });

            yInput.addEventListener('input', function () {
                if (!cropper || updatingInputs) return;
                const y = parseFloat(this.value);
                if (!isNaN(y)) {
                    const data = cropper.getCropBoxData();
                    const canvasData = cropper.getCanvasData();
                    const newY = Math.min(Math.max(y, 0), canvasData.height - data.height);
                    cropper.setCropBoxData({ top: newY });
                }
            });

            // Rotate buttons
            rotateLeftBtn.addEventListener('click', function () {
                if (cropper) cropper.rotate(-90);
            });

            rotateRightBtn.addEventListener('click', function () {
                if (cropper) cropper.rotate(90);
            });

            // Reset button
            resetBtn.addEventListener('click', function () {
                if (cropper) cropper.reset();

                // Reset ratio buttons
                ratioBtns.forEach(btn => btn.classList.remove('active'));
                ratioBtns[0].classList.add('active');

                widthInput.value = '';
                heightInput.value = '';
            });

            // Download button
            downloadBtn.addEventListener('click', function () {
                if (!cropper) {
                    alert('Please upload an image first.');
                    return;
                }

                const canvas = cropper.getCroppedCanvas({
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high'
                });

                if (!canvas) {
                    alert('Unable to crop this image.');
                    return;
                }

                canvas.toBlob(function (blob) {
                    if (!blob) return;

                    const downloadURL = URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = downloadURL;
                    link.download = 'X Convertifire-cropped-image.jpg';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    setTimeout(function () {
                        URL.revokeObjectURL(downloadURL);
                    }, 1000);
                }, 'image/jpeg', 0.95);
            });
        });
    </script>
@endsection
