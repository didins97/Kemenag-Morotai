@extends('app')

@section('css')
    <style>
        /* Gaya Khusus Detail Unit Kerja */
        .unit-gradient-bg {
            background: radial-gradient(circle at top right, #f0fdf4 0%, #ffffff 50%);
        }

        /* Typography & Content */
        .prose-custom :where(ul):not(:where([class~="not-prose"] *)) {
            list-style-type: none;
            padding-left: 0;
        }

        .prose-custom :where(li):not(:where([class~="not-prose"] *)) {
            position: relative;
            padding-left: 1.75rem;
            margin-bottom: 0.75rem;
        }

        .prose-custom :where(li):not(:where([class~="not-prose"] *))::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.6rem;
            width: 0.5rem;
            height: 0.5rem;
            background-color: #10b981;
            border-radius: 50%;
        }

        /* Swiper Custom */
        .teamSwiper {
            padding: 2rem 1rem 4rem !important;
        }

        .member-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .member-card:hover {
            transform: translateY(-10px);
        }
    </style>
@endsection

@section('content')
    <section
        class="relative bg-gradient-to-b from-emerald-50 via-white to-gray-50 py-16 sm:py-24 overflow-hidden border-b border-emerald-100/50">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-200/30 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-green-200/30 rounded-full opacity-50 blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol
                        class="flex items-center space-x-2 text-emerald-600/80 text-[10px] uppercase tracking-[0.2em] font-bold">
                        <li>
                            <a href="/" class="hover:text-emerald-900 transition-colors">Beranda</a>
                        </li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="opacity-50">Unit Kerja</li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="text-emerald-950">{{ $unitKerja->nama_unit }}</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase leading-tight">
                    {{ $unitKerja->nama_unit }}
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Mengenal lebih dekat tugas, fungsi, dan struktur tim kerja pelaksana pelayanan di lingkungan Kementerian
                    Agama.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 unit-gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto space-y-16">

                <div
                    class="bg-white rounded-[2.5rem] p-8 md:p-16 shadow-sm border border-emerald-50 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-emerald-500"></div>

                    <div class="flex flex-col md:flex-row gap-12 items-start">
                        <div class="w-full md:w-1/3">
                            <h2 class="text-2xl font-black text-emerald-950 uppercase tracking-tight">
                                Profil <br><span class="text-emerald-600">Unit Kerja</span>
                            </h2>
                            <div class="w-12 h-1 bg-emerald-100 mt-4 rounded-full"></div>
                        </div>
                        <div
                            class="w-full md:w-2/3 prose prose-emerald prose-custom max-w-none text-slate-600 leading-relaxed">
                            {!! $unitKerja->profil !!}
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-emerald-800 text-white rounded-[2.5rem] p-8 md:p-12 shadow-xl relative overflow-hidden">
                        <i class="fas fa-thumbtack absolute -right-4 -top-4 text-8xl text-white/5 rotate-12"></i>
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                            <span class="p-2 bg-emerald-800 rounded-lg text-emerald-300">
                                <i class="fas fa-clipboard-check"></i>
                            </span>
                            Tugas Pokok
                        </h3>
                        <div class="prose prose-invert prose-custom text-emerald-100/80 text-sm leading-relaxed">
                            {!! $unitKerja->tugas_pokok !!}
                        </div>
                    </div>

                    <div class="bg-white border border-emerald-100 rounded-[2.5rem] p-8 md:p-12 shadow-sm">
                        <h3 class="text-xl font-bold text-emerald-950 mb-6 flex items-center gap-3">
                            <span class="p-2 bg-emerald-50 rounded-lg text-emerald-600">
                                <i class="fas fa-chart-line"></i>
                            </span>
                            Fungsi Utama
                        </h3>
                        <div class="prose prose-emerald prose-custom text-slate-600 text-sm leading-relaxed">
                            {!! $unitKerja->fungsi !!}
                        </div>
                    </div>
                </div>

                <div class="pt-12">
                    <div class="text-center mb-12">
                        <span
                            class="px-4 py-2 bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-[0.3em] rounded-full">Sumber
                            Daya Manusia</span>
                        <h2 class="text-3xl md:text-4xl font-black text-emerald-950 mt-4 uppercase">Struktur Tim Kami</h2>
                    </div>

                    @if ($unitKerja->anggotaUnit->isNotEmpty())
                        <div class="swiper teamSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($unitKerja->anggotaUnit as $anggota)
                                    <div class="swiper-slide">
                                        <div
                                            class="member-card group relative bg-white rounded-[2rem] overflow-hidden border border-emerald-50 shadow-sm hover:shadow-2xl">
                                            <div class="h-80 overflow-hidden relative">
                                                <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : '/assets/img/default.png' }}"
                                                    alt="{{ $anggota->nama }}"
                                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-transparent to-transparent opacity-80">
                                                </div>
                                            </div>

                                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white text-center">
                                                <h3 class="font-bold text-lg leading-tight">{{ $anggota->nama }}</h3>
                                                <p
                                                    class="text-emerald-400 text-xs font-bold uppercase tracking-widest mt-1">
                                                    {{ $anggota->jabatan }}</p>
                                                <div
                                                    class="mt-3 pt-3 border-t border-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    <p class="text-[10px] text-white/60 tracking-widest">NIP.
                                                        {{ $anggota->nip }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination !-bottom-2"></div>
                        </div>
                    @else
                        <div class="bg-gray-50 border border-dashed border-gray-200 rounded-[2.5rem] py-20 text-center">
                            <i class="fas fa-user-friends text-gray-300 text-5xl mb-4"></i>
                            <h3 class="text-lg font-bold text-gray-400">Data anggota belum diperbarui</h3>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <section class="relative py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-emerald-100/50 to-white"></div>

        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-200/20 rounded-full blur-[120px] -mr-64 -mt-64">
        </div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-green-200/20 rounded-full blur-[120px] -ml-64 -mb-64">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div
                class="relative bg-white/40 backdrop-blur-xl border border-white/60 rounded-[3rem] md:rounded-[5rem] p-10 md:p-20 shadow-xl shadow-emerald-900/5 overflow-hidden">

                <div
                    class="absolute top-0 left-0 w-32 h-32 border-t-4 border-l-4 border-emerald-500/20 rounded-tl-[3rem] md:rounded-tl-[5rem]">
                </div>

                <div class="max-w-3xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500/10 rounded-full mb-8">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span class="text-emerald-700 text-[10px] font-black uppercase tracking-widest">Eksplorasi Lebih
                            Jauh</span>
                    </div>

                    <h3 class="text-3xl md:text-5xl font-black text-emerald-950 mb-6 leading-tight">
                        Mari mengenal kami <br>
                        <span class="text-emerald-600">lebih dekat lagi.</span>
                    </h3>

                    <p class="text-emerald-800/60 text-base md:text-lg mb-12 font-medium">
                        Jelajahi visi utama kami dan ikuti setiap perkembangan terkini melalui arsip berita resmi.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                        <a href="/profil/visi-misi"
                            class="group w-full sm:w-auto px-10 py-5 bg-emerald-600 text-white font-bold rounded-2xl transition-all duration-300 hover:bg-emerald-700 hover:scale-105 shadow-xl shadow-emerald-600/20 flex items-center justify-center gap-3">
                            <span>Visi & Misi</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>

                        <a href="/berita"
                            class="w-full sm:w-auto px-10 py-5 bg-white text-emerald-700 font-bold rounded-2xl border border-emerald-100 hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-300 shadow-sm flex items-center justify-center gap-3">
                            <i class="far fa-newspaper opacity-60"></i>
                            <span>Arsip Berita</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper(".teamSwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                },
            });
        });
    </script>
@endpush
