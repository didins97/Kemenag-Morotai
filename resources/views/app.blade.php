<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KANTOR KEMENAG KABUPATEN PULAU MOROTAI</title>
    <meta name="description" content="Kantor Kementerian Agama Kabupaten Pulau Morotai - Website Resmi" />

    @yield('head')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logokemenag.png') }}" type="image/x-icon" />

    <!-- Preload Resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Open+Sans:wght@400;600&display=swap" as="style" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- Internal Optimized Style -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Lora', serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
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
    </style>

    @yield('css')
</head>

<body class="font-poppins bg-gray-50 antialiased text-gray-800 flex flex-col min-h-screen">

    <div id="page-loader">
        <div class="loader"></div>
    </div>

    {{-- Floating Sambutan --}}
    @include('toggel-sambutan')

    {{-- Header --}}
    @include('header')

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-12 flex-grow">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('footer')

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
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

        // Floating Panel Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleSambutan');
            const closeButton = document.getElementById('closeSambutan');
            const overlay = document.getElementById('sambutanOverlay');
            const panel = document.getElementById('sambutanPanel');

            if (toggleButton && closeButton && overlay && panel) {
                function togglePanel() {
                    if (panel.classList.contains('-translate-x-full')) {
                        overlay.classList.remove('hidden');
                        void overlay.offsetWidth; // Trigger reflow
                        overlay.classList.remove('opacity-0');
                        panel.classList.remove('-translate-x-full');
                        document.body.style.overflow = 'hidden';
                    } else {
                        closePanel();
                    }
                }

                function closePanel() {
                    panel.classList.add('-translate-x-full');
                    overlay.classList.add('opacity-0');
                    setTimeout(() => {
                        overlay.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                toggleButton.addEventListener('click', togglePanel);
                closeButton.addEventListener('click', closePanel);
                overlay.addEventListener('click', closePanel);
            }

            // Date Display
            function updateCurrentDate() {
                const options = { weekday: 'short', month: 'short', day: 'numeric' };
                const now = new Date();
                const dateElement = document.getElementById('current-date');
                if (dateElement) {
                    dateElement.textContent = now.toLocaleDateString('en-US', options);
                }
            }
            updateCurrentDate();
        });
    </script>

    @yield('scripts')
</body>

</html>
