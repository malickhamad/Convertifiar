@extends('components.app')

@section('meta')
    <title>Background Remover</title>
    <meta name="description" content="Remove image backgrounds online quickly and easily.">
@endsection

@section('content')

<main class="crop-page">

    {{-- =====================================================
         UPLOAD SECTION
    ====================================================== --}}
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

                <span>Background Remover</span>
            </div>

        </div>
    </section>


    <section class="crop-hero-section" id="uploadStep">
        <div class="container">

            <div class="crop-heading">

                <span class="crop-small-badge">
                    <i class="fas fa-wand-magic-sparkles"></i>
                    Background Remover
                </span>

                <h1>
                    Remove Image<br>
                    <span>Background.</span>
                </h1>

                <p>
                    Upload an image and remove its background instantly.
                </p>

            </div>


            <div class="crop-upload-box" id="uploadBox">

                <div class="crop-upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>

                <h3>Upload your image</h3>

                <p class="crop-upload-text">
                    Drag & drop your image here or
                </p>

                <label
                    for="imageInput"
                    class="crop-upload-btn"
                >
                    <i class="fas fa-upload"></i>
                    Choose Image
                </label>

                <input
                    type="file"
                    id="imageInput"
                    accept="image/png,image/jpeg,image/webp"
                    hidden
                >

                <p class="crop-upload-info">
                    JPG, PNG, WebP
                    <span>|</span>
                    Max 50MB
                </p>

            </div>

        </div>
    </section>


    {{-- =====================================================
         EDITOR SECTION
    ====================================================== --}}
    <section
        class="background-editor-section"
        id="editorStep"
        style="display:none;"
    >

        <div class="container">

            <div class="background-editor">

                <div class="editor-heading">

                    <div>
                        <span>
                            <i class="fas fa-wand-magic-sparkles"></i>
                            Background Remover
                        </span>

                        <h2>Edit your image</h2>
                    </div>

                    <small id="statusText">
                        Ready
                    </small>

                </div>


                <div class="editor-card">

                    {{-- =================================================
                         PREVIEW
                    ================================================== --}}
                    <div class="preview">

                        <div class="preview-top">

                            <strong>
                                <i class="fas fa-image"></i>
                                Image Preview
                            </strong>

                            <span>
                                Transparent PNG
                            </span>

                        </div>


                        <div class="preview-area">

                            <img
                                id="originalPreview"
                                alt="Image preview"
                            >

                            <canvas id="editorCanvas"></canvas>

                        </div>

                    </div>


                    {{-- =================================================
                         FILE INFORMATION
                    ================================================== --}}
                    <div class="file-info">

                        <div class="file-name">

                            <i class="fas fa-file-image"></i>

                            <section>
                                <small>FILE</small>
                                <strong id="fileName">-</strong>
                            </section>

                        </div>


                        <div>
                            <small>SIZE</small>
                            <strong id="imageSize">-</strong>
                        </div>


                        <div>
                            <small>OUTPUT</small>
                            <strong>PNG</strong>
                        </div>

                    </div>


                    {{-- =================================================
                         TOOLS
                    ================================================== --}}
                    <div class="tools">

                        <div class="tool-group">

                            <button
                                type="button"
                                class="tool active"
                                id="removeTool"
                            >
                                <i class="fas fa-eraser"></i>
                                Remove
                            </button>

                            <button
                                type="button"
                                class="tool"
                                id="restoreTool"
                            >
                                <i class="fas fa-paintbrush"></i>
                                Restore
                            </button>

                        </div>


                        <div class="history">

                            <button
                                type="button"
                                id="undoBtn"
                                disabled
                                title="Undo"
                            >
                                <i class="fas fa-rotate-left"></i>
                            </button>

                            <button
                                type="button"
                                id="redoBtn"
                                disabled
                                title="Redo"
                            >
                                <i class="fas fa-rotate-right"></i>
                            </button>

                        </div>


                        <div class="brush">

                            <span>Brush Size</span>

                            <input
                                type="range"
                                id="brushSize"
                                min="5"
                                max="120"
                                value="40"
                            >

                            <strong id="brushValue">
                                40px
                            </strong>

                        </div>

                    </div>


                    {{-- =================================================
                         REMOVE BUTTON
                    ================================================== --}}
                    <button
                        type="button"
                        id="removeBackgroundBtn"
                        class="main-action"
                    >

                        <i class="fas fa-wand-magic-sparkles"></i>

                        <span>
                            <strong>
                                Remove Background
                            </strong>

                            <small>
                                Automatically remove the image background
                            </small>
                        </span>

                        <i class="fas fa-arrow-right"></i>

                    </button>


                    {{-- =================================================
                         DOWNLOAD BUTTON
                    ================================================== --}}
                    <button
                        type="button"
                        id="downloadBtn"
                        class="main-action"
                        style="display:none;"
                    >

                        <i class="fas fa-download"></i>

                        <span>
                            <strong>
                                Download PNG
                            </strong>

                            <small>
                                Save your transparent image
                            </small>
                        </span>

                        <i class="fas fa-arrow-down"></i>

                    </button>


                    {{-- =================================================
                         SECONDARY BUTTONS
                    ================================================== --}}
                    <div class="secondary">

                        <button
                            type="button"
                            id="resetBtn"
                        >
                            <i class="fas fa-rotate-left"></i>
                            Reset
                        </button>

                        <button
                            type="button"
                            id="changeBtn"
                        >
                            <i class="fas fa-images"></i>
                            Add Another Image
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


