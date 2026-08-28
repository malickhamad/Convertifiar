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

                    <span>Image Compressor</span>

                </div>

            </div>

        </section>


        <!-- =========================================================
                 HERO / UPLOAD SECTION
            ========================================================== -->

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


                <!-- =================================================
                         UPLOAD BOX
                    ================================================== -->

                <div class="crop-upload-box" id="compressUploadBox">

                    <div class="crop-upload-icon">

                        <i class="fas fa-cloud-upload-alt"></i>

                    </div>


                    <h3>

                        Upload your image

                    </h3>


                    <p class="crop-upload-text">

                        Drag & drop your image here or

                    </p>


                    <label for="compressImageInput" class="crop-upload-btn">

                        <i class="fas fa-upload"></i>

                        Choose File

                    </label>


                    <input type="file" id="compressImageInput"
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
                 ABOUT / PROCESSING SECTION
            ========================================================== -->

        <section class="crop-info-section">

            <div class="container">

                <div class="crop-info-card" id="compressionSection">


                    <!-- =================================================
                             LEFT CONTENT
                        ================================================== -->

                    <div class="crop-info-content" id="compressionLeftContent">

                        <span class="crop-info-badge">

                            ABOUT

                        </span>


                        <h2>

                            Compress Images<br>

                            <span>Without Losing Quality</span>

                        </h2>


                        <p class="crop-info-description">

                            Reduce the file size of your images quickly
                            and efficiently. Our image compressor works
                            directly in your browser, so your images do not
                            need to be uploaded to a server.

                        </p>


                        <!-- Feature 01 -->

                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-blue">

                                <i class="fas fa-compress-alt"></i>

                            </div>


                            <div>

                                <h4>

                                    Smaller File Sizes

                                </h4>


                                <p>

                                    Reduce image file sizes while maintaining
                                    excellent visual quality.

                                </p>

                            </div>

                        </div>


                        <!-- Feature 02 -->

                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-purple">

                                <i class="fas fa-sliders-h"></i>

                            </div>


                            <div>

                                <h4>

                                    Adjustable Quality

                                </h4>


                                <p>

                                    Choose the compression level that works
                                    best for your image.

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

                                    Your images are processed directly in
                                    your browser.

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                             RIGHT SIDE
                        ================================================== -->

                    <div class="crop-preview-wrapper" id="compressionRightContent">


                        <!-- =================================================
                                 IMAGE PREVIEW
                            ================================================== -->

                        <div class="crop-preview-card">

                            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="Image Compression Preview" class="crop-preview-image" id="uploadedImagePreview">

                        </div>


                        <!-- =================================================
                                 NORMAL STATE
                            ================================================== -->

                        <div id="aboutNormalState">

                            <div class="crop-ratio-panel">

                                <span class="crop-ratio-title">

                                    Supported Formats

                                </span>


                                <div class="crop-ratio-buttons">

                                    <button type="button" class="crop-ratio-btn active">
                                        JPG
                                    </button>


                                    <button type="button" class="crop-ratio-btn">
                                        PNG
                                    </button>


                                    <button type="button" class="crop-ratio-btn">
                                        SVG
                                    </button>


                                    <button type="button" class="crop-ratio-btn">
                                        GIF
                                    </button>


                                    <button type="button" class="crop-ratio-btn">
                                        WebP
                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                                 PROCESSING STATE
                            ================================================== -->

                        <div id="compressionProcessing" style="display:none;">


                            <!-- =================================================
                                     FILE INFORMATION
                                ================================================== -->

                            <div class="crop-ratio-panel" style="margin-top:20px;">

                                <span class="crop-ratio-title">

                                    Image Information

                                </span>


                                <div
                                    style="
                                    display:flex;
                                    justify-content:space-between;
                                    gap:15px;
                                    flex-wrap:wrap;
                                ">

                                    <span>

                                        <strong>File:</strong>

                                        <span id="fileName">
                                            -
                                        </span>

                                    </span>


                                    <span>

                                        <strong>Size:</strong>

                                        <span id="fileSize">
                                            -
                                        </span>

                                    </span>


                                    <span>

                                        <strong>Type:</strong>

                                        <span id="fileType">
                                            -
                                        </span>

                                    </span>

                                </div>

                            </div>


                            <!-- =================================================
                                     COMPRESSION QUALITY
                                ================================================== -->

                            <div class="crop-ratio-panel" style="margin-top:20px;">

                                <span class="crop-ratio-title">

                                    Compression Quality

                                </span>


                                <div class="crop-ratio-buttons">


                                    <button type="button" class="crop-ratio-btn quality-btn" data-quality="90">
                                        High
                                    </button>


                                    <button type="button" class="crop-ratio-btn quality-btn active" data-quality="75">
                                        Recommended
                                    </button>


                                    <button type="button" class="crop-ratio-btn quality-btn" data-quality="60">
                                        Balanced
                                    </button>


                                    <button type="button" class="crop-ratio-btn quality-btn" data-quality="40">
                                        Small Size
                                    </button>

                                </div>


                                <!-- Slider -->

                                <div style="margin-top:20px;">

                                    <div
                                        style="
                                        display:flex;
                                        justify-content:space-between;
                                        margin-bottom:8px;
                                    ">

                                        <span>

                                            Quality

                                        </span>


                                        <strong>

                                            <span id="qualityValue">

                                                75

                                            </span>%

                                        </strong>

                                    </div>


                                    <input type="range" id="compressionQuality" min="10" max="100"
                                        value="75" step="5" style="width:100%;">

                                </div>

                            </div>


                            <!-- =================================================
                                     RESULT
                                ================================================== -->

                            <div id="compressionResult" style="display:none;">

                                <div class="crop-ratio-panel" style="margin-top:20px;">

                                    <span class="crop-ratio-title">

                                        Compression Result

                                    </span>


                                    <div
                                        style="
                                        display:flex;
                                        justify-content:space-between;
                                        gap:15px;
                                        flex-wrap:wrap;
                                    ">

                                        <span>

                                            Original:

                                            <strong id="originalResultSize">
                                                -
                                            </strong>

                                        </span>


                                        <span>

                                            Compressed:

                                            <strong id="compressedResultSize">
                                                -
                                            </strong>

                                        </span>


                                        <span>

                                            Saved:

                                            <strong id="savedResult">
                                                -
                                            </strong>

                                        </span>

                                    </div>

                                </div>

                            </div>


                            <!-- =================================================
                                     ACTION BUTTONS
                                ================================================== -->

                            <div class="crop-action-buttons" style="margin-top:20px;">

                                <!-- Compress -->

                                <button type="button" id="compressButton">

                                    <i class="fas fa-compress-alt"></i>

                                    Compress Image

                                </button>


                                <!-- Download -->

                                <button type="button" id="downloadButton" class="crop-download-btn"
                                    style="display:none;">

                                    <i class="fas fa-download"></i>

                                    Download Image

                                </button>


                                <!-- Compress Another -->

                                <button type="button" id="compressAnotherButton" style="display:none;">

                                    <i class="fas fa-redo"></i>

                                    Compress Another

                                </button>


                                <!-- Remove -->

                                <button type="button" id="removeButton">

                                    <i class="fas fa-trash"></i>

                                    Remove

                                </button>

                            </div>


                            <!-- Status -->

                            <div id="compressionStatus" class="text-center mt-3" style="display:none;"></div>

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

                        Smaller. Faster. <strong>Better.</strong>

                    </h2>


                    <p>

                        Everything you need to reduce your image file size
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

                                    Compress images directly in your browser
                                    without waiting for server processing.

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Benefit 02 -->

                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-sliders-h"></i>

                            </div>


                            <div>

                                <h4>

                                    Flexible Quality

                                </h4>


                                <p>

                                    Select the right balance between image
                                    quality and file size.

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

                                    Images remain on your device during
                                    compression.

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

                if (!file) {
                    return;
                }

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


                if (!files.length) {
                    return;
                }


                processSelectedFile(files[0]);

            });


            /* =========================================================
               PROCESS SELECTED FILE
            ========================================================== */

            function processSelectedFile(file) {


                const allowedTypes = [

                    'image/jpeg',

                    'image/png',

                    'image/svg+xml',

                    'image/gif',

                    'image/webp'

                ];


                /* Validate type */

                if (!allowedTypes.includes(file.type)) {

                    alert(
                        'Please upload a JPG, PNG, SVG, GIF or WebP image.'
                    );

                    return;

                }


                /* Validate size */

                if (file.size > MAX_FILE_SIZE) {

                    alert(
                        'The maximum allowed file size is 50MB.'
                    );

                    return;

                }


                selectedFile = file;

                compressedBlob = null;

                compressedFileName = '';


                /* Remove old preview */

                if (previewUrl) {

                    URL.revokeObjectURL(previewUrl);

                }


                /* Create preview */

                previewUrl = URL.createObjectURL(file);


                $('#uploadedImagePreview')
                    .attr('src', previewUrl);


                /* File information */

                $('#fileName')
                    .text(file.name);


                $('#fileSize')
                    .text(
                        formatBytes(file.size)
                    );


                $('#fileType')
                    .text(
                        getExtension(file.name)
                    );


                /* Upload text */

                $('.crop-upload-text')
                    .html(
                        '<strong>' +
                        escapeHtml(file.name) +
                        '</strong> selected'
                    );


                $('.crop-upload-info')
                    .html(
                        formatBytes(file.size) +
                        ' <span>|</span> Ready to compress'
                    );


                /* Hide normal state */

                $('#aboutNormalState')
                    .stop(true, true)
                    .fadeOut(200);


                /* Show processing */

                $('#compressionProcessing')
                    .stop(true, true)
                    .hide()
                    .fadeIn(300);


                /* Reset result */

                $('#compressionResult').hide();

                $('#downloadButton').hide();

                $('#compressAnotherButton').hide();


                /* Show Compress button */

                $('#compressButton')
                    .show()
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-compress-alt"></i> Compress Image'
                    );


                /* Scroll to processing section */

                setTimeout(function() {

                    $('html, body').animate({

                        scrollTop: $('#compressionSection')
                            .offset()
                            .top - 25

                    }, 600);

                }, 150);

            }


            /* =========================================================
               QUALITY PRESETS
            ========================================================== */

            $('.quality-btn').on('click', function() {


                $('.quality-btn')
                    .removeClass('active');


                $(this)
                    .addClass('active');


                const value = parseInt(
                    $(this).data('quality')
                );


                quality = value / 100;


                $('#compressionQuality')
                    .val(value);


                $('#qualityValue')
                    .text(value);

            });


            /* =========================================================
               QUALITY SLIDER
            ========================================================== */

            $('#compressionQuality').on('input', function() {


                const value = parseInt(
                    $(this).val()
                );


                quality = value / 100;


                $('#qualityValue')
                    .text(value);


                $('.quality-btn')
                    .removeClass('active');

            });


            /* =========================================================
               COMPRESS IMAGE
            ========================================================== */

            $('#compressButton').on('click', async function() {


                if (!selectedFile) {

                    alert(
                        'Please upload an image first.'
                    );

                    return;

                }


                const $button = $(this);


                /* Prevent multiple clicks */

                $button
                    .prop('disabled', true)
                    .html(
                        '<i class="fas fa-spinner fa-spin"></i> Compressing...'
                    );


                try {


                    const result = await compressImage(
                        selectedFile,
                        quality
                    );


                    compressedBlob = result.blob;

                    compressedFileName = result.name;


                    const originalSize =
                        selectedFile.size;


                    const compressedSize =
                        compressedBlob.size;


                    let saved = 0;


                    if (originalSize > 0) {

                        saved = Math.max(

                            0,

                            Math.round(

                                (
                                    (
                                        originalSize -
                                        compressedSize
                                    ) /
                                    originalSize
                                ) * 100

                            )

                        );

                    }


                    /* Result */

                    $('#originalResultSize')
                        .text(
                            formatBytes(originalSize)
                        );


                    $('#compressedResultSize')
                        .text(
                            formatBytes(compressedSize)
                        );


                    $('#savedResult')
                        .text(
                            saved + '%'
                        );


                    /* Show result */

                    $('#compressionResult')
                        .stop(true, true)
                        .hide()
                        .fadeIn(300);


                    /* Hide compress button */

                    $button
                        .stop(true, true)
                        .fadeOut(200);


                    /* Show Download */

                    $('#downloadButton')
                        .stop(true, true)
                        .hide()
                        .fadeIn(250);


                    /* Show Compress Another */

                    $('#compressAnotherButton')
                        .stop(true, true)
                        .hide()
                        .fadeIn(250);


                    /* Status */

                    $('#compressionStatus')
                        .stop(true, true)
                        .hide()
                        .text(
                            saved > 0 ?
                            'Image compressed successfully.' :
                            'The image could not be reduced further at this quality.'
                        )
                        .fadeIn(250);


                } catch (error) {


                    console.error(error);


                    alert(
                        'Unable to compress this image. Please try another image.'
                    );


                    $button
                        .prop('disabled', false)
                        .html(
                            '<i class="fas fa-compress-alt"></i> Compress Image'
                        );

                }

            });


            /* =========================================================
               DOWNLOAD
            ========================================================== */

            $('#downloadButton').on('click', function() {


                if (!compressedBlob) {

                    alert(
                        'Please compress the image first.'
                    );

                    return;

                }


                const url =
                    URL.createObjectURL(
                        compressedBlob
                    );


                const link =
                    document.createElement('a');


                link.href = url;


                link.download =
                    compressedFileName;


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

            $('#compressAnotherButton').on(
                'click',
                function() {

                    resetTool(true);

                }
            );


            /* =========================================================
               REMOVE
            ========================================================== */

            $('#removeButton').on(
                'click',
                function() {

                    resetTool(true);

                }
            );


            /* =========================================================
               RESET TOOL
            ========================================================== */

            function resetTool(scrollToTop = false) {


                /* Revoke preview */

                if (previewUrl) {

                    URL.revokeObjectURL(previewUrl);

                }


                /* Clear variables */

                selectedFile = null;

                compressedBlob = null;

                compressedFileName = '';

                previewUrl = null;


                /* Restore preview image */

                $('#uploadedImagePreview')
                    .attr(
                        'src',
                        'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85'
                    );


                /* Hide processing */

                $('#compressionProcessing')
                    .stop(true, true)
                    .fadeOut(200);


                /* Show normal state */

                $('#aboutNormalState')
                    .stop(true, true)
                    .fadeIn(250);


                /* Hide results */

                $('#compressionResult').hide();

                $('#downloadButton').hide();

                $('#compressAnotherButton').hide();


                /* Restore compress button */

                $('#compressButton')
                    .show()
                    .prop('disabled', false)
                    .html(
                        '<i class="fas fa-compress-alt"></i> Compress Image'
                    );


                /* Hide status */

                $('#compressionStatus')
                    .hide()
                    .text('');


                /* Restore upload text */

                $('.crop-upload-text')
                    .html(
                        'Drag & drop your image here or'
                    );


                $('.crop-upload-info')
                    .html(
                        'Supports JPG, PNG, SVG, GIF, WebP ' +
                        '<span>|</span> ' +
                        'Max size: 50MB'
                    );


                /* Reset quality */

                quality = 0.75;


                $('#compressionQuality')
                    .val(75);


                $('#qualityValue')
                    .text(75);


                $('.quality-btn')
                    .removeClass('active');


                $('.quality-btn[data-quality="75"]')
                    .addClass('active');


                /* Clear input */

                $('#compressImageInput')
                    .val('');


                /* Return user to upload section */

                if (scrollToTop) {

                    setTimeout(function() {

                        $('html, body').animate({

                            scrollTop: $('#uploadSection')
                                .offset()
                                .top - 20

                        }, 600);

                    }, 150);

                }

            }


            /* =========================================================
               COMPRESSION ENGINE
            ========================================================== */

            function compressImage(file, quality) {


                return new Promise(function(resolve, reject) {


                    /* =================================================
                       SVG
                    ================================================== */

                    if (
                        file.type === 'image/svg+xml'
                    ) {


                        const reader =
                            new FileReader();


                        reader.onload =
                            function(event) {


                                try {


                                    const svg =
                                        event.target.result;


                                    const optimized =
                                        optimizeSVG(svg);


                                    const blob =
                                        new Blob(

                                            [optimized],

                                            {
                                                type: 'image/svg+xml'
                                            }

                                        );


                                    /* Never return larger SVG */

                                    if (
                                        blob.size >=
                                        file.size
                                    ) {

                                        resolve({

                                            blob: file,

                                            name: createName(
                                                file,
                                                'svg'
                                            )

                                        });

                                        return;

                                    }


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


                    /* =================================================
                       GIF
                    ================================================== */

                    if (
                        file.type === 'image/gif'
                    ) {


                        /*
                         * Keep original GIF.
                         *
                         * Canvas cannot safely preserve
                         * animated GIF frames.
                         */

                        resolve({

                            blob: file,

                            name: createName(
                                file,
                                'gif'
                            )

                        });


                        return;

                    }


                    /* =================================================
                       JPG / PNG / WEBP
                    ================================================== */

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
                                        image.naturalWidth;


                                    canvas.height =
                                        image.naturalHeight;


                                    const context =
                                        canvas.getContext(
                                            '2d'
                                        );


                                    /*
                                     * Better rendering quality.
                                     */

                                    context.imageSmoothingEnabled =
                                        true;


                                    context.imageSmoothingQuality =
                                        'high';


                                    /*
                                     * Draw image.
                                     */

                                    context.drawImage(

                                        image,

                                        0,

                                        0

                                    );


                                    /*
                                     * Determine output.
                                     *
                                     * PNG is converted to JPG
                                     * because JPG usually gives
                                     * much better compression.
                                     */

                                    let outputType =
                                        'image/jpeg';


                                    if (
                                        file.type ===
                                        'image/webp'
                                    ) {

                                        outputType =
                                            'image/webp';

                                    }


                                    /*
                                     * Preserve transparency
                                     * for PNG by using PNG output
                                     * when quality is high.
                                     */

                                    if (
                                        file.type ===
                                        'image/png' &&
                                        quality >= 0.90
                                    ) {

                                        outputType =
                                            'image/png';

                                    }


                                    canvas.toBlob(

                                        function(blob) {


                                            if (!blob) {

                                                reject(
                                                    new Error(
                                                        'Compression failed.'
                                                    )
                                                );

                                                return;

                                            }


                                            /*
                                             * Never make a
                                             * larger file.
                                             */

                                            if (
                                                blob.size >=
                                                file.size
                                            ) {

                                                resolve({

                                                    blob: file,

                                                    name: createName(
                                                        file,
                                                        getExtension(
                                                            file.name
                                                        ).toLowerCase()
                                                    )

                                                });

                                                return;

                                            }


                                            let extension =
                                                'jpg';


                                            if (
                                                outputType ===
                                                'image/webp'
                                            ) {

                                                extension =
                                                    'webp';

                                            }


                                            if (
                                                outputType ===
                                                'image/png'
                                            ) {

                                                extension =
                                                    'png';

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
               SVG OPTIMIZER
            ========================================================== */

            function optimizeSVG(svg) {


                return svg

                    /* Remove comments */

                    .replace(
                        /<!--[\s\S]*?-->/g,
                        ''
                    )

                    /* Remove unnecessary whitespace */

                    .replace(
                        />\s+</g,
                        '><'
                    )

                    /* Reduce multiple spaces */

                    .replace(
                        /\s{2,}/g,
                        ' '
                    )

                    /* Remove line breaks */

                    .replace(
                        /\n/g,
                        ''
                    )

                    .replace(
                        /\r/g,
                        ''
                    )

                    .trim();

            }


            /* =========================================================
               CREATE FILE NAME
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
                    '-compressed.' +
                    extension
                );

            }


            /* =========================================================
               GET EXTENSION
            ========================================================== */

            function getExtension(name) {


                const parts =
                    name.split('.');


                if (
                    parts.length < 2
                ) {

                    return 'IMAGE';

                }


                return parts
                    .pop()
                    .toUpperCase();

            }


            /* =========================================================
               FORMAT BYTES
            ========================================================== */

            function formatBytes(bytes) {


                if (
                    bytes === 0
                ) {

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


            /* =========================================================
               ESCAPE HTML
            ========================================================== */

            function escapeHtml(text) {


                return $('<div>')
                    .text(text)
                    .html();

            }


        });
    </script>
@endsection
