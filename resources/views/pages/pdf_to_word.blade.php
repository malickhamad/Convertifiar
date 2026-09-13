@extends('components.app')
@section('meta')
    <title>PDF to Word Converter | Tool Baazar</title>
    <meta name="description"
        content="Convert PDF files to editable Word documents online. Fast, secure and easy PDF to Word converter by Tool Baazar.">
@endsection
@section('content')
    <main class="bg-black" style="margin-top:70px;">
        {{-- ============================================================
         HERO / UPLOAD SECTION
         Visible by default — hidden when results exist
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
                        Convert your PDF files into editable Word documents quickly,
                        accurately and securely.
                    </p>
                </div>
                {{-- Hidden form that always exists in the DOM --}}
                <form action="{{ route('pdf.word.convert') }}" method="POST" enctype="multipart/form-data"
                    id="pdfWordForm">
                    @csrf
                    {{-- Upload Box --}}
                    <div class="crop-upload-box mx-auto" id="uploadArea">
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
         Hidden by default — shown only when user picks files
    ============================================================ --}}
        <section class="crop-hero-section d-none" id="filesSection">
            <div class="container">
                <div class="crop-heading text-center">
                    <div class="crop-small-badge">
                        <i class="fas fa-list-check me-2"></i>
                        Ready to Convert
                    </div>
                    <h1>
                        Your PDFs
                        <br>
                        <span>Are Ready.</span>
                    </h1>
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
         Hidden by default — shown on submit
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
                        <h1>
                            Conversion
                            <br>
                            <span>Complete.</span>
                        </h1>
                        <p>
                            Your Word documents are ready to download.
                            <br>
                            <small class="text-warning">
                                Files are deleted automatically after download.
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
                                <a href="{{ route('pdf.word') }}" class="btn btn-outline-light w-100 mt-3">
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