{{-- =========================================================
     FULL SCREEN LOADER
========================================================= --}}
<div
    id="pageLoader"
    class="page-loader"
>

    <div class="loader-card">

        <div class="loader-icon">

            <div class="loader-ring"></div>

            <i
                id="loaderIcon"
                class="fas fa-wand-magic-sparkles"
            ></i>

        </div>


        <h3 id="loaderTitle">
            Removing Background
        </h3>


        <p id="loaderMessage">
            Preparing your image...
        </p>


        <div class="loader-progress">
            <span id="loaderProgress"></span>
        </div>


        <div class="loader-bottom">

            <strong id="loaderPercent">
                0%
            </strong>

            <span>
                Please wait
            </span>

        </div>

    </div>

</div>


{{-- =========================================================
     BACKGROUND REMOVAL LIBRARY
========================================================= --}}
<script type="module">

import {
    removeBackground,
    preload
} from "https://cdn.jsdelivr.net/npm/@imgly/background-removal@1.7.0/+esm";


$(function () {

    /* =====================================================
       ELEMENTS
    ====================================================== */

    const canvas = document.getElementById('editorCanvas');

    const ctx = canvas.getContext('2d', {
        willReadFrequently: true
    });


    /* =====================================================
       VARIABLES
    ====================================================== */

    let image = new Image();

    let file = null;

    let originalData = null;

    let originalWidth = 0;

    let originalHeight = 0;

    let undo = [];

    let redo = [];

    let tool = 'remove';

    let brushSize = 40;

    let drawing = false;

    let processed = false;

    let loaderCurrent = 0;

    let loaderTarget = 0;

    let loaderAnimation = null;

    let originalObjectUrl = null;


    /* =====================================================
       AI CONFIG
    ====================================================== */

    const aiConfig = {

        model: 'isnet_quint8',

        device: 'gpu',

        proxyToWorker: true,

        output: {
            format: 'image/png',
            quality: 1
        }

    };


    /*
     * Preload model immediately.
     * This allows the model to download before
     * the user starts processing.
     */
    preload(aiConfig).catch(function () {});


    /* =====================================================
       FILE INPUT
    ====================================================== */

    $('#imageInput').on('change', function () {

        if (this.files[0]) {
            loadImage(this.files[0]);
        }

        this.value = '';

    });


    /* =====================================================
       DRAG & DROP
    ====================================================== */

    $('#uploadBox')

        .on('dragover', function (e) {

            e.preventDefault();

            $(this).addClass('drag-active');

        })

        .on('dragleave drop', function (e) {

            e.preventDefault();

            $(this).removeClass('drag-active');

        })

        .on('drop', function (e) {

            const dropped =
                e.originalEvent.dataTransfer.files[0];

            if (dropped) {
                loadImage(dropped);
            }

        });


    /* =====================================================
       LOAD IMAGE
    ====================================================== */

    function loadImage(selectedFile) {

        if (
            !selectedFile.type ||
            !selectedFile.type.startsWith('image/')
        ) {

            alert('Please select a valid image.');

            return;
        }


        if (selectedFile.size > 50 * 1024 * 1024) {

            alert('Maximum file size is 50MB.');

            return;
        }


        file = selectedFile;

        processed = false;

        undo = [];

        redo = [];


        const reader = new FileReader();


        reader.onload = function (e) {

            image.onload = function () {

                originalWidth = image.naturalWidth;

                originalHeight = image.naturalHeight;


                /*
                 * IMPORTANT:
                 * Canvas remains exactly the same size
                 * as the original image.
                 */
                canvas.width = originalWidth;

                canvas.height = originalHeight;


                ctx.globalCompositeOperation =
                    'source-over';


                ctx.clearRect(
                    0,
                    0,
                    canvas.width,
                    canvas.height
                );


                ctx.drawImage(
                    image,
                    0,
                    0,
                    originalWidth,
                    originalHeight
                );


                /*
                 * Keep the ORIGINAL pixels.
                 * Restore uses this data.
                 */
                originalData = ctx.getImageData(
                    0,
                    0,
                    originalWidth,
                    originalHeight
                );


                $('#originalPreview')
                    .attr('src', e.target.result);


                $('#fileName')
                    .text(file.name);


                $('#imageSize')
                    .text(
                        originalWidth +
                        ' × ' +
                        originalHeight
                    );


                updateHistory();


                $('#removeBackgroundBtn')
                    .show()
                    .prop('disabled', false);


                $('#downloadBtn')
                    .hide();


                $('#statusText')
                    .text('Ready');


                $('#uploadStep')
                    .stop(true, true)
                    .slideUp(250);


                $('#editorStep')
                    .stop(true, true)
                    .slideDown(350);


                setTimeout(function () {

                    $('html,body').animate({

                        scrollTop:
                            $('#editorStep')
                                .offset()
                                .top - 15

                    }, 350);

                }, 100);

            };


            image.src = e.target.result;

        };


        reader.readAsDataURL(selectedFile);

    }


    /* =====================================================
       REMOVE BACKGROUND
    ====================================================== */

    $('#removeBackgroundBtn').on(
        'click',
        async function () {

            if (!file) return;


            const button = $(this);


            button.prop('disabled', true);


            $('#statusText')
                .text('Processing');


            startLoader(
                'Removing Background',
                'Preparing your image...',
                2
            );


            try {

                /*
                 * AI working size.
                 *
                 * This is ONLY used by the AI model.
                 * The final canvas remains original resolution.
                 */
                const maxAI = 2000;


                const scale = Math.min(
                    1,
                    maxAI /
                    Math.max(
                        originalWidth,
                        originalHeight
                    )
                );


                const aiWidth = Math.max(
                    1,
                    Math.round(originalWidth * scale)
                );


                const aiHeight = Math.max(
                    1,
                    Math.round(originalHeight * scale)
                );


                const aiCanvas =
                    document.createElement('canvas');


                aiCanvas.width = aiWidth;

                aiCanvas.height = aiHeight;


                const aiCtx =
                    aiCanvas.getContext('2d');


                aiCtx.drawImage(
                    image,
                    0,
                    0,
                    aiWidth,
                    aiHeight
                );


                updateLoader(
                    6,
                    'Preparing AI model...'
                );


                /*
                 * PNG is used instead of JPEG.
                 *
                 * JPEG introduces compression artifacts
                 * around edges and can make background
                 * removal look worse.
                 */
                const aiBlob =
                    await new Promise(function (resolve) {

                        aiCanvas.toBlob(
                            resolve,
                            'image/png'
                        );

                    });


                if (!aiBlob) {
                    throw new Error(
                        'Unable to prepare image.'
                    );
                }


                updateLoader(
                    9,
                    'Analyzing image...'
                );


                /*
                 * ACTUAL BACKGROUND REMOVAL
                 */
                const result =
                    await removeBackground(
                        aiBlob,
                        {

                            ...aiConfig,

                            progress:
                                function (
                                    name,
                                    current,
                                    total
                                ) {

                                    if (
                                        !total ||
                                        total <= 0
                                    ) {
                                        return;
                                    }


                                    const raw =
                                        Math.max(
                                            0,
                                            Math.min(
                                                1,
                                                current /
                                                total
                                            )
                                        );


                                    /*
                                     * Real AI progress:
                                     *
                                     * 9% -> 92%
                                     */
                                    const percent =
                                        9 +
                                        raw * 83;


                                    updateLoader(
                                        percent,
                                        getProgressMessage(
                                            percent
                                        )
                                    );

                                }

                        }
                    );


                updateLoader(
                    93,
                    'Creating transparent image...'
                );


                const resultUrl =
                    URL.createObjectURL(result);


                const resultImage =
                    new Image();


                resultImage.onload = function () {

                    updateLoader(
                        95,
                        'Applying transparent mask...'
                    );


                    /*
                     * IMPORTANT:
                     *
                     * We DON'T replace the original image
                     * with the reduced AI image.
                     *
                     * Instead:
                     *
                     * 1. Original canvas remains original size.
                     * 2. AI result is drawn over it.
                     * 3. This avoids enlarging a low-resolution
                     *    JPEG result.
                     */
                    ctx.globalCompositeOperation =
                        'source-over';


                    ctx.clearRect(
                        0,
                        0,
                        originalWidth,
                        originalHeight
                    );


                    /*
                     * Draw the processed transparent result
                     * at the original dimensions.
                     */
                    ctx.drawImage(
                        resultImage,
                        0,
                        0,
                        originalWidth,
                        originalHeight
                    );


                    URL.revokeObjectURL(resultUrl);


                    updateLoader(
                        98,
                        'Finalizing transparent PNG...'
                    );


                    processed = true;


                    setTimeout(function () {

                        updateLoader(
                            100,
                            'Background removed successfully.'
                        );


                        $('#loaderTitle')
                            .text(
                                'Background Removed'
                            );


                        $('#loaderIcon')
                            .removeClass()
                            .addClass(
                                'fas fa-check'
                            );


                        $('#statusText')
                            .text(
                                'Ready to edit'
                            );


                        $('#removeBackgroundBtn')
                            .hide();


                        $('#downloadBtn')
                            .stop(true, true)
                            .fadeIn(200);


                        button.prop(
                            'disabled',
                            false
                        );


                        setTimeout(
                            hideLoader,
                            650
                        );


                    }, 180);

                };


                resultImage.onerror =
                    function () {

                        URL.revokeObjectURL(
                            resultUrl
                        );

                        throw new Error(
                            'Processed image could not be loaded.'
                        );

                    };


                resultImage.src = resultUrl;


            } catch (error) {

                console.error(error);


                hideLoader();


                button.prop(
                    'disabled',
                    false
                );


                $('#statusText')
                    .text(
                        'Processing failed'
                    );


                alert(
                    'Background removal failed. Please try another image.'
                );

            }

        }
    );


    /* =====================================================
       PROGRESS MESSAGE
    ====================================================== */

    function getProgressMessage(percent) {

        if (percent < 15) {
            return 'Preparing AI engine...';
        }

        if (percent < 30) {
            return 'Analyzing your image...';
        }

        if (percent < 50) {
            return 'Detecting the main subject...';
        }

        if (percent < 70) {
            return 'Removing background...';
        }

        if (percent < 90) {
            return 'Refining image edges...';
        }

        return 'Finishing your image...';

    }


    /* =====================================================
       REMOVE TOOL
    ====================================================== */

    $('#removeTool').on('click', function () {

        tool = 'remove';

        $('.tool').removeClass('active');

        $(this).addClass('active');

    });


    /* =====================================================
       RESTORE TOOL
    ====================================================== */

    $('#restoreTool').on('click', function () {

        tool = 'restore';

        $('.tool').removeClass('active');

        $(this).addClass('active');

    });


    /* =====================================================
       BRUSH SIZE
    ====================================================== */

    $('#brushSize').on('input', function () {

        brushSize = Number(this.value);

        $('#brushValue')
            .text(brushSize + 'px');

    });


    /* =====================================================
       CANVAS POSITION
    ====================================================== */

    function getPosition(e) {

        const rect =
            canvas.getBoundingClientRect();


        return {

            x:
                (e.clientX - rect.left) *
                canvas.width /
                rect.width,

            y:
                (e.clientY - rect.top) *
                canvas.height /
                rect.height

        };

    }


    /* =====================================================
       PAINT
    ====================================================== */

    function paint(e) {

        if (!processed) return;


        const point = getPosition(e);


        /*
         * Brush size is scaled according to
         * the displayed canvas size.
         */
        const scaleX =
            canvas.width /
            canvas.getBoundingClientRect().width;


        const radius =
            (brushSize * scaleX) / 2;


        ctx.save();


        ctx.beginPath();


        ctx.arc(
            point.x,
            point.y,
            radius,
            0,
            Math.PI * 2
        );


        if (tool === 'remove') {

            ctx.globalCompositeOperation =
                'destination-out';

            ctx.fill();

        } else {

            /*
             * Restore original image only
             * inside brush area.
             */
            ctx.clip();

            ctx.globalCompositeOperation =
                'source-over';


            ctx.drawImage(
                image,
                0,
                0,
                originalWidth,
                originalHeight
            );

        }


        ctx.restore();

    }


    /* =====================================================
       POINTER DOWN
    ====================================================== */

    canvas.addEventListener(
        'pointerdown',
        function (e) {

            if (!processed) return;


            drawing = true;


            saveState();


            canvas.setPointerCapture(
                e.pointerId
            );


            paint(e);

        }
    );


    /* =====================================================
       POINTER MOVE
    ====================================================== */

    canvas.addEventListener(
        'pointermove',
        function (e) {

            if (drawing) {
                paint(e);
            }

        }
    );


    /* =====================================================
       POINTER UP
    ====================================================== */

    canvas.addEventListener(
        'pointerup',
        function (e) {

            drawing = false;


            if (
                canvas.hasPointerCapture(
                    e.pointerId
                )
            ) {

                canvas.releasePointerCapture(
                    e.pointerId
                );

            }

        }
    );


    canvas.addEventListener(
        'pointercancel',
        function () {

            drawing = false;

        }
    );


    /* =====================================================
       SAVE STATE
    ====================================================== */

    function saveState() {

        undo.push(
            ctx.getImageData(
                0,
                0,
                canvas.width,
                canvas.height
            )
        );


        /*
         * Keep memory under control.
         */
        if (undo.length > 10) {
            undo.shift();
        }


        redo = [];


        updateHistory();

    }


    /* =====================================================
       UNDO
    ====================================================== */

    $('#undoBtn').on('click', function () {

        if (!undo.length) return;


        redo.push(
            ctx.getImageData(
                0,
                0,
                canvas.width,
                canvas.height
            )
        );


        ctx.putImageData(
            undo.pop(),
            0,
            0
        );


        updateHistory();

    });


    /* =====================================================
       REDO
    ====================================================== */

    $('#redoBtn').on('click', function () {

        if (!redo.length) return;


        undo.push(
            ctx.getImageData(
                0,
                0,
                canvas.width,
                canvas.height
            )
        );


        ctx.putImageData(
            redo.pop(),
            0,
            0
        );


        updateHistory();

    });


    /* =====================================================
       HISTORY
    ====================================================== */

    function updateHistory() {

        $('#undoBtn')
            .prop(
                'disabled',
                !undo.length
            );


        $('#redoBtn')
            .prop(
                'disabled',
                !redo.length
            );

    }


    /* =====================================================
       RESET
    ====================================================== */

    $('#resetBtn').on('click', function () {

        if (!originalData) return;


        saveState();


        ctx.globalCompositeOperation =
            'source-over';


        ctx.putImageData(
            originalData,
            0,
            0
        );


        processed = false;


        $('#removeBackgroundBtn')
            .show()
            .prop(
                'disabled',
                false
            );


        $('#downloadBtn')
            .hide();


        $('#statusText')
            .text('Ready');

    });


    /* =====================================================
       DOWNLOAD
    ====================================================== */

    $('#downloadBtn').on('click', function () {

        if (!processed) return;


        const button = $(this);


        button.prop(
            'disabled',
            true
        );


        startLoader(
            'Preparing Download',
            'Preparing your transparent PNG...',
            5
        );


        /*
         * Let browser render loader first.
         */
        requestAnimationFrame(function () {

            updateLoader(
                20,
                'Preparing image data...'
            );


            /*
             * PNG export preserves transparency.
             */
            canvas.toBlob(
                function (blob) {

                    if (!blob) {

                        hideLoader();

                        button.prop(
                            'disabled',
                            false
                        );

                        return;
                    }


                    updateLoader(
                        75,
                        'Creating high-quality PNG...'
                    );


                    const url =
                        URL.createObjectURL(blob);


                    const link =
                        document.createElement('a');


                    link.href = url;


                    const cleanName =
                        file.name.replace(
                            /\.[^/.]+$/,
                            ''
                        );


                    link.download =
                        cleanName +
                        '-background-removed.png';


                    document.body.appendChild(link);


                    updateLoader(
                        92,
                        'Starting download...'
                    );


                    link.click();


                    link.remove();


                    updateLoader(
                        100,
                        'Download started successfully.'
                    );


                    $('#loaderTitle')
                        .text('Download Ready');


                    $('#loaderIcon')
                        .removeClass()
                        .addClass(
                            'fas fa-check'
                        );


                    setTimeout(function () {

                        URL.revokeObjectURL(url);

                        hideLoader();


                        button.prop(
                            'disabled',
                            false
                        );


                        $('#statusText')
                            .text(
                                'Download complete'
                            );

                    }, 650);

                },

                'image/png'
            );

        });

    });


    /* =====================================================
       ADD ANOTHER IMAGE
    ====================================================== */

    $('#changeBtn').on('click', function () {

        /*
         * Hide editor.
         */
        $('#editorStep')
            .stop(true, true)
            .slideUp(250);


        /*
         * Show original upload section.
         */
        $('#uploadStep')
            .stop(true, true)
            .slideDown(350);


        /*
         * Scroll smoothly to upload section.
         */
        setTimeout(function () {

            $('html,body').animate({

                scrollTop:
                    $('#uploadStep')
                        .offset()
                        .top

            }, 400);

        }, 100);


        /*
         * Reset input so same image can
         * also be selected again.
         */
        $('#imageInput').val('');


        /*
         * Reset editor state.
         */
        file = null;

        processed = false;

        originalData = null;

        undo = [];

        redo = [];

        updateHistory();


        $('#downloadBtn').hide();


        $('#removeBackgroundBtn')
            .show()
            .prop(
                'disabled',
                false
            );


        $('#statusText')
            .text('Ready');

    });


    /* =====================================================
       START LOADER
    ====================================================== */

    function startLoader(
        title,
        message,
        percent = 0
    ) {

        cancelLoaderAnimation();


        loaderCurrent =
            Math.max(
                0,
                Math.min(
                    100,
                    percent
                )
            );


        loaderTarget =
            loaderCurrent;


        $('#loaderTitle')
            .text(title);


        $('#loaderMessage')
            .text(message);


        $('#loaderIcon')
            .removeClass()
            .addClass(
                'fas fa-wand-magic-sparkles'
            );


        setLoaderDisplay(
            loaderCurrent
        );


        /*
         * display:flex is important.
         * It guarantees true page-center positioning.
         */
        $('#pageLoader')
            .stop(true, true)
            .css('display', 'flex')
            .hide()
            .fadeIn(180);


        animateLoader();

    }


    /* =====================================================
       UPDATE LOADER
    ====================================================== */

    function updateLoader(
        percent,
        message
    ) {

        percent =
            Math.max(
                0,
                Math.min(
                    100,
                    Number(percent)
                )
            );


        /*
         * Never move backwards.
         */
        if (percent < loaderTarget) {
            return;
        }


        loaderTarget = percent;


        if (message) {

            $('#loaderMessage')
                .text(message);

        }


        animateLoader();

    }


    /* =====================================================
       SMOOTH LOADER
    ====================================================== */

    function animateLoader() {

        if (loaderAnimation) return;


        function step() {

            const difference =
                loaderTarget -
                loaderCurrent;


            if (
                Math.abs(difference) < 0.05
            ) {

                loaderCurrent =
                    loaderTarget;


                setLoaderDisplay(
                    loaderCurrent
                );


                loaderAnimation = null;

                return;
            }


            /*
             * Smooth interpolation.
             */
            loaderCurrent +=
                difference * 0.12;


            setLoaderDisplay(
                loaderCurrent
            );


            loaderAnimation =
                requestAnimationFrame(step);

        }


        loaderAnimation =
            requestAnimationFrame(step);

    }


    /* =====================================================
       DISPLAY LOADER
    ====================================================== */

    function setLoaderDisplay(value) {

        const percent =
            Math.round(
                Math.max(
                    0,
                    Math.min(
                        100,
                        value
                    )
                )
            );


        /*
         * SAME percentage is used for:
         *
         * Number
         * Progress bar
         */
        $('#loaderProgress')
            .css(
                'width',
                percent + '%'
            );


        $('#loaderPercent')
            .text(
                percent + '%'
            );

    }


    /* =====================================================
       HIDE LOADER
    ====================================================== */

    function hideLoader() {

        cancelLoaderAnimation();


        $('#pageLoader')
            .stop(true, true)
            .fadeOut(
                220,
                function () {

                    loaderCurrent = 0;

                    loaderTarget = 0;

                    setLoaderDisplay(0);

                }
            );

    }


    /* =====================================================
       CANCEL LOADER
    ====================================================== */

    function cancelLoaderAnimation() {

        if (loaderAnimation) {

            cancelAnimationFrame(
                loaderAnimation
            );

            loaderAnimation = null;

        }

    }

});

