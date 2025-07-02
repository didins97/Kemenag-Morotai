<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <title>KANTOR KEMENAG KABUPATEN PULAU MOROTAI</title>
    <!-- Tailwind -->
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets') }}/img/logokemenag.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <!-- Tambahkan ini di <head> -->
    <style>
        /* Base Styles */
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
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
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Custom bounce animation */
        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(1/2) translateX(0) scale(1);
            }

            50% {
                transform: translateY(1/2) translateX(0) scale(1.1);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }

        /* Soft pulse animation */
        @keyframes soft-pulse {

            0%,
            100% {
                transform: translateY(1/2) scale(1);
            }

            50% {
                transform: translateY(1/2) scale(1.05);
            }
        }

        .animate-soft-pulse {
            animation: soft-pulse 3s ease-in-out infinite;
        }
    </style>
    @yield('css')
</head>

<body class="font-poppins bg-gray-50 antialiased text-gray-800 flex flex-col min-h-screen">

    @include('toggel-sambutan')

    @include('header')

    @yield('hero')

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        @yield('hero')

        <!-- Content Sections -->
        <div class="container mx-auto px-4 sm:px-6 py-8 md:py-12">
            @yield('content')
        </div>
    </main>

    @include('footer')
</body>

<script>
    const toggleButton = document.getElementById('toggleSambutan');
    const closeButton = document.getElementById('closeSambutan');
    const overlay = document.getElementById('sambutanOverlay');
    const panel = document.getElementById('sambutanPanel');

    toggleButton.addEventListener('click', () => {
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        panel.classList.remove('-translate-x-full');
    });

    closeButton.addEventListener('click', closePanel);
    overlay.addEventListener('click', closePanel);

    function closePanel() {
        panel.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }
</script>

</html>
