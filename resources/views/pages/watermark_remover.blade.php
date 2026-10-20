@extends('components.app')

@section('meta')
    <title>Free Watermark Remover Online | XConvertifire</title>
    <meta name="description"
        content="Select unwanted watermark areas in your images or PDF pages with XConvertifire. Preview and download your edited file in the same format.">
@endsection

@section('content')
    <main class="crop-page">

        <!-- Breadcrumb -->
        <section class="crop-breadcrumb-section">
            <div class="container">
                <div class="crop-breadcrumb">
                    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <span>Watermark Remover</span>
                </div>
            </div>
        </section>

        <!-- Upload Section -->
        <section class="crop-hero-section" id="uploadSection">
            <div class="container">
                <div class="crop-heading">
                    <span class="crop-small-badge">
                        <i class="fas fa-eraser"></i> Image Tool
                    </span>

                    <h1>Watermark Remover<br>
                        <span>Clean Your Images Online.</span>
                    </h1>

                    <p>Upload an image or a PDF page, select the unwanted area, and download in the same format.</p>
                </div>

                <div class="crop-upload-box" id="uploadBox" role="button" tabindex="0"
                    aria-label="Click to choose a file">

                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>

                    <h3>Upload your file</h3>
                    <p class="crop-upload-text">Drag &amp; drop your file here or click to browse.</p>

                    <label for="fileInput" class="crop-upload-btn">
                        <i class="fas fa-upload me-2"></i>Choose File
                    </label>

                    <input type="file" id="fileInput" accept="image/jpeg,image/png,image/webp,application/pdf" hidden>

                    <p class="crop-upload-info">JPG, PNG, WebP, PDF | Maximum 20MB</p>

                    <small class="text-secondary">
                        <i class="fas fa-lock me-1"></i>
                        Your file stays in your browser.
                    </small>
                </div>
            </div>
        </section>

        <!-- Editor -->
        <section id="workspace" class="compressor-workspace-section" style="display:none">
            <div class="container py-4">

                <!-- Editor Header -->
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                    <div>
                        <span class="badge text-bg-primary mb-2">IMAGE EDITOR</span>
                        <h2 class="mb-1">Edit Your Image</h2>
                        <p class="text-secondary mb-0">Brush over the area you want to clean.</p>
                    </div>

                    <button type="button" class="btn btn-outline-light" id="cancelBtn">
                        <i class="fas fa-folder-open me-2"></i>Upload New
                    </button>
                </div>

                <div class="row g-4">

                    <!-- Image Preview -->
                    <div class="col-lg-8">
                        <div class="wm-editor">

                            <div class="wm-editor-topbar">
                                <span><i class="fas fa-image me-2"></i>Image Preview</span>
                                <span class="small text-secondary">
                                    <i class="fas fa-circle text-primary me-1"></i>
                                    Selected Area
                                </span>
                            </div>

                            <div class="wm-canvas-area">
                                <div class="compressor-image-container position-relative">
                                    <canvas id="imageCanvas" class="w-100 d-block"></canvas>

                                    <canvas id="brushCanvas" class="position-absolute top-0 start-0 w-100 h-100"
                                        style="cursor:crosshair;touch-action:none"></canvas>
                                </div>
                            </div>

                            <div class="wm-editor-footer">
                                <i class="fas fa-info-circle me-2"></i>
                                Brush over the unwanted area. The blue overlay shows your selection.
                            </div>
                        </div>

                        <p id="statusText" class="small text-secondary mt-3 mb-0" role="status" aria-live="polite">
                            Upload a file to get started.
                        </p>

                        <!-- PDF page picker (inside editor so it stays usable) -->
                        <div id="pdfPagePicker" class="mt-3" style="display:none">
                            <label for="pdfPage" class="form-label fw-semibold">PDF page</label>
                            <div class="d-flex gap-2 align-items-center">
                                <select id="pdfPage" class="form-select" style="max-width:220px"></select>
                                <button type="button" id="loadPdfPageBtn" class="btn btn-primary">
                                    <i class="fas fa-sync-alt me-2"></i>Load Page
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Editing Controls -->
                    <div class="col-lg-4">
                        <div class="wm-controls">

                            <div class="wm-controls-heading">
                                <div class="wm-control-icon">
                                    <i class="fas fa-sliders-h"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Editing Tools</h5>
                                    <small class="text-secondary">Adjust your selection</small>
                                </div>
                            </div>

                            <hr>

                            <!-- Brush Size -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="brushSize" class="form-label fw-semibold mb-0">
                                        Brush Size
                                    </label>

                                    <span class="badge text-bg-primary">
                                        <span id="brushValue">35</span> px
                                    </span>
                                </div>

                                <input type="range" id="brushSize" class="form-range" min="10" max="100"
                                    value="35">

                                <div class="d-flex justify-content-between small text-secondary">
                                    <span>Small</span>
                                    <span>Large</span>
                                </div>
                            </div>

                            <!-- Clear Selection & Undo -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <button type="button" id="clearBtn" class="btn btn-outline-secondary flex-grow-1"
                                    disabled>
                                    <i class="fas fa-eraser me-2"></i>Clear Selection
                                </button>

                                <button type="button" id="undoBtn" class="btn btn-outline-secondary flex-grow-1"
                                    disabled>
                                    <i class="fas fa-undo me-2"></i>Undo
                                </button>
                            </div>

                            <div class="wm-tip mb-4">
                                <i class="fas fa-lightbulb me-2"></i>
                                <strong>Tip:</strong> Select the entire unwanted area, including its edges.
                            </div>

                            <!-- Primary Action -->
                            <button type="button" id="removeBtn" class="btn btn-primary w-100 py-3 mb-3" disabled>
                                <i class="fas fa-magic me-2"></i>Clean Selected Area
                            </button>

                            <!-- Download appears after cleaning -->
                            <button type="button" id="downloadBtn" class="btn btn-success w-100 py-3"
                                style="display:none">
                                <i class="fas fa-download me-2"></i>Download
                            </button>

                            <div class="wm-privacy mt-4">
                                <i class="fas fa-lock me-2"></i>
                                Image and PDF processing runs locally in your browser.
                            </div>

                            <small class="d-block text-secondary mt-3">
                                This tool blurs the selected area. It does not reconstruct the background.
                            </small>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <style>
        .wm-editor,
        .wm-controls {
            background: #111827;
            color: #fff;
            border: 1px solid #263449;
            border-radius: 16px;
            overflow: hidden;
        }

        .wm-editor-topbar,
        .wm-editor-footer {
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .wm-editor-topbar {
            border-bottom: 1px solid #263449;
        }

        .wm-canvas-area {
            padding: 16px;
            background: #0b1120;
            max-height: 500px;
            overflow: auto;
        }

        .wm-canvas-area canvas {
            max-width: 100%;
            height: auto;
        }

        .wm-editor-footer {
            justify-content: flex-start;
            border-top: 1px solid #263449;
            color: #c2ccda;
            font-size: 13px;
        }

        .wm-controls {
            padding: 22px;
        }

        .wm-controls-heading {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .wm-control-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #173b73;
            color: #8bc1ff;
            font-size: 20px;
            flex-shrink: 0;
        }

        .wm-tip {
            padding: 13px;
            border-radius: 10px;
            background: #172b43;
            color: #d5e5ff;
            font-size: 13px;
        }

        .wm-privacy {
            color: #a8b5c7;
            font-size: 13px;
        }

        #brushCanvas {
            display: block;
            cursor: crosshair;
        }

        #uploadBox {
            cursor: pointer;
        }

        #uploadBox.drag-active {
            border-color: #0d6efd;
            background-color: rgba(13, 110, 253, .08);
        }

        #uploadBox label {
            cursor: pointer;
        }

        @media (max-width: 575px) {
            .wm-controls {
                padding: 16px;
            }

            .wm-editor-topbar,
            .wm-editor-footer {
                padding: 12px;
            }

            .wm-canvas-area {
                padding: 8px;
            }
        }
    </style>
