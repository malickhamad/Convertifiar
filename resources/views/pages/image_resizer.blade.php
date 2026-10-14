@extends('components.app')

@section('meta')
    <title>FREE Image Resizer: Resize Photos Online | XConvertifire</title>
    <meta name="description" content="Resize images online for FREE with XConvertifire. Easily resize JPG, PNG, SVG, GIF, and WebP images for FREE while maintaining quality, quickly and securely." />

    <meta property="og:title" content="FREE Image Resizer: Resize Photos Online | XConvertifire">
    <meta property="og:description" content="Resize images online for FREE with XConvertifire. Easily resize JPG, PNG, SVG, GIF, and WebP images for FREE while maintaining quality, quickly and securely.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('image.resizer') }}">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta property="og:site_name" content="XConvertifire">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE Image Resizer: Resize Photos Online | XConvertifire">
    <meta name="twitter:description" content="Resize images online for FREE with XConvertifire. Easily resize JPG, PNG, SVG, GIF, and WebP images for FREE while maintaining quality, quickly and securely.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <meta name="twitter:image:alt" content="XConvertifire logo">
@endsection

@section('content')
    <main class="crop-page">

        <!-- =========================================================
             BREADCRUMB
        ========================================================== -->
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
                        WHY USE X Convertifire
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

        <section class="resizer-seo-section">
            <div class="container">
                <div class="resizer-seo-wrap">
                    <h2>Free Image Resizer Online: Resize Photos by Pixels or Percentage</h2>
                    <p>Need to change the width or height of a photo without installing image-editing software? XConvertifire's free image resizer lets you resize images online using exact pixel dimensions or percentage-based scaling.</p>
                    <p>Upload a supported JPG, PNG, WebP, SVG or GIF file, enter your preferred dimensions and download the resized result. The tool processes selected images in your browser and provides an aspect ratio control to help you avoid unwanted stretching.</p>
                    <p>Resizing is useful when an image is too large for a website layout, needs different dimensions for a document or must fit an upload requirement. However, changing image dimensions does not guarantee a smaller file size or identical visual quality.</p>

                    <h2>How to Resize an Image Online</h2>
                    <p>Follow these four steps to resize your image.</p>

                    <div class="row g-4 resizer-seo-steps">
                        <div class="col-lg-3 col-md-6">
                            <div class="resizer-seo-step">
                                <h3>Step 1: Upload Your Image</h3>
                                <p>Click <strong>Choose File</strong> or drag an image into the upload area. The tool accepts JPG/JPEG, PNG, WebP, SVG and GIF files up to 50 MB each.</p>
                                <p>Only one image is processed at a time.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="resizer-seo-step">
                                <h3>Step 2: Choose Pixels or Percentage</h3>
                                <p>Select <strong>Pixels</strong> when you need specific image dimensions. Enter your preferred width and height.</p>
                                <p>Select <strong>Percentage</strong> when you want to scale an image relative to its original dimensions. For example, setting both dimensions to 50% reduces the original width and height by half.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="resizer-seo-step">
                                <h3>Step 3: Adjust the Aspect Ratio</h3>
                                <p>The <strong>Keep Aspect Ratio</strong> option is enabled by default.</p>
                                <p>When enabled, changing the width automatically calculates a proportional height, and changing the height calculates a proportional width.</p>
                                <p>You can unlock the ratio to enter independent dimensions, but doing so may stretch or distort the image.</p>
                                <p>Click <strong>Resize Image</strong> when the settings are ready.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="resizer-seo-step">
                                <h3>Step 4: Review and Download</h3>
                                <p>After processing, the tool displays the original dimensions, new dimensions and output file size.</p>
                                <p>Review the resulting preview and click <strong>Download Image</strong>.</p>
                                <p>Use <strong>Resize Another Image</strong> to start again with a different file.</p>
                            </div>
                        </div>
                    </div>

                    <h2>Resize Images by Pixels or Percentage: What's the Difference?</h2>
                    <p>Both methods change image dimensions, but they are useful in different situations.</p>

                    <h3>Resize an Image by Pixels</h3>
                    <p>Pixel resizing is appropriate when you know the exact dimensions required.</p>
                    <p>For example, suppose you have a photograph measuring 1200 × 800 pixels and want a smaller version that maintains the same proportions.</p>
                    <p>With the aspect ratio locked, entering a width of 600 pixels calculates a height of approximately 400 pixels.</p>
                    <p>This is useful for preparing photos for websites, documents, online forms and other projects with specific dimension requirements.</p>

                    <h3>Resize an Image by Percentage</h3>
                    <p>Percentage resizing scales an image relative to its original dimensions.</p>
                    <p>For example, a 1600 × 900 pixel image resized to 50% of its original width and height becomes 800 × 450 pixels.</p>
                    <p>Percentage resizing is useful when you want a smaller or larger version without calculating new dimensions manually.</p>
                    <p>If you need proportional scaling, leave <strong>Keep Aspect Ratio</strong> enabled.</p>

                    <h2>How to Maintain Image Aspect Ratio</h2>
                    <p>An image's aspect ratio describes the relationship between its width and height.</p>
                    <p>A 1200 × 800 pixel image has a 3:2 aspect ratio. When resized proportionally to 600 × 400 pixels, it keeps the same shape.</p>
                    <p>If the same image is forced into dimensions of 600 × 600 pixels without cropping, its content may appear stretched or squeezed.</p>
                    <p>XConvertifire's aspect ratio lock helps calculate proportional dimensions automatically.</p>
                    <p>For an image that must fit a differently shaped space, simply unlocking the ratio is not always the best solution. Cropping may produce a more natural-looking result.</p>
                    <p>To remove unwanted edges or change the visible composition, use the <a href="{{ route('image.cropper') }}">online image cropper</a>.</p>

                    <h2>Resize JPG, PNG, WebP, SVG and GIF Images</h2>
                    <p>Different image formats behave differently when resized. Understanding those differences helps you select the right workflow.</p>

                    <h3>Resize JPG and JPEG Photos</h3>
                    <p>JPG and JPEG are widely used for photographs.</p>
                    <p>The resizer can scale a JPG image to new pixel dimensions and export the result as a JPG file.</p>
                    <p>Downscaling may produce a smaller file, but the output depends on the original photograph and image encoding. Very small output dimensions can make details or text difficult to see.</p>
                    <p>Enlarging a JPG cannot restore detail that was not present in the original.</p>

                    <h3>Resize PNG Images</h3>
                    <p>PNG is commonly used for screenshots, illustrations, logos and graphics that require transparency.</p>
                    <p>When a PNG is resized through this tool, it is exported as PNG in the normal raster resizing workflow.</p>
                    <p>Keep the aspect ratio locked when the original proportions matter. Review thin lines and small text after reducing the dimensions.</p>
                    <p>If you need to change the file format rather than its dimensions, use the <a href="{{ route('image.converter') }}">online image converter</a>.</p>

                    <h3>Resize WebP Images</h3>
                    <p>WebP is a useful image format for many modern websites.</p>
                    <p>The resizer can adjust the pixel dimensions of supported WebP images and export the result as WebP when browser encoding supports it.</p>
                    <p>Review the downloaded file and its quality before publishing. Resizing and re-encoding can affect the appearance and file size.</p>

                    <h3>Resize SVG Graphics</h3>
                    <p>SVG is a vector-based format often used for logos, icons and scalable illustrations.</p>
                    <p>For SVG inputs, XConvertifire updates the width and height attributes in the SVG markup rather than applying the same canvas-resizing process used for raster images.</p>
                    <p>SVG rendering also depends on its internal markup and viewBox configuration. If the result looks unexpected, inspect the output before using it.</p>

                    <h3>What Happens When You Resize a GIF?</h3>
                    <p>GIF uploads are supported, but animated GIF resizing has an important limitation.</p>
                    <p>The current tool processes GIF input through a browser canvas and exports a PNG still image.</p>
                    <p>This means an animated GIF's animation is not preserved.</p>
                    <p>Use a dedicated animated GIF editor when your goal is to resize an animation while retaining its frames.</p>

                    <h2>Resize, Crop or Compress: Which Tool Should You Use?</h2>
                    <p>These three image-editing tasks solve different problems.</p>

                    <h3>Resize an Image</h3>
                    <p>Resizing changes an image's width and height in pixels.</p>
                    <p>Use it when an image needs different dimensions for a layout, document or online form.</p>

                    <h3>Crop an Image</h3>
                    <p>Cropping removes part of an image to change its visible composition.</p>
                    <p>Use cropping when you need to remove unwanted areas or prepare an image for a different shape without stretching the subject.</p>

                    <h3>Compress an Image</h3>
                    <p>Compression focuses on reducing file size, often by changing encoding settings.</p>
                    <p>An image can have the correct pixel dimensions but still be too large in KB or MB.</p>
                    <p>If your dimensions are already correct and you want to reduce the download size, try the <a href="{{ route('image.compressor') }}">free image compressor</a>.</p>
                    <p>Resizing and compression can be used together, but neither guarantees a particular final file size.</p>

                    <h2>Common Reasons to Resize Images</h2>

                    <h3>Website and Blog Images</h3>
                    <p>Large images are not always necessary for smaller page components.</p>
                    <p>Preparing images at suitable pixel dimensions can help avoid unnecessarily large assets.</p>
                    <p>For responsive websites, developers should also consider how different image sizes are delivered to different devices. Google's <a href="https://web.dev/learn/images/responsive-images" target="_blank" rel="noopener noreferrer">responsive images guide</a> explains this in more detail.</p>

                    <h3>Profile Pictures and Social Media</h3>
                    <p>Profile photographs, thumbnails and social images often need particular dimensions or aspect ratios.</p>
                    <p>Check the current requirements of the platform where the image will be used.</p>
                    <p>If an image needs a different shape rather than proportional scaling, cropping may be more appropriate than stretching.</p>

                    <h3>Online Applications and Forms</h3>
                    <p>Forms may impose limits on pixel dimensions, file type or file size.</p>
                    <p>The resizer can help with width and height requirements. It does not guarantee a specific file size such as 100 KB or 200 KB.</p>
                    <p>Always review the downloaded file before submitting it.</p>

                    <h3>Documents, Presentations and Email</h3>
                    <p>Oversized images can be inconvenient when added to documents or shared with other people.</p>
                    <p>Resizing may help produce an image with more appropriate dimensions for the intended use.</p>
                    <p>Keep an original copy if you may need the full-resolution image again.</p>

                    <h2>Tips for Resizing Images Without Unnecessary Quality Loss</h2>
                    <p><strong>Keep the original proportions.</strong> Leave the aspect ratio lock enabled unless you intentionally need independent dimensions.</p>
                    <p><strong>Avoid unnecessary enlargement.</strong> Upscaling adds pixels through interpolation rather than recreating missing detail.</p>
                    <p><strong>Check text and fine details.</strong> Screenshots, diagrams and images containing small text can become difficult to read after strong downscaling.</p>
                    <p><strong>Choose dimensions for the final use.</strong> Start with the actual requirements of your website, form, document or destination platform.</p>
                    <p><strong>Understand the difference between dimensions and file size.</strong> An image's pixel dimensions and its KB/MB file size are different measurements.</p>
                    <p><strong>Preserve your original.</strong> Keep the full-resolution file so you can create another version if necessary.</p>
                    <p>For more technical background on image scaling, read the <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/drawImage" target="_blank" rel="noopener noreferrer">MDN guide to canvas image drawing</a>.</p>

                    <h2>Frequently Asked Questions About Image Resizing</h2>

                    <h3>Is XConvertifire's image resizer free?</h3>
                    <p>Yes. XConvertifire provides a free browser-based image resizing tool for supported image formats.</p>

                    <h3>Can I resize an image to exact pixel dimensions?</h3>
                    <p>Yes. Select Pixels and enter the new width and height. Keep the aspect ratio locked if proportional scaling is important.</p>

                    <h3>Can I resize an image by percentage?</h3>
                    <p>Yes. Select Percentage and enter the desired scaling values. A 50% setting for both dimensions produces an image with half the original width and height.</p>

                    <h3>Will resizing make my image blurry?</h3>
                    <p>It can. Strong downscaling removes image detail, while enlarging can make images look softer or pixelated. Results depend on the original image and the target dimensions.</p>

                    <h3>Can I resize images without stretching them?</h3>
                    <p>Yes. Leave Keep Aspect Ratio enabled to automatically calculate proportional dimensions. If your destination requires a different shape, consider cropping rather than stretching.</p>

                    <h3>Does resizing always reduce file size?</h3>
                    <p>No. Changing pixel dimensions may affect file size, but the final result also depends on the format and encoding. A larger image may require more storage, and a smaller image is not guaranteed to meet a specific KB target.</p>

                    <h3>What is the maximum supported file size?</h3>
                    <p>The uploader accepts supported images up to 50 MB each. Browser memory and device limitations may affect processing of very large images.</p>

                    <h3>Can I resize multiple images at once?</h3>
                    <p>The current resizer processes one image at a time. After downloading one result, you can upload another image.</p>

                    <h3>Can I resize an animated GIF without losing its animation?</h3>
                    <p>Not with the current resizer. GIF input is exported as a static PNG image, so the animation is not preserved.</p>

                    <h3>Are my images sent to a server for resizing?</h3>
                    <p>The current image-resizing workflow reads and processes selected image files in the browser and creates the downloadable result locally. It does not require a server-side resizing request.</p>

                    <div class="resizer-seo-cta">
                        <h2>Resize Your Image Online for Free</h2>
                        <p>Whether you need a smaller JPG photo, different PNG dimensions or a proportionally scaled WebP image, XConvertifire helps you resize supported images using pixels or percentages.</p>
                        <p>Select your image, choose the dimensions, keep the proportions you need and review the output before downloading.</p>
                        <a href="#resizeUploadSection" class="resizer-seo-cta-link">Resize Your Image Now</a>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('scripts')
    <style>
        .resizer-seo-section {
            padding: 24px 0 72px;
        }

        .resizer-seo-wrap {
            max-width: 960px;
            margin: 0 auto;
        }

        .resizer-seo-wrap > h2:not(:first-child) {
            margin-top: 42px;
        }

        .resizer-seo-section h2 {
            color: #fff;
            font-size: clamp(2rem, 3vw, 2.7rem);
            line-height: 1.2;
            margin: 0 0 18px;
            letter-spacing: -0.03em;
        }

        .resizer-seo-section h3 {
            color: #fff;
            font-size: 1.25rem;
            margin: 28px 0 12px;
        }

        .resizer-seo-section p,
        .resizer-seo-section li {
            color: rgba(255, 255, 255, 0.76);
            font-size: 1.03rem;
            line-height: 1.75;
            margin: 0 0 16px;
        }

        .resizer-seo-section a {
            color: #60a5fa;
            text-decoration: underline;
            text-underline-offset: 0.18em;
        }

        .resizer-seo-section a:hover,
        .resizer-seo-section a:focus-visible {
            color: #93c5fd;
        }

        .resizer-seo-steps {
            margin-top: 8px;
            margin-bottom: 24px;
        }

        .resizer-seo-step {
            height: 100%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 18px;
            padding: 22px 18px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.02);
        }

        .resizer-seo-step h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1.05rem;
        }

        .resizer-seo-step p {
            margin-bottom: 0;
            font-size: 0.98rem;
        }

        .resizer-seo-cta {
            margin-top: 36px;
            padding: 28px 24px;
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(96, 165, 250, 0.28);
            border-radius: 18px;
            text-align: center;
        }

        .resizer-seo-cta h2 {
            margin-bottom: 14px;
        }

        .resizer-seo-cta-link {
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

        .resizer-seo-cta-link:hover,
        .resizer-seo-cta-link:focus-visible {
            background: #1d4ed8;
            color: #fff !important;
        }

        @media (max-width: 767px) {
            .resizer-seo-section {
                padding-top: 14px;
            }

            .resizer-seo-wrap > h2:not(:first-child) {
                margin-top: 32px;
            }

            .resizer-seo-section h2 {
                font-size: 1.9rem;
            }

            .resizer-seo-section p,
            .resizer-seo-section li {
                font-size: 0.98rem;
            }

            .resizer-seo-cta {
                padding: 22px 18px;
            }
        }

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
