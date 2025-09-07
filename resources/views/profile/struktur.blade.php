@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        /* Struktur Organisasi Styles */
        :root {
            --hero-image: url('/assets/img/struktur-bg.png');
        }

        /* Diagram Styles */
        .diagram-container {
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: white;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .diagram-image {
            width: 100%;
            height: auto;
            display: block;
            padding: 1rem;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            background: #059669;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-download:hover {
            background: #047857;
            transform: translateY(-2px);
        }

        /* Penjelasan Styles dengan List */
        .penjelasan-content {
            padding: 1.25rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            line-height: 1.7;
            color: #4b5563;
        }

        .penjelasan-content p {
            margin-bottom: 1rem;
        }

        /* Styling untuk List */
        .penjelasan-content ul,
        .penjelasan-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .penjelasan-content ul {
            list-style-type: none;
            padding-left: 0;
        }

        .penjelasan-content ul li {
            position: relative;
            padding-left: 1.75rem;
            margin-bottom: 0.75rem;
        }

        .penjelasan-content ul li:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.65em;
            width: 0.5em;
            height: 0.5em;
            background-color: #059669;
            border-radius: 50%;
        }

        .penjelasan-content ol {
            list-style-type: none;
            counter-reset: custom-counter;
        }

        .penjelasan-content ol li {
            counter-increment: custom-counter;
            position: relative;
            padding-left: 2rem;
            margin-bottom: 0.75rem;
        }

        .penjelasan-content ol li:before {
            content: counter(custom-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: #059669;
            color: white;
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        /* Styling untuk Heading dalam Penjelasan */
        .penjelasan-content h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e3a8a;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .penjelasan-content h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #1e40af;
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
        }

        /* Animasi */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">Struktur Organisasi</h1>
                <p class="text-xl md:text-2xl mb-6">Kementerian Agama Kabupaten Pulau Morotai</p>
                <div class="hero-divider"></div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb-nav bg-gray-50 border-b">
        <div class="container mx-auto px-4">
            <nav aria-label="Breadcrumb">
                <div class="flex flex-wrap items-center">
                    <div class="breadcrumb-item">
                        <a href="/" class="breadcrumb-link flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <span class="text-gray-600">Struktur Organisasi</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 md:py-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <main class="w-full lg:w-2/3">
                    @if($struktur)
                        <!-- Diagram Card -->
                        <div class="content-card fade-in">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <i class="fas fa-sitemap mr-3 text-green-600"></i>
                                    Diagram Struktur Organisasi
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="diagram-container">
                                    <img src="{{ asset('storage/' . $struktur->gambar) }}"
                                         alt="Struktur Organisasi"
                                         class="diagram-image">
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ asset('storage/' . $struktur->gambar) }}"
                                       class="btn-download"
                                       download="Struktur-Kemenag-Morotai">
                                        <i class="fas fa-download mr-2"></i>
                                        Unduh Diagram
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Penjelasan Card dengan Contoh List -->
                        <div class="content-card fade-in" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <i class="fas fa-info-circle mr-3 text-green-600"></i>
                                    Penjelasan Struktur
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="penjelasan-content">
                                    {!! $struktur->deskripsi !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="content-card">
                            <div class="card-body text-center py-12">
                                <i class="fas fa-sitemap text-4xl text-gray-300 mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-700">Data Belum Tersedia</h3>
                                <p class="text-gray-500 mt-2">Struktur organisasi sedang dalam proses pembaruan</p>
                            </div>
                        </div>
                    @endif
                </main>

                <!-- Sidebar -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi fade-in
            const cards = document.querySelectorAll('.fade-in');
            cards.forEach((card, index) => {
                card.style.opacity = 0;
                setTimeout(() => {
                    card.style.opacity = 1;
                }, index * 200);
            });
        });
    </script>
@endsection
