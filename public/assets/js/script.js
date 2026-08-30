
        // Initialize AOS Animations
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // =========================================
        // Dynamic Navbar Scroll Logic
        // =========================================
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('morphNavbar');
            if (window.scrollY > 50) {
                // Adds the pill shape and blue glow
                navbar.classList.add('scrolled');
            } else {
                // Returns to the separated layout
                navbar.classList.remove('scrolled');
            }
        });

        // =========================================
        // Mobile Menu Toggle
        // =========================================
        var mobileToggleBtn = document.getElementById('mobileToggleBtn');
        var navLinksWrapper = document.getElementById('navLinksWrapper');

        mobileToggleBtn.addEventListener('click', function() {
            navLinksWrapper.classList.toggle('mobile-open');
            var icon = mobileToggleBtn.querySelector('i');
            if (navLinksWrapper.classList.contains('mobile-open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // =========================================
        // Dropdown Logic (Tools / API Docs)
        // - Desktop (>=992px): hover handled purely by CSS
        // - Mobile (<992px): click/tap toggles accordion
        // =========================================
        var dropdowns = document.querySelectorAll('.nav-item-dropdown');

        dropdowns.forEach(function(dropdown) {
            var trigger = dropdown.querySelector('.dropdown-trigger');

            trigger.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    // Close other open dropdowns (accordion behavior)
                    dropdowns.forEach(function(other) {
                        if (other !== dropdown) other.classList.remove('open');
                    });
                    dropdown.classList.toggle('open');
                }
            });
        });

        // Close mobile menu / dropdowns on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                navLinksWrapper.classList.remove('mobile-open');
                mobileToggleBtn.querySelector('i').classList.remove('fa-times');
                mobileToggleBtn.querySelector('i').classList.add('fa-bars');
                dropdowns.forEach(function(d) {
                    d.classList.remove('open');
                });
            }
        });