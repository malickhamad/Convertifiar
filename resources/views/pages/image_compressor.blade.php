@extends('components.app')

@section('meta')
    <title>FREE Image Compressor: Reduce Image Size | XConvertifire</title>
    <meta name="description" content="Compress JPG, PNG, SVG, and WebP images for FREE with XConvertifire. Reduce image file size online for FREE while keeping quality with fast, secure compression." />

    <meta property="og:title" content="FREE Image Compressor: Reduce Image Size | XConvertifire">
    <meta property="og:description" content="Compress JPG, PNG, SVG, and WebP images for FREE with XConvertifire. Reduce image file size online for FREE while keeping quality with fast, secure compression.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('image.compressor') }}">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta property="og:site_name" content="XConvertifire">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE Image Compressor: Reduce Image Size | XConvertifire">
    <meta name="twitter:description" content="Compress JPG, PNG, SVG, and WebP images for FREE with XConvertifire. Reduce image file size online for FREE while keeping quality with fast, secure compression.">
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
                    <span>Image Compressor</span>
                </div>
            </div>
        </section>

        <!-- Hero / Upload Section -->
        <section class="crop-hero-section" id="uploadSection">
            <div class="container">
                <div class="crop-heading">
                    <span class="crop-small-badge">
                        <i class="fas fa-compress-alt"></i>
                        Image Tool
                    </span>
                    <h1>
                        Compress Your Images<br>
                        <span>With Adjustable Quality.</span>
                    </h1>
                    <p>
                        Try to reduce JPG, PNG, and WebP file sizes with adjustable options.
                        SVG can be optimized, while GIF files are returned unchanged.
                    </p>
                </div>

                <!-- Upload Box -->
                <div class="crop-upload-box cursor-pointer" id="compressUploadBox" onclick="document.getElementById('compressImageInput').click()">
                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h3>Upload your image</h3>
                    <p class="crop-upload-text">Drag & drop your image here or</p>
                    <label for="compressImageInput" class="crop-upload-btn">
                        <i class="fas fa-upload"></i>
                        Choose File
                    </label>
                    <input type="file" id="compressImageInput" accept="image/jpeg,image/png,image/svg+xml,image/gif,image/webp" hidden>
                    <p class="crop-upload-info">
                        Supports JPG, PNG, SVG, GIF, WebP
                        <span>|</span>
                        Max size: 50MB
                    </p>
                </div>
            </div>
        </section>

        <!-- Compressor Workspace (hidden initially) -->
        <section class="compressor-workspace-section" id="compressorWorkspace" style="display: none;">
            <div class="container">
                <div class="compressor-workspace-header">
                    <h2>Compress Your Image</h2>
                    <button type="button" class="compressor-cancel-btn" id="cancelCompressBtn">
                        <i class="fas fa-times"></i>
                        Cancel & Upload New
                    </button>
                </div>

                <div class="compressor-main-grid">
                    <!-- Left: Image Preview -->
                    <div class="compressor-image-panel">
                        <div class="compressor-image-container">
                            <img id="uploadedImagePreview" src="" alt="Image Preview">
                        </div>
                    </div>

                    <!-- Right: Controls -->
                    <div class="compressor-controls-panel">

                        <div class="bg-dark border rounded-3 p-3">
    <div class="d-flex justify-content-between mb-2">
        <span class="text-secondary">File:</span>
        <strong class="text-white text-break" id="fileName">-</strong>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-secondary">Size:</span>
        <strong class="text-white" id="fileSize">-</strong>
    </div>

    <div class="d-flex justify-content-between">
        <span class="text-secondary">Type:</span>
        <strong class="text-white" id="fileType">-</strong>
    </div>
