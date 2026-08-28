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

                    <span>Convert to JPG</span>

                </div>

            </div>
        </section>


        <!-- =========================================================
             HERO / UPLOAD SECTION
        ========================================================== -->
        <section class="crop-hero-section" id="jpgUploadSection">

            <div class="container">

                <div class="crop-heading">

                    <span class="crop-small-badge">
                        <i class="fas fa-file-image"></i>
                        Image Tool
                    </span>

                    <h1>
                        Convert Images<br>
                        <span>To JPG.</span>
                    </h1>

                    <p>
                        Convert PNG, GIF, SVG and WebP images to JPG quickly.
                        Simple, fast and completely online.
                    </p>

                </div>


                <!-- =================================================
                     UPLOAD BOX
                ================================================== -->
                <div class="crop-upload-box" id="jpgUploadBox">

                    <div class="crop-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>

                    <h3>
                        Upload your image
                    </h3>

                    <p class="crop-upload-text">
                        Drag & drop your image here or
                    </p>

                    <label for="jpgImageInput" class="crop-upload-btn">

                        <i class="fas fa-upload"></i>
                        Choose File

                    </label>

                    <input type="file" id="jpgImageInput"
                        accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml" hidden>

                    <p class="crop-upload-info">

                        Supports JPG, PNG, WebP, GIF, SVG

                        <span>|</span>

                        Max size: 50MB

                    </p>

                </div>

            </div>

        </section>



        <!-- =========================================================
             CONVERTER SECTION
        ========================================================== -->
        <section class="crop-info-section">

            <div class="container">

                <div class="crop-info-card">


                    <!-- =================================================
                         LEFT CONTENT
                    ================================================== -->
                    <div class="crop-info-content">

                        <span class="crop-info-badge">
                            ABOUT
                        </span>

                        <h2>
                            Convert Images<br>
                            <span>to JPG Easily</span>
                        </h2>

                        <p class="crop-info-description">
                            Convert your images into JPG format directly
                            in your browser. No complicated software or
                            installation is required.
                        </p>


                        <!-- Feature 01 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-blue">
                                <i class="fas fa-exchange-alt"></i>
                            </div>

                            <div>

                                <h4>
                                    Easy Conversion
                                </h4>

                                <p>
                                    Convert supported image formats to JPG
                                    with just one click.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 02 -->
                        <div class="crop-feature-item">

                            <div class="crop-feature-icon crop-icon-purple">
                                <i class="fas fa-images"></i>
                            </div>

                            <div>

                                <h4>
                                    High Quality
                                </h4>

                                <p>
                                    Your image dimensions are preserved during
                                    the JPG conversion.
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
                                    Images are processed directly in your browser
                                    without uploading them to a server.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- =================================================
                         RIGHT CONVERTER
                    ================================================== -->
                    <div class="crop-preview-wrapper">


                        <!-- =================================================
                             IMAGE PREVIEW
                        ================================================== -->
                        <div class="crop-preview-card">

                            <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85"
                                alt="JPG Converter Preview" class="crop-preview-image" id="jpgImagePreview">

                        </div>



                        <!-- =================================================
                             DEFAULT STATE
                        ================================================== -->
                        <div id="jpgNormalState">

                            <div class="crop-ratio-panel">

                                <span class="crop-ratio-title">
                                    JPG Converter
                                </span>

                                <p class="mb-0">
                                    Upload an image above to start converting.
                                </p>

                            </div>

                        </div>



                        <!-- =================================================
                             PROCESSING STATE
                        ================================================== -->
                        <div id="jpgProcessing" style="display:none;">


                            <!-- =================================================
                                 FILE INFORMATION
                            ================================================== -->
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">
                                    Image Information
                                </span>


                                <div class="row g-3">

                                    <!-- File Name -->
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <div>

                                            <strong>
                                                File
                                            </strong>

                                            <div id="jpgFileName" class="text-break">
                                                -
                                            </div>

                                        </div>

                                    </div>


                                    <!-- Dimensions -->
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <div>

                                            <strong>
                                                Dimensions
                                            </strong>

                                            <div id="jpgDimensions">
                                                -
                                            </div>

                                        </div>

                                    </div>


                                    <!-- File Size -->
                                    <div class="col-lg-4 col-md-4 col-sm-12">

                                        <div>

                                            <strong>
                                                File Size
                                            </strong>

                                            <div id="jpgFileSize">
                                                -
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 CONVERSION OPTIONS
                            ================================================== -->
                            <div class="crop-ratio-panel mt-3">

                                <span class="crop-ratio-title">
                                    Conversion Options
                                </span>


                                <div class="row g-3 align-items-end">

                                    <!-- Quality -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label class="form-label">
                                            JPG Quality
                                        </label>

                                        <select id="jpgQuality" class="form-select">

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


                                    <!-- Background -->
                                    <div class="col-lg-6 col-md-6 col-sm-12">

                                        <label class="form-label">
                                            Background
                                        </label>

                                        <select id="jpgBackground" class="form-select">

                                            <option value="#ffffff" selected>
                                                White
                                            </option>

                                            <option value="#000000">
                                                Black
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 RESULT
                            ================================================== -->
                            <div id="jpgResult" style="display:none;">

                                <div class="crop-ratio-panel mt-3">

                                    <span class="crop-ratio-title">
                                        Conversion Complete
                                    </span>


                                    <div class="row g-3">

                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                Format
                                            </span>

                                            <strong class="d-block">
                                                JPG
                                            </strong>

                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                Dimensions
                                            </span>

                                            <strong id="jpgResultDimensions" class="d-block">
                                                -
                                            </strong>

                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12">

                                            <span>
                                                File Size
                                            </span>

                                            <strong id="jpgResultSize" class="d-block">
                                                -
                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <!-- =================================================
                                 ACTION BUTTONS
                            ================================================== -->
                            <div class="crop-action-buttons mt-3">


                                <!-- Convert -->
                                <button type="button" id="jpgConvertButton" class="crop-download-btn">

                                    <i class="fas fa-sync-alt"></i>

                                    Convert to JPG

                                </button>


                                <!-- Download -->
                                <button type="button" id="jpgDownloadButton" class="crop-download-btn"
                                    style="display:none;">

                                    <i class="fas fa-download"></i>

                                    Download JPG

                                </button>


                                <!-- Convert Another -->
                                <button type="button" id="jpgAnotherButton" style="display:none;">

                                    <i class="fas fa-plus"></i>

                                    Convert Another

                                </button>


                                <!-- Remove -->
                                <button type="button" id="jpgRemoveButton">

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
                        Simple. Fast. <strong>Reliable.</strong>
                    </h2>

                    <p>
                        Convert your images to JPG without complicated
                        software or unnecessary steps.
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
                                    Convert images quickly directly in your
                                    browser.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- Benefit 02 -->
                    <div class="col-lg-4 col-md-6">

                        <div class="crop-benefit-card">

                            <div class="crop-benefit-icon">

                                <i class="fas fa-file-image"></i>

                            </div>

                            <div>

                                <h4>
                                    JPG Format
                                </h4>

                                <p>
                                    Create widely compatible JPG images for
                                    websites, documents and sharing.
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
                                    Your image stays on your device during
                                    the conversion process.
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

            let selectedFile = null;
            let convertedBlob = null;
            let originalObjectURL = null;
            let convertedURL = null;

            const MAX_SIZE = 50 * 1024 * 1024;


            /* =========================================================
               FORMAT FILE SIZE
            ========================================================== */
            function formatFileSize(bytes) {

                if (bytes < 1024) {
                    return bytes + ' B';
                }

                if (bytes < 1024 * 1024) {
                    return (bytes / 1024).toFixed(1) + ' KB';
                }

                return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
            }


            /* =========================================================
               RESET TOOL
            ========================================================== */
            function resetJPGTool() {

                selectedFile = null;
                convertedBlob = null;

                if (originalObjectURL) {
                    URL.revokeObjectURL(originalObjectURL);
                    originalObjectURL = null;
                }

                if (convertedURL) {
                    URL.revokeObjectURL(convertedURL);
                    convertedURL = null;
                }

                $('#jpgImageInput').val('');

                $('#jpgProcessing').hide();
                $('#jpgResult').hide();

                $('#jpgDownloadButton').hide();
                $('#jpgAnotherButton').hide();

                $('#jpgConvertButton')
                    .show()
                    .prop('disabled', false)
                    .html('<i class="fas fa-sync-alt"></i> Convert to JPG');

                $('#jpgRemoveButton').show();

                $('#jpgNormalState').show();

                $('#jpgFileName').text('-');
                $('#jpgDimensions').text('-');
                $('#jpgFileSize').text('-');

                $('#jpgResultDimensions').text('-');
                $('#jpgResultSize').text('-');

                $('#jpgImagePreview').attr(
                    'src',
                    'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=85'
                );

                $('html, body').animate({
                    scrollTop: $('#jpgUploadSection').offset().top - 20
                }, 500);
            }


            /* =========================================================
               SHOW CONVERTER
            ========================================================== */
            function showConverter(file) {

                selectedFile = file;

                if (originalObjectURL) {
                    URL.revokeObjectURL(originalObjectURL);
                }

                originalObjectURL = URL.createObjectURL(file);

                $('#jpgImagePreview').attr(
                    'src',
                    originalObjectURL
                );

                $('#jpgFileName').text(file.name);
                $('#jpgFileSize').text(formatFileSize(file.size));

                $('#jpgNormalState').hide();
                $('#jpgProcessing').show();

                $('#jpgResult').hide();

                $('#jpgDownloadButton').hide();
                $('#jpgAnotherButton').hide();

                $('#jpgConvertButton')
                    .show()
                    .prop('disabled', false)
                    .html('<i class="fas fa-sync-alt"></i> Convert to JPG');

                $('#jpgRemoveButton').show();

                const img = new Image();

                img.onload = function() {

                    $('#jpgDimensions').text(
                        img.naturalWidth + ' × ' + img.naturalHeight + ' px'
                    );

                };

                img.onerror = function() {

                    $('#jpgDimensions').text('Unable to read dimensions');

                };

                img.src = originalObjectURL;


                /* Move user smoothly to the tool */
                setTimeout(function() {

                    $('html, body').animate({
                        scrollTop: $('#jpgProcessing').offset().top - 30
                    }, 500);

                }, 150);

            }


            /* =========================================================
               FILE VALIDATION
            ========================================================== */
            function handleFile(file) {

                if (!file) {
                    return;
                }


                if (file.size > MAX_SIZE) {

                    alert('The selected image is larger than 50MB.');
                    return;

                }


                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                    'image/gif',
                    'image/svg+xml'
                ];


                if (!allowedTypes.includes(file.type)) {

                    alert(
                        'Please select a JPG, PNG, WebP, GIF or SVG image.'
                    );

                    return;
                }


                showConverter(file);
            }


            /* =========================================================
               FILE INPUT
            ========================================================== */
            $('#jpgImageInput').on('change', function() {

                const file = this.files[0];

                handleFile(file);

            });


            /* =========================================================
               DRAG & DROP
            ========================================================== */
            $('#jpgUploadBox')
                .on('dragover', function(e) {

                    e.preventDefault();

                    $(this).addClass('dragging');

                })
                .on('dragleave', function() {

                    $(this).removeClass('dragging');

                })
                .on('drop', function(e) {

                    e.preventDefault();

                    $(this).removeClass('dragging');

                    const files = e.originalEvent.dataTransfer.files;

                    if (files.length) {
                        handleFile(files[0]);
                    }

                });


            /* =========================================================
               CONVERT TO JPG
            ========================================================== */
            $('#jpgConvertButton').on('click', function() {

                if (!selectedFile) {
                    return;
                }


                const button = $(this);

                button
                    .prop('disabled', true)
                    .html(
                        '<i class="fas fa-spinner fa-spin"></i> Converting...'
                    );


                const imageURL = URL.createObjectURL(selectedFile);

                const img = new Image();

                img.onload = function() {

                    try {

                        const canvas = document.createElement('canvas');

                        canvas.width = img.naturalWidth;
                        canvas.height = img.naturalHeight;

                        const ctx = canvas.getContext('2d');


                        /* White background for transparent images */
                        ctx.fillStyle = $('#jpgBackground').val();

                        ctx.fillRect(
                            0,
                            0,
                            canvas.width,
                            canvas.height
                        );


                        ctx.drawImage(
                            img,
                            0,
                            0,
                            canvas.width,
                            canvas.height
                        );


                        const quality = parseFloat(
                            $('#jpgQuality').val()
                        );


                        canvas.toBlob(
                            function(blob) {

                                URL.revokeObjectURL(imageURL);

                                if (!blob) {

                                    button
                                        .prop('disabled', false)
                                        .html(
                                            '<i class="fas fa-sync-alt"></i> Convert to JPG'
                                        );

                                    alert(
                                        'Unable to convert this image. Please try another file.'
                                    );

                                    return;
                                }


                                convertedBlob = blob;


                                if (convertedURL) {
                                    URL.revokeObjectURL(convertedURL);
                                }

                                convertedURL = URL.createObjectURL(blob);


                                /* Show converted preview */
                                $('#jpgImagePreview').attr(
                                    'src',
                                    convertedURL
                                );


                                $('#jpgResultDimensions').text(
                                    canvas.width +
                                    ' × ' +
                                    canvas.height +
                                    ' px'
                                );


                                $('#jpgResultSize').text(
                                    formatFileSize(blob.size)
                                );


                                $('#jpgResult').fadeIn(250);


                                /* Button states */
                                $('#jpgConvertButton').hide();

                                $('#jpgDownloadButton').fadeIn(250);

                                $('#jpgAnotherButton').fadeIn(250);

                                $('#jpgRemoveButton').show();


                                /* Scroll slightly to result */
                                setTimeout(function() {

                                    $('html, body').animate({
                                        scrollTop: $('#jpgResult').offset().top - 40
                                    }, 400);

                                }, 150);

                            },
                            'image/jpeg',
                            quality
                        );


                    } catch (error) {

                        URL.revokeObjectURL(imageURL);

                        button
                            .prop('disabled', false)
                            .html(
                                '<i class="fas fa-sync-alt"></i> Convert to JPG'
                            );

                        alert(
                            'Something went wrong while converting the image.'
                        );

                    }

                };


                img.onerror = function() {

                    URL.revokeObjectURL(imageURL);

                    button
                        .prop('disabled', false)
                        .html(
                            '<i class="fas fa-sync-alt"></i> Convert to JPG'
                        );

                    alert(
                        'This image format could not be processed by your browser.'
                    );

                };


                img.src = imageURL;

            });


            /* =========================================================
               DOWNLOAD JPG
            ========================================================== */
            $('#jpgDownloadButton').on('click', function() {

                if (!convertedBlob) {
                    return;
                }


                const downloadURL = URL.createObjectURL(
                    convertedBlob
                );


                const link = document.createElement('a');

                link.href = downloadURL;

                link.download =
                    selectedFile.name.replace(/\.[^/.]+$/, '') +
                    '.jpg';


                document.body.appendChild(link);

                link.click();

                document.body.removeChild(link);


                setTimeout(function() {
                    URL.revokeObjectURL(downloadURL);
                }, 1000);

            });


            /* =========================================================
               CONVERT ANOTHER
            ========================================================== */
            $('#jpgAnotherButton').on('click', function() {

                resetJPGTool();

            });


            /* =========================================================
               REMOVE IMAGE
            ========================================================== */
            $('#jpgRemoveButton').on('click', function() {

                resetJPGTool();

            });


            /* =========================================================
               QUALITY / BACKGROUND CHANGE
               If user changes an option after conversion,
               show Convert button again.
            ========================================================== */
            $('#jpgQuality, #jpgBackground').on('change', function() {

                if (!selectedFile) {
                    return;
                }


                if (convertedBlob) {

                    convertedBlob = null;

                    if (convertedURL) {

                        URL.revokeObjectURL(convertedURL);

                        convertedURL = null;

                    }


                    /* Restore original preview */
                    if (originalObjectURL) {

                        $('#jpgImagePreview').attr(
                            'src',
                            originalObjectURL
                        );

                    }


                    $('#jpgResult').hide();

                    $('#jpgDownloadButton').hide();

                    $('#jpgAnotherButton').hide();


                    $('#jpgConvertButton')
                        .show()
                        .prop('disabled', false)
                        .html(
                            '<i class="fas fa-sync-alt"></i> Convert to JPG'
                        );

                }

            });

        });
    </script>
@endsection
