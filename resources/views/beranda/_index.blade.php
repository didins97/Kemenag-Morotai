@extends('app')

@section('css')
    <style>
        :root {
            --green-gradient: linear-gradient(135deg, #059669 0%, #10b981 100%);
            --green-primary: #059669;
            --green-primary-light: #10b981;
        }

        /* --- General Layout --- */
        @media (min-width: 768px) {
            .container {
                margin: 0 auto;
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
        .gallerySwiper {
            overflow: visible !important;
        }

        .gallerySwiper .swiper-slide {
            transition: all 0.3s ease;
        }

        /* Custom Pagination */
        .gallery-pagination .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background: #cbd5e1;
            opacity: 1;
            transition: all 0.3s ease;
            border-radius: 9999px;
        }

        .gallery-pagination .swiper-pagination-bullet-active {
            width: 24px;
            background: linear-gradient(135deg, #059669, #10b981);
            border-radius: 4px;
        }

        /* --- Component: Reel Section --- */
        .reelsSwiper {
            overflow: visible !important;
        }

        /* Custom scrollbar for the section */
    </style>
@endsection


@section('content')

    <section class="reels-area overflow-hidden my-4">
        <div class="relative group/reels-nav">
            <div class="swiper reelsSwiper overflow-visible">
                <div class="swiper-wrapper">
                    @forelse ($instagramReels as $reel)
                        <div class="swiper-slide !w-[130px] md:!w-[160px]">
                            <article class="relative cursor-pointer group">
                                <a href="{{ $reel['permalink'] }}" target="_blank"
                                    class="relative block aspect-[9/16] overflow-hidden bg-gray-100 shadow-sm rounded-sm">
                                    <img src="{{ $reel['thumbnail_url'] ?? $reel['media_url'] }}"
                                        class="absolute inset-0 w-full h-full object-cover">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2">
                                        <p class="text-white text-[10px] leading-tight line-clamp-2">
                                            {{ $reel['caption'] ?? 'Instagram Reels' }}</p>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @empty
                        <div class="w-full py-6 text-center text-gray-400 italic text-sm">Belum ada Reels.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden my-4">
        <div class="hidden lg:block">
            <div class="swiper headingnews-desktop">
                <div class="swiper-wrapper">
                    @foreach ($beritaPilihan as $berita)
                        <div class="swiper-slide">
                            <article
                                class="grid grid-cols-2 gap-6 items-center bg-white overflow-hidden shadow-sm border border-gray-100">
                                <div class="relative h-[380px] w-full overflow-hidden">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-105">
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="px-3 py-1 bg-white/90 rounded text-[10px] font-bold uppercase text-emerald-600">
                                            {{ $berita->kategori->kategori ?? 'Featured' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-col justify-center pr-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="text-xs font-semibold text-gray-700">Admin</span>
                                        <div class="w-1 h-1 rounded-full bg-gray-300"></div>
                                        <span
                                            class="text-[11px] text-gray-400">{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}</span>
                                    </div>

                                    <h2 class="text-2xl font-bold leading-tight mb-3 tracking-tight">
                                        <a href="{{ route('berita.detail', $berita->slug) }}"
                                            class="hover:text-emerald-600 transition-colors">
                                            {{ $berita->judul }}
                                        </a>
                                    </h2>

                                    <p class="text-gray-500 leading-relaxed line-clamp-2 mb-4 text-sm">
                                        {{ Str::limit(strip_tags($berita->konten), 140) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('berita.detail', $berita->slug) }}"
                                            class="inline-flex items-center gap-2 text-emerald-600 text-sm font-bold group">
                                            <span>Baca Selengkapnya</span>
                                        </a>
                                        <div class="flex gap-2">
                                            <button
                                                class="headingnews-prev w-8 h-8 rounded-full border flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M15 19l-7-7 7-7" stroke-width="2" />
                                                </svg>
                                            </button>
                                            <button
                                                class="headingnews-next w-8 h-8 rounded-full border flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M9 5l7 7-7 7" stroke-width="2" />
                                                </svg>
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

        <div class="lg:hidden px-0">
            <div class="swiper mobileHeroSwiper">
                <div class="swiper-wrapper">
                    @foreach ($beritaPilihan as $berita)
                        <div class="swiper-slide px-1">
                            <article class="bg-white border border-gray-100 overflow-hidden shadow-sm">
                                <div class="relative h-48 w-full">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <div class="p-3">
                                    <h3 class="text-sm font-bold text-gray-900 mb-1 line-clamp-2">{{ $berita->judul }}</h3>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden my-4">
        <div class="px-4 md:px-6">

            <div class="mb-8">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center shadow-sm">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-600">LATEST
                                NEWS</span>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">
                            Berita <span class="text-emerald-600">Terkini</span>
                        </h2>
                    </div>

                    <a href="{{ route('berita.index') }}"
                        class="group inline-flex items-center gap-2 text-sm font-bold text-emerald-600 hover:text-emerald-700 transition-colors">
                        <span>Lihat Semua Berita</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">
                <div class="lg:w-2/3">
                    @if ($beritaPopuler)
                        <div class="mb-10 group">
                            <a href="{{ route('berita.detail', $beritaPopuler->slug) }}" class="block">
                                <article class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                                    <div
                                        class="md:col-span-7 relative h-[320px] md:h-[400px] overflow-hidden rounded-sm bg-gray-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $beritaPopuler->gambar) }}"
                                            alt="{{ $beritaPopuler->judul }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute top-4 left-4">
                                            <span
                                                class="px-3 py-1 bg-emerald-600 text-white text-[9px] font-bold rounded-sm uppercase">
                                                {{ $beritaPopuler->kategori->kategori ?? 'Featured' }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="md:col-span-5 pt-2">
                                        <div class="flex items-center gap-2 mb-3 text-[11px] text-gray-400">
                                            <span class="font-bold text-emerald-600 uppercase">Admin</span>
                                            <span>•</span>
                                            <span>{{ $beritaPopuler->created_at->translatedFormat('d M Y') }}</span>
                                        </div>
                                        <h1
                                            class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-emerald-600 transition-colors leading-tight">
                                            {{ $beritaPopuler->judul }}
                                        </h1>
                                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-6">
                                            {{ Str::limit(strip_tags($beritaPopuler->konten), 160) }}
                                        </p>
                                        <span class="text-xs font-bold text-emerald-600 group-hover:underline">Baca
                                            Selengkapnya →</span>
                                    </div>
                                </article>
                            </a>
                        </div>
                    @endif

                    <div class="border-b border-gray-100 mb-10"></div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @foreach ($beritasPopuler as $index => $berita)
                            @if ($index > 0 && $index < 5)
                                <article class="group">
                                    <a href="{{ route('berita.detail', $berita->slug) }}" class="flex gap-4">
                                        <div
                                            class="relative w-24 h-24 flex-shrink-0 overflow-hidden rounded-sm bg-gray-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                alt="{{ $berita->judul }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-[9px] font-bold text-emerald-600 uppercase block mb-1">
                                                {{ $berita->kategori->kategori ?? 'Berita' }}
                                            </span>
                                            <h3
                                                class="font-bold text-gray-800 text-sm line-clamp-2 group-hover:text-emerald-600 transition-colors leading-snug">
                                                {{ $berita->judul }}
                                            </h3>
                                            <span class="text-[10px] text-gray-400 block mt-2">
                                                {{ $berita->created_at->translatedFormat('d M Y') }}
                                            </span>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="lg:w-1/3">
                    <div class="sticky top-24 space-y-8">
                        <div class="bg-gray-50 p-6 border-t-2 border-emerald-500">
                            <h3
                                class="font-bold text-gray-900 mb-4 flex items-center gap-2 uppercase text-xs tracking-widest">
                                <span class="w-2 h-2 bg-emerald-500"></span> Kategori
                            </h3>
                            <div class="space-y-1">
                                @foreach ($kategories as $kategori)
                                    <a href="#"
                                        class="flex items-center justify-between py-2 border-b border-gray-200/50 hover:text-emerald-600 transition-all group">
                                        <span
                                            class="text-xs font-medium text-gray-600 group-hover:translate-x-1 transition-transform">{{ $kategori->kategori }}</span>
                                        <span class="text-[10px] text-gray-400">({{ $kategori->beritas_count }})</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3
                                class="font-bold text-gray-900 mb-5 flex items-center gap-2 uppercase text-xs tracking-widest">
                                <span class="w-2 h-2 bg-emerald-500"></span> Terpopuler
                            </h3>
                            <div class="space-y-5">
                                @foreach ($beritasPopuler->take(5) as $index => $berita)
                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                        class="flex items-center gap-4 group">
                                        <span
                                            class="text-xl font-black text-gray-200 group-hover:text-emerald-500 transition-colors italic">0{{ $index + 1 }}</span>
                                        <h4
                                            class="text-xs font-bold text-gray-800 group-hover:text-emerald-600 transition-colors line-clamp-2 leading-relaxed">
                                            {{ $berita->judul }}
                                        </h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-12 bg-gradient-to-br from-emerald-50 via-white to-teal-50 rounded-3xl my-6">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Video Slider Container -->
            <div class="relative">

                <!-- Prev Button -->
                <div class="absolute -left-3 md:-left-5 top-1/2 -translate-y-1/2 z-20">
                    <button
                        class="video-prev w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 group">
                        <svg class="w-4 h-4 md:w-5 md:h-5 transition-transform group-hover:-translate-x-0.5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Swiper -->
                <div class="swiper video-slider overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($playLists as $playList)
                            <div class="swiper-slide py-2">
                                <div class="group relative cursor-pointer" onclick="loadYouTubeIframe(this)"
                                    data-video-id="{{ $playList->youtube_id }}">

                                    <!-- Video Card -->
                                    <div
                                        class="relative aspect-video w-full overflow-hidden rounded-2xl shadow-md transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-emerald-100/30 group-hover:-translate-y-1">

                                        <!-- Thumbnail -->
                                        <img src="https://img.youtube.com/vi/{{ $playList->youtube_id }}/maxresdefault.jpg"
                                            alt="{{ $playList->title }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                            onerror="this.src='https://img.youtube.com/vi/{{ $playList->youtube_id }}/hqdefault.jpg'">

                                        <!-- Gradient Overlay -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>

                                        <!-- Play Button -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div
                                                class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-white/95 backdrop-blur-sm flex items-center justify-center shadow-2xl transition-all duration-300 group-hover:scale-110 group-hover:bg-gradient-to-r group-hover:from-emerald-500 group-hover:to-emerald-400">
                                                <svg class="w-6 h-6 md:w-7 md:h-7 text-emerald-600 group-hover:text-white transition-colors pl-0.5"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Duration Badge -->
                                        <div
                                            class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-1 rounded-lg">
                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            @php
                                                $duration = rand(120, 600);
                                                $minutes = floor($duration / 60);
                                                $seconds = $duration % 60;
                                            @endphp
                                            {{ $minutes }}:{{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}
                                        </div>

                                        <!-- Category Badge -->
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="px-2.5 py-1 bg-gradient-to-r from-emerald-500 to-emerald-400 text-white text-[9px] font-bold rounded-lg shadow-md">
                                                {{ $playList->kategori ?? 'Kegiatan' }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <div class="mt-3 px-1">
                                        <h3
                                            class="text-sm font-bold text-gray-800 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                            {{ Str::limit($playList->title, 60) }}
                                        </h3>
                                        <div class="flex items-center gap-2 mt-1.5 text-[10px] text-gray-400">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ number_format(rand(100, 5000)) }}
                                            </span>
                                            <span>•</span>
                                            <span>{{ rand(1, 30) }} jam lalu</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Custom Pagination -->
                    <div class="video-pagination flex justify-center gap-2 mt-6"></div>
                </div>

                <!-- Next Button -->
                <div class="absolute -right-3 md:-right-5 top-1/2 -translate-y-1/2 z-20">
                    <button
                        class="video-next w-10 h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 group">
                        <svg class="w-4 h-4 md:w-5 md:h-5 transition-transform group-hover:translate-x-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>

            </div>
    </section>

    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-gray-50 rounded-2xl">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-10 lg:gap-12">

                <!-- Left Column - Pengumuman -->
                <div class="lg:w-2/3">

                    <!-- Modern Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center shadow-md">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">
                                    Pengumuman <span
                                        class="bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">Terbaru</span>
                                </h2>
                                <div class="w-12 h-1 bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full mt-1">
                                </div>
                            </div>
                        </div>
                        <a href="/pengumuman"
                            class="group inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-sm font-semibold text-gray-700 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:border-transparent hover:shadow-lg">
                            <span>Lihat Semua</span>
                            <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Pengumuman List -->
                    <div class="space-y-5">
                        @if ($pengumumans->count() > 0)
                            @foreach ($pengumumans as $pengumuman)
                                <article
                                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 transition-all duration-300 hover:shadow-xl hover:shadow-emerald-100/20 hover:-translate-y-0.5 overflow-hidden">
                                    <div class="p-5 md:p-6">
                                        <div class="flex flex-col md:flex-row md:items-start gap-5">

                                            <!-- Date Card -->
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="relative w-16 text-center bg-gradient-to-br from-emerald-50 to-white py-2 border border-emerald-100 transition-all duration-300 group-hover:bg-gradient-to-r group-hover:from-emerald-500 group-hover:to-emerald-400">
                                                    <div
                                                        class="text-2xl font-black text-emerald-600 group-hover:text-white transition-colors leading-none">
                                                        {{ $pengumuman->tanggal->format('d') }}
                                                    </div>
                                                    <div
                                                        class="text-[9px] font-bold text-emerald-500 uppercase tracking-wider mt-0.5 group-hover:text-white/90">
                                                        {{ $pengumuman->tanggal->translatedFormat('M') }}
                                                    </div>
                                                    <div
                                                        class="text-[8px] text-gray-400 group-hover:text-white/70 font-medium">
                                                        {{ $pengumuman->tanggal->format('Y') }}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Content -->
                                            <div class="flex-1 min-w-0">
                                                <h3
                                                    class="text-lg md:text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors line-clamp-2">
                                                    <a href="#">{{ $pengumuman->judul }}</a>
                                                </h3>
                                                <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2">
                                                    {{ Str::limit(strip_tags($pengumuman->isi), 140) }}
                                                </p>
                                                <div
                                                    class="flex items-center justify-between pt-3 border-t border-gray-100">
                                                    <div class="flex items-center gap-2 text-xs text-gray-400">
                                                        <div
                                                            class="w-5 h-5 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center">
                                                            <svg class="w-3 h-3 text-white" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <span
                                                            class="font-medium">{{ $pengumuman->penulis ?? 'Admin' }}</span>
                                                    </div>
                                                    <a href="#"
                                                        class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 transition-all hover:gap-2">
                                                        <span>Selengkapnya</span>
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <!-- Empty State -->
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                                <div
                                    class="w-20 h-20 mx-auto bg-gradient-to-r from-emerald-50 to-emerald-100 rounded-full flex items-center justify-center mb-5">
                                    <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Pengumuman</h3>
                                <p class="text-gray-400 text-sm max-w-sm mx-auto">Belum ada pengumuman resmi yang
                                    diterbitkan
                                    saat ini. Silakan periksa kembali nanti.</p>
                                <a href="/pengumuman"
                                    class="inline-flex items-center gap-2 mt-6 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-500 text-white text-sm font-semibold hover:shadow-lg transition-all">
                                    Lihat Arsip
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column - Dokumen -->
                <div class="lg:w-1/3">

                    <!-- Header -->
                    <div class="flex items-center gap-3 mb-8">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-gray-900 tracking-tight">
                                Dokumen <span
                                    class="bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">Resmi</span>
                            </h2>
                            <div class="w-12 h-1 bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full mt-1"></div>
                        </div>
                    </div>

                    <!-- Dokumen Card -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="divide-y divide-gray-100">
                            @forelse ($dokumens->take(5) as $dokumen)
                                @php
                                    $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                                    $icon = 'fa-file';
                                    $gradient = 'from-gray-50 to-gray-100';

                                    if ($extension == 'pdf') {
                                        $icon = 'fa-file-pdf';
                                        $gradient = 'from-red-50 to-red-100';
                                    } elseif (in_array($extension, ['doc', 'docx'])) {
                                        $icon = 'fa-file-word';
                                        $gradient = 'from-blue-50 to-blue-100';
                                    } elseif (in_array($extension, ['xls', 'xlsx'])) {
                                        $icon = 'fa-file-excel';
                                        $gradient = 'from-green-50 to-green-100';
                                    }
                                @endphp

                                <div class="group p-4 transition-all duration-300 hover:bg-emerald-50/50">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br {{ $gradient }} flex items-center justify-center transition-all duration-300 group-hover:scale-110">
                                                <i class="fa-solid {{ $icon }} text-xl text-emerald-600"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank"
                                                class="block">
                                                <h4
                                                    class="text-sm font-bold text-gray-800 group-hover:text-emerald-600 transition-colors truncate">
                                                    {{ $dokumen->judul }}
                                                </h4>
                                            </a>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span
                                                    class="text-[10px] font-semibold text-emerald-600 uppercase tracking-wider">
                                                    {{ $dokumen->kategori ?? 'Dokumen' }}
                                                </span>
                                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                                <span class="text-[10px] text-gray-400">
                                                    {{ \Carbon\Carbon::parse($dokumen->tanggal)->translatedFormat('d M Y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <a href="{{ asset('storage/' . $dokumen->file) }}" download
                                            class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 transition-all duration-300 hover:bg-emerald-500 hover:text-white">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="p-8 text-center">
                                    <svg class="w-16 h-16 mx-auto text-gray-200 mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-400 text-sm">Belum ada dokumen tersedia</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Footer Button -->
                        <div class="p-4 bg-gray-50/50 border-t border-gray-100">
                            <a href="/dokumen"
                                class="flex items-center justify-center gap-2 w-full py-3 bg-gradient-to-r from-emerald-600 to-emerald-500 text-white text-sm font-bold transition-all duration-300 hover:from-emerald-700 hover:to-emerald-600 hover:shadow-lg hover:shadow-emerald-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                Lihat Semua Dokumen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                @foreach ($beritasKategoriPopuler as $kategori)
                    <div
                        class="category-column group/category flex flex-col h-full bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:shadow-emerald-100/20">

                        <!-- Category Header -->
                        <div class="px-5 pt-5 pb-3 border-b border-gray-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-black text-gray-800 tracking-tight">
                                            {{ $kategori->kategori }}
                                        </h3>
                                        <div
                                            class="w-8 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full mt-1">
                                        </div>
                                    </div>
                                </div>
                                <a href="#"
                                    class="group/btn inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 uppercase tracking-wider transition-all duration-300 hover:text-emerald-500">
                                    <span>Lihat Semua</span>
                                    <svg class="w-3 h-3 transition-transform group-hover/btn:translate-x-1" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5 flex-1 flex flex-col">

                            <!-- Primary News -->
                            @if ($kategori->beritas->count() > 0)
                                @php $primaryPost = $kategori->beritas->first(); @endphp

                                <article class="group/news mb-6">
                                    <a href="{{ route('berita.detail', $primaryPost->slug) }}" class="block">
                                        <div class="relative aspect-video overflow-hidden shadow-md bg-gray-100 mb-3">
                                            <img src="{{ asset('storage/' . $primaryPost->gambar) }}"
                                                alt="{{ $primaryPost->judul }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover/news:scale-105">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover/news:opacity-100 transition-opacity duration-500">
                                            </div>

                                            <!-- Category Badge -->
                                            <div class="absolute top-2 left-2">
                                                <span
                                                    class="px-2 py-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 text-white text-[8px] font-bold rounded-md shadow-md">
                                                    {{ $kategori->kategori }}
                                                </span>
                                            </div>
                                        </div>

                                        <h4
                                            class="text-base md:text-lg font-bold text-gray-900 leading-tight group-hover/news:text-emerald-600 transition-colors line-clamp-2">
                                            {{ $primaryPost->judul }}
                                        </h4>

                                        <div class="mt-2 flex items-center gap-2 text-[10px] text-gray-400">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-3 h-3 text-emerald-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($primaryPost->created_at)->translatedFormat('d M Y') }}</span>
                                            </div>
                                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                            <div class="flex items-center gap-1">
                                                <svg class="w-3 h-3 text-emerald-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                                <span>{{ number_format(rand(100, 500)) }} views</span>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endif

                            <!-- Secondary News List -->
                            <div class="space-y-4 flex-1">
                                @foreach ($kategori->beritas->slice(1, 3) as $secondaryPost)
                                    <article
                                        class="group/item flex gap-3 transition-all duration-300 hover:-translate-x-0.5">
                                        <a href="{{ route('berita.detail', $secondaryPost->slug) }}"
                                            class="flex-shrink-0 w-20 h-20 overflow-hidden rounded-lg shadow-sm bg-gray-100">
                                            <img src="{{ asset('storage/' . $secondaryPost->gambar) }}"
                                                alt="{{ $secondaryPost->judul }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover/item:scale-110">
                                        </a>

                                        <div class="flex-1 min-w-0">
                                            <h4
                                                class="text-sm font-bold text-gray-800 leading-snug transition-colors group-hover/item:text-emerald-600 line-clamp-2">
                                                <a href="{{ route('berita.detail', $secondaryPost->slug) }}">
                                                    {{ $secondaryPost->judul }}
                                                </a>
                                            </h4>
                                            <div class="flex items-center gap-2 mt-1.5 text-[9px] text-gray-400">
                                                <svg class="w-2.5 h-2.5 text-emerald-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($secondaryPost->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </article>
                                    @if (!$loop->last)
                                        <div class="border-b border-gray-100"></div>
                                    @endif
                                @endforeach
                            </div>

                            <!-- View All Link at Bottom -->
                            <div class="mt-5 pt-3">
                                <a href="#"
                                    class="inline-flex items-center justify-between w-full px-4 py-2.5 bg-gray-50 text-xs font-semibold text-gray-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white group/btn-all">
                                    <span>Semua Berita {{ $kategori->kategori }}</span>
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover/btn-all:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>

    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Modern Header -->
            <div class="mb-10">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <div
                                class="w-8 h-8 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center shadow-md">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <span
                                class="text-sm font-bold uppercase tracking-wider bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">
                                Moment & Kegiatan
                            </span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">
                            Galeri <span
                                class="bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">Foto</span>
                        </h2>
                        <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full mt-3"></div>
                    </div>

                    <a href="/galeri"
                        class="group inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 text-sm font-semibold text-gray-700 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-emerald-100">
                        <span>Lihat Semua</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Gallery Slider Container -->
            <div class="relative group/nav px-2">

                <!-- Prev Button -->
                <button
                    class="gallery-prev absolute -left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white shadow-xl border border-gray-100 flex items-center justify-center text-gray-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 opacity-0 group-hover/nav:opacity-100 hidden md:flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Swiper -->
                <div class="swiper gallerySwiper overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($galeries as $index => $design)
                            <div class="swiper-slide py-4">
                                <div
                                    class="group bg-white rounded-2xl overflow-hidden shadow-md transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-100/30 hover:-translate-y-1 border border-gray-100">

                                    <!-- Image Container -->
                                    <div class="relative aspect-[3/4] overflow-hidden cursor-pointer bg-gray-100">
                                        <img src="{{ asset('storage/' . $design->gambar) }}"
                                            alt="{{ $design->caption }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                            loading="lazy">

                                        <!-- Overlay with Icon -->
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                                            <div
                                                class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 text-white transition-all duration-300 group-hover:scale-110 group-hover:bg-gradient-to-r group-hover:from-emerald-500 group-hover:to-emerald-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m-3-3h6">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Category Badge -->
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="px-2.5 py-1 bg-gradient-to-r from-emerald-500 to-emerald-400 text-white text-[9px] font-bold rounded-lg shadow-md">
                                                Foto {{ $index + 1 }}
                                            </span>
                                        </div>

                                        <!-- Number Badge -->
                                        <div class="absolute bottom-3 right-3">
                                            <span
                                                class="w-7 h-7 rounded-full bg-black/50 backdrop-blur-sm text-white text-[10px] font-bold flex items-center justify-center">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Caption -->
                                    <div class="p-4 bg-white text-center">
                                        <h3
                                            class="text-sm font-bold text-gray-800 line-clamp-2 min-h-[2.5rem] transition-colors duration-300 group-hover:text-emerald-600">
                                            {{ Str::limit($design->caption, 50) }}
                                        </h3>

                                        <!-- Decorative Line -->
                                        <div
                                            class="w-8 h-0.5 bg-gradient-to-r from-emerald-400 to-emerald-200 rounded-full mx-auto mt-2 transition-all duration-300 group-hover:w-12">
                                        </div>

                                        <div
                                            class="mt-2 flex items-center justify-center gap-1 text-[9px] font-medium text-gray-400">
                                            <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span>Kegiatan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Custom Pagination -->
                    <div class="gallery-pagination flex justify-center gap-2 mt-6"></div>
                </div>

                <!-- Next Button -->
                <button
                    class="gallery-next absolute -right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white shadow-xl border border-gray-100 flex items-center justify-center text-gray-600 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 opacity-0 group-hover/nav:opacity-100 hidden md:flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

            </div>
    </section>

    <section class="py-12 md:py-14 bg-gradient-to-br from-emerald-50 via-white to-emerald-50/30 rounded-3xl">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <div
                        class="w-8 h-8 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-400 flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-sm font-bold uppercase tracking-wider bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">
                        Aplikasi & Layanan
                    </span>
                </div>
                <h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">
                    Layanan <span
                        class="bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">Digital</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full mx-auto mt-3"></div>
                <p class="text-gray-500 text-sm mt-4 max-w-2xl mx-auto">Akses berbagai layanan digital Kementerian Agama
                    Kabupaten Pulau Morotai dengan mudah</p>
            </div>

            <!-- Service Slider Container -->
            <div class="relative">

                <!-- Prev Button -->
                <button
                    class="service-prev absolute -left-3 md:-left-5 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-10 md:h-10 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-500 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 opacity-0 group-hover:opacity-100 md:opacity-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Swiper -->
                <div class="swiper serviceSwiper overflow-visible">
                    <div class="swiper-wrapper py-4">

                        <!-- Service Item 1 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/moc.jpg') }}" alt="Mooc Pintar"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <!-- Active Indicator -->
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Mooc Pintar</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Pembelajaran Online</p>
                            </a>
                        </div>

                        <!-- Service Item 2 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/quran-digital.png') }}"
                                            alt="Quran Digital"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Quran Digital</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Baca Quran Online</p>
                            </a>
                        </div>

                        <!-- Service Item 3 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/emis.png') }}" alt="EMIS"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    EMIS</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Data Pendidikan</p>
                            </a>
                        </div>

                        <!-- Service Item 4 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/sindumas.png') }}" alt="Simdumas"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Simdumas</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Pengaduan</p>
                            </a>
                        </div>

                        <!-- Service Item 5 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/lapor.jpeg') }}" alt="Lapor"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain rounded-full transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Lapor</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Aspirasi</p>
                            </a>
                        </div>

                        <!-- Service Item 6 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/srikandi.png') }}" alt="Srikandi"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Srikandi</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Kepegawaian</p>
                            </a>
                        </div>

                        <!-- Service Item 7 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/pusaka.png') }}" alt="Srikandi"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Pusaka Super Apps</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Layanan Terpadu</p>
                            </a>
                        </div>

                        <!-- Service Item 7 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/simpatika.png') }}" alt="Simpatika"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Simpatika</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Guru & Tenaga Kependidikan</p>
                            </a>
                        </div>

                        <!-- Service Item 8 -->
                        <div class="swiper-slide !w-auto px-2">
                            <a href="#" class="flex flex-col items-center text-center group">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-white to-emerald-50 flex items-center justify-center shadow-md transition-all duration-300 group-hover:shadow-xl group-hover:shadow-emerald-100/50 group-hover:scale-105 border border-emerald-100">
                                        <img src="{{ asset('assets/img/layanan/simkah.png') }}" alt="Simkah"
                                            class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-300 group-hover:scale-110">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    </div>
                                </div>
                                <h3
                                    class="text-xs font-semibold text-gray-700 mt-3 group-hover:text-emerald-600 transition-colors">
                                    Simkah</h3>
                                <p class="text-[9px] text-gray-400 mt-0.5">Guru & Tenaga Kependidikan</p>
                            </a>
                        </div>

                    </div>

                    <!-- Custom Pagination -->
                    <div class="service-pagination flex justify-center gap-2 mt-4"></div>
                </div>

                <!-- Next Button -->
                <button
                    class="service-next absolute -right-3 md:-right-5 top-1/2 -translate-y-1/2 z-20 w-9 h-9 md:w-10 md:h-10 rounded-full bg-white shadow-lg border border-gray-100 flex items-center justify-center text-gray-500 transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-500 hover:text-white hover:scale-110 opacity-0 group-hover:opacity-100 md:opacity-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
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
                speed: 400,

                // PENGATURAN RESPONSIVITAS (Mobile First)
                slidesPerView: 4,
                spaceBetween: 10,

                breakpoints: {
                    640: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    }
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
                speed: 1000,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
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

            const reelsSwiper = new Swiper('.reelsSwiper', {
                slidesPerView: 'auto',
                spaceBetween: 12,
                freeMode: true,
                pagination: false,
                navigation: {
                    nextEl: '.reels-swiper-next',
                    prevEl: '.reels-swiper-prev',
                },
                breakpoints: {
                    640: {
                        spaceBetween: 16,
                    },
                    768: {
                        spaceBetween: 7.5,
                    },
                },
            });
        });



        // Load YouTube Iframe on Thumbnail Click
        function loadYouTubeIframe(element) {
            const videoId = element.getAttribute('data-video-id');
            const iframe = document.createElement('iframe');

            iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1`);
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allowfullscreen', '1');
            iframe.setAttribute('allow',
                'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
            iframe.classList.add('w-full', 'h-full');

            element.innerHTML = '';
            element.appendChild(iframe);
        }
    </script>
@endpush
