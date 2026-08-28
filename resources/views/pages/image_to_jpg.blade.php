@extends('components.app')

@section('meta')
    <title>Image Converter</title>

    <meta name="description" content="Convert images to PNG, JPG, JPEG, WebP or PDF online quickly and easily." />

    <meta property="og:title" content="Image Converter">
    <meta property="og:description" content="Convert images to PNG, JPG, JPEG, WebP or PDF online.">

    <meta property="twitter:title" content="Image Converter">
    <meta property="twitter:description" content="Convert images to PNG, JPG, JPEG, WebP or PDF online.">
@endsection


@section('content')
    <main class="crop-page">

        {{-- =========================================================
         BREADCRUMB
    ========================================================== --}}
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

                    <span>Image Converter</span>

                </div>

            </div>

        </section>


        {{-- =========================================================
         HERO / UPLOAD SECTION
    ========================================================== --}}
        <section class="crop-hero-section" id="imageUploadSection">

            <div class="container">

                <div class="crop-heading">

                    <span class="crop-small-badge">

                        <i class="fas fa-file-image"></i>

                        Image Converter

                    </span>


                    <h1>

                        Convert Images<br>

                        <span>To Any Format.</span>

                    </h1>


                    <p>

                        Convert your images to PNG, JPG, JPEG, WebP or PDF
                        quickly and easily. No software required.

                    </p>

                </div>


                {{-- =================================================
                 UPLOAD BOX
            ================================================== --}}
                <div class="crop-upload-box" id="imageUploadBox">

                    <div class="crop-upload-icon">

                        <i class="fas fa-cloud-upload-alt"></i>

                    </div>


                    <h3>

                        Upload your image

                    </h3>


                    <p class="crop-upload-text">

                        Drag & drop your image here or

                    </p>


                    <label for="imageInput" class="crop-upload-btn">

                        <i class="fas fa-upload"></i>

                        Choose File

                    </label>


                    <input type="file" id="imageInput" accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml"
                        hidden>


                    <p class="crop-upload-info">

                        Supports JPG, JPEG, PNG, WebP, GIF, SVG

                        <span>|</span>

                        Max size: 50MB

                    </p>

                </div>

            </div>

        </section>


        {{-- =========================================================
         CONVERTER SECTION
    ========================================================== --}}
        <section class="crop-info-section">

            <div class="container">

                <div class="crop-info-card">


                    {{-- =================================================
                     LEFT CONTENT
                ================================================== --}}
                    <div class="crop-info-content">

                        <span class="crop-info-badge">

                            CONVERTER

                        </span>


                        <h2>

                            Convert Images<br>

                            <span>Simply & Easily</span>

                        </h2>


                        <p class="crop-info-description">

                            Upload your image, choose the format you want
                            and convert it instantly in your browser.

                        </p>


                        {{-- Feature 01 --}}
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-blue">

                                <i class="fas fa-exchange-alt"></i>

                            </div>


                            <div>

                                <h4>

                                    Multiple Formats

                                </h4>


                                <p>

                                    Convert your image to PNG, JPG, JPEG,
                                    WebP or PDF.

                                </p>

                            </div>

                        </div>


                        {{-- Feature 02 --}}
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-purple">

                                <i class="fas fa-bolt"></i>

                            </div>


                            <div>

                                <h4>

                                    Fast Conversion

                                </h4>


                                <p>

                                    Process your image directly in your
                                    browser without unnecessary uploads.

                                </p>

                            </div>

                        </div>


                        {{-- Feature 03 --}}
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-green">

                                <i class="fas fa-shield-alt"></i>

                            </div>


                            <div>

                                <h4>

                                    Secure & Private

                                </h4>


                                <p>

                                    Your image stays on your device while
                                    the conversion is performed.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                     RIGHT CONVERTER
                ================================================== --}}
                    <div class="crop-preview-wrapper">


                        {{-- =================================================
                         IMAGE PREVIEW
                    ================================================== --}}
                        <div class="crop-preview-card">

                            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="Image Converter Preview" class="crop-preview-image" id="imagePreview">

                        </div>


                        {{-- =================================================
                         DEFAULT STATE
                    ================================================== --}}
                        <div id="normalState">

                            <div class="crop-ratio-panel">

                                <span class="crop-ratio-title">

                                    Image Converter

                                </span>


                                <p class="mb-0">

                                    Upload an image above to start converting.

                                </p>

                            </div>

                        </div>


                        {{-- =================================================
                         CONVERTER STATE
                    ================================================== --}}
                        <div id="converterState" style="display:none;">


                            {{-- =================================================
                             FILE INFORMATION
                        ================================================== --}}
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">

                                    Image Information

                                </span>


                                <div class="row g-3">


                                    {{-- File Name --}}
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <strong>

                                            File

                                        </strong>


                                        <div id="fileName" class="text-break">

                                            -

                                        </div>

                                    </div>


                                    {{-- Dimensions --}}
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <strong>

                                            Dimensions

                                        </strong>


                                        <div id="imageDimensions">

                                            -

                                        </div>

                                    </div>


                                    {{-- File Size --}}
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <strong>

                                            File Size

                                        </strong>


                                        <div id="fileSize">

                                            -

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                             OUTPUT FORMAT
                        ================================================== --}}
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">

                                    Conversion Options

                                </span>


                                <div class="row g-3 align-items-end">


                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label for="outputFormat" class="form-label">

                                            Convert To

                                        </label>


                                        <select id="outputFormat" class="form-select">

                                            <option value="jpg" selected>

                                                JPG

                                            </option>

                                            <option value="jpeg">

                                                JPEG

                                            </option>

                                            <option value="png">

                                                PNG

                                            </option>

                                            <option value="webp">

                                                WebP

                                            </option>

                                            <option value="pdf">

                                                PDF

                                            </option>

                                        </select>

                                    </div>


                                    {{-- Quality --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12" id="qualityWrapper">

                                        <label for="imageQuality" class="form-label">

                                            Quality

                                        </label>


                                        <select id="imageQuality" class="form-select">

                                            <option value="1">

                                                High Quality

                                            </option>

                                            <option value="0.9" selected>

                                                Very Good

                                            </option>

                                            <option value="0.8">

                                                Good

                                            </option>

                                            <option value="0.7">

                                                Medium

                                            </option>

                                        </select>

                                    </div>

                                </div>


                                {{-- PDF options --}}
                                <div id="pdfOptions" class="row g-3 mt-1" style="display:none;">

                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label for="pdfPageSize" class="form-label">

                                            PDF Page Size

                                        </label>


                                        <select id="pdfPageSize" class="form-select">

                                            <option value="a4" selected>

                                                A4

                                            </option>

                                            <option value="letter">

                                                Letter

                                            </option>

                                            <option value="image">

                                                Image Size

                                            </option>

                                        </select>

                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label for="pdfOrientation" class="form-label">

                                            Orientation

                                        </label>


                                        <select id="pdfOrientation" class="form-select">

                                            <option value="auto" selected>

                                                Auto

                                            </option>

                                            <option value="portrait">

                                                Portrait

                                            </option>

                                            <option value="landscape">

                                                Landscape

                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                             RESULT
                        ================================================== --}}
                            <div id="conversionResult" style="display:none;">

                                <div class="crop-ratio-panel mt-3">

                                    <span class="crop-ratio-title">

                                        Conversion Complete

                                    </span>


                                    <div class="row g-3">


                                        {{-- Format --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>

                                                Format

                                            </span>


                                            <strong id="resultFormat" class="d-block">

                                                -

                                            </strong>

                                        </div>


                                        {{-- Dimensions --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>

                                                Dimensions

                                            </span>


                                            <strong id="resultDimensions" class="d-block">

                                                -

                                            </strong>

                                        </div>


                                        {{-- Size --}}
                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>

                                                File Size

                                            </span>


                                            <strong id="resultSize" class="d-block">

                                                -

                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                             ACTION BUTTONS
                        ================================================== --}}
                            <div class="crop-action-buttons mt-3">


                                {{-- Convert --}}
                                <button type="button" id="convertButton" class="crop-download-btn">

                                    <i class="fas fa-sync-alt"></i>

                                    Convert Image

                                </button>


                                {{-- Download --}}
                                <button type="button" id="downloadButton" class="crop-download-btn"
                                    style="display:none;">

                                    <i class="fas fa-download"></i>

                                    Download

                                </button>


                                {{-- Another --}}
                                <button type="button" id="anotherButton" style="display:none;">

                                    <i class="fas fa-plus"></i>

                                    Convert Another

                                </button>


                                {{-- Remove --}}
                                <button type="button" id="removeButton">

                                    <i class="fas fa-trash"></i>

                                    Remove

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
         BENEFITS
    ========================================================== --}}
        <section class="crop-benefits-section">

            <div class="container">

                <div class="crop-benefits-heading">

                    <span>

                        WHY USE PIXELFLOW

                    </span>


                    <h2>

                        Simple. Fast.
                        <strong>Reliable.</strong>

                    </h2>


                    <p>

                        Convert your images to the format you need
                        without complicated software.

                    </p>

                </div>


                <div class="row g-4">


                    {{-- Benefit 01 --}}
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

                                    Convert images directly in your browser
                                    in just a few seconds.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Benefit 02 --}}
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-file-image"></i>

                            </div>


                            <div>

                                <h4>

                                    Multiple Formats

                                </h4>


                                <p>

                                    Convert images to JPG, JPEG, PNG,
                                    WebP or PDF.

                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Benefit 03 --}}
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

                                    Your images remain on your device
                                    during conversion.

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
    {{-- =========================================================
     jsPDF
     Required for Image → PDF conversion
========================================================== --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


    <script>
        $(document).ready(function() {


            /* =========================================================
               VARIABLES
            ========================================================== */

            let selectedFile = null;

            let originalImage = null;

            let originalObjectURL = null;

            let convertedBlob = null;

            let convertedURL = null;


            const MAX_SIZE =
                50 * 1024 * 1024;


            /* =========================================================
               DEFAULT PREVIEW
            ========================================================== */

            const defaultPreview =
                'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85';


            /* =========================================================
               FORMAT FILE SIZE
            ========================================================== */

            function formatFileSize(bytes) {

                if (bytes < 1024) {

                    return bytes + ' B';

                }


                if (bytes < 1024 * 1024) {

                    return (
                        bytes / 1024
                    ).toFixed(1) + ' KB';

                }


                return (
                    bytes /
                    (1024 * 1024)
                ).toFixed(2) + ' MB';

            }


            /* =========================================================
               RESET RESULT
            ========================================================== */

            function resetResult() {

                convertedBlob = null;


                if (convertedURL) {

                    URL.revokeObjectURL(
                        convertedURL
                    );

                    convertedURL = null;

                }


                $('#conversionResult').hide();


                $('#downloadButton').hide();


                $('#anotherButton').hide();


                $('#convertButton')
                    .show()
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-sync-alt"></i> Convert Image'
                    );


                if (originalObjectURL) {

                    $('#imagePreview').attr(
                        'src',
                        originalObjectURL
                    );

                }

            }


            /* =========================================================
               RESET EVERYTHING
            ========================================================== */

            function resetTool() {

                selectedFile = null;

                originalImage = null;


                if (originalObjectURL) {

                    URL.revokeObjectURL(
                        originalObjectURL
                    );

                    originalObjectURL = null;

                }


                if (convertedURL) {

                    URL.revokeObjectURL(
                        convertedURL
                    );

                    convertedURL = null;

                }


                convertedBlob = null;


                $('#imageInput').val('');


                $('#converterState').hide();


                $('#normalState').show();


                $('#imagePreview').attr(
                    'src',
                    defaultPreview
                );


                $('#fileName').text('-');


                $('#imageDimensions').text('-');


                $('#fileSize').text('-');


                $('#resultFormat').text('-');


                $('#resultDimensions').text('-');


                $('#resultSize').text('-');


                $('#conversionResult').hide();


                $('#downloadButton').hide();


                $('#anotherButton').hide();


                $('#convertButton')
                    .show()
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-sync-alt"></i> Convert Image'
                    );


                /*
                 * Return to upload section.
                 */

                $('html, body').animate({

                    scrollTop: $('#imageUploadSection').offset().top - 20

                }, 500);

            }


            /* =========================================================
               LOAD IMAGE
            ========================================================== */

            function loadImage(file) {

                return new Promise(function(
                    resolve,
                    reject
                ) {

                    /*
                     * FileReader ensures that the uploaded image
                     * is loaded locally and avoids cross-origin
                     * canvas problems.
                     */

                    const reader =
                        new FileReader();


                    reader.onload =
                        function(event) {

                            const img =
                                new Image();


                            img.onload =
                                function() {

                                    resolve(img);

                                };


                            img.onerror =
                                function() {

                                    reject(
                                        new Error(
                                            'Unable to read this image.'
                                        )
                                    );

                                };


                            img.src =
                                event.target.result;

                        };


                    reader.onerror =
                        function() {

                            reject(
                                new Error(
                                    'Unable to read the selected file.'
                                )
                            );

                        };


                    reader.readAsDataURL(file);

                });

            }


            /* =========================================================
               SHOW CONVERTER
            ========================================================== */

            async function showConverter(file) {

                selectedFile = file;


                if (originalObjectURL) {

                    URL.revokeObjectURL(
                        originalObjectURL
                    );

                }


                originalObjectURL =
                    URL.createObjectURL(file);


                $('#imagePreview').attr(
                    'src',
                    originalObjectURL
                );


                $('#fileName').text(
                    file.name
                );


                $('#fileSize').text(
                    formatFileSize(file.size)
                );


                $('#normalState').hide();


                $('#converterState').show();


                resetResult();


                try {

                    originalImage =
                        await loadImage(file);


                    $('#imageDimensions').text(

                        originalImage.naturalWidth +
                        ' × ' +
                        originalImage.naturalHeight +
                        ' px'

                    );

                } catch (error) {

                    $('#imageDimensions')
                        .text(
                            'Unable to read dimensions'
                        );

                }


                /*
                 * Smoothly move user to converter.
                 */

                setTimeout(function() {

                    $('html, body').animate({

                        scrollTop: $('#converterState').offset().top - 30

                    }, 600);

                }, 150);

            }


            /* =========================================================
               VALIDATE FILE
            ========================================================== */

            function handleFile(file) {

                if (!file) {

                    return;

                }


                if (file.size > MAX_SIZE) {

                    alert(
                        'The selected image is larger than 50MB.'
                    );

                    return;

                }


                const allowedTypes = [

                    'image/jpeg',

                    'image/png',

                    'image/webp',

                    'image/gif',

                    'image/svg+xml'

                ];


                const extension =
                    file.name
                    .split('.')
                    .pop()
                    .toLowerCase();


                const allowedExtensions = [

                    'jpg',

                    'jpeg',

                    'png',

                    'webp',

                    'gif',

                    'svg'

                ];


                if (

                    !allowedTypes.includes(file.type) &&

                    !allowedExtensions.includes(extension)

                ) {

                    alert(
                        'Please select a JPG, JPEG, PNG, WebP, GIF or SVG image.'
                    );

                    return;

                }


                showConverter(file);

            }


            /* =========================================================
               FILE INPUT
            ========================================================== */

            $('#imageInput').on(
                'change',
                function() {

                    handleFile(
                        this.files[0]
                    );

                }
            );


            /* =========================================================
               DRAG & DROP
            ========================================================== */

            $('#imageUploadBox')

                .on(
                    'dragover',
                    function(e) {

                        e.preventDefault();

                        $(this).addClass(
                            'dragging'
                        );

                    }
                )

                .on(
                    'dragleave',
                    function() {

                        $(this).removeClass(
                            'dragging'
                        );

                    }
                )

                .on(
                    'drop',
                    function(e) {

                        e.preventDefault();

                        $(this).removeClass(
                            'dragging'
                        );


                        const files =
                            e.originalEvent
                            .dataTransfer
                            .files;


                        if (files.length) {

                            handleFile(
                                files[0]
                            );

                        }

                    }
                );


            /* =========================================================
               OUTPUT FORMAT CHANGE
            ========================================================== */

            $('#outputFormat').on(
                'change',
                function() {

                    const format =
                        $(this).val();


                    /*
                     * PDF does not use JPG/WebP quality.
                     */

                    if (format === 'pdf') {

                        $('#qualityWrapper')
                            .hide();


                        $('#pdfOptions')
                            .slideDown(150);

                    } else {

                        $('#qualityWrapper')
                            .show();


                        $('#pdfOptions')
                            .slideUp(150);

                    }


                    /*
                     * If already converted,
                     * reset result because output format changed.
                     */

                    if (convertedBlob) {

                        resetResult();

                    }

                }
            );


            /* =========================================================
               CREATE CANVAS
            ========================================================== */

            function createCanvas(
                width,
                height
            ) {

                const canvas =
                    document.createElement(
                        'canvas'
                    );


                canvas.width =
                    Math.max(
                        1,
                        Math.round(width)
                    );


                canvas.height =
                    Math.max(
                        1,
                        Math.round(height)
                    );


                return canvas;

            }


            /* =========================================================
               CANVAS TO BLOB
            ========================================================== */

            function canvasToBlob(
                canvas,
                mimeType,
                quality
            ) {

                return new Promise(
                    function(resolve) {

                        canvas.toBlob(

                            function(blob) {

                                resolve(blob);

                            },

                            mimeType,

                            quality

                        );

                    }
                );

            }


            /* =========================================================
               DRAW IMAGE
            ========================================================== */

            function drawImage(
                image,
                canvas,
                background
            ) {

                const ctx =
                    canvas.getContext(
                        '2d'
                    );


                /*
                 * Fill background first.
                 *
                 * This is particularly important for JPG/JPEG
                 * because JPG does not support transparency.
                 */

                if (background) {

                    ctx.fillStyle =
                        background;


                    ctx.fillRect(

                        0,
                        0,
                        canvas.width,
                        canvas.height

                    );

                }


                ctx.imageSmoothingEnabled =
                    true;


                ctx.imageSmoothingQuality =
                    'high';


                ctx.drawImage(

                    image,

                    0,
                    0,

                    canvas.width,
                    canvas.height

                );

            }


            /* =========================================================
               CONVERT TO IMAGE FORMAT
            ========================================================== */

            async function convertToImageFormat(
                format
            ) {

                if (!originalImage) {

                    throw new Error(
                        'Image is not ready.'
                    );

                }


                let mimeType;

                let extension;

                let quality =
                    parseFloat(
                        $('#imageQuality').val()
                    );


                switch (format) {

                    case 'jpg':

                        mimeType =
                            'image/jpeg';

                        extension =
                            'jpg';

                        break;


                    case 'jpeg':

                        mimeType =
                            'image/jpeg';

                        extension =
                            'jpeg';

                        break;


                    case 'png':

                        mimeType =
                            'image/png';

                        extension =
                            'png';

                        break;


                    case 'webp':

                        mimeType =
                            'image/webp';

                        extension =
                            'webp';

                        break;


                    default:

                        throw new Error(
                            'Unsupported output format.'
                        );

                }


                /*
                 * Use the original dimensions.
                 */

                const canvas =
                    createCanvas(

                        originalImage.naturalWidth,

                        originalImage.naturalHeight

                    );


                /*
                 * JPG/JPEG need a white background.
                 *
                 * PNG and WebP retain transparency where
                 * supported.
                 */

                if (
                    format === 'jpg' ||
                    format === 'jpeg'
                ) {

                    drawImage(
                        originalImage,
                        canvas,
                        '#ffffff'
                    );

                } else {

                    drawImage(
                        originalImage,
                        canvas,
                        null
                    );

                }


                /*
                 * PNG does not need a quality value.
                 */

                if (format === 'png') {

                    quality = undefined;

                }


                const blob =
                    await canvasToBlob(

                        canvas,

                        mimeType,

                        quality

                    );


                if (!blob) {

                    throw new Error(
                        'Unable to convert the image.'
                    );

                }


                return {

                    blob: blob,

                    extension: extension,

                    format: format.toUpperCase(),

                    width: canvas.width,

                    height: canvas.height

                };

            }


            /* =========================================================
               CONVERT TO PDF
            ========================================================== */

            async function convertToPDF() {

                if (!originalImage) {

                    throw new Error(
                        'Image is not ready.'
                    );

                }


                if (
                    typeof window.jspdf ===
                    'undefined'
                ) {

                    throw new Error(
                        'PDF converter could not be loaded.'
                    );

                }


                const {
                    jsPDF
                } = window.jspdf;


                const pageSize =
                    $('#pdfPageSize').val();


                let orientation =
                    $('#pdfOrientation').val();


                /*
                 * Auto orientation.
                 */

                if (
                    orientation ===
                    'auto'
                ) {

                    orientation =

                        originalImage.naturalWidth >
                        originalImage.naturalHeight

                        ?
                        'landscape'

                        :
                        'portrait';

                }


                let pdf;


                /*
                 * IMAGE SIZE PDF
                 */

                if (
                    pageSize ===
                    'image'
                ) {


                    /*
                     * Convert pixels to points.
                     */

                    const width =
                        originalImage.naturalWidth *
                        0.75;


                    const height =
                        originalImage.naturalHeight *
                        0.75;


                    pdf =
                        new jsPDF({

                            orientation: orientation,

                            unit: 'pt',

                            format: [

                                width,

                                height

                            ]

                        });

                }


                /*
                 * A4 / LETTER
                 */
                else {

                    pdf =
                        new jsPDF({

                            orientation: orientation,

                            unit: 'mm',

                            format: pageSize

                        });

                }


                /*
                 * Create local canvas.
                 *
                 * We convert the image to JPEG data first
                 * so JPG/PNG/WebP/SVG all work consistently
                 * inside the PDF.
                 */

                const canvas =
                    createCanvas(

                        originalImage.naturalWidth,

                        originalImage.naturalHeight

                    );


                drawImage(

                    originalImage,

                    canvas,

                    '#ffffff'

                );


                const imageData =
                    canvas.toDataURL(

                        'image/jpeg',

                        0.92

                    );


                /*
                 * IMAGE SIZE
                 */

                if (
                    pageSize ===
                    'image'
                ) {

                    const width =
                        originalImage.naturalWidth *
                        0.75;


                    const height =
                        originalImage.naturalHeight *
                        0.75;


                    pdf.addImage(

                        imageData,

                        'JPEG',

                        0,
                        0,

                        width,
                        height

                    );

                }


                /*
                 * A4 / LETTER
                 */
                else {

                    const pageWidth =
                        pdf.internal.pageSize
                        .getWidth();


                    const pageHeight =
                        pdf.internal.pageSize
                        .getHeight();


                    const imageRatio =
                        originalImage.naturalWidth /
                        originalImage.naturalHeight;


                    const pageRatio =
                        pageWidth /
                        pageHeight;


                    let imageWidth;

                    let imageHeight;


                    /*
                     * Fit image inside page.
                     */

                    if (
                        imageRatio >
                        pageRatio
                    ) {

                        imageWidth =
                            pageWidth;


                        imageHeight =
                            pageWidth /
                            imageRatio;

                    } else {

                        imageHeight =
                            pageHeight;


                        imageWidth =
                            pageHeight *
                            imageRatio;

                    }


                    /*
                     * Center image.
                     */

                    const x =
                        (
                            pageWidth -
                            imageWidth
                        ) / 2;


                    const y =
                        (
                            pageHeight -
                            imageHeight
                        ) / 2;


                    pdf.addImage(

                        imageData,

                        'JPEG',

                        x,
                        y,

                        imageWidth,
                        imageHeight

                    );

                }


                const blob =
                    pdf.output(
                        'blob'
                    );


                if (!blob) {

                    throw new Error(
                        'Unable to create PDF.'
                    );

                }


                return {

                    blob: blob,

                    extension: 'pdf',

                    format: 'PDF',

                    width: originalImage.naturalWidth,

                    height: originalImage.naturalHeight

                };

            }


            /* =========================================================
               MAIN CONVERSION
            ========================================================== */

            $('#convertButton').on(
                'click',
                async function() {


                    if (
                        !selectedFile ||
                        !originalImage
                    ) {

                        alert(
                            'Please upload an image first.'
                        );

                        return;

                    }


                    const button =
                        $(this);


                    const format =
                        $('#outputFormat')
                        .val();


                    /*
                     * Prevent converting an image into
                     * the same format unnecessarily.
                     */

                    const originalExtension =
                        selectedFile.name
                        .split('.')
                        .pop()
                        .toLowerCase();


                    if (

                        (
                            format === 'jpg' ||
                            format === 'jpeg'
                        ) &&

                        (
                            originalExtension === 'jpg' ||
                            originalExtension === 'jpeg'
                        )

                    ) {

                        /*
                         * We still allow the conversion because
                         * the user explicitly selected it.
                         */

                    }


                    button

                        .prop(
                            'disabled',
                            true
                        )

                        .html(

                            '<i class="fas fa-spinner fa-spin"></i> Converting...'

                        );


                    try {

                        let result;


                        /*
                         * ---------------------------------------------
                         * IMAGE FORMAT
                         * ---------------------------------------------
                         */

                        if (
                            format !== 'pdf'
                        ) {

                            result =
                                await convertToImageFormat(
                                    format
                                );

                        }


                        /*
                         * ---------------------------------------------
                         * PDF
                         * ---------------------------------------------
                         */
                        else {

                            result =
                                await convertToPDF();

                        }


                        /*
                         * ---------------------------------------------
                         * SAVE RESULT
                         * ---------------------------------------------
                         */

                        convertedBlob =
                            result.blob;


                        if (convertedURL) {

                            URL.revokeObjectURL(
                                convertedURL
                            );

                        }


                        convertedURL =
                            URL.createObjectURL(
                                convertedBlob
                            );


                        /*
                         * ---------------------------------------------
                         * IMAGE PREVIEW
                         * ---------------------------------------------
                         */

                        if (
                            format !== 'pdf'
                        ) {

                            $('#imagePreview')
                                .attr(
                                    'src',
                                    convertedURL
                                );

                        }


                        /*
                         * ---------------------------------------------
                         * RESULT INFORMATION
                         * ---------------------------------------------
                         */

                        $('#resultFormat')
                            .text(
                                result.format
                            );


                        $('#resultDimensions')
                            .text(

                                result.width +
                                ' × ' +
                                result.height +
                                ' px'

                            );


                        $('#resultSize')
                            .text(

                                formatFileSize(
                                    convertedBlob.size
                                )

                            );


                        /*
                         * ---------------------------------------------
                         * SHOW RESULT
                         * ---------------------------------------------
                         */

                        $('#conversionResult')
                            .fadeIn(250);


                        /*
                         * ---------------------------------------------
                         * BUTTON STATES
                         * ---------------------------------------------
                         */

                        button.hide();


                        $('#downloadButton')
                            .fadeIn(250);


                        $('#anotherButton')
                            .fadeIn(250);


                        /*
                         * ---------------------------------------------
                         * SMOOTH SCROLL
                         * ---------------------------------------------
                         */

                        setTimeout(
                            function() {

                                $('html, body')
                                    .animate({

                                        scrollTop:

                                            $('#conversionResult')
                                            .offset()
                                            .top - 40

                                    }, 500);

                            },
                            150
                        );


                    } catch (error) {

                        console.error(
                            error
                        );


                        alert(

                            error.message ||
                            'Something went wrong while converting the image.'

                        );


                        button

                            .prop(
                                'disabled',
                                false
                            )

                            .html(

                                '<i class="fas fa-sync-alt"></i> Convert Image'

                            );

                    }

                }
            );


            /* =========================================================
               DOWNLOAD RESULT
            ========================================================== */

            $('#downloadButton').on(
                'click',
                function() {


                    if (!convertedBlob) {

                        alert(
                            'No converted file is available.'
                        );

                        return;

                    }


                    const format =
                        $('#outputFormat')
                        .val();


                    const originalName =
                        selectedFile.name
                        .replace(
                            /\.[^/.]+$/,
                            ''
                        );


                    let extension;


                    if (
                        format === 'jpg'
                    ) {

                        extension =
                            'jpg';

                    } else if (
                        format === 'jpeg'
                    ) {

                        extension =
                            'jpeg';

                    } else if (
                        format === 'png'
                    ) {

                        extension =
                            'png';

                    } else if (
                        format === 'webp'
                    ) {

                        extension =
                            'webp';

                    } else {

                        extension =
                            'pdf';

                    }


                    const downloadURL =
                        URL.createObjectURL(
                            convertedBlob
                        );


                    const link =
                        document.createElement(
                            'a'
                        );


                    link.href =
                        downloadURL;


                    link.download =

                        originalName +
                        '-converted.' +
                        extension;


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

                }
            );


            /* =========================================================
               CONVERT ANOTHER
            ========================================================== */

            $('#anotherButton').on(
                'click',
                function() {

                    resetTool();

                }
            );


            /* =========================================================
               REMOVE
            ========================================================== */

            $('#removeButton').on(
                'click',
                function() {

                    resetTool();

                }
            );


        });
    </script>
@endsection
