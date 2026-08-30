  <!-- ========================================= -->
    <!-- Morphing Dynamic Navbar -->
    <!-- ========================================= -->
    <header class="dynamic-navbar" id="morphNavbar">
        <div class="nav-container">
            <!-- Left: Logo -->
            <a href="{{ route('home') }}" class="brand-logo"><i class="fas fa-layer-group text-primary me-2"></i>PixelFlow</a>

            <!-- Center: Links Pill -->
            <div class="nav-links-wrapper" id="navLinksWrapper">
                <a href="{{ route('home') }}" class="nav-link-item">Home</a>

                <!-- Tools Dropdown -->
                <div class="nav-item-dropdown" id="toolsDropdown">
                    <a href="{{ route('home') }}" class="nav-link-item active text-white dropdown-trigger">
                        Tools <i class="fas fa-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('image.compressor') }}"><i class="fas fa-compress-arrows-alt"></i> Compress Image</a>
                        <a href="{{ route('image.resizer') }}"><i class="fas fa-expand-arrows-alt"></i> Resize Image</a>
                        <a href="{{ route('image.cropper') }}"><i class="fas fa-crop-alt"></i> Crop Image</a>
                        <a href="{{ route('image.converter') }}"><i class="fas fa-file-export"></i> Convert to JPG</a>
                        <a href="#"><i class="fas fa-search-plus"></i> Upscale Image</a>
                        <a href="{{ route('image.background_remover') }}"><i class="fas fa-eraser"></i> Remove Background</a>
                        <a href="#"><i class="fas fa-user-secret"></i> Blur Face</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="nav-link-item">Contact Us</a>
                <a href="{{route('blog.index')}}" class="nav-link-item">Blog</a>
                <a href="#" class="nav-link-item">Pricing</a>

                <!-- API Docs Dropdown -->
                <div class="nav-item-dropdown" id="apiDropdown">
                    <a href="#" class="nav-link-item dropdown-trigger">
                        API Docs <i class="fas fa-chevron-down dropdown-caret"></i>
                    </a>
                    <div class="nav-dropdown-menu">
                        <a href="#"><i class="fas fa-book"></i> Getting Started</a>
                        <a href="#"><i class="fas fa-key"></i> Authentication</a>
                        <a href="#"><i class="fas fa-cloud-upload-alt"></i> Batch Processing</a>
                        <a href="#"><i class="fas fa-code"></i> API Reference</a>
                    </div>
                </div>

            </div>

            <!-- Right: Action Button (desktop) -->
            <a href="#" class="btn-action">Start for Free</a>

            <!-- Mobile Hamburger Toggle -->
            <button class="mobile-toggle-btn" id="mobileToggleBtn" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