@endsection

@section('scripts')
    <!-- PDF.js for reading PDFs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>

    <!-- pdf-lib for writing PDFs back out -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>

    <script>
        $(function() {
            const canvas = document.getElementById('imageCanvas');
            const brush = document.getElementById('brushCanvas');
            const ctx = canvas.getContext('2d');
            const bctx = brush.getContext('2d');

            const mask = document.createElement('canvas');
            const mctx = mask.getContext('2d');

            // Cap canvas dimensions to avoid crashing mobile on huge images.
            const MAX_DIM = 4096;

            let originalImage = null; // never overwritten after load
            let image = null; // current working image (original by default)
            let imageUrl = null;
            let fileName = 'cleaned-image.png';
            let outputMime = 'image/png';
            let outputExt = 'png';

            let drawing = false;
            let hasImage = false;
            let hasSelection = false;
            let resultReady = false;
            let busy = false;

            // PDF state
            let pdfDoc = null;
            let currentPdfFile = null;
            let currentPdfBytes = null;
            let currentPdfPage = 1;

            function status(message) {
                $('#statusText').text(message);
            }

            function updateButtons() {
                $('#downloadBtn').toggle(resultReady);
                $('#undoBtn').prop('disabled', !resultReady || busy);
                $('#clearBtn').prop('disabled', !hasSelection || busy);
                $('#removeBtn').prop('disabled', !hasImage || !hasSelection || busy);
                $('#loadPdfPageBtn').prop('disabled', busy);
                $('#pdfPage').prop('disabled', busy);

                // Dynamic download label — reflects actual output format
                if (resultReady) {
                    const label = ({
                        jpg: 'Download JPG',
                        png: 'Download PNG',
                        webp: 'Download WebP',
                        pdf: 'Download PDF'
                    })[outputExt] || 'Download';
                    $('#downloadBtn').html('<i class="fas fa-download me-2"></i>' + label);
                }
            }

            function drawOriginal() {
                if (!originalImage) return;
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(originalImage, 0, 0, canvas.width, canvas.height);
            }

            function resetResult() {
                resultReady = false;
                updateButtons();
            }

            function clearSelection() {
                bctx.clearRect(0, 0, brush.width, brush.height);
                mctx.clearRect(0, 0, mask.width, mask.height);
                hasSelection = false;
                resetResult();
                drawOriginal();
            }

            /* ----------------------------------------------------------------
               Adopt any image-like source into the editor with memory safety.
            ---------------------------------------------------------------- */
            function adoptSource(source, name, mime, ext) {
                const w = source.naturalWidth || source.width;
                const h = source.naturalHeight || source.height;

                const scale = Math.min(1, MAX_DIM / Math.max(w, h));
                const cw = Math.max(1, Math.floor(w * scale));
                const ch = Math.max(1, Math.floor(h * scale));

                originalImage = source;
                image = source;

                canvas.width = brush.width = mask.width = cw;
                canvas.height = brush.height = mask.height = ch;

                hasImage = true;
                hasSelection = false;
                resultReady = false;
                busy = false;

                outputMime = mime;
                outputExt = ext;
                fileName = name.replace(/\.[^.]+$/, '') + '-cleaned.' + ext;

                drawOriginal();
                clearSelection();
                updateButtons();

                $('#uploadSection').hide();
                $('#workspace').show();
                status('Brush over the unwanted area to select it.');
            }

            /* ----------------------------------------------------------------
               Image loader
            ---------------------------------------------------------------- */
            function loadImageFile(file) {
                if (imageUrl) URL.revokeObjectURL(imageUrl);

                const url = URL.createObjectURL(file);
                imageUrl = url;
                const newImage = new Image();

                status('Loading image...');

                const mime = file.type || 'image/png';
                const ext = ({
                    'image/jpeg': 'jpg',
                    'image/png': 'png',
                    'image/webp': 'webp'
                })[mime] || 'png';

                newImage.onload = function() {
                    if (imageUrl !== url) {
                        URL.revokeObjectURL(url);
                        return;
                    }
                    adoptSource(newImage, file.name, mime, ext);
                    URL.revokeObjectURL(url);
                    imageUrl = null;
                };

                newImage.onerror = function() {
                    if (imageUrl === url) {
                        URL.revokeObjectURL(url);
                        imageUrl = null;
                        alert('Unable to open this image. Please try another file.');
                        status('Could not load the image.');
                    }
                };

                newImage.src = url;
            }

            /* ----------------------------------------------------------------
               PDF loader
            ---------------------------------------------------------------- */
            async function renderPdfPage(pageNum) {
                if (!pdfDoc || busy) return;

                busy = true;
                updateButtons();
                status('Rendering PDF page ' + pageNum + '...');

                try {
                    currentPdfPage = pageNum;
                    const page = await pdfDoc.getPage(pageNum);
                    const viewport = page.getViewport({
                        scale: 2
                    });

                    const off = document.createElement('canvas');
                    off.width = Math.floor(viewport.width);
                    off.height = Math.floor(viewport.height);

                    await page.render({
                        canvasContext: off.getContext('2d'),
                        viewport: viewport
                    }).promise;

                    const baseName = (currentPdfFile?.name || 'document')
                        .replace(/\.[^.]+$/, '') + '-page-' + pageNum;

                    adoptSource(off, baseName, 'application/pdf', 'pdf');
                    status('PDF page ' + pageNum + ' loaded. Brush over the area you want to clean.');
                } catch (err) {
                    console.error(err);
                    alert('Could not render this PDF page.');
                    status('Failed to render the PDF page.');
                } finally {
                    busy = false;
                    updateButtons();
                }
            }

            async function loadPdfFile(file) {
                currentPdfFile = file;
                status('Reading PDF...');

                try {
                    const buf = await file.arrayBuffer();
                    currentPdfBytes = new Uint8Array(buf);
                    pdfDoc = await pdfjsLib.getDocument({
                        data: currentPdfBytes.slice()
                    }).promise;

                    const $sel = $('#pdfPage').empty();
                    for (let i = 1; i <= pdfDoc.numPages; i++) {
                        $sel.append(new Option('Page ' + i, i));
                    }
                    // Picker stays visible inside the editor now
                    $('#pdfPagePicker').show();

                    await renderPdfPage(1);
                } catch (err) {
                    console.error(err);
                    pdfDoc = null;
                    currentPdfFile = null;
                    currentPdfBytes = null;
                    $('#pdfPagePicker').hide();
                    alert('Could not read this PDF. Please try another file.');
                    status('Failed to load the PDF.');
                }
            }

            /* ----------------------------------------------------------------
               Dispatch
            ---------------------------------------------------------------- */
            function handleFile(file) {
                if (!file) return;

                if (file.size > 20 * 1024 * 1024) {
                    alert('Maximum file size is 20MB.');
                    return;
                }

                const type = file.type;
                const name = (file.name || '').toLowerCase();

                if (['image/jpeg', 'image/png', 'image/webp'].includes(type)) {
                    $('#pdfPagePicker').hide();
                    pdfDoc = null;
                    currentPdfFile = null;
                    currentPdfBytes = null;
                    loadImageFile(file);
                    return;
                }

                if (type === 'application/pdf' || name.endsWith('.pdf')) {
                    loadPdfFile(file);
                    return;
                }

                alert('Please select a JPG, PNG, WebP image or a PDF file.');
            }

            /* ----------------------------------------------------------------
               Upload box
            ---------------------------------------------------------------- */
            $('#uploadBox').on('click', function(e) {
                if ($(e.target).closest('label').length) return;
                document.getElementById('fileInput').click();
            });

            $('#uploadBox').on('keydown', function(e) {
                if (e.target !== this) return;
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    document.getElementById('fileInput').click();
                }
            });

            $('#fileInput').on('change', function() {
                const f = this.files[0];
                this.value = ''; // clear before processing
                handleFile(f);
            });

            $('#uploadBox')
                .on('dragenter dragover', function(e) {
                    e.preventDefault();
                    $(this).addClass('drag-active');
                })
                .on('dragleave', function(e) {
                    e.preventDefault();
                    $(this).removeClass('drag-active');
                })
                .on('drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('drag-active');
                    handleFile(e.originalEvent.dataTransfer.files[0]);
                });

            /* ----------------------------------------------------------------
               PDF page switching
            ---------------------------------------------------------------- */
            $('#loadPdfPageBtn').on('click', function() {
                const n = Number($('#pdfPage').val());
                if (n && pdfDoc && !busy) renderPdfPage(n);
            });

            /* ----------------------------------------------------------------
               Brush
            ---------------------------------------------------------------- */
            $('#brushSize').on('input', function() {
                $('#brushValue').text(this.value);
            });

            brush.addEventListener('pointerdown', function(e) {
                if (!hasImage || busy) return;
                e.preventDefault();
                drawing = true;
                brush.setPointerCapture(e.pointerId);
                paint(e);
            });

            brush.addEventListener('pointermove', function(e) {
                if (drawing) paint(e);
            });

            ['pointerup', 'pointercancel', 'lostpointercapture'].forEach(event => {
                brush.addEventListener(event, () => drawing = false);
            });

            function paint(e) {
                const rect = brush.getBoundingClientRect();
                if (!rect.width || !rect.height) return;

                const scaleX = brush.width / rect.width;
                const scaleY = brush.height / rect.height;
                const x = (e.clientX - rect.left) * scaleX;
                const y = (e.clientY - rect.top) * scaleY;
                const size = Number($('#brushSize').val());

                bctx.fillStyle = 'rgba(0, 123, 255, 0.65)';
                bctx.beginPath();
                bctx.ellipse(x, y, size * scaleX / 2, size * scaleY / 2, 0, 0, Math.PI * 2);
                bctx.fill();

                mctx.fillStyle = '#fff';
                mctx.beginPath();
                mctx.ellipse(x, y, size * scaleX / 2, size * scaleY / 2, 0, 0, Math.PI * 2);
                mctx.fill();

                hasSelection = true;
                resetResult();
                status('Area selected. Click Clean Selected Area to preview.');
            }

            /* ----------------------------------------------------------------
               Actions
            ---------------------------------------------------------------- */
            $('#clearBtn').on('click', function() {
                if (!hasImage || busy) return;
                clearSelection();
                status('Selection cleared. Select the area you want to clean.');
            });

            $('#undoBtn').on('click', function() {
                if (!hasImage || !resultReady || busy) return;
                drawOriginal();
                resetResult();
                status('Original image restored. Your selection is still available.');
            });

            $('#removeBtn').on('click', function() {
                if (!hasImage || busy) return;
                if (!hasSelection) {
                    status('Please brush over an area first.');
                    return;
                }

                busy = true;
                updateButtons();
                status('Applying blur to selected area...');

                try {
                    const blurred = document.createElement('canvas');
                    blurred.width = canvas.width;
                    blurred.height = canvas.height;

                    const b = blurred.getContext('2d');
                    b.filter = 'blur(12px)';
                    b.drawImage(originalImage, 0, 0, blurred.width, blurred.height);
                    b.filter = 'none';

                    b.globalCompositeOperation = 'destination-in';
                    b.drawImage(mask, 0, 0);
                    b.globalCompositeOperation = 'source-over';

                    drawOriginal();
                    ctx.drawImage(blurred, 0, 0);

                    resultReady = true;
                    status('Preview ready. Download your file or undo the changes.');
                } catch (err) {
                    console.error(err);
                    status('Could not apply the blur. Please try again.');
                } finally {
                    busy = false;
                    updateButtons();
                }
            });

            /* ----------------------------------------------------------------
               Download — output format matches input format
            ---------------------------------------------------------------- */
            $('#downloadBtn').on('click', async function() {
                if (!resultReady || busy) return;

                if (outputMime === 'application/pdf') {
                    await downloadAsPdf();
                } else {
                    downloadAsImage();
                }
            });

            function downloadAsImage() {
                let sourceCanvas = canvas;
                if (outputMime === 'image/jpeg') {
                    const flat = document.createElement('canvas');
                    flat.width = canvas.width;
                    flat.height = canvas.height;
                    const fctx = flat.getContext('2d');
                    fctx.fillStyle = '#ffffff';
                    fctx.fillRect(0, 0, flat.width, flat.height);
                    fctx.drawImage(canvas, 0, 0);
                    sourceCanvas = flat;
                }

                const quality = (outputMime === 'image/jpeg' || outputMime === 'image/webp') ? 0.92 : undefined;

                sourceCanvas.toBlob(function(blob) {
                    if (!blob) {
                        status('Unable to create the image file. Please try again.');
                        return;
                    }
                    triggerDownload(blob, fileName);
                }, outputMime, quality);
            }

            async function downloadAsPdf() {
                if (busy) return;
                busy = true;
                updateButtons();

                try {
                    status('Building PDF...');

                    const {
                        PDFDocument
                    } = PDFLib;

                    const pdfDocLib = await PDFDocument.load(currentPdfBytes, {
                        ignoreEncryption: true
                    });

                    const editedBlob = await new Promise(resolve =>
                        canvas.toBlob(resolve, 'image/png')
                    );
                    const editedBytes = new Uint8Array(await editedBlob.arrayBuffer());
                    const editedImage = await pdfDocLib.embedPng(editedBytes);

                    const targetIndex = currentPdfPage - 1;
                    const pages = pdfDocLib.getPages();
                    const original = pages[targetIndex];
                    const {
                        width,
                        height
                    } = original.getSize();

                    pdfDocLib.removePage(targetIndex);
                    const newPage = pdfDocLib.insertPage(targetIndex, [width, height]);
                    newPage.drawImage(editedImage, {
                        x: 0,
                        y: 0,
                        width,
                        height
                    });

                    const outBytes = await pdfDocLib.save();
                    const blob = new Blob([outBytes], {
                        type: 'application/pdf'
                    });
                    triggerDownload(blob, fileName);

                    status('PDF downloaded. Other pages were kept unchanged.');
                } catch (err) {
                    console.error(err);
                    status('Could not build the PDF. Try downloading as PNG instead.');
                    alert('Failed to build the PDF: ' + (err.message || err));
                } finally {
                    busy = false;
                    updateButtons();
                }
            }

            function triggerDownload(blob, name) {
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = name;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                setTimeout(() => URL.revokeObjectURL(url), 1000);
            }

            /* ----------------------------------------------------------------
               Upload New
            ---------------------------------------------------------------- */
            $('#cancelBtn').on('click', function() {
                if (imageUrl) URL.revokeObjectURL(imageUrl);
                imageUrl = null;
                pdfDoc = null;
                currentPdfFile = null;
                currentPdfBytes = null;
                currentPdfPage = 1;

                originalImage = null;
                image = null;
                drawing = false;
                hasImage = hasSelection = resultReady = busy = false;

                canvas.width = brush.width = mask.width = 0;
                canvas.height = brush.height = mask.height = 0;

                outputMime = 'image/png';
                outputExt = 'png';
                fileName = 'cleaned-image.png';

                $('#pdfPagePicker').hide();
                $('#workspace').hide();
                $('#uploadSection').show();
                updateButtons();
                status('Upload a file to get started.');

                document.getElementById('fileInput').click();
            });
        });
    </script>
@endsection