</div>
                        <!-- Compression Quality -->
                        <div class="compressor-control-group">
                            <label class="compressor-control-label">Compression Quality</label>
                            <div class="compressor-quality-presets">
                                <button type="button" class="compressor-quality-btn" data-quality="90">High</button>
                                <button type="button" class="compressor-quality-btn active" data-quality="75">Recommended</button>
                                <button type="button" class="compressor-quality-btn" data-quality="60">Balanced</button>
                                <button type="button" class="compressor-quality-btn" data-quality="40">Small Size</button>
                            </div>
                            <div class="compressor-slider-wrapper">
                                <div class="compressor-slider-header">
                                    <span>Quality</span>
                                    <strong><span id="qualityValue">75</span>%</strong>
                                </div>
                                <input type="range" id="compressionQuality" min="10" max="100" value="75" step="5" class="compressor-slider">
                            </div>
                        </div>

                        <!-- Compression Result -->
                        <div class="compressor-control-group" id="compressionResult" style="display: none;">
                            <label class="compressor-control-label">Compression Result</label>
                            <div class="compressor-result-box">
                                <div class="compressor-result-item">
                                    <span>Original:</span>
                                    <strong id="originalResultSize">-</strong>
                                </div>
                                <div class="compressor-result-item">
                                    <span>Compressed:</span>
                                    <strong id="compressedResultSize">-</strong>
                                </div>
                                <div class="compressor-result-item">
                                    <span>Saved:</span>
                                    <strong id="savedResult" class="compressor-saved-text">-</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        {{-- <div class="compressor-action-buttons">
                            <button type="button" class="compressor-action-btn compressor-compress-btn" id="compressButton">
                                <i class="fas fa-compress-alt"></i>
                                Compress Image
                            </button>
                            <button type="button" class="compressor-action-btn compressor-download-btn" id="downloadButton" style="display: none;">
                                <i class="fas fa-download"></i>
                                Download
                            </button>
                        </div> --}}

                        <div class="compressor-action-buttons">
    <button type="button" class="compressor-action-btn compressor-compress-btn" id="compressButton">
        <i class="fas fa-compress-alt"></i>
        Compress Image
    </button>

    <button type="button" class="compressor-action-btn compressor-download-btn" id="downloadButton" style="display: none;">
        <i class="fas fa-download"></i>
        Download
    </button>
</div>

<small class="text-secondary d-block text-center mt-2">
    <i class="fas fa-info-circle text-primary"></i>
