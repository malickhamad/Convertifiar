@extends('components.app')

@section('meta')
    <title>FREE Background Remover: Erase Background | XConvertifire</title>
    <meta name="description" content="Remove image backgrounds for FREE with XConvertifire. Create clean AI cutouts, refine edges, add backgrounds, and download polished images quickly and securely.">
    <meta property="og:title" content="FREE Background Remover: Erase Background | XConvertifire">
    <meta property="og:description" content="Remove image backgrounds for FREE with XConvertifire. Create clean AI cutouts, refine edges, add backgrounds, and download polished images quickly and securely.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('image.background_remover') }}">
    <meta property="og:site_name" content="XConvertifire">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="XConvertifire logo">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FREE Background Remover: Erase Background | XConvertifire">
    <meta name="twitter:description" content="Remove image backgrounds for FREE with XConvertifire. Create clean AI cutouts, refine edges, add backgrounds, and download polished images quickly and securely.">
    <meta name="twitter:url" content="{{ route('image.background_remover') }}">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <meta name="twitter:image:alt" content="XConvertifire logo">
@endsection

@section('content')
    <style>
        /* ========== X Convertifire AI Background Remover: black theme ========== */
        .bg-remover-page {
            min-height: 100vh;
            background: #080808;
            color: #f4f4f5
        }

        .bg-hero {
            padding: 115px 0 65px
        }

        .editor-heading {
            text-align: center;
            margin: 0 auto 28px;
            max-width: 850px
        }

        .bg-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border: 1px solid #262626;
            border-radius: 30px;
            background: #111;
            color: #bdbdbd;
            font-size: .68rem;
            font-weight: 800;
            letter-spacing: 1px
        }

        .bg-badge i {
            color: #60a5fa
        }

        .editor-heading h1 {
            font-size: 3.25rem;
            font-weight: 800;
            letter-spacing: -1.8px;
            margin: 17px 0 10px;
            background: linear-gradient(90deg, #fff, #858585);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .editor-heading h1 span {
            background: linear-gradient(90deg, #fff, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .editor-heading p {
            color: #737373;
            font-size: .9rem;
            margin: 0
        }

        /* ===== Upload Shell / Card ===== */
        .upload-shell {
            max-width: 620px;
            margin: 0 auto
        }

        .upload-card {
            background: linear-gradient(180deg, #141414 0%, #0d0d0d 100%);
            border: 1px solid #262626;
            border-radius: 24px;
            padding: 44px 34px;
            text-align: center;
            box-shadow: 0 30px 100px rgba(0, 0, 0, .5), inset 0 1px 0 rgba(255, 255, 255, .03)
        }

        .upload-orb {
            width: 76px;
            height: 76px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(59, 130, 246, .35), rgba(59, 130, 246, .05));
            border: 1px solid rgba(59, 130, 246, .35);
            color: #60a5fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 1.7rem;
            box-shadow: 0 0 40px rgba(59, 130, 246, .25)
        }

        .upload-kicker {
            display: inline-block;
            font-size: .6rem;
            font-weight: 800;
            letter-spacing: 2px;
            color: #60a5fa;
            margin-bottom: 10px
        }

        .upload-card h2 {
            font-size: 1.7rem;
            font-weight: 750;
            margin: 0 0 10px;
            color: #fff;
            letter-spacing: -.5px
        }

        .upload-card p {
            color: #737373;
            font-size: .82rem;
            line-height: 1.6;
            margin: 0 0 24px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto
        }

        .main-upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff;
            border-radius: 12px;
            padding: 14px 26px;
            font-size: .82rem;
            font-weight: 750;
            cursor: pointer;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
            box-shadow: 0 6px 24px rgba(59, 130, 246, .35), inset 0 1px 0 rgba(255, 255, 255, .15)
        }

        .main-upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(59, 130, 246, .5), inset 0 1px 0 rgba(255, 255, 255, .2)
        }

        .upload-formats {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 22px;
            font-size: .6rem;
            color: #666
        }

        .upload-formats span {
            padding: 4px 9px;
            border: 1px solid #292929;
            border-radius: 6px;
            background: #151515;
            font-weight: 700;
            letter-spacing: .5px
        }

        .upload-formats b {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-left: 6px;
            color: #4ade80;
            font-weight: 700
        }

        .upload-formats b i {
            font-size: .6rem
        }

        .upload-shell.drag-active .upload-card {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, .2), 0 30px 100px rgba(0, 0, 0, .5)
        }

        /* ===== Editor ===== */
        .design-editor {
            max-width: 1280px;
            margin: auto;
            background: #111;
            border: 1px solid #272727;
            border-radius: 22px;
            box-shadow: 0 30px 100px rgba(0, 0, 0, .5);
            overflow: hidden
        }

        .editor-tabs {
            height: 66px;
            border-bottom: 1px solid #262626;
            display: flex;
            align-items: center;
            padding: 0 14px;
            gap: 3px;
            background: #111
        }

        .editor-tab {
            height: 44px;
            border: 0;
            border-radius: 22px;
            background: transparent;
            color: #999;
            padding: 0 15px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: .75rem;
            font-weight: 650;
            transition: .2s;
            cursor: pointer;
            font-family: inherit
        }

        .editor-tab i {
            color: #777
        }

        .editor-tab:hover {
            color: #eee;
            background: #181818
        }

        .editor-tab.active {
            color: #fff;
            background: #20252a
        }

        .editor-tab.active i {
            color: #60a5fa
        }

        .tab-divider {
            height: 25px;
            width: 1px;
            background: #2a2a2a;
            margin: 0 10px
        }

        .top-icon-btn {
            width: 38px;
            height: 38px;
            border: 0;
            background: transparent;
            color: #777;
            border-radius: 10px;
            cursor: pointer;
            font-family: inherit
        }

        .top-icon-btn:hover {
            background: #1b1b1b;
            color: #fff
        }

        .download-top {
            margin-left: auto;
            border: 0;
            border-radius: 22px;
            background: #3b82f6;
            color: #fff;
            height: 42px;
            padding: 0 18px;
            font-size: .75rem;
            font-weight: 750;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-family: inherit
        }

        .download-top:hover {
            background: #2563eb
        }

        .editor-body {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 325px;
            min-height: 650px
        }

        .stage-column {
            min-width: 0;
            display: flex;
            flex-direction: column
        }

        .stage-topline {
            height: 48px;
            border-bottom: 1px solid #222;
            padding: 0 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #777;
            font-size: .66rem
        }

        .online-dot {
            width: 6px;
            height: 6px;
            background: #4ade80;
            display: inline-block;
            border-radius: 50%;
            box-shadow: 0 0 8px #4ade80;
            margin-right: 7px
        }

        .zoom-controls {
            display: flex;
            align-items: center;
            gap: 7px
        }

        .zoom-controls button {
            width: 27px;
            height: 27px;
            border: 1px solid #2b2b2b;
            background: #161616;
            color: #888;
            border-radius: 7px;
            cursor: pointer;
            font-family: inherit
        }

        .zoom-controls button:hover {
            color: #fff
        }

        .zoom-controls span {
            min-width: 38px;
            text-align: center
        }

        .stage-wrap {
            position: relative;
            flex: 1;
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto;
            background: #0b0b0b
        }

        .stage-checker,
        .mini-checker {
            background-color: #141414;
            background-image: linear-gradient(45deg, #1d1d1d 25%, transparent 25%), linear-gradient(-45deg, #1d1d1d 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #1d1d1d 75%), linear-gradient(-45deg, transparent 75%, #1d1d1d 75%);
            background-size: 22px 22px;
            background-position: 0 0, 0 11px, 11px -11px, -11px 0
        }

        .stage-checker {
            position: absolute;
            inset: 0
        }

        #editCanvas {
            position: relative;
            z-index: 3;
            max-width: calc(100% - 80px);
            max-height: calc(100% - 80px);
            cursor: crosshair;
            touch-action: none;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .4);
            transition: filter .15s
        }

        #editCanvas.flipped {
            transform: scaleX(-1)
        }

        #compareCanvas {
            display: none;
            position: absolute;
            z-index: 8;
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            box-shadow: 0 20px 50px #000
        }

        .compare-close {
            display: none;
            position: absolute;
            right: 18px;
            top: 18px;
            z-index: 9;
            width: 34px;
            height: 34px;
            border: 1px solid #444;
            background: #111;
            color: #fff;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            cursor: pointer
        }

        .brush-cursor {
            position: absolute;
            z-index: 10;
            pointer-events: none;
            border: 2px solid rgba(255, 255, 255, .9);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            display: none;
            mix-blend-mode: difference;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .4)
        }

        .brush-cursor.restore {
            border-color: rgba(96, 165, 250, .95);
            mix-blend-mode: normal
        }

        .stage-tip {
            position: absolute;
            z-index: 5;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
            padding: 7px 12px;
            border: 1px solid #2b2b2b;
            background: rgba(12, 12, 12, .85);
            color: #777;
            border-radius: 20px;
            font-size: .6rem;
            white-space: nowrap
        }

        .empty-editor {
            position: relative;
            z-index: 6;
            text-align: center
        }

        .empty-editor>i {
            width: 62px;
            height: 62px;
            border: 1px solid #2b2b2b;
            background: #141414;
            color: #60a5fa;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.5rem
        }

        .empty-editor h3 {
            font-size: 1.1rem;
            margin: 0 0 6px
        }

        .empty-editor p {
            font-size: .7rem;
            color: #666;
            margin-bottom: 17px
        }

        .empty-editor button {
            border: 0;
            background: #3b82f6;
            color: #fff;
            border-radius: 10px;
            padding: 11px 17px;
            font-size: .72rem;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit
        }

        .empty-editor.hidden {
            display: none
        }

        .editor-footer {
            height: 70px;
            border-top: 1px solid #242424;
            padding: 0 16px;
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .current-file {
            display: flex;
            align-items: center;
            gap: 9px;
            min-width: 0
        }

        .file-icon {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: #171717;
            color: #60a5fa;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .current-file strong,
        .current-file small {
            display: block;
            max-width: 230px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .current-file strong {
            font-size: .68rem
        }

        .current-file small {
            font-size: .6rem;
            color: #666;
            margin-top: 3px
        }

        .new-image-btn {
            border: 1px solid #292929;
            background: #151515;
            color: #aaa;
            border-radius: 9px;
            padding: 9px 12px;
            font-size: .66rem;
            cursor: pointer;
            font-family: inherit
        }

        .new-image-btn:hover {
            color: #fff;
            border-color: #444
        }

        /* ===== Settings panel ===== */
        .settings-panel {
            border-left: 1px solid #262626;
            background: #101010;
            min-width: 0
        }

        .settings-scroll {
            height: 100%;
            overflow: auto;
            padding: 20px
        }

        .panel-view {
            display: none
        }

        .panel-view.active {
            display: block
        }

        .panel-hero-card {
            height: 100px;
            background: #171717;
            border: 1px solid #272727;
            border-radius: 11px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px;
            margin-bottom: 14px
        }

        .hero-thumb {
            width: 86px;
            height: 80px;
            border-radius: 7px;
            background: #202020 center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            background-image: linear-gradient(45deg, #282828 25%, transparent 25%), linear-gradient(-45deg, #282828 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #282828 75%), linear-gradient(-45deg, transparent 75%, #282828 75%);
            background-size: 16px 16px;
            background-position: 0 0, 0 8px, 8px -8px, -8px 0
        }

        .panel-hero-card strong {
            font-size: .72rem
        }

        .panel-hero-card p {
            color: #777;
            font-size: .7rem;
            line-height: 1.55;
            margin: 5px 0
        }

        .tool-pair {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 9px
        }

        .brush-tool {
            height: 73px;
            border: 1px solid #333;
            background: #151515;
            border-radius: 8px;
            color: #888;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 7px;
            cursor: pointer;
            font-family: inherit
        }

        .brush-tool i {
            font-size: 1.3rem
        }

        .brush-tool strong {
            font-size: .68rem
        }

        .brush-tool.active {
            border: 2px solid #3b82f6;
            color: #fff;
            background: #111c2a
        }

        .brush-tool.active i {
            color: #3b82f6
        }

        .range-row {
            margin: 20px 0
        }

        .range-row>div,
        .adjust-control>div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px
        }

        .range-row label,
        .adjust-control label {
            font-size: .7rem;
            color: #999
        }

        .range-row output,
        .adjust-control output {
            font-size: .67rem;
            color: #fff
        }

        .range-row input,
        .adjust-control input {
            width: 100%;
            accent-color: #3b82f6
        }

        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #999;
            font-size: .7rem;
            padding-bottom: 20px;
            cursor: pointer
        }

        .toggle-row input {
            display: none
        }

        .toggle-row i {
            width: 38px;
            height: 22px;
            border-radius: 15px;
            background: #333;
            position: relative;
            transition: .2s
        }

        .toggle-row i:after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #aaa;
            top: 3px;
            left: 3px;
            transition: .2s
        }

        .toggle-row input:checked+i {
            background: #3b82f6
        }

        .toggle-row input:checked+i:after {
            left: 19px;
            background: #fff
        }

        .panel-divider {
            height: 1px;
            background: #252525;
            margin-bottom: 7px
        }

        .feature-row,
        .design-option {
            width: 100%;
            border: 0;
            border-bottom: 1px solid #222;
            background: transparent;
            color: #aaa;
            padding: 14px 3px;
            display: flex;
            align-items: center;
            gap: 11px;
            text-align: left;
            cursor: pointer;
            font-family: inherit
        }

        .feature-row>i,
        .design-option>i {
            color: #777;
            width: 22px
        }

        .feature-row span,
        .design-option span {
            flex: 1
        }

        .feature-row strong,
        .feature-row small,
        .design-option b,
        .design-option small {
            display: block
        }

        .feature-row strong,
        .design-option b {
            font-size: .67rem;
            color: #ccc
        }

        .feature-row small,
        .design-option small {
            font-size: .58rem;
            color: #666;
            margin-top: 4px
        }

        .feature-row>b {
            font-size: .56rem;
            color: #60a5fa
        }

        .panel-title {
            font-size: 1rem;
            font-weight: 750;
            margin-bottom: 5px
        }

        .panel-subtitle {
            color: #666;
            font-size: .67rem;
            line-height: 1.5;
            margin-bottom: 20px
        }

        .background-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px
        }

        .bg-choice {
            border: 1px solid #292929;
            background: #151515;
            border-radius: 9px;
            padding: 8px;
            color: #888;
            font-size: .58rem;
            cursor: pointer;
            font-family: inherit
        }

        .bg-choice span {
            display: block;
            width: 100%;
            height: 45px;
            border-radius: 6px;
            margin-bottom: 7px
        }

        .bg-choice.active {
            border-color: #3b82f6;
            color: #fff
        }

        .transparent-preview {
            background-color: #161616;
            background-image: linear-gradient(45deg, #222 25%, transparent 25%), linear-gradient(-45deg, #222 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #222 75%), linear-gradient(-45deg, transparent 75%, #222 75%);
            background-size: 12px 12px;
            background-position: 0 0, 0 6px, 6px -6px, -6px 0
        }

        .gradient-preview {
            background: linear-gradient(135deg, #2563eb, #111827)
        }

        .color-input-row {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #888;
            font-size: .68rem
        }

        .color-input-row input {
            width: 43px;
            height: 27px;
            border: 1px solid #333;
            background: #111;
            border-radius: 6px;
            cursor: pointer
        }

        .effect-card {
            display: flex;
            align-items: center;
            gap: 11px;
            border: 1px solid #292929;
            background: #151515;
            border-radius: 10px;
            padding: 13px;
            margin-bottom: 9px;
            cursor: pointer
        }

        .effect-card>i {
            color: #60a5fa;
            width: 22px
        }

        .effect-card span {
            flex: 1
        }

        .effect-card b,
        .effect-card small {
            display: block
        }

        .effect-card b {
            font-size: .68rem;
            color: #ccc
        }

        .effect-card small {
            font-size: .58rem;
            color: #666;
            margin-top: 4px
        }

        .effect-card input {
            accent-color: #3b82f6;
            cursor: pointer
        }

        .adjust-control {
            margin: 22px 0
        }

        .reset-adjust {
            width: 100%;
            border: 1px solid #2b2b2b;
            background: #151515;
            color: #999;
            padding: 10px;
            border-radius: 8px;
            font-size: .65rem;
            cursor: pointer;
            font-family: inherit
        }

        .reset-adjust:hover {
            color: #fff;
            border-color: #444
        }

        /* ===== Thumb strip ===== */
        .thumb-strip {
            display: flex;
            align-items: center;
            gap: 10px;
            max-width: 1280px;
            margin: 15px auto 0;
            padding: 0 8px
        }

        .add-thumb {
            width: 55px;
            height: 55px;
            border: 1px solid #292929;
            background: #141414;
            color: #777;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer
        }

        .add-thumb:hover {
            color: #fff;
            border-color: #444
        }

        .thumb {
            width: 55px;
            height: 55px;
            padding: 3px;
            border-radius: 10px;
            border: 2px solid #3b82f6;
            background: #151515
        }

        .mini-checker {
            width: 100%;
            height: 100%;
            border-radius: 6px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .mini-checker canvas {
            max-width: 100%;
            max-height: 100%
        }

        /* ===== Processing overlay ===== */
        .processing-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, .68);
            backdrop-filter: blur(18px);
            opacity: 0;
            visibility: hidden;
            transition: .25s
        }

        .processing-overlay.show {
            opacity: 1;
            visibility: visible
        }

        .processing-card {
            width: min(410px, calc(100% - 30px));
            background: #111;
            border: 1px solid #333;
            border-radius: 20px;
            padding: 34px;
            text-align: center;
            box-shadow: 0 35px 100px #000
        }

        .ai-loader {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            border: 2px solid #222;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #60a5fa
        }

        .ai-loader span {
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: #3b82f6;
            border-right-color: #60a5fa;
            animation: spin .8s linear infinite
        }

        .ai-loader i {
            font-size: 1.25rem
        }

        .processing-label {
            font-size: .59rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #60a5fa
        }

        .processing-card h3 {
            font-size: 1.15rem;
            margin: 8px 0;
            color: #fff
        }

        .processing-card p {
            font-size: .7rem;
            color: #666;
            margin-bottom: 20px
        }

        .progress-track {
            height: 6px;
            background: #242424;
            border-radius: 10px;
            overflow: hidden
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background: #3b82f6;
            transition: width .2s
        }

        .progress-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 9px;
            font-size: .6rem;
            color: #666
        }

        .progress-meta strong {
            color: #60a5fa
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }

        @media(max-width:900px) {
            .editor-tabs {
                overflow-x: auto
            }

            .editor-tab {
                white-space: nowrap
            }

            .editor-body {
                grid-template-columns: 1fr
            }

            .settings-panel {
                border-left: 0;
                border-top: 1px solid #262626;
                max-height: 420px
            }

            .settings-scroll {
                max-height: 420px
            }

            .stage-wrap {
                min-height: 500px
            }

            .editor-heading h1 {
                font-size: 2.6rem
            }
        }

        @media(max-width:600px) {
            .bg-hero {
                padding-top: 100px
            }

            .editor-heading h1 {
                font-size: 2.15rem
            }

            .editor-heading p {
                font-size: .78rem
            }

            .design-editor {
                border-radius: 15px
            }

            .editor-tabs {
                height: 58px;
                padding: 0 8px
            }

            .editor-tab {
                padding: 0 11px;
                font-size: .65rem
            }

            .tab-divider,
            .top-icon-btn {
                display: none
            }

            .download-top {
                height: 36px;
                padding: 0 12px;
                font-size: .62rem
            }

            .editor-body {
                min-height: 0
            }

            .stage-wrap {
                min-height: 400px
            }

            .stage-tip {
                font-size: .5rem
            }

            .editor-footer {
                height: 62px
            }

            .new-image-btn {
                padding: 8px
            }

            .settings-panel {
                max-height: none
            }

            .settings-scroll {
                max-height: none
            }

            .background-options {
                grid-template-columns: repeat(3, 1fr)
            }

            .upload-card {
                padding: 32px 20px
            }
        }

        .background-remover-seo-section {
            padding: 64px 20px 80px;
            border-top: 1px solid #262626;
            background: #0b0b0b
        }

        .background-remover-seo-section .seo-content {
            max-width: 960px;
            margin: 0 auto
        }

        .background-remover-seo-section h2 {
            margin: 42px 0 16px;
            color: #f4f4f5;
            font-size: clamp(1.45rem, 3vw, 2rem);
            font-weight: 750;
            line-height: 1.25
        }

        .background-remover-seo-section h2:first-child {
            margin-top: 0
        }

        .background-remover-seo-section h3 {
            margin: 26px 0 10px;
            color: #e4e4e7;
            font-size: 1.15rem;
            font-weight: 700
        }

        .background-remover-seo-section p,
        .background-remover-seo-section li {
            color: #b8b8c0;
            font-size: 1rem;
            line-height: 1.8
        }

        .background-remover-seo-section p {
            margin: 0 0 16px
        }

        .background-remover-seo-section ul,
        .background-remover-seo-section ol {
            padding-left: 1.4rem;
            margin: 0 0 20px
        }

        .background-remover-seo-section li {
            padding-left: 4px;
            margin: 0 0 8px
        }

        .background-remover-seo-section a {
            color: #93c5fd;
            text-decoration: underline;
            text-decoration-color: rgba(147, 197, 253, .45);
            text-underline-offset: 3px
        }

        .background-remover-seo-section a:hover {
            color: #bfdbfe;
            text-decoration-color: currentColor
        }

        .background-remover-seo-section .seo-faq-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px
        }

        .background-remover-seo-section .seo-faq-list details {
            padding: 17px 18px;
            border: 1px solid #292929;
            border-radius: 12px;
            background: #111
        }

        .background-remover-seo-section .seo-faq-list summary {
            color: #f4f4f5;
            font-weight: 650;
            line-height: 1.5;
            cursor: pointer
        }

        .background-remover-seo-section .seo-faq-list p {
            margin: 12px 0 0;
            font-size: .95rem
        }

        .background-remover-seo-section .seo-cta {
            margin-top: 48px;
            padding: 28px;
            border: 1px solid rgba(59, 130, 246, .35);
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(37, 99, 235, .14), rgba(17, 24, 39, .55));
            text-align: center
        }

        .background-remover-seo-section .seo-cta h2 {
            margin: 0 0 10px
        }

        .background-remover-seo-section .seo-cta-link {
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
            text-decoration: none
        }

        .background-remover-seo-section .seo-cta-link:hover {
            background: #1d4ed8;
            color: #fff
        }

        @media (max-width: 640px) {
            .background-remover-seo-section {
                padding: 44px 16px 56px
            }

            .background-remover-seo-section .seo-faq-list {
                grid-template-columns: 1fr
            }

            .background-remover-seo-section .seo-cta {
                padding: 22px 18px
            }
        }
    </style>

    <main class="bg-remover-page">
        <section class="bg-hero">
            <div class="container-fluid px-lg-4">
                <div class="editor-heading">
                    <span class="bg-badge"><i class="fas fa-wand-magic-sparkles"></i> AI BACKGROUND REMOVER</span>
                    <h1>AI Background Remover <span>Online</span></h1>
                    <p>Remove backgrounds with AI, then refine every edge with professional editing tools.</p>
                </div>

                <div class="upload-shell" id="uploadShell">
                    <div class="upload-card">
                        <div class="upload-orb"><i class="fas fa-wand-magic-sparkles"></i></div>
                        <span class="upload-kicker">AI POWERED CUTOUT</span>
                        <h2>Remove your background</h2>
                        <p>Upload a photo and X Convertifire will automatically create a clean transparent cutout.</p>
                        <label class="main-upload-btn">
                            <i class="fas fa-cloud-arrow-up"></i> Upload Image
                            <input type="file" id="imageInput" accept="image/png,image/jpeg,image/webp,image/gif" hidden>
                        </label>
                        <div class="upload-formats">
                            <span>JPG</span><span>PNG</span><span>WEBP</span><span>GIF</span>
                            <b><i class="fas fa-lock"></i> Private &amp; secure</b>
                        </div>
                    </div>
                </div>

                <div class="design-editor" id="designEditor" style="display:none">
                    <div class="editor-tabs">
                        <button class="editor-tab active" data-panel="cutout"><i
                                class="fas fa-wand-magic-sparkles"></i><span>Cutout</span></button>
                        <button class="editor-tab" data-panel="background"><i
                                class="fas fa-image"></i><span>Background</span></button>
                        <button class="editor-tab" data-panel="effects"><i
                                class="fas fa-sparkles"></i><span>Effects</span></button>
                        <button class="editor-tab" data-panel="adjust"><i
                                class="fas fa-sliders"></i><span>Adjust</span></button>
                        <button class="editor-tab" data-panel="design"><i
                                class="fas fa-shapes"></i><span>Design</span></button>
                        <span class="tab-divider"></span>
                        <button class="top-icon-btn" id="compareBtn" title="Compare"><i class="fas fa-columns"></i></button>
                        <button class="top-icon-btn" id="undoBtn" title="Undo"><i
                                class="fas fa-rotate-left"></i></button>
                        <button class="top-icon-btn" id="redoBtn" title="Redo"><i
                                class="fas fa-rotate-right"></i></button>
                        <button class="download-top" id="downloadTop">Download <i class="fas fa-chevron-down"></i></button>
                    </div>
                    <div class="editor-body">
                        <div class="stage-column">
                            <div class="stage-topline">
                                <div><span class="online-dot"></span><span id="stageStatus">Ready to remove
                                        background</span></div>
                                <div class="zoom-controls">
                                    <button id="zoomOut"><i class="fas fa-minus"></i></button>
                                    <span id="zoomLabel">100%</span>
                                    <button id="zoomIn"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="stage-wrap" id="stageWrap">
                                <div class="stage-checker"></div>
                                <canvas id="editCanvas"></canvas>
                                <div class="brush-cursor" id="brushCursor"></div>
                                <canvas id="compareCanvas"></canvas>
                                <button class="compare-close" id="compareClose"><i class="fas fa-xmark"></i></button>
                                <div class="empty-editor" id="emptyEditor">
                                    <i class="fas fa-cloud-arrow-up"></i>
                                    <h3>Upload an image</h3>
                                    <p>Drop your image here or choose a file to start</p>
                                    <button id="uploadBtn"><i class="fas fa-plus"></i> Upload Image</button>
                                </div>
                                <div class="stage-tip"><i class="fas fa-circle-info"></i> Paint over the image to erase or
                                    restore</div>
                            </div>
                            <div class="editor-footer">
                                <div class="current-file">
                                    <span class="file-icon"><i class="fas fa-image"></i></span>
                                    <div>
                                        <strong id="fileName">No image selected</strong>
                                        <small id="fileInfo">PNG, JPG or WEBP</small>
                                    </div>
                                </div>
                                <button class="new-image-btn" id="newImageBtn"><i class="fas fa-plus"></i> New
                                    Image</button>
                            </div>
                        </div>
                        <aside class="settings-panel">
                            <div class="settings-scroll">
                                <div class="panel-view active" id="panel-cutout">
                                    <div class="panel-hero-card">
                                        <div class="hero-thumb" id="heroThumb"><i class="fas fa-image"></i></div>
                                        <div><strong>Magic Brush</strong>
                                            <p>Easily Erase or<br>Restore Anything</p>
                                        </div>
                                    </div>
                                    <div class="tool-pair">
                                        <button class="brush-tool active" data-tool="erase"><i
                                                class="fas fa-minus-circle"></i><strong>Erase</strong></button>
                                        <button class="brush-tool" data-tool="restore"><i
                                                class="fas fa-plus-circle"></i><strong>Restore</strong></button>
                                    </div>
                                    <div class="range-row">
                                        <div><label>Brush Size</label><output id="brushValue">30</output></div>
                                        <input id="brushSize" type="range" min="5" max="100"
                                            value="30">
                                    </div>
                                    <label class="toggle-row"><span>Magic Brush</span><input type="checkbox"
                                            id="magicToggle" checked><i></i></label>
                                    <div class="panel-divider"></div>
                                    <button class="feature-row" id="eraseDistractions"><i
                                            class="fas fa-wand-magic-sparkles"></i><span><strong>Erase
                                                distractions</strong><small>Clean small unwanted
                                                areas</small></span><b>Open</b></button>
                                    <button class="feature-row" id="resetCutout"><i
                                            class="fas fa-rotate-left"></i><span><strong>Reset
                                                cutout</strong><small>Restore the AI result</small></span></button>
                                </div>
                                <div class="panel-view" id="panel-background">
                                    <div class="panel-title">Background</div>
                                    <p class="panel-subtitle">Choose a new background for your cutout.</p>
                                    <div class="background-options">
                                        <button class="bg-choice active" data-bg="transparent"><span
                                                class="transparent-preview"></span><b>Transparent</b></button>
                                        <button class="bg-choice" data-bg="#fff"><span
                                                style="background:#fff"></span><b>White</b></button>
                                        <button class="bg-choice" data-bg="#111827"><span
                                                style="background:#111827"></span><b>Dark</b></button>
                                        <button class="bg-choice" data-bg="#3b82f6"><span
                                                style="background:#3b82f6"></span><b>Blue</b></button>
                                        <button class="bg-choice" data-bg="#f4f4f5"><span
                                                style="background:#f4f4f5"></span><b>Light</b></button>
                                        <button class="bg-choice" data-bg="gradient"><span
                                                class="gradient-preview"></span><b>Gradient</b></button>
                                    </div>
                                    <div class="color-input-row"><label>Custom color</label><input type="color"
                                            id="bgColor" value="#ffffff"></div>
                                </div>
                                <div class="panel-view" id="panel-effects">
                                    <div class="panel-title">Effects</div>
                                    <p class="panel-subtitle">Add a subtle finish to your cutout.</p>
                                    <label class="effect-card"><i class="fas fa-cloud"></i><span><b>Drop
                                                Shadow</b><small>Soft realistic shadow</small></span><input type="checkbox"
                                            id="shadowToggle"></label>
                                    <label class="effect-card"><i
                                            class="fas fa-circle"></i><span><b>Outline</b><small>Clean subject
                                                border</small></span><input type="checkbox" id="outlineToggle"></label>
                                </div>
                                <div class="panel-view" id="panel-adjust">
                                    <div class="panel-title">Adjust</div>
                                    <p class="panel-subtitle">Fine-tune the image appearance.</p>
                                    <div class="adjust-control">
                                        <div><label>Brightness</label><output id="brightnessVal">0</output></div>
                                        <input type="range" min="-100" max="100" value="0"
                                            id="brightness">
                                    </div>
                                    <div class="adjust-control">
                                        <div><label>Contrast</label><output id="contrastVal">0</output></div>
                                        <input type="range" min="-100" max="100" value="0"
                                            id="contrast">
                                    </div>
                                    <div class="adjust-control">
                                        <div><label>Saturation</label><output id="saturationVal">0</output></div>
                                        <input type="range" min="-100" max="100" value="0"
                                            id="saturation">
                                    </div>
                                    <button class="reset-adjust" id="resetAdjust">Reset Adjustments</button>
                                </div>
                                <div class="panel-view" id="panel-design">
                                    <div class="panel-title">Design</div>
                                    <p class="panel-subtitle">Prepare your cutout for different uses.</p>
                                    <button class="design-option" id="fitSubject"><i
                                            class="fas fa-expand"></i><span><b>Fit subject</b><small>Fit the cutout inside
                                                the canvas</small></span></button>
                                    <button class="design-option" id="flipHorizontal"><i
                                            class="fas fa-arrows-left-right"></i><span><b>Flip horizontal</b><small>Mirror
                                                the image</small></span></button>
                                    <button class="design-option" id="centerSubject"><i
                                            class="fas fa-crosshairs"></i><span><b>Center subject</b><small>Reset the
                                                workspace view</small></span></button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="thumb-strip d-none">
                    <button class="add-thumb" id="addThumb"><i class="fas fa-plus"></i></button>
                    <div class="thumb active">
                        <div class="mini-checker"><canvas id="thumbCanvas"></canvas></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="background-remover-seo-section" aria-labelledby="background-remover-guide-title">
            <div class="seo-content">
                <h2 id="background-remover-guide-title">Free AI Background Remover Online</h2>
                <p>XConvertifire's background remover uses an AI model to identify a prominent subject and separate it from the surrounding image. The result appears as a cutout in the editor, where you can review edges, make brush edits, choose a background and download a PNG. It is designed for removing an image background online without needing desktop image-editing software.</p>
                <p>The removal process runs through this page in your browser. The tool loads its background-removal library and model when needed, then uses them to create an initial result. Automatic separation can be useful for portraits and product photos, but it is not equally accurate for every picture. Review the output before using it in a design or publishing it.</p>

                <h2>How to Remove an Image Background Online</h2>
                <ol>
                    <li>Select an image with the upload control or drop a supported file into the upload area.</li>
                    <li>Allow the page to load the AI assets it needs and process the image. On a first use, model files may need to download.</li>
                    <li>Review the generated cutout in the editor. Check the outline around the subject, especially where the background and subject meet.</li>
                    <li>Use Erase to remove leftover background areas or Restore to paint back parts of the original image. Adjust the brush size for broad or more precise edits.</li>
                    <li>Choose a transparent background, a preset color, a gradient, or a custom color if you want a colored backdrop.</li>
                    <li>Select Download to save the result as a PNG. A transparent selection keeps clear areas transparent; an opaque color or gradient fills those areas.</li>
                </ol>
                <p>For the final composition, you can also compare the original with the cutout, zoom in to inspect details, and use Undo or Redo for brush edits. If the subject needs different framing, use the <a href="{{ route('image.cropper') }}">Image Cropper to adjust the composition</a>. The separate <a href="{{ route('image.resizer') }}">Image Resizer</a> can change dimensions for a project, while the <a href="{{ route('image.compressor') }}">Image Compressor</a> can help manage file size afterward.</p>

                <h2>Supported Image Formats and File Size</h2>
                <p>The uploader accepts JPG or JPEG, PNG, WebP and GIF files, with a maximum source file size of 50 MB. The downloaded result is PNG, whether you keep transparency or fill the background with a solid color or gradient. A GIF input does not mean that animation is preserved: the output workflow downloads a PNG image.</p>
                <p>A supported extension alone cannot guarantee that every file will open successfully. An unusual encoding, damaged file or other browser limitation may prevent processing. The page checks the reported file type and size before starting. For more about common image formats, see <a href="https://developer.mozilla.org/en-US/docs/Web/Media/Guides/Formats/Image_types" target="_blank" rel="noopener noreferrer">MDN's guide to image file types</a>. If you need to change a file's format for another workflow, XConvertifire's <a href="{{ route('image.converter') }}">Image Converter</a> provides a separate conversion tool.</p>

                <h2>Transparent PNG Backgrounds</h2>
                <p>Transparency means that some pixels in an image are clear rather than filled with a visible color. PNG supports transparency, so a cutout can sit over different colors, layouts or photographs without retaining a rectangular background. This can be useful for product pictures, profile graphics, presentation slides and other design assets.</p>
                <p>The editor starts with a transparent background option. Selecting white, dark, blue, light, a gradient or a custom color changes the areas behind the cutout; those areas are then included in the PNG rather than remaining transparent. The tool downloads PNG files and does not offer JPEG output. The MDN image format reference linked above also explains how image formats handle transparency.</p>

                <h2>Review and Refine the Cutout</h2>
                <p>Automatic background removal is a starting point, and a quick manual review can catch areas that need attention. The editor provides Erase and Restore brushes with an adjustable size, plus background color and gradient choices. Brightness, contrast and saturation controls can adjust the subject's appearance. Compare, zoom, Undo and Redo help with reviewing and editing the visible cutout.</p>
                <p>Fine hair, fur, transparent objects and edges with little contrast may be difficult to separate cleanly. Busy scenes can also confuse the boundary between subject and background. Try a smaller brush near a detailed edge and inspect the result at a useful zoom level. Avoid assuming that every visible preview control changes the saved file in the same way; the exported result supports the cutout edits, background selection and image adjustments described above, but some decorative or view controls may only affect the editor.</p>

                <h2>Useful Projects for a Background Remover</h2>
                <p>A transparent cutout can make it easier to place a product on a consistent catalog backdrop, position a profile picture in a graphic, or build a social media post with a different color behind the subject. It can also help prepare a presentation visual or a personal design project. Check the result at its intended size and on the background where it will be used; the tool does not certify images for official identification or other regulated requirements.</p>

                <h2>Tips for Better Background Removal Results</h2>
                <ul>
                    <li>Choose an image where the subject is clearly separated from the background.</li>
                    <li>Even lighting and a sharp subject can make the subject's outline easier to identify.</li>
                    <li>Low contrast between the subject and its surroundings can lead to missing or removed edge details.</li>
                    <li>Inspect fine hair, fur, transparent materials and complex backgrounds carefully, then make local Erase or Restore edits where helpful.</li>
                    <li>Review the finished PNG before publishing or using it in a design.</li>
                </ul>

                <h2>Browser Processing and Practical Limits</h2>
                <p>The background-removal workflow uses browser-side AI processing. The page may download the processing library and model assets from its configured CDN, especially on first use. Your browser and device affect how quickly the assets load and the image is processed, so a specific completion time cannot be promised. Large images can also require considerable memory during processing and editing.</p>
                <p>Selected images are handled through this page's browser workflow. This description does not mean the entire website works offline or make broader privacy guarantees. Keep your browser open while the tool works, and try a smaller supported image if the browser runs short of resources. Even with a supported format and size, damaged or unusually encoded files may fail.</p>
                <p>The tool uses the <a href="https://www.npmjs.com/package/@imgly/background-removal" target="_blank" rel="noopener noreferrer">IMG.LY background-removal package</a> for its browser AI workflow. Its model and processing requirements are one reason that a first run can involve downloading assets and that available device resources matter.</p>

                <h2>Background Remover FAQ</h2>
                <div class="seo-faq-list">
                    <details>
                        <summary>Is this background remover free?</summary>
                        <p>The page presents the background-removal tool as free to use. Processing still depends on your browser, device and the required AI assets loading successfully.</p>
                    </details>
                    <details>
                        <summary>How do I remove a background online?</summary>
                        <p>Upload or drop a supported image, wait for browser processing, review the cutout, make optional Erase or Restore edits, choose a background if desired, and download the PNG.</p>
                    </details>
                    <details>
                        <summary>Which image formats can I use?</summary>
                        <p>The input accepts JPG or JPEG, PNG, WebP and GIF. The downloaded image is PNG.</p>
                    </details>
                    <details>
                        <summary>What is the maximum image file size?</summary>
                        <p>The source file limit is 50 MB. Very large images may also require substantial browser memory.</p>
                    </details>
                    <details>
                        <summary>Can I download a transparent PNG?</summary>
                        <p>Yes. Keep the Transparent background option selected to leave the background clear in the PNG.</p>
                    </details>
                    <details>
                        <summary>Can I replace the background with a solid color?</summary>
                        <p>Yes. Choose a preset or custom color, or select the gradient option. The chosen backdrop is included in the PNG.</p>
                    </details>
                    <details>
                        <summary>Can I refine areas the AI missed?</summary>
                        <p>Use the Erase and Restore brushes and adjust the brush size to remove or bring back image areas. Review fine edges manually.</p>
                    </details>
                    <details>
                        <summary>Will a GIF stay animated after background removal?</summary>
                        <p>No. Although GIF is accepted as an input format, the download workflow produces a PNG image, not an animated GIF.</p>
                    </details>
                    <details>
                        <summary>Why can hair and fine edges look imperfect?</summary>
                        <p>Fine strands, transparent objects, low contrast and complex scenes can make subject boundaries hard to distinguish. Inspect and refine the cutout where practical.</p>
                    </details>
                    <details>
                        <summary>Does the tool work in a web browser?</summary>
                        <p>Yes. The AI workflow runs through the browser and may download its library and model files before processing.</p>
                    </details>
                    <details>
                        <summary>Can I remove backgrounds from multiple images at once?</summary>
                        <p>The current editor processes one selected image at a time. It does not provide automatic batch background removal.</p>
                    </details>
                    <details>
                        <summary>Is the original resolution and image quality guaranteed?</summary>
                        <p>No specific resolution or quality outcome is guaranteed for every input. Results depend on the image, model processing and available browser resources; inspect the downloaded PNG before relying on it.</p>
                    </details>
                </div>

                <div class="seo-cta">
                    <h2>Ready to remove an image background?</h2>
                    <p>Start with a supported image and review the cutout in the editor.</p>
                    <a class="seo-cta-link" href="#uploadShell">Upload an image</a>
                </div>
            </div>
        </section>
    </main>

    <div class="processing-overlay" id="processingOverlay">
        <div class="processing-card">
            <div class="ai-loader"><span></span><i class="fas fa-wand-magic-sparkles"></i></div>
            <span class="processing-label">AI BACKGROUND REMOVAL</span>
            <h3 id="processingTitle">Analyzing your image</h3>
            <p id="processingText">Loading AI model and preparing the image...</p>
            <div class="progress-track">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="progress-meta"><strong id="progressPercent">0%</strong><span>Processing locally</span></div>
        </div>
    </div>

    <script type="module">
        /* =========================================================
       X Convertifire BG Remover: New design + Working AI logic
       ========================================================== */
        const $ = s => document.querySelector(s);
        const $$ = s => document.querySelectorAll(s);

        const input = $('#imageInput');
        const uploadShell = $('#uploadShell');
        const editor = $('#designEditor');
        const overlay = $('#processingOverlay');
        const progress = $('#progressBar');
        const percent = $('#progressPercent');
        const ptext = $('#processingText');
        const ptitle = $('#processingTitle');
        const canvas = $('#editCanvas');
        const ctx = canvas.getContext('2d', {
            willReadFrequently: true
        });
        const compare = $('#compareCanvas');
        const cctx = compare.getContext('2d');
        const thumb = $('#thumbCanvas');
        const tctx = thumb.getContext('2d');
        const cursor = $('#brushCursor');

        let originalImage = null;
        let originalCanvas = null;
        let resultImage = null;
        let resultBlob = null;
        let history = [];
        let future = [];
        let tool = 'erase';
        let drawing = false;
        let zoom = 1;
        let background = 'transparent';
        let brightness = 0,
            contrast = 0,
            saturation = 0;
        let shadow = false,
            outline = false;

        const loadImage = src => new Promise((resolve, reject) => {
            const i = new Image();
            i.onload = () => resolve(i);
            i.onerror = reject;
            i.src = src;
        });

        function prog(v, msg, title = 'Removing background') {
            progress.style.width = v + '%';
            percent.textContent = Math.round(v) + '%';
            ptext.textContent = msg;
            ptitle.textContent = title;
        }

        /* ---------- AI LIBRARY (lazy load + retries) ---------- */
        const LIB_URL = 'https://cdn.jsdelivr.net/npm/@imgly/background-removal@1.7.0/+esm';
        let cachedRemoveBackground = null;

        async function loadRemovalLib() {
            if (cachedRemoveBackground) return cachedRemoveBackground;
            const mod = await import(LIB_URL);
            if (!mod || typeof mod.removeBackground !== 'function') {
                throw new Error('Library loaded but removeBackground() was not found.');
            }
            cachedRemoveBackground = mod.removeBackground;
            return cachedRemoveBackground;
        }

        async function removeWithAI(file) {
            const removeBackground = await loadRemovalLib();
            const attempts = [{
                    model: 'medium',
                    proxyToWorker: true
                },
                {
                    model: 'medium',
                    proxyToWorker: false
                },
                {
                    model: 'small',
                    proxyToWorker: false
                }
            ];
            let lastErr;
            for (const attempt of attempts) {
                try {
                    return await removeBackground(file, {
                        model: attempt.model,
                        proxyToWorker: attempt.proxyToWorker,
                        output: {
                            format: 'image/png',
                            quality: 1
                        },
                        debug: false,
                        progress: (key, current, total) => {
                            if (total) {
                                const v = 8 + (current / total) * 86;
                                let msg = 'Loading AI segmentation model...';
                                if (key.includes('fetch')) msg = 'Downloading AI model files...';
                                else if (key.includes('compute')) msg =
                                    'Detecting subject and fine edges...';
                                else if (key.includes('mask')) msg = 'Refining the transparency mask...';
                                prog(v, msg);
                            }
                        }
                    });
                } catch (err) {
                    lastErr = err;
                    console.warn('[BG Remover] attempt failed:', attempt, err);
                }
            }
            throw lastErr || new Error('All AI removal attempts failed.');
        }

        /* ---------- helpers ---------- */
        function save() {
            if (!canvas.width) return;
            history.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
            if (history.length > 30) history.shift();
            future = [];
        }

        function thumbDraw() {
            if (!canvas.width) return;
            const s = Math.min(92 / canvas.width, 120 / canvas.height);
            thumb.width = canvas.width * s;
            thumb.height = canvas.height * s;
            tctx.clearRect(0, 0, thumb.width, thumb.height);
            tctx.drawImage(canvas, 0, 0, thumb.width, thumb.height);
        }

        function view() {
            if (!canvas.width) return;
            const sw = $('#stageWrap');
            const scale = Math.min(
                (sw.clientWidth - 90) / canvas.width,
                (sw.clientHeight - 90) / canvas.height,
                1
            ) * zoom;
            canvas.style.width = canvas.width * scale + 'px';
            canvas.style.height = canvas.height * scale + 'px';
            thumbDraw();
        }

        /* ---------- process ---------- */
        async function process(file) {
            const allowedTypes = ['image/png', 'image/jpeg', 'image/webp', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please upload a PNG, JPG, WEBP or GIF image.');
                return;
            }
            if (file.size > 50 * 1024 * 1024) {
                alert('Maximum file size is 50MB.');
                return;
            }

            overlay.classList.add('show');
            prog(3, 'Preparing your image...', 'Preparing image');

            const srcURL = URL.createObjectURL(file);
            try {
                originalImage = await loadImage(srcURL);
                prog(8, 'Loading AI model (first time 10-20s)...', 'AI background removal');

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

                setTimeout(() => view(), 100);
                prog(100, 'Your transparent cutout is ready.', 'Background removed');
                setTimeout(() => overlay.classList.remove('show'), 450);
            } catch (e) {
                console.error('[BG Remover] Processing failed:', e);
                prog(100, 'Could not process this image. Please try again. (' + (e && e.message ? e.message :
                    'Unknown error') + ')', 'Processing failed');
                setTimeout(() => overlay.classList.remove('show'), 3500);
            } finally {
                URL.revokeObjectURL(srcURL);
            }
        }

        /* ---------- input handlers ---------- */
        input.addEventListener('change', e => {
            const f = e.target.files[0];
            if (f) process(f);
            e.target.value = '';
        });
        $('#uploadBtn').onclick = () => input.click();
        $('#newImageBtn').onclick = () => input.click();
        $('#addThumb').onclick = () => input.click();

        /* ---------- drag & drop ---------- */
        const designEditor = $('#designEditor');
        designEditor.addEventListener('dragover', e => {
            e.preventDefault();
            designEditor.classList.add('drag-active');
        });
        designEditor.addEventListener('dragleave', () => designEditor.classList.remove('drag-active'));
        designEditor.addEventListener('drop', e => {
            e.preventDefault();
            designEditor.classList.remove('drag-active');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('image/')) process(f);
        });
        uploadShell.addEventListener('dragover', e => {
            e.preventDefault();
            uploadShell.classList.add('drag-active');
        });
        uploadShell.addEventListener('dragleave', () => uploadShell.classList.remove('drag-active'));
        uploadShell.addEventListener('drop', e => {
            e.preventDefault();
            uploadShell.classList.remove('drag-active');
            const f = e.dataTransfer.files[0];
            if (f && f.type.startsWith('image/')) process(f);
        });

        /* ---------- tabs ---------- */
        $$('.editor-tab').forEach(tab => tab.onclick = () => {
            $$('.editor-tab').forEach(x => x.classList.remove('active'));
            tab.classList.add('active');
            $$('.panel-view').forEach(x => x.classList.remove('active'));
            $('#panel-' + tab.dataset.panel).classList.add('active');
        });

        /* ---------- brush tools ---------- */
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
            cursor.style.height = e.target.value + 'px';
        };

        function updateCursor(e) {
            const r = canvas.getBoundingClientRect();
            cursor.style.left = (e.clientX - r.left) + 'px';
            cursor.style.top = (e.clientY - r.top) + 'px';
            cursor.style.display = 'block';
            cursor.classList.toggle('restore', tool === 'restore');
        }
        canvas.addEventListener('pointerenter', updateCursor);
        canvas.addEventListener('pointermove', e => {
            updateCursor(e);
            if (drawing) paint(e);
        });
        canvas.addEventListener('pointerleave', () => cursor.style.display = 'none');

        function paint(e) {
            if (!originalCanvas) return;
            const r = canvas.getBoundingClientRect();
            let relX = e.clientX - r.left;
            if (canvas.classList.contains('flipped')) relX = r.width - relX;
            const x = relX * canvas.width / r.width;
            const y = (e.clientY - r.top) * canvas.height / r.height;
            const s = (+$('#brushSize').value) * canvas.width / r.width;
            ctx.save();
            ctx.beginPath();
            ctx.arc(x, y, s / 2, 0, Math.PI * 2);
            if (tool === 'erase') {
                ctx.globalCompositeOperation = 'destination-out';
                ctx.fill();
            } else {
                ctx.globalCompositeOperation = 'source-over';
                ctx.clip();
                ctx.drawImage(originalCanvas, 0, 0);
            }
            ctx.restore();
            view();
            updateCursor(e);
        }
        canvas.onpointerdown = e => {
            if (!canvas.width) return;
            drawing = true;
            canvas.setPointerCapture(e.pointerId);
            paint(e);
        };
        canvas.onpointerup = () => {
            if (drawing) {
                save();
                drawing = false;
            }
        };
        canvas.onpointercancel = () => {
            drawing = false;
        };

        /* ---------- undo / redo / reset ---------- */
        $('#undoBtn').onclick = () => {
            if (history.length > 1) {
                future.push(history.pop());
                ctx.putImageData(history[history.length - 1], 0, 0);
                view();
            }
        };
        $('#redoBtn').onclick = () => {
            if (future.length) {
                const d = future.pop();
                history.push(d);
                ctx.putImageData(d, 0, 0);
                view();
            }
        };
        $('#resetCutout').onclick = () => {
            if (resultImage) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(resultImage, 0, 0);
                save();
                view();
                $('#stageStatus').textContent = 'Cutout reset to AI result';
            }
        };

        /* ---------- zoom ---------- */
        $('#zoomIn').onclick = () => {
            zoom = Math.min(1.8, zoom + 0.1);
            $('#zoomLabel').textContent = Math.round(zoom * 100) + '%';
            view();
        };
        $('#zoomOut').onclick = () => {
            zoom = Math.max(0.5, zoom - 0.1);
            $('#zoomLabel').textContent = Math.round(zoom * 100) + '%';
            view();
        };

        /* ---------- background ---------- */
        $$('.bg-choice').forEach(b => b.onclick = () => {
            $$('.bg-choice').forEach(x => x.classList.remove('active'));
            b.classList.add('active');
            background = b.dataset.bg;
            $('#stageWrap').style.setProperty('--custom-bg', background === 'gradient' ?
                'linear-gradient(135deg,#2563eb,#111827)' : background);
        });
        $('#bgColor').oninput = e => {
            $('#stageWrap').style.setProperty('--custom-bg', e.target.value);
            background = e.target.value;
        };

        /* ---------- adjust ---------- */
        function filters() {
            canvas.style.filter =
                `brightness(${100 + brightness}%) contrast(${100 + contrast}%) saturate(${100 + saturation}%)`;
        }
        [
            ['brightness', 'brightnessVal'],
            ['contrast', 'contrastVal'],
            ['saturation', 'saturationVal']
        ]
        .forEach(([a, b]) => $('#' + a).oninput = e => {
            if (a === 'brightness') brightness = +e.target.value;
            if (a === 'contrast') contrast = +e.target.value;
            if (a === 'saturation') saturation = +e.target.value;
            $('#' + b).textContent = e.target.value;
            filters();
        });
        $('#resetAdjust').onclick = () => {
            brightness = contrast = saturation = 0;
            ['brightness', 'contrast', 'saturation'].forEach(x => $('#' + x).value = 0);
            ['brightnessVal', 'contrastVal', 'saturationVal'].forEach(x => $('#' + x).textContent = '0');
            filters();
        };

        /* ---------- effects ---------- */
        $('#shadowToggle').onchange = e => shadow = e.target.checked;
        $('#outlineToggle').onchange = e => outline = e.target.checked;

        /* ---------- compare ---------- */
        $('#compareBtn').onclick = () => {
            if (!originalImage) return;
            compare.width = originalImage.naturalWidth;
            compare.height = originalImage.naturalHeight;
            cctx.drawImage(originalImage, 0, 0);
            compare.style.display = 'block';
            $('#compareClose').style.display = 'flex';
        };
        $('#compareClose').onclick = () => {
            compare.style.display = 'none';
            $('#compareClose').style.display = 'none';
        };

        /* ---------- design ---------- */
        $('#flipHorizontal').onclick = () => canvas.classList.toggle('flipped');
        $('#fitSubject').onclick = () => {
            zoom = 1;
            $('#zoomLabel').textContent = '100%';
            view();
        };
        $('#centerSubject').onclick = () => {
            zoom = 1;
            $('#zoomLabel').textContent = '100%';
            view();
        };
        $('#eraseDistractions').onclick = () => {
            tool = 'erase';
            $$('.brush-tool').forEach(x => x.classList.toggle('active', x.dataset.tool === 'erase'));
            $('#stageStatus').textContent = 'Erase distractions mode';
        };

        /* ---------- export ---------- */
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
                o.fillRect(0, 0, out.width, out.height);
            } else if (background !== 'transparent') {
                o.fillStyle = background;
                o.fillRect(0, 0, out.width, out.height);
            }

            o.filter = `brightness(${100 + brightness}%) contrast(${100 + contrast}%) saturate(${100 + saturation}%)`;

            if (shadow) {
                o.save();
                o.shadowColor = 'rgba(0,0,0,.38)';
                o.shadowBlur = 28;
                o.shadowOffsetY = 14;
                o.drawImage(canvas, 0, 0);
                o.restore();
            } else {
                o.drawImage(canvas, 0, 0);
            }
            return out;
        }
        $('#downloadTop').onclick = () => {
            const out = exportCanvas();
            if (!out) return;
            out.toBlob(b => {
                const a = document.createElement('a');
                a.href = URL.createObjectURL(b);
                a.download = (($('#fileName').textContent || 'image').replace(/\.[^.]+$/, '')) +
                    '-no-background.png';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                setTimeout(() => URL.revokeObjectURL(a.href), 1000);
            }, 'image/png');
        };

        window.addEventListener('resize', view);
        const navbar = $('#morphNavbar');
        window.addEventListener('scroll', () => navbar && navbar.classList.toggle('scrolled', scrollY > 50));
    </script>
@endsection
