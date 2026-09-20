@extends('components.app')
@section('meta')
    <title>Edit PDF Online | Tool Baazar</title>
    <meta name="description"
        content="Edit PDF files online like Microsoft Word. Edit text, add text, change fonts, colors, sizes and download your edited PDF with Tool Baazar.">
@endsection
@section('content')
    <main class="bg-black" style="margin-top:70px;">
        {{-- =========================================================
            FIRST SECTION
            KEEPING YOUR EXISTING DESIGN
        ========================================================== --}}
        <section class="crop-hero-section" id="pdfUploadSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-file-pdf me-2"></i>
                        PDF Tool
                    </div>
                    <h1>
                        Edit Your PDF
                        <br>
                        <span>Like A Pro.</span>
                    </h1>
                    <p>
                        Edit text directly inside your PDF, just like a Word document.
                        Click any text, type your changes and download your edited PDF.
                    </p>
                </div>
                <div class="crop-upload-box mx-auto cursor-pointer" id="uploadArea" onclick="document.getElementById('pdfFileInput').click()">
                    <div class="crop-upload-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 class="text-white mb-2">
                        Upload your PDF
                    </h4>
                    <p class="text-secondary mb-4">
                        Drag & drop your PDF here or choose a file
                    </p>
                    <label for="pdfFileInput" class="crop-upload-btn">
                        <i class="fas fa-upload me-2"></i>
                        Choose PDF
                    </label>
                    <input type="file" id="pdfFileInput" class="d-none" accept=".pdf,application/pdf">
                    <div class="small text-secondary mt-3">
                        PDF files only
                        <br>
                        Maximum file size: 50MB
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
            PDF EDITOR
        ========================================================== --}}
        <section id="pdfEditorSection" class="d-none pb-5">
            <div class="container-fluid px-lg-4">
                {{-- =================================================
                    EDITOR TOOLBAR
                ================================================== --}}
                <div class="pdf-editor-toolbar">
                    <div class="pdf-toolbar-top">
                        <div class="pdf-toolbar-left">
                            {{-- HISTORY --}}
                            <div class="pdf-toolbar-group">
                                <div class="pdf-group-label">
                                    <i class="fas fa-history"></i>
                                    History
                                </div>
                                <div class="pdf-button-row">
                                    <button type="button" class="pdf-tool-btn" id="undoBtn" title="Undo">
                                        <i class="fas fa-undo"></i>
                                        <span>Undo</span>
                                    </button>
                                    <button type="button" class="pdf-tool-btn" id="redoBtn" title="Redo">
                                        <i class="fas fa-redo"></i>
                                        <span>Redo</span>
                                    </button>
                                </div>
                            </div>
                            <div class="toolbar-divider"></div>
                            {{-- EDIT --}}
                            <div class="pdf-toolbar-group">
                                <div class="pdf-group-label">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </div>
                                <div class="pdf-button-row">
                                    <button type="button" class="pdf-tool-btn pdf-add-text-btn" id="addTextBtn"
                                        title="Add a new text box">
                                        <i class="fas fa-plus"></i>
                                        <span>Add Text</span>
                                    </button>
                                    <button type="button" class="pdf-tool-btn danger-tool" id="deleteTextBtn"
                                        title="Delete selected text">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                            <div class="toolbar-divider"></div>
                            {{-- TEXT --}}
                            <div class="pdf-toolbar-group">
                                <div class="pdf-group-label">
                                    <i class="fas fa-font"></i>
                                    Text
                                </div>
                                <div class="pdf-button-row">
                                    {{-- FONT --}}
                                    <div class="pdf-control-box">
                                        <div class="pdf-control-icon">
                                            <i class="fas fa-font"></i>
                                        </div>
                                        <div class="pdf-control-content">
                                            <span>Font</span>
                                            <select id="fontFamilySelect" class="pdf-select">
                                                <option value="Helvetica">
                                                    Helvetica
                                                </option>
                                                <option value="Times-Roman">
                                                    Times New Roman
                                                </option>
                                                <option value="Courier">
                                                    Courier
                                                </option>
                                                <option value="Arial">
                                                    Arial
                                                </option>
                                                <option value="Georgia">
                                                    Georgia
                                                </option>
                                                <option value="Verdana">
                                                    Verdana
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- SIZE --}}
                                    <div class="pdf-control-box pdf-size-box">
                                        <div class="pdf-control-icon">
                                            <i class="fas fa-text-height"></i>
                                        </div>
                                        <div class="pdf-control-content">
                                            <span>Size</span>
                                            <select id="fontSizeSelect" class="pdf-select">
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12" selected>12</option>
                                                <option value="14">14</option>
                                                <option value="16">16</option>
                                                <option value="18">18</option>
                                                <option value="20">20</option>
                                                <option value="24">24</option>
                                                <option value="28">28</option>
                                                <option value="32">32</option>
                                                <option value="36">36</option>
                                                <option value="42">42</option>
                                                <option value="48">48</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="toolbar-divider"></div>
                            {{-- FORMAT --}}
                            <div class="pdf-toolbar-group">
                                <div class="pdf-group-label">
                                    <i class="fas fa-sliders-h"></i>
                                    Format
                                </div>
                                <div class="pdf-button-row">
                                    <button type="button" class="pdf-format-btn" data-format="bold" id="boldBtn"
                                        title="Bold">
                                        <i class="fas fa-bold"></i>
                                    </button>
                                    <button type="button" class="pdf-format-btn" data-format="italic" id="italicBtn"
                                        title="Italic">
                                        <i class="fas fa-italic"></i>
                                    </button>
                                    <button type="button" class="pdf-format-btn" data-format="underline"
                                        id="underlineBtn" title="Underline">
                                        <i class="fas fa-underline"></i>
                                    </button>
                                    {{-- COLOR --}}
                                    <div class="color-picker-wrapper">
                                        <button type="button" class="pdf-color-btn" id="textColorButton"
                                            title="Change text color">
                                            <span class="color-icon">
                                                <i class="fas fa-palette"></i>
                                            </span>
                                            <span class="color-bar" id="currentColorBar"></span>
                                        </button>
                                        <input type="color" id="textColorPicker" value="#111111">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- RIGHT CONTROLS --}}
                        <div class="pdf-toolbar-right">
                            {{-- ZOOM --}}
                            <div class="pdf-zoom-control">
                                <span class="pdf-zoom-label">
                                    <i class="fas fa-search"></i>
                                    Zoom
                                </span>
                                <div class="pdf-zoom-buttons">
                                    <button type="button" class="pdf-tool-btn" id="zoomOutBtn" title="Zoom out">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span id="zoomValue" class="zoom-value">
                                        100%
                                    </span>
                                    <button type="button" class="pdf-tool-btn" id="zoomInBtn" title="Zoom in">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- DOWNLOAD --}}
                            <button type="button" class="pdf-download-btn" id="downloadPdfBtn">
                                <span class="download-icon">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span>
                                    Download PDF
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- QUICK HELP --}}
                    <div class="pdf-toolbar-help">
                        <div>
                            <i class="fas fa-info-circle"></i>
                            <span>
                                Click any text to edit it directly
                            </span>
                        </div>
                        <div class="pdf-help-items">
                            <span>
                                <kbd>Ctrl</kbd> + <kbd>Z</kbd>
                                Undo
                            </span>
                            <span>
                                <kbd>Ctrl</kbd> + <kbd>C</kbd>
                                Copy
                            </span>
                            <span>
                                <kbd>Ctrl</kbd> + <kbd>V</kbd>
                                Paste
                            </span>
                            <span>
                                <kbd>Ctrl</kbd> + <kbd>S</kbd>
                                Download
                            </span>
                        </div>
                    </div>
                </div>
                {{-- =================================================
                    EDITOR WORKSPACE
                ================================================== --}}
                <div class="pdf-workspace">
                    {{-- PAGE SIDEBAR --}}
                    <aside class="pdf-sidebar">
                        <div class="pdf-sidebar-header">
                            <div class="sidebar-title">
                                <span class="sidebar-title-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                                <div>
                                    <strong>Pages</strong>
                                    <small>PDF document</small>
                                </div>
                            </div>
                        </div>
                        <div id="pdfThumbnails" class="pdf-thumbnails-list">
                        </div>
                    </aside>
                    {{-- MAIN EDITOR --}}
                    <div class="pdf-main-area">
                        {{-- INFO BAR --}}
                        <div class="pdf-info-bar">
                            <div class="pdf-editor-status">
                                <span class="status-icon">
                                    <i class="fas fa-mouse-pointer"></i>
                                </span>
                                <div>
                                    <span class="status-label">
                                        Editing
                                    </span>
                                    <span id="editorStatus">
                                        Click any PDF text to edit
                                    </span>
                                </div>
                            </div>
                            <div class="pdf-editor-tip">
                                <i class="fas fa-lightbulb"></i>
                                <span>
                                    Select text to change its font, size,
                                    style or color
                                </span>
                            </div>
                        </div>
                        {{-- PDF PAGES --}}
                        <div id="pdfPagesContainer" class="pdf-pages-container">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- =========================================================
            LOADER
        ========================================================== --}}
        <div id="pdfLoadingOverlay" class="pdf-loading-overlay d-none">
            <div class="pdf-loader-box">
                <div class="pdf-loader-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="spinner-border text-primary mb-3" role="status">
                </div>
                <div id="pdfLoadingText" class="text-white">
                    Preparing PDF...
                </div>
                <div class="pdf-loader-subtitle">
                    Please wait while your PDF is being prepared
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    {{-- PDF.JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    {{-- PDF-LIB --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <style>
        /* =========================================================
                   EDITOR MAIN
                ========================================================== */
        #pdfEditorSection {
            background:
                radial-gradient(circle at 50% 0%,
                    rgba(13, 110, 253, .08),
                    transparent 38%),
                #050505;
            min-height: calc(100vh - 70px);
            padding-top: 4px;
        }

        /* =========================================================
                   TOOLBAR
                ========================================================== */
        .pdf-editor-toolbar {
            position: sticky;
            top: 70px;
            z-index: 100;
            background: rgba(14, 14, 14, .96);
            border: 1px solid #292929;
            border-radius: 16px;
            padding: 14px;
            margin: 15px 0;
            box-shadow:
                0 15px 45px rgba(0, 0, 0, .42),
                0 0 0 1px rgba(255, 255, 255, .015);
            backdrop-filter: blur(14px);
        }

        .pdf-toolbar-top {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 15px;
        }

        .pdf-toolbar-left {
            display: flex;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 10px;
            min-width: 0;
        }

        .pdf-toolbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .pdf-toolbar-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .pdf-group-label {
            color: #686868;
            font-size: 9px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: .7px;
            text-transform: uppercase;
            padding-left: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .pdf-group-label i {
            color: #0d6efd;
            font-size: 9px;
        }

        .pdf-button-row {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .toolbar-divider {
            width: 1px;
            height: 55px;
            background: linear-gradient(to bottom,
                    transparent,
                    #353535,
                    transparent);
            display: inline-block;
            margin: 0 2px;
        }

        /* =========================================================
                   TOOL BUTTONS
                ========================================================== */
        .pdf-tool-btn,
        .pdf-format-btn,
        .pdf-color-btn {
            height: 38px;
            min-width: 38px;
            border: 1px solid #303030;
            background: #181818;
            color: #cfcfcf;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition:
                background .18s ease,
                border-color .18s ease,
                color .18s ease,
                transform .18s ease,
                box-shadow .18s ease;
            cursor: pointer;
            font-size: 13px;
        }

        .pdf-tool-btn span {
            font-size: 12px;
            font-weight: 600;
        }

        .pdf-tool-btn:hover,
        .pdf-format-btn:hover,
        .pdf-color-btn:hover {
            background: #202020;
            border-color: #0d6efd;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, .12);
        }

        .pdf-tool-btn:active,
        .pdf-format-btn:active,
        .pdf-color-btn:active {
            transform: translateY(0);
        }

        .pdf-tool-btn:disabled {
            opacity: .32;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .pdf-tool-btn.active,
        .pdf-format-btn.active {
            background: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 5px 18px rgba(13, 110, 253, .25);
        }

        .pdf-add-text-btn {
            padding: 0 13px;
            background: rgba(13, 110, 253, .12);
            color: #65a8ff;
            border-color: rgba(13, 110, 253, .38);
        }

        .pdf-add-text-btn:hover {
            background: #0d6efd;
            color: #fff;
        }

        .danger-tool {
            padding: 0 12px;
        }

        .danger-tool:hover {
            background: #dc3545 !important;
            border-color: #dc3545 !important;
            color: #fff !important;
            box-shadow: 0 5px 18px rgba(220, 53, 69, .2);
        }

        /* =========================================================
                   FONT / SIZE CONTROLS
                ========================================================== */
        .pdf-control-box {
            height: 38px;
            min-width: 190px;
            background: #181818;
            border: 1px solid #303030;
            border-radius: 9px;
            display: flex;
            align-items: center;
            overflow: hidden;
            transition: .2s;
        }

        .pdf-control-box:hover {
            border-color: #454545;
        }

        .pdf-control-icon {
            width: 34px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0d6efd;
            background: rgba(13, 110, 253, .06);
            border-right: 1px solid #2b2b2b;
            font-size: 11px;
        }

        .pdf-control-content {
            display: flex;
            align-items: center;
            height: 100%;
            flex: 1;
        }

        .pdf-control-content>span {
            color: #666;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 700;
            padding: 0 8px;
            white-space: nowrap;
        }

        .pdf-select {
            height: 36px;
            min-width: 118px;
            flex: 1;
            background: #181818;
            color: #eee;
            border: 0;
            padding: 0 25px 0 4px;
            outline: none;
            font-size: 12px;
            cursor: pointer;
        }

        .pdf-select:focus {
            box-shadow: none;
        }

        .pdf-select option {
            background: #171717;
            color: #fff;
        }

        .pdf-size-box {
            min-width: 105px;
        }

        .pdf-size-box .pdf-select {
            min-width: 48px;
        }

        /* =========================================================
                   COLOR
                ========================================================== */
        .color-picker-wrapper {
            position: relative;
        }

        .pdf-color-btn {
            width: 42px;
            padding: 5px;
            flex-direction: column;
            gap: 2px;
            background: #181818;
        }

        .color-icon {
            font-size: 12px;
            line-height: 12px;
            color: #ddd;
        }

        .color-bar {
            width: 24px;
            height: 4px;
            border-radius: 10px;
            background: #111;
            display: block;
            box-shadow: 0 0 0 1px rgba(255, 255, 255, .12);
        }

        #textColorPicker {
            position: absolute;
            opacity: 0;
            width: 1px;
            height: 1px;
            pointer-events: none;
        }

        /* =========================================================
                   ZOOM
                ========================================================== */
        .pdf-zoom-control {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .pdf-zoom-label {
            color: #686868;
            font-size: 9px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: .7px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .pdf-zoom-label i {
            color: #0d6efd;
        }

        .pdf-zoom-buttons {
            display: flex;
            align-items: center;
            gap: 4px;
            height: 38px;
            background: #151515;
            border: 1px solid #303030;
            border-radius: 9px;
            padding: 0 4px;
        }

        .pdf-zoom-buttons .pdf-tool-btn {
            border: 0;
            background: transparent;
            box-shadow: none;
            height: 30px;
            min-width: 30px;
            border-radius: 6px;
        }

        .pdf-zoom-buttons .pdf-tool-btn:hover {
            background: #252525;
        }

        .zoom-value {
            color: #e4e4e4;
            font-size: 11px;
            min-width: 43px;
            text-align: center;
            font-weight: 700;
        }

        /* =========================================================
                   DOWNLOAD
                ========================================================== */
        .pdf-download-btn {
            height: 42px;
            border: 0;
            border-radius: 10px;
            padding: 0 15px;
            background: linear-gradient(135deg,
                    #0d6efd,
                    #075bd8);
            color: #fff;
            font-weight: 700;
            font-size: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            cursor: pointer;
            box-shadow:
                0 7px 22px rgba(13, 110, 253, .25);
            transition: .2s;
            white-space: nowrap;
        }

        .pdf-download-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 10px 28px rgba(13, 110, 253, .35);
        }

        .pdf-download-btn:active {
            transform: translateY(0);
        }

        .pdf-download-btn:disabled {
            opacity: .6;
            cursor: not-allowed;
            transform: none;
        }

        .download-icon {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .14);
        }

        /* =========================================================
                   TOOLBAR HELP
                ========================================================== */
        .pdf-toolbar-help {
            margin-top: 12px;
            padding: 8px 10px;
            border-top: 1px solid #252525;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            color: #666;
            font-size: 10px;
        }

        .pdf-toolbar-help>div:first-child {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pdf-toolbar-help>div:first-child i {
            color: #0d6efd;
        }

        .pdf-help-items {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .pdf-help-items span {
            white-space: nowrap;
        }

        kbd {
            background: #202020;
            border: 1px solid #373737;
            border-bottom-color: #444;
            border-radius: 4px;
            padding: 2px 5px;
            color: #aaa;
            font-size: 9px;
            font-family: inherit;
        }

        /* =========================================================
                   WORKSPACE
                ========================================================== */
        .pdf-workspace {
            display: flex;
            background: #0a0a0a;
            border: 1px solid #242424;
            border-radius: 16px;
            overflow: hidden;
            min-height: 75vh;
            box-shadow:
                0 18px 55px rgba(0, 0, 0, .35);
        }

        /* =========================================================
                   SIDEBAR
                ========================================================== */
        .pdf-sidebar {
            width: 185px;
            min-width: 185px;
            background:
                linear-gradient(180deg,
                    #111,
                    #0c0c0c);
            border-right: 1px solid #252525;
            display: flex;
            flex-direction: column;
        }

        .pdf-sidebar-header {
            padding: 15px 14px 13px;
            border-bottom: 1px solid #252525;
            background: #111;
        }

        .sidebar-title {
            color: #ddd;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .sidebar-title strong {
            display: block;
            color: #ddd;
            font-size: 12px;
            line-height: 1.2;
        }

        .sidebar-title small {
            display: block;
            color: #555;
            font-size: 9px;
            font-weight: 500;
            margin-top: 2px;
        }

        .sidebar-title-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(13, 110, 253, .12);
            border: 1px solid rgba(13, 110, 253, .25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #4e9aff;
        }

        .pdf-thumbnails-list {
            flex: 1;
            padding: 13px 11px;
            overflow-y: auto;
        }

        .pdf-thumbnails-list::-webkit-scrollbar,
        .pdf-pages-container::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-track,
        .pdf-pages-container::-webkit-scrollbar-track {
            background: #0b0b0b;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-thumb,
        .pdf-pages-container::-webkit-scrollbar-thumb {
            background: #303030;
            border-radius: 10px;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-thumb:hover,
        .pdf-pages-container::-webkit-scrollbar-thumb:hover {
            background: #0d6efd;
        }

        .pdf-thumbnail {
            position: relative;
            background: #171717;
            border: 2px solid transparent;
            border-radius: 10px;
            padding: 6px;
            margin-bottom: 10px;
            cursor: pointer;
            transition:
                border-color .18s ease,
                background .18s ease,
                transform .18s ease,
                box-shadow .18s ease;
        }

        .pdf-thumbnail:hover {
            background: #1d1d1d;
            border-color: #315f9e;
            transform: translateY(-1px);
        }

        .pdf-thumbnail.active {
            background: #171d27;
            border-color: #0d6efd;
            box-shadow:
                0 0 0 2px rgba(13, 110, 253, .12),
                0 7px 20px rgba(0, 0, 0, .25);
        }

        .pdf-thumbnail canvas {
            display: block;
            width: 100%;
            height: auto;
            background: white;
            border-radius: 5px;
        }

        .pdf-thumb-number {
            color: #686868;
            font-size: 9px;
            font-weight: 600;
            text-align: center;
            margin-top: 6px;
        }

        .pdf-thumbnail.active .pdf-thumb-number {
            color: #62a5ff;
        }

        /* =========================================================
                   MAIN AREA
                ========================================================== */
        .pdf-main-area {
            flex: 1;
            min-width: 0;
            background:
                radial-gradient(circle at 50% 0%,
                    #202020 0,
                    #171717 45%,
                    #141414 100%);
            display: flex;
            flex-direction: column;
            /* ---- SCROLL FIX: constrain height & hide overflow ---- */
            max-height: 80vh;
            /* editor bounded so inner scroll appears */
            overflow: hidden;
            /* keep rounded corners clean */
        }

        /* =========================================================
                   INFO BAR
                ========================================================== */
        .pdf-info-bar {
            min-height: 50px;
            border-bottom: 1px solid #292929;
            background: rgba(14, 14, 14, .88);
            color: #aaa;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            font-size: 11px;
            flex-shrink: 0;
            /* prevent shrinking */
        }

        .pdf-editor-status {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0;
        }

        .status-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(13, 110, 253, .1);
            border: 1px solid rgba(13, 110, 253, .2);
            color: #4e9aff;
            flex-shrink: 0;
        }

        .pdf-editor-status>div {
            min-width: 0;
        }

        .status-label {
            color: #555;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: .7px;
            font-weight: 700;
            display: block;
            line-height: 1;
            margin-bottom: 3px;
        }

        #editorStatus {
            color: #bbb;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pdf-editor-tip {
            color: #666;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .pdf-editor-tip i {
            color: #e3a93f;
        }

        /* =========================================================
                   PDF PAGES  (SCROLLABLE)
                ========================================================== */
        .pdf-pages-container {
            flex: 1;
            padding: 34px;
            overflow: auto;
            /* <-- THE SCROLL */
            min-height: 0;
            /* flexbox overflow fix */
            background:
                radial-gradient(circle at center,
                    rgba(255, 255, 255, .025),
                    transparent 45%);
            scrollbar-width: thin;
            scrollbar-color: #3a3a3a #0b0b0b;
        }

        /* custom webkit scrollbar for the pages container */
        .pdf-pages-container::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .pdf-pages-container::-webkit-scrollbar-track {
            background: #0b0b0b;
            border-radius: 4px;
        }

        .pdf-pages-container::-webkit-scrollbar-thumb {
            background: #303030;
            border-radius: 10px;
            border: 1px solid #1f1f1f;
        }

        .pdf-pages-container::-webkit-scrollbar-thumb:hover {
            background: #0d6efd;
        }

        .pdf-page-wrapper {
            position: relative;
            background: #fff;
            margin: 0 auto 38px;
            box-shadow:
                0 16px 45px rgba(0, 0, 0, .5),
                0 3px 8px rgba(0, 0, 0, .2);
            transform-origin: top center;
            transition: box-shadow .2s ease;
        }

        .pdf-page-wrapper:hover {
            box-shadow:
                0 20px 55px rgba(0, 0, 0, .55),
                0 0 0 1px rgba(255, 255, 255, .08);
        }

        .pdf-page-canvas {
            display: block;
            position: absolute;
            inset: 0;
        }

        .pdf-text-layer {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        /* =========================================================
                   EDITABLE TEXT
                ========================================================== */
        .pdf-editable-text {
            position: absolute;
            display: block;
            margin: 0;
            padding: 0;
            border: 0;
            outline: none;
            background: transparent;
            white-space: pre-wrap;
            word-break: normal;
            overflow: visible;
            pointer-events: auto;
            cursor: text;
            line-height: 1.15;
            min-width: 3px;
            z-index: 10;
            transition:
                background .12s ease,
                outline-color .12s ease;
        }

        .pdf-editable-text:hover {
            background: rgba(13, 110, 253, .045);
        }

        .pdf-editable-text:focus {
            background: rgba(13, 110, 253, .065);
            outline: 1px solid rgba(13, 110, 253, .4);
            outline-offset: 2px;
        }

        .pdf-text-mask {
            position: absolute;
            background: white;
            z-index: 5;
            pointer-events: none;
        }

        /* =========================================================
                   ADDED TEXT
                ========================================================== */
        .pdf-added-text {
            border: 1px dashed rgba(13, 110, 253, .75);
            background: rgba(255, 255, 255, .92);
            cursor: move;
            resize: both;
            overflow: auto;
            min-width: 80px;
            min-height: 28px;
            z-index: 30;
            padding: 5px 7px !important;
            box-shadow:
                0 5px 18px rgba(13, 110, 253, .08);
        }

        .pdf-added-text:hover {
            border-color: #0d6efd;
            background: rgba(255, 255, 255, .96);
        }

        .pdf-added-text:focus {
            border: 1px solid #0d6efd;
            box-shadow:
                0 0 0 3px rgba(13, 110, 253, .12);
            cursor: text;
        }

        .pdf-added-handle {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #0d6efd;
            right: -4px;
            bottom: -4px;
            pointer-events: none;
        }

        .pdf-selection-highlight {
            outline: 2px solid rgba(13, 110, 253, .7) !important;
            outline-offset: 2px;
        }

        /* =========================================================
                   LOADER
                ========================================================== */
        .pdf-loading-overlay {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: rgba(0, 0, 0, .86);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
        }

        .pdf-loading-overlay:not(.d-none) {
            display: flex;
        }

        .pdf-loader-box {
            background:
                linear-gradient(145deg,
                    #181818,
                    #101010);
            border: 1px solid #303030;
            border-radius: 17px;
            padding: 30px 40px;
            min-width: 290px;
            text-align: center;
            box-shadow:
                0 25px 80px rgba(0, 0, 0, .55);
        }

        .pdf-loader-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(13, 110, 253, .1);
            border: 1px solid rgba(13, 110, 253, .25);
            color: #0d6efd;
            font-size: 20px;
        }

        .pdf-loader-box .spinner-border {
            width: 22px;
            height: 22px;
            border-width: 2px;
        }

        .pdf-loader-subtitle {
            color: #555;
            font-size: 10px;
            margin-top: 7px;
        }

        /* =========================================================
                   RESPONSIVE
                ========================================================== */
        @media(max-width: 1200px) {
            .pdf-toolbar-top {
                align-items: stretch;
                flex-direction: column;
            }

            .pdf-toolbar-left {
                width: 100%;
            }

            .pdf-toolbar-right {
                width: 100%;
                justify-content: flex-end;
            }

            .pdf-toolbar-left .toolbar-divider {
                height: 45px;
            }
        }

        @media(max-width: 992px) {
            .pdf-sidebar {
                width: 145px;
                min-width: 145px;
            }

            .pdf-pages-container {
                padding: 25px 18px;
            }

            .pdf-editor-toolbar {
                top: 65px;
            }

            .pdf-control-box {
                min-width: 170px;
            }

            .pdf-toolbar-help {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media(max-width: 768px) {
            .pdf-editor-toolbar {
                border-radius: 12px;
                padding: 10px;
            }

            .pdf-toolbar-left {
                gap: 7px;
            }

            .pdf-toolbar-right {
                justify-content: space-between;
            }

            .pdf-toolbar-help {
                display: none;
            }

            .pdf-sidebar {
                display: none;
            }

            .pdf-workspace {
                border-radius: 12px;
            }

            .pdf-info-bar {
                padding: 8px 10px;
            }

            .pdf-editor-tip {
                display: none;
            }

            .pdf-pages-container {
                padding: 18px 8px;
            }

            .pdf-toolbar-left .toolbar-divider {
                display: none;
            }

            .pdf-group-label {
                display: none;
            }

            .pdf-toolbar-group {
                align-self: center;
            }

            .pdf-tool-btn span {
                display: none;
            }

            .pdf-add-text-btn span,
            .danger-tool span {
                display: inline;
            }

            .pdf-control-box {
                min-width: 145px;
            }

            .pdf-size-box {
                min-width: 90px;
            }
        }

        @media(max-width: 520px) {
            .pdf-toolbar-right {
                flex-wrap: wrap;
            }

            .pdf-zoom-control {
                flex: 1;
            }

            .pdf-download-btn {
                flex: 1;
                min-width: 145px;
            }

            .pdf-control-box {
                min-width: 135px;
            }

            .pdf-control-content>span {
                display: none;
            }

            .pdf-select {
                min-width: 85px;
            }

            .pdf-size-box {
                min-width: 75px;
            }

            .pdf-format-btn,
            .pdf-tool-btn {
                height: 36px;
                min-width: 36px;
            }
        }
    </style>
    <script>
        $(function() {
            /* =====================================================
               PDF.JS
            ====================================================== */
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
            const {
                PDFDocument,
                StandardFonts,
                rgb
            } = PDFLib;
            /* =====================================================
               GLOBAL STATE
            ====================================================== */
            let pdfDocument = null;
            let originalPdfBytes = null;
            let originalFileName = 'document.pdf';
            let pages = [];
            let selectedTextId = null;
            let selectedElement = null;
            let zoom = 1;
            let history = [];
            let historyIndex = -1;
            let historyTimer = null;
            let isRendering = false;
            /* =====================================================
               HELPERS
            ====================================================== */
            function showLoading(text) {
                $('#pdfLoadingText').text(text || 'Preparing PDF...');
                $('#pdfLoadingOverlay').removeClass('d-none');
            }

            function hideLoading() {
                $('#pdfLoadingOverlay').addClass('d-none');
            }

            function uid(prefix = 'text') {
                return prefix + '_' +
                    Date.now().toString(36) +
                    '_' +
                    Math.random().toString(36).substring(2, 8);
            }

            function escapeHtml(value) {
                return $('<div>')
                    .text(value || '')
                    .html();
            }

            function getPlainText(element) {
                return $(element)
                    .text()
                    .replace(/\u00a0/g, ' ')
                    .replace(/\r/g, '')
                    .trimEnd();
            }

            function hexToRgb(hex) {
                hex = String(hex || '#111111')
                    .replace('#', '');
                if (hex.length === 3) {
                    hex = hex.split('')
                        .map(x => x + x)
                        .join('');
                }
                return {
                    r: parseInt(hex.substring(0, 2), 16) / 255,
                    g: parseInt(hex.substring(2, 4), 16) / 255,
                    b: parseInt(hex.substring(4, 6), 16) / 255
                };
            }

            function rgbToHex(color) {
                if (!color) {
                    return '#111111';
                }
                const r = Math.max(
                    0,
                    Math.min(255, Math.round(color.r * 255))
                );
                const g = Math.max(
                    0,
                    Math.min(255, Math.round(color.g * 255))
                );
                const b = Math.max(
                    0,
                    Math.min(255, Math.round(color.b * 255))
                );
                return '#' + [r, g, b]
                    .map(x => x.toString(16).padStart(2, '0'))
                    .join('');
            }

            function normalizeColor(color) {
                if (!color) {
                    return '#111111';
                }
                if (typeof color === 'string') {
                    return color;
                }
                if (color.startsWith) {
                    return color;
                }
                return '#111111';
            }
            /* =====================================================
               HISTORY
            ====================================================== */
            function createSnapshot() {
                return JSON.stringify(pages);
            }

            function restoreSnapshot(snapshot) {
                try {
                    pages = JSON.parse(snapshot);
                    selectedTextId = null;
                    selectedElement = null;
                    renderAllPages();
                } catch (error) {
                    console.error(error);
                }
            }

            function saveHistory() {
                clearTimeout(historyTimer);
                historyTimer = setTimeout(function() {
                    const snapshot = createSnapshot();
                    if (
                        history.length &&
                        history[historyIndex] === snapshot
                    ) {
                        return;
                    }
                    history =
                        history.slice(0, historyIndex + 1);
                    history.push(snapshot);
                    historyIndex = history.length - 1;
                    if (history.length > 80) {
                        history.shift();
                        historyIndex--;
                    }
                    updateHistoryButtons();
                }, 300);
            }

            function saveHistoryImmediately() {
                clearTimeout(historyTimer);
                const snapshot = createSnapshot();
                if (
                    history.length &&
                    history[historyIndex] === snapshot
                ) {
                    return;
                }
                history =
                    history.slice(0, historyIndex + 1);
                history.push(snapshot);
                historyIndex = history.length - 1;
                updateHistoryButtons();
            }

            function updateHistoryButtons() {
                $('#undoBtn').prop(
                    'disabled',
                    historyIndex <= 0
                );
                $('#redoBtn').prop(
                    'disabled',
                    historyIndex >= history.length - 1
                );
            }
            /* =====================================================
               FILE UPLOAD
            ====================================================== */
            $('#pdfFileInput').on('change', function() {
                const file = this.files[0];
                if (file) {
                    loadPdf(file);
                }
            });
            $('#uploadArea').on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('border-primary');
            });
            $('#uploadArea').on('dragleave', function() {
                $(this).removeClass('border-primary');
            });
            $('#uploadArea').on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('border-primary');
                const file =
                    e.originalEvent.dataTransfer.files[0];
                if (
                    file &&
                    (
                        file.type === 'application/pdf' ||
                        file.name.toLowerCase().endsWith('.pdf')
                    )
                ) {
                    loadPdf(file);
                } else {
                    alert('Please select a PDF file.');
                }
            });
            async function loadPdf(file) {
                if (file.size > 50 * 1024 * 1024) {
                    alert('Maximum PDF size is 50MB.');
                    return;
                }
                try {
                    showLoading('Reading PDF...');
                    originalFileName = file.name;
                    const fileBuffer =
                        await file.arrayBuffer();
                    originalPdfBytes =
                        new Uint8Array(fileBuffer.slice(0));
                    const pdfJsBytes =
                        new Uint8Array(
                            originalPdfBytes.slice(0)
                        );
                    pdfDocument =
                        await pdfjsLib.getDocument({
                            data: pdfJsBytes
                        }).promise;
                    pages = [];
                    for (
                        let pageNumber = 1; pageNumber <= pdfDocument.numPages; pageNumber++
                    ) {
                        $('#pdfLoadingText').text(
                            `Reading page ${pageNumber} of ${pdfDocument.numPages}...`
                        );
                        const page =
                            await pdfDocument.getPage(pageNumber);
                        const viewport =
                            page.getViewport({
                                scale: 1
                            });
                        const textContent =
                            await page.getTextContent();
                        const pageData = {
                            id: uid('page'),
                            pageNumber,
                            width: viewport.width,
                            height: viewport.height,
                            rotation: viewport.rotation || 0,
                            texts: []
                        };
                        textContent.items.forEach(function(item, index) {
                            if (!item.str) {
                                return;
                            }
                            const transform = item.transform || [];
                            const fontSize =
                                Math.max(
                                    5,
                                    Math.abs(transform[3] || transform[0] || 12)
                                );
                            const x =
                                Number(transform[4] || 0);
                            const y =
                                pageData.height -
                                Number(transform[5] || 0) -
                                fontSize;
                            const width =
                                Math.max(
                                    Number(item.width || 0),
                                    3
                                );
                            const height =
                                Math.max(
                                    Number(item.height || fontSize),
                                    fontSize * 1.15
                                );
                            pageData.texts.push({
                                id: uid('text'),
                                pageId: pageData.id,
                                sourceText: item.str,
                                originalText: item.str,
                                text: item.str,
                                x,
                                y,
                                width,
                                height,
                                fontSize,
                                fontFamily: 'Helvetica',
                                color: '#111111',
                                bold: false,
                                italic: false,
                                underline: false,
                                deleted: false,
                                added: false,
                                changed: false
                            });
                        });
                        pages.push(pageData);
                    }
                    $('#pdfUploadSection')
                        .addClass('d-none');
                    $('#pdfEditorSection')
                        .removeClass('d-none');
                    history = [];
                    historyIndex = -1;
                    saveHistoryImmediately();
                    await renderAllPages();
                    hideLoading();
                    $('#editorStatus').text(
                        'PDF loaded — click any text to edit'
                    );
                } catch (error) {
                    console.error(error);
                    hideLoading();
                    alert(
                        'Unable to open this PDF.\n\n' +
                        (error.message || error)
                    );
                }
            }
            /* =====================================================
               RENDER ALL
            ====================================================== */
            async function renderAllPages() {
                if (!pdfDocument || isRendering) {
                    return;
                }
                isRendering = true;
                $('#pdfPagesContainer').empty();
                $('#pdfThumbnails').empty();
                for (const pageData of pages) {
                    await renderPage(pageData);
                }
                isRendering = false;
            }
            async function renderPage(pageData) {
                const page =
                    await pdfDocument.getPage(
                        pageData.pageNumber
                    );
                const viewport =
                    page.getViewport({
                        scale: zoom
                    });
                const wrapper =
                    $('<div class="pdf-page-wrapper"></div>')
                    .attr('data-page-id', pageData.id)
                    .css({
                        width: viewport.width + 'px',
                        height: viewport.height + 'px'
                    });
                const canvas =
                    $('<canvas class="pdf-page-canvas"></canvas>');
                canvas.attr('width', viewport.width);
                canvas.attr('height', viewport.height);
                canvas.css({
                    width: viewport.width + 'px',
                    height: viewport.height + 'px'
                });
                const textLayer =
                    $('<div class="pdf-text-layer"></div>');
                wrapper.append(canvas);
                wrapper.append(textLayer);
                $('#pdfPagesContainer')
                    .append(wrapper);
                const context =
                    canvas[0].getContext('2d', {
                        alpha: false
                    });
                await page.render({
                    canvasContext: context,
                    viewport: viewport
                }).promise;
                renderTextElements(
                    pageData,
                    textLayer,
                    viewport
                );
                createThumbnail(
                    pageData,
                    page
                );
            }
            /* =====================================================
               RENDER TEXT
            ====================================================== */
            function renderTextElements(
                pageData,
                layer,
                viewport
            ) {
                pageData.texts.forEach(function(text) {
                    if (text.deleted) {
                        return;
                    }
                    const scale =
                        zoom;
                    const left =
                        text.x * scale;
                    const top =
                        text.y * scale;
                    const width =
                        Math.max(
                            text.width * scale,
                            4
                        );
                    const height =
                        Math.max(
                            text.height * scale,
                            text.fontSize * scale * 1.15
                        );
                    /*
                     * Every original PDF text gets a mask.
                     * This prevents the PDF.js canvas text from
                     * appearing underneath the editable HTML text.
                     */
                    if (!text.added) {
                        const mask =
                            $('<div class="pdf-text-mask"></div>');
                        mask.css({
                            left: left + 'px',
                            top: top + 'px',
                            width: Math.max(
                                width + 5,
                                5
                            ) + 'px',
                            height: Math.max(
                                height + 4,
                                5
                            ) + 'px'
                        });
                        layer.append(mask);
                    }
                    const editor =
                        $('<div></div>');
                    editor
                        .addClass('pdf-editable-text')
                        .attr('contenteditable', 'true')
                        .attr('spellcheck', 'false')
                        .attr('data-text-id', text.id)
                        .html(
                            escapeHtml(text.text)
                            .replace(/\n/g, '<br>')
                        );
                    let fontFamily =
                        text.fontFamily ||
                        'Helvetica';
                    editor.css({
                        left: left + 'px',
                        top: top + 'px',
                        minWidth: Math.max(width, 3) + 'px',
                        minHeight: Math.max(height, 5) + 'px',
                        fontSize: (text.fontSize * scale) + 'px',
                        fontFamily: fontFamily === 'Times-Roman' ?
                            'Times New Roman' : fontFamily,
                        fontWeight: text.bold ?
                            '700' : '400',
                        fontStyle: text.italic ?
                            'italic' : 'normal',
                        textDecoration: text.underline ?
                            'underline' : 'none',
                        color: text.color || '#111111'
                    });
                    if (text.added) {
                        editor.addClass(
                            'pdf-added-text'
                        );
                        editor.css({
                            minWidth: Math.max(width, 120) + 'px',
                            minHeight: Math.max(height, 35) + 'px'
                        });
                    }
                    editor.on('mousedown', function() {
                        selectText(text.id, this);
                    });
                    editor.on('focus', function() {
                        selectText(text.id, this);
                    });
                    editor.on('input', function() {
                        const current =
                            findText(text.id);
                        if (!current) {
                            return;
                        }
                        current.text =
                            getPlainText(this);
                        current.changed =
                            current.text !==
                            current.originalText;
                        if (current.added) {
                            current.width =
                                Math.max(
                                    $(this).outerWidth() / zoom,
                                    80
                                );
                            current.height =
                                Math.max(
                                    $(this).outerHeight() / zoom,
                                    25
                                );
                        }
                        saveHistory();
                    });
                    editor.on('paste', function(e) {
                        e.preventDefault();
                        const clipboard =
                            e.originalEvent.clipboardData;
                        if (!clipboard) {
                            return;
                        }
                        const textData =
                            clipboard.getData(
                                'text/plain'
                            );
                        insertPlainText(
                            textData
                        );
                    });
                    editor.on('keydown', function(e) {
                        if (
                            (e.ctrlKey || e.metaKey) &&
                            e.key.toLowerCase() === 'z'
                        ) {
                            e.preventDefault();
                            undo();
                            return;
                        }
                        if (
                            (e.ctrlKey || e.metaKey) &&
                            (
                                e.key.toLowerCase() === 'y' ||
                                (
                                    e.shiftKey &&
                                    e.key.toLowerCase() === 'z'
                                )
                            )
                        ) {
                            e.preventDefault();
                            redo();
                            return;
                        }
                        if (
                            e.key === 'Escape' &&
                            text.added
                        ) {
                            selectText(
                                text.id,
                                this
                            );
                        }
                    });
                    if (text.added) {
                        enableDrag(
                            editor,
                            text,
                            pageData,
                            layer
                        );
                    }
                    layer.append(editor);
                });
            }
            /* =====================================================
               SELECT TEXT
            ====================================================== */
            function selectText(
                textId,
                element
            ) {
                if (
                    selectedElement &&
                    selectedElement !== element
                ) {
                    $(selectedElement)
                        .removeClass(
                            'pdf-selection-highlight'
                        );
                }
                selectedTextId = textId;
                selectedElement = element;
                $(element)
                    .addClass(
                        'pdf-selection-highlight'
                    );
                const text =
                    findText(textId);
                if (!text) {
                    return;
                }
                updateToolbarFromText(text);
                $('#editorStatus').text(
                    text.added ?
                    'Added text selected — drag it to move' :
                    'Text selected — type to edit'
                );
            }

            function findText(textId) {
                for (const page of pages) {
                    const found =
                        page.texts.find(
                            t => t.id === textId
                        );
                    if (found) {
                        return found;
                    }
                }
                return null;
            }

            function getSelectedText() {
                if (!selectedTextId) {
                    return null;
                }
                return findText(selectedTextId);
            }
            /* =====================================================
               TOOLBAR STATE
            ====================================================== */
            function updateToolbarFromText(text) {
                if (!text) {
                    return;
                }
                $('#fontFamilySelect')
                    .val(text.fontFamily || 'Helvetica');
                $('#fontSizeSelect')
                    .val(
                        Math.round(
                            text.fontSize || 12
                        )
                    );
                $('#boldBtn')
                    .toggleClass(
                        'active',
                        !!text.bold
                    );
                $('#italicBtn')
                    .toggleClass(
                        'active',
                        !!text.italic
                    );
                $('#underlineBtn')
                    .toggleClass(
                        'active',
                        !!text.underline
                    );
                const color =
                    text.color || '#111111';
                $('#currentColorBar')
                    .css('background', color);
                $('#textColorPicker')
                    .val(
                        /^#[0-9a-f]{6}$/i.test(color) ?
                        color :
                        '#111111'
                    );
            }
            /* =====================================================
               FONT FAMILY
            ====================================================== */
            $('#fontFamilySelect').on(
                'change',
                function() {
                    const text =
                        getSelectedText();
                    if (!text) {
                        return;
                    }
                    text.fontFamily =
                        $(this).val();
                    text.changed = true;
                    saveHistoryImmediately();
                    renderAllPages();
                }
            );
            /* =====================================================
               FONT SIZE
            ====================================================== */
            $('#fontSizeSelect').on(
                'change',
                function() {
                    const text =
                        getSelectedText();
                    if (!text) {
                        return;
                    }
                    text.fontSize =
                        parseFloat(
                            $(this).val()
                        );
                    text.changed = true;
                    saveHistoryImmediately();
                    renderAllPages();
                }
            );
            /* =====================================================
               BOLD / ITALIC / UNDERLINE
            ====================================================== */
            $('.pdf-format-btn').on(
                'click',
                function() {
                    const text =
                        getSelectedText();
                    if (!text) {
                        return;
                    }
                    const format =
                        $(this).data('format');
                    if (format === 'bold') {
                        text.bold = !text.bold;
                    }
                    if (format === 'italic') {
                        text.italic = !text.italic;
                    }
                    if (format === 'underline') {
                        text.underline = !text.underline;
                    }
                    text.changed = true;
                    saveHistoryImmediately();
                    renderAllPages();
                }
            );
            /* =====================================================
               COLOR
            ====================================================== */
            $('#textColorButton').on(
                'click',
                function() {
                    $('#textColorPicker')[0].click();
                }
            );
            $('#textColorPicker').on(
                'input change',
                function() {
                    const color =
                        $(this).val();
                    $('#currentColorBar')
                        .css(
                            'background',
                            color
                        );
                    const text =
                        getSelectedText();
                    if (!text) {
                        return;
                    }
                    text.color = color;
                    text.changed = true;
                    saveHistory();
                    if (selectedElement) {
                        $(selectedElement)
                            .css(
                                'color',
                                color
                            );
                    }
                }
            );
            /* =====================================================
               ADD TEXT
            ====================================================== */
            $('#addTextBtn').on(
                'click',
                function() {
                    const pageData =
                        getCurrentPageForAddingText();
                    if (!pageData) {
                        return;
                    }
                    const newText = {
                        id: uid('added'),
                        pageId: pageData.id,
                        sourceText: '',
                        originalText: '',
                        text: 'Type here',
                        x: Math.max(
                            30 / zoom,
                            20
                        ),
                        y: Math.max(
                            50 / zoom,
                            20
                        ),
                        width: 150,
                        height: 35,
                        fontSize: 16,
                        fontFamily: $('#fontFamilySelect').val() ||
                            'Helvetica',
                        color: $('#textColorPicker').val() ||
                            '#111111',
                        bold: false,
                        italic: false,
                        underline: false,
                        deleted: false,
                        added: true,
                        changed: true
                    };
                    pageData.texts.push(
                        newText
                    );
                    saveHistoryImmediately();
                    renderAllPages();
                    setTimeout(function() {
                        const el =
                            $(
                                '[data-text-id="' +
                                newText.id +
                                '"]'
                            )[0];
                        if (el) {
                            selectText(
                                newText.id,
                                el
                            );
                            $(el).focus();
                            placeCaretAtEnd(
                                el
                            );
                        }
                    }, 100);
                }
            );

            function getCurrentPageForAddingText() {
                if (selectedTextId) {
                    const selected =
                        findText(
                            selectedTextId
                        );
                    if (selected) {
                        return pages.find(
                            p =>
                            p.id ===
                            selected.pageId
                        );
                    }
                }
                return pages[0] || null;
            }

            function placeCaretAtEnd(element) {
                try {
                    const range =
                        document.createRange();
                    const selection =
                        window.getSelection();
                    range.selectNodeContents(
                        element
                    );
                    range.collapse(false);
                    selection.removeAllRanges();
                    selection.addRange(range);
                } catch (e) {
                    console.warn(e);
                }
            }
            /* =====================================================
               DRAG ADDED TEXT
            ====================================================== */
            function enableDrag(
                editor,
                text,
                pageData,
                layer
            ) {
                let dragging = false;
                let startX = 0;
                let startY = 0;
                let originalX = 0;
                let originalY = 0;
                editor.on(
                    'mousedown',
                    function(e) {
                        if (
                            e.target === this &&
                            (
                                window.getSelection()
                                .toString()
                                .length > 0
                            )
                        ) {
                            return;
                        }
                        if (
                            e.offsetX < 8 ||
                            e.offsetY < 8 ||
                            e.offsetX >
                            $(this).outerWidth() - 8 ||
                            e.offsetY >
                            $(this).outerHeight() - 8 ||
                            e.shiftKey
                        ) {
                            e.preventDefault();
                            dragging = true;
                            startX =
                                e.clientX;
                            startY =
                                e.clientY;
                            originalX =
                                text.x;
                            originalY =
                                text.y;
                            selectText(
                                text.id,
                                this
                            );
                            $(document).on(
                                'mousemove.pdfDrag',
                                function(moveEvent) {
                                    if (!dragging) {
                                        return;
                                    }
                                    const dx =
                                        (
                                            moveEvent.clientX -
                                            startX
                                        ) / zoom;
                                    const dy =
                                        (
                                            moveEvent.clientY -
                                            startY
                                        ) / zoom;
                                    text.x =
                                        Math.max(
                                            0,
                                            originalX + dx
                                        );
                                    text.y =
                                        Math.max(
                                            0,
                                            originalY + dy
                                        );
                                    editor.css({
                                        left: text.x *
                                            zoom,
                                        top: text.y *
                                            zoom
                                    });
                                }
                            );
                            $(document).on(
                                'mouseup.pdfDrag',
                                function() {
                                    if (!dragging) {
                                        return;
                                    }
                                    dragging = false;
                                    $(document)
                                        .off(
                                            '.pdfDrag'
                                        );
                                    saveHistoryImmediately();
                                }
                            );
                        }
                    }
                );
            }
            /* =====================================================
               DELETE TEXT
            ====================================================== */
            $('#deleteTextBtn').on(
                'click',
                function() {
                    const text =
                        getSelectedText();
                    if (!text) {
                        alert(
                            'Please select some text first.'
                        );
                        return;
                    }
                    if (text.added) {
                        const page =
                            pages.find(
                                p =>
                                p.id ===
                                text.pageId
                            );
                        if (page) {
                            page.texts =
                                page.texts.filter(
                                    t =>
                                    t.id !==
                                    text.id
                                );
                        }
                    } else {
                        text.text = '';
                        text.deleted = true;
                        text.changed = true;
                    }
                    selectedTextId = null;
                    selectedElement = null;
                    saveHistoryImmediately();
                    renderAllPages();
                    $('#editorStatus').text(
                        'Text deleted'
                    );
                }
            );
            /* =====================================================
               PLAIN TEXT INSERT
            ====================================================== */
            function insertPlainText(value) {
                if (!selectedElement) {
                    return;
                }
                const selection =
                    window.getSelection();
                if (!selection.rangeCount) {
                    selectedElement.innerText +=
                        value;
                    return;
                }
                const range =
                    selection.getRangeAt(0);
                range.deleteContents();
                const textNode =
                    document.createTextNode(
                        value
                    );
                range.insertNode(
                    textNode
                );
                range.setStartAfter(
                    textNode
                );
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
                $(selectedElement)
                    .trigger('input');
            }
            /* =====================================================
               UNDO
            ====================================================== */
            $('#undoBtn').on(
                'click',
                function() {
                    undo();
                }
            );

            function undo() {
                clearTimeout(historyTimer);
                if (historyIndex <= 0) {
                    return;
                }
                historyIndex--;
                restoreSnapshot(
                    history[historyIndex]
                );
                updateHistoryButtons();
            }
            /* =====================================================
               REDO
            ====================================================== */
            $('#redoBtn').on(
                'click',
                function() {
                    redo();
                }
            );

            function redo() {
                clearTimeout(historyTimer);
                if (
                    historyIndex >=
                    history.length - 1
                ) {
                    return;
                }
                historyIndex++;
                restoreSnapshot(
                    history[historyIndex]
                );
                updateHistoryButtons();
            }
            /* =====================================================
               ZOOM
            ====================================================== */
            $('#zoomInBtn').on(
                'click',
                async function() {
                    if (zoom >= 2) {
                        return;
                    }
                    zoom =
                        Math.min(
                            2,
                            zoom + .1
                        );
                    updateZoom();
                    await renderAllPages();
                }
            );
            $('#zoomOutBtn').on(
                'click',
                async function() {
                    if (zoom <= .5) {
                        return;
                    }
                    zoom =
                        Math.max(
                            .5,
                            zoom - .1
                        );
                    updateZoom();
                    await renderAllPages();
                }
            );

            function updateZoom() {
                $('#zoomValue').text(
                    Math.round(zoom * 100) + '%'
                );
            }
            /* =====================================================
               THUMBNAILS
            ====================================================== */
            async function createThumbnail(
                pageData,
                page
            ) {
                const thumbViewport =
                    page.getViewport({
                        scale: .18
                    });
                const wrapper =
                    $('<div class="pdf-thumbnail"></div>')
                    .attr(
                        'data-page-id',
                        pageData.id
                    );
                const canvas =
                    $('<canvas></canvas>');
                canvas.attr(
                    'width',
                    thumbViewport.width
                );
                canvas.attr(
                    'height',
                    thumbViewport.height
                );
                wrapper.append(canvas);
                wrapper.append(
                    $('<div class="pdf-thumb-number"></div>')
                    .text(
                        'Page ' +
                        pageData.pageNumber
                    )
                );
                $('#pdfThumbnails')
                    .append(wrapper);
                await page.render({
                    canvasContext: canvas[0]
                        .getContext('2d'),
                    viewport: thumbViewport
                }).promise;
                wrapper.on(
                    'click',
                    function() {
                        const target =
                            $(
                                '[data-page-id="' +
                                pageData.id +
                                '"]'
                            );
                        if (!target.length) {
                            return;
                        }
                        $('.pdf-thumbnail')
                            .removeClass(
                                'active'
                            );
                        $(this)
                            .addClass(
                                'active'
                            );
                        const container =
                            $('#pdfPagesContainer')[0];
                        container.scrollTo({
                            top: target[0].offsetTop -
                                20,
                            behavior: 'smooth'
                        });
                    }
                );
            }
            /* =====================================================
               KEYBOARD SHORTCUTS
            ====================================================== */
            $(document).on(
                'keydown',
                function(e) {
                    if (
                        !(e.ctrlKey || e.metaKey)
                    ) {
                        return;
                    }
                    const key =
                        e.key.toLowerCase();
                    if (
                        key === 's'
                    ) {
                        e.preventDefault();
                        $('#downloadPdfBtn')
                            .trigger('click');
                    }
                }
            );
            /* =====================================================
               SAFE PDF TEXT
            ====================================================== */
            function safePdfText(value) {
                return String(value || '')
                    .replace(
                        /[\u0000-\u0008\u000B\u000C\u000E-\u001F\u007F]/g,
                        ''
                    )
                    .replace(
                        /[\u200B-\u200D\uFEFF]/g,
                        '');
            }

            function safeStandardFontText(value) {
                return safePdfText(value)
                    .split('')
                    .filter(function(char) {
                        const code =
                            char.charCodeAt(0);
                        return (
                            code >= 32 &&
                            code <= 255
                        );
                    })
                    .join('');
            }
            /* =====================================================
               PDF EXPORT
            ====================================================== */
            $('#downloadPdfBtn').on(
                'click',
                async function() {
                    if (!originalPdfBytes) {
                        alert(
                            'Please upload a PDF first.'
                        );
                        return;
                    }
                    const button =
                        $(this);
                    button.prop(
                        'disabled',
                        true
                    );
                    showLoading(
                        'Creating your edited PDF...'
                    );
                    try {
                        const exportBytes =
                            new Uint8Array(
                                originalPdfBytes.length
                            );
                        exportBytes.set(
                            originalPdfBytes
                        );
                        const pdfDoc =
                            await PDFDocument.load(
                                exportBytes, {
                                    ignoreEncryption: true,
                                    updateMetadata: false
                                }
                            );
                        const fonts = {
                            Helvetica: await pdfDoc.embedFont(
                                StandardFonts.Helvetica
                            ),
                            HelveticaBold: await pdfDoc.embedFont(
                                StandardFonts.HelveticaBold
                            ),
                            HelveticaOblique: await pdfDoc.embedFont(
                                StandardFonts.HelveticaOblique
                            ),
                            HelveticaBoldOblique: await pdfDoc.embedFont(
                                StandardFonts.HelveticaBoldOblique
                            ),
                            TimesRoman: await pdfDoc.embedFont(
                                StandardFonts.TimesRoman
                            ),
                            TimesRomanBold: await pdfDoc.embedFont(
                                StandardFonts.TimesRomanBold
                            ),
                            Courier: await pdfDoc.embedFont(
                                StandardFonts.Courier
                            )
                        };
                        for (
                            let pageIndex = 0; pageIndex < pages.length; pageIndex++
                        ) {
                            $('#pdfLoadingText').text(
                                `Writing page ${pageIndex + 1} of ${pages.length}...`
                            );
                            const pageData =
                                pages[pageIndex];
                            const pdfPage =
                                pdfDoc.getPage(
                                    pageIndex
                                );
                            const pageWidth =
                                pdfPage.getWidth();
                            const pageHeight =
                                pdfPage.getHeight();
                            const scaleX =
                                pageWidth /
                                pageData.width;
                            const scaleY =
                                pageHeight /
                                pageData.height;
                            for (
                                const text of pageData.texts
                            ) {
                                if (
                                    text.deleted &&
                                    !text.added
                                ) {
                                    drawMask(
                                        pdfPage,
                                        text,
                                        scaleX,
                                        scaleY,
                                        pageHeight
                                    );
                                    continue;
                                }
                                if (
                                    !text.added &&
                                    text.text ===
                                    text.originalText &&
                                    !text.changed
                                ) {
                                    continue;
                                }
                                if (!text.added) {
                                    drawMask(
                                        pdfPage,
                                        text,
                                        scaleX,
                                        scaleY,
                                        pageHeight
                                    );
                                }
                                const cleanText =
                                    safeStandardFontText(
                                        text.text
                                    );
                                if (!cleanText) {
                                    continue;
                                }
                                const font =
                                    choosePdfFont(
                                        fonts,
                                        text
                                    );
                                const fontSize =
                                    Math.max(
                                        5,
                                        (
                                            text.fontSize ||
                                            12
                                        ) * scaleY
                                    );
                                const color =
                                    hexToRgb(
                                        text.color ||
                                        '#111111'
                                    );
                                const x =
                                    text.x *
                                    scaleX;
                                let y =
                                    pageHeight -
                                    (
                                        (
                                            text.y +
                                            (
                                                text.fontSize ||
                                                12
                                            )
                                        ) *
                                        scaleY
                                    );
                                const lines =
                                    cleanText
                                    .split(/\r?\n/);
                                const lineHeight =
                                    fontSize *
                                    1.2;
                                for (
                                    let lineIndex = 0; lineIndex < lines.length; lineIndex++
                                ) {
                                    const line =
                                        lines[lineIndex];
                                    if (!line) {
                                        continue;
                                    }
                                    try {
                                        pdfPage.drawText(
                                            line, {
                                                x,
                                                y: y -
                                                    (
                                                        lineIndex *
                                                        lineHeight
                                                    ),
                                                size: fontSize,
                                                font,
                                                color: rgb(
                                                    color.r,
                                                    color.g,
                                                    color.b
                                                ),
                                                opacity: 1
                                            }
                                        );
                                    } catch (drawError) {
                                        console.warn(
                                            'Text drawing failed:',
                                            drawError
                                        );
                                        const fallback =
                                            line
                                            .split('')
                                            .filter(
                                                c =>
                                                c.charCodeAt(0) >= 32 &&
                                                c.charCodeAt(0) <= 255
                                            )
                                            .join('');
                                        if (fallback) {
                                            pdfPage.drawText(
                                                fallback, {
                                                    x,
                                                    y: y -
                                                        (
                                                            lineIndex *
                                                            lineHeight
                                                        ),
                                                    size: fontSize,
                                                    font,
                                                    color: rgb(
                                                        color.r,
                                                        color.g,
                                                        color.b
                                                    )
                                                }
                                            );
                                        }
                                    }
                                }
                                if (
                                    text.underline
                                ) {
                                    const firstLine =
                                        safeStandardFontText(
                                            text.text
                                        ).split(/\r?\n/)[0];
                                    if (firstLine) {
                                        let textWidth = 0;
                                        try {
                                            textWidth =
                                                font.widthOfTextAtSize(
                                                    firstLine,
                                                    fontSize
                                                );
                                        } catch (e) {
                                            textWidth =
                                                text.width *
                                                scaleX;
                                        }
                                        pdfPage.drawLine({
                                            start: {
                                                x,
                                                y: y -
                                                    2
                                            },
                                            end: {
                                                x: x +
                                                    textWidth,
                                                y: y -
                                                    2
                                            },
                                            thickness: Math.max(
                                                0.5,
                                                fontSize *
                                                .05
                                            ),
                                            color: rgb(
                                                color.r,
                                                color.g,
                                                color.b
                                            )
                                        });
                                    }
                                }
                            }
                        }
                        $('#pdfLoadingText').text(
                            'Finalizing PDF...'
                        );
                        const finalBytes =
                            await pdfDoc.save({
                                useObjectStreams: false
                            });
                        const downloadBytes =
                            new Uint8Array(
                                finalBytes.length
                            );
                        downloadBytes.set(
                            finalBytes
                        );
                        const blob =
                            new Blob(
                                [downloadBytes], {
                                    type: 'application/pdf'
                                }
                            );
                        const url =
                            URL.createObjectURL(
                                blob
                            );
                        const link =
                            document.createElement(
                                'a'
                            );
                        link.href = url;
                        link.download =
                            originalFileName
                            .replace(
                                /\.pdf$/i,
                                ''
                            ) +
                            '-edited.pdf';
                        document.body.appendChild(
                            link
                        );
                        link.click();
                        link.remove();
                        setTimeout(function() {
                            URL.revokeObjectURL(
                                url
                            );
                        }, 2000);
                        hideLoading();
                        button.prop(
                            'disabled',
                            false
                        );
                        $('#editorStatus').text(
                            'PDF downloaded successfully'
                        );
                    } catch (error) {
                        console.error(
                            'PDF EXPORT ERROR:',
                            error
                        );
                        hideLoading();
                        button.prop(
                            'disabled',
                            false
                        );
                        alert(
                            'Unable to create the edited PDF.\n\n' +
                            (
                                error &&
                                error.message ?
                                error.message :
                                error
                            )
                        );
                    }
                }
            );
            /* =====================================================
               WHITE MASK
            ====================================================== */
            function drawMask(
                pdfPage,
                text,
                scaleX,
                scaleY,
                pageHeight
            ) {
                const x =
                    text.x *
                    scaleX;
                const width =
                    Math.max(
                        text.width *
                        scaleX +
                        4,
                        4
                    );
                const height =
                    Math.max(
                        text.height *
                        scaleY +
                        4,
                        5
                    );
                const y =
                    pageHeight -
                    (
                        (
                            text.y +
                            text.height
                        ) *
                        scaleY
                    );
                pdfPage.drawRectangle({
                    x,
                    y,
                    width,
                    height,
                    color: rgb(
                        1,
                        1,
                        1
                    ),
                    opacity: 1
                });
            }
            /* =====================================================
               PDF FONT
            ====================================================== */
            function choosePdfFont(
                fonts,
                text
            ) {
                if (
                    text.fontFamily ===
                    'Times-Roman'
                ) {
                    return text.bold ?
                        fonts.TimesRomanBold :
                        fonts.TimesRoman;
                }
                if (
                    text.fontFamily ===
                    'Courier'
                ) {
                    return fonts.Courier;
                }
                if (
                    text.bold &&
                    text.italic
                ) {
                    return fonts.HelveticaBoldOblique;
                }
                if (text.bold) {
                    return fonts.HelveticaBold;
                }
                if (text.italic) {
                    return fonts.HelveticaOblique;
                }
                return fonts.Helvetica;
            }
            /* =====================================================
               INITIAL BUTTON STATE
            ====================================================== */
            updateHistoryButtons();
        });
    </script>
@endsection
