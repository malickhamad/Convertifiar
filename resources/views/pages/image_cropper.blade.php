@extends('components.app')

@section('meta')
    <title>Image cropper</title>
    <meta name="description" content="Main Image cropper Description" />
    <meta property="og:title" content="Image cropper">
    <meta property="og:description" content="Main Image cropper Description">
    <meta property="twitter:title" content="Image cropper">
    <meta property="twitter:description" content="Main Image cropper Description">
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
                    <span>WHY USE PIXELFLOW</span>
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
    </main>
@endsection

@section('scripts')
    <!-- Cropper.js CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

    <style>
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
                    link.download = 'pixelflow-cropped-image.jpg';
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
