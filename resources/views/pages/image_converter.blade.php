@extends('components.app')

<link rel="stylesheet" href="{{ asset('css/image-converter.css') }}">

@section('meta')
    <title>Image Converter</title>

    <meta name="description" content="Convert multiple images to PNG, JPG, JPEG, WebP or PDF online quickly and easily." />

    <meta property="og:title" content="Image Converter">
    <meta property="og:description" content="Convert multiple images to PNG, JPG, JPEG, WebP or PDF online.">

    <meta property="twitter:title" content="Image Converter">
    <meta property="twitter:description" content="Convert multiple images to PNG, JPG, JPEG, WebP or PDF online.">
@endsection

@section('content')
    <main class="converter-page">
        <section class="converter-hero">
            <div class="container">
                <div class="converter-heading" data-aos="fade-up"><span class="converter-badge"><i
                            class="fas fa-shuffle"></i> IMAGE
                        CONVERTER</span>
                    <h1>Convert Images to <span>Any
                            Format</span></h1>
                    <p>Upload multiple images and
                        convert them instantly to JPG, JPEG, PNG, WEBP, GIF,
                        or PDF.</p>
                </div>
                <div class="converter-workspace" data-aos="fade-up" data-aos-delay="100">
                    <input type="file" id="converterFileInput" accept="image/*" multiple hidden>
                    <div class="converter-upload" id="converterUpload">
                        <div class="converter-upload-icon"><i class="fas fa-cloud-arrow-up"></i></div>
                        <h3>Drop
                            your images here</h3>
                        <p>or select multiple
                            images from your device</p><button type="button" class="converter-primary-btn"
                            id="browseImagesBtn"><i class="fas fa-folder-open"></i> Choose
                            Images</button><small>JPG, JPEG, PNG, WEBP, GIF
                            • Multiple files supported</small>
                    </div>
                    <div class="converter-files-panel d-none" id="converterFilesPanel">
                        <div class="converter-panel-top">
                            <div><span class="converter-mini-label">READY TO
                                    CONVERT</span>
                                <h2><span id="imageCount">0</span> images
                                    selected</h2>
                            </div><button type="button" class="converter-add-btn" id="addMoreBtn"><i
                                    class="fas fa-plus"></i> Add
                                More</button>
                        </div>
                        <div class="converter-file-grid" id="fileGrid"></div>
                        <div class="converter-controls">
                            <div class="converter-control-heading">
                                <div><span class="converter-mini-label">OUTPUT
                                        FORMAT</span>
                                    <h3>Choose your
                                        format</h3>
                                </div><button type="button" class="converter-clear-btn" id="clearAllBtn"><i
                                        class="fas fa-trash-can"></i> Clear
                                    All</button>
                            </div>
                            <div class="format-buttons" id="formatButtons">
                                <button type="button" class="format-btn active"
                                    data-format="jpeg"><strong>JPEG</strong><span>Best
                                        compatibility</span></button><button type="button" class="format-btn"
                                    data-format="jpg"><strong>JPG</strong><span>Compact
                                        photo</span></button><button type="button" class="format-btn"
                                    data-format="png"><strong>PNG</strong><span>Transparent
                                        quality</span></button><button type="button" class="format-btn"
                                    data-format="webp"><strong>WEBP</strong><span>Modern
                                        & lightweight</span></button><button type="button" class="format-btn"
                                    data-format="gif"><strong>GIF</strong><span>Web-friendly
                                        image</span></button><button type="button" class="format-btn"
                                    data-format="pdf"><strong>PDF</strong><span>Document
                                        format</span></button>
                            </div>
                            <button type="button" class="converter-convert-btn" id="convertBtn"><span><i
                                        class="fas fa-wand-magic-sparkles"></i>
                                    Convert Images</span><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="converter-trust-row">
                    <div><i class="fas fa-shield-halved"></i><span>Private
                            in your browser</span></div>
                    <div><i class="fas fa-layer-group"></i><span>Batch
                            conversion</span></div>
                    <div><i class="fas fa-bolt"></i><span>Fast
                            processing</span></div>
                </div>
            </div>
        </section>
        <section class="converter-info-section">
            <div class="container">
                <div class="converter-info-grid">
                    <div class="converter-info-card">
                        <div class="converter-info-icon"><i class="fas fa-images"></i></div>
                        <h3>Convert
                            in bulk</h3>
                        <p>Select multiple images and
                            process them together.</p>
                    </div>
                    <div class="converter-info-card">
                        <div class="converter-info-icon"><i class="fas fa-sliders"></i></div>
                        <h3>Six
                            output formats</h3>
                        <p>Choose JPG, JPEG, PNG,
                            WEBP, GIF or PDF.</p>
                    </div>
                    <div class="converter-info-card">
                        <div class="converter-info-icon"><i class="fas fa-lock"></i></div>
                        <h3>Designed
                            for privacy</h3>
                        <p>Images are processed directly
                            in the browser.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="conversion-overlay" id="conversionOverlay">
        <div class="conversion-modal">
            <div class="conversion-spinner"><span></span><i class="fas fa-shuffle"></i></div><span
                class="conversion-status-label">PROCESSING</span>
            <h2>Converting
                your images</h2>
            <p id="conversionStatus">Preparing your
                files...</p>
            <div class="conversion-progress"><span id="conversionProgressBar"></span></div>
            <div class="conversion-progress-text"><span id="conversionProgressText">0%</span><span>Please
                    wait</span></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic'
        });
        const navbar = document.getElementById('morphNavbar');
        window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', scrollY > 50));
        const toggle = document.getElementById('mobileToggleBtn'),
            links = document.getElementById('navLinksWrapper');
        toggle.addEventListener('click', () => {
            links.classList.toggle('mobile-open');
            const i = toggle.querySelector('i');
            i.classList.toggle('fa-bars');
            i.classList.toggle('fa-times')
        });
        document.querySelectorAll('.nav-item-dropdown').forEach(d => d.querySelector('.dropdown-trigger').addEventListener(
            'click', e => {
                if (innerWidth < 992) {
                    e.preventDefault();
                    document.querySelectorAll('.nav-item-dropdown').forEach(x => {
                        if (x !== d) x.classList.remove('open')
                    });
                    d.classList.toggle('open')
                }
            }));
        const input = document.getElementById('converterFileInput'),
            upload = document.getElementById('converterUpload'),
            panel = document.getElementById('converterFilesPanel'),
            grid = document.getElementById('fileGrid'),
            count = document.getElementById('imageCount');
        let files = [],
            format = 'jpeg';
        const add = (list) => {
            files.push(...list.filter(f => f.type.startsWith('image/')));
            render();
            input.value = ''
        };
        document.getElementById('browseImagesBtn').onclick = () => input.click();
        document.getElementById('addMoreBtn').onclick = () => input.click();
        input.onchange = e => add([...e.target.files]);
        ['dragenter', 'dragover'].forEach(x => upload.addEventListener(x, e => {
            e.preventDefault();
            upload.classList.add('dragging')
        }));
        ['dragleave', 'drop'].forEach(x => upload.addEventListener(x, e => {
            e.preventDefault();
            upload.classList.remove('dragging')
        }));
        upload.addEventListener('drop', e => add([...e.dataTransfer.files]));

        function render() {
            grid.innerHTML = '';
            count.textContent = files.length;
            if (!files.length) {
                panel.classList.add('d-none');
                upload.classList.remove('d-none');
                return
            }
            upload.classList.add('d-none');
            panel.classList.remove('d-none');
            files.forEach((f, i) => {
                const u = URL.createObjectURL(f),
                    c = document.createElement('div');
                c.className = 'converter-file-card';
                c.innerHTML =
                    `<div class="converter-thumb"><img src="${u}" alt=""><button class="remove-file"><i class="fas fa-xmark"></i></button></div><div class="converter-file-name" title="${esc(f.name)}">${esc(f.name)}</div><div class="converter-file-meta">${bytes(f.size)}</div>`;
                c.querySelector('button').onclick = () => {
                    files.splice(i, 1);
                    URL.revokeObjectURL(u);
                    render()
                };
                grid.appendChild(c)
            })
        }

        function esc(s) {
            return s.replace(/[&<>'"]/g, c => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                "'": '&#39;',
                '"': '&quot;'
            } [c] || c))
        }

        function bytes(n) {
            if (!n) return '0 B';
            let u = ['B', 'KB', 'MB', 'GB'],
                i = Math.floor(Math.log(n) / Math.log(1024));
            return (n / 1024 ** i).toFixed(i ? 1 : 0) + ' ' + u[i]
        }
        document.querySelectorAll('.format-btn').forEach(b => b.onclick = () => {
            document.querySelectorAll('.format-btn').forEach(x => x.classList.remove('active'));
            b.classList.add('active');
            format = b.dataset.format
        });
        document.getElementById('clearAllBtn').onclick = () => {
            files = [];
            render()
        };

        function img(f) {
            return new Promise((res, rej) => {
                let i = new Image;
                i.onload = () => res(i);
                i.onerror = rej;
                i.src = URL.createObjectURL(f)
            })
        }

        function blob(i, t) {
            let c = document.createElement('canvas');
            c.width = i.naturalWidth;
            c.height = i.naturalHeight;
            let x = c.getContext('2d');
            if (t === 'jpg' || t === 'jpeg') {
                x.fillStyle = '#fff';
                x.fillRect(0, 0, c.width, c.height)
            }
            x.drawImage(i, 0, 0);
            return new Promise(r => c.toBlob(r, t === 'jpg' || t === 'jpeg' ? 'image/jpeg' : 'image/' + t, .92))
        }

        function dl(b, n) {
            let a = document.createElement('a');
            a.href = URL.createObjectURL(b);
            a.download = n;
            a.click();
            setTimeout(() => URL.revokeObjectURL(a.href), 1000)
        }
        async function pdf() {
            const {
                jsPDF
            } = window.jspdf, p = new jsPDF({
                unit: 'px',
                format: 'a4'
            });
            for (let n = 0; n < files.length; n++) {
                let i = await img(files[n]),
                    w = p.internal.pageSize.getWidth(),
                    h = p.internal.pageSize.getHeight(),
                    s = Math.min((w - 40) / i.width, (h - 40) / i.height),
                    iw = i.width * s,
                    ih = i.height * s;
                if (n) p.addPage();
                p.addImage(i, 'JPEG', (w - iw) / 2, (h - ih) / 2, iw, ih, '', 'FAST')
            }
            return p.output('blob')
        }
        const overlay = document.getElementById('conversionOverlay'),
            bar = document.getElementById('conversionProgressBar'),
            pct = document.getElementById('conversionProgressText'),
            stat = document.getElementById('conversionStatus');
        const wait = m => new Promise(r => setTimeout(r, m));
        document.getElementById('convertBtn').onclick = async () => {
            if (!files.length) return;
            overlay.classList.add('show');
            try {
                if (format === 'pdf') {
                    stat.textContent = 'Building your PDF...';
                    let b = await pdf();
                    dl(b, 'pixelflow-converted.pdf');
                    bar.style.width = '100%';
                    pct.textContent = '100%'
                } else {
                    for (let i = 0; i < files.length; i++) {
                        stat.textContent = `Converting image ${i+1} of ${files.length}...`;
                        let im = await img(files[i]),
                            b = await blob(im, format);
                        dl(b, files[i].name.replace(/\.[^.]+$/, '') + '.' + format);
                        let p = Math.round((i + 1) / files.length * 100);
                        bar.style.width = p + '%';
                        pct.textContent = p + '%'
                    }
                }
                stat.textContent = 'Conversion complete. Your download is ready.';
                await wait(800)
            } catch (e) {
                console.error(e);
                stat.textContent = 'Something went wrong. Please try again.';
                await wait(1000)
            }
            overlay.classList.remove('show');
            bar.style.width = '0';
            pct.textContent = '0%'
        };
    </script>
@endsection


@section('scripts')
@endsection