</script>


<style>

/* =========================================================
   EDITOR
========================================================= */

.background-editor-section {
    padding: 15px 0 60px;
}

.background-editor {
    max-width: 900px;
    margin: auto;
}

.editor-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}

.editor-heading span {
    color: #2563eb;
    font-size: 12px;
    font-weight: 700;
}

.editor-heading h2 {
    margin: 3px 0 0;
    color: #172033;
    font-size: 22px;
}

.editor-heading > small {
    padding: 7px 13px;
    border-radius: 20px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 10px;
    font-weight: 700;
}


/* =========================================================
   CARD
========================================================= */

.editor-card {
    padding: 10px;
    border: 1px solid #dce7f7;
    border-radius: 15px;
    background: #f7faff;
    box-shadow: 0 12px 35px rgba(37,99,235,.08);
}


/* =========================================================
   PREVIEW
========================================================= */

.preview {
    overflow: hidden;
    border: 1px solid #dce7f7;
    border-radius: 11px;
    background: #fff;
}

.preview-top {
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    border-bottom: 1px solid #e7eef8;
}

.preview-top strong {
    color: #334155;
    font-size: 13px;
}

.preview-top strong i {
    margin-right: 5px;
    color: #2563eb;
}

.preview-top span {
    color: #64748b;
    font-size: 10px;
    font-weight: 600;
}

