@extends('app')

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
             HERO / UPLOAD SECTION
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
                <div class="crop-upload-box" id="resizeUploadBox">

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
             RESIZE INFORMATION / TOOL SECTION
        ========================================================== -->
        <section class="crop-info-section">

            <div class="container">

                <div class="crop-info-card" id="resizeSection">


                    <!-- =================================================
                         LEFT SIDE
                    ================================================== -->
                    <div class="crop-info-content">

                        <span class="crop-info-badge">
                            ABOUT
                        </span>

                        <h2>
                            Resize Images<br>
                            <span>Without Complication</span>
                        </h2>

                        <p class="crop-info-description">
                            Define the exact dimensions you need using pixels
                            or percentage. Keep your image proportions with
                            the aspect ratio lock and resize everything directly
                            in your browser.
                        </p>


                        <!-- Feature 01 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-blue">
                                <i class="fas fa-ruler-combined"></i>
                            </div>

                            <div>

                                <h4>
                                    Custom Dimensions
                                </h4>

                                <p>
                                    Set your preferred width and height in pixels
                                    or percentage.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 02 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-purple">
                                <i class="fas fa-link"></i>
                            </div>

                            <div>

                                <h4>
                                    Keep Aspect Ratio
                                </h4>

                                <p>
                                    Lock proportions to prevent stretching or
                                    distortion.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 03 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-green">
                                <i class="fas fa-shield-alt"></i>
                            </div>

                            <div>

                                <h4>
                                    Secure & Private
                                </h4>

                                <p>
                                    Your images are processed directly in your
                                    browser.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- =================================================
                         RIGHT SIDE
                    ================================================== -->
                    <div class="crop-preview-wrapper">


                        <!-- =================================================
                             IMAGE PREVIEW
                        ================================================== -->
                        <div class="crop-preview-card">

                            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="Image Resize Preview" class="crop-preview-image" id="resizeImagePreview">

                        </div>



                        <!-- =================================================
                             NORMAL STATE
                        ================================================== -->
                        <div id="resizeNormalState">

                            <div class="crop-ratio-panel">

                                <span class="crop-ratio-title">
                                    Resize Options
                                </span>

                                <div class="crop-ratio-buttons">

                                    <button type="button" class="crop-ratio-btn active">
                                        Pixels
                                    </button>

                                    <button type="button" class="crop-ratio-btn">
                                        Percentage
                                    </button>

                                </div>

                            </div>

                        </div>



                        <!-- =================================================
                             RESIZE TOOL
                        ================================================== -->
                        <div id="resizeProcessing" style="display:none;">


                            <!-- =================================================
                                 FILE INFORMATION
                            ================================================== -->
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">
                                    Image Information
                                </span>

                                <div class="row g-3">

                                    <div class="col-lg-4 col-md-4 col-sm-6">

                                        <div>
                                            <strong>File</strong>

                                            <div id="resizeFileName" class="text-break">
                                                -
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-4 col-md-4 col-sm-6">

                                        <div>

                                            <strong>Original Size</strong>

                                            <div id="resizeOriginalDimensions">
                                                -
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <div>

                                            <strong>File Size</strong>

                                            <div id="resizeOriginalFileSize">
                                                -
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 RESIZE SETTINGS
                            ================================================== -->
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">
                                    Resize Dimensions
                                </span>


                                <div class="row g-3 align-items-end">


                                    <!-- Unit -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">

                                        <label class="form-label">
                                            Unit
                                        </label>

                                        <select id="resizeUnit" class="form-select">

                                            <option value="px">
                                                Pixels
                                            </option>

                                            <option value="percent">
                                                Percentage
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Width -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">

                                        <label class="form-label">
                                            Width
                                        </label>

                                        <input type="number" id="resizeWidth" class="form-control" min="1"
                                            placeholder="Width">

                                    </div>


                                    <!-- Height -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">

                                        <label class="form-label">
                                            Height
                                        </label>

                                        <input type="number" id="resizeHeight" class="form-control" min="1"
                                            placeholder="Height">

                                    </div>


                                    <!-- Aspect Ratio -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">

                                        <button type="button" id="resizeRatioLock" class="crop-ratio-btn active w-100">

                                            <i class="fas fa-lock"></i>

                                            Keep Ratio

                                        </button>

                                    </div>

                                </div>


                                <!-- Original / New dimensions -->
                                <div class="row g-3 mt-2">

                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <div>

                                            <small>
                                                Original Dimensions
                                            </small>

                                            <strong id="resizeOriginalSizeText" class="d-block">
                                                -
                                            </strong>

                                        </div>

                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <div>

                                            <small>
                                                New Dimensions
                                            </small>

                                            <strong id="resizeNewSizeText" class="d-block">
                                                -
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 RESULT
                            ================================================== -->
                            <div id="resizeResult" style="display:none;">

                                <div class="crop-ratio-panel mt-3">

                                    <span class="crop-ratio-title">
                                        Resize Result
                                    </span>


                                    <div class="row g-3">

                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                Original
                                            </span>

                                            <strong id="resizeResultOriginal" class="d-block">
                                                -
                                            </strong>

                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                New Size
                                            </span>

                                            <strong id="resizeResultNew" class="d-block">
                                                -
                                            </strong>

                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                File Size
                                            </span>

                                            <strong id="resizeResultFileSize" class="d-block">
                                                -
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 MAIN ACTION BUTTONS
                            ================================================== -->
                            <div class="crop-action-buttons mt-3">

                                <button type="button" id="resizeButton" class="crop-download-btn">

                                    <i class="fas fa-expand-arrows-alt"></i>

                                    Resize Image

                                </button>


                                <button type="button" id="resizeDownloadButton" class="crop-download-btn"
                                    style="display:none;">

                                    <i class="fas fa-download"></i>

                                    Download Image

                                </button>


                                <button type="button" id="resizeAnotherButton" style="display:none;">

                                    <i class="fas fa-plus"></i>

                                    Resize Another

                                </button>


                                <button type="button" id="resizeRemoveButton">

                                    <i class="fas fa-trash"></i>

                                    Remove

                                </button>

                            </div>


                        </div>

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
                        WHY USE PIXELFLOW
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


                $('.crop-upload-text')
                    .html(
                        '<strong>' +
                        escapeHtml(file.name) +
                        '</strong> selected'
                    );


                $('.crop-upload-info')
                    .html(
                        formatBytes(file.size) +
                        ' <span>|</span> Ready to resize'
                    );


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


                        $('#resizeNormalState')
                            .hide();


                        $('#resizeProcessing')
                            .stop(true, true)
                            .hide()
                            .slideDown(350);


                        $('#resizeResult')
                            .hide();


                        $('#resizeDownloadButton')
                            .hide();


                        $('#resizeAnotherButton')
                            .hide();


                        $('#resizeButton')
                            .show();


                        /* Scroll user to tool */

                        setTimeout(function() {

                            $('html, body').animate({

                                scrollTop: $('#resizeSection')
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
                            '<i class="fas fa-lock"></i> Keep Ratio'
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

                    resetTool();


                    $('html, body').animate({

                        scrollTop: $('#resizeUploadSection')
                            .offset()
                            .top

                    }, 650);

                }
            );



            /* =========================================================
               REMOVE
            ========================================================== */

            $('#resizeRemoveButton').on(
                'click',
                function() {

                    resetTool();


                    /*
                     * Return user to upload section
                     */

                    $('html, body').animate({

                        scrollTop: $('#resizeUploadSection')
                            .offset()
                            .top

                    }, 650);

                }
            );



            /* =========================================================
               RESET
            ========================================================== */

            function resetTool() {

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


                $('#resizeProcessing')
                    .stop(true, true)
                    .slideUp(250);


                $('#resizeNormalState')
                    .stop(true, true)
                    .fadeIn(250);


                $('#resizeResult')
                    .hide();


                $('#resizeDownloadButton')
                    .hide();


                $('#resizeAnotherButton')
                    .hide();


                $('#resizeButton')
                    .show();


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
                        '<i class="fas fa-lock"></i> Keep Ratio'
                    );


                $('.crop-upload-text')
                    .html(
                        'Drag & drop your image here or'
                    );


                $('.crop-upload-info')
                    .html(`
                Supports JPG, PNG, SVG, GIF, WebP
                <span>|</span>
                Max size: 50MB
            `);

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
