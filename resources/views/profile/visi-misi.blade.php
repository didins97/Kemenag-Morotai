@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        /* Visi-Misi Specific Styles */
        :root {
            --hero-image: url('/assets/img/visimisi.png');
        }

        .vision-quote {
            position: relative;
            padding: 1.5rem 1.5rem 1.5rem 3rem;
            background-color: #f0fdf4;
            border-radius: 0.75rem;
            font-style: italic;
            border-left: 4px solid #00A63D;
            box-shadow: inset 0 0 10px rgba(0, 166, 61, 0.1);
            font-size: 1.1rem;
            line-height: 1.8;
            color: #065f46;
            margin-bottom: 1.5rem;
        }

        .vision-quote::before {
            content: "\201C";
            position: absolute;
            top: 0.5rem;
            left: 1rem;
            font-size: 4rem;
            color: rgba(0, 166, 61, 0.15);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .mission-list {
            list-style-type: none;
            padding-left: 0;
        }

        .mission-list li {
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 1.2rem;
            line-height: 1.7;
        }

        .mission-list li::before {
            content: "";
            position: absolute;
            left: 0.5rem;
            top: 0.7em;
            width: 0.6rem;
            height: 0.6rem;
            background-color: #059669;
            border-radius: 50%;
            box-shadow: 0 0 0 2px rgba(5, 150, 105, 0.2);
        }

        .values-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .value-item {
            padding: 1.25rem;
            background-color: #f0fdf4;
            border-radius: 0.5rem;
            border-left: 3px solid #059669;
        }

        @media (max-width: 768px) {
            .vision-quote {
                font-size: 0.8rem;
                padding: 1rem 1rem 1rem 2.5rem;
            }

            .mission-list li {
                font-size: 0.8rem;
                padding-left: 2rem;
            }

            .value-item h3 {
                font-size: 0.8rem;
            }

            .value-item p {
                font-size: 0.8rem;
            }
        }

        @media (min-width: 768px) {
            .values-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">Visi & Misi</h1>
                <p class="text-xl md:text-2xl mb-6">Kementerian Agama Kabupaten Pulau Morotai</p>
                <div class="hero-divider"></div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb-nav">
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
                        <span class="text-gray-600">Visi & Misi</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section aria-labelledby="visiMisiHeading" class="py-8 md:py-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 id="visiMisiHeading" class="sr-only">Visi dan Misi Kementerian Agama</h2>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    @if ($visiMisi)
                        <!-- Visi Section -->
                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <i class="fas fa-eye mr-3 text-green-600"></i>
                                    Visi Kementerian Agama
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="vision-quote">
                                    {!! $visiMisi->visi !!}
                                </div>
                                <p class="content-text">
                                    Visi ini menjadi panduan strategis bagi seluruh jajaran Kementerian Agama Kabupaten
                                    Pulau Morotai dalam menjalankan tugas dan fungsi pelayanan kepada masyarakat.
                                </p>
                            </div>
                        </div>

                        <!-- Misi Section -->
                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <i class="fas fa-bullseye mr-3 text-green-600"></i>
                                    Misi Kementerian Agama
                                </h2>
                            </div>
                            <div class="card-body">
                                <p class="content-text mb-4">Untuk mewujudkan visi tersebut, Kementerian Agama Kabupaten
                                    Pulau Morotai melaksanakan misi sebagai berikut:</p>
                                <div class="mission-list">
                                    {!! $visiMisi->misi !!}
                                </div>
                            </div>
                        </div>

                        <!-- Nilai-nilai Section -->
                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <i class="fas fa-heart mr-3 text-green-600"></i>
                                    Nilai-nilai Kami
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="values-grid">
                                    <div class="value-item">
                                        <h3 class="font-bold text-green-800 mb-2 flex items-center">
                                            <i class="fas fa-hand-holding-heart mr-2 text-green-600"></i>
                                            Profesionalisme
                                        </h3>
                                        <p class="text-gray-700">Bekerja dengan keahlian, integritas, dan tanggung jawab.
                                        </p>
                                    </div>
                                    <div class="value-item">
                                        <h3 class="font-bold text-green-800 mb-2 flex items-center">
                                            <i class="fas fa-users mr-2 text-green-600"></i>
                                            Pelayanan Prima
                                        </h3>
                                        <p class="text-gray-700">Memberikan pelayanan yang cepat, tepat, dan ramah.</p>
                                    </div>
                                    <div class="value-item">
                                        <h3 class="font-bold text-green-800 mb-2 flex items-center">
                                            <i class="fas fa-balance-scale mr-2 text-green-600"></i>
                                            Keadilan
                                        </h3>
                                        <p class="text-gray-700">Memperlakukan semua pihak secara adil dan setara.</p>
                                    </div>
                                    <div class="value-item">
                                        <h3 class="font-bold text-green-800 mb-2 flex items-center">
                                            <i class="fas fa-shield-alt mr-2 text-green-600"></i>
                                            Akuntabilitas
                                        </h3>
                                        <p class="text-gray-700">Transparan dalam setiap tindakan dan keputusan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="content-card">
                            <div class="card-body text-center">
                                <i class="fas fa-info-circle text-gray-400 text-4xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Data visi dan misi belum tersedia</h3>
                                <p class="text-gray-500">Konten sedang dalam proses penyusunan</p>
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
            // Animate cards on scroll
            const cards = document.querySelectorAll('.content-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = "1";
                            entry.target.style.transform = "translateY(0)";
                        }, index * 150);
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => {
                observer.observe(card);
            });

            // Add hover effect to mission items
            const missionItems = document.querySelectorAll('.mission-list li');
            missionItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = "translateX(5px)";
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = "translateX(0)";
                });
            });
        });
    </script>
@endsection