.preview-area {
    position: relative;
    min-height: 470px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #fff;
    background-image:
        linear-gradient(45deg,#e9eef7 25%,transparent 25%),
        linear-gradient(-45deg,#e9eef7 25%,transparent 25%),
        linear-gradient(45deg,transparent 75%,#e9eef7 75%),
        linear-gradient(-45deg,transparent 75%,#e9eef7 75%);
    background-size: 26px 26px;
    background-position:
        0 0,
        0 13px,
        13px -13px,
        -13px 0;
}

#originalPreview,
#editorCanvas {
    max-width: 94%;
    max-height: 455px;
    object-fit: contain;
}

#editorCanvas {
    position: absolute;
    cursor: crosshair;
    touch-action: none;
}


/* =========================================================
   FILE INFO
========================================================= */

.file-info {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 8px;
    margin-top: 8px;
}

.file-info > div {
    min-width: 0;
    padding: 12px;
    border: 1px solid #dce7f7;
    border-radius: 8px;
    background: #fff;
}

.file-name {
    display: flex;
    align-items: center;
    gap: 9px;
}

.file-name > i {
    color: #2563eb;
}

.file-info small {
    display: block;
    margin-bottom: 3px;
    color: #94a3b8;
    font-size: 8px;
    font-weight: 700;
}

.file-info strong {
    display: block;
    overflow: hidden;
    color: #334155;
    font-size: 11px;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================================
   TOOLS
========================================================= */

.tools {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 8px;
    padding: 9px;
    border: 1px solid #dce7f7;
    border-radius: 9px;
    background: #fff;
}

.tool-group,
.history {
    display: flex;
    gap: 5px;
}

.tool,
.history button {
    height: 42px;
    border: 1px solid #d8e3f3;
    border-radius: 8px;
    background: #f8fbff;
    color: #475569;
    cursor: pointer;
    font-size: 14px;
    font-weight: 700;
    transition: .2s;
}

.tool {
    min-width: 110px;
    padding: 0 16px;
}

.history button {
    width: 42px;
}

.tool:hover,
.tool.active,
.history button:hover:not(:disabled) {
    border-color: #93c5fd;
    background: #eff6ff;
    color: #2563eb;
}

.tool.active {
    box-shadow: 0 4px 12px rgba(37,99,235,.10);
}

.history button:disabled {
    opacity: .35;
    cursor: not-allowed;
}

.brush {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-left: auto;
}

.brush span {
    color: #64748b;
    font-size: 11px;
    font-weight: 600;
}

.brush input {
    width: 110px;
    accent-color: #2563eb;
}

.brush strong {
    color: #475569;
    font-size: 11px;
}


/* =========================================================
   MAIN ACTION
========================================================= */

.main-action {
    width: 100%;
    min-height: 62px;
    display: flex;
    align-items: center;
    gap: 13px;
    margin-top: 9px;
    padding: 9px 14px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );
    color: #fff;
    cursor: pointer;
    text-align: left;
    box-shadow: 0 8px 20px rgba(37,99,235,.20);
    transition: .2s;
}

.main-action:hover {
    transform: translateY(-1px);
    box-shadow: 0 12px 28px rgba(37,99,235,.27);
}

.main-action:disabled {
    opacity: .6;
    cursor: not-allowed;
    transform: none;
}

.main-action > i:first-child {
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    border-radius: 8px;
    background: rgba(255,255,255,.15);
    font-size: 16px;
}

.main-action span {
    flex: 1;
}

.main-action strong {
    display: block;
    font-size: 15px;
    font-weight: 800;
}

.main-action small {
    display: block;
    margin-top: 3px;
    color: rgba(255,255,255,.82);
    font-size: 10px;
}

.main-action > i:last-child {
    margin-right: 4px;
    font-size: 12px;
}


/* =========================================================
   SECONDARY BUTTONS
========================================================= */

.secondary {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 6px;
}

.secondary button {
    padding: 9px 14px;
    border: 1px solid transparent;
    border-radius: 7px;
    background: transparent;
    color: #64748b;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    transition: .2s;
}

.secondary button:hover {
    border-color: #dbeafe;
    background: #eff6ff;
    color: #2563eb;
}


/* =========================================================
   FULL PAGE LOADER
========================================================= */

.page-loader {
    position: fixed;
    inset: 0;
    z-index: 999999;
    display: none;
    align-items: center;
    justify-content: center;
    width: 100vw;
    height: 100vh;
    padding: 20px;
    background: rgba(15,23,42,.58);
    backdrop-filter: blur(8px);
}

.loader-card {
    width: min(360px,100%);
    padding: 30px 28px 25px;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 18px;
    background: rgba(255,255,255,.98);
    box-shadow: 0 25px 70px rgba(15,23,42,.30);
    text-align: center;
}

.loader-icon {
    position: relative;
    width: 64px;
    height: 64px;
    display: grid;
    place-items: center;
    margin: 0 auto 17px;
    border-radius: 50%;
    background: linear-gradient(
        135deg,
        #eff6ff,
        #eef2ff
    );
    color: #2563eb;
}

.loader-ring {
    position: absolute;
    inset: -3px;
    border: 4px solid #dbeafe;
    border-top-color: #2563eb;
    border-right-color: #4f46e5;
    border-radius: 50%;
    animation: loaderSpin .8s linear infinite;
}

.loader-icon i {
    font-size: 20px;
}

.loader-card h3 {
    margin: 0;
    color: #172033;
    font-size: 18px;
    font-weight: 800;
}

.loader-card p {
    min-height: 17px;
    margin: 6px 0 0;
    color: #64748b;
    font-size: 11px;
}

.loader-progress {
    height: 9px;
    margin-top: 20px;
    overflow: hidden;
    border-radius: 20px;
    background: #e7edf7;
}

.loader-progress span {
    display: block;
    width: 0;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(
        90deg,
        #2563eb,
        #4f46e5
    );
    transition: width .08s linear;
}

.loader-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 8px;
}

.loader-bottom strong {
    color: #2563eb;
    font-size: 13px;
}

.loader-bottom span {
    color: #94a3b8;
    font-size: 9px;
}


@keyframes loaderSpin {
    to {
        transform: rotate(360deg);
    }
}


/* =========================================================
   DRAG
========================================================= */

#uploadBox.drag-active {
    border-color: #2563eb;
    background: #eff6ff;
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:767px) {

    .editor-heading {
        align-items: flex-start;
        flex-direction: column;
        gap: 7px;
    }

    .preview-area {
        min-height: 320px;
    }

    .file-info {
        grid-template-columns: 1fr 1fr;
    }

    .file-name {
        grid-column: 1 / -1;
    }

    .tools {
        flex-wrap: wrap;
    }

    .tool-group {
        flex: 1;
    }

    .tool {
        flex: 1;
        min-width: 0;
        padding: 0 10px;
    }

    .brush {
        width: 100%;
        margin-left: 0;
    }

    .brush input {
        flex: 1;
        width: auto;
    }

    .secondary {
        flex-wrap: wrap;
    }

    .secondary button {
        font-size: 12px;
    }

    .loader-card {
        padding: 27px 22px 23px;
    }

}

</style>

@endsection