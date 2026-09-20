<!-- Footer Area -->
<footer class="main-footer">
    <div class="container">
        <div class="row g-5">

            <!-- Brand Info -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="PixelFlow" class="footer-logo-img" width="55%">
                </a>
                <p class="footer-text">
                    The ultimate all-in-one suite to convert, compress, and edit your visual assets safely. Trusted by
                    millions of users worldwide.
                </p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Image Tools -->
            <div class="col-lg-2 col-md-6">
                <h4 class="footer-title">Image Tools</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('image.compressor') }}">Compress Image</a></li>
                    <li><a href="{{ route('image.resizer') }}">Resize Image</a></li>
                    <li><a href="{{ route('image.cropper') }}">Crop Image</a></li>
                    <li><a href="{{ route('image.rotator') }}">Rotate Image</a></li>
                    <li><a href="{{ route('image.converter') }}">Image Converter</a></li>
                    <li><a href="{{ route('image.background_remover') }}">Remove Background</a></li>
                </ul>
            </div>

            <!-- Video & PDF Tools -->
            <div class="col-lg-2 col-md-6">
                <h4 class="footer-title">More Tools</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('video.to.audio') }}">Video to Audio</a></li>
                    <li><a href="{{ route('pdf.editor') }}">PDF Editor</a></li>
                    <li><a href="{{ route('pdf.to.word') }}">PDF to Word</a></li>
                    <li><a href="{{ route('word.pdf.index') }}">Word to PDF</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="col-lg-2 col-md-6">
                <h4 class="footer-title">Company</h4>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="{{ route('contact') }}">Contact Support</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="col-lg-2 col-md-6">
                <h4 class="footer-title">Legal</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-and-conditions') }}">Terms of Service</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} PixelFlow App. All rights reserved.</p>
            <div class="footer-bottom-links">
                <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                <a href="{{ route('terms-and-conditions') }}">Terms of Service</a>
                <a href="#">Security</a>
            </div>
        </div>
    </div>
</footer>
