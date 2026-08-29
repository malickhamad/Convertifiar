@extends('components.app')


@section('meta')
    <title>Background Remover</title>
    <meta name="description" content="Remove image backgrounds online quickly and easily.">
@endsection

@section('content')
  {{-- <link rel="stylesheet" href="{{ asset('css/image-bg-remover.css') }}">\ --}}



  <style>


/* PixelFlow AI Background Remover — black theme */
.bg-remover-page{min-height:100vh;background:#080808;color:#f4f4f5}.bg-hero{padding:115px 0 65px}.editor-heading{text-align:center;margin:0 auto 28px;max-width:850px}.bg-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 15px;border:1px solid #262626;border-radius:30px;background:#111;color:#bdbdbd;font-size:.68rem;font-weight:800;letter-spacing:1px}.bg-badge i{color:#60a5fa}.editor-heading h1{font-size:3.25rem;font-weight:800;letter-spacing:-1.8px;margin:17px 0 10px;background:linear-gradient(90deg,#fff,#858585);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.editor-heading h1 span{background:linear-gradient(90deg,#fff,#60a5fa);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.editor-heading p{color:#737373;font-size:.9rem;margin:0}.design-editor{max-width:1280px;margin:auto;background:#111;border:1px solid #272727;border-radius:22px;box-shadow:0 30px 100px rgba(0,0,0,.5);overflow:hidden}.editor-tabs{height:66px;border-bottom:1px solid #262626;display:flex;align-items:center;padding:0 14px;gap:3px;background:#111}.editor-tab{height:44px;border:0;border-radius:22px;background:transparent;color:#999;padding:0 15px;display:flex;align-items:center;gap:9px;font-size:.75rem;font-weight:650;transition:.2s}.editor-tab i{color:#777}.editor-tab:hover{color:#eee;background:#181818}.editor-tab.active{color:#fff;background:#20252a}.editor-tab.active i{color:#60a5fa}.tab-divider{height:25px;width:1px;background:#2a2a2a;margin:0 10px}.top-icon-btn{width:38px;height:38px;border:0;background:transparent;color:#777;border-radius:10px}.top-icon-btn:hover{background:#1b1b1b;color:#fff}.download-top{margin-left:auto;border:0;border-radius:22px;background:#3b82f6;color:#fff;height:42px;padding:0 18px;font-size:.75rem;font-weight:750;display:flex;align-items:center;gap:10px}.download-top:hover{background:#2563eb}.editor-body{display:grid;grid-template-columns:minmax(0,1fr) 325px;min-height:650px}.stage-column{min-width:0;display:flex;flex-direction:column}.stage-topline{height:48px;border-bottom:1px solid #222;padding:0 16px;display:flex;align-items:center;justify-content:space-between;color:#777;font-size:.66rem}.online-dot{width:6px;height:6px;background:#4ade80;display:inline-block;border-radius:50%;box-shadow:0 0 8px #4ade80;margin-right:7px}.zoom-controls{display:flex;align-items:center;gap:7px}.zoom-controls button{width:27px;height:27px;border:1px solid #2b2b2b;background:#161616;color:#888;border-radius:7px}.zoom-controls button:hover{color:#fff}.zoom-controls span{min-width:38px;text-align:center}.stage-wrap{position:relative;flex:1;min-height:520px;display:flex;align-items:center;justify-content:center;overflow:auto;background:#0b0b0b}.stage-checker,.mini-checker{background-color:#141414;background-image:linear-gradient(45deg,#1d1d1d 25%,transparent 25%),linear-gradient(-45deg,#1d1d1d 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#1d1d1d 75%),linear-gradient(-45deg,transparent 75%,#1d1d1d 75%);background-size:22px 22px;background-position:0 0,0 11px,11px -11px,-11px 0}.stage-checker{position:absolute;inset:0}.stage-wrap:has(#editCanvas:not([width="0"])):after{content:""}.stage-wrap[style]{background:var(--custom-bg)}#editCanvas{position:relative;z-index:3;max-width:calc(100% - 80px);max-height:calc(100% - 80px);cursor:crosshair;touch-action:none;box-shadow:0 25px 60px rgba(0,0,0,.4);transition:filter .15s}.stage-wrap.solid-bg .stage-checker{opacity:0}.stage-wrap.solid-bg{background:var(--custom-bg)}#editCanvas.flipped{transform:scaleX(-1)}#compareCanvas{display:none;position:absolute;z-index:8;max-width:90%;max-height:90%;object-fit:contain;box-shadow:0 20px 50px #000}.compare-close{display:none;position:absolute;right:18px;top:18px;z-index:9;width:34px;height:34px;border:1px solid #444;background:#111;color:#fff;border-radius:50%;align-items:center;justify-content:center}.stage-tip{position:absolute;z-index:5;bottom:12px;left:50%;transform:translateX(-50%);padding:7px 12px;border:1px solid #2b2b2b;background:rgba(12,12,12,.85);color:#777;border-radius:20px;font-size:.6rem;white-space:nowrap}.empty-editor{position:relative;z-index:6;text-align:center}.empty-editor>i{width:62px;height:62px;border:1px solid #2b2b2b;background:#141414;color:#60a5fa;border-radius:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:1.5rem}.empty-editor h3{font-size:1.1rem;margin:0 0 6px}.empty-editor p{font-size:.7rem;color:#666;margin-bottom:17px}.empty-editor button{border:0;background:#3b82f6;color:#fff;border-radius:10px;padding:11px 17px;font-size:.72rem;font-weight:700}.empty-editor.hidden{display:none}.editor-footer{height:70px;border-top:1px solid #242424;padding:0 16px;display:flex;align-items:center;justify-content:space-between}.current-file{display:flex;align-items:center;gap:9px;min-width:0}.file-icon{width:34px;height:34px;border-radius:9px;background:#171717;color:#60a5fa;display:flex;align-items:center;justify-content:center}.current-file strong,.current-file small{display:block;max-width:230px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.current-file strong{font-size:.68rem}.current-file small{font-size:.6rem;color:#666;margin-top:3px}.new-image-btn{border:1px solid #292929;background:#151515;color:#aaa;border-radius:9px;padding:9px 12px;font-size:.66rem}.new-image-btn:hover{color:#fff;border-color:#444}.settings-panel{border-left:1px solid #262626;background:#101010;min-width:0}.settings-scroll{height:100%;overflow:auto;padding:20px}.panel-view{display:none}.panel-view.active{display:block}.panel-hero-card{height:100px;background:#171717;border:1px solid #272727;border-radius:11px;display:flex;align-items:center;gap:11px;padding:9px;margin-bottom:14px}.hero-thumb{width:86px;height:80px;border-radius:7px;background:#202020 center/cover no-repeat;display:flex;align-items:center;justify-content:center;color:#555;background-image:linear-gradient(45deg,#282828 25%,transparent 25%),linear-gradient(-45deg,#282828 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#282828 75%),linear-gradient(-45deg,transparent 75%,#282828 75%);background-size:16px 16px;background-position:0 0,0 8px,8px -8px,-8px 0}.panel-hero-card strong{font-size:.72rem}.panel-hero-card p{color:#777;font-size:.7rem;line-height:1.55;margin:5px 0}.tool-pair{display:grid;grid-template-columns:1fr 1fr;gap:9px}.brush-tool{height:73px;border:1px solid #333;background:#151515;border-radius:8px;color:#888;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:7px}.brush-tool i{font-size:1.3rem}.brush-tool strong{font-size:.68rem}.brush-tool.active{border:2px solid #3b82f6;color:#fff;background:#111c2a}.brush-tool.active i{color:#3b82f6}.range-row{margin:20px 0}.range-row>div,.adjust-control>div{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}.range-row label,.adjust-control label{font-size:.7rem;color:#999}.range-row output,.adjust-control output{font-size:.67rem;color:#fff}.range-row input,.adjust-control input{width:100%;accent-color:#3b82f6}.toggle-row{display:flex;align-items:center;justify-content:space-between;color:#999;font-size:.7rem;padding-bottom:20px}.toggle-row input{display:none}.toggle-row i{width:38px;height:22px;border-radius:15px;background:#333;position:relative}.toggle-row i:after{content:"";position:absolute;width:16px;height:16px;border-radius:50%;background:#aaa;top:3px;left:3px;transition:.2s}.toggle-row input:checked+i{background:#3b82f6}.toggle-row input:checked+i:after{left:19px;background:#fff}.panel-divider{height:1px;background:#252525;margin-bottom:7px}.feature-row,.design-option{width:100%;border:0;border-bottom:1px solid #222;background:transparent;color:#aaa;padding:14px 3px;display:flex;align-items:center;gap:11px;text-align:left}.feature-row>i,.design-option>i{color:#777;width:22px}.feature-row span,.design-option span{flex:1}.feature-row strong,.feature-row small,.design-option b,.design-option small{display:block}.feature-row strong,.design-option b{font-size:.67rem;color:#ccc}.feature-row small,.design-option small{font-size:.58rem;color:#666;margin-top:4px}.feature-row>b{font-size:.56rem;color:#60a5fa}.panel-title{font-size:1rem;font-weight:750;margin-bottom:5px}.panel-subtitle{color:#666;font-size:.67rem;line-height:1.5;margin-bottom:20px}.background-options{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}.bg-choice{border:1px solid #292929;background:#151515;border-radius:9px;padding:8px;color:#888;font-size:.58rem}.bg-choice span{display:block;width:100%;height:45px;border-radius:6px;margin-bottom:7px}.bg-choice.active{border-color:#3b82f6;color:#fff}.transparent-preview{background-color:#161616;background-image:linear-gradient(45deg,#222 25%,transparent 25%),linear-gradient(-45deg,#222 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#222 75%),linear-gradient(-45deg,transparent 75%,#222 75%);background-size:12px 12px;background-position:0 0,0 6px,6px -6px,-6px 0}.gradient-preview{background:linear-gradient(135deg,#2563eb,#111827)}.color-input-row{margin-top:20px;display:flex;justify-content:space-between;align-items:center;color:#888;font-size:.68rem}.color-input-row input{width:43px;height:27px;border:1px solid #333;background:#111;border-radius:6px}.effect-card{display:flex;align-items:center;gap:11px;border:1px solid #292929;background:#151515;border-radius:10px;padding:13px;margin-bottom:9px}.effect-card>i{color:#60a5fa;width:22px}.effect-card span{flex:1}.effect-card b,.effect-card small{display:block}.effect-card b{font-size:.68rem;color:#ccc}.effect-card small{font-size:.58rem;color:#666;margin-top:4px}.effect-card input{accent-color:#3b82f6}.adjust-control{margin:22px 0}.reset-adjust{width:100%;border:1px solid #2b2b2b;background:#151515;color:#999;padding:10px;border-radius:8px;font-size:.65rem}.thumb-strip{display:flex;align-items:center;gap:10px;max-width:1280px;margin:15px auto 0;padding:0 8px}.add-thumb{width:55px;height:55px;border:1px solid #292929;background:#141414;color:#777;border-radius:10px;font-size:1rem}.thumb{width:55px;height:55px;padding:3px;border-radius:10px;border:2px solid #3b82f6;background:#151515}.mini-checker{width:100%;height:100%;border-radius:6px;overflow:hidden;display:flex;align-items:center;justify-content:center}.mini-checker canvas{max-width:100%;max-height:100%}.processing-overlay{position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,.68);backdrop-filter:blur(18px);opacity:0;visibility:hidden;transition:.25s}.processing-overlay.show{opacity:1;visibility:visible}.processing-card{width:min(410px,calc(100% - 30px));background:#111;border:1px solid #333;border-radius:20px;padding:34px;text-align:center;box-shadow:0 35px 100px #000}.ai-loader{width:68px;height:68px;border-radius:50%;border:2px solid #222;position:relative;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;color:#60a5fa}.ai-loader span{position:absolute;inset:-3px;border-radius:50%;border:2px solid transparent;border-top-color:#3b82f6;border-right-color:#60a5fa;animation:spin .8s linear infinite}.ai-loader i{font-size:1.25rem}.processing-label{font-size:.59rem;font-weight:800;letter-spacing:1.5px;color:#60a5fa}.processing-card h3{font-size:1.15rem;margin:8px 0}.processing-card p{font-size:.7rem;color:#666;margin-bottom:20px}.progress-track{height:6px;background:#242424;border-radius:10px;overflow:hidden}.progress-bar{height:100%;width:0;background:#3b82f6;transition:width .2s}.progress-meta{display:flex;justify-content:space-between;margin-top:9px;font-size:.6rem;color:#666}.progress-meta strong{color:#60a5fa}@keyframes spin{to{transform:rotate(360deg)}}
@media(max-width:900px){.editor-tabs{overflow-x:auto}.editor-tab{white-space:nowrap}.editor-body{grid-template-columns:1fr}.settings-panel{border-left:0;border-top:1px solid #262626;max-height:420px}.settings-scroll{max-height:420px}.stage-wrap{min-height:500px}.editor-heading h1{font-size:2.6rem}}
@media(max-width:600px){.bg-hero{padding-top:100px}.editor-heading h1{font-size:2.15rem}.editor-heading p{font-size:.78rem}.design-editor{border-radius:15px}.editor-tabs{height:58px;padding:0 8px}.editor-tab{padding:0 11px;font-size:.65rem}.tab-divider,.top-icon-btn{display:none}.download-top{height:36px;padding:0 12px;font-size:.62rem}.editor-body{min-height:0}.stage-wrap{min-height:400px}.stage-tip{font-size:.5rem}.editor-footer{height:62px}.new-image-btn{padding:8px}.settings-panel{max-height:none}.settings-scroll{max-height:none}.background-options{grid-template-columns:repeat(3,1fr)}}

  </style>



<main class="bg-remover-page">
        <section class="bg-hero">
            <div class="container-fluid px-lg-4">
                <div class="editor-heading"><span class="bg-badge"><i class="fas fa-wand-magic-sparkles"></i> AI
                        BACKGROUND REMOVER</span>
                    <h1>Make your images
                        <span>stand out.</span>
                    </h1>
                    <p>Remove backgrounds
                        with AI, then refine every edge with professional
                        editing tools.</p>
                </div>
                <div class="upload-shell" id="uploadShell">
                    <div class="upload-card">
                        <div class="upload-orb"><i class="fas fa-wand-magic-sparkles"></i></div><span
                            class="upload-kicker">AI POWERED
                            CUTOUT</span>
                        <h2>Remove your
                            background</h2>
                        <p>Upload a photo and PixelFlow
                            will automatically create a clean transparent
                            cutout.</p><label class="main-upload-btn"><i class="fas fa-cloud-arrow-up"></i> Upload
                            Image<input type="file" id="imageInput" accept="image/png,image/jpeg,image/webp,image/gif"
                                hidden></label>
                        <div class="upload-formats"><span>JPG</span><span>PNG</span><span>WEBP</span><span>GIF</span><b><i
                                    class="fas fa-lock"></i> Private &
                                secure</b></div>
                    </div>
                </div>
                <div class="design-editor" id="designEditor" style="display:none">
                    <div class="editor-tabs"><button class="editor-tab active" data-panel="cutout"><i
                                class="fas fa-wand-magic-sparkles"></i><span>Cutout</span></button><button
                            class="editor-tab" data-panel="background"><i
                                class="fas fa-image"></i><span>Background</span></button><button class="editor-tab"
                            data-panel="effects"><i class="fas fa-sparkles"></i><span>Effects</span></button><button
                            class="editor-tab" data-panel="adjust"><i
                                class="fas fa-sliders"></i><span>Adjust</span></button><button class="editor-tab"
                            data-panel="design"><i class="fas fa-shapes"></i><span>Design</span></button><span
                            class="tab-divider"></span><button class="top-icon-btn" id="compareBtn" title="Compare"><i
                                class="fas fa-columns"></i></button><button class="top-icon-btn" id="undoBtn"
                            title="Undo"><i class="fas fa-rotate-left"></i></button><button class="top-icon-btn"
                            id="redoBtn" title="Redo"><i class="fas fa-rotate-right"></i></button><button
                            class="download-top" id="downloadTop">Download
                            <i class="fas fa-chevron-down"></i></button></div>
                    <div class="editor-body">
                        <div class="stage-column">
                            <div class="stage-topline">
                                <div><span class="online-dot"></span><span id="stageStatus">Ready to remove
                                        background</span></div>
                                <div class="zoom-controls"><button id="zoomOut"><i class="fas fa-minus"></i></button><span
                                        id="zoomLabel">100%</span><button id="zoomIn"><i
                                            class="fas fa-plus"></i></button></div>
                            </div>
                            <div class="stage-wrap" id="stageWrap">
                                <div class="stage-checker"></div><canvas id="editCanvas"></canvas>
                                <div class="brush-cursor" id="brushCursor"></div><canvas id="compareCanvas"></canvas><button
                                    class="compare-close" id="compareClose"><i class="fas fa-xmark"></i></button>
                                <div class="empty-editor" id="emptyEditor"><i class="fas fa-cloud-arrow-up"></i>
                                    <h3>Upload
                                        an image</h3>
                                    <p>Drop your image here
                                        or choose a file to start</p><button id="uploadBtn"><i class="fas fa-plus"></i>
                                        Upload
                                        Image</button>
                                </div>
                                <div class="stage-tip"><i class="fas fa-circle-info"></i>
                                    Paint over the image to erase or
                                    restore</div>
                            </div>
                            <div class="editor-footer">
                                <div class="current-file"><span class="file-icon"><i class="fas fa-image"></i></span>
                                    <div><strong id="fileName">No image
                                            selected</strong><small id="fileInfo">PNG, JPG or
                                            WEBP</small></div>
                                </div><button class="new-image-btn" id="newImageBtn"><i class="fas fa-plus"></i> New
                                    Image</button>
                            </div>
                        </div>
                        <aside class="settings-panel">
                            <div class="settings-scroll">
                                <div class="panel-view active" id="panel-cutout">
                                    <div class="panel-hero-card">
                                        <div class="hero-thumb" id="heroThumb"><i class="fas fa-image"></i></div>
                                        <div><strong>Magic
                                                Brush</strong>
                                            <p>Easily
                                                Erase or<br>Restore
                                                Anything</p>
                                        </div>
                                    </div>
                                    <div class="tool-pair"><button class="brush-tool active" data-tool="erase"><i
                                                class="fas fa-minus-circle"></i><strong>Erase</strong></button><button
                                            class="brush-tool" data-tool="restore"><i
                                                class="fas fa-plus-circle"></i><strong>Restore</strong></button></div>
                                    <div class="range-row">
                                        <div><label>Brush
                                                Size</label><output id="brushValue">30</output></div><input id="brushSize"
                                            type="range" min="5" max="100" value="30">
                                    </div><label class="toggle-row"><span>Magic
                                            Brush</span><input type="checkbox" id="magicToggle" checked><i></i></label>
                                    <div class="panel-divider"></div><button class="feature-row"
                                        id="eraseDistractions"><i
                                            class="fas fa-wand-magic-sparkles"></i><span><strong>Erase
                                                distractions</strong><small>Clean
                                                small unwanted
                                                areas</small></span><b>Open</b></button><button class="feature-row"
                                        id="resetCutout"><i class="fas fa-rotate-left"></i><span><strong>Reset
                                                cutout</strong><small>Restore
                                                the AI
                                                result</small></span></button>
                                </div>
                                <div class="panel-view" id="panel-background">
                                    <div class="panel-title">Background</div>
                                    <p class="panel-subtitle">Choose a new
                                        background for your cutout.</p>
                                    <div class="background-options"><button class="bg-choice active"
                                            data-bg="transparent"><span
                                                class="transparent-preview"></span><b>Transparent</b></button><button
                                            class="bg-choice" data-bg="#fff"><span
                                                style="background:#fff"></span><b>White</b></button><button
                                            class="bg-choice" data-bg="#111827"><span
                                                style="background:#111827"></span><b>Dark</b></button><button
                                            class="bg-choice" data-bg="#3b82f6"><span
                                                style="background:#3b82f6"></span><b>Blue</b></button><button
                                            class="bg-choice" data-bg="#f4f4f5"><span
                                                style="background:#f4f4f5"></span><b>Light</b></button><button
                                            class="bg-choice" data-bg="gradient"><span
                                                class="gradient-preview"></span><b>Gradient</b></button></div>
                                    <div class="color-input-row"><label>Custom
                                            color</label><input type="color" id="bgColor" value="#ffffff"></div>
                                </div>
                                <div class="panel-view" id="panel-effects">
                                    <div class="panel-title">Effects</div>
                                    <p class="panel-subtitle">Add a subtle
                                        finish to your cutout.</p><label class="effect-card"><i
                                            class="fas fa-cloud"></i><span><b>Drop
                                                Shadow</b><small>Soft
                                                realistic
                                                shadow</small></span><input type="checkbox"
                                            id="shadowToggle"></label><label class="effect-card"><i
                                            class="fas fa-circle"></i><span><b>Outline</b><small>Clean
                                                subject
                                                border</small></span><input type="checkbox" id="outlineToggle"></label>
                                </div>
                                <div class="panel-view" id="panel-adjust">
                                    <div class="panel-title">Adjust</div>
                                    <p class="panel-subtitle">Fine-tune the
                                        image appearance.</p>
                                    <div class="adjust-control">
                                        <div><label>Brightness</label><output id="brightnessVal">0</output></div><input
                                            type="range" min="-100" max="100" value="0"
                                            id="brightness">
                                    </div>
                                    <div class="adjust-control">
                                        <div><label>Contrast</label><output id="contrastVal">0</output></div><input
                                            type="range" min="-100" max="100" value="0" id="contrast">
                                    </div>
                                    <div class="adjust-control">
                                        <div><label>Saturation</label><output id="saturationVal">0</output></div><input
                                            type="range" min="-100" max="100" value="0"
                                            id="saturation">
                                    </div><button class="reset-adjust" id="resetAdjust">Reset
                                        Adjustments</button>
                                </div>
                                <div class="panel-view" id="panel-design">
                                    <div class="panel-title">Design</div>
                                    <p class="panel-subtitle">Prepare your
                                        cutout for different
                                        uses.</p><button class="design-option" id="fitSubject"><i
                                            class="fas fa-expand"></i><span><b>Fit
                                                subject</b><small>Fit the
                                                cutout inside the
                                                canvas</small></span></button><button class="design-option"
                                        id="flipHorizontal"><i class="fas fa-arrows-left-right"></i><span><b>Flip
                                                horizontal</b><small>Mirror
                                                the
                                                image</small></span></button><button class="design-option"
                                        id="centerSubject"><i class="fas fa-crosshairs"></i><span><b>Center
                                                subject</b><small>Reset the
                                                workspace
                                                view</small></span></button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="thumb-strip"><button class="add-thumb" id="addThumb"><i class="fas fa-plus"></i></button>
                    <div class="thumb active">
                        <div class="mini-checker"><canvas id="thumbCanvas"></canvas></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="processing-overlay" id="processingOverlay">
        <div class="processing-card">
            <div class="ai-loader"><span></span><i class="fas fa-wand-magic-sparkles"></i></div><span
                class="processing-label">AI BACKGROUND REMOVAL</span>
            <h3 id="processingTitle">Analyzing your image</h3>
            <p id="processingText">Loading AI model and preparing the
                image...</p>
            <div class="progress-track">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="progress-meta"><strong id="progressPercent">0%</strong><span>Processing
                    locally</span></div>
        </div>
    </div>
    <script type="module">
        import {
            removeBackground
        } from 'https://cdn.jsdelivr.net/npm/@imgly/background-removal@1.7.0/+esm';
        const $ = s => document.querySelector(s),
            $$ = s => document.querySelectorAll(s);
        const input = $('#imageInput'),
            uploadShell = $('#uploadShell'),
            editor = $('#designEditor'),
            overlay = $('#processingOverlay'),
            progress = $('#progressBar'),
            percent = $('#progressPercent'),
            ptext = $('#processingText'),
            ptitle = $('#processingTitle'),
            canvas = $('#editCanvas'),
            ctx = canvas.getContext('2d'),
            compare = $('#compareCanvas'),
            cctx = compare.getContext('2d'),
            thumb = $('#thumbCanvas'),
            tctx = thumb.getContext('2d'),
            cursor = $('#brushCursor');
        let originalImage = null,
            originalCanvas = null,
            resultImage = null,
            resultBlob = null,
            history = [],
            future = [],
            tool = 'erase',
            drawing = false,
            zoom = 1,
            background = 'transparent',
            brightness = 0,
            contrast = 0,
            saturation = 0,
            shadow = false,
            outline = false;
        const API = window.PIXELFLOW_BG_API || '';
        const loadImage = src => new Promise((resolve, reject) => {
            const i = new Image();
            i.onload = () => resolve(i);
            i.onerror = reject;
            i.src = src
        });

        function prog(v, msg, title = 'Removing background') {
            progress.style.width = v + '%';
            percent.textContent = Math.round(v) + '%';
            ptext.textContent = msg;
            ptitle.textContent = title
        }

        function save() {
            history.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
            if (history.length > 30) history.shift();
            future = []
        }

        function thumbDraw() {
            if (!canvas.width) return;
            const s = Math.min(92 / canvas.width, 120 / canvas.height);
            thumb.width = canvas.width * s;
            thumb.height = canvas.height * s;
            tctx.clearRect(0, 0, thumb.width, thumb.height);
            tctx.drawImage(canvas, 0, 0, thumb.width, thumb.height)
        }

        function view() {
            if (!canvas.width) return;
            const sw = $('#stageWrap'),
                scale = Math.min((sw.clientWidth - 90) / canvas.width, (sw.clientHeight - 90) / canvas.height, 1) * zoom;
            canvas.style.width = canvas.width * scale + 'px';
            canvas.style.height = canvas.height * scale + 'px';
            thumbDraw();
        }
        async function localRemove(file) {
            return await removeBackground(file, {
                model: 'isnet',
                output: {
                    format: 'image/png',
                    quality: 1
                },
                progress: (key, current, total) => {
                    if (total) {
                        const v = 8 + current / total * 86;
                        const msg = key.includes('inference') ? 'Detecting subject and fine edges...' : key
                            .includes('mask') ? 'Refining the transparency mask...' : key.includes(
                            'encode') ? 'Creating transparent PNG...' : 'Loading AI segmentation model...';
                        prog(v, msg)
                    }
                }
            })
        }
        async function removeWithAI(file) {
            if (!API) return localRemove(file);
            try {
                const fd = new FormData();
                fd.append('image', file);
                const r = await fetch(API, {
                    method: 'POST',
                    body: fd
                });
                if (!r.ok) throw new Error('AI endpoint failed');
                return await r.blob()
            } catch (e) {
                console.warn('PixelFlow AI endpoint unavailable, using browser model.', e);
                return localRemove(file)
            }
        }
        async function process(file) {
            overlay.classList.add('show');
            prog(3, 'Preparing your image...', 'Preparing image');
            const srcURL = URL.createObjectURL(file);
            try {
                originalImage = await loadImage(srcURL);
                prog(8, API ? 'Connecting to PixelFlow AI...' : 'Loading high-quality AI segmentation model...',
                    'AI background removal');
                resultBlob = await removeWithAI(file);
                prog(96, 'Refining transparent edges...', 'Finalizing cutout');
                resultImage = await loadImage(URL.createObjectURL(resultBlob));
                canvas.width = resultImage.naturalWidth;
                canvas.height = resultImage.naturalHeight;
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(resultImage, 0, 0);
                originalCanvas = document.createElement('canvas');
                originalCanvas.width = originalImage.naturalWidth;
                originalCanvas.height = originalImage.naturalHeight;
                originalCanvas.getContext('2d').drawImage(originalImage, 0, 0);
                history = [];
                future = [];
                save();
                $('#emptyEditor').classList.add('hidden');
                $('#stageStatus').textContent = 'Background removed • AI cutout ready';
                $('#fileName').textContent = file.name;
                $('#fileInfo').textContent = canvas.width + ' × ' + canvas.height + ' • AI transparent cutout';
                $('#heroThumb').style.backgroundImage = `url(${URL.createObjectURL(resultBlob)})`;
                uploadShell.style.display = 'none';
                editor.style.display = 'block';
                view();
                prog(100, 'Your transparent cutout is ready.', 'Background removed');
                setTimeout(() => overlay.classList.remove('show'), 450)
            } catch (e) {
                console.error(e);
                prog(100, 'Could not process this image. Please try again.', 'Processing failed');
                setTimeout(() => overlay.classList.remove('show'), 1500)
            } finally {
                URL.revokeObjectURL(srcURL)
            }
        }
        input.addEventListener('change', e => e.target.files[0] && process(e.target.files[0]));
        $('#uploadBtn').onclick = () => input.click();
        $('#newImageBtn').onclick = () => input.click();
        $('#addThumb').onclick = () => input.click();
        const designEditor = $('#designEditor');
        designEditor.addEventListener('dragover', e => {
            e.preventDefault();
            designEditor.classList.add('drag-active')
        });
        designEditor.addEventListener('dragleave', () => designEditor.classList.remove('drag-active'));
        designEditor.addEventListener('drop', e => {
            e.preventDefault();
            designEditor.classList.remove('drag-active');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('image/')) process(f)
        });
        uploadShell.addEventListener('dragover', e => {
            e.preventDefault();
            uploadShell.classList.add('drag-active')
        });
        uploadShell.addEventListener('dragleave', () => uploadShell.classList.remove('drag-active'));
        uploadShell.addEventListener('drop', e => {
            e.preventDefault();
            uploadShell.classList.remove('drag-active');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('image/')) process(f)
        });
        $$('.editor-tab').forEach(tab => tab.onclick = () => {
            $$('.editor-tab').forEach(x => x.classList.remove('active'));
            tab.classList.add('active');
            $$('.panel-view').forEach(x => x.classList.remove('active'));
            $('#panel-' + tab.dataset.panel).classList.add('active')
        });
        $$('.brush-tool').forEach(b => b.onclick = () => {
            $$('.brush-tool').forEach(x => x.classList.remove('active'));
            b.classList.add('active');
            tool = b.dataset.tool;
            $('#stageStatus').textContent = tool === 'erase' ? 'Erase mode • Paint unwanted areas' :
                'Restore mode • Paint areas back';
        });
        $('#brushSize').oninput = e => {
            $('#brushValue').textContent = e.target.value;
            cursor.style.width = e.target.value + 'px';
            cursor.style.height = e.target.value + 'px'
        };

        function updateCursor(e) {
            const r = canvas.getBoundingClientRect();
            cursor.style.left = (e.clientX - r.left) + 'px';
            cursor.style.top = (e.clientY - r.top) + 'px';
            cursor.style.display = 'block';
            cursor.classList.toggle('restore', tool === 'restore')
        }
        canvas.addEventListener('pointerenter', updateCursor);
        canvas.addEventListener('pointermove', e => {
            updateCursor(e);
            if (drawing) paint(e)
        });
        canvas.addEventListener('pointerleave', () => cursor.style.display = 'none');

        function paint(e) {
            if (!originalCanvas) return;
            const r = canvas.getBoundingClientRect(),
                x = (e.clientX - r.left) * canvas.width / r.width,
                y = (e.clientY - r.top) * canvas.height / r.height,
                s = +$('#brushSize').value * canvas.width / r.width;
            ctx.save();
            ctx.beginPath();
            ctx.arc(x, y, s / 2, 0, Math.PI * 2);
            if (tool === 'erase') {
                ctx.globalCompositeOperation = 'destination-out';
                ctx.fill()
            } else {
                ctx.globalCompositeOperation = 'source-over';
                ctx.clip();
                ctx.drawImage(originalCanvas, 0, 0)
            }
            ctx.restore();
            view();
            updateCursor(e)
        }
        canvas.onpointerdown = e => {
            drawing = true;
            canvas.setPointerCapture(e.pointerId);
            paint(e)
        };
        canvas.onpointerup = () => {
            if (drawing) {
                save();
                drawing = false
            }
        };
        canvas.onpointercancel = () => drawing = false;
        $('#undoBtn').onclick = () => {
            if (history.length > 1) {
                future.push(history.pop());
                ctx.putImageData(history[history.length - 1], 0, 0);
                view()
            }
        };
        $('#redoBtn').onclick = () => {
            if (future.length) {
                const d = future.pop();
                history.push(d);
                ctx.putImageData(d, 0, 0);
                view()
            }
        };
        $('#resetCutout').onclick = () => {
            if (resultImage) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(resultImage, 0, 0);
                save();
                view()
            }
        };
        $('#zoomIn').onclick = () => {
            zoom = Math.min(1.8, zoom + .1);
            $('#zoomLabel').textContent = Math.round(zoom * 100) + '%';
            view()
        };
        $('#zoomOut').onclick = () => {
            zoom = Math.max(.5, zoom - .1);
            $('#zoomLabel').textContent = Math.round(zoom * 100) + '%';
            view()
        };
        $$('.bg-choice').forEach(b => b.onclick = () => {
            $$('.bg-choice').forEach(x => x.classList.remove('active'));
            b.classList.add('active');
            background = b.dataset.bg;
            $('#stageWrap').style.setProperty('--custom-bg', background === 'gradient' ?
                'linear-gradient(135deg,#2563eb,#111827)' : background)
        });
        $('#bgColor').oninput = e => {
            $('#stageWrap').style.setProperty('--custom-bg', e.target.value);
            background = e.target.value
        };

        function filters() {
            canvas.style.filter = `brightness(${100+brightness}%) contrast(${100+contrast}%) saturate(${100+saturation}%)`
        };
        [
            ['brightness', 'brightnessVal'],
            ['contrast', 'contrastVal'],
            ['saturation', 'saturationVal']
        ].forEach(([a, b]) => $('#' + a).oninput = e => {
            window[a] = +e.target.value;
            $('#' + b).textContent = e.target.value;
            filters()
        });
        $('#resetAdjust').onclick = () => {
            brightness = contrast = saturation = 0;
            ['brightness', 'contrast', 'saturation'].forEach(x => $('#' + x).value = 0);
            ['brightnessVal', 'contrastVal', 'saturationVal'].forEach(x => $('#' + x).textContent = '0');
            filters()
        };
        $('#shadowToggle').onchange = e => shadow = e.target.checked;
        $('#outlineToggle').onchange = e => outline = e.target.checked;
        $('#compareBtn').onclick = () => {
            if (!originalImage) return;
            compare.width = originalImage.naturalWidth;
            compare.height = originalImage.naturalHeight;
            cctx.drawImage(originalImage, 0, 0);
            compare.style.display = 'block';
            $('#compareClose').style.display = 'flex'
        };
        $('#compareClose').onclick = () => {
            compare.style.display = 'none';
            $('#compareClose').style.display = 'none'
        };
        $('#flipHorizontal').onclick = () => canvas.classList.toggle('flipped');
        $('#fitSubject').onclick = () => {
            zoom = 1;
            $('#zoomLabel').textContent = '100%';
            view()
        };
        $('#centerSubject').onclick = () => {
            zoom = 1;
            $('#zoomLabel').textContent = '100%';
            view()
        };
        $('#eraseDistractions').onclick = () => {
            tool = 'erase';
            $$('.brush-tool').forEach(x => x.classList.toggle('active', x.dataset.tool === 'erase'));
            $('#stageStatus').textContent = 'Erase distractions mode'
        };

        function exportCanvas() {
            if (!canvas.width) return;
            const out = document.createElement('canvas');
            out.width = canvas.width;
            out.height = canvas.height;
            const o = out.getContext('2d');
            if (background === 'gradient') {
                const g = o.createLinearGradient(0, 0, out.width, out.height);
                g.addColorStop(0, '#2563eb');
                g.addColorStop(1, '#111827');
                o.fillStyle = g;
                o.fillRect(0, 0, out.width, out.height)
            } else if (background !== 'transparent') {
                o.fillStyle = background;
                o.fillRect(0, 0, out.width, out.height)
            }
            o.filter = `brightness(${100+brightness}%) contrast(${100+contrast}%) saturate(${100+saturation}%)`;
            if (shadow) {
                o.save();
                o.shadowColor = 'rgba(0,0,0,.38)';
                o.shadowBlur = 28;
                o.shadowOffsetY = 14;
                o.drawImage(canvas, 0, 0);
                o.restore()
            } else o.drawImage(canvas, 0, 0);
            return out
        }
        $('#downloadTop').onclick = () => {
            const out = exportCanvas();
            if (out) out.toBlob(b => {
                const a = document.createElement('a');
                a.href = URL.createObjectURL(b);
                a.download = (($('#fileName').textContent || 'image').replace(/\.[^.]+$/, '')) +
                    '-no-background.png';
                a.click()
            }, 'image/png')
        };
        window.addEventListener('resize', view);
        const navbar = $('#morphNavbar');
        window.addEventListener('scroll', () => navbar && navbar.classList.toggle('scrolled', scrollY > 50));
        $('#mobileToggleBtn').onclick = () => $('#navLinksWrapper').classList.toggle('mobile-open');
    </script>
@endsection

