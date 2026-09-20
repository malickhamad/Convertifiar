@extends('components.app')
@section('meta')
    <title>Word to PDF Converter | Tool Baazar</title>
    <meta name="description"
        content="Convert Word documents to PDF files online. Fast, secure and easy Word to PDF converter by Tool Baazar.">
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
                    <div class="crop-upload-box mx-auto" id="uploadArea">
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
                        Your Word Docs
                        <br>
                        <span>Are Ready.</span>
                    </h1>
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
         Hidden by default — shown on submit
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
                        <h1>
                            Conversion
                            <br>
                            <span>Complete.</span>
                        </h1>
                        <p>
                            Your PDF documents are ready to download.
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