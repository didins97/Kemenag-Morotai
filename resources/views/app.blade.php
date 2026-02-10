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
            color: #333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Manrope", sans-serif;
        }

        /* Menghilangkan jeda antara tombol dan menu */
        .dropdown-menu-wrapper {
            padding-top: 15px;
            /* Jembatan kursor vertikal */
            margin-top: -5px;
            /* Menarik area ke atas agar rapat */
        }

        .dropdown-content {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            overflow: visible;
        }

        /* Jembatan untuk Submenu Unit Kerja (Samping) */
        .submenu-wrapper {
            padding-left: 15px;
            /* Jembatan kursor horizontal */
            margin-left: -5px;
        }

        .submenu-content {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }

        @keyframes soft-pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .animate-soft-pulse {
            animation: soft-pulse 3s ease-in-out infinite;
        }

        #backToTop {
            cursor: pointer;
            border: none;
            outline: none;
            /* Memberikan efek transisi smooth saat muncul */
            opacity: 0;
            transition: opacity 0.4s ease, transform 0.3s ease;
        }

        #backToTop.show {
            display: flex;
            opacity: 1;
        }

        #backToTop:hover {
            transform: translateY(-5px);
        }

        /* Mencegah scroll saat loading */
        body.loading {
            overflow: hidden;
        }

        /* Animasi Progress Bar custom */
        #preloader-bar {
            animation: loading-progress 2s ease-in-out infinite;
        }

        @keyframes loading-progress {
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

        /* Transisi halus saat hilang */
        .preloader-hidden {
            opacity: 0;
            pointer-events: none;
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
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-12 flex-grow">
        @yield('content')
    </div>

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

    @yield('scripts')
</body>

</html>
