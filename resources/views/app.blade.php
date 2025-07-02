<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KANTOR KEMENAG KABUPATEN PULAU MOROTAI</title>
    <meta name="description" content="Kantor Kementerian Agama Kabupaten Pulau Morotai - Website Resmi" />

    @yield('head')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logokemenag.png') }}" type="image/x-icon" />

    <!-- Preconnect & Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome (Lightweight) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-pap7l2MGN97UozrRUtG4N5fRIdvw9mGv5qXB7ep5hoZUy0bMEZ2aO4EwDCLF8WIM8HgDb4YZDcYlm6VRJjP6nA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    {{-- Floating Sambutan --}}
    @include('toggel-sambutan')

    {{-- Header --}}
    @include('header')

    <!-- Main Content -->
    {{-- <main class="flex-grow"> --}}
    <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('footer')

    <!-- Scripts -->
    <script defer>
        const toggleButton = document.getElementById('toggleSambutan');
        const closeButton = document.getElementById('closeSambutan');
        const overlay = document.getElementById('sambutanOverlay');
        const panel = document.getElementById('sambutanPanel');

        toggleButton?.addEventListener('click', () => {
            overlay?.classList.remove('hidden');
            setTimeout(() => overlay?.classList.remove('opacity-0'), 10);
            panel?.classList.remove('-translate-x-full');
        });

        function closePanel() {
            panel?.classList.add('-translate-x-full');
            overlay?.classList.add('opacity-0');
            setTimeout(() => overlay?.classList.add('hidden'), 300);
        }

        closeButton?.addEventListener('click', closePanel);
        overlay?.addEventListener('click', closePanel);
    </script>
    {{-- </body> --}}
</html>
