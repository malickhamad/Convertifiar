@extends('components.app')
@section('meta')
    <title>FREE Word to PDF Converter: Convert DOCX | XConvertifire</title>
    <meta name="description"
        content="Convert DOC and DOCX files to PDF for FREE with XConvertifire. Convert single or multiple Word documents quickly, accurately, and securely.">
    <meta property="og:title" content="FREE Word to PDF Converter: Convert DOCX | XConvertifire">
    <meta property="og:description"
        content="Convert DOC and DOCX files to PDF for FREE with XConvertifire. Convert single or multiple Word documents quickly, accurately, and securely.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://xconvertifire.com/word-to-pdf">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="https://xconvertifire.com/assets/images/logo.png">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FREE Word to PDF Converter: Convert DOCX | XConvertifire">
    <meta name="twitter:description"
        content="Convert DOC and DOCX files to PDF for FREE with XConvertifire. Convert single or multiple Word documents quickly, accurately, and securely.">
    <meta name="twitter:url" content="https://xconvertifire.com/word-to-pdf">
    <meta name="twitter:image" content="https://xconvertifire.com/assets/images/logo.png">
    <meta name="twitter:image:alt" content="XConvertifire logo">
@endsection
@section('content')
    <style>
        .word-to-pdf-page .crop-heading .word-pdf-state-heading {
            margin: 0 0 20px;
            font-size: 4.2rem;
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -2px;
            background: linear-gradient(to right, #ffffff, #71717a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .word-to-pdf-page .crop-heading .word-pdf-state-heading span {
            background: linear-gradient(90deg, #ffffff, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .word-to-pdf-page .word-pdf-seo {
            padding: 56px 0 76px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: #d4d4d8;
        }

        .word-to-pdf-page .word-pdf-seo-content {
            max-width: 960px;
            margin: 0 auto;
        }

        .word-to-pdf-page .word-pdf-seo h2 {
            margin: 40px 0 14px;
            color: #f4f4f5;
            font-size: clamp(1.45rem, 3vw, 2rem);
            font-weight: 750;
            line-height: 1.25;
        }

        .word-to-pdf-page .word-pdf-seo h2:first-child {
            margin-top: 0;
        }

        .word-to-pdf-page .word-pdf-seo h3 {
            margin: 25px 0 10px;
            color: #e4e4e7;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .word-to-pdf-page .word-pdf-seo p,
        .word-to-pdf-page .word-pdf-seo li {
            color: #b8b8c0;
            font-size: 1rem;
            line-height: 1.8;
        }

        .word-to-pdf-page .word-pdf-seo p {
            margin: 0 0 16px;
        }

        .word-to-pdf-page .word-pdf-seo ul,
        .word-to-pdf-page .word-pdf-seo ol {
            margin: 0 0 20px;
            padding-left: 1.4rem;
        }

        .word-to-pdf-page .word-pdf-seo li {
            margin-bottom: 8px;
            padding-left: 4px;
        }

        .word-to-pdf-page .word-pdf-seo a {
            color: #93c5fd;
            text-decoration: underline;
            text-decoration-color: rgba(147, 197, 253, .45);
            text-underline-offset: 3px;
        }

        .word-to-pdf-page .word-pdf-seo a:hover {
            color: #bfdbfe;
            text-decoration-color: currentColor;
        }

        .word-to-pdf-page .word-pdf-faq {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .word-to-pdf-page .word-pdf-faq details {
            min-width: 0;
            padding: 17px 18px;
            border: 1px solid #292929;
            border-radius: 12px;
            background: #111;
        }

        .word-to-pdf-page .word-pdf-faq summary {
            color: #f4f4f5;
            font-weight: 650;
            line-height: 1.5;
            cursor: pointer;
        }

        .word-to-pdf-page .word-pdf-faq p {
            margin: 12px 0 0;
            font-size: .95rem;
        }

        .word-to-pdf-page .word-pdf-cta {
            margin-top: 44px;
            padding: 26px;
            border: 1px solid rgba(59, 130, 246, .35);
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(37, 99, 235, .14), rgba(17, 24, 39, .55));
            text-align: center;
        }

        .word-to-pdf-page .word-pdf-cta h2 {
            margin: 0 0 10px;
        }

        .word-to-pdf-page .word-pdf-cta-link {
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

        .word-to-pdf-page .word-pdf-cta-link:hover {
            background: #1d4ed8;
            color: #fff;
        }

        @media (max-width: 991px) {
            .word-to-pdf-page .crop-heading .word-pdf-state-heading {
                font-size: 3.2rem;
            }
        }

        @media (max-width: 767px) {
            .word-to-pdf-page .crop-heading .word-pdf-state-heading {
                font-size: 2.5rem;
                letter-spacing: -1px;
            }

            .word-to-pdf-page .word-pdf-seo {
                padding: 44px 0 56px;
            }
        }

        @media (max-width: 480px) {
            .word-to-pdf-page .crop-heading .word-pdf-state-heading {
                font-size: 2.15rem;
            }

            .word-to-pdf-page .word-pdf-faq {
                grid-template-columns: 1fr;
            }

            .word-to-pdf-page .word-pdf-cta {
                padding: 22px 18px;
            }
        }
    </style>
    <main class="bg-black word-to-pdf-page" style="margin-top:70px;">
        {{-- ============================================================
         HERO / UPLOAD SECTION
         Visible by default (hidden when results exist)
    ============================================================ --}}
        <section class="crop-hero-section {{ session('downloads') ? 'd-none' : '' }}" id="heroSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-file-pdf me-2"></i>
                        Word Tool
                    </div>
                    <h1>
                        Convert Your Word Docs
                        <br>
                        <span>To PDF.</span>
                    </h1>
                    <p>
                        Convert your Word documents into universally compatible PDF files
                        quickly, accurately and securely.
                    </p>
                </div>
                {{-- Hidden form that always exists in the DOM --}}
                <form action="{{ route('word.pdf.convert') }}" method="POST" enctype="multipart/form-data"
                    id="wordPdfForm">
                    @csrf
                    {{-- Upload Box --}}
                    <div class="crop-upload-box mx-auto cursor-pointer" id="uploadArea" onclick="document.getElementById('wordFile').click()">
                        <div class="crop-upload-icon">
                            <i class="fas fa-file-word"></i>
                        </div>
                        <h4 class="text-white mb-2">
                            Upload your Word files
                        </h4>
                        <p class="text-secondary mb-4">
                            Drag & drop your DOC/DOCX files here or choose files
                        </p>
                        <label for="wordFile" class="crop-upload-btn">
                            <i class="fas fa-upload me-2"></i>
                            Choose Word Files
                        </label>
                        <input type="file" id="wordFile" name="word[]" class="d-none"
                            accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                            multiple>
                        <div class="small text-secondary mt-3">
                            DOC and DOCX files only
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
                    <h2 class="word-pdf-state-heading">
                        Your Word Docs
                        <br>
                        <span>Are Ready.</span>
                    </h2>
                    <p>
                        Review the selected files below, then click
                        <strong>Convert to PDF</strong> to start.
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="bg-dark border border-secondary border-opacity-25 rounded-4 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h6 class="text-white mb-1">
                                        Selected Word Files
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
                            <button type="submit" form="wordPdfForm" id="convertBtn"
                                class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-file-pdf me-2"></i>
                                Convert to PDF
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
                        Converting your Word files...
                    </h3>
                    <p class="text-secondary mb-0">
                        Please wait while your PDF documents are being prepared.
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
                        <h2 class="word-pdf-state-heading">
                            Conversion
                            <br>
                            <span>Complete.</span>
                        </h2>
                        <p>
                            Your PDF documents are ready to download.
                            <br>
                            <small class="text-warning">
                                Download your PDFs and review the converted documents before using them.
                            </small>
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="bg-dark border border-success border-opacity-50 rounded-4 p-4">
                                {{-- Download All --}}
                                @if (session('zip'))
                                    <div class="mb-3">
                                        <a href="{{ route('word.pdf.downloadZip', session('zip')['batch']) }}?file={{ urlencode(session('zip')['name']) }}"
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
                                            <i class="fas fa-file-pdf text-danger fs-5"></i>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="text-white text-truncate small fw-semibold">
                                                {{ $download['name'] }}
                                            </div>
                                        </div>
                                        <a href="{{ route('word.pdf.download', $download['batch']) }}?file={{ urlencode($download['name']) }}"
                                            class="btn btn-sm btn-primary flex-shrink-0">
                                            <i class="fas fa-download me-1"></i>
                                            Download
                                        </a>
                                    </div>
                                @endforeach
                                {{-- Back to hero --}}
                                <a href="{{ route('word.pdf.index') }}" class="btn btn-outline-light w-100 mt-3">
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
                                <i class="fas fa-file-pdf text-primary me-1"></i>
                                Universal PDF Output
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
                                Word to PDF Converter
                            </h2>
                            <p class="text-secondary mt-3">
                                Easily convert Word documents into universally compatible PDF files.
                                Upload one or multiple DOC/DOCX files, convert them and download
                                your PDFs in just a few clicks.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <article class="word-pdf-seo">
            <div class="container word-pdf-seo-content">
                <h2>Free Word to PDF Converter Online</h2>
                <p>Convert a Microsoft Word document into a PDF online. Select a DOC or DOCX file, review your selection, and submit it for conversion. You can process one document or several in a batch, up to 50 MB per file.</p>
                <p>The converter creates PDFs from content it can read. Word and PDF are different formats, so complex layouts may change. Check each result before sharing, printing, or relying on it.</p>

                <h2>How to Convert a Word Document to PDF</h2>
                <ol>
                    <li>Choose Word files or drag DOC and DOCX documents into the upload area.</li>
                    <li>Check the selected file names and confirm that each document is within the 50 MB per-file limit.</li>
                    <li>Use Add More to include additional documents, or Clear to remove the selection and start again.</li>
                    <li>Select Convert to PDF and allow the server to process the documents.</li>
                    <li>When conversion finishes, download each PDF individually or download the ZIP archive when one is provided.</li>
                    <li>Open the downloaded PDFs and review their pages before using or distributing them.</li>
                </ol>
                <p>Keep a copy of the Word source if you may edit it later. To extract editable text from an existing PDF, use the <a href="{{ route('pdf.to.word') }}">PDF to Word converter</a>.</p>

                <h2>Convert Single or Multiple Word Files</h2>
                <p>For one document, select a single file and convert it on its own. For a batch, select several DOC or DOCX files together or use Add More to extend your selection before conversion. The file list lets you review what you have chosen, remove an individual item, or clear the list before submitting it.</p>
                <p>The 50 MB limit applies to each file, not each page. Large documents or batches may need more processing resources. If a batch fails, convert files individually to identify a document that may be causing the problem.</p>

                <h2>DOC and DOCX File Support</h2>
                <p>The upload control accepts Word documents with DOC and DOCX extensions. DOC is the older binary Word document format, while DOCX is the newer Office Open XML format. Both can contain text, images, tables, page setup, and other formatting, but the way that information is stored and interpreted is not identical.</p>
                <p>Use a genuine Word document. Renaming another file with a .doc or .docx extension does not convert its contents. If unsure of the format, open it in compatible office software and save a supported copy.</p>
                <p>For information about Word features and file formats, consult <a href="https://support.microsoft.com/en-us/word" target="_blank" rel="noopener noreferrer">Microsoft Word help and learning</a>. Desktop options may differ from this conversion workflow.</p>

                <h2>Why Save a Word Document as PDF?</h2>
                <p>PDF is useful for sharing documents for viewing or printing without asking recipients to edit the Word source. It is common for reports, résumés, invoices, handouts, and records that should be easy to open on different devices.</p>
                <p>A PDF is not automatically confidential, legally approved, or impossible to edit. Consider the content and sharing settings separately. Keep the Word source if you may need revisions.</p>

                <h2>Formatting, Fonts, Tables, and Page Breaks</h2>
                <p>The converter rebuilds a PDF from the Word document rather than taking a screenshot. Missing or substituted fonts, margins, section breaks, columns, headers, footers, and page numbering can affect the result. Tables and positioned text may reflow.</p>
                <p>Images, shapes, text boxes, charts, and other objects can vary with their layout. Page breaks may move when text wraps differently, especially across portrait and landscape sections. PHPWord reads Word content and Dompdf creates the PDF, so complex layouts may not be reproduced exactly. See the <a href="https://phpword.readthedocs.io/en/latest/" target="_blank" rel="noopener noreferrer">PHPWord documentation</a> for information about the document library.</p>
                <p>Where appearance matters, use standard fonts and straightforward layouts. Review the PDF instead of assuming every detail or page boundary matches the source.</p>

                <h2>Review the Converted PDF Before Sharing</h2>
                <p>Open each downloaded PDF and compare it with the source Word document. Check the first and last pages, headings, page order, paragraph breaks, tables, images, footers, and page numbering. Also check names, dates, totals, and other information where a small change could matter.</p>
                <p>Use a PDF reader to zoom and navigate. If you find a problem, correct the Word source and convert it again. The <a href="{{ route('pdf.editor') }}">PDF Editor</a> offers separate PDF tools, but does not replace checking the original.</p>

                <h2>Troubleshooting Word to PDF Conversion</h2>
                <h3>The file is rejected or cannot be opened</h3>
                <p>Confirm that the file is a valid DOC or DOCX document and is no larger than 50 MB. A damaged file, password protection, or a file that was renamed without being converted may prevent successful processing. Try opening it locally and saving a fresh copy in a supported format.</p>
                <h3>The PDF looks different from the Word file</h3>
                <p>Check fonts, margins, section settings, tables, page breaks, and embedded objects in the source. Simplifying complex positioning or using commonly available fonts may improve consistency. Review a new conversion after each change so you can identify what affected the layout.</p>
                <h3>A batch fails or takes longer than expected</h3>
                <p>Try files individually to identify a problem document. If the issue continues, keep the source and note its file type and any message shown when requesting help.</p>

                <h2>File Handling and Server-Side Processing</h2>
                <p>Word documents are submitted to the server for conversion, where the application reads the supported file and prepares PDF output. Do not upload a document unless you are permitted to do so and are comfortable using this online workflow. For highly sensitive material, consider whether an approved local or organizational tool is more appropriate.</p>
                <p>Download and review your PDFs before use. Immediate deletion after download is not promised. A successful conversion does not guarantee retention terms, confidentiality, or suitability for regulated information; consult the site's privacy information.</p>

                <h2>Word to PDF Converter FAQ</h2>
                <div class="word-pdf-faq">
                    <details>
                        <summary>Is this Word to PDF converter free?</summary>
                        <p>The page provides a free conversion workflow for supported DOC and DOCX documents. Each uploaded file must be no larger than 50 MB.</p>
                    </details>
                    <details>
                        <summary>Can I convert DOC and DOCX files?</summary>
                        <p>Yes. The upload control accepts documents with DOC and DOCX extensions. A renamed or damaged file may still fail validation or processing.</p>
                    </details>
                    <details>
                        <summary>Can I convert multiple Word documents together?</summary>
                        <p>Yes. Select more than one supported document or add further files before conversion. Review the list and remove anything you do not want included.</p>
                    </details>
                    <details>
                        <summary>What is the maximum file size?</summary>
                        <p>The maximum upload size is 50 MB per file. The limit applies to each selected document, not to each page in the document.</p>
                    </details>
                    <details>
                        <summary>Does the PDF always look exactly like Word?</summary>
                        <p>No. Fonts, tables, images, page breaks, and complex positioning can be interpreted differently, so inspect each PDF against its Word source.</p>
                    </details>
                    <details>
                        <summary>Are embedded images and tables supported?</summary>
                        <p>The conversion may include document content such as images and tables, but complex or unusually positioned elements may not reproduce exactly.</p>
                    </details>
                    <details>
                        <summary>Can I convert a password-protected document?</summary>
                        <p>Password protection or other restrictions can prevent the application from reading a document. Save an accessible supported copy if you are authorized to do so.</p>
                    </details>
                    <details>
                        <summary>How do I download converted files?</summary>
                        <p>Use the individual download control beside a result. When a ZIP option is shown for a batch, use it to download the available PDFs together.</p>
                    </details>
                    <details>
                        <summary>Why does my converted PDF have different page breaks?</summary>
                        <p>Text wrapping, fonts, margins, section settings, or other layout features can change pagination. Check those settings in Word and review another conversion.</p>
                    </details>
                    <details>
                        <summary>What should I do if conversion fails?</summary>
                        <p>Confirm the file opens, uses DOC or DOCX, and is within the size limit. Try converting it separately and note any error shown.</p>
                    </details>
                    <details>
                        <summary>Are my files processed in the browser?</summary>
                        <p>No. The documents are submitted to the server for conversion. Do not upload sensitive material unless this service is appropriate for it.</p>
                    </details>
                    <details>
                        <summary>Are my files deleted immediately after download?</summary>
                        <p>This page does not promise immediate deletion after download. Review the site's privacy information for details relevant to file handling.</p>
                    </details>
                </div>

                <div class="word-pdf-cta">
                    <h2>Ready to convert a Word document?</h2>
                    <p>Select a DOC or DOCX file to create a PDF, then review the downloaded result before sharing it.</p>
                    <a class="word-pdf-cta-link" href="{{ route('word.pdf.index') }}">Convert Word to PDF</a>
                </div>
            </div>
        </article>
    </main>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('wordFile');
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
            const form = document.getElementById('wordPdfForm');
            const convertBtn = document.getElementById('convertBtn');
            const maxSize = 50 * 1024 * 1024;
            let selectedWordFiles = [];
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

            function isWord(file) {
                if (!file) return false;
                const name = file.name.toLowerCase();
                return (
                    file.type === 'application/msword' ||
                    file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                    name.endsWith('.doc') ||
                    name.endsWith('.docx')
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
                if (!selectedWordFiles.length) {
                    showHero();
                    return;
                }
                showFiles();
                fileCount.textContent =
                    selectedWordFiles.length +
                    (selectedWordFiles.length === 1 ? ' file selected' : ' files selected');
                selectedWordFiles.forEach(function(file, index) {
                    const item = document.createElement('div');
                    item.className =
                        'd-flex align-items-center gap-2 bg-black rounded-3 p-2 mb-2';
                    item.innerHTML = `
                <div class="flex-shrink-0">
                    <i class="fas fa-file-word text-primary fs-5"></i>
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
                    selectedWordFiles.forEach(function(file) {
                        dataTransfer.items.add(file);
                    });
                    input.files = dataTransfer.files;
                } catch (error) {
                    console.error('Unable to update selected files:', error);
                }
            }

            function addFiles(files) {
                Array.from(files).forEach(function(file) {
                    if (!isWord(file)) {
                        alert(file.name + ' is not a valid Word file.');
                        return;
                    }
                    if (file.size > maxSize) {
                        alert(file.name + ' exceeds the 50 MB limit.');
                        return;
                    }
                    const duplicate = selectedWordFiles.some(function(existing) {
                        return (
                            existing.name === file.name &&
                            existing.size === file.size &&
                            existing.lastModified === file.lastModified
                        );
                    });
                    if (!duplicate) {
                        selectedWordFiles.push(file);
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
                selectedWordFiles.splice(index, 1);
                renderFiles();
            });
            clearFiles.addEventListener('click', function() {
                selectedWordFiles = [];
                input.value = '';
                renderFiles();
            });
            addMoreFiles.addEventListener('click', function() {
                input.click();
            });
            form.addEventListener('submit', function(e) {
                if (!selectedWordFiles.length) {
                    e.preventDefault();
                    alert('Please select at least one Word file.');
                    return;
                }
                try {
                    const dataTransfer = new DataTransfer();
                    selectedWordFiles.forEach(function(file) {
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