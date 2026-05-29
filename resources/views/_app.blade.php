<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KANTOR KEMENAG KABUPATEN PULAU MOROTAI</title>
    <meta name="description" content="Kantor Kementerian Agama Kabupaten Pulau Morotai - Website Resmi" />
    <meta name="google-site-verification" content="89pyKcrUDFS1uNCqrx_7DZi22r2MV41cPjA1q9qC3NU" />
    <meta itemprop="image" content="https://kemenagmorotai.id/assets/img/logokemenag.png" />

    {{-- 🔍 Structured Data for Google --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Kementerian Agama Kabupaten Pulau Morotai",
      "url": "https://kemenagmorotai.id",
      "logo": "https://kemenagmorotai.id/assets/img/logokemenag.png"
    }
    </script>

    @yield('head')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logokemenag.png') }}" type="image/x-icon" />

    <!-- Preload Resources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        as="style" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" /> --}}
    <link href="{{ asset('assets/css/banner.css') }}" rel="stylesheet">

    <!-- Internal Optimized Style -->
    <style>
        body {
            font-family: "Manrope", sans-serif;
            color: #1e293b;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Manrope", sans-serif;
        }

        /* Modern Green Color Palette */
        :root {
            --green-primary: #059669;
            --green-primary-dark: #047857;
            --green-primary-light: #10b981;
            --green-soft: #34d399;
            --green-gradient: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --green-gradient-hover: linear-gradient(135deg, #047857 0%, #059669 100%);
            --green-light-bg: #ecfdf5;
            --green-border: #d1fae5;
        }

        /* Modern Navigation Styles */
        .main-nav {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
        }

        .main-nav.scrolled {
            box-shadow: 0 4px 20px rgba(5, 150, 105, 0.08);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Smooth dropdown */
        .dropdown-menu-wrapper {
            padding-top: 12px;
            margin-top: -4px;
        }

        .dropdown-content {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.1), 0 4px 8px -4px rgba(5, 150, 105, 0.05);
            border: 1px solid var(--green-border);
            overflow: hidden;
        }

        .submenu-wrapper {
            padding-left: 12px;
            margin-left: -4px;
        }

        .submenu-content {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--green-border);
        }

        /* Nav Link Styles */
        .nav-link {
            position: relative;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--green-gradient);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-link:hover::after {
            width: calc(100% - 2rem);
        }

        /* Dropdown Items */
        .dropdown-item {
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--green-gradient);
            transform: scaleY(0);
            transition: transform 0.2s ease;
        }

        .dropdown-item:hover::before {
            transform: scaleY(1);
        }

        /* Modern Button Styles */
        .modern-btn {
            background: var(--green-gradient);
            color: white;
            transition: all 0.3s ease;
        }

        .modern-btn:hover {
            background: var(--green-gradient-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.25);
        }

        /* Search Button */
        .search-btn {
            transition: all 0.2s ease;
        }

        .search-btn:hover {
            background: var(--green-light-bg);
            color: var(--green-primary);
            transform: scale(1.05);
        }

        /* Mobile Menu */
        #mobile-menu {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-menu-item {
            transition: all 0.2s ease;
        }

        .mobile-menu-item:hover {
            background: var(--green-light-bg);
            color: var(--green-primary);
            transform: translateX(4px);
        }

        .mobile-menu-item:active {
            transform: translateX(8px);
        }

        /* Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            background: var(--green-gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
            z-index: 90;
            border: none;
        }

        #backToTop.show {
            opacity: 1;
            visibility: visible;
        }

        #backToTop:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 8px 24px rgba(5, 150, 105, 0.4);
        }

        /* Animations */
        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glowPulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(5, 150, 105, 0.4);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(5, 150, 105, 0);
            }
        }

        .dropdown-content,
        .submenu-content {
            animation: fadeSlideDown 0.2s ease-out;
        }

        /* Loading Animation */
        #preloader-bar {
            background: var(--green-gradient);
            animation: loadingProgress 2s ease-in-out infinite;
        }

        @keyframes loadingProgress {
            0% {
                width: 0%;
                margin-left: 0%;
            }

            50% {
                width: 70%;
                margin-left: 15%;
            }

            100% {
                width: 0%;
                margin-left: 100%;
            }
        }
    </style>

    @yield('css')
</head>


