@extends('components.app')

@section('meta')
    <title>Image Resizer</title>
    <meta name="description" content="Main Image Resizer Description" />

    <meta property="og:title" content="Image Resizer">
    <meta property="og:description" content="Main Image Resizer Description">

    <meta property="twitter:title" content="Image Resizer">
    <meta property="twitter:description" content="Main Image Resizer Description">
@endsection

@section('content')
    <main class="crop-page">

        <!-- =========================================================
             BREADCRUMB
        ========================================================== -->
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

                    <span>Image Resize</span>

                </div>

            </div>
        </section>


        <!-- =========================================================
             HERO / UPLOAD SECTION (hidden after upload)
        ========================================================== -->
        <section class="crop-hero-section" id="resizeUploadSection">

            <div class="container">

                <div class="crop-heading">

                    <span class="crop-small-badge">
                        <i class="fas fa-expand-arrows-alt"></i>
                        Image Tool
                    </span>

                    <h1>
                        Resize Your Images<br>
                        <span>With Ease.</span>
                    </h1>

                    <p>
                        Define your dimensions by pixels or percentage and
                        resize JPG, PNG, SVG, GIF, and WebP images quickly.
                    </p>

                </div>


                <!-- =================================================
                     UPLOAD BOX
                ================================================== -->

                <div class="crop-upload-box cursor-pointer" id="resizeUploadBox" onclick="document.getElementById('resizeImageInput').click()">

                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>

                    <h3>
                        Upload your image
                    </h3>

                    <p class="crop-upload-text">
                        Drag & drop your image here or
                    </p>

                    <label for="resizeImageInput" class="crop-upload-btn">

                        <i class="fas fa-upload"></i>
                        Choose File

                    </label>

                    <input type="file" id="resizeImageInput"
                        accept="image/jpeg,image/png,image/svg+xml,image/gif,image/webp" hidden>

                    <p class="crop-upload-info">

                        Supports JPG, PNG, SVG, GIF, WebP

                        <span>|</span>

                        Max size: 50MB

                    </p>

                </div>

            </div>

        </section>



        <!-- =========================================================
             RESIZE WORKSPACE SECTION (hidden initially)
        ========================================================== -->
        <section class="resizer-workspace-section" id="resizeWorkspaceSection" style="display: none;">

            <div class="container">

                <div class="resizer-workspace-header">

                    <h2>Resize Your Image</h2>

                    <button type="button" class="resizer-cancel-btn" id="resizeCancelBtn">
                        <i class="fas fa-times"></i>
                        Cancel & Upload New
                    </button>

                </div>


                <div class="resizer-main-grid">

                    <!-- =================================================
                         LEFT: IMAGE PREVIEW
                    ================================================== -->
                    <div class="resizer-image-panel">

                        <div class="resizer-image-container">

                            <img id="resizeImagePreview"
                                src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="Image Resize Preview">

                        </div>

                    </div>



                    <!-- =================================================
                         RIGHT: CONTROLS
                    ================================================== -->
                    <div class="resizer-controls-panel">


                        <!-- =================================================
                             FILE INFORMATION
                        ================================================== -->
                        <div class="resizer-file-info">

                            <div class="resizer-file-info-card">
                                <span class="resizer-file-info-label">File Name</span>
                                <div class="resizer-file-info-value" id="resizeFileName">-</div>
                            </div>

                            <div class="resizer-file-info-card">
                                <span class="resizer-file-info-label">Dimensions</span>
                                <div class="resizer-file-info-value" id="resizeOriginalDimensions">-</div>
                            </div>

                            <div class="resizer-file-info-card">
                                <span class="resizer-file-info-label">Size</span>
                                <div class="resizer-file-info-value" id="resizeOriginalFileSize">-</div>
                            </div>

                        </div>



                        <!-- =================================================
                             RESIZE DIMENSIONS
                        ================================================== -->
                        <div class="resizer-control-group">

                            <label class="resizer-control-label">Resize Dimensions</label>

                            <div class="resizer-dimensions-grid">

                                <!-- Unit -->
                                <div class="resizer-field">
                                    <label class="resizer-field-label">Unit</label>
                                    <select id="resizeUnit" class="resizer-select">
                                        <option value="px">Pixels</option>
                                        <option value="percent">Percentage</option>
                                    </select>
                                </div>

                                <!-- Width -->
                                <div class="resizer-field">
                                    <label class="resizer-field-label">Width</label>
                                    <input type="number" id="resizeWidth" class="resizer-input" min="1" placeholder="Width">
                                </div>

                                <!-- Height -->
                                <div class="resizer-field">
                                    <label class="resizer-field-label">Height</label>
                                    <input type="number" id="resizeHeight" class="resizer-input" min="1" placeholder="Height">
                                </div>

                            </div>


                            <!-- Aspect Ratio Lock -->
                            <button type="button" id="resizeRatioLock" class="resizer-ratio-btn active">
                                <i class="fas fa-lock"></i>
                                Keep Aspect Ratio
                            </button>

                        </div>



                        <!-- =================================================
                             ORIGINAL / NEW DIMENSIONS
                        ================================================== -->
                        {{-- <div class="resizer-control-group">

                            <label class="resizer-control-label">Dimensions Preview</label>

                            <div class="resizer-result-box">

                                <div class="resizer-result-item">
                                    <span>Original:</span>
                                    <strong id="resizeOriginalSizeText">-</strong>
                                </div>

                                <div class="resizer-result-item">
                                    <span>New Size:</span>
                                    <strong id="resizeNewSizeText">-</strong>
                                </div>

                            </div>

                        </div> --}}



                        <!-- =================================================
                             RESULT (hidden initially)
                        ================================================== -->
                        <div class="resizer-control-group" id="resizeResult" style="display: none;">

                            <label class="resizer-control-label">Resize Result</label>

                            <div class="resizer-result-box resizer-result-success">

                                <div class="resizer-result-item">
                                    <span>Original:</span>
                                    <strong id="resizeResultOriginal">-</strong>
                                </div>

                                <div class="resizer-result-item">
                                    <span>New Size:</span>
                                    <strong id="resizeResultNew">-</strong>
                                </div>

                                <div class="resizer-result-item">
                                    <span>File Size:</span>
                                    <strong id="resizeResultFileSize" class="resizer-success-text">-</strong>
                                </div>

                            </div>

                        </div>



                        <!-- =================================================
                             ACTION BUTTONS
                        ================================================== -->
                        <div class="resizer-action-buttons">

                            <button type="button" class="resizer-action-btn resizer-resize-btn" id="resizeButton">
                                <i class="fas fa-expand-arrows-alt"></i>
                                Resize Image
                            </button>

                            <button type="button" class="resizer-action-btn resizer-download-btn" id="resizeDownloadButton" style="display: none;">
                                <i class="fas fa-download"></i>
                                Download Image
                            </button>

                        </div>



                        <!-- =================================================
                             HINT
                        ================================================== -->
                        <div class="resizer-hint">
                            <i class="fas fa-info-circle"></i>
                            <span>Use pixels for exact dimensions or percentage to scale proportionally.</span>
                        </div>



                        <!-- =================================================
                             RESET BUTTON
                        ================================================== -->
                        <button type="button" class="resizer-reset-btn" id="resizeAnotherButton" style="display: none;">
                            <i class="fas fa-redo"></i>
                            Resize Another Image
                        </button>

                    </div>

                </div>

            </div>

        </section>



        <!-- =========================================================
             BENEFITS
        ========================================================== -->
        <section class="crop-benefits-section">

            <div class="container">

                <div class="crop-benefits-heading">

                    <span>
                        WHY USE Xconvertifire
                    </span>

                    <h2>
                        Simple. Fast. <strong>Flexible.</strong>
                    </h2>

                    <p>
                        Everything you need to resize your images quickly
                        without complicated software.
                    </p>

                </div>


                <div class="row g-4">


                    <!-- Benefit 01 -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-bolt"></i>

                            </div>

                            <div>

                                <h4>
                                    Fast Processing
                                </h4>

                                <p>
                                    Resize images quickly directly in your
                                    browser.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Benefit 02 -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-ruler-combined"></i>

                            </div>

                            <div>

                                <h4>
                                    Exact Dimensions
                                </h4>

                                <p>
                                    Resize by pixels or percentage with
                                    complete control.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Benefit 03 -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-shield-alt"></i>

                            </div>

                            <div>

                                <h4>
                                    Secure & Private
                                </h4>

                                <p>
                                    Your images stay on your device while
                                    processing.
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
    <style>
        /* =========================================
           RESIZER WORKSPACE STYLES
           (Matching compressor design)
        ========================================= */

        .resizer-workspace-section {
            padding: 30px 0 60px;
        }

        .resizer-workspace-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .resizer-workspace-header h2 {
            margin: 0;
            color: #fff;
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #fff 0%, #a1a1aa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .resizer-cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #a1a1aa;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        .resizer-cancel-btn:hover {
            background: rgba(239, 68, 68, 0.12);
            border-color: rgba(239, 68, 68, 0.35);
            color: #f87171;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.15);
        }

        .resizer-main-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 28px;
            align-items: start;
        }

        /* Left Image Panel */
        .resizer-image-panel {
            position: relative;
        }

        .resizer-image-container {
            width: 100%;
            max-height: 620px;
            background: #09090b;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            position: relative;
            background-image:
                linear-gradient(45deg, #0f0f11 25%, transparent 25%),
                linear-gradient(-45deg, #0f0f11 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, #0f0f11 75%),
                linear-gradient(-45deg, transparent 75%, #0f0f11 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }

        .resizer-image-container img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }

        /* Right Controls Panel */
        .resizer-controls-panel {
            background: linear-gradient(180deg, #131315 0%, #0f0f11 100%);
            border: 1px solid #1f1f23;
            border-radius: 24px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.04);
        }

        /* File Info Cards */
        .resizer-file-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .resizer-file-info-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 12px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            transition: all 0.25s ease;
        }

        .resizer-file-info-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .resizer-file-info-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #71717a;
            text-transform: uppercase;
            letter-spacing: 1px;
            flex-shrink: 0;
        }

        .resizer-file-info-value {
            font-size: 0.85rem;
            font-weight: 600;
            color: #fff;
            word-break: break-word;
            text-align: right;
            line-height: 1.4;
        }

        /* Control Group */
        .resizer-control-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .resizer-control-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #71717a;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .resizer-control-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, #1f1f23 0%, transparent 100%);
        }

        /* Dimensions Grid */
        .resizer-dimensions-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .resizer-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .resizer-field-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: #71717a;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .resizer-input,
        .resizer-select {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 11px 14px;
            transition: all 0.25s ease;
            font-family: inherit;
            width: 100%;
        }

        .resizer-input:focus,
        .resizer-select:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            color: #fff;
            outline: none;
        }

        .resizer-input::placeholder {
            color: #52525b;
        }

        .resizer-select option {
            background: #131315;
            color: #fff;
        }

        /* Ratio Lock Button */
        .resizer-ratio-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 16px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #a1a1aa;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
            width: 100%;
        }

        .resizer-ratio-btn:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 255, 255, 0.2);
            color: #e4e4e7;
            transform: translateY(-1px);
        }

        .resizer-ratio-btn.active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(139, 92, 246, 0.15));
            border-color: rgba(59, 130, 246, 0.5);
            color: #60a5fa;
            box-shadow:
                0 4px 16px rgba(59, 130, 246, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        /* Result Box */
        .resizer-result-box {
            display: flex;
            flex-direction: column;
            gap: 0;
            padding: 0;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            overflow: hidden;
        }

        .resizer-result-box.resizer-result-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.06), rgba(59, 130, 246, 0.06));
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .resizer-result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #a1a1aa;
            padding: 13px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: background 0.2s ease;
            gap: 12px;
        }

        .resizer-result-item:last-child {
            border-bottom: none;
        }

        .resizer-result-item:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .resizer-result-item strong {
            color: #fff;
            font-weight: 700;
            font-variant-numeric: tabular-nums;
            text-align: right;
        }

        .resizer-success-text {
            color: #2563eb !important;
        }

        /* Action Buttons */
        .resizer-action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .resizer-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 14px 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.03);
            color: #a1a1aa;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .resizer-action-btn i {
            font-size: 0.9rem;
        }

        .resizer-resize-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-color: transparent;
            color: #fff;
            box-shadow:
                0 4px 20px rgba(59, 130, 246, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .resizer-resize-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 30px rgba(59, 130, 246, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .resizer-resize-btn:active {
            transform: translateY(0);
        }

        .resizer-resize-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .resizer-download-btn {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
            box-shadow:
                0 4px 20px rgba(16, 185, 129, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .resizer-download-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 30px rgba(16, 185, 129, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* Hint */
        .resizer-hint {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            padding: 12px 14px;
            background: rgba(59, 130, 246, 0.06);
            border: 1px solid rgba(59, 130, 246, 0.15);
            border-radius: 10px;
            font-size: 0.78rem;
            color: #a1a1aa;
            line-height: 1.5;
        }

        .resizer-hint i {
            color: #60a5fa;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Reset Button */
        .resizer-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 13px 20px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #a1a1aa;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        .resizer-reset-btn:hover {
            background: rgba(234, 179, 8, 0.1);
            border-color: rgba(234, 179, 8, 0.3);
            color: #fbbf24;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(234, 179, 8, 0.15);
        }

        .resizer-reset-btn i {
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .resizer-main-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .resizer-controls-panel {
                order: 2;
            }

            .resizer-image-container {
                max-height: 450px;
            }
        }

        @media (max-width: 600px) {
            .resizer-workspace-header {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .resizer-workspace-header h2 {
                font-size: 1.4rem;
            }

            .resizer-controls-panel {
                padding: 20px 16px;
            }

            .resizer-dimensions-grid {
                grid-template-columns: 1fr;
            }

            .resizer-file-info-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }

            .resizer-file-info-value {
                text-align: left;
            }
        }
    </style>

    <script>
        $(document).ready(function() {

            /* =========================================================
               VARIABLES
            ========================================================== */

            let selectedFile = null;

            let resizedBlob = null;

            let resizedFileName = '';

            let previewUrl = null;

            let originalWidth = 0;

            let originalHeight = 0;

            let keepRatio = true;


            const MAX_FILE_SIZE = 50 * 1024 * 1024;



            /* =========================================================
               FILE INPUT
            ========================================================== */

            $('#resizeImageInput').on('change', function() {

                const file = this.files[0];

                if (!file) {
                    return;
                }

                processImage(file);

                $(this).val('');

            });



            /* =========================================================
               DRAG & DROP
            ========================================================== */

            $('#resizeUploadBox')

                .on('dragover', function(e) {

                    e.preventDefault();

                    e.stopPropagation();

                    $(this).addClass('drag-active');

                })

                .on('dragleave', function(e) {

                    e.preventDefault();

                    e.stopPropagation();

                    $(this).removeClass('drag-active');

                })

                .on('drop', function(e) {

                    e.preventDefault();

                    e.stopPropagation();

                    $(this).removeClass('drag-active');

                    const files =
                        e.originalEvent.dataTransfer.files;

                    if (!files.length) {
                        return;
                    }

                    processImage(files[0]);

                });



            /* =========================================================
               CANCEL BUTTON
            ========================================================== */

            $('#resizeCancelBtn').on('click', function() {

                resetTool(true);

            });



            /* =========================================================
               PROCESS IMAGE
            ========================================================== */

            function processImage(file) {

                const allowedTypes = [

                    'image/jpeg',
                    'image/png',
                    'image/svg+xml',
                    'image/gif',
                    'image/webp'

                ];


                if (!allowedTypes.includes(file.type)) {

                    alert(
                        'Please upload a JPG, PNG, SVG, GIF or WebP image.'
                    );

                    return;

                }


                if (file.size > MAX_FILE_SIZE) {

                    alert(
                        'The maximum allowed file size is 50MB.'
                    );

                    return;

                }


                selectedFile = file;

                resizedBlob = null;

                resizedFileName = '';


                if (previewUrl) {

                    URL.revokeObjectURL(previewUrl);

                }


                previewUrl =
                    URL.createObjectURL(file);


                $('#resizeImagePreview')
                    .attr('src', previewUrl);


                $('#resizeFileName')
                    .text(file.name);


                $('#resizeOriginalFileSize')
                    .text(formatBytes(file.size));


                /* Hide upload/hero section, show workspace */

                $('#resizeUploadSection').hide();

                $('#resizeWorkspaceSection').show();


                loadImageDimensions(file);

            }



            /* =========================================================
               LOAD IMAGE DIMENSIONS
            ========================================================== */

            function loadImageDimensions(file) {

                const reader = new FileReader();


                reader.onload = function(event) {

                    const image = new Image();


                    image.onload = function() {

                        originalWidth =
                            image.naturalWidth;

                        originalHeight =
                            image.naturalHeight;


                        setInitialDimensions();


                        $('#resizeOriginalDimensions')
                            .text(
                                originalWidth +
                                ' × ' +
                                originalHeight +
                                ' px'
                            );


                        $('#resizeOriginalSizeText')
                            .text(
                                originalWidth +
                                ' × ' +
                                originalHeight +
                                ' px'
                            );


                        $('#resizeResult')
                            .hide();


                        $('#resizeDownloadButton')
                            .hide();


                        $('#resizeAnotherButton')
                            .hide();


                        $('#resizeButton')
                            .show()
                            .prop('disabled', false)
                            .html('<i class="fas fa-expand-arrows-alt"></i> Resize Image');


                        /* Scroll user to workspace */

                        setTimeout(function() {

                            $('html, body').animate({

                                scrollTop: $('#resizeWorkspaceSection')
                                    .offset()
                                    .top - 20

                            }, 600);

                        }, 200);

                    };


                    image.onerror = function() {

                        alert(
                            'Unable to read this image.'
                        );

                    };


                    image.src = event.target.result;

                };


                reader.readAsDataURL(file);

            }



            /* =========================================================
               INITIAL DIMENSIONS
            ========================================================== */

            function setInitialDimensions() {

                const unit =
                    $('#resizeUnit').val();


                if (unit === 'percent') {

                    $('#resizeWidth').val(100);

                    $('#resizeHeight').val(100);

                    updateNewSizeText();

                } else {

                    $('#resizeWidth')
                        .val(originalWidth);

                    $('#resizeHeight')
                        .val(originalHeight);

                    updateNewSizeText();

                }

            }



            /* =========================================================
               UNIT CHANGE
            ========================================================== */

            $('#resizeUnit').on('change', function() {

                if (!selectedFile) {
                    return;
                }

                setInitialDimensions();

            });



            /* =========================================================
               WIDTH CHANGE
            ========================================================== */

            $('#resizeWidth').on('input', function() {

                let width =
                    parseFloat($(this).val());


                if (!width || width <= 0) {
                    return;
                }


                if (keepRatio) {

                    const unit =
                        $('#resizeUnit').val();


                    let newHeight;


                    if (unit === 'percent') {

                        newHeight = width;

                    } else {

                        newHeight =
                            Math.round(
                                width *
                                originalHeight /
                                originalWidth
                            );

                    }


                    $('#resizeHeight')
                        .val(newHeight);

                }


                updateNewSizeText();

            });



            /* =========================================================
               HEIGHT CHANGE
            ========================================================== */

            $('#resizeHeight').on('input', function() {

                let height =
                    parseFloat($(this).val());


                if (!height || height <= 0) {
                    return;
                }


                if (keepRatio) {

                    const unit =
                        $('#resizeUnit').val();


                    let newWidth;


                    if (unit === 'percent') {

                        newWidth = height;

                    } else {

                        newWidth =
                            Math.round(
                                height *
                                originalWidth /
                                originalHeight
                            );

                    }


                    $('#resizeWidth')
                        .val(newWidth);

                }


                updateNewSizeText();

            });



            /* =========================================================
               ASPECT RATIO LOCK
            ========================================================== */

            $('#resizeRatioLock').on('click', function() {

                keepRatio = !keepRatio;


                if (keepRatio) {

                    $(this)
                        .addClass('active')
                        .html(
                            '<i class="fas fa-lock"></i> Keep Aspect Ratio'
                        );


                    /* Recalculate height */

                    const width =
                        parseFloat(
                            $('#resizeWidth').val()
                        );


                    if (width > 0) {

                        const unit =
                            $('#resizeUnit').val();


                        if (unit === 'percent') {

                            $('#resizeHeight')
                                .val(width);

                        } else {

                            $('#resizeHeight')
                                .val(
                                    Math.round(
                                        width *
                                        originalHeight /
                                        originalWidth
                                    )
                                );

                        }

                    }

                } else {

                    $(this)
                        .removeClass('active')
                        .html(
                            '<i class="fas fa-unlock"></i> Free Resize'
                        );

                }


                updateNewSizeText();

            });



            /* =========================================================
               UPDATE NEW SIZE
            ========================================================== */

            function updateNewSizeText() {

                if (!selectedFile) {
                    return;
                }


                const unit =
                    $('#resizeUnit').val();


                let width =
                    parseFloat(
                        $('#resizeWidth').val()
                    );


                let height =
                    parseFloat(
                        $('#resizeHeight').val()
                    );


                if (!width || !height) {

                    $('#resizeNewSizeText')
                        .text('-');

                    return;

                }


                if (unit === 'percent') {

                    const newWidth =
                        Math.max(
                            1,
                            Math.round(
                                originalWidth *
                                width /
                                100
                            )
                        );


                    const newHeight =
                        Math.max(
                            1,
                            Math.round(
                                originalHeight *
                                height /
                                100
                            )
                        );


                    $('#resizeNewSizeText')
                        .text(
                            newWidth +
                            ' × ' +
                            newHeight +
                            ' px'
                        );

                } else {

                    $('#resizeNewSizeText')
                        .text(
                            Math.round(width) +
                            ' × ' +
                            Math.round(height) +
                            ' px'
                        );

                }

            }



            /* =========================================================
               RESIZE IMAGE
            ========================================================== */

            $('#resizeButton').on('click', async function() {

                if (!selectedFile) {

                    alert(
                        'Please upload an image first.'
                    );

                    return;

                }


                const unit =
                    $('#resizeUnit').val();


                let width =
                    parseFloat(
                        $('#resizeWidth').val()
                    );


                let height =
                    parseFloat(
                        $('#resizeHeight').val()
                    );


                if (
                    !width ||
                    !height ||
                    width <= 0 ||
                    height <= 0
                ) {

                    alert(
                        'Please enter valid width and height.'
                    );

                    return;

                }


                if (unit === 'percent') {

                    width =
                        Math.round(
                            originalWidth *
                            width /
                            100
                        );


                    height =
                        Math.round(
                            originalHeight *
                            height /
                            100
                        );

                } else {

                    width =
                        Math.round(width);

                    height =
                        Math.round(height);

                }


                const $button =
                    $(this);


                $button
                    .prop('disabled', true)
                    .html(
                        '<i class="fas fa-spinner fa-spin"></i> Resizing...'
                    );


                try {

                    const result =
                        await resizeImage(
                            selectedFile,
                            width,
                            height
                        );


                    resizedBlob =
                        result.blob;


                    resizedFileName =
                        result.name;


                    /* Result information */

                    $('#resizeResultOriginal')
                        .text(
                            originalWidth +
                            ' × ' +
                            originalHeight +
                            ' px'
                        );


                    $('#resizeResultNew')
                        .text(
                            width +
                            ' × ' +
                            height +
                            ' px'
                        );


                    $('#resizeResultFileSize')
                        .text(
                            formatBytes(
                                resizedBlob.size
                            )
                        );


                    $('#resizeResult')
                        .stop(true, true)
                        .hide()
                        .slideDown(300);


                    /* Hide resize button */

                    $button.hide();


                    /* Show download */

                    $('#resizeDownloadButton')
                        .stop(true, true)
                        .hide()
                        .slideDown(300);


                    /* Show resize another */

                    $('#resizeAnotherButton')
                        .stop(true, true)
                        .hide()
                        .slideDown(300);


                    /* Update preview */

                    const resultUrl =
                        URL.createObjectURL(
                            resizedBlob
                        );


                    $('#resizeImagePreview')
                        .attr(
                            'src',
                            resultUrl
                        );


                    setTimeout(function() {

                        URL.revokeObjectURL(
                            resultUrl
                        );

                    }, 5000);


                } catch (error) {

                    console.error(error);

                    alert(
                        'Unable to resize this image. Please try another image.'
                    );

                }


                $button
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-expand-arrows-alt"></i> Resize Image'
                    );

            });



            /* =========================================================
               RESIZE ENGINE
            ========================================================== */

            function resizeImage(
                file,
                width,
                height
            ) {

                return new Promise(function(
                    resolve,
                    reject
                ) {

                    /* SVG */

                    if (
                        file.type ===
                        'image/svg+xml'
                    ) {

                        const reader =
                            new FileReader();


                        reader.onload =
                            function(event) {

                                try {

                                    const parser =
                                        new DOMParser();


                                    const doc =
                                        parser.parseFromString(
                                            event.target.result,
                                            'image/svg+xml'
                                        );


                                    const svg =
                                        doc.documentElement;


                                    svg.setAttribute(
                                        'width',
                                        width
                                    );


                                    svg.setAttribute(
                                        'height',
                                        height
                                    );


                                    const output =
                                        new XMLSerializer()
                                        .serializeToString(
                                            svg
                                        );


                                    const blob =
                                        new Blob(
                                            [output], {
                                                type: 'image/svg+xml'
                                            }
                                        );


                                    resolve({

                                        blob: blob,

                                        name: createName(
                                            file,
                                            'svg'
                                        )

                                    });

                                } catch (error) {

                                    reject(error);

                                }

                            };


                        reader.onerror = reject;

                        reader.readAsText(file);

                        return;

                    }



                    /* Raster images */

                    const reader =
                        new FileReader();


                    reader.onload =
                        function(event) {

                            const image =
                                new Image();


                            image.onload =
                                function() {

                                    const canvas =
                                        document.createElement(
                                            'canvas'
                                        );


                                    canvas.width =
                                        width;


                                    canvas.height =
                                        height;


                                    const context =
                                        canvas.getContext(
                                            '2d'
                                        );


                                    context.imageSmoothingEnabled =
                                        true;


                                    context.imageSmoothingQuality =
                                        'high';


                                    /* White background for JPG */

                                    if (
                                        file.type ===
                                        'image/jpeg'
                                    ) {

                                        context.fillStyle =
                                            '#ffffff';

                                        context.fillRect(
                                            0,
                                            0,
                                            width,
                                            height
                                        );

                                    }


                                    context.drawImage(
                                        image,
                                        0,
                                        0,
                                        width,
                                        height
                                    );


                                    let outputType =
                                        file.type;


                                    /*
                                     * Canvas cannot reliably
                                     * preserve animated GIFs.
                                     *
                                     * Export GIF as PNG so the
                                     * resized image remains usable.
                                     */

                                    if (
                                        file.type ===
                                        'image/gif'
                                    ) {

                                        outputType =
                                            'image/png';

                                    }


                                    /*
                                     * WebP support
                                     */

                                    if (
                                        file.type !==
                                        'image/jpeg' &&
                                        file.type !==
                                        'image/png' &&
                                        file.type !==
                                        'image/webp' &&
                                        file.type !==
                                        'image/gif'
                                    ) {

                                        outputType =
                                            'image/png';

                                    }


                                    const quality =
                                        outputType ===
                                        'image/png' ?
                                        undefined :
                                        0.92;


                                    canvas.toBlob(
                                        function(blob) {

                                            if (!blob) {

                                                reject(
                                                    new Error(
                                                        'Resize failed.'
                                                    )
                                                );

                                                return;

                                            }


                                            let extension =
                                                'png';


                                            if (
                                                outputType ===
                                                'image/jpeg'
                                            ) {

                                                extension =
                                                    'jpg';

                                            } else if (
                                                outputType ===
                                                'image/webp'
                                            ) {

                                                extension =
                                                    'webp';

                                            }


                                            resolve({

                                                blob: blob,

                                                name: createName(
                                                    file,
                                                    extension
                                                )

                                            });

                                        },
                                        outputType,
                                        quality
                                    );

                                };


                            image.onerror =
                                function() {

                                    reject(
                                        new Error(
                                            'Unable to load image.'
                                        )
                                    );

                                };


                            image.src =
                                event.target.result;

                        };


                    reader.onerror = reject;


                    reader.readAsDataURL(file);

                });

            }



            /* =========================================================
               DOWNLOAD
            ========================================================== */

            $('#resizeDownloadButton').on(
                'click',
                function() {

                    if (!resizedBlob) {

                        alert(
                            'Please resize the image first.'
                        );

                        return;

                    }


                    const url =
                        URL.createObjectURL(
                            resizedBlob
                        );


                    const link =
                        document.createElement('a');


                    link.href =
                        url;


                    link.download =
                        resizedFileName;


                    document.body.appendChild(
                        link
                    );


                    link.click();


                    document.body.removeChild(
                        link
                    );


                    setTimeout(function() {

                        URL.revokeObjectURL(url);

                    }, 1000);

                }
            );



            /* =========================================================
               RESIZE ANOTHER IMAGE
            ========================================================== */

            $('#resizeAnotherButton').on(
                'click',
                function() {

                    resetTool(true);

                }
            );



            /* =========================================================
               RESET
            ========================================================== */

            function resetTool(scrollToTop) {

                if (previewUrl) {

                    URL.revokeObjectURL(
                        previewUrl
                    );

                }


                selectedFile = null;

                resizedBlob = null;

                resizedFileName = '';

                previewUrl = null;

                originalWidth = 0;

                originalHeight = 0;


                $('#resizeImagePreview')
                    .attr(
                        'src',
                        'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85'
                    );


                $('#resizeResult')
                    .hide();


                $('#resizeDownloadButton')
                    .hide();


                $('#resizeAnotherButton')
                    .hide();


                $('#resizeButton')
                    .show()
                    .prop('disabled', false)
                    .html('<i class="fas fa-expand-arrows-alt"></i> Resize Image');


                $('#resizeFileName')
                    .text('-');


                $('#resizeOriginalDimensions')
                    .text('-');


                $('#resizeOriginalFileSize')
                    .text('-');


                $('#resizeOriginalSizeText')
                    .text('-');


                $('#resizeNewSizeText')
                    .text('-');


                $('#resizeResultOriginal')
                    .text('-');


                $('#resizeResultNew')
                    .text('-');


                $('#resizeResultFileSize')
                    .text('-');


                $('#resizeWidth')
                    .val('');


                $('#resizeHeight')
                    .val('');


                $('#resizeUnit')
                    .val('px');


                keepRatio = true;


                $('#resizeRatioLock')
                    .addClass('active')
                    .html(
                        '<i class="fas fa-lock"></i> Keep Aspect Ratio'
                    );


                /* Show upload/hero section, hide workspace */

                $('#resizeWorkspaceSection').hide();

                $('#resizeUploadSection').show();


                if (scrollToTop) {

                    setTimeout(function() {

                        $('html, body').animate({

                            scrollTop: $('#resizeUploadSection')
                                .offset()
                                .top - 20

                        }, 600);

                    }, 150);

                }

            }



            /* =========================================================
               HELPERS
            ========================================================== */

            function createName(
                file,
                extension
            ) {

                const name =
                    file.name.replace(
                        /\.[^/.]+$/,
                        ''
                    );


                return (
                    name +
                    '-resized.' +
                    extension
                );

            }



            function formatBytes(bytes) {

                if (bytes === 0) {

                    return '0 Bytes';

                }


                const units = [

                    'Bytes',
                    'KB',
                    'MB',
                    'GB'

                ];


                const index =
                    Math.floor(
                        Math.log(bytes) /
                        Math.log(1024)
                    );


                return (

                    parseFloat(

                        (
                            bytes /
                            Math.pow(
                                1024,
                                index
                            )

                        ).toFixed(2)

                    ) +

                    ' ' +

                    units[index]

                );

            }



            function escapeHtml(text) {

                return $('<div>')
                    .text(text)
                    .html();

            }

        });
    </script>
@endsection
