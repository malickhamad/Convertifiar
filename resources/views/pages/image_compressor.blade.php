@extends('components.app')

@section('meta')
    <title>Image Compressor</title>
    <meta name="description" content="Compress images online without losing quality. Fast, secure, and private." />

    <meta property="og:title" content="Image Compressor">
    <meta property="og:description" content="Compress images online without losing quality. Fast, secure, and private.">

    <meta property="twitter:title" content="Image Compressor">
    <meta property="twitter:description" content="Compress images online without losing quality. Fast, secure, and private.">
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
                        <span>Without Losing Quality.</span>
                    </h1>
                    <p>
                        Compress JPG, PNG, SVG, and GIF images while
                        reducing file size and maintaining excellent quality.
                    </p>
                </div>

                <!-- Upload Box -->
                <div class="crop-upload-box" id="compressUploadBox">
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
                    <span>WHY USE PIXELFLOW</span>
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
    </main>
@endsection

@section('scripts')
    <style>
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
            color: #4ade80 !important;
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
            background: #10b981;
            border-color: #10b981;
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
