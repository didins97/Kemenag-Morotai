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

        /* .container { */
            /* max-width: 1200px; */
            /* margin: 0 auto; */
            /* padding: 0 0px; */
        /* } */

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
    </style>

    @yield('css')
</head>


<body class="font-poppins bg-gray-50 antialiased text-gray-800 flex flex-col min-h-screen">

    <div id="page-loader">
        <div class="loader"></div>
    </div>

    {{-- Header --}}
    @include('header')

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-12 flex-grow">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('footer')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/banner.js') }}"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            once: true
        });

        // Page Loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('page-loader');
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 300);
            }, 500);
        });
    </script>

    @yield('scripts')
</body>

</html>
