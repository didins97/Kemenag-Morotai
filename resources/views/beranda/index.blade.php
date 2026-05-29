@extends('app')

@section('content')
    {{-- SECTION: BANNER RESPONSIVE --}}
    <section class="my-2"> {{-- Tambah sedikit padding di mobile agar tidak nempel layar --}}
        <div
            class="relative w-full overflow-hidden border border-[var(--color-green-border)] bg-white shadow-sm group rounded-xl md:rounded-none">

            {{-- 1. GAMBAR VERSI MOBILE --}}
            {{-- Muncul di HP (block), Hilang di Desktop (md:hidden) --}}
            <img src="{{ asset('assets/img/bannerkantor-mobile.png') }}" alt="Banner Kemenag Pulau Morotai Mobile"
                class="block md:hidden w-full h-auto">

            {{-- 2. GAMBAR VERSI DESKTOP --}}
            {{-- Hilang di HP (hidden), Muncul di Desktop (md:block) --}}
            <img src="{{ asset('assets/img/banner-kantor.png') }}" alt="Banner Kemenag Pulau Morotai Desktop"
                class="hidden md:block w-full h-auto transition-transform duration-[3000ms] group-hover:scale-[1.02]">

            {{-- Overlay tipis (Hanya untuk Desktop agar tetap premium) --}}
            <div
                class="hidden md:block absolute inset-0 bg-[var(--color-green-primary)]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
            </div>

        </div>
    </section>

    {{-- SECTION 1: REELS --}}
    <section class="reels-area my-4 relative overflow-hidden">
        <div class="relative group/reels-nav">
            <div class="swiper reelsSwiper overflow-visible py-2">
                <div class="swiper-wrapper">
                    @forelse ($instagramReels as $reel)
                        <div class="swiper-slide w-full md:!w-[145px]">
                            <article class="relative h-full">
                                <a href="{{ $reel['permalink'] }}" target="_blank"
                                    class="relative block aspect-[9/16] overflow-hidden bg-gray-100 shadow-sm transition-all duration-300 hover:scale-[1.03] hover:shadow-xl group border border-[var(--color-green-border)] lg:rounded-none">

                                    <img src="{{ $reel['thumbnail_url'] ?? $reel['media_url'] }}"
                                        class="absolute inset-0 w-full h-full object-cover">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent">
                                    </div>

                                    {{-- Play Button --}}
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30">
                                            <svg class="w-5 h-5 text-white fill-current ml-0.5" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 p-3">
                                        <p
                                            class="text-white text-[9px] md:text-[10px] font-bold leading-tight line-clamp-2 uppercase tracking-tight">
                                            {{ $reel['caption'] ?? 'Instagram Reels' }}
                                        </p>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @empty
                        <div
                            class="w-full py-6 text-center text-[var(--color-txt-muted)] italic text-sm font-bold uppercase tracking-widest opacity-50">
                            Belum ada Reels.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Navigasi tetap di luar agar tidak menutupi konten --}}
            @if (count($instagramReels) > 0)
                <button
                    class="reels-swiper-prev hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 z-[60] w-10 h-10 rounded-xl bg-white shadow-lg items-center justify-center text-[var(--color-green-primary)] border border-[var(--color-green-border)] hover:bg-[var(--color-green-primary)] hover:text-white transition-all disabled:opacity-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button
                    class="reels-swiper-next hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 z-[60] w-10 h-10 rounded-xl bg-white shadow-lg items-center justify-center text-[var(--color-green-primary)] border border-[var(--color-green-border)] hover:bg-[var(--color-green-primary)] hover:text-white transition-all disabled:opacity-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            @endif
        </div>
    </section>

    {{-- SECTION 2: BERITA UTAMA --}}
    <section class="my-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- MAIN COLUMN --}}
            <div class="lg:col-span-9 space-y-8">

                {{-- HERO NEWS --}}
                @if ($hero)
                    <article class="relative group cursor-pointer overflow-hidden bg-gray-900 lg:h-[480px]">
                        {{-- Di Mobile: Layout Stack | Di Desktop: Layout Overlay --}}
                        <div class="flex flex-col lg:block">

                            {{-- AREA GAMBAR --}}
                            <div class="relative aspect-video lg:absolute lg:inset-0 lg:aspect-auto h-full w-full">
                                <img src="{{ asset('storage/' . $hero->gambar) }}"
                                    class="w-full h-full object-cover opacity-90 lg:opacity-70 transition-transform duration-700 group-hover:scale-105"
                                    alt="{{ $hero->judul }}">

                                {{-- Overlay gradien tetap ada untuk mode desktop --}}
                                <div
                                    class="hidden lg:block absolute inset-0 bg-gradient-to-t from-[#1e293b]/95 via-[#1e293b]/20 to-transparent">
                                </div>
                            </div>

                            <div
                                class="bg-white lg:bg-transparent py-5 pl-0 pr-5 lg:p-10 lg:absolute lg:bottom-0 lg:left-0 space-y-3 lg:space-y-4">
                                <span
                                    class="inline-block bg-[#059669] text-white text-[9px] md:text-[10px] font-black px-2 py-1 md:px-3 md:py-1.5 uppercase tracking-[0.2em]">
                                    {{ $hero->kategori->kategori ?? 'News' }}
                                </span>

                                {{-- tracking-tighter: Agar font terlihat lebih padat dan premium seperti koran digital --}}
                                <h2
                                    class="text-[#1e293b] lg:text-white text-xl md:text-4xl font-black leading-tight max-w-3xl tracking-tighter">
                                    {{ $hero->judul }}
                                </h2>

                                <p
                                    class="text-slate-600 lg:text-slate-300 text-xs md:text-base line-clamp-2 max-w-xl font-medium">
                                    {{ Str::limit(strip_tags($hero->konten), 140) }}
                                </p>

                                <span class="block text-slate-400 text-[10px] md:text-xs italic">
                                    {{ $hero->created_at->translatedFormat('l, d F Y') }}
                                </span>
                            </div>
                        </div>
                    </article>
                @endif

                {{-- SUB NEWS GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    @foreach ($subNews as $news)
                        <article class="group">
                            <div class="flex flex-row-reverse md:flex-col gap-4 items-start md:items-stretch">

                                {{-- 1. GAMBAR (Akan pindah ke KANAN di mobile karena flex-row-reverse) --}}
                                <div
                                    class="w-28 h-20 md:w-full md:h-auto md:aspect-video flex-shrink-0 overflow-hidden shadow-sm border border-[#e6fcf0] rounded-xl lg:rounded-none">
                                    <img src="{{ asset('storage/' . $news->gambar) }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        alt="{{ $news->judul }}">
                                </div>

                                {{-- 2. KONTEN (Akan pindah ke KIRI di mobile karena flex-row-reverse) --}}
                                <div class="space-y-1 md:space-y-2 flex-grow text-left">
                                    <span
                                        class="text-[#059669] text-[9px] md:text-[10px] font-black uppercase tracking-widest block">
                                        {{ $news->kategori->kategori ?? 'News' }}
                                    </span>
                                    <a href="{{ route('berita.detail', $news->slug) }}">
                                        <h3
                                            class="font-bold text-[#1e293b] text-sm md:text-base leading-snug group-hover:text-[#10b981] transition-colors line-clamp-3">
                                            {{ $news->judul }}
                                        </h3>
                                    </a>
                                    <span class="text-[#64748b] text-[9px] md:text-[10px] block font-bold opacity-60">
                                        {{ $news->created_at->translatedFormat('d M Y') }}
                                    </span>
                                </div>

                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- SIDEBAR: Hidden on Mobile --}}
            <aside class="hidden lg:block lg:col-span-3 lg:border-l lg:border-[#e6fcf0] lg:pl-8">
                <div class="divide-y divide-[#e6fcf0]">
                    @foreach ($sidebarNews as $side)
                        <div class="py-5 group first:pt-0">
                            <span class="text-[#059669] text-[10px] font-extrabold uppercase tracking-tighter">
                                {{ $side->kategori->kategori ?? 'Trending' }}
                            </span>
                            <a href="{{ route('berita.detail', $side->slug) }}">
                                <h4
                                    class="font-bold text-[#1e293b] text-sm mt-1.5 leading-relaxed group-hover:text-[#10b981] cursor-pointer transition-colors">
                                    {{ $side->judul }}
                                </h4>
                            </a>
                            <span
                                class="text-[#64748b] text-[10px] block mt-2">{{ $side->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                    @endforeach
                </div>
            </aside>

        </div>
    </section>

    {{-- SECTION 3: JADWAL SHOLAT --}}
    <section class="py-12 bg-bg-app -mx-4 sm:-mx-4 lg:-mx-4 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center gap-8">
                <div class="md:w-1/3 space-y-4">
                    <h2 class="text-3xl font-black text-txt-main leading-tight font-sans">
                        Jadwal <span class="text-green-primary">Sholat</span>
                    </h2>
                    <p class="text-txt-body text-sm leading-relaxed">
                        Waktu sholat untuk wilayah <b>{{ $jadwalSholat['lokasi'] }}</b> dan sekitarnya.
                        <span
                            class="block mt-2 font-bold text-green-primary">{{ $jadwalSholat['jadwal']['tanggal'] }}</span>
                    </p>
                    <div class="hidden md:flex items-center gap-2 pt-4">
                        <button
                            onclick="document.getElementById('sholat-slider').scrollBy({left: -200, behavior: 'smooth'})"
                            class="p-2 rounded-full border border-green-border bg-white text-green-primary hover:bg-green-primary hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button onclick="document.getElementById('sholat-slider').scrollBy({left: 200, behavior: 'smooth'})"
                            class="p-2 rounded-full border border-green-border bg-white text-green-primary hover:bg-green-primary hover:text-white transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="md:w-2/3 relative">
                    <div id="sholat-slider" class="flex gap-4 overflow-x-auto scrollbar-hide snap-x snap-mandatory pb-6">
                        @php
                            // Filter hanya ambil jam sholat saja, buang 'tanggal' dan 'date'
                            $listSholat = array_diff_key($jadwalSholat['jadwal'], array_flip(['tanggal', 'date']));
                            $waktuSekarang = now()->format('H:i');

                            // Logic sederhana untuk mencari jadwal terdekat berikutnya (opsional)
                            $foundActive = false;
                        @endphp

                        @foreach ($listSholat as $nama => $waktu)
                            @php
                                // Menentukan card mana yang aktif (logic sederhana)
                                // Anda bisa sesuaikan logic isActive ini sesuai kebutuhan
                                $isActive = false;
                                if (!$foundActive && $waktu > $waktuSekarang) {
                                    $isActive = true;
                                    $foundActive = true;
                                }
                            @endphp

                            <div class="snap-start flex-shrink-0 w-40 group">
                                <div
                                    class="relative overflow-hidden rounded-2xl p-6 transition-all duration-300 border
                                {{ $isActive ? 'bg-green-primary border-transparent shadow-lg shadow-green-primary/30 scale-105' : 'bg-white border-green-border hover:border-green-primary' }}">

                                    <h4
                                        class="text-xs uppercase tracking-widest font-bold {{ $isActive ? 'text-white/80' : 'text-txt-muted group-hover:text-green-primary' }}">
                                        {{ $nama }}
                                    </h4>
                                    <p
                                        class="text-2xl font-black mt-2 font-sans {{ $isActive ? 'text-white' : 'text-txt-main' }}">
                                        {{ $waktu }}
                                    </p>

                                    @if ($isActive)
                                        <div class="mt-3 inline-flex items-center gap-1.5 px-2 py-1 bg-white/20 rounded-md">
                                            <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span>
                                            <span class="text-[10px] font-bold text-white uppercase">Mendatang</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION: BERITA TERBARU & POPULER --}}
    <section class="my-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            {{-- SISI KIRI: BERITA POPULER (LIST DENGAN NOMOR) --}}
            <div class="lg:col-span-4">
                {{-- Judul Khusus Populer --}}
                <div class="flex items-center gap-4 mb-8">
                    {{-- JUDUL --}}
                    <h2 class="text-2xl font-black text-[var(--color-txt-main)] uppercase tracking-tight flex-shrink-0">
                        Berita <span class="text-[var(--color-green-primary)]">Populer</span>
                    </h2>

                    {{-- GARIS TENGAH (Penghubung) --}}
                    <div class="h-[1px] flex-grow bg-[var(--color-green-border)] opacity-30"></div>

                    {{-- TOMBOL LIHAT LAINNYA --}}
                    <a href="{{ url('berita/populer') }}"
                        class="flex-shrink-0 flex items-center gap-1 group text-[10px] font-black uppercase tracking-widest text-[var(--color-green-primary)] hover:text-[var(--color-txt-main)] transition-colors duration-300">
                        <span>Lihat Lainnya</span>
                        <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 7l5 5-5 5M6 7l5 5-5 5" />
                        </svg>
                    </a>
                </div>

                <div class="space-y-8">
                    @foreach ($listRecent as $item)
                        <div class="flex gap-5 group cursor-pointer">
                            {{-- Nomor Otomatis 01, 02, dst --}}
                            <span
                                class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-t from-[var(--color-green-primary)] to-[var(--color-green-soft)] transition-colors duration-300">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-[9px] font-black uppercase tracking-widest text-[#059669]">
                                        {{ $item->kategori->kategori ?? 'Umum' }}
                                    </span>
                                </div>

                                <a href="{{ url('berita/' . $item->slug) }}">
                                    <h3
                                        class="font-bold text-sm md:text-base text-[var(--color-txt-main)] leading-snug group-hover:text-[var(--color-green-primary)] transition-colors line-clamp-2">
                                        {{ $item->judul }}
                                    </h3>
                                </a>

                                <p class="text-[10px] text-[var(--color-txt-muted)] font-medium">
                                    {{ $item->created_at->translatedFormat('d M Y') }} • {{ number_format($item->views) }}
                                    views
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- SISI KANAN: BERITA TERKINI (GRID IMAGES) --}}
            <div class="lg:col-span-8">
                {{-- Judul Khusus Terkini --}}
                <div class="flex items-center gap-4 mb-8">
                    {{-- JUDUL --}}
                    <h2 class="text-2xl font-black text-[var(--color-txt-main)] uppercase tracking-tight flex-shrink-0">
                        Kabar <span class="text-[var(--color-green-primary)]">Terkini</span>
                    </h2>

                    {{-- GARIS TENGAH --}}
                    <div class="h-[1px] flex-grow bg-[var(--color-green-border)] opacity-30"></div>

                    {{-- TOMBOL LIHAT LAINNYA --}}
                    <a href="{{ url('berita/terkini') }}"
                        class="flex-shrink-0 flex items-center gap-1 group text-[10px] font-black uppercase tracking-widest text-[var(--color-green-primary)] hover:text-[var(--color-txt-main)] transition-colors duration-300">
                        <span>Lihat Lainnya</span>
                        {{-- Ikon Panah Ganda --}}
                        <svg class="w-3 h-3 transform group-hover:translate-x-1 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 7l5 5-5 5M6 7l5 5-5 5" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    @foreach ($gridNews as $item)
                        <article class="group">
                            <div
                                class="flex flex-row-reverse md:block relative overflow-hidden bg-white md:bg-gray-900 gap-4 items-start h-full">

                                {{-- AREA GAMBAR --}}
                                <div
                                    class="md:aspect-[4/3] w-28 h-20 flex-shrink-0 md:w-full md:h-full overflow-hidden rounded-xl md:rounded-none">
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="w-full h-full object-cover md:absolute md:inset-0 opacity-100 md:opacity-60 group-hover:scale-110 transition-transform duration-700"
                                        alt="{{ $item->judul }}">

                                    <div
                                        class="hidden md:block absolute inset-0 bg-gradient-to-t from-[var(--color-txt-main)]/90 via-transparent to-transparent">
                                    </div>
                                </div>

                                {{-- AREA KONTEN --}}
                                <div class="flex-grow md:absolute md:bottom-0 p-0 md:p-5 space-y-1 md:space-y-2">
                                    <span
                                        class="text-[9px] md:text-[10px] font-black text-[#059669] md:text-[var(--color-green-soft)] uppercase tracking-widest block">
                                        {{ $item->kategori->kategori ?? 'News' }}
                                    </span>

                                    <a href="{{ url('berita/' . $item->slug) }}">
                                        <h4
                                            class="text-[#1e293b] md:text-white text-sm md:text-base font-bold leading-tight group-hover:text-[#059669] md:group-hover:text-[var(--color-green-soft)] transition-colors line-clamp-3 md:line-clamp-2">
                                            {{ $item->judul }}
                                        </h4>
                                    </a>

                                    <p
                                        class="text-slate-400 md:text-white/70 text-[9px] md:text-[10px] font-bold md:font-normal opacity-80">
                                        {{ $item->created_at->translatedFormat('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- SECTION: VIDEO SLIDER (DINAMIS) --}}
    <section class="py-12 bg-bg-app -mx-4 sm:-mx-4 lg:-mx-4 px-4 sm:px-6 lg:px-8">
        <div class="relative group">
            <div class="swiper video-slider overflow-visible">
                <div class="swiper-wrapper">
                    @foreach ($playLists as $playList)
                        <div class="swiper-slide py-2">
                            <article class="group/card cursor-pointer" onclick="loadYouTubeIframe(this)"
                                data-video-id="{{ $playList->youtube_id }}">

                                <div
                                    class="relative aspect-video overflow-hidden rounded-2xl bg-[var(--color-txt-main)] shadow-sm border border-[var(--color-green-border)]">
                                    <img src="https://img.youtube.com/vi/{{ $playList->youtube_id }}/maxresdefault.jpg"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover/card:scale-110 opacity-90 group-hover/card:opacity-100"
                                        onerror="this.src='https://img.youtube.com/vi/{{ $playList->youtube_id }}/hqdefault.jpg'">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[var(--color-txt-main)]/80 via-transparent to-transparent opacity-60 group-hover/card:opacity-90 transition-opacity">
                                    </div>

                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div
                                            class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 transition-all duration-500 group-hover/card:scale-110 group-hover/card:bg-[var(--color-green-primary)] group-hover/card:border-transparent">
                                            <svg class="w-5 h-5 text-white fill-current" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="px-2 py-1 bg-[var(--color-green-primary)] text-white text-[9px] font-black uppercase tracking-wider rounded-md">
                                            {{ $playList->kategori ?? 'Kegiatan' }}
                                        </span>
                                    </div>

                                    <div
                                        class="absolute bottom-3 right-3 bg-[var(--color-txt-main)]/60 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-0.5 rounded-md border border-white/10">
                                        @php $duration = rand(120, 600); @endphp
                                        {{ floor($duration / 60) }}:{{ str_pad($duration % 60, 2, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="video-pagination mt-8 flex justify-center gap-1.5"></div>
        </div>
    </section>

    {{-- SECTION: PENGUMUMAN & DOKUMEN --}}
    <section class="my-8">
        <div class="flex flex-col lg:flex-row gap-12">

            <div class="lg:w-2/3">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <h2 class="text-2xl md:text-3xl font-black text-[var(--color-txt-main)] uppercase tracking-tight">
                            Pengumuman <span class="text-[var(--color-green-primary)]">Terbaru</span>
                        </h2>
                        <div class="hidden md:block h-[2px] w-24 bg-[var(--color-green-border)]"></div>
                    </div>
                    <a href="/pengumuman"
                        class="group flex items-center gap-2 text-xs font-bold text-[var(--color-txt-muted)] hover:text-[var(--color-green-primary)] transition-colors">
                        LIHAT SEMUA
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>

                <div class="space-y-6">
                    @forelse ($pengumumans as $pengumuman)
                        <article
                            class="group bg-white rounded-2xl border border-[var(--color-green-border)] p-5 md:p-6 transition-all duration-300 hover:shadow-xl hover:shadow-[var(--color-green-primary)]/5 hover:-translate-y-1">
                            <div class="flex flex-col md:flex-row gap-6">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-16 h-20 flex flex-col items-center justify-center rounded-xl bg-[var(--color-green-light-bg)] border border-[var(--color-green-border)] group-hover:bg-[var(--color-green-primary)] transition-colors duration-500">
                                        <span
                                            class="text-2xl font-black text-[var(--color-green-primary)] group-hover:text-white transition-colors leading-none">
                                            {{ $pengumuman->tanggal->format('d') }}
                                        </span>
                                        <span
                                            class="text-[10px] font-bold text-[var(--color-txt-muted)] group-hover:text-white/80 uppercase tracking-widest mt-1">
                                            {{ $pengumuman->tanggal->translatedFormat('M') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-1 space-y-3">
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="px-2 py-0.5 bg-[var(--color-green-border)] text-[var(--color-green-primary)] text-[9px] font-black uppercase rounded">
                                            Official
                                        </span>
                                        <span class="text-[10px] text-[var(--color-txt-muted)]">
                                            Oleh {{ $pengumuman->penulis ?? 'Admin' }}
                                        </span>
                                    </div>
                                    <a href="#" class="block">
                                        <h3
                                            class="text-lg md:text-xl font-bold text-[var(--color-txt-main)] leading-snug group-hover:text-[var(--color-txt-hover)] transition-colors">
                                            {{ $pengumuman->judul }}
                                        </h3>
                                    </a>
                                    <p class="text-[var(--color-txt-body)] text-sm line-clamp-2 leading-relaxed">
                                        {{ Str::limit(strip_tags($pengumuman->isi), 150) }}
                                    </p>
                                    <div class="pt-2 flex items-center justify-between">
                                        <span class="text-[10px] text-[var(--color-txt-muted)] font-medium italic">
                                            Diterbitkan {{ $pengumuman->tanggal->translatedFormat('l, d F Y') }}
                                        </span>
                                        <a href="#"
                                            class="text-sm font-bold text-[var(--color-green-primary)] flex items-center gap-1 group/link">
                                            Baca Detail
                                            <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div
                            class="bg-white rounded-2xl border border-dashed border-[var(--color-green-border)] p-12 text-center">
                            <p class="text-[var(--color-txt-muted)]">Belum ada pengumuman resmi saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-2xl font-black text-[var(--color-txt-main)] uppercase tracking-tight">
                        Dokumen <span class="text-[var(--color-green-primary)]">Resmi</span>
                    </h2>
                </div>

                <div class="bg-white rounded-2xl border border-[var(--color-green-border)] overflow-hidden shadow-sm">
                    <div class="divide-y divide-[var(--color-green-border)]">
                        @forelse ($dokumens->take(5) as $dokumen)
                            @php
                                $ext = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                                $bgIcon = match ($ext) {
                                    'pdf' => 'bg-red-50 text-red-500',
                                    'doc', 'docx' => 'bg-blue-50 text-blue-500',
                                    'xls', 'xlsx' => 'bg-green-50 text-green-500',
                                    default => 'bg-gray-50 text-gray-500',
                                };
                            @endphp
                            <div class="p-4 group hover:bg-[var(--color-green-light-bg)] transition-colors">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-lg {{ $bgIcon }} flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110">
                                        <i class="fa-solid fa-file-lines text-lg"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank"
                                            class="block">
                                            <h4
                                                class="text-sm font-bold text-[var(--color-txt-main)] truncate group-hover:text-[var(--color-green-primary)] transition-colors">
                                                {{ $dokumen->judul }}
                                            </h4>
                                        </a>
                                        <p class="text-[9px] text-[var(--color-txt-muted)] font-medium uppercase mt-1">
                                            {{ $ext }} •
                                            {{ \Carbon\Carbon::parse($dokumen->tanggal)->translatedFormat('d M Y') }}
                                        </p>
                                    </div>
                                    <a href="{{ asset('storage/' . $dokumen->file) }}" download
                                        class="p-2 text-[var(--color-txt-muted)] hover:text-[var(--color-green-primary)] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="p-8 text-center text-xs text-[var(--color-txt-muted)]">Tidak ada dokumen.</div>
                        @endforelse
                    </div>

                    <div class="p-4 bg-[var(--color-green-light-bg)]">
                        <a href="/dokumen"
                            class="block w-full py-3 rounded-xl bg-[var(--color-green-primary)] hover:bg-[var(--color-green-primary-dark)] text-white text-center text-xs font-bold uppercase tracking-widest transition-all">
                            Semua Dokumen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION: KATEGORI BERITA --}}
    <section class="my-8">
        <div class="flex items-center gap-4 mb-10">
            <h2 class="text-2xl md:text-3xl font-black text-[var(--color-txt-main)] uppercase tracking-tight">
                Eksplor <span class="text-[var(--color-green-primary)]">Kategori</span>
            </h2>
            <div class="flex-grow h-[2px] bg-[var(--color-green-border)]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($beritasKategoriPopuler as $kategori)
                <div
                    class="category-column group/category flex flex-col h-full bg-white rounded-2xl border border-[var(--color-green-border)] overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-[var(--color-green-primary)]/5">

                    <div
                        class="px-6 py-4 bg-[var(--color-green-light-bg)]/30 border-b border-[var(--color-green-border)] flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-5 bg-[var(--color-green-primary)] rounded-full"></div>
                            <h3 class="text-sm font-black text-[var(--color-txt-main)] uppercase tracking-widest">
                                {{ $kategori->kategori }}
                            </h3>
                        </div>
                        <a href="#"
                            class="text-[10px] font-black text-[var(--color-green-primary)] hover:opacity-70 transition-opacity">
                            VIEW ALL
                        </a>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">

                        @if ($kategori->beritas->count() > 0)
                            @php $primaryPost = $kategori->beritas->first(); @endphp
                            <article class="group/news mb-8">
                                <a href="{{ route('berita.detail', $primaryPost->slug) }}" class="block space-y-4">
                                    <div
                                        class="relative aspect-video overflow-hidden rounded-xl bg-gray-900 border border-[var(--color-green-border)]">
                                        <img src="{{ asset('storage/' . $primaryPost->gambar) }}"
                                            alt="{{ $primaryPost->judul }}"
                                            class="w-full h-full object-cover opacity-80 transition-transform duration-700 group-hover/news:scale-110 group-hover/news:opacity-100">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                        </div>
                                    </div>

                                    <h4
                                        class="text-base font-bold text-[var(--color-txt-main)] leading-tight group-hover/news:text-[var(--color-green-primary)] transition-colors line-clamp-2">
                                        {{ $primaryPost->judul }}
                                    </h4>
                                    <p class="text-[10px] text-[var(--color-txt-muted)] font-medium">
                                        {{ $primaryPost->created_at->translatedFormat('d F Y') }}
                                    </p>
                                </a>
                            </article>
                        @endif

                        <div class="space-y-5 flex-1">
                            @foreach ($kategori->beritas->slice(1, 3) as $secondaryPost)
                                <article class="group/item flex gap-4 items-center">
                                    <a href="{{ route('berita.detail', $secondaryPost->slug) }}"
                                        class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg bg-gray-50 border border-[var(--color-green-border)]">
                                        <img src="{{ asset('storage/' . $secondaryPost->gambar) }}"
                                            alt="{{ $secondaryPost->judul }}"
                                            class="w-full h-full object-cover grayscale group-hover/item:grayscale-0 transition-all duration-500 group-hover/item:scale-110">
                                    </a>

                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-xs font-bold text-[var(--color-txt-main)] leading-snug group-hover/item:text-[var(--color-green-primary)] transition-colors line-clamp-2">
                                            <a href="{{ route('berita.detail', $secondaryPost->slug) }}">
                                                {{ $secondaryPost->judul }}
                                            </a>
                                        </h4>
                                        <span
                                            class="text-[9px] text-[var(--color-txt-muted)] font-bold uppercase tracking-tight mt-1 block">
                                            {{ $secondaryPost->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            <a href="#"
                                class="block w-full py-3 rounded-xl border border-[var(--color-green-border)] text-[var(--color-green-primary)] text-center text-[10px] font-black uppercase tracking-widest transition-all hover:bg-[var(--color-green-primary)] hover:text-white">
                                Jelajahi Semua
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- SECTION: APLIKASI & LAYANAN --}}
    <section class="py-12 md:py-16 bg-[var(--color-bg-app)]">
        <div class="max-w-7xl mx-auto px-4">

            <div class="text-center mb-10 space-y-3">
                <div class="flex items-center justify-center gap-2">
                    <span
                        class="px-3 py-1 rounded-full bg-[var(--color-green-light-bg)] text-[var(--color-green-primary)] text-[10px] font-black uppercase tracking-[0.2em]">
                        Digital Ecosystem
                    </span>
                </div>
                <h2 class="text-2xl md:text-4xl font-black text-[var(--color-txt-main)] uppercase tracking-tight">
                    Layanan <span class="text-[var(--color-green-primary)]">Digital</span>
                </h2>
                <p class="text-[var(--color-txt-body)] text-sm max-w-2xl mx-auto leading-relaxed">
                    Akses berbagai layanan digital terpadu untuk memudahkan keperluan administrasi dan informasi Anda.
                </p>
            </div>

            <div class="relative group">

                <button
                    class="service-prev absolute -left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-xl bg-white shadow-sm border border-[var(--color-green-border)] text-[var(--color-green-primary)] transition-all duration-300 hover:bg-[var(--color-green-primary)] hover:text-white hover:scale-105 hidden md:flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div class="swiper serviceSwiper overflow-visible">
                    <div class="swiper-wrapper py-6">

                        @php
                            $layanan = [
                                ['name' => 'Mooc Pintar', 'desc' => 'Pembelajaran Online', 'img' => 'moc.jpg'],
                                [
                                    'name' => 'Quran Digital',
                                    'desc' => 'Baca Quran Online',
                                    'img' => 'quran-digital.png',
                                ],
                                ['name' => 'EMIS', 'desc' => 'Data Pendidikan', 'img' => 'emis.png'],
                                ['name' => 'Simdumas', 'desc' => 'Pengaduan', 'img' => 'sindumas.png'],
                                ['name' => 'Lapor', 'desc' => 'Aspirasi', 'img' => 'lapor.jpeg'],
                                ['name' => 'Srikandi', 'desc' => 'Kepegawaian', 'img' => 'srikandi.png'],
                                ['name' => 'Pusaka', 'desc' => 'Layanan Terpadu', 'img' => 'pusaka.png'],
                                ['name' => 'Simpatika', 'desc' => 'Guru & Tenaga', 'img' => 'simpatika.png'],
                                ['name' => 'Simkah', 'desc' => 'Layanan Nikah', 'img' => 'simkah.png'],
                            ];
                        @endphp

                        @foreach ($layanan as $item)
                            <div class="swiper-slide !w-auto px-3">
                                <a href="#" class="flex flex-col items-center group/item w-28 md:w-32">
                                    <div class="relative">
                                        <div
                                            class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-white border border-[var(--color-green-border)] flex items-center justify-center shadow-sm transition-all duration-500 group-hover/item:shadow-xl group-hover/item:shadow-[var(--color-green-primary)]/10 group-hover/item:-translate-y-2 group-hover/item:border-[var(--color-green-soft)]">
                                            <img src="{{ asset('assets/img/layanan/' . $item['img']) }}"
                                                alt="{{ $item['name'] }}"
                                                class="w-12 h-12 md:w-14 md:h-14 object-contain transition-transform duration-500 group-hover/item:scale-110">
                                        </div>

                                        <div
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-[var(--color-green-primary)] rounded-full flex items-center justify-center opacity-0 group-hover/item:opacity-100 transition-all duration-300 scale-50 group-hover/item:scale-100">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h3
                                            class="text-xs font-black text-[var(--color-txt-main)] group-hover/item:text-[var(--color-green-primary)] transition-colors tracking-tight">
                                            {{ $item['name'] }}
                                        </h3>
                                        <p
                                            class="text-[9px] font-bold text-[var(--color-txt-muted)] uppercase mt-1 tracking-widest opacity-70">
                                            {{ $item['desc'] }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="service-pagination flex justify-center gap-2 mt-6"></div>
                </div>

                <button
                    class="service-next absolute -right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-xl bg-white shadow-sm border border-[var(--color-green-border)] text-[var(--color-green-primary)] transition-all duration-300 hover:bg-[var(--color-green-primary)] hover:text-white hover:scale-105 hidden md:flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const reelsSwiper = new Swiper('.reelsSwiper', {
                slidesPerView: 2.7,
                spaceBetween: 12, // Jarak lebih rapat untuk mobile agar space tidak terbuang
                freeMode: true,
                pagination: false,
                navigation: {
                    nextEl: '.reels-swiper-next',
                    prevEl: '.reels-swiper-prev',
                },
                breakpoints: {
                    // Layar Tablet/HP Landscape (640px ke atas)
                    640: {
                        slidesPerView: 4.2,
                        spaceBetween: 16,
                    },
                    // Layar iPad/Tablet Portrait (768px ke atas)
                    768: {
                        slidesPerView: 5.2,
                        spaceBetween: 20,
                    },
                    // Layar Desktop/Mac (1024px ke atas)
                    1024: {
                        // Kembali menggunakan 'auto' agar mengikuti lebar CSS !w-[...] Anda
                        slidesPerView: 'auto',
                        spaceBetween: 16,
                    },
                },
            });

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
        });
    </script>
@endpush
