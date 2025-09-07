@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        /* Tugas & Fungsi Specific Styles */
        :root {
            --hero-image: url('/assets/img/tungsi.png');
        }

        .function-card {
            border-left: 5px solid #059669;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .function-card-header {
            padding: 1.5rem;
            background-color: #f0fdf4;
            border-bottom: 1px solid #dcfce7;
        }

        .function-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .list-fungsi ul {
            list-style-type: none;
            padding-left: 0;
        }

        .list-fungsi li {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .list-fungsi li::before {
            content: "";
            position: absolute;
            left: 0.5rem;
            top: 0.7em;
            width: 8px;
            height: 8px;
            background-color: #059669;
            border-radius: 2px;
            transform: rotate(45deg);
        }

        .tugas-content {
            line-height: 1.8;
            color: #4b5563;
        }

        .tugas-content p {
            margin-bottom: 1.25rem;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #dcfce7;
            color: #059669;
            border-radius: 0.5rem;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .function-card {
                padding: 1rem;
            }

            .function-card-header {
                padding: 1.25rem;
            }

            .card-icon {
                width: 36px;
                height: 36px;
                margin-right: 0.75rem;
            }

            .list-fungsi li {
                padding-left: 1.75rem;
                font-size: 0.95rem;
            }

            .tugas-content {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">Tugas & Fungsi</h1>
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
                        <span class="text-gray-600">Tugas & Fungsi</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section aria-labelledby="tugasFungsiHeading" class="py-8 md:py-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 id="tugasFungsiHeading" class="sr-only">Tugas dan Fungsi Kementerian Agama</h2>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    @if ($tugasFungsi)
                        <!-- Tugas Section -->
                        <div class="content-card mb-8">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <div class="card-icon">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    Tugas Kementerian Agama
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="tugas-content">
                                    {!! $tugasFungsi->tugas !!}
                                </div>
                            </div>
                        </div>

                        <!-- Fungsi Section -->
                        <div class="content-card">
                            <div class="card-header">
                                <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                    <div class="card-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    Fungsi Kementerian Agama
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="list-fungsi">
                                    {!! $tugasFungsi->fungsi !!}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="content-card">
                            <div class="card-body text-center">
                                <i class="fas fa-info-circle text-gray-400 text-4xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Data tugas dan fungsi belum tersedia</h3>
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
            }, { threshold: 0.1 });

            cards.forEach(card => {
                observer.observe(card);
            });

            // Add hover effect to list items
            const listItems = document.querySelectorAll('.list-fungsi li');
            listItems.forEach(item => {
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