<body class="font-poppins bg-gray-50 antialiased text-gray-800 flex flex-col min-h-screen">

    <div id="preloader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-white transition-opacity duration-500">
        <div class="relative flex flex-col items-center">
            <div class="relative mb-6">
                <div class="absolute inset-0 rounded-full bg-emerald-500/20 animate-ping"></div>
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo Kemenag"
                    class="relative w-24 h-24 object-contain">
            </div>

            <div class="text-center">
                <h2 class="text-lg font-bold text-slate-800 tracking-tight">KEMENAG MOROTAI</h2>
                <p class="text-[10px] font-medium text-emerald-600 uppercase tracking-[0.3em] mt-1">Ikhlas Beramal</p>
            </div>

            <div class="w-48 h-1 bg-slate-100 rounded-full mt-8 overflow-hidden">
                <div id="preloader-bar" class="h-full bg-emerald-600 w-0 transition-all duration-300 ease-out"></div>
            </div>
        </div>
    </div>

    {{-- Header --}}
    @include('header')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-6 flex-grow bg-white">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('footer')

    {{-- scrool to top --}}
    <button id="backToTop"
        class="fixed bottom-6 right-6 z-50 hidden bg-[#006a4e] text-white w-12 h-12 rounded-full shadow-lg hover:bg-[#00523d] transition-all duration-300 flex items-center justify-center animate-bounce-slow">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    {{-- Pop-up Gratifikasi --}}
    <div id="gratifikasiModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/70 px-4">
        <div class="relative bg-white rounded-2xl overflow-hidden max-w-lg w-full shadow-2xl animate-soft-pulse">
            <button onclick="closeModal()"
                class="absolute top-3 right-3 bg-white/80 rounded-full w-8 h-8 flex items-center justify-center text-gray-800 hover:bg-white z-10">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <a href="https://kemenagmorotai.id/" target="_blank" onclick="closeModal()">
                <img src="{{ asset('assets/img/ptsp.png') }}" alt="Banner Tolak Gratifikasi"
                    class="w-full h-auto object-cover">
            </a>

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/banner.js') }}"></script>
    <script>
        // ==== Script untuk Modal Pop-up Gratifikasi dengan Session ====
        AOS.init({
            duration: 600,
            once: true
        });

        // Page Loader
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const body = document.body;

            // Tambahkan class loading awal
            body.classList.add('loading');

            // Beri sedikit delay agar transisi tidak terlalu kaget (opsional)
            setTimeout(() => {
                preloader.classList.add('preloader-hidden');
                body.classList.remove('loading');

                // Hapus elemen dari DOM setelah transisi selesai agar tidak berat
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }, 1000); // 1 detik loading

            const modal = document.getElementById('gratifikasiModal');
            const storageKey = 'hasSeenGratifikasiPopUp';

            // Cek apakah user sudah pernah menutup modal sebelumnya
            const hasSeen = localStorage.getItem(storageKey);

            if (!hasSeen) {
                // Beri sedikit delay (misal 1.5 detik) agar loading page selesai dulu baru muncul pop-up
                setTimeout(() => {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }, 1500);
            }
        });

        function closeModal() {
            const modal = document.getElementById('gratifikasiModal');
            const storageKey = 'hasSeenGratifikasiPopUp';

            modal.classList.add('hidden');
            modal.classList.remove('flex');

            // Simpan ke sesi lokal agar tidak muncul lagi di masa depan
            localStorage.setItem(storageKey, 'true');
        }

        // Menutup modal jika klik di area hitam (overlay)
        window.onclick = function(event) {
            const modal = document.getElementById('gratifikasiModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        const backToTopBtn = document.getElementById("backToTop");

        window.addEventListener("scroll", function() {
            // Tombol muncul jika user scroll lebih dari 300px ke bawah
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove("hidden");
                // Tambahkan delay sedikit agar class hidden hilang dulu baru opacity jalan
                setTimeout(() => backToTopBtn.classList.add("show"), 10);
            } else {
                backToTopBtn.classList.remove("show");
                setTimeout(() => backToTopBtn.classList.add("hidden"), 300);
            }
        });

        backToTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Efek scroll halus ke atas
            });
        });
    </script>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const closeMobileMenu = document.getElementById('closeMobileMenu');

        function openMobileMenu() {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            mobileOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenuFunc() {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        mobileMenuBtn?.addEventListener('click', openMobileMenu);
        closeMobileMenu?.addEventListener('click', closeMobileMenuFunc);
        mobileOverlay?.addEventListener('click', closeMobileMenuFunc);

        // Toggle Mobile Submenu
        window.toggleMobileSubmenu = function(menuId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(menuId + 'Arrow');

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
            } else {
                menu.classList.add('hidden');
                if (arrow) arrow.style.transform = '';
            }
        }

        // Navbar Scroll Effect
        const mainNav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mainNav.classList.add('scrolled');
            } else {
                mainNav.classList.remove('scrolled');
            }
        });

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop?.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Close mobile menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('translate-x-0')) {
                closeMobileMenuFunc();
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
