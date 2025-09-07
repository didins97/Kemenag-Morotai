@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        /* Sejarah Specific Styles */
        :root {
            --hero-image: url('/assets/img/sejarah.png');
        }

        /* Timeline Design */
        .timeline-container {
            position: relative;
            padding: 1rem 0;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            width: 4px;
            background: linear-gradient(to bottom, #059669, #10B981, #059669);
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 4px;
        }

        .timeline-item {
            padding: 1rem 0;
            position: relative;
            width: 50%;
            box-sizing: border-box;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .timeline-left {
            left: 0;
            padding-right: 2.5rem;
        }

        .timeline-left::after {
            right: -10px;
        }

        .timeline-right {
            left: 50%;
            padding-left: 2.5rem;
        }

        .timeline-right::after {
            left: -10px;
        }

        .timeline-content {
            padding: 1.25rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-top: 3px solid #059669;
        }

        .timeline-year {
            position: absolute;
            top: 1.25rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            background: #059669;
            padding: 0.2rem 0.8rem;
            border-radius: 1rem;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .timeline-left .timeline-year {
            right: -3.5rem;
        }

        .timeline-right .timeline-year {
            left: -3.5rem;
        }

        .timeline-tag {
            font-size: 0.75rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.75rem;
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Mobile Timeline Adjustments */
        @media (max-width: 768px) {
            .timeline-container::before {
                left: 1.5rem;
                transform: none;
            }

            .timeline-item {
                width: 100%;
                padding-left: 3.5rem;
                padding-right: 0;
            }

            .timeline-item::after {
                left: 1rem;
                width: 16px;
                height: 16px;
                border-width: 3px;
                top: 1.25rem;
            }

            .timeline-left,
            .timeline-right {
                left: 0;
                padding-right: 0;
                padding-left: 3.5rem;
            }

            .timeline-left .timeline-year,
            .timeline-right .timeline-year {
                left: 0.25rem;
                right: auto;
                top: 1rem;
                font-size: 0.8rem;
                padding: 0.15rem 0.6rem;
            }

            .timeline-content {
                padding: 0.75rem;
                font-size: 0.8rem;
            }

            .timeline-tag {
                font-size: 0.7rem;
                padding: 0.15rem 0.5rem;
            }

            .timeline-card .card-body {
                padding: 0;
            }
        }

        .latar-belakang p {
            text-align: justify;
        }

        /* Timeline Animations */
        .timeline-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .timeline-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .timeline-item:nth-child(3) {
            animation-delay: 0.3s;
        }

        .timeline-item:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">Sejarah</h1>
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
                        <span class="text-gray-600">Sejarah</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section aria-labelledby="sejarahHeading" class="py-8 md:py-12 bg-gray-50">
        <div class="container mx-auto px-4">

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Latar Belakang Section -->
                    <div class="content-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center section-title">
                                <i class="fas fa-landmark mr-3 text-green-600"></i>
                                Latar Belakang Pembentukan
                            </h2>
                        </div>
                        <div class="card-body">
                            @if ($sejarah && $sejarah->latar_belakang)
                                <div class="prose max-w-none latar-belakang">
                                    <p class="content-text">{!! nl2br(e($sejarah->latar_belakang)) !!}</p>
                                </div>
                            @else
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r">
                                    <p class="text-yellow-700">Konten latar belakang belum tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Timeline Section -->
                    <div class="content-card timeline-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                <i class="fas fa-history mr-3 text-green-600"></i>
                                Linimasa Sejarah
                            </h2>
                        </div>
                        <div class="card-body">
                            @if ($sejarah && $sejarah->timeline && count($sejarah->timeline) > 0)
                                <div class="timeline-container">
                                    @foreach ($sejarah->timeline as $index => $item)
                                        <div
                                            class="timeline-item {{ $index % 2 == 0 ? 'timeline-left' : 'timeline-right' }}">
                                            <div class="timeline-year">{{ $item['year'] ?? 'Tahun' }}</div>
                                            <div class="timeline-content">
                                                <p class="content-text mb-2">
                                                    {{ $item['description'] ?? 'Deskripsi tidak tersedia' }}</p>
                                                @if (isset($item['title']))
                                                    <div class="mt-2">
                                                        @foreach ((array) $item['title'] as $tag)
                                                            @php
                                                                $tagColors = [
                                                                    'Peresmian' => 'bg-green-100 text-green-800',
                                                                    'SDM' => 'bg-blue-100 text-blue-800',
                                                                    'Program' => 'bg-yellow-100 text-yellow-800',
                                                                    'Infrastruktur' => 'bg-purple-100 text-purple-800',
                                                                    'default' => 'bg-gray-100 text-gray-800',
                                                                ];
                                                                $color = $tagColors[$tag] ?? $tagColors['default'];
                                                            @endphp
                                                            <span
                                                                class="timeline-tag {{ $color }}">{{ $tag }}</span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r text-center">
                                    <p class="text-yellow-700">Data timeline sejarah belum tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>
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
            const animateElements = (selector, options = {}) => {
                const elements = document.querySelectorAll(selector);
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.style.opacity = "1";
                                entry.target.style.transform = "translateY(0)";
                            }, index * (options.delay || 150));
                        }
                    });
                }, {
                    threshold: options.threshold || 0.1
                });

                elements.forEach(el => observer.observe(el));
            };

            // Animate content cards
            animateElements('.content-card');

            // Animate timeline items with different timing
            animateElements('.timeline-item', {
                delay: 100,
                threshold: 0.05
            });

            // Add hover effect to timeline items
            document.querySelectorAll('.timeline-content').forEach(item => {
                item.addEventListener('mouseenter', () => {
                    item.style.transform = "translateY(-3px)";
                    item.style.boxShadow = "0 4px 16px rgba(0, 0, 0, 0.1)";
                });
                item.addEventListener('mouseleave', () => {
                    item.style.transform = "";
                    item.style.boxShadow = "";
                });
            });
        });
    </script>
@endsection
