@extends('components.app')
@section('meta')
    <title>FREE PDF Editor: Edit PDF Online FREE | XConvertifire</title>
    <meta name="description"
        content="Edit PDF files online for FREE with XConvertifire. Add, edit, or delete text, undo changes, and download your updated PDF quickly and securely.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="FREE PDF Editor: Edit PDF Online FREE | XConvertifire">
    <meta property="og:description"
        content="Edit PDF files online for FREE with XConvertifire. Add, edit, or delete text, undo changes, and download your updated PDF quickly and securely.">
    <meta property="og:url" content="{{ route('pdf.editor') }}">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire PDF Editor">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="FREE PDF Editor: Edit PDF Online FREE | XConvertifire">
    <meta name="twitter:description"
        content="Edit PDF files online for FREE with XConvertifire. Add, edit, or delete text, undo changes, and download your updated PDF quickly and securely.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
@endsection
@section('content')
    <main class="bg-black" style="margin-top:90px;">
        {{-- =========================================================
            FIRST SECTION
            KEEPING YOUR EXISTING DESIGN
        ========================================================== --}}
        <section class="crop-hero-section" id="pdfUploadSection">
              <section class="mb-5">
            <div class="container">
                <div class="crop-breadcrumb">
                    <a href="{{ route('home') }}" class="text-decoration-none">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <i class="fas fa-chevron-right mx-2"></i>
                    <span>PDF Editor</span>
                </div>
            </div>
        </section>

            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-file-pdf me-2"></i>
                        PDF Tool
                    </div>
                    <h1>
                        Edit PDF Text
                        <br>
                        <span>Online for Free</span>
                    </h1>
                    <p>
                        Edit selectable text, add text boxes, apply available formatting,
                        and download an updated copy. Results depend on the PDF's text and layout.
                    </p>
                </div>
                <div class="crop-upload-box mx-auto cursor-pointer" id="uploadArea"
                    onclick="document.getElementById('pdfFileInput').click()">
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
                                {{-- <i class="fas fa-lightbulb"></i>
                                <span>
                                    Select text to change its font, size,
                                    style or color
                                </span> --}}
                                <a href="{{ url()->current() }}" class="btn btn-sm btn-outline-primary"
                                    onclick="return confirm('Upload a new PDF? Your current edits will be lost.');">
                                    <i class="fas fa-file-upload me-1"></i>
                                    Upload New PDF
                                </a>
                            </div>
                        </div>
                        {{-- PDF PAGES --}}
                        <div id="pdfPagesContainer" class="pdf-pages-container">
                        </div>
                    </div>

                    {{-- =================================================
                        EDITOR TOOLBAR (RIGHT SIDE)
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
                                        <button type="button" class="pdf-format-btn" data-format="italic"
                                            id="italicBtn" title="Italic">
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
        <section class="pdf-editor-seo-section">
            <div class="container">
                <div class="pdf-editor-seo-wrap">
                    <h2>Free Online PDF Editor</h2>
                    <p>An online PDF editor helps you make focused text changes without first rebuilding a document in another application. XConvertifire lets you edit PDF online by selecting text the page can extract, adding new text boxes, applying the available formatting controls, and downloading an updated PDF.</p>
                    <p>This free PDF editor online works with extractable text and new text overlays on a rendered view of each page. It is useful for small corrections, labels, or notes, but it is not a complete document reconstruction system. What you can change depends on how a PDF was created and how its content is encoded.</p>

                    <h2>How to Edit a PDF Online</h2>
                    <p>Use the upload area and editor controls to make changes, then inspect the result before saving it.</p>
                    <div class="row g-3 pdf-editor-seo-steps">
                        <div class="col-md-6">
                            <article class="pdf-editor-seo-step">
                                <h3>1. Upload Your PDF</h3>
                                <p>Choose a PDF from your device or drag it into the upload area. Files up to 50 MB are accepted. The page loads the document into its editor and displays its pages for review. A password-protected, damaged, unusually structured, or otherwise unsupported file may not load as expected.</p>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pdf-editor-seo-step">
                                <h3>2. Select or Add Text</h3>
                                <p>Click text that the editor can identify to work with an existing text element. To add content that is not already on the page, choose <strong>Add Text</strong> to create a new text box. A scanned page is an image, so its printed words are not selectable text in this editor.</p>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pdf-editor-seo-step">
                                <h3>3. Adjust Your Changes</h3>
                                <p>Use the font, size, color, bold, italic, and underline controls for supported text. Position added text with the editor's existing controls. Check alignment, line breaks, and nearby content as you work, because replacement text may not fit the same space as the original.</p>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <article class="pdf-editor-seo-step">
                                <h3>4. Download the Edited PDF</h3>
                                <p>Review the edited pages in the workspace, including pages you did not change, before choosing <strong>Download PDF</strong>. Open the downloaded file in a PDF reader and inspect it again. For more extensive text editing, you may find it useful to <a href="{{ route('pdf.to.word') }}">convert a PDF to Word</a>, then use <a href="{{ route('word.pdf.index') }}">Word to PDF</a> when you are ready to export.</p>
                            </article>
                        </div>
                    </div>

                    <h2>Edit Existing PDF Text</h2>
                    <p>When the editor can extract text from a PDF page, selecting a text element lets you change its content and apply the available formatting. The page is rendered as a visual reference, while editable text elements are reconstructed over that rendered view for interaction and export. This process does not fully reconstruct the PDF's original text structure or every relationship between its text, fonts, and layout.</p>
                    <p>PDFs vary in how they store text. A file may use unusual character mappings, embedded fonts, separate glyphs, or layout instructions that make extraction incomplete. In those cases, some words may not be selectable, or a change may not align exactly with the original. If the selected text does not behave as expected, keep the source file and avoid relying on the edited copy without a careful review.</p>

                    <h2>Add New Text to a PDF</h2>
                    <p>The <strong>Add Text</strong> control creates a text box that can be used for a short label, a note, or additional information. Enter the wording, then position the new text using the editor's existing controls. Use a concise amount of text and check its placement against the page content, since a new box may overlap other material or extend beyond the intended area.</p>
                    <p>New text is not the same as changing the PDF's underlying page design. This editor provides text editing and text-box overlays; it does not offer general-purpose insertion of images, signatures, shapes, or other objects. If your document needs those kinds of changes, choose an application designed for that work.</p>

                    <h2>Change PDF Text Fonts, Sizes and Colors</h2>
                    <p>For a selected or added text element, the toolbar provides font selection, font-size choices, and a text-color control. Bold, italic, and underline options are also available. These controls can help make a small correction or added note clearer, but they do not guarantee that the edited text will look identical to the original PDF.</p>
                    <p>The available output fonts may differ from fonts embedded in the source document. A replacement font can have different character widths and shapes, which may change line breaks or spacing. Preview each change at a useful zoom level, and check the exported page because the final appearance can differ from the editing view.</p>

                    <h2>Undo, Redo and Navigate PDF Pages</h2>
                    <p>Use Undo and Redo to move through supported editing actions. The zoom controls help you inspect small text and page details, while the page thumbnails provide previews for moving through a multi-page document. These are navigation and review aids, not controls for rearranging or rebuilding the pages.</p>
                    <p>Before downloading, revisit pages with edits and scan the remaining pages for unexpected display issues. Undo or redo a change if needed, then inspect the downloaded PDF separately. Keeping the original gives you a way back if an edit or export does not meet your needs.</p>

                    <h2>PDF Text Editing vs Scanned Documents</h2>
                    <p>A PDF with extractable text contains characters the editor can identify and select. A scanned PDF often contains a page-sized image instead. Although both files may look like pages of text, selecting and changing text requires the content to be available as text rather than only as pixels.</p>
                    <p>This editor does not provide optical character recognition (OCR). It cannot turn words embedded in a scanned image into editable text by itself. If a scan needs text recognition, first use a suitable OCR tool to create a text-enabled PDF, then check the recognized text for errors before editing it here.</p>

                    <h2>Understanding PDF Text Removal and Redaction</h2>
                    <p>The <strong>Delete Text</strong> control can visually remove a selected text element in the edited view. For changed or deleted text, export may place a white mask over the original content and draw replacement text where applicable. A white mask changes what is visible on the page; it does not necessarily remove the original text or other underlying PDF data.</p>
                    <p><strong>Do not rely on this editor to securely redact passwords, identity numbers, financial details, or other confidential information.</strong> Visually covering text is not secure redaction, and underlying content may remain recoverable. For sensitive material, use a suitable redaction tool that actually removes the underlying information and provides a way to verify that the removal is complete. When appropriate, obtain qualified guidance before sharing the document.</p>

                    <h2>How to Preserve PDF Formatting When Editing</h2>
                    <p>PDFs can contain carefully positioned text, embedded fonts, and complex page layouts. Editing one text element does not rebuild the entire composition. Replacement text may use a different font, wrap onto another line, or shift relative to nearby content. The available export fonts may not include the original embedded font, and unsupported characters may be omitted during export.</p>
                    <p>Non-Latin scripts, including Urdu and Arabic, and complex text shaping may be limited by the current export process. Do not assume full Unicode support. Test important characters on a copy, download the result, and inspect every page in a PDF reader before using or sharing it.</p>

                    <h2>Tips for Editing PDF Documents Online</h2>
                    <ul>
                        <li>Start with a PDF that contains selectable text for edits to existing wording.</li>
                        <li>Keep an unchanged copy of the original before you make edits.</li>
                        <li>Choose a suitable font size and check line breaks and spacing near each change.</li>
                        <li>Review every edited page and open the downloaded PDF in a separate reader.</li>
                        <li>Test special characters on a copy before relying on them in the final document.</li>
                        <li>Do not use visual text masking for confidential or security-sensitive redaction.</li>
                    </ul>

                    <h2>Frequently Asked Questions About PDF Editing</h2>
                    <div class="pdf-editor-seo-faq">
                        <article>
                            <h3>Is XConvertifire's PDF Editor free?</h3>
                            <p>The editor is presented as a free online tool. Upload limits and document compatibility still apply, and you should review the result before relying on it.</p>
                        </article>
                        <article>
                            <h3>Can I edit PDF text online?</h3>
                            <p>You can edit text that the editor can extract, add text boxes, apply available formatting, and download an updated PDF. Not every PDF stores its text in a form that can be edited accurately.</p>
                        </article>
                        <article>
                            <h3>How do I add new text to a PDF?</h3>
                            <p>Upload the PDF, choose <strong>Add Text</strong>, enter your content, position the new text box with the existing controls, and review the page before downloading.</p>
                        </article>
                        <article>
                            <h3>Can I change the font or color of PDF text?</h3>
                            <p>The toolbar includes font, size, color, bold, italic, and underline controls for supported text. Available fonts may not match the source PDF's embedded fonts, so exact visual matching is not guaranteed.</p>
                        </article>
                        <article>
                            <h3>Can I delete text from a PDF?</h3>
                            <p>The Delete Text control can visually remove selected text in the edited output. It should not be treated as secure removal of the underlying PDF content.</p>
                        </article>
                        <article>
                            <h3>Does deleting text permanently remove it from the PDF?</h3>
                            <p>Not necessarily. The export may cover original content with a white mask, which can leave underlying information in the PDF. Do not use this method as secure redaction.</p>
                        </article>
                        <article>
                            <h3>Can I securely redact confidential information?</h3>
                            <p>No. Use a dedicated redaction tool that removes sensitive data from the underlying document and lets you verify the result. Do not rely on this editor to redact confidential information.</p>
                        </article>
                        <article>
                            <h3>Can I edit a scanned PDF?</h3>
                            <p>This editor does not include OCR. Text that appears only inside a scanned page image is not selectable for editing here. Use an OCR tool first if you need recognized text, then check its accuracy.</p>
                        </article>
                        <article>
                            <h3>What is the maximum PDF upload size?</h3>
                            <p>The upload interface lists a maximum file size of 50 MB.</p>
                        </article>
                        <article>
                            <h3>Can I undo and redo edits?</h3>
                            <p>Yes. The editor has Undo and Redo controls for supported editing actions. Review the page after undoing or reapplying a change.</p>
                        </article>
                        <article>
                            <h3>Does the editor support multi-page PDFs?</h3>
                            <p>The editor displays PDF page previews and thumbnails for navigating the document. How a particular file loads can depend on its structure and compatibility.</p>
                        </article>
                        <article>
                            <h3>Will the original PDF formatting be preserved?</h3>
                            <p>Exact preservation is not guaranteed. Different fonts, text widths, line wrapping, complex layouts, or export limitations can change the appearance. Inspect the downloaded file page by page.</p>
                        </article>
                        <article>
                            <h3>Can I edit Urdu or other non-Latin text?</h3>
                            <p>Support is not guaranteed. The current export process may omit unsupported characters or fail to handle complex text shaping. Test a copy and verify the downloaded result before depending on it.</p>
                        </article>
                        <article>
                            <h3>How do I download an edited PDF?</h3>
                            <p>Review the pages in the editor, then select <strong>Download PDF</strong>. Open the downloaded file in a PDF reader and check that the content and layout are as expected.</p>
                        </article>
                        <article>
                            <h3>Is PDF editing performed in the browser?</h3>
                            <p>This page renders and edits the selected document through browser-loaded PDF.js and pdf-lib libraries. Their project pages explain <a href="https://mozilla.github.io/pdf.js/" target="_blank" rel="noopener noreferrer">PDF.js rendering</a> and <a href="https://pdf-lib.js.org/" target="_blank" rel="noopener noreferrer">PDF document creation and modification</a>. This description is not a privacy or security guarantee; consider the document's sensitivity before uploading it.</p>
                        </article>
                    </div>

                    <div class="pdf-editor-seo-final">
                        <h2>Edit Your PDF Online for Free</h2>
                        <p>Upload your PDF, update selectable text, add new text and download your edited document with XConvertifire.</p>
                        <a href="#pdfUploadSection" class="pdf-editor-seo-cta" id="pdfEditorSeoCta">Edit Your PDF Now</a>
                    </div>
                </div>
            </div>
        </section>
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
                       TOOLBAR (RIGHT SIDE)
                    ========================================================== */
        .pdf-editor-toolbar {
            width: 330px;
            min-width: 330px;
            flex-shrink: 0;
            background: linear-gradient(180deg, #111, #0c0c0c);
            border-left: 1px solid #292929;
            padding: 14px 12px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .pdf-editor-toolbar .pdf-toolbar-top {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .pdf-editor-toolbar .pdf-toolbar-left,
        .pdf-editor-toolbar .pdf-toolbar-right {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            width: 100%;
            gap: 10px;
        }

        .pdf-editor-toolbar .pdf-toolbar-group {
            width: 100%;
        }

        .pdf-editor-toolbar .pdf-button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pdf-editor-toolbar .pdf-control-box {
            width: 100%;
            min-width: 0;
        }

        .pdf-editor-toolbar .pdf-select {
            width: 100%;
        }

        .pdf-editor-toolbar .toolbar-divider {
            width: 100%;
            height: 1px;
            margin: 4px 0;
            background: linear-gradient(to right, transparent, #353535, transparent);
        }

        .pdf-editor-toolbar .pdf-toolbar-help {
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }

        .pdf-editor-toolbar .pdf-help-items {
            flex-wrap: wrap;
            gap: 8px;
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
            flex-shrink: 0;
        }

        .pdf-control-content {
            display: flex;
            align-items: center;
            height: 100%;
            flex: 1;
            min-width: 0;
        }

        .pdf-control-content>span {
            color: #666;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 700;
            padding: 0 8px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .pdf-select {
            height: 36px;
            min-width: 60px;
            flex: 1;
            background: #181818;
            color: #eee;
            border: 0;
            padding: 0 20px 0 4px;
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
            flex-shrink: 0;
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
            height: calc(100vh - 100px);
            min-height: 600px;
            margin-top: 20px;
            box-shadow:
                0 18px 55px rgba(0, 0, 0, .35);
        }

        /* =========================================================
                       SIDEBAR (smaller)
                    ========================================================== */
        .pdf-sidebar {
            width: 130px;
            min-width: 130px;
            background:
                linear-gradient(180deg,
                    #111,
                    #0c0c0c);
            border-right: 1px solid #252525;
            display: flex;
            flex-direction: column;
        }

        .pdf-sidebar-header {
            padding: 12px 10px 10px;
            border-bottom: 1px solid #252525;
            background: #111;
        }

        .sidebar-title {
            color: #ddd;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sidebar-title strong {
            display: block;
            color: #ddd;
            font-size: 11px;
            line-height: 1.2;
        }

        .sidebar-title small {
            display: block;
            color: #555;
            font-size: 8px;
            font-weight: 500;
            margin-top: 2px;
        }

        .sidebar-title-icon {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            background: rgba(13, 110, 253, .12);
            border: 1px solid rgba(13, 110, 253, .25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #4e9aff;
            font-size: 11px;
            flex-shrink: 0;
        }

        .pdf-thumbnails-list {
            flex: 1;
            padding: 10px 8px;
            overflow-y: auto;
        }

        .pdf-thumbnails-list::-webkit-scrollbar,
        .pdf-pages-container::-webkit-scrollbar,
        .pdf-editor-toolbar::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-track,
        .pdf-pages-container::-webkit-scrollbar-track,
        .pdf-editor-toolbar::-webkit-scrollbar-track {
            background: #0b0b0b;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-thumb,
        .pdf-pages-container::-webkit-scrollbar-thumb,
        .pdf-editor-toolbar::-webkit-scrollbar-thumb {
            background: #303030;
            border-radius: 10px;
        }

        .pdf-thumbnails-list::-webkit-scrollbar-thumb:hover,
        .pdf-pages-container::-webkit-scrollbar-thumb:hover,
        .pdf-editor-toolbar::-webkit-scrollbar-thumb:hover {
            background: #0d6efd;
        }

        .pdf-thumbnail {
            position: relative;
            background: #171717;
            border: 2px solid transparent;
            border-radius: 8px;
            padding: 4px;
            margin-bottom: 8px;
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
            border-radius: 4px;
        }

        .pdf-thumb-number {
            color: #686868;
            font-size: 8px;
            font-weight: 600;
            text-align: center;
            margin-top: 4px;
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
            overflow: hidden;
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
                       PDF PAGES
                    ========================================================== */
        .pdf-pages-container {
            flex: 1;
            padding: 34px;
            overflow: auto;
            min-height: 0;
            background:
                radial-gradient(circle at center,
                    rgba(255, 255, 255, .025),
                    transparent 45%);
            scrollbar-width: thin;
            scrollbar-color: #3a3a3a #0b0b0b;
        }

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

        /* Large tablets / small laptops */
        @media(max-width: 1200px) {
            .pdf-editor-toolbar {
                width: 200px;
                min-width: 200px;
            }

            .pdf-sidebar {
                width: 120px;
                min-width: 120px;
            }
        }

        /* Tablets */
        @media(max-width: 992px) {
            .pdf-sidebar {
                width: 110px;
                min-width: 110px;
            }

            .pdf-editor-toolbar {
                width: 190px;
                min-width: 190px;
            }

            .pdf-pages-container {
                padding: 20px 14px;
            }

            .pdf-workspace {
                height: auto;
                min-height: calc(100vh - 120px);
            }

            .pdf-main-area {
                max-height: calc(100vh - 140px);
            }
        }

        /* Small tablets / large phones: stack into column */
        @media(max-width: 768px) {
            .pdf-workspace {
                flex-direction: column;
                height: auto;
                min-height: 0;
                margin-top: 12px;
                border-radius: 12px;
            }

            .pdf-sidebar {
                display: none;
            }

            .pdf-main-area {
                max-height: 60vh;
            }

            .pdf-editor-toolbar {
                width: 100%;
                min-width: 100%;
                border-left: 0;
                border-top: 1px solid #252525;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: flex-start;
                padding: 10px;
                gap: 8px;
                max-height: none;
                overflow-y: visible;
            }

            .pdf-editor-toolbar .pdf-toolbar-top {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 8px;
            }

            .pdf-editor-toolbar .pdf-toolbar-left,
            .pdf-editor-toolbar .pdf-toolbar-right {
                flex-direction: row;
                flex-wrap: wrap;
                width: auto;
                gap: 6px;
            }

            .pdf-toolbar-group {
                width: auto;
                flex: 0 0 auto;
            }

            .pdf-editor-toolbar .pdf-control-box {
                width: auto;
                min-width: 130px;
            }

            .pdf-editor-toolbar .pdf-select {
                width: auto;
                min-width: 80px;
            }

            .pdf-editor-toolbar .toolbar-divider {
                display: none;
            }

            .pdf-editor-toolbar .pdf-toolbar-help {
                display: none;
            }

            .pdf-download-btn {
                width: auto;
                flex: 1;
                min-width: 130px;
            }

            .pdf-info-bar {
                padding: 8px 10px;
            }

            .pdf-editor-tip {
                display: none;
            }

            .pdf-pages-container {
                padding: 16px 10px;
            }

            .pdf-group-label {
                display: none;
            }

            .pdf-tool-btn span {
                display: none;
            }

            .pdf-add-text-btn span,
            .danger-tool span {
                display: inline;
            }
        }

        /* Phones */
        @media(max-width: 520px) {
            .pdf-workspace {
                margin-top: 8px;
                border-radius: 10px;
            }

            .pdf-editor-toolbar {
                padding: 8px;
                gap: 6px;
            }

            .pdf-editor-toolbar .pdf-control-box {
                min-width: 110px;
            }

            .pdf-editor-toolbar .pdf-select {
                min-width: 60px;
            }

            .pdf-download-btn {
                width: 100%;
                flex: 1 1 100%;
            }

            .pdf-tool-btn,
            .pdf-format-btn {
                height: 34px;
                min-width: 34px;
            }

            .pdf-zoom-buttons {
                padding: 0 2px;
            }

            .zoom-value {
                min-width: 36px;
                font-size: 10px;
            }

            .pdf-info-bar {
                font-size: 10px;
            }

            #editorStatus {
                font-size: 10px;
            }
        }

        .pdf-editor-seo-section {
            background: #050505;
            color: #e5e7eb;
            padding: 64px 0;
        }

        .pdf-editor-seo-wrap {
            max-width: 1100px;
            margin: 0 auto;
        }

        .pdf-editor-seo-wrap > h2 {
            color: #fff;
            font-size: clamp(1.45rem, 2.5vw, 2rem);
            line-height: 1.3;
            margin: 0 0 14px;
        }

        .pdf-editor-seo-wrap > h2:not(:first-child) {
            margin-top: 42px;
        }

        .pdf-editor-seo-wrap p,
        .pdf-editor-seo-wrap li {
            color: #c2c7d0;
            font-size: 1rem;
            line-height: 1.75;
        }

        .pdf-editor-seo-wrap a:not(.pdf-editor-seo-cta) {
            color: #78b7ff;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .pdf-editor-seo-steps {
            margin-top: 8px;
        }

        .pdf-editor-seo-step,
        .pdf-editor-seo-faq article {
            height: 100%;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 12px;
            background: #0c0d10;
            padding: 20px;
        }

        .pdf-editor-seo-step h3,
        .pdf-editor-seo-faq h3 {
            color: #fff;
            font-size: 1.08rem;
            line-height: 1.45;
            margin: 0 0 10px;
        }

        .pdf-editor-seo-step p,
        .pdf-editor-seo-faq p {
            margin: 0;
        }

        .pdf-editor-seo-wrap ul {
            padding-left: 1.25rem;
        }

        .pdf-editor-seo-wrap li + li {
            margin-top: 8px;
        }

        .pdf-editor-seo-faq {
            display: grid;
            gap: 12px;
        }

        .pdf-editor-seo-final {
            margin-top: 46px;
            padding: 30px 24px;
            border: 1px solid rgba(13, 110, 253, .4);
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(13, 110, 253, .13), rgba(12, 13, 16, .96));
            text-align: center;
        }

        .pdf-editor-seo-final h2 {
            color: #fff;
            font-size: clamp(1.4rem, 2.5vw, 1.9rem);
            margin: 0 0 10px;
        }

        .pdf-editor-seo-final p {
            max-width: 680px;
            margin: 0 auto 20px;
        }

        .pdf-editor-seo-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 12px 24px;
            border-radius: 8px;
            background: #0d6efd;
            color: #fff;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
        }

        .pdf-editor-seo-cta:hover,
        .pdf-editor-seo-cta:focus-visible {
            background: #0b5ed7;
            color: #fff;
        }

        @media (max-width: 575.98px) {
            .pdf-editor-seo-section {
                padding: 44px 0;
            }

            .pdf-editor-seo-wrap > h2:not(:first-child) {
                margin-top: 34px;
            }

            .pdf-editor-seo-final {
                padding: 24px 16px;
            }

            .pdf-editor-seo-cta {
                width: 100%;
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
                        'PDF loaded. Click any text to edit'
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
            // async function renderAllPages() {
            //     if (!pdfDocument || isRendering) {
            //         return;
            //     }
            //     isRendering = true;
            //     $('#pdfPagesContainer').empty();
            //     $('#pdfThumbnails').empty();
            //     for (const pageData of pages) {
            //         await renderPage(pageData);
            //     }
            //     isRendering = false;
            // }


                        async function renderAllPages() {
                if (!pdfDocument || isRendering) {
                    return;
                }
                isRendering = true;
                const existing = $('#pdfPagesContainer .pdf-page-wrapper');
                if (existing.length !== pages.length) {
                    $('#pdfPagesContainer').empty();
                    $('#pdfThumbnails').empty();
                    for (const pageData of pages) {
                        await renderPage(pageData);
                    }
                } else {
                    for (const pageData of pages) {
                        const wrapper = $('[data-page-id="' + pageData.id + '"]');
                        if (!wrapper.length) continue;
                        const layer = wrapper.find('.pdf-text-layer');
                        layer.empty();
                        renderTextElements(pageData, layer, {
                            width: pageData.width * zoom,
                            height: pageData.height * zoom
                        });
                    }
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
                    'Added text selected. Drag it to move' :
                    'Text selected. Type to edit'
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
    <script>
        const pdfEditorSeoCta = document.getElementById('pdfEditorSeoCta');

        if (pdfEditorSeoCta) {
            pdfEditorSeoCta.addEventListener('click', function(event) {
                const uploadSection = document.getElementById('pdfUploadSection');
                const editorSection = document.getElementById('pdfEditorSection');
                const isVisible = function(element) {
                    return element &&
                        !element.classList.contains('d-none') &&
                        window.getComputedStyle(element).display !== 'none' &&
                        element.getClientRects().length > 0;
                };
                const target = isVisible(uploadSection) ? uploadSection :
                    (isVisible(editorSection) ? editorSection : null);

                if (!target) {
                    return;
                }

                event.preventDefault();
                const reduceMotion = window.matchMedia(
                    '(prefers-reduced-motion: reduce)'
                ).matches;

                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            });
        }
    </script>
@endsection
