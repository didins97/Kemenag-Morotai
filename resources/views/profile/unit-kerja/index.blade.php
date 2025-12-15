@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        /* Unit Kerja Styles - Konsisten dengan Sejarah & Struktur */
        :root {
            --hero-image: url('/assets/img/unitkerja.png');
        }

        /* Card Styles - Sama seperti sejarah & struktur */
        .content-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            /* border-left: 3px solid #059669; */
        }

        .content-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.25rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .card-body {
            padding: 1.25rem;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
        }

        .table-custom {
            width: 100%;
            border-collapse: collapse;
        }

        .table-custom th {
            background-color: #f8fafc;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px solid #e5e7eb;
        }

        .table-custom td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            color: #4b5563;
        }

        .table-custom tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* Team Slider - Diperbarui */
        .team-slider-container {
            position: relative;
            padding: 1rem 0;
        }

        .team-slide {
            text-align: center;
            padding: 1rem;
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
        }

        .team-slide:hover .team-avatar {
            transform: scale(1.05);
            border-color: #059669;
        }

        /* Empty State - Konsisten */
        .empty-state {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .empty-state-icon {
            font-size: 2.5rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {

            .card-header,
            .card-body {
                padding: 1rem;
            }

            .team-avatar {
                width: 100px;
                height: 100px;
            }
        }

        p {
            text-align: justify;
        }

        ul {
            list-style: none;
            /* Hilangkan default bullet */
            padding-left: 1.5rem;
            margin: 0;
        }

        ul li {
            position: relative;
            margin-bottom: 0.75rem;
            padding-left: 1rem;
            color: #374151;
            /* Warna teks lebih netral (gray-700) */
            font-size: 0.95rem;
            line-height: 1.6;
        }

        ul li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.6rem;
            width: 0.5rem;
            height: 0.5rem;
            background-color: #059669;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section unit-hero">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">{{ $unitKerja->nama_unit }}</h1>
                <p class="text-xl md:text-2xl mb-6">Unit Kerja Kementerian Agama Kabupaten Pulau Morotai</p>
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
                        <a href="#" class="breadcrumb-link">Unit Kerja</a>
                    </div>
                    <div class="breadcrumb-item">
                        <span class="text-gray-600">{{ $unitKerja->nama_unit }}</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 md:py-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Profil Unit -->
                    <div class="content-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                <i class="fas fa-building mr-3 text-green-600"></i>
                                Profil {{ $unitKerja->nama_unit }}
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="prose max-w-none">
                                {!! $unitKerja->profil !!}
                            </div>
                        </div>
                    </div>

                    <!-- Tugas dan Fungsi -->
                    <div class="content-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                <i class="fas fa-tasks mr-3 text-green-600"></i>
                                Tugas dan Fungsi
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="prose max-w-none">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Tugas Pokok:</h3>
                                {!! $unitKerja->tugas !!}

                                <h3 class="text-lg font-semibold text-gray-800 mb-3 mt-6">Fungsi:</h3>
                                {!! $unitKerja->fungsi !!}
                            </div>
                        </div>
                    </div>

                    <!-- Struktur Bagian -->
                    {{-- <div class="content-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                <i class="fas fa-sitemap mr-3 text-green-600"></i>
                                Struktur Bagian Tata Usaha
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                            <th>Pangkat/Golongan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($unitKerja->strukturUnit as $struktur)
                                            <tr>
                                                <td>{{ $struktur->jabatan }}</td>
                                                <td>{{ $struktur->nama }}</td>
                                                <td>{{ $struktur->pangkat_golongan }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-gray-500">Belum ada data
                                                    struktur unit</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Team Slider -->
                    <div class="content-card">
                        <div class="card-header">
                            <h2 class="text-xl md:text-2xl font-bold text-green-800 flex items-center">
                                <i class="fas fa-users mr-3 text-green-600"></i>
                                Tim {{ $unitKerja->nama_unit }}
                            </h2>
                        </div>
                        <div class="card-body">
                            @if ($unitKerja->anggotaUnit->isNotEmpty())
                                <div class="swiper teamSwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($unitKerja->anggotaUnit as $anggota)
                                            <div class="swiper-slide">
                                                <div class="relative rounded-xl overflow-hidden shadow-lg">
                                                    <!-- Foto -->
                                                    <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : '/assets/img/default.png' }}"
                                                        alt="{{ $anggota->nama }}" class="w-full h-72 object-cover">

                                                    <!-- Overlay -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                                                    </div>

                                                    <!-- Info di atas overlay -->
                                                    <div
                                                        class="absolute bottom-0 left-0 right-0 p-4 text-white text-center">
                                                        <h3 class="font-semibold text-lg">{{ $anggota->nama }}</h3>
                                                        <p class="text-sm text-green-300">{{ $anggota->jabatan }}</p>
                                                        <p class="text-xs text-gray-200 mt-1">NIP. {{ $anggota->nip }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="empty-state">
                                    <i class="fas fa-users empty-state-icon"></i>
                                    <h3 class="text-lg font-medium text-gray-700">Belum ada anggota</h3>
                                    <p class="text-gray-500">Tim untuk unit ini akan segera diumumkan</p>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Swiper
            const swiper = new Swiper(".teamSwiper", {
                effect: "coverflow",
                grabCursor: true,
                centeredSlides: false,
                slidesPerView: 3,
                loop: true, // loop terus-menerus
                loopAdditionalSlides: 5,
                coverflowEffect: {
                    rotate: 30,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false, // autoplay tetap jalan meski user swipe
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                },
            });


            // Animasi card seperti halaman sejarah
            const cards = document.querySelectorAll('.content-card');
            cards.forEach((card, index) => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.opacity = 1;
                    card.style.transform = 'translateY(0)';
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                }, index * 150);
            });
        });
    </script>
@endpush
