@extends('app')

@section('css')
    <style>
        /* --- General Layout --- */
        @media (min-width: 768px) {
            .container {
                margin: 0 auto;
                padding: 0 0px;
            }
        }

        @media (max-width: 639px) {
            section {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

        /* --- Global Swiper Reset --- */
        .swiper-pagination-bullets.swiper-pagination-horizontal {
            background: none !important;
        }

        /* --- Component: Main Banner --- */
        .main-banner-pagination.swiper-pagination-bullets {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .main-banner-pagination .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.7) !important;
            opacity: 1 !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .main-banner-pagination .swiper-pagination-bullet-active {
            background: #ffffff !important;
            width: 20px;
            border-radius: 5px;
        }

        /* --- Component: Mobile Hero --- */
        .mobileHeroSwiper {
            padding-bottom: 5px !important;
        }

        .mobile-hero-pagination {
            width: 100%;
            height: 12px;
        }

        .mobile-hero-pagination .swiper-pagination-bullet {
            width: 7px;
            height: 7px;
            background: #10b981 !important;
            opacity: 0.2;
            margin: 0 3px !important;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .mobile-hero-pagination .swiper-pagination-bullet-active {
            width: 22px !important;
            border-radius: 12px;
            opacity: 1 !important;
        }

        /* --- Component: Heading News Mobile --- */
        .headingnews-mobile-pagination .swiper-pagination-bullet {
            width: 6px;
            height: 6px;
            background: #fff !important;
            opacity: 0.4;
            transition: all 0.3s ease;
        }

        .headingnews-mobile-pagination .swiper-pagination-bullet-active {
            width: 24px;
            border-radius: 10px;
            opacity: 1;
            background: #10b981 !important;
        }

        /* --- Component: Video Section --- */
        .video-pagination .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #059669;
            opacity: 0.2;
            transition: all 0.3s;
        }

        .video-pagination .swiper-pagination-bullet-active {
            width: 30px;
            border-radius: 5px;
            opacity: 1;
        }

        /* --- Component: Gallery Section --- */
        .gallery-pagination .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background: #059669;
            opacity: 0.2;
            transition: all 0.3s;
        }

        .gallery-pagination .swiper-pagination-bullet-active {
            width: 24px;
            border-radius: 4px;
            opacity: 1;
        }
    </style>
@endsection


@section('content')
    <div
        class="w-full bg-gradient-to-r from-emerald-900 via-teal-900 to-emerald-900 text-white shadow-lg hidden sm:block border-b border-white/10">
        <div class="container mx-auto max-w-7xl px-4 py-2">
            <div class="flex items-center justify-between">

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 bg-black/20 px-3 py-1.5 rounded-full border border-white/10">
                        <i class="fa-solid fa-location-dot text-amber-400 animate-pulse"></i>
                        {{-- Handle jika lokasi tidak ada --}}
                        <span class="text-xs font-bold tracking-widest uppercase">
                            {{ $jadwalSholat['lokasi'] ?? 'LOKASI TIDAK TERSEDIA' }}
                        </span>
                    </div>
                    <div class="hidden lg:block text-[11px] text-emerald-200/70 font-medium">
                        <i class="fa-regular fa-clock mr-1"></i>
                        {{ $jadwalSholat['tanggal'] ?? now()->translatedFormat('d F Y') }}
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    @php
                        $dataJadwal = $jadwalSholat['jadwal'] ?? null;
                        $sholat = [
                            ['n' => 'Subuh', 'v' => $dataJadwal['subuh'] ?? '--:--', 'i' => 'fa-mosque'],
                            ['n' => 'Dzuhur', 'v' => $dataJadwal['dzuhur'] ?? '--:--', 'i' => 'fa-sun'],
                            ['n' => 'Ashar', 'v' => $dataJadwal['ashar'] ?? '--:--', 'i' => 'fa-cloud-sun'],
                            ['n' => 'Maghrib', 'v' => $dataJadwal['maghrib'] ?? '--:--', 'i' => 'fa-moon'],
                            ['n' => 'Isya', 'v' => $dataJadwal['isya'] ?? '--:--', 'i' => 'fa-star'],
                        ];
                    @endphp

                    @foreach ($sholat as $s)
                        <div
                            class="group relative flex items-center bg-white/5 hover:bg-white/10 border border-white/10 px-3 py-1 rounded-lg transition-all duration-300">
                            <div class="flex flex-col items-start pr-2 border-r border-white/10">
                                <span
                                    class="text-[9px] uppercase leading-none text-emerald-300 font-semibold tracking-tighter">{{ $s['n'] }}</span>
                                <span class="text-sm font-bold tracking-tight text-white">{{ $s['v'] }}</span>
                            </div>
                            <i
                                class="fa-solid {{ $s['i'] }} text-[10px] ml-2 text-amber-400/50 group-hover:text-amber-400 transition-colors"></i>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <section class="modern-news py-4 md:py-12 px-0 sm:px-6 bg-white overflow-hidden">
        <div class="container mx-auto max-w-7xl">

            <div class="featured-layout grid grid-cols-1 lg:grid-cols-4 gap-8 md:gap-10 items-start">

                <div class="lg:col-span-3">

                    <div class="hidden lg:block">
                        <div class="swiper headingnews-desktop">
                            <div class="swiper-wrapper">
                                @foreach ($beritaPilihan as $berita)
                                    <div class="swiper-slide py-0">
                                        <article
                                            class="relative group h-[485px] w-full overflow-hidden rounded-[2rem] bg-white border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition-all duration-500 hover:shadow-[0_20px_45px_rgba(16,185,129,0.08)]">

                                            <div class="absolute inset-y-0 right-0 w-[58%] h-full overflow-hidden">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                    class="w-full h-full object-cover transition-transform duration-[1500ms] group-hover:scale-105">

                                                <div
                                                    class="absolute inset-0 bg-gradient-to-r from-white via-white/40 to-transparent z-10">
                                                </div>
                                            </div>

                                            <div
                                                class="absolute top-0 left-0 w-[48%] h-full bg-white p-10 flex flex-col z-20">

                                                <div class="flex items-center gap-3 mb-6">
                                                    <span
                                                        class="px-3 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-bold rounded-full uppercase tracking-widest">
                                                        Berita Utama
                                                    </span>
                                                    <span class="text-[11px] text-slate-400 font-medium italic">
                                                        {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                                                    </span>
                                                </div>

                                                <div class="mb-4">
                                                    <h2
                                                        class="text-[28px] font-black text-slate-900 leading-[1.2] tracking-tight group-hover:text-emerald-600 transition-colors duration-300">
                                                        <a href="{{ route('berita.detail', $berita->slug) }}"
                                                            class="line-clamp-2">
                                                            {{ $berita->judul }}
                                                        </a>
                                                    </h2>
                                                    <div class="w-12 h-1 bg-emerald-500 rounded-full mt-4"></div>
                                                </div>

                                                <div class="mb-6">
                                                    <p class="text-slate-500 text-[15px] leading-relaxed line-clamp-3">
                                                        {{ Str::limit(strip_tags($berita->isi), 140) }}
                                                    </p>
                                                </div>

                                                <div
                                                    class="mt-auto flex items-center justify-between gap-4 pt-6 border-t border-slate-50">
                                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                                        class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-xl text-xs font-bold transition-all hover:bg-emerald-600 hover:shadow-lg active:scale-95">
                                                        <span>Baca Selengkapnya</span>
                                                        <i class="fa-solid fa-arrow-right-long text-[10px]"></i>
                                                    </a>

                                                    <div class="flex gap-2">
                                                        <button
                                                            class="w-10 h-10 rounded-lg border border-slate-100 flex items-center justify-center text-slate-400 hover:bg-white hover:text-emerald-600 hover:border-emerald-200 hover:shadow-md transition-all headingnews-prev">
                                                            <i class="fa-solid fa-chevron-left text-[10px]"></i>
                                                        </button>
                                                        <button
                                                            class="w-10 h-10 rounded-lg border border-slate-100 flex items-center justify-center text-slate-400 hover:bg-white hover:text-emerald-600 hover:border-emerald-200 hover:shadow-md transition-all headingnews-next">
                                                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="lg:hidden py-2">
                        {{-- Tambahkan relative pada container utama --}}
                        <div class="relative">
                            <div class="swiper mobileHeroSwiper !px-5 overflow-visible">
                                <div class="swiper-wrapper">
                                    @foreach ($beritasPilihan as $berita)
                                        <div class="swiper-slide !w-[85%]">
                                            <article
                                                class="relative h-[48vh] w-full overflow-hidden rounded-[2.5rem] bg-slate-900 shadow-lg">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                                    loading="eager">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent">
                                                </div>

                                                <div class="absolute inset-0 flex flex-col justify-end p-6 pb-10 z-10">
                                                    <div class="flex items-center gap-2 mb-3">
                                                        <img src="https://ui-avatars.com/api/?name=Admin&background=10b981&color=fff"
                                                            class="w-8 h-8 rounded-full border border-emerald-500 shadow-sm">
                                                        <div class="flex flex-col text-white">
                                                            <span class="font-bold text-[11px] leading-none">Admin
                                                                Kemenag</span>
                                                            <span
                                                                class="opacity-70 text-[9px]">{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <h2
                                                        class="text-[1.4rem] font-black text-white leading-tight tracking-tight">
                                                        <a href="{{ route('berita.detail', $berita->slug) }}"
                                                            class="line-clamp-3">{{ $berita->judul }}</a>
                                                    </h2>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Pagination diletakkan di luar Swiper container tapi di dalam 'relative' --}}
                            <div class="mobile-hero-pagination flex justify-center items-center gap-1 mt-3"></div>
                        </div>
                    </div>

                </div>

                <aside class="lg:col-span-1 mt-8 lg:mt-0 px-4 lg:px-0">
                    <div class="sticky top-24">
                        <div class="relative mb-8">
                            <h3 class="text-xl font-black text-gray-900 tracking-tight uppercase">
                                Trending <span class="text-emerald-600">Now</span>
                            </h3>
                            <div class="absolute -bottom-2 left-0 w-12 h-1 bg-emerald-600 rounded-full"></div>
                            <div class="absolute -bottom-2 left-0 w-full h-[1px] bg-gray-100"></div>
                        </div>

                        <div class="space-y-8">
                            @foreach ($beritasPilihan as $post)
                                <article class="group relative flex items-start gap-4">
                                    <div class="flex-shrink-0 relative">
                                        <span
                                            class="text-4xl font-black text-transparent stroke-emerald-600 group-hover:opacity-100 transition-opacity duration-500"
                                            style="-webkit-text-stroke: 1px #059669;">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>

                                    <div class="flex-1 border-b border-gray-50 group-last:border-0">
                                        <div class="flex items-center gap-2 mb-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest">
                                                {{ $post->kategori->kategori }}
                                            </span>
                                        </div>

                                        <h4
                                            class="text-[15px] leading-relaxed font-bold text-gray-800 group-hover:text-emerald-600 transition-all duration-300">
                                            <a href="{{ route('berita.detail', $post->slug) }}"
                                                class="hover:underline decoration-emerald-200 underline-offset-4">
                                                {{ $post->judul }}
                                            </a>
                                        </h4>

                                        <div class="flex items-center gap-4 mt-3 text-[11px] text-gray-400 font-medium">
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                {{ number_format(rand(1000, 10000)) }}
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="w-full py-4 sm:py-6 bg-[#f0f9f4]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative w-full group">

                <div class="overflow-hidden sm:rounded-xl shadow-md border-b sm:border border-gray-100 bg-white">

                    <div class="swiper mainBannerSwiper w-full h-auto">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-full">
                                <img src="{{ asset('assets/img/bannerH1.png') }}" alt="Banner 1"
                                    class="w-full h-auto object-contain block">
                            </div>
                            <div class="swiper-slide w-full">
                                <img src="{{ asset('assets/img/bannerH2.png') }}" alt="Banner 2"
                                    class="w-full h-auto object-contain block">
                            </div>
                        </div>

                        <div class="swiper-pagination main-banner-pagination !bottom-2"></div>
                    </div>
                </div>

                <button
                    class="hidden sm:flex main-banner-prev absolute -left-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full
               bg-white/90 shadow-lg items-center justify-center transition-all duration-300
               hover:bg-white border border-gray-100 group">
                    <i class="fas fa-chevron-left text-gray-500 group-hover:text-emerald-600"></i>
                </button>

                <button
                    class="hidden sm:flex main-banner-next absolute -right-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full
               bg-white/90 shadow-lg items-center justify-center transition-all duration-300
               hover:bg-white border border-gray-100 group">
                    <i class="fas fa-chevron-right text-gray-500 group-hover:text-emerald-600"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 md:py-16 px-4 sm:px-6">
        <div class="container mx-auto max-w-7xl">

            <div class="mb-10">
                <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                    <div class="flex flex-col">
                        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                            <span class="flex items-center gap-2">
                                <span class="text-[#1a202c]">BERITA</span>
                                <span class="text-[#059669]">TERKINI</span>
                            </span>
                            <div class="h-1.5 w-14 bg-[#059669] mt-2 rounded-full"></div>
                        </h2>
                    </div>

                    <a href="#"
                        class="group text-sm font-bold text-[#059669] flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm border border-emerald-100 hover:bg-[#059669] hover:text-white transition-all duration-300">
                        Lihat Semua
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-12">

                <div class="lg:w-2/3">

                    @if ($beritaPopuler)
                        <div class="mb-12 pb-10 border-b border-gray-100">
                            <a href="{{ route('berita.detail', $beritaPopuler->slug) }}" class="group block">

                                <div class="mb-4 flex items-center gap-3">
                                    <span
                                        class="bg-emerald-600 text-white text-[10px] uppercase tracking-widest font-bold px-3 py-1 rounded-md">
                                        Berita Utama
                                    </span>
                                    <span
                                        class="text-xs font-bold text-emerald-600 uppercase">{{ $beritaPopuler->kategori->kategori }}</span>
                                </div>

                                <div class="mb-6 overflow-hidden rounded-2xl shadow-xl">
                                    <img src="{{ asset('storage/' . $beritaPopuler->gambar) }}"
                                        alt="{{ $beritaPopuler->judul }}"
                                        class="w-full h-64 md:h-[400px] object-cover group-hover:scale-105 transition-transform duration-700">
                                </div>

                                <h1
                                    class="text-2xl md:text-4xl font-black text-gray-900 mb-4 group-hover:text-emerald-600 transition-colors leading-tight">
                                    {{ $beritaPopuler->judul }}
                                </h1>

                                <p class="text-gray-600 text-sm md:text-lg mb-6 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($beritaPopuler->isi), 180) }}
                                </p>

                                <div
                                    class="flex flex-wrap items-center gap-6 text-xs md:text-sm text-gray-400 font-medium">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-user-circle text-emerald-500 text-base"></i>
                                        <span>{{ $beritaPopuler->user->name }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-calendar-alt text-emerald-500"></i>
                                        <span>{{ $beritaPopuler->created_at->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-clock text-emerald-500"></i>
                                        <span>{{ $beritaPopuler->created_at->format('H:i') }} WIB</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-10">
                        @foreach ($beritasPopuler as $index => $berita)
                            @if ($index > 0 && $index < 5)
                                <div class="group">
                                    <a href="{{ route('berita.detail', $berita->slug) }}" class="flex gap-4">
                                        <div
                                            class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-24 overflow-hidden rounded-xl shadow-sm border border-gray-100">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                alt="{{ $berita->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>

                                        <div class="flex flex-col justify-between py-1">
                                            <div>
                                                <span
                                                    class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">
                                                    {{ $berita->kategori->kategori }}
                                                </span>
                                                <h3
                                                    class="text-sm sm:text-base font-bold text-gray-900 group-hover:text-emerald-600 transition-colors line-clamp-2 leading-snug mt-1">
                                                    {{ $berita->judul }}
                                                </h3>
                                            </div>
                                            <span class="text-[11px] text-gray-400 font-medium italic">
                                                {{ $berita->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="lg:w-1/3 mt-12 lg:mt-0">
                    <div class="sticky top-24 space-y-10">

                        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                            <h3 class="font-black text-lg text-gray-900 mb-6 flex items-center gap-2">
                                <span class="w-2 h-7 bg-emerald-600 rounded-full"></span>
                                KATEGORI
                            </h3>
                            <div class="grid grid-cols-1 gap-2">
                                @foreach ($kategories as $kategori)
                                    <a href="#"
                                        class="flex justify-between items-center px-4 py-2.5 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 rounded-xl transition-all group">
                                        <span
                                            class="font-bold text-sm group-hover:translate-x-1 transition-transform">{{ $kategori->kategori }}</span>
                                        <span
                                            class="text-[10px] bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-lg font-black">
                                            {{ $kategori->beritas_count }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                            <h3 class="font-black text-lg text-gray-900 mb-6 flex items-center gap-2">
                                <span class="w-2 h-7 bg-emerald-600 rounded-full"></span>
                                BERITA POPULER
                            </h3>
                            <div class="space-y-6">
                                @foreach ($beritasPopuler->take(5) as $index => $berita)
                                    <div class="flex items-start gap-4 group">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center text-sm font-black group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-sm">
                                            {{ $index + 1 }}
                                        </div>
                                        <div class="border-b border-gray-50 pb-4 w-full group-last:border-0">
                                            <a href="{{ route('berita.detail', $berita->slug) }}" class="block">
                                                <h4
                                                    class="font-bold text-sm text-gray-800 hover:text-emerald-600 transition-colors line-clamp-2 leading-relaxed">
                                                    {{ $berita->judul }}
                                                </h4>
                                            </a>
                                            <div
                                                class="flex items-center gap-3 mt-2 text-[11px] text-gray-400 font-medium">
                                                <span class="flex items-center gap-1"><i class="far fa-calendar-alt"></i>
                                                    {{ $berita->created_at->format('d M') }}</span>
                                                <span>•</span>
                                                <span class="flex items-center gap-1"><i class="far fa-eye"></i>
                                                    {{ $berita->dibaca ?? '0' }}x dibaca</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-gradient-to-r from-emerald-50 to-white">
        <div class="mb-8 flex items-center justify-between border-b border-gray-100 pb-4">
            <div class="flex flex-col">
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                    <span class="flex items-center gap-2">
                        <span class="text-[#1a202c]">VIDEO</span>
                        <span class="text-[#059669]">KEGIATAN</span>
                    </span>
                    <div class="h-1.5 w-14 bg-[#059669] mt-2 rounded-full"></div>
                </h2>
            </div>
            <a href="#"
                class="group text-sm font-bold text-[#059669] flex items-center gap-2 transition-all hover:text-emerald-700">
                Lainnya
                <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="relative">
            <div class="absolute inset-y-0 -left-4 md:-left-6 flex items-center z-20 hidden md:flex">
                <button
                    class="video-prev bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-xl border border-gray-100 transition-all duration-300 hover:bg-emerald-600 text-emerald-600 hover:text-white group">
                    <i class="fas fa-chevron-left text-lg"></i>
                </button>
            </div>

            <div class="swiper video-slider">
                <div class="swiper-wrapper">
                    @foreach ($playLists as $playList)
                        <div class="swiper-slide py-4">
                            <div class="relative aspect-video w-full cursor-pointer video-thumbnail overflow-hidden
                                    rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 group"
                                data-video-id="{{ $playList->youtube_id }}" onclick="loadYouTubeIframe(this)">

                                <img src="https://img.youtube.com/vi/{{ $playList->youtube_id }}/maxresdefault.jpg"
                                    alt="{{ $playList->title }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/50 transition-all duration-300">
                                    <div
                                        class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-2xl transform scale-90 group-hover:scale-110 transition-all duration-300">
                                        <i class="fa-solid fa-play text-emerald-600 text-xl pl-1"></i>
                                    </div>
                                </div>

                                <div
                                    class="absolute bottom-3 right-3 bg-black/70 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-md">
                                    5:30
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="video-pagination mt-8 flex justify-center"></div>
            </div>

            <div class="absolute inset-y-0 -right-4 md:-right-6 flex items-center z-20 hidden md:flex">
                <button
                    class="video-next bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-xl border border-gray-100 transition-all duration-300 hover:bg-emerald-600 text-emerald-600 hover:text-white group">
                    <i class="fas fa-chevron-right text-lg"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-16">
            <div class="lg:w-2/3 flex flex-col">
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center shadow-sm border border-emerald-100">
                            <i class="fa-solid fa-bullhorn text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl md:text-3xl font-black text-[#1a202c] tracking-tight">
                                PENGUMUMAN <span class="text-emerald-600 uppercase">Terbaru</span>
                            </h2>
                            <div class="h-1.5 w-12 bg-emerald-600 mt-1 rounded-full"></div>
                        </div>
                    </div>
                    <a href="/pengumuman"
                        class="group text-sm font-bold text-emerald-600 flex items-center gap-2 hover:underline">
                        Lihat Semua
                        <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="space-y-6 flex-1">
                    @if ($pengumumans->count() > 0)
                        @foreach ($pengumumans as $pengumuman)
                            <article
                                class="group bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 p-5 md:p-6 border-l-4 border-l-emerald-600">
                                <div class="flex flex-col md:flex-row md:items-start gap-6">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="bg-emerald-50 text-emerald-700 rounded-xl p-3 text-center w-20 border border-emerald-100 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-500">
                                            <div class="text-2xl font-black leading-none">
                                                {{ $pengumuman->tanggal->format('d') }}
                                            </div>
                                            <div class="text-[10px] uppercase font-bold mt-1 tracking-widest">
                                                {{ $pengumuman->tanggal->translatedFormat('M') }}
                                            </div>
                                            <div class="text-[10px] mt-0.5 opacity-80 font-medium">
                                                {{ $pengumuman->tanggal->format('Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-lg md:text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition-colors line-clamp-2 leading-snug">
                                            <a href="#">{{ $pengumuman->judul }}</a>
                                        </h3>
                                        <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2">
                                            {{ Str::limit(strip_tags($pengumuman->isi), 150) }}
                                        </p>

                                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                                            <div class="flex items-center text-xs font-semibold text-gray-400">
                                                <i class="fa-solid fa-circle-user mr-2 text-emerald-500"></i>
                                                <span class="uppercase tracking-wider">{{ $pengumuman->penulis }}</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-bold text-emerald-600 flex items-center group/btn">
                                                Baca Selengkapnya
                                                <i
                                                    class="fa-solid fa-chevron-right ml-2 text-[10px] group-hover/btn:translate-x-1 transition-transform"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div
                            class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-12 text-center flex-1 flex flex-col justify-center items-center">
                            <div
                                class="w-20 h-20 bg-emerald-50 text-emerald-400 rounded-full flex items-center justify-center mb-6">
                                <i class="fa-solid fa-bullhorn text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak ada Pengumuman</h3>
                            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-8 leading-relaxed">Belum ada pengumuman
                                resmi yang diterbitkan saat ini. Silakan periksa kembali nanti.</p>
                            <a href="/pengumuman"
                                class="inline-flex items-center gap-2 text-emerald-600 font-bold hover:bg-emerald-600 hover:text-white px-6 py-2 rounded-full border border-emerald-600 transition-all">
                                <i class="fa-solid fa-rotate"></i> Periksa Arsip
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:w-1/3 mt-12 lg:mt-0 flex flex-col">
                <div class="mb-8 pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center shadow-sm border border-emerald-100">
                            <i class="fa-solid fa-file-invoice text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-black text-[#1a202c] tracking-tight uppercase">Dokumen</h2>
                    </div>
                </div>

                <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex-1 flex flex-col">
                    <div class="p-6 space-y-5 flex-1">
                        @forelse ($dokumens as $dokumen)
                            @php
                                $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                                $bg_color = 'bg-gray-50';
                                $text_color = 'text-gray-600';
                                $icon = 'fa-file';

                                if ($extension == 'pdf') {
                                    $bg_color = 'bg-red-50';
                                    $text_color = 'text-red-600';
                                    $icon = 'fa-file-pdf';
                                } elseif (in_array($extension, ['doc', 'docx'])) {
                                    $bg_color = 'bg-blue-50';
                                    $text_color = 'text-blue-600';
                                    $icon = 'fa-file-word';
                                }
                            @endphp

                            <div
                                class="group flex items-center gap-4 p-3 rounded-xl hover:bg-emerald-50 transition-all border border-transparent hover:border-emerald-100">
                                <div
                                    class="w-12 h-12 {{ $bg_color }} {{ $text_color }} rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-white transition-colors border border-transparent group-hover:border-emerald-100">
                                    <i class="fa-solid {{ $icon }} text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank" class="block">
                                        <h4
                                            class="text-sm font-bold text-gray-900 truncate group-hover:text-emerald-700 transition-colors mb-1">
                                            {{ $dokumen->judul }}
                                        </h4>
                                    </a>
                                    <div
                                        class="flex items-center gap-2 text-[11px] text-gray-400 font-semibold uppercase tracking-tighter">
                                        <span class="text-emerald-600">{{ $dokumen->kategori }}</span>
                                        <span>•</span>
                                        <span>{{ \Carbon\Carbon::parse($dokumen->tanggal)->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $dokumen->file) }}" download
                                    class="text-gray-300 hover:text-emerald-600 transition-colors">
                                    <i class="fa-solid fa-circle-down text-lg"></i>
                                </a>
                            </div>
                        @empty
                            <div class="text-center py-10">
                                <i class="fa-solid fa-file-circle-xmark text-4xl text-gray-200 mb-4 block"></i>
                                <p class="text-gray-400 text-sm">Belum ada dokumen.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="p-6 bg-gray-50/50 mt-auto">
                        <a href="/dokumen"
                            class="flex items-center justify-center gap-2 w-full py-3 bg-emerald-100 text-emerald-800 font-bold rounded-xl hover:bg-emerald-600 hover:text-white transition-all shadow-sm">
                            <i class="fa-solid fa-folder-open text-xs"></i>
                            LIHAT SEMUA DOKUMEN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">

            @foreach ($beritasKategoriPopuler as $kategori)
                <div class="category-column flex flex-col h-full">

                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <div class="flex flex-col">
                            <h3 class="text-lg font-black text-[#1a202c] tracking-wider uppercase">
                                {{ $kategori->kategori }}
                            </h3>
                            <div class="h-1 w-10 bg-emerald-600 mt-1.5 rounded-full"></div>
                        </div>
                        <a href="#"
                            class="group text-[11px] font-bold text-emerald-600 flex items-center gap-1 uppercase tracking-widest hover:text-emerald-700 transition-colors">
                            Lainnya
                            <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="flex-1 space-y-8">
                        @if ($kategori->beritas->count() > 0)
                            @php $primaryPost = $kategori->beritas->first(); @endphp

                            <article class="group">
                                <a href="{{ route('berita.detail', $primaryPost->slug) }}" class="block">
                                    <div
                                        class="relative aspect-video overflow-hidden rounded-2xl shadow-md border border-gray-100 mb-4">
                                        <img src="{{ asset('storage/' . $primaryPost->gambar) }}"
                                            alt="{{ $primaryPost->judul }}"
                                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                        </div>
                                    </div>

                                    <h4
                                        class="text-lg md:text-xl font-extrabold text-gray-900 leading-tight group-hover:text-emerald-600 transition-colors line-clamp-3">
                                        {{ $primaryPost->judul }}
                                    </h4>

                                    <div
                                        class="mt-3 flex items-center gap-3 text-[11px] text-gray-400 font-bold uppercase tracking-tighter">
                                        <span class="flex items-center gap-1.5">
                                            <i class="fa-regular fa-calendar-alt text-emerald-500 text-xs"></i>
                                            {{ \Carbon\Carbon::parse($primaryPost->created_at)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </div>
                                </a>
                            </article>
                        @endif

                        <div class="space-y-5">
                            @foreach ($kategori->beritas->slice(1, 3) as $secondaryPost)
                                <article class="group flex gap-4 items-center py-2">
                                    <a href="{{ route('berita.detail', $secondaryPost->slug) }}"
                                        class="flex-shrink-0 w-24 h-20 overflow-hidden rounded-xl shadow-sm border border-gray-50">
                                        <img src="{{ asset('storage/' . $secondaryPost->gambar) }}"
                                            alt="{{ $secondaryPost->judul }}"
                                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    </a>

                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-sm font-bold text-gray-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                            <a href="{{ route('berita.detail', $secondaryPost->slug) }}">
                                                {{ $secondaryPost->judul }}
                                            </a>
                                        </h4>
                                        <div
                                            class="text-[10px] text-gray-400 font-semibold mt-1.5 flex items-center gap-1 uppercase">
                                            <i class="fa-regular fa-clock text-emerald-500"></i>
                                            {{ \Carbon\Carbon::parse($secondaryPost->created_at)->translatedFormat('d M Y') }}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8 border-b border-gray-50 md:hidden"></div>
                </div>
            @endforeach

        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white overflow-hidden">

        <div class="mb-10 flex items-center justify-between border-b border-gray-100 pb-4">
            <div class="flex flex-col">
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">
                    <span class="flex items-center gap-2">
                        <span class="text-[#1a202c]">GALERI</span>
                        <span class="text-[#059669]">DESAIN</span>
                    </span>
                    <div class="h-1.5 w-14 bg-[#059669] mt-2 rounded-full"></div>
                </h2>
            </div>
            <a href="/galeri" class="group text-sm font-bold text-[#059669] flex items-center gap-2 hover:underline">
                Lihat Semua
                <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <div class="relative group/nav px-2">
            <button
                class="gallery-prev absolute -left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white shadow-xl border border-gray-100 flex items-center justify-center text-emerald-600 transition-all duration-300 hover:bg-emerald-600 hover:text-white opacity-0 group-hover/nav:opacity-100 hidden md:flex">
                <i class="fa-solid fa-chevron-left text-lg"></i>
            </button>

            <div class="swiper gallerySwiper">
                <div class="swiper-wrapper">
                    @foreach ($galeries as $design)
                        <div class="swiper-slide py-4">
                            <div
                                class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100">

                                <div class="relative aspect-[3/4] overflow-hidden cursor-pointer">
                                    <img src="{{ asset('storage/' . $design->gambar) }}" alt="{{ $design->caption }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        loading="lazy">

                                    <div
                                        class="absolute inset-0 bg-emerald-900/10 group-hover:bg-emerald-900/40 transition-all duration-500 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <div
                                            class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 text-white">
                                            <i class="fa-solid fa-expand"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 bg-white text-center">
                                    <h3
                                        class="text-sm font-bold text-gray-800 line-clamp-2 min-h-[2.5rem] group-hover:text-emerald-600 transition-colors">
                                        {{ $design->caption }}
                                    </h3>
                                    <div class="mt-2 text-[10px] font-bold text-emerald-600/50 uppercase tracking-widest">
                                        Media Informasi
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="gallery-pagination mt-10 flex justify-center"></div>
            </div>

            <button
                class="gallery-next absolute -right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white shadow-xl border border-gray-100 flex items-center justify-center text-emerald-600 transition-all duration-300 hover:bg-emerald-600 hover:text-white opacity-0 group-hover/nav:opacity-100 hidden md:flex">
                <i class="fa-solid fa-chevron-right text-lg"></i>
            </button>
        </div>
    </section>

    <section class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-gradient-to-r from-emerald-50 to-white">

        <div class="relative">

            <div class="swiper serviceSwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/moc.jpg') }}" alt="Mooc Pintar"
                                    class="w-14 h-14 object-contain rounded-full">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">Mooc Pintar</h3>
                        </a>
                    </div>

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/quran-digital.png') }}" alt="Quran Digital"
                                    class="w-14 h-14 object-contain">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">Quran Digital</h3>
                        </a>
                    </div>

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/emis.png') }}" alt="EMIS"
                                    class="w-14 h-14 object-contain">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">EMIS</h3>
                        </a>
                    </div>

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/sindumas.png') }}" alt="Simdumas"
                                    class="w-14 h-14 object-contain">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">Simdumas</h3>
                        </a>
                    </div>

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/lapor.jpeg') }}" alt="Lapor"
                                    class="w-14 h-14 object-contain rounded-full">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">Lapor</h3>
                        </a>
                    </div>

                    <div class="swiper-slide flex-shrink-0">
                        <a href="#" class="flex flex-col items-center text-center w-full group">
                            <div
                                class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-2 shadow-sm group-hover:shadow-md transition-shadow">
                                <img src="{{ asset('assets/img/layanan/srikandi.png') }}" alt="Lapor"
                                    class="w-14 h-14 object-contain rounded-full">
                            </div>
                            <h3 class="text-xs font-medium text-gray-800 line-clamp-2">Srikandi</h3>
                        </a>
                    </div>

                </div>

                <div class="service-pagination mt-4"></div>
            </div>

            <button
                class="service-prev absolute left-0 top-1/2 transform -translate-y-1/2 z-10 w-8 h-8 rounded-full
                   bg-white border border-gray-200 shadow-md flex items-center justify-center
                   opacity-70 hover:opacity-100 transition duration-300 hidden sm:flex">
                <i class="fa-solid fa-chevron-left text-gray-700 text-sm"></i>
            </button>

            <button
                class="service-next absolute right-0 top-1/2 transform -translate-y-1/2 z-10 w-8 h-8 rounded-full
                   bg-white border border-gray-200 shadow-md flex items-center justify-center
                   opacity-70 hover:opacity-100 transition duration-300 hidden sm:flex">
                <i class="fa-solid fa-chevron-right text-gray-700 text-sm"></i>
            </button>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const videoSlider = new Swiper('.video-slider', {
                loop: true,
                speed: 600,

                // PENGATURAN RESPONSIVITAS
                slidesPerView: 1.2, // Default: 1.2 slide di ponsel
                spaceBetween: 15,
                breakpoints: {
                    // Ketika lebar layar >= 640px (sm)
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // Ketika lebar layar >= 1024px (lg)
                    1024: {
                        slidesPerView: 3.4, // 3 slide di desktop
                        spaceBetween: 30,
                    }
                },

                navigation: {
                    nextEl: '.video-next',
                    prevEl: '.video-prev',
                },
            });

            const serviceSwiper = new Swiper('.serviceSwiper', {
                // Jangan menggunakan loop: true jika jumlah slide terlalu sedikit
                // loop: true,
                speed: 400,

                // PENGATURAN RESPONSIVITAS (Mobile First)
                slidesPerView: 4,
                spaceBetween: 10,

                breakpoints: {
                    // Ponsel besar (sm)
                    640: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                    // Desktop (lg)
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    }
                    // Anda bisa menyesuaikan angka-angka ini
                },

                navigation: {
                    nextEl: '.service-next',
                    prevEl: '.service-prev',
                },
            });

            const bannerSwiper = new Swiper('.mainBannerSwiper', {
                loop: true,
                speed: 800, // Transisi halus
                effect: 'slide',

                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },

                // Navigasi (Panah)
                navigation: {
                    nextEl: '.main-banner-next',
                    prevEl: '.main-banner-prev',
                },

                // Pagination (Dots)
                pagination: {
                    el: '.main-banner-pagination',
                    clickable: true,
                },
            });

            const headingNewsDesktop = new Swiper('.headingnews-desktop', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 1000, // Kecepatan diperlambat sedikit (dari 800) agar fade lebih terasa

                // ✨ PERUBAHAN UTAMA: Gunakan efek 'fade'
                effect: 'fade',
                fadeEffect: {
                    crossFade: true, // Memastikan fade terjadi secara silang (lebih halus)
                },

                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.headingnews-next',
                    prevEl: '.headingnews-prev',
                },
            });
            const mobileHeroSwiper = new Swiper('.mobileHeroSwiper', {
                loop: true,
                speed: 800, // Transisi halus
                effect: 'slide',

                autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                slidesPerView: 'auto',
                spaceBetween: 16,
                grabCursor: true,
                pagination: {
                    el: '.mobile-hero-pagination',
                    clickable: true,
                    // Matikan dynamicBullets jika jumlah slide sedikit agar posisi tetap di tengah
                    dynamicBullets: false,
                },
            });

            const gallerySwiper = new Swiper('.gallerySwiper', {
                loop: true,
                speed: 600,

                // PENGATURAN RESPONSIVITAS (Mobile First)
                slidesPerView: 2.2, // Default: 2.2 slide di ponsel kecil
                spaceBetween: 16, // 16px

                breakpoints: {
                    // Ketika lebar layar >= 640px (sm)
                    640: {
                        slidesPerView: 3, // 3 slide di ponsel besar/tablet
                        spaceBetween: 24, // 24px
                    },
                    // Ketika lebar layar >= 1024px (lg)
                    1024: {
                        slidesPerView: 4, // 4 slide di desktop
                        spaceBetween: 30, // 30px
                    }
                },

                navigation: {
                    nextEl: '.gallery-next',
                    prevEl: '.gallery-prev',
                },
            });

            const sholatCarausel = new Swiper('.sholat-carousel', {
                // Menghapus 'loop: true' jika Anda tidak ingin looping.
                // Menghapus 'slidesPerView: 1' karena ini memaksa satu slide penuh,
                // yang bertentangan dengan desain card-card kecil yang bisa di-scroll.

                // Konfigurasi yang Benar untuk Scroll Horizontal Card:
                slidesPerView: 'auto', // PENTING: Memastikan slide menyesuaikan lebar card (w-24)
                spaceBetween: 12, // Sesuai dengan space-x-3 (12px)
                freeMode: true, // PENTING: Memungkinkan scroll/gulir bebas seperti daftar horizontal

                // Autoplay dinonaktifkan agar tidak mengganggu FreeMode (atau atur ulang delay)
                // Jika Anda benar-benar ingin autoplay:
                // autoplay: {
                //     delay: 4000,
                //     disableOnInteraction: false,
                // },

                // Pagination (dibiarkan kosong jika tidak ada pagination di markup)
                // pagination: {
                //     el: '.sholat-pagination',
                //     clickable: true,
                // },
            });
        });

        function navigateLightbox(direction) {
            currentLightboxIndex += direction;

            if (currentLightboxIndex < 0) {
                currentLightboxIndex = galleryItems.length - 1;
            } else if (currentLightboxIndex >= galleryItems.length) {
                currentLightboxIndex = 0;
            }

            openLightbox(currentLightboxIndex);
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.style.display === 'flex') {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    navigateLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateLightbox(1);
                }
            }
        });

        // Load YouTube Iframe on Thumbnail Click
        function loadYouTubeIframe(element) {
            const videoId = element.getAttribute("data-video-id");

            // bikin iframe YouTube
            const iframe = document.createElement("iframe");
            iframe.setAttribute("src", "https://www.youtube.com/embed/" + videoId + "?autoplay=1");
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("allowfullscreen", "1");
            iframe.setAttribute("allow",
                "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture");
            iframe.classList.add("w-full", "h-full");

            // replace thumbnail dengan iframe
            element.innerHTML = "";
            element.appendChild(iframe);
        }
    </script>
@endpush
