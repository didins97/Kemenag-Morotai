@extends('app')

@section('css')
    <style>
        .service-hero {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/layanan.png');
            background-size: cover;
            background-position: center;
        }

        .flow-container {
            counter-reset: step;
        }

        .flow-step {
            position: relative;
            padding-left: 3rem;
            margin-bottom: 2rem;
        }

        .flow-step:before {
            counter-increment: step;
            content: counter(step);
            position: absolute;
            left: 0;
            top: 0;
            width: 2rem;
            height: 2rem;
            background-color: #059669;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .flow-step:after {
            content: "";
            position: absolute;
            left: 1rem;
            top: 2rem;
            bottom: -2rem;
            width: 2px;
            background-color: #059669;
        }

        .flow-step:last-child:after {
            display: none;
        }

        .org-structure {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .org-title {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .org-image-container {
            padding: 2rem;
            text-align: center;
            background-color: #f9fafb;
        }

        .org-image {
            max-width: 100%;
            height: auto;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .org-caption {
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #6b7280;
            text-align: center;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            background-color: #059669;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
        }

        .download-btn:hover {
            background-color: #047857;
            transform: translateY(-2px);
        }
    </style>

    <style>
        @keyframes ping-slow {
            0% {
                transform: scale(0.95);
                opacity: 0.7;
            }

            70% {
                transform: scale(1.1);
                opacity: 0.3;
            }

            100% {
                transform: scale(1.15);
                opacity: 0;
            }
        }

        .animate-ping-slow {
            animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="service-hero py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Alur Pelayanan Kantor</h1>
                <p class="text-xl md:text-2xl mb-8">Kementerian Agama Kabupaten Pulau Morotai</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto"></div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-3 border-b">
        <div class="container mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Alur Pelayanan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <div class="prose max-w-none mb-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-6">Pelayanan Terpadu Satu Pintu</h2>
                        <div class="text-gray-700 leading-relaxed space-y-4">
                            Pelayanan Terpadu Satu Pintu merupakan bagian dari wujud komitmen Kementerian Agama untuk lebih
                            dekat melayani umat. Melayani umat adalah manifestasi dari komitmen motto Ikhlas Beramal. PTSP
                            adalah satu cara mengejawantahkan Ikhlas Beramal juga 5 nilai budaya kerja Kemenag yaitu; Integritas, Profesionalitas, Inovasi, Tanggung Jawab dan Keteladanan. Inovasi pelayanan yang
                            terpusat dan dapat diakses secara online ini diharapkan akan mempermudah publik dalam mendapat
                            layanan Kementerian Agama.
                        </div>
                        <!-- Gambar di sini -->
                        <div class="org-image-container">
                            <img src="/assets/img/image.png" alt="Alur Layanan PTSP Kemenag Morotai" class="org-image">
                            <p class="org-caption">
                                Foto Ruang Kerja PTSP Kantor Kementrian Agama Kabupaten Pulau Morotai
                            </p>
                        </div>
                    </div>

                    <!-- Persyaratan Download Button -->
                    <div class="text-center mb-8">
                        <a target="_blank"
                            href="https://kemenagternate.id/wp-content/uploads/2022/01/Persyaratan-Layanan-PTSP-Final.pdf"
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-file-download mr-2"></i>
                            Download Persyaratan PTSP (PDF)
                        </a>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-6">Alur Pelayanan PTSP</h2>
                        <div class="org-image-container">
                            @if ($pelayanan->gambar)
                                <img src="{{ asset('storage/' . $pelayanan->gambar) }}"
                                    alt="Alur Layanan PTSP Kemenag Morotai" class="org-image">
                            @else
                                <img src="/assets/img/pelayanan.png" alt="Alur Layanan PTSP Kemenag Morotai"
                                    class="org-image">
                            @endif
                            <p class="org-caption">
                                Alur Layanan PTSP Kantor Kementrian Agama Kabupaten Pulau Morotai
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                        <h2 class="text-2xl font-bold text-green-800 mb-6">Detail Alur Pelayanan</h2>
                        <div class="flow-container">
                            @foreach ($pelayanan->proses as $index => $step)
                                <div class="flow-step">
                                    <div class="flex items-start">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $step['judul'] }}</h3>
                                            <p class="text-gray-700">
                                                {{ $step['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Jam Pelayanan -->
                    <div class="bg-green-50 rounded-lg p-6 border border-green-100">
                        <h2 class="text-2xl font-bold text-green-800 mb-4 flex items-center">
                            <i class="fas fa-clock mr-3"></i>
                            Jam Pelayanan
                        </h2>
                        <div class="grid md:grid-cols-2 gap-4 text-gray-700">
                            <div>
                                <p class="font-medium">Hari Kerja:</p>
                                <p>Senin - Kamis: 08.00 - 16.00 WIT</p>
                                <p>Jumat: 08.00 - 16.30 WIT</p>
                            </div>
                            <div>
                                <p class="font-medium">Istirahat:</p>
                                <p>12.00 - 13.00 WIT</p>
                                <p class="mt-2 font-medium">Sabtu & Minggu:</p>
                                <p>Libur</p>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Customer Service Button - Clickable Enhanced Version -->
                    <div class="fixed bottom-6 right-6 z-50">
                        <a href="https://wa.me/6281234567890?text=Halo%20CS%20PTSP%20Kemenag%20Morotai,%20saya%20ingin%20bertanya%20tentang..."
                            target="_blank" class="block relative group animate-bounce">

                            <!-- Floating Badge -->
                            <div
                                class="absolute -top-3 -right-3 bg-red-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center animate-pulse">
                                <i class="fas fa-headset"></i>
                            </div>

                            <!-- Main Button Container -->
                            <div class="bg-white p-1.5 rounded-full shadow-2xl cursor-pointer">
                                <!-- Animated Ring -->
                                <div
                                    class="absolute inset-0 rounded-full border-4 border-green-300 opacity-70 animate-ping-slow">
                                </div>

                                <!-- Button Content -->
                                <div
                                    class="flex items-center bg-gradient-to-br from-[#25D366] to-[#128C7E] text-white rounded-full px-4 py-3 shadow-lg transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
                                    <!-- WhatsApp Icon -->
                                    <div class="bg-white/20 rounded-full p-2 mr-3">
                                        <i class="fab fa-whatsapp text-xl"></i>
                                    </div>

                                    <!-- Text -->
                                    <div class="text-left">
                                        <div class="text-xs font-light">Customer Service</div>
                                        <div class="text-sm font-bold">PTSP Kemenag</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </main>

                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
