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

        a {
            cursor: pointer;
        }

        @keyframes loading-bar {
            0% {
                width: 0%;
                transform: translateX(-100%);
            }

            50% {
                width: 100%;
                transform: translateX(0);
            }

            100% {
                width: 100%;
                transform: translateX(100%);
            }
        }

        .animate-loading-bar {
            animation: loading-bar 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        /* Mencegah scroll saat loading */
        body.loading-active {
            overflow: hidden;
        }
    </style>

    @yield('css')
</head>


<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

    <div id="loader"
        class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-white transition-opacity duration-700">
        <div class="absolute w-64 h-64 bg-green-primary/10 rounded-full blur-3xl animate-pulse"></div>

        <div class="relative flex flex-col items-center">
            <div class="relative mb-6">
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo Kemenag"
                    class="w-20 h-20 md:w-24 md:h-24 animate-bounce duration-[2000ms]">
                <div
                    class="absolute inset-[-10px] border-2 border-transparent border-t-green-primary rounded-full animate-spin">
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-xs font-black uppercase tracking-[0.3em] text-gray-400 mb-2">Mohon Tunggu</h2>
                <div class="flex items-center gap-1">
                    <span class="text-lg font-bold text-gray-800">Kemenag</span>
                    <span class="text-lg font-black text-green-primary">Morotai</span>
                </div>
            </div>

            <div class="w-48 h-[3px] bg-gray-100 rounded-full mt-6 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-green-soft to-green-primary animate-loading-bar"></div>
            </div>
        </div>
    </div>

    {{-- Header --}}
    @include('header')

    <!-- Main Content -->
    <!-- Menambahkan w-full agar layout konsisten dan bg-white dipindah ke sini jika ingin area konten berwarna putih bersih -->
    <main class="w-full max-w-7xl mx-auto px-4 sm:px-4 lg:px-4 py-4 md:py-6 flex-grow bg-white">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('footer')


    {{-- Modal Iklan --}}
    <div id="adModal"
        class="fixed inset-0 z-[9999] flex items-center justify-center invisible opacity-0 transition-all duration-500 px-6">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-md" id="closeAdBackdrop"></div>

        <div class="relative w-auto max-w-fit transform scale-90 transition-transform duration-500 mx-auto"
            id="adContent">

            <button id="closeAdBtn"
                class="absolute -top-4 -right-4 z-[10000] bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-xl hover:bg-emerald-500 hover:text-white transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10 bg-white">
                <a href="https://wa.me/6281342165567?text={{ urlencode('Halo Admin Kemenag Morotai, saya ingin bertanya terkait ...') }}" target="_blank" class="block">
                    <img src="{{ asset('assets/img/popiklan.webp') }}" alt="Iklan"
                        class="block w-auto h-auto max-h-[85vh] max-w-full md:max-w-[90vw] object-contain">
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- LOGIKA MENU UTAMA (OPEN/CLOSE SIDEBAR) ---
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const mobileMenuBackdrop = document.getElementById('mobileMenuBackdrop');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuContent = document.getElementById('mobileMenuContent');

            function toggleMenu() {
                mobileMenu.classList.toggle('invisible');
                mobileMenu.classList.toggle('opacity-0');
                mobileMenuContent.classList.toggle('translate-x-full');
                document.body.classList.toggle('overflow-hidden');
            }

            if (mobileMenuButton) mobileMenuButton.addEventListener('click', toggleMenu);
            if (closeMobileMenu) closeMobileMenu.addEventListener('click', toggleMenu);
            if (mobileMenuBackdrop) mobileMenuBackdrop.addEventListener('click', toggleMenu);

            // --- LOGIKA ACCORDION (PROFIL & UNIT KERJA) ---
            // Kita gunakan delegasi event agar lebih efisien
            const menuContainer = document.getElementById('mobileMenuContent');

            menuContainer.addEventListener('click', function(e) {
                // Cari apakah yang diklik adalah button dropdown
                const btn = e.target.closest('.mobile-dropdown button, .mobile-dropdown-sub button');

                if (btn) {
                    const submenu = btn.nextElementSibling;
                    const icon = btn.querySelector('svg');

                    if (submenu) {
                        submenu.classList.toggle('hidden');
                        // Animasi putar icon (bawah atau samping)
                        if (icon) icon.classList.toggle('rotate-90');
                        if (icon) icon.classList.toggle('rotate-180');
                    }
                }
            });
        });
    </script>

    <script>
        window.addEventListener('load', function() {
            // --- DEFINISI ELEMEN ---
            const loader = document.getElementById('loader');
            const adModal = document.getElementById('adModal');
            const adContent = document.getElementById('adContent');
            const closeAdBtn = document.getElementById('closeAdBtn');
            const closeAdBackdrop = document.getElementById('closeAdBackdrop');

            // --- FUNGSI TUTUP IKLAN ---
            function closeAd() {
                adModal.classList.add('opacity-0');
                adContent.classList.add('scale-90');
                setTimeout(() => {
                    adModal.classList.add('invisible');
                    document.body.classList.remove('overflow-hidden');
                }, 500);
            }

            // Jalankan event listener tutup iklan segera
            if (closeAdBtn) closeAdBtn.addEventListener('click', closeAd);
            if (closeAdBackdrop) closeAdBackdrop.addEventListener('click', closeAd);


            // --- LOGIKA BERANTAI (LOADER -> IKLAN) ---

            // 1. Selesaikan animasi Loader dulu
            setTimeout(() => {
                loader.classList.add('opacity-0', 'pointer-events-none');
                document.body.classList.remove('loading-active');

                // 2. Tunggu transisi loader selesai (700ms)
                setTimeout(() => {
                    loader.style.display = 'none';

                    // 3. CEK DAN TAMPILKAN IKLAN
                    // Hanya muncul jika belum pernah tampil di sesi ini
                    if (!sessionStorage.getItem('adShown')) {

                        // Beri jeda 1 detik setelah halaman bersih agar user tidak kaget
                        setTimeout(() => {
                            adModal.classList.remove('invisible');
                            adModal.classList.add('opacity-100');
                            adContent.classList.remove('scale-90');
                            adContent.classList.add('scale-100');

                            // Kunci scroll body agar user fokus ke iklan
                            document.body.classList.add('overflow-hidden');

                            // Tandai bahwa iklan sudah ditampilkan
                            sessionStorage.setItem('adShown', 'true');
                        }, 1000);
                    }
                }, 700);
            }, 800);
        });
    </script>
</body>

</html>