Lower the percentage to reduce file size. Minimum file sizes may reduce image quality.
</small>

                        <!-- Reset Button -->
                        <button type="button" class="compressor-reset-btn" id="compressAnotherButton" style="display: none;">
                            <i class="fas fa-redo"></i>
                            Compress Another Image
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
                    <h2>Smaller. Faster. <strong>Better.</strong></h2>
                    <p>Everything you need to reduce your image file size without complicated software.</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="crop-benefit-card">
                            <div class="crop-benefit-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div>
                                <h4>Fast Processing</h4>
                                <p>Compress images directly in your browser without waiting for server processing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="crop-benefit-card">
                            <div class="crop-benefit-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <div>
                                <h4>Flexible Quality</h4>
                                <p>Select the right balance between image quality and file size.</p>
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
                                <p>Images remain on your device during compression.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="compressor-seo-section">
            <div class="container">
                <div class="compressor-seo-wrap">
                    <h2>Free Image Compressor to Reduce Image Size Online</h2>
                    <p>Large image files can make websites slower to load and harder to share. XConvertifire's free image compressor helps you reduce image size online with adjustable quality settings and no software installation.</p>
                    <p>Choose a JPG, PNG, WebP, SVG or GIF file up to 50 MB, review the available options and download the result. Image processing takes place in your browser, giving you direct control over the selected file and its compression settings.</p>
                    <p>Compression results depend on the original image format, content and quality level. Some images become noticeably smaller, while images that are already optimized may show little or no improvement.</p>

                    <h2>How to Compress Images Online</h2>
                    <p>Use the following steps to reduce the file size of an image:</p>

                    <div class="row g-4 compressor-seo-steps">
                        <div class="col-lg-3 col-md-6">
                            <div class="compressor-seo-step">
                                <h3>Step 1: Upload Your Image</h3>
                                <p>Select <strong>Choose File</strong> or drag an image into the upload area. The compressor accepts JPG, PNG, WebP, SVG and GIF files with a maximum file size of 50 MB.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="compressor-seo-step">
                                <h3>Step 2: Select Your Compression Quality</h3>
                                <p>Choose High, Recommended, Balanced or Small Size. You can also use the quality slider to select a custom value between 10% and 100%.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="compressor-seo-step">
                                <h3>Step 3: Compress and Review the Result</h3>
                                <p>Click <strong>Compress Image</strong>. The tool processes the selected file and displays its original size, output size and calculated savings. Check the resulting file carefully, especially if the image contains text, fine details or transparency.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="compressor-seo-step">
                                <h3>Step 4: Download the Image</h3>
                                <p>Click <strong>Download</strong> to save the resulting file. If you need to process a different picture, select <strong>Compress Another Image</strong> and repeat the process.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Understanding Image Compression Quality</h2>
                    <p>Image compression is about finding a practical balance between file size and visual appearance. Higher-quality settings generally preserve more visual detail, while lower-quality settings may produce smaller files with more noticeable artifacts.</p>
                    <p>XConvertifire provides four useful presets:</p>
                    <ul class="compressor-seo-list">
                        <li><strong>High (90%):</strong> A good starting point when preserving fine details matters.</li>
                        <li><strong>Recommended (75%):</strong> A practical default for trying to balance image quality and file size.</li>
                        <li><strong>Balanced (60%):</strong> Worth testing when a smaller download is more important than retaining every detail.</li>
                        <li><strong>Small Size (40%):</strong> Prioritizes stronger compression for supported lossy formats, but may introduce visible artifacts.</li>
                    </ul>
                    <p>These percentages represent encoding quality settings, not guaranteed file-size reductions. Actual results depend on the image and browser. You can adjust the slider and try different settings when the first result does not meet your needs.</p>
                    <p>The quality slider affects lossy JPEG and WebP encoding, including PNG images when they are converted to JPEG. It does not control SVG minification, GIF processing, or PNG's lossless encoding.</p>
                    <p>For background information on how browsers export compressed images, read the <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob" target="_blank" rel="noopener noreferrer">MDN guide to canvas image encoding</a>.</p>

                    <h2>JPG, PNG, WebP, SVG and GIF Compression Explained</h2>

                    <h3>Compress JPG Images</h3>
                    <p>JPG and JPEG are common formats for photographs and images with many colors. Re-encoding a JPG at a lower quality setting may reduce its file size, making it easier to upload, download or use on a website.</p>
                    <p>If the photograph contains small text, sharp outlines or intricate details, check the output at full size before choosing an aggressive compression setting.</p>

                    <h3>Compress PNG Images</h3>
                    <p>PNG is often used for logos, screenshots, illustrations and images requiring transparency.</p>
                    <p>An important limitation of this compressor is that PNG inputs can be exported as JPEG files when the selected quality is below 90%. JPEG does not support transparency, so transparent regions may change appearance.</p>
                    <p>When keeping a PNG output and its transparency is important, use the High preset or a quality value of at least 90%. This still does not guarantee a smaller file.</p>
                    <p>If you need a different image format instead of compression, use the <a href="{{ route('image.converter') }}">online image converter</a>.</p>

                    <h3>Compress WebP Images</h3>
                    <p>WebP is useful for many web images because it supports efficient compression and transparency. XConvertifire can re-encode supported WebP images using the selected browser quality setting.</p>
                    <p>The output may be smaller, but results vary. Review the final image before publishing it, particularly when working with transparent graphics or fine visual details.</p>

                    <h3>Optimize SVG Files</h3>
                    <p>SVG files use vector-based markup and are well suited to icons, logos and scalable graphics.</p>
                    <p>For SVG uploads, this tool performs basic text-level optimization by removing comments and reducing certain unnecessary whitespace. It does not perform advanced SVG restructuring or vector shape optimization. If the optimized version is not smaller, the original file is preserved.</p>

                    <h3>What Happens to GIF Files?</h3>
                    <p>GIF files are accepted by the uploader, but the current tool returns the original GIF rather than applying GIF-specific compression. Animated GIFs are not optimized by the compression engine.</p>
                    <p>If you need to reduce an animated GIF's file size, use a dedicated GIF optimization tool rather than expecting savings from this compressor.</p>

                    <h2>Why Compress Images Before Uploading Them?</h2>
                    <p>Reducing image file size can be useful in several everyday situations.</p>

                    <h3>Website Images and Blog Posts</h3>
                    <p>Large image downloads can contribute to slow-loading web pages. Appropriately sized and compressed images can reduce the amount of data visitors need to download.</p>
                    <p>Image format, dimensions and compression settings all matter. See Google's <a href="https://web.dev/learn/performance/image-performance" target="_blank" rel="noopener noreferrer">image performance guidance</a> for more information about efficient web image delivery.</p>

                    <h3>Online Forms and Applications</h3>
                    <p>Some websites restrict attachment sizes. Compressing a photograph or scanned image may help when an upload exceeds a file-size limit. However, this tool does not promise a specific final size such as 100 KB or 200 KB, so check the downloaded result.</p>

                    <h3>Email and File Sharing</h3>
                    <p>Smaller images can be easier to send and receive, particularly when sharing several photographs or working with limited connectivity.</p>

                    <h3>Product Photos and Digital Content</h3>
                    <p>Online sellers, bloggers and content creators can test compression settings before publishing pictures. Keep the original image available in case the compressed version loses details important to your presentation.</p>

                    <h2>Tips to Reduce Image Size Without Unnecessary Quality Loss</h2>
                    <p><strong>Start with the Recommended setting.</strong> Review the resulting image before trying stronger compression.</p>
                    <p><strong>Keep your original file.</strong> If the output looks blurry or loses important visual details, return to the original and select a higher quality setting.</p>
                    <p><strong>Choose an appropriate format.</strong> JPG often suits photographs, while PNG may be preferable for graphics that require transparency. WebP can be a useful option for modern websites.</p>
                    <p><strong>Check image dimensions.</strong> A very large image may still occupy substantial space after compression. If the picture has larger pixel dimensions than you need, try the <a href="{{ route('image.resizer') }}">image resizer</a> before compressing it.</p>
                    <p><strong>Crop unnecessary areas.</strong> Removing unused parts of an image can help you create a more focused asset. The <a href="{{ route('image.cropper') }}">online image cropper</a> can help with this separate task.</p>
                    <p><strong>Verify the final download.</strong> Inspect image quality, transparency, file extension and file size before uploading the result to your website or other platform.</p>

                    <h2>Frequently Asked Questions About Image Compression</h2>

                    <h3>Is XConvertifire's image compressor free?</h3>
                    <p>Yes. The online image compressor is available as a free tool, with browser-based image processing and adjustable compression settings.</p>

                    <h3>Which image formats are supported?</h3>
                    <p>The uploader accepts JPG/JPEG, PNG, WebP, SVG and GIF. Processing behavior differs by format. JPG and WebP can be re-encoded, PNG output may change to JPEG at lower quality settings, SVG receives basic markup optimization, and GIF is returned unchanged.</p>

                    <h3>What is the maximum upload size?</h3>
                    <p>The current file-size limit is 50 MB per image. Browser memory and device capabilities may affect the handling of very large images.</p>

                    <h3>Will compression reduce image quality?</h3>
                    <p>It can. Lossy image encoding may remove image information, especially at lower quality settings. Use higher quality levels when fine details matter and always inspect the output.</p>

                    <h3>Why is my compressed image not smaller?</h3>
                    <p>Some images have already been efficiently compressed. Others may not become smaller using the selected format and quality setting. When the processed version is not smaller, XConvertifire keeps the original file rather than replacing it with a larger one.</p>

                    <h3>Can I compress multiple images at the same time?</h3>
                    <p>The current Image Compressor processes one selected image at a time. After downloading the result, you can choose another image.</p>

                    <h3>Can I reduce an image to exactly 100 KB or 200 KB?</h3>
                    <p>The tool provides quality settings rather than a guaranteed target-size feature. You can try different settings and review the resulting file size, but an exact KB target is not guaranteed.</p>

                    <h3>Are my images uploaded to a server for compression?</h3>
                    <p>The current compression workflow uses browser-side file reading, canvas processing and local download generation. The selected image does not need to be sent to a server-side compression endpoint for this workflow.</p>

                    <div class="compressor-seo-cta">
                        <h2>Start Compressing Your Images</h2>
                        <p>Need a smaller JPG, PNG or WebP image? Use XConvertifire's free online image compressor to select an image, adjust quality and review the result before downloading.</p>
                        <a href="#uploadSection" class="compressor-seo-cta-link">Compress Your Image Now</a>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('scripts')

    <style>
        .compressor-seo-section {
            padding: 24px 0 72px;
        }

        .compressor-seo-wrap {
            max-width: 960px;
            margin: 0 auto;
        }

        .compressor-seo-wrap > h2:not(:first-child) {
            margin-top: 42px;
        }

        .compressor-seo-section h2 {
            color: #fff;
            font-size: clamp(2rem, 3vw, 2.7rem);
            line-height: 1.2;
            margin: 0 0 18px;
            letter-spacing: -0.03em;
        }

        .compressor-seo-section h3 {
            color: #fff;
            font-size: 1.25rem;
            margin: 28px 0 12px;
        }

        .compressor-seo-section p,
        .compressor-seo-section li {
            color: rgba(255, 255, 255, 0.76);
            font-size: 1.03rem;
            line-height: 1.75;
            margin: 0 0 16px;
        }

        .compressor-seo-section a {
            color: #60a5fa;
            text-decoration: underline;
            text-underline-offset: 0.18em;
        }

        .compressor-seo-section a:hover,
        .compressor-seo-section a:focus-visible {
            color: #93c5fd;
        }

        .compressor-seo-list {
            margin: 0 0 18px 1.3rem;
            padding-left: 1rem;
        }

        .compressor-seo-steps {
            margin-top: 8px;
            margin-bottom: 24px;
        }

        .compressor-seo-step {
            height: 100%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 18px;
            padding: 22px 18px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.02);
        }

        .compressor-seo-step h3 {
            font-size: 1.05rem;
            margin-top: 0;
            margin-bottom: 12px;
        }

        .compressor-seo-step p {
            margin-bottom: 0;
            font-size: 0.98rem;
        }

        .compressor-seo-cta {
            margin-top: 36px;
            padding: 28px 24px;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(96, 165, 250, 0.28);
            border-radius: 18px;
            text-align: center;
        }

        .compressor-seo-cta h2 {
            margin-bottom: 14px;
        }

        .compressor-seo-cta-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 10px;
            background: #2563eb;
            border: 1px solid #2563eb;
            color: #fff !important;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .compressor-seo-cta-link:hover,
        .compressor-seo-cta-link:focus-visible {
            background: #1d4ed8;
            color: #fff !important;
        }

        @media (max-width: 767px) {
            .compressor-seo-section {
                padding-top: 14px;
            }

            .compressor-seo-wrap > h2:not(:first-child) {
                margin-top: 32px;
            }

            .compressor-seo-section h2 {
                font-size: 1.9rem;
            }

            .compressor-seo-section p,
            .compressor-seo-section li {
                font-size: 0.98rem;
            }

            .compressor-seo-cta {
                padding: 22px 18px;
            }
        }

        /* =========================================
           COMPRESSOR WORKSPACE STYLES
        ========================================= */
        .compressor-workspace-section {
            padding: 30px 0 60px;
        }

        .compressor-workspace-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .compressor-workspace-header h2 {
            margin: 0;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .compressor-cancel-btn {
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

        .compressor-cancel-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.4);
            color: #f87171;
            transform: translateY(-1px);
        }

        .compressor-main-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 30px;
            align-items: start;
        }

        /* Left Image Panel */
        .compressor-image-panel {
            position: relative;
        }

        .compressor-image-container {
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

        .compressor-image-container img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            object-fit: contain;
        }

        .compressor-image-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 15px;
            padding: 15px 20px;
            background: #111113;
            border: 1px solid #1f1f23;
            border-radius: 12px;
            font-size: 0.85rem;
            color: #a1a1aa;
        }

        .compressor-image-info strong {
            color: #fff;
        }

        /* Right Controls Panel */
        .compressor-controls-panel {
            background: #111113;
            border: 1px solid #1f1f23;
            border-radius: 20px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .compressor-control-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .compressor-control-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #a1a1aa;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .compressor-quality-presets {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .compressor-quality-btn {
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

        .compressor-quality-btn:hover,
        .compressor-quality-btn.active {
            background: rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.5);
            color: #60a5fa;
        }

        .compressor-slider-wrapper {
            margin-top: 8px;
        }

        .compressor-slider-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: #a1a1aa;
        }

        .compressor-slider-header strong {
            color: #60a5fa;
            font-size: 1rem;
        }

        .compressor-slider {
            width: 100%;
            height: 6px;
            -webkit-appearance: none;
            appearance: none;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            outline: none;
            cursor: pointer;
        }

        .compressor-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #3b82f6;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);
        }

        .compressor-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #3b82f6;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);
        }

        .compressor-result-box {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .compressor-result-item {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: #a1a1aa;
        }

        .compressor-result-item strong {
            color: #fff;
        }

        .compressor-saved-text {
            color: #2563eb !important;
        }

        .compressor-action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .compressor-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 12px 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.04);
            color: #a1a1aa;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            flex: 1;
            min-width: 120px;
        }

        .compressor-action-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .compressor-action-btn i {
            font-size: 0.85rem;
        }

        .compressor-compress-btn {
            background: #3b82f6;
            border-color: #3b82f6;
            color: #fff;
        }

        .compressor-compress-btn:hover {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .compressor-download-btn {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .compressor-download-btn:hover {
            background: #059669;
            border-color: #059669;
            color: #fff;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .compressor-reset-btn {
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
        }

        .compressor-reset-btn:hover {
            background: rgba(234, 179, 8, 0.15);
            border-color: rgba(234, 179, 8, 0.4);
            color: #fbbf24;
            transform: translateY(-1px);
        }

        .compressor-reset-btn i {
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .compressor-main-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .compressor-controls-panel {
                order: 2;
            }

            .compressor-image-container {
                max-height: 450px;
            }
        }

        @media (max-width: 600px) {
            .compressor-workspace-header {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .compressor-workspace-header h2 {
                font-size: 1.4rem;
            }

            .compressor-controls-panel {
                padding: 20px 16px;
            }

            .compressor-image-info {
                flex-direction: column;
                gap: 8px;
                font-size: 0.8rem;
            }

            .compressor-action-btn {
                min-width: 100%;
                flex: 0 0 100%;
            }
        }
    </style>

    <script>
        $(document).ready(function() {
            /* =========================================================
               VARIABLES
            ========================================================== */
            let selectedFile = null;
            let compressedBlob = null;
            let compressedFileName = '';
            let previewUrl = null;
            let quality = 0.75;
            const MAX_FILE_SIZE = 50 * 1024 * 1024;

            /* =========================================================
               FILE INPUT
            ========================================================== */
            $('#compressImageInput').on('change', function() {
                const file = this.files[0];
                if (!file) return;
                processSelectedFile(file);
                $(this).val('');
            });

            /* =========================================================
               DRAG OVER
            ========================================================== */
            $('#compressUploadBox').on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('drag-active');
            });

            /* =========================================================
               DRAG LEAVE
            ========================================================== */
            $('#compressUploadBox').on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('drag-active');
            });

            /* =========================================================
               DROP
            ========================================================== */
            $('#compressUploadBox').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('drag-active');
                const files = e.originalEvent.dataTransfer.files;
                if (!files.length) return;
                processSelectedFile(files[0]);
            });

            /* =========================================================
               PROCESS SELECTED FILE
            ========================================================== */
            function processSelectedFile(file) {
                const allowedTypes = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/gif', 'image/webp'];

                if (!allowedTypes.includes(file.type)) {
                    alert('Please upload a JPG, PNG, SVG, GIF or WebP image.');
                    return;
                }

                if (file.size > MAX_FILE_SIZE) {
                    alert('The maximum allowed file size is 50MB.');
                    return;
                }

                selectedFile = file;
                compressedBlob = null;
                compressedFileName = '';

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                }

                previewUrl = URL.createObjectURL(file);
                $('#uploadedImagePreview').attr('src', previewUrl);

                // Update file info
                $('#fileName').text(file.name);
                $('#fileSize').text(formatBytes(file.size));
                $('#fileType').text(getExtension(file.name));

                // Hide upload section, show workspace
                $('#uploadSection').hide();
                $('#compressorWorkspace').show();

                // Reset result
                $('#compressionResult').hide();
                $('#downloadButton').hide();
                $('#compressAnotherButton').hide();
                $('#compressButton').show().prop('disabled', false).html('<i class="fas fa-compress-alt"></i> Compress Image');

                // Scroll to workspace
                setTimeout(function() {
                    $('#compressorWorkspace')[0].scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 200);
            }

            /* =========================================================
               CANCEL BUTTON
            ========================================================== */
            $('#cancelCompressBtn').on('click', function() {
                resetTool(true);
            });

            /* =========================================================
               QUALITY PRESETS
            ========================================================== */
            $('.compressor-quality-btn').on('click', function() {
                $('.compressor-quality-btn').removeClass('active');
                $(this).addClass('active');
                const value = parseInt($(this).data('quality'));
                quality = value / 100;
                $('#compressionQuality').val(value);
                $('#qualityValue').text(value);
            });

            /* =========================================================
               QUALITY SLIDER
            ========================================================== */
            $('#compressionQuality').on('input', function() {
                const value = parseInt($(this).val());
                quality = value / 100;
                $('#qualityValue').text(value);
                $('.compressor-quality-btn').removeClass('active');
            });

            /* =========================================================
               COMPRESS IMAGE
            ========================================================== */
            $('#compressButton').on('click', async function() {
                if (!selectedFile) {
                    alert('Please upload an image first.');
                    return;
                }

                const $button = $(this);
                $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Compressing...');

                try {
                    const result = await compressImage(selectedFile, quality);
                    compressedBlob = result.blob;
                    compressedFileName = result.name;

                    const originalSize = selectedFile.size;
                    const compressedSize = compressedBlob.size;
                    let saved = 0;

                    if (originalSize > 0) {
                        saved = Math.max(0, Math.round(((originalSize - compressedSize) / originalSize) * 100));
                    }

                    // Show result
                    $('#originalResultSize').text(formatBytes(originalSize));
                    $('#compressedResultSize').text(formatBytes(compressedSize));
                    $('#savedResult').text(saved + '%');
                    $('#compressionResult').show();

                    // Hide compress button, show download
                    $button.hide();
                    $('#downloadButton').show();
                    $('#compressAnotherButton').show();

                } catch (error) {
                    console.error(error);
                    alert('Unable to compress this image. Please try another image.');
                    $button.prop('disabled', false).html('<i class="fas fa-compress-alt"></i> Compress Image');
                }
            });

            /* =========================================================
               DOWNLOAD
            ========================================================== */
            $('#downloadButton').on('click', function() {
                if (!compressedBlob) {
                    alert('Please compress the image first.');
                    return;
                }

                const url = URL.createObjectURL(compressedBlob);
                const link = document.createElement('a');
                link.href = url;
                link.download = compressedFileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                setTimeout(function() {
                    URL.revokeObjectURL(url);
                }, 1000);
            });

            /* =========================================================
               COMPRESS ANOTHER
            ========================================================== */
            $('#compressAnotherButton').on('click', function() {
                resetTool(true);
            });

            /* =========================================================
               RESET TOOL
            ========================================================== */
            function resetTool(scrollToTop = false) {
                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                }

                selectedFile = null;
                compressedBlob = null;
                compressedFileName = '';
                previewUrl = null;

                // Reset preview
                $('#uploadedImagePreview').attr('src', '');

                // Hide workspace, show upload
                $('#compressorWorkspace').hide();
                $('#uploadSection').show();

                // Reset UI
                $('#compressionResult').hide();
                $('#downloadButton').hide();
                $('#compressAnotherButton').hide();
                $('#compressButton').show().prop('disabled', false).html('<i class="fas fa-compress-alt"></i> Compress Image');

                // Reset quality
                quality = 0.75;
                $('#compressionQuality').val(75);
                $('#qualityValue').text(75);
                $('.compressor-quality-btn').removeClass('active');
                $('.compressor-quality-btn[data-quality="75"]').addClass('active');

                // Clear input
                $('#compressImageInput').val('');

                if (scrollToTop) {
                    setTimeout(function() {
                        $('html, body').animate({
                            scrollTop: $('#uploadSection').offset().top - 20
                        }, 600);
                    }, 150);
                }
            }

            /* =========================================================
               COMPRESSION ENGINE
            ========================================================== */
            function compressImage(file, quality) {
                return new Promise(function(resolve, reject) {
                    if (file.type === 'image/svg+xml') {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            try {
                                const svg = event.target.result;
                                const optimized = optimizeSVG(svg);
                                const blob = new Blob([optimized], { type: 'image/svg+xml' });
                                if (blob.size >= file.size) {
                                    resolve({ blob: file, name: createName(file, 'svg') });
                                    return;
                                }
                                resolve({ blob: blob, name: createName(file, 'svg') });
                            } catch (error) {
                                reject(error);
                            }
                        };
                        reader.onerror = reject;
                        reader.readAsText(file);
                        return;
                    }

                    if (file.type === 'image/gif') {
                        resolve({ blob: file, name: createName(file, 'gif') });
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const image = new Image();
                        image.onload = function() {
                            const canvas = document.createElement('canvas');
                            canvas.width = image.naturalWidth;
                            canvas.height = image.naturalHeight;
                            const context = canvas.getContext('2d');
                            context.imageSmoothingEnabled = true;
                            context.imageSmoothingQuality = 'high';
                            context.drawImage(image, 0, 0);

                            let outputType = 'image/jpeg';
                            if (file.type === 'image/webp') {
                                outputType = 'image/webp';
                            }
                            if (file.type === 'image/png' && quality >= 0.90) {
                                outputType = 'image/png';
                            }

                            canvas.toBlob(function(blob) {
                                if (!blob) {
                                    reject(new Error('Compression failed.'));
                                    return;
                                }

                                if (blob.size >= file.size) {
                                    resolve({ blob: file, name: createName(file, getExtension(file.name).toLowerCase()) });
                                    return;
                                }

                                let extension = 'jpg';
                                if (outputType === 'image/webp') extension = 'webp';
                                if (outputType === 'image/png') extension = 'png';

                                resolve({ blob: blob, name: createName(file, extension) });
                            }, outputType, quality);
                        };
                        image.onerror = function() {
                            reject(new Error('Unable to load image.'));
                        };
                        image.src = event.target.result;
                    };
                    reader.onerror = reject;
                    reader.readAsDataURL(file);
                });
            }

            /* =========================================================
               SVG OPTIMIZER
            ========================================================== */
            function optimizeSVG(svg) {
                return svg
                    .replace(/<!--[\s\S]*?-->/g, '')
                    .replace(/>\s+</g, '><')
                    .replace(/\s{2,}/g, ' ')
                    .replace(/\n/g, '')
                    .replace(/\r/g, '')
                    .trim();
            }

            /* =========================================================
               CREATE FILE NAME
            ========================================================== */
            function createName(file, extension) {
                const name = file.name.replace(/\.[^/.]+$/, '');
                return name + '-compressed.' + extension;
            }

            /* =========================================================
               GET EXTENSION
            ========================================================== */
            function getExtension(name) {
                const parts = name.split('.');
                if (parts.length < 2) return 'IMAGE';
                return parts.pop().toUpperCase();
            }

            /* =========================================================
               FORMAT BYTES
            ========================================================== */
            function formatBytes(bytes) {
                if (bytes === 0) return '0 Bytes';
                const units = ['Bytes', 'KB', 'MB', 'GB'];
                const index = Math.floor(Math.log(bytes) / Math.log(1024));
                return parseFloat((bytes / Math.pow(1024, index)).toFixed(2)) + ' ' + units[index];
            }
        });
    </script>
@endsection
