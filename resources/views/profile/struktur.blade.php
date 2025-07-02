@extends('app')

@section('css')
    <style>
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
        .hero-org {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                        url('/assets/img/struktur-bg.png');
            background-size: cover;
            background-position: center;
        }

        .deskripsi li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .deskripsi li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #059669;
            font-weight: bold;
        }

        .deskripsi p {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-org py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Struktur Organisasi</h1>
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
                        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Struktur Organisasi</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full">
                    @if ($struktur)
                    <div class="org-structure">
                        <div class="org-title">
                            <h2 class="text-2xl font-bold">Bagan Struktur Organisasi</h2>
                            <p class="mt-2">Peraturan Menteri Agama Nomor 10 Tahun 2023</p>
                        </div>

                        <div class="org-image-container">
                            <!-- Ganti dengan gambar struktur organisasi yang sesuai -->
                            <img src="{{ asset('storage/' . $struktur->gambar) }}" alt="Struktur Organisasi Kemenag Morotai" class="org-image">
                            <p class="org-caption">Struktur Organisasi Kementerian Agama Kabupaten Pulau Morotai Tahun 2025</p>

                            <a href="{{ asset('storage/' . $struktur->gambar) }}" class="download-btn">
                                <i class="fas fa-download mr-2"></i>
                                Unduh Struktur Lengkap (PDF)
                            </a>
                        </div>
                    </div>

                    <!-- Penjelasan Struktur -->
                    <div class="prose max-w-none mt-8 deskripsi">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Penjelasan Struktur</h3>
                        {!! $struktur->deskripsi !!}
                    </div>
                    @else
                    @endif
                </main>

                <!-- Sidebar - Same as Previous Pages -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
