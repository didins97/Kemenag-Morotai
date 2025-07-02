@extends('app')

@section('css')
    <style>
        .unit-hero {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/unitkerja.png');
            background-size: cover;
            background-position: center;
        }

        .unit-card {
            border-left: 4px solid #059669;
            transition: all 0.3s ease;
        }

        .unit-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .staff-card {
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .staff-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(5, 150, 105, 0.1);
        }

        .staff-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #059669;
            ring: 2px #059669;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .submit-btn {
            background-color: #059669;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #047857;
        }

        .teamCoverflowSwiper .swiper-slide {
            transition: all 0.4s ease;
        }

        .teamCoverflowSwiper .swiper-slide:not(.swiper-slide-active) {
            opacity: 0.6;
            transform: scale(0.95);
        }

        .teamCoverflowSwiper .swiper-slide-active {
            z-index: 10;
        }

        .swiper-button-prev,
        .swiper-button-next {
            background: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .swiper-button-prev:after,
        .swiper-button-next:after {
            font-size: 16px;
            font-weight: bold;
        }

        .swiper-button-prev:hover,
        .swiper-button-next:hover {
            transform: scale(1.05);
            background: #f0fdf4;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="unit-hero py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $unitKerja->nama_unit }}</h1>
                <p class="text-xl md:text-2xl mb-8">Unit Kerja Kementerian Agama Kabupaten Pulau Morotai</p>
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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="#" class="text-sm font-medium text-gray-700 hover:text-green-600">Unit Kerja</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">{{ $unitKerja->nama_unit }}</span>
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
                <main class="w-full lg:w-2/3">
                    <!-- Profil Unit -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8 unit-card">
                        <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                            <i class="fas fa-building mr-3 text-green-600"></i>
                            Profil {{ $unitKerja->nama_unit }}
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $unitKerja->profil !!}
                        </div>
                    </div>

                    <!-- Tugas dan Fungsi -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8 unit-card">
                        <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                            <i class="fas fa-tasks mr-3 text-green-600"></i>
                            Tugas dan Fungsi
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Tugas Pokok:</h3>
                            {!! $unitKerja->tugas !!}

                            <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">Fungsi:</h3>
                            {!! $unitKerja->fungsi !!}
                        </div>
                    </div>

                    <!-- Struktur Bagian -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-8 unit-card">
                        <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                            <i class="fas fa-sitemap mr-3 text-green-600"></i>
                            Struktur Bagian Tata Usaha
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            <div class="overflow-x-auto">
                                <table class="min-w-full border border-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">
                                                Jabatan</th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Nama
                                            </th>
                                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">
                                                Pangkat/Golongan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unitKerja->strukturUnit as $struktur)
                                            <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }}">
                                                <td class="px-4 py-2 border-b">{{ $struktur->jabatan }}</td>
                                                <td class="px-4 py-2 border-b">{{ $struktur->nama }}</td>
                                                <td class="px-4 py-2 border-b">{{ $struktur->pangkat_golongan }}</td>
                                            </tr>
                                        @endforeach

                                        @if ($unitKerja->strukturUnit->isEmpty())
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-gray-500">Belum ada data
                                                    struktur unit</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Team Slider -->
                    <div class="bg-white py-8 rounded-lg shadow-sm mb-8 overflow-hidden">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center mb-10">
                                <h2 class="text-2xl font-bold text-gray-900 mb-3 relative inline-block">
                                    <span class="relative z-10">Tim {{ $unitKerja->nama_unit }}</span>
                                    <span
                                        class="absolute bottom-0 left-0 w-full h-2 bg-green-100/80 -z-[1] transform translate-y-1"></span>
                                </h2>
                                <p class="text-gray-500 max-w-2xl mx-auto">Tim profesional yang siap melayani Anda</p>
                            </div>

                            @if ($unitKerja->anggotaUnit->isNotEmpty())
                                <div class="relative px-4">
                                    <div class="swiper teamCoverflowSwiper"
                                        style="padding: 1.5rem 0 !important; overflow: hidden !important; width: 100%;">
                                        <div class="swiper-wrapper" style="display: flex; align-items: center;">
                                            @foreach ($unitKerja->anggotaUnit as $anggota)
                                                <div class="swiper-slide"
                                                    style="width: 250px !important; margin-right: 20px !important;">
                                                    <div class="flex flex-col items-center text-center group pb-4">
                                                        <div
                                                            class="relative mb-4 w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-lg transform transition-all duration-500 group-hover:border-green-200 group-hover:scale-105">
                                                            <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : '/assets/img/default.png' }}"
                                                                alt="{{ $anggota->nama }}"
                                                                class="w-full h-full object-cover">
                                                            <div
                                                                class="absolute inset-0 bg-gradient-to-t from-green-600/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                            </div>
                                                        </div>
                                                        <div class="px-2 w-full">
                                                            <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">
                                                                {{ $anggota->nama }}</h3>
                                                            <p class="text-green-600 text-xs font-medium truncate">
                                                                {{ $anggota->jabatan }}</p>
                                                            <p class="text-xs text-gray-500 mt-1 truncate">NIP.
                                                                {{ $anggota->nip }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-8 bg-gray-50 rounded-xl mx-4">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-md font-medium text-gray-900 mb-1">Belum ada anggota</h3>
                                    <p class="text-sm text-gray-500">Tim untuk unit ini akan segera diumumkan</p>
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
            new Swiper('.teamCoverflowSwiper', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                loop: true,
                autoplay: {
                    delay: 3000, // 3 detik
                    disableOnInteraction: false,
                },
                speed: 1000,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 80,
                    modifier: 2,
                    slideShadows: false,
                },
                navigation: {
                    nextEl: '.team-swiper-next',
                    prevEl: '.team-swiper-prev',
                },
                breakpoints: {
                    640: {
                        coverflowEffect: {
                            modifier: 1.5
                        }
                    },
                    768: {
                        coverflowEffect: {
                            modifier: 1.8
                        }
                    },
                    1024: {
                        coverflowEffect: {
                            modifier: 2
                        }
                    }
                }
            });
        });
    </script>
@endpush
