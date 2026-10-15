@extends('components.app')
@section('meta')
    <title>FREE PDF to Word Converter: Convert PDF | XConvertifire</title>
    <meta name="description"
        content="Convert PDF files to editable Word documents for FREE with XConvertifire. Convert single or multiple PDFs to DOCX quickly, accurately, and securely.">
    <meta property="og:title" content="FREE PDF to Word Converter: Convert PDF | XConvertifire">
    <meta property="og:description"
        content="Convert PDF files to editable Word documents for FREE with XConvertifire. Convert single or multiple PDFs to DOCX quickly, accurately, and securely.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('pdf.to.word') }}">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FREE PDF to Word Converter: Convert PDF | XConvertifire">
    <meta name="twitter:description"
        content="Convert PDF files to editable Word documents for FREE with XConvertifire. Convert single or multiple PDFs to DOCX quickly, accurately, and securely.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <meta name="twitter:image:alt" content="XConvertifire logo">
@endsection
@section('content')
    <style>
        .crop-heading .pdf-word-state-heading {
            margin: 0 0 20px;
            font-size: 4.2rem;
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -2px;
            background: linear-gradient(to right, #ffffff, #71717a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .crop-heading .pdf-word-state-heading span {
            background: linear-gradient(90deg, #ffffff, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pdf-word-seo {
            padding: 56px 0 76px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: #d4d4d8;
        }

        .pdf-word-seo .pdf-word-seo-content {
            max-width: 960px;
            margin: 0 auto;
        }

        .pdf-word-seo h2 {
            margin: 40px 0 14px;
            color: #f4f4f5;
            font-size: clamp(1.45rem, 3vw, 2rem);
            font-weight: 750;
            line-height: 1.25;
        }

        .pdf-word-seo h2:first-child {
            margin-top: 0;
        }

        .pdf-word-seo h3 {
            margin: 25px 0 10px;
            color: #e4e4e7;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .pdf-word-seo p,
        .pdf-word-seo li {
            color: #b8b8c0;
            font-size: 1rem;
            line-height: 1.8;
        }

        .pdf-word-seo p {
            margin: 0 0 16px;
        }

        .pdf-word-seo ul,
        .pdf-word-seo ol {
            margin: 0 0 20px;
            padding-left: 1.4rem;
        }

        .pdf-word-seo li {
            margin-bottom: 8px;
            padding-left: 4px;
        }

        .pdf-word-seo a {
            color: #93c5fd;
            text-decoration: underline;
            text-decoration-color: rgba(147, 197, 253, .45);
            text-underline-offset: 3px;
        }

        .pdf-word-seo a:hover {
            color: #bfdbfe;
            text-decoration-color: currentColor;
        }

        .pdf-word-seo .pdf-word-faq {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .pdf-word-seo .pdf-word-faq details {
            padding: 17px 18px;
            border: 1px solid #292929;
            border-radius: 12px;
            background: #111;
        }

        .pdf-word-seo .pdf-word-faq summary {
            color: #f4f4f5;
            font-weight: 650;
            line-height: 1.5;
            cursor: pointer;
        }

        .pdf-word-seo .pdf-word-faq p {
            margin: 12px 0 0;
            font-size: .95rem;
        }

        .pdf-word-seo .pdf-word-cta {
            margin-top: 44px;
            padding: 26px;
            border: 1px solid rgba(59, 130, 246, .35);
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(37, 99, 235, .14), rgba(17, 24, 39, .55));
            text-align: center;
        }

        .pdf-word-seo .pdf-word-cta h2 {
            margin: 0 0 10px;
        }

        .pdf-word-seo .pdf-word-cta-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            margin-top: 8px;
            padding: 0 20px;
            border-radius: 9px;
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .pdf-word-seo .pdf-word-cta-link:hover {
            background: #1d4ed8;
            color: #fff;
        }

        @media (max-width: 991px) {
            .crop-heading .pdf-word-state-heading {
                font-size: 3.2rem;
            }
        }

        @media (max-width: 767px) {
            .crop-heading .pdf-word-state-heading {
                font-size: 2.5rem;
                letter-spacing: -1px;
            }

            .pdf-word-seo {
                padding: 44px 0 56px;
            }
        }

        @media (max-width: 480px) {
            .crop-heading .pdf-word-state-heading {
                font-size: 2.15rem;
            }

            .pdf-word-seo .pdf-word-faq {
                grid-template-columns: 1fr;
            }

            .pdf-word-seo .pdf-word-cta {
                padding: 22px 18px;
            }
        }
    </style>
    <main class="bg-black" style="margin-top:70px;">
        {{-- ============================================================
         HERO / UPLOAD SECTION
         Visible by default (hidden when results exist)
    ============================================================ --}}
        <section class="crop-hero-section {{ session('downloads') ? 'd-none' : '' }}" id="heroSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-file-word me-2"></i>
                        PDF Tool
                    </div>
                    <h1>
                        Convert Your PDFs
                        <br>
                        <span>To Word.</span>
                    </h1>
                    <p>
                        Extract text from PDF files into editable Word documents.
                    </p>
                </div>
                {{-- Hidden form that always exists in the DOM --}}
                <form action="{{ route('pdf.word.convert') }}" method="POST" enctype="multipart/form-data"
                    id="pdfWordForm">
                    @csrf
                    {{-- Upload Box --}}
                    <div class="crop-upload-box mx-auto cursor-pointer" id="uploadArea" onclick="document.getElementById('pdfFile').click()">
                        <div class="crop-upload-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <h4 class="text-white mb-2">
                            Upload your PDF files
                        </h4>
                        <p class="text-secondary mb-4">
                            Drag & drop your PDFs here or choose files
                        </p>
                        <label for="pdfFile" class="crop-upload-btn">
                            <i class="fas fa-upload me-2"></i>
                            Choose PDF Files
                        </label>
                        <input type="file" id="pdfFile" name="pdf[]" class="d-none" accept=".pdf,application/pdf"
                            multiple>
                        <div class="small text-secondary mt-3">
                            PDF files only
                            <br>
                            Maximum file size: 50MB per file
                        </div>
                    </div>
                </form>
            </div>
        </section>
        {{-- ============================================================
         SELECTED FILES SECTION
         Hidden by default (shown only when user picks files)
    ============================================================ --}}
        <section class="crop-hero-section d-none" id="filesSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-list-check me-2"></i>
                        Ready to Convert
                    </div>
                    <h2 class="pdf-word-state-heading">
                        Your PDFs
                        <br>
                        <span>Are Ready.</span>
                    </h2>
                    <p>
                        Review the selected files below, then click
                        <strong>Convert to Word</strong> to start.
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="bg-dark border border-secondary border-opacity-25 rounded-4 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h6 class="text-white mb-1">
                                        Selected PDF Files
                                    </h6>
                                    <small class="text-secondary" id="fileCount"></small>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" id="addMoreFiles" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-plus me-1"></i>
                                        Add More
                                    </button>
                                    <button type="button" id="clearFiles" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash me-1"></i>
                                        Clear
                                    </button>
                                </div>
                            </div>
                            <div id="selectedFiles"></div>
                            {{-- Convert --}}
                            <button type="submit" form="pdfWordForm" id="convertBtn"
                                class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-file-word me-2"></i>
                                Convert to Word
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- ============================================================
         PROGRESS SECTION
         Hidden by default (shown on submit)
    ============================================================ --}}
        <section class="crop-hero-section d-none" id="progressSection">
            <div class="container">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary mb-4" style="width:4rem;height:4rem;" role="status">
                    </div>
                    <h3 class="text-white fw-bold mb-2">
                        Converting your PDF files...
                    </h3>
                    <p class="text-secondary mb-0">
                        Please wait while your Word documents are being prepared.
                    </p>
                </div>
            </div>
        </section>
        {{-- ============================================================
         RESULTS SECTION (only when downloads exist)
    ============================================================ --}}
        @if (session('downloads'))
            <section class="crop-hero-section" id="resultsSection">
                <div class="container">
                    <div class="crop-heading text-center">
                        <div class="crop-small-badge">
                            <i class="fas fa-check-circle me-2"></i>
                            Success
                        </div>
                        <h2 class="pdf-word-state-heading">
                            Conversion
                            <br>
                            <span>Complete.</span>
                        </h2>
                        <p>
                            Your Word documents are ready to download.
                            <br>
                            <small class="text-warning">
                                Download your Word files and review the extracted text before using them.
                            </small>
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="bg-dark border border-success border-opacity-50 rounded-4 p-4">
                                {{-- Download All --}}
                                @if (session('zip'))
                                    <div class="mb-3">
                                        <a href="{{ route('pdf.word.downloadZip', session('zip')['batch']) }}?file={{ urlencode(session('zip')['name']) }}"
                                            class="btn btn-success btn-lg w-100">
                                            <i class="fas fa-file-archive me-2"></i>
                                            Download All as ZIP
                                        </a>
                                    </div>
                                @endif
                                {{-- Individual Downloads --}}
                                @foreach (session('downloads') as $download)
                                    <div class="d-flex align-items-center gap-2 bg-black rounded-3 p-2 mb-2">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-file-word text-primary fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="text-white text-truncate small fw-semibold">
                                                {{ $download['name'] }}
                                            </div>
                                        </div>
                                        <a href="{{ route('pdf.word.download', $download['batch']) }}?file={{ urlencode($download['name']) }}"
                                            class="btn btn-sm btn-primary flex-shrink-0">
                                            <i class="fas fa-download me-1"></i>
                                            Download
                                        </a>
                                    </div>
                                @endforeach
                                {{-- Back to hero --}}
                                <a href="{{ route('pdf.to.word') }}" class="btn btn-outline-light w-100 mt-3">
                                    <i class="fas fa-rotate-left me-2"></i>
                                    Convert More Files
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{-- ============================================================
         ERRORS (only when validation fails)
    ============================================================ --}}
        @if ($errors->any())
            <section class="pb-5">
                <div class="container">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-8 col-xl-7">
                            <div class="alert alert-danger rounded-4">
                                <div class="fw-bold mb-1">
                                    Conversion failed
                                </div>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        {{-- ============================================================
         FEATURES + INFO (hidden while results are shown)
    ============================================================ --}}
        @if (!session('downloads'))
            <section class="pb-5">
                <div class="container">
                    {{-- Features --}}
                    <div class="row justify-content-center text-center g-3 mt-4">
                        <div class="col-6 col-md-4">
                            <div class="text-secondary small">
                                <i class="fas fa-bolt text-primary me-1"></i>
                                Fast Conversion
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="text-secondary small">
                                <i class="fas fa-lock text-primary me-1"></i>
                                Secure Processing
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="text-secondary small">
                                <i class="fas fa-file-word text-primary me-1"></i>
                                Editable DOCX
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Information Section --}}
            <section class="py-5">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h2 class="text-white fw-bold">
                                PDF to Word Converter
                            </h2>
                            <p class="text-secondary mt-3">
                                Easily convert PDF documents into editable Word files.
                                Upload one or multiple PDFs, convert them and download
                                your DOCX documents in just a few clicks.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <article class="pdf-word-seo">
            <div class="container pdf-word-seo-content">
                <h2>Free PDF to Word Converter Online</h2>
                <p>XConvertifire converts text that can be extracted from PDF files into new, editable Word documents in DOCX format. Choose one PDF or select several, submit them for server-side processing, then download the resulting documents individually or together in a ZIP when more than one file is converted.</p>
                <p>This PDF to Word converter is intended to make text from digital PDFs easier to reuse and revise. It creates a new Word document from extracted text. It is not a full-page reproduction tool, so the result should be checked against the original PDF before you rely on it.</p>

                <h2>How to Convert PDF to Word Online</h2>
                <ol>
                    <li>Choose <strong>PDF Files</strong> or drag one or more PDFs into the upload area.</li>
                    <li>Select valid PDF files. Each file must be no larger than 50 MB.</li>
                    <li>Review the selected file names and sizes. Use Add More to include additional PDFs, or Clear to start the selection again.</li>
                    <li>Click <strong>Convert to Word</strong> to submit your files.</li>
                    <li>Allow the server to process the PDFs and prepare Word documents from extractable text.</li>
                    <li>Download each DOCX separately, or use Download All as ZIP when the result includes multiple files.</li>
                    <li>Open the Word documents and review the extracted text, paragraph order and formatting before using them.</li>
                </ol>
                <p>Keep your source PDFs available while reviewing the output. If you need to change a DOCX back into a PDF, use the separate <a href="{{ route('word.pdf.index') }}">Word to PDF converter</a>. For a different PDF task, XConvertifire also offers a <a href="{{ route('pdf.editor') }}">PDF Editor</a>.</p>

                <h2>Convert Multiple PDFs to Word</h2>
                <p>The upload control accepts multiple PDF files, and the selection screen lets you review the files before submitting them as a batch. Each accepted PDF is processed to create its own DOCX. When more than one document is converted, the result page can also provide a ZIP download containing the generated Word files. There is no fixed batch count stated here; practical limits depend on the selected files and available server resources.</p>
                <p>The maximum size applies to each individual PDF and is 50 MB. A batch of larger documents may take longer to process than a single small file. Review the result names to identify the corresponding document, then open each file to confirm that its extracted text is useful.</p>

                <h2>PDF Text Extraction Versus Layout Preservation</h2>
                <p>This PDF to DOCX converter extracts text from a PDF and writes that text into a newly created Word document. It does not reconstruct the original PDF page as an identical editable layout. Paragraphs and line breaks may differ, and the output can look substantially different from the source.</p>
                <p>Do not expect the conversion to preserve the source PDF's fonts, styling, images, tables, columns, page breaks, or embedded graphics. Complex page designs may not translate into a sensible reading order. The goal is editable extracted text, not lossless conversion or guaranteed visual fidelity. Compare the result with the PDF and make any needed edits in Word.</p>
                <p>For background on how Word opens and converts PDF documents, see <a href="https://support.microsoft.com/en-us/word/opening-pdfs-in-word" target="_blank" rel="noopener noreferrer">Microsoft's information about opening PDFs in Word</a>. Different conversion tools may handle content differently, so inspect any document before relying on it.</p>

                <h2>Can Scanned PDFs Be Converted?</h2>
                <p>Scanned pages commonly contain pictures of text rather than a selectable text layer. This converter uses text extraction and does not implement optical character recognition (OCR). As a result, a scanned or image-only PDF may produce little or no useful editable text.</p>
                <p>If your document is a scan and you need its words recognized, use an OCR-capable workflow before converting or editing it. Do not assume that uploading a scanned PDF here will turn its page images into accurate Word text. The <a href="https://github.com/smalot/pdfparser/blob/master/doc/Usage.md" target="_blank" rel="noopener noreferrer">Smalot PDFParser usage documentation</a> describes the text extraction library used in the server-side workflow; it is not an OCR service.</p>

                <h2>When a PDF to Word Conversion Can Help</h2>
                <p>Extracted text can be a useful starting point when you want to reuse material from a text-based report, edit notes that were saved as a PDF, or prepare a draft for revisions. It can also help when you need text from several digital PDFs in separate Word files. These are practical editing tasks, not guarantees that a formal document's meaning, layout or presentation will be retained.</p>
                <p>For legal, financial, official or otherwise important documents, verify the converted text carefully against the source. Check names, numbers, punctuation and paragraph order. Keep the original PDF as the reference copy because conversion may omit or rearrange information.</p>

                <h2>Tips for More Useful Results</h2>
                <ul>
                    <li>When possible, check whether text in the source PDF can be selected or copied. Image-only pages may not contain extractable text.</li>
                    <li>Review the first and last pages as well as any sections with unusual formatting.</li>
                    <li>Compare paragraphs and line breaks with the PDF, especially in columns or documents containing tables.</li>
                    <li>Keep the original PDF so you can verify details and restore information that did not extract as expected.</li>
                    <li>If a file is password protected, corrupted, or uses unusual fonts or complex page layouts, it may fail or provide limited text.</li>
                </ul>
                <p>Text extraction quality depends on the content and structure of the PDF. A PDF with a clear text layer is generally a more suitable source than one made only from page images, but every result still needs review.</p>

                <h2>Conversion and Download Limitations</h2>
                <p>The input format is PDF and the generated output is DOCX. Multiple-file conversion is supported, the individual file limit is 50 MB, and the conversion is performed on the server. The tool extracts available text and creates a new Word document; OCR is not implemented, and original page design is not guaranteed to be reproduced.</p>
                <p>A damaged, password-protected, image-only or unusually structured PDF may not produce useful text. Processing time and extraction quality depend on the files and the processing environment. The page does not make a promise about an exact storage duration or immediate file cleanup, so download your results and review them before use.</p>

                <h2>PDF to Word Converter FAQ</h2>
                <div class="pdf-word-faq">
                    <details>
                        <summary>Is this PDF to Word converter free?</summary>
                        <p>The page offers PDF-to-DOCX conversion for free. Each selected PDF must meet the 50 MB per-file limit and be processable by the tool.</p>
                    </details>
                    <details>
                        <summary>How do I convert a PDF to DOCX?</summary>
                        <p>Choose or drop a PDF, review the selection, click Convert to Word, then download and review the generated DOCX.</p>
                    </details>
                    <details>
                        <summary>Can I convert several PDFs together?</summary>
                        <p>Yes. You can select multiple PDFs, review them as a group and submit them together. Each PDF produces a separate Word document.</p>
                    </details>
                    <details>
                        <summary>What is the maximum PDF file size?</summary>
                        <p>The maximum size is 50 MB for each PDF file.</p>
                    </details>
                    <details>
                        <summary>Can I edit the resulting Word document?</summary>
                        <p>Yes. The output is a DOCX document containing extracted text, which you can open and edit in compatible word-processing software.</p>
                    </details>
                    <details>
                        <summary>Will the original PDF formatting be preserved?</summary>
                        <p>No. The tool creates a new document from extracted text and does not guarantee the original layout, fonts, styles or page breaks.</p>
                    </details>
                    <details>
                        <summary>Are images and tables preserved?</summary>
                        <p>The workflow is for text extraction. It does not promise to preserve embedded images, tables, columns or other complex page elements.</p>
                    </details>
                    <details>
                        <summary>Can this tool use OCR on scanned PDFs?</summary>
                        <p>No. OCR is not implemented. A scanned PDF without an extractable text layer may produce little or no useful editable text.</p>
                    </details>
                    <details>
                        <summary>What if my Word document is blank or missing text?</summary>
                        <p>The source may be image-only, protected, damaged or structured in a way that prevents useful extraction. Compare the DOCX with the original PDF and use an OCR-capable workflow for scanned pages.</p>
                    </details>
                    <details>
                        <summary>Can I download all converted files as a ZIP?</summary>
                        <p>When more than one PDF is converted, the results can include a Download All as ZIP option alongside individual DOCX downloads.</p>
                    </details>
                    <details>
                        <summary>Does the tool support password-protected PDFs?</summary>
                        <p>Successful processing of password-protected PDFs is not guaranteed. A protected file may not yield extractable text.</p>
                    </details>
                    <details>
                        <summary>Can I use the converter in a browser?</summary>
                        <p>Yes. Select and submit PDFs from the page in your browser. Conversion itself is performed on the server.</p>
                    </details>
                </div>

                <div class="pdf-word-cta">
                    <h2>Have another PDF to convert?</h2>
                    <p>Return to the upload form to select another document or batch.</p>
                    <a class="pdf-word-cta-link" href="{{ route('pdf.to.word') }}">Start another conversion</a>
                </div>
            </div>
        </article>
    </main>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('pdfFile');
            const uploadArea = document.getElementById('uploadArea');
            const heroSection = document.getElementById('heroSection');
            const filesSection = document.getElementById('filesSection');
            const progressSection = document.getElementById('progressSection');
            // If results exist, JS sections aren't needed
            if (!heroSection) return;
            const selectedFiles = document.getElementById('selectedFiles');
            const fileCount = document.getElementById('fileCount');
            const clearFiles = document.getElementById('clearFiles');
            const addMoreFiles = document.getElementById('addMoreFiles');
            const form = document.getElementById('pdfWordForm');
            const convertBtn = document.getElementById('convertBtn');
            const maxSize = 50 * 1024 * 1024;
            let selectedPdfFiles = [];
            /* ---------------------------------------------------------
             |  Show / hide sections
             --------------------------------------------------------- */
            function showHero() {
                heroSection.classList.remove('d-none');
                filesSection.classList.add('d-none');
                progressSection.classList.add('d-none');
            }

            function showFiles() {
                heroSection.classList.add('d-none');
                filesSection.classList.remove('d-none');
                progressSection.classList.add('d-none');
            }

            function showProgress() {
                heroSection.classList.add('d-none');
                filesSection.classList.add('d-none');
                progressSection.classList.remove('d-none');
            }

            function isPdf(file) {
                return file && (
                    file.type === 'application/pdf' ||
                    file.name.toLowerCase().endsWith('.pdf')
                );
            }

            function formatSize(bytes) {
                if (!bytes) return '0 KB';
                const units = ['Bytes', 'KB', 'MB', 'GB'];
                const index = Math.min(Math.floor(Math.log(bytes) / Math.log(1024)), units.length - 1);
                return (bytes / Math.pow(1024, index)).toFixed(2) + ' ' + units[index];
            }

            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            function renderFiles() {
                selectedFiles.innerHTML = '';
                if (!selectedPdfFiles.length) {
                    showHero();
                    return;
                }
                showFiles();
                fileCount.textContent =
                    selectedPdfFiles.length +
                    (selectedPdfFiles.length === 1 ? ' file selected' : ' files selected');
                selectedPdfFiles.forEach(function(file, index) {
                    const item = document.createElement('div');
                    item.className =
                        'd-flex align-items-center gap-2 bg-black rounded-3 p-2 mb-2';
                    item.innerHTML = `
                <div class="flex-shrink-0">
                    <i class="fas fa-file-pdf text-danger fs-5"></i>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <div class="text-white small fw-semibold text-truncate">
                        ${escapeHtml(file.name)}
                    </div>
                    <small class="text-secondary">${formatSize(file.size)}</small>
                </div>
                <button type="button"
                        class="btn btn-sm btn-outline-danger remove-file"
                        data-index="${index}"
                        title="Remove file">
                    <i class="fas fa-times"></i>
                </button>
            `;
                    selectedFiles.appendChild(item);
                });
                try {
                    const dataTransfer = new DataTransfer();
                    selectedPdfFiles.forEach(function(file) {
                        dataTransfer.items.add(file);
                    });
                    input.files = dataTransfer.files;
                } catch (error) {
                    console.error('Unable to update selected files:', error);
                }
            }

            function addFiles(files) {
                Array.from(files).forEach(function(file) {
                    if (!isPdf(file)) {
                        alert(file.name + ' is not a valid PDF file.');
                        return;
                    }
                    if (file.size > maxSize) {
                        alert(file.name + ' exceeds the 50 MB limit.');
                        return;
                    }
                    const duplicate = selectedPdfFiles.some(function(existing) {
                        return (
                            existing.name === file.name &&
                            existing.size === file.size &&
                            existing.lastModified === file.lastModified
                        );
                    });
                    if (!duplicate) {
                        selectedPdfFiles.push(file);
                    }
                });
                renderFiles();
            }
            input.addEventListener('change', function() {
                if (this.files.length) {
                    addFiles(this.files);
                }
                this.value = '';
            });
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('border-primary');
            });
            uploadArea.addEventListener('dragleave', function() {
                this.classList.remove('border-primary');
            });
            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('border-primary');
                if (e.dataTransfer.files.length) {
                    addFiles(e.dataTransfer.files);
                }
            });
            selectedFiles.addEventListener('click', function(e) {
                const button = e.target.closest('.remove-file');
                if (!button) return;
                const index = parseInt(button.dataset.index, 10);
                selectedPdfFiles.splice(index, 1);
                renderFiles();
            });
            clearFiles.addEventListener('click', function() {
                selectedPdfFiles = [];
                input.value = '';
                renderFiles();
            });
            addMoreFiles.addEventListener('click', function() {
                input.click();
            });
            form.addEventListener('submit', function(e) {
                if (!selectedPdfFiles.length) {
                    e.preventDefault();
                    alert('Please select at least one PDF file.');
                    return;
                }
                try {
                    const dataTransfer = new DataTransfer();
                    selectedPdfFiles.forEach(function(file) {
                        dataTransfer.items.add(file);
                    });
                    input.files = dataTransfer.files;
                } catch (error) {
                    console.error(error);
                }
                convertBtn.disabled = true;
                convertBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>' +
                    'Converting...';
                showProgress();
            });
        });
    </script>
@endsection
