@extends('app')

@section('css')
    <style>
        /* .container { */
        /* max-width: 1200px; */
        /* margin: 0 auto; */
        /* padding: 0 0px; */
        /* } */

        /* Styling Pagination (Titik-titik) */
        .main-banner-pagination.swiper-pagination-bullets {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .main-banner-pagination .swiper-pagination-bullet {
            background-color: #ffffff;
            opacity: 0.8;
        }

        .main-banner-pagination .swiper-pagination-bullet-active {
            background-color: #059669;
        }

        .headingnews-mobile-pagination .swiper-pagination-bullet {
            background-color: #d1d5db;
            /* Abu-abu terang */
            opacity: 1;
            width: 8px;
            height: 8px;
        }

        .headingnews-mobile-pagination .swiper-pagination-bullet-active {
            background-color: #059669;
            /* emerald-600 */
        }

        /* container full width untuk desktop */
        @media (min-width: 768px) {
            .container {
                /* max-width: 1200px; */
                margin: 0 auto;
                padding: 0 0px;
            }
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
                        <span
                            class="text-xs font-bold tracking-widest uppercase">{{ $jadwal['lokasi'] ?? 'PULAU MOROTAI' }}</span>
                    </div>
                    <div class="hidden lg:block text-[11px] text-emerald-200/70 font-medium">
                        <i class="fa-regular fa-clock mr-1"></i>
                        {{ $jadwal['tanggal'] ?? now()->translatedFormat('d F Y') }}
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    @php
                        $sholat = [
                            ['n' => 'Subuh', 'v' => $jadwalSholat['jadwal']['subuh'], 'i' => 'fa-mosque'],
                            ['n' => 'Dzuhur', 'v' => $jadwalSholat['jadwal']['dzuhur'], 'i' => 'fa-sun'],
                            ['n' => 'Ashar', 'v' => $jadwalSholat['jadwal']['ashar'], 'i' => 'fa-cloud-sun'],
                            ['n' => 'Maghrib', 'v' => $jadwalSholat['jadwal']['maghrib'], 'i' => 'fa-moon'],
                            ['n' => 'Isya', 'v' => $jadwalSholat['jadwal']['isya'], 'i' => 'fa-star'],
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

    <section class="modern-news py-12 md:py-16 px-4 sm:px-6 bg-white">
        <div class="container mx-auto max-w-7xl">

            <div class="featured-layout grid grid-cols-1 lg:grid-cols-4 gap-8 md:gap-10">

                <div class="lg:col-span-3 space-y-8 md:space-y-10">

                    <div class="hidden lg:block">
                        <div class="swiper headingnews-desktop">
                            <div class="swiper-wrapper">
                                @foreach ($beritaPilihan as $berita)
                                    <div class="swiper-slide">
                                        <article class="relative group h-[450px] overflow-hidden rounded-2xl shadow-xl">

                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                class="absolute inset-y-0 right-0 w-[90%] h-full object-cover rounded-xl">

                                            <div
                                                class="absolute top-8 left-8 w-[55%] bg-white/95 backdrop-blur-lg p-8 rounded-xl shadow-2xl border border-gray-100 flex flex-col gap-4">

                                                <div class="flex items-center gap-2 text-gray-600 text-sm">
                                                    <img src="{{ asset('assets/img/logokemenag.png') }}"
                                                        class="w-5 h-5 opacity-80" alt="">
                                                    <span class="font-medium text-gray-800">Kemenag News</span>
                                                    <span class="text-gray-400">•</span>
                                                    <span class="text-gray-500">
                                                        {{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                                        class="hover:text-emerald-600 transition-colors">
                                                        {{ $berita->judul }}
                                                    </a>
                                                </h1>

                                                <p class="text-gray-700 text-base leading-relaxed line-clamp-3">
                                                    {{ Str::limit(strip_tags($berita->isi), 200) }}
                                                </p>

                                                <a href="{{ route('berita.detail', $berita->slug) }}"
                                                    class="text-emerald-600 font-semibold flex items-center gap-1 text-sm">
                                                    Read More
                                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                                </a>

                                                <div
                                                    class="text-gray-500 text-sm flex items-center justify-between mt-2 pt-2 border-t border-gray-100">
                                                    <span>{{ $berita->created_at->format('M d, Y') }}</span>
                                                    <div class="flex items-center gap-2">
                                                        <button
                                                            class="text-gray-400 hover:text-gray-600 transition-colors headingnews-prev">
                                                            <i class="fa-solid fa-chevron-left text-xs"></i>
                                                        </button>
                                                        <button
                                                            class="text-emerald-600 hover:text-emerald-700 transition-colors headingnews-next">
                                                            <i class="fa-solid fa-chevron-right text-xs"></i>
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


                    <div class="lg:hidden">
                        <div class="swiper headingnews-mobile">
                            <div class="swiper-wrapper">
                                @foreach ($beritasPilihan as $berita)
                                    <div class="swiper-slide">
                                        <article class="relative group h-96 overflow-hidden rounded-xl shadow-lg">

                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            <div class="absolute inset-0 bg-black/40"></div>

                                            <div
                                                class="absolute bottom-0 left-0 p-6 flex flex-col justify-end h-full w-full">

                                                <div class="flex items-center gap-2 text-white text-xs mb-2">
                                                    <span class="font-medium">Kemenag News</span>
                                                    <span class="text-white/70">•</span>
                                                    <span class="text-white/70">
                                                        {{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <h1 class="text-xl font-bold text-white leading-snug line-clamp-3">
                                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                                        class="hover:text-emerald-600 transition-colors">
                                                        {{ $berita->judul }}
                                                    </a>
                                                </h1>

                                                <a href="{{ route('berita.detail', $berita->slug) }}"
                                                    class="text-emerald-600 font-semibold flex items-center gap-1 text-sm mt-3">
                                                    Read More
                                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                                </a>

                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>

                            <div class="swiper-pagination headingnews-mobile-pagination mt-4"></div>
                        </div>
                    </div>

                </div>

                <aside class="lg:col-span-1 mt-6 lg:mt-0">
                    <div class="sticky top-20">
                        <div class="flex items-center justify-between mb-5 pb-3 border-b-2 border-emerald-600">
                            <h3 class="text-xl font-extrabold text-gray-900">Trending Now</h3>
                            <i class="fa-solid fa-arrow-trend-up text-emerald-600 text-lg"></i>
                        </div>

                        <div class="space-y-4">
                            @foreach ($beritasPilihan as $post)
                                <article
                                    class="group flex gap-3 items-start p-2 rounded-lg hover:bg-green-50 transition-colors duration-300">
                                    <span
                                        class="flex-shrink-0 text-xl font-black text-emerald-600 group-hover:text-emerald-500 transition-colors duration-300 w-6 text-center">
                                        {{ $loop->iteration }}
                                    </span>

                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs font-semibold text-emerald-600 uppercase tracking-wider">
                                            {{ $post->kategori->kategori }}
                                        </span>
                                        <h4
                                            class="text-base font-bold text-gray-900 mt-0.5 mb-1 group-hover:text-emerald-600 transition-colors duration-300 line-clamp-2">
                                            <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->judul }}</a>
                                        </h4>
                                        <div class="flex items-center justify-between text-xs text-gray-500 mt-1">
                                            <span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                            <span class="flex items-center">
                                                <i class="fa-solid fa-eye mr-1 text-xs"></i>
                                                {{ number_format(rand(1000, 10000)) }}
                                            </span>
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

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-8 md:py-10">

        <div
            class="relative w-full
               h-[120px] sm:h-[180px] md:h-[235px] lg:h-[260px] rounded-2xl shadow-2xl overflow-hidden
               bg-gradient-to-r from-emerald-50/70 to-white border border-gray-100/50">

            <div class="swiper mainBannerSwiper w-full h-full">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/banner-hab.png') }}" alt="Banner 1"
                            class="w-full h-full object-contain">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/banner-hab.png') }}" alt="Banner 2"
                            class="w-full h-full object-contain">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/banner-hab.png') }}" alt="Banner 3"
                            class="w-full h-full object-contain">
                    </div>
                </div>

                <div class="swiper-pagination main-banner-pagination"></div>
            </div>

            <button
                class="main-banner-prev absolute left-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 md:w-10 md:h-10 rounded-full
                   bg-white/70 shadow-xl flex items-center justify-center transition-all duration-300
                   hover:bg-white hover:scale-105 group hidden md:flex">
                <i
                    class="fas fa-chevron-left text-emerald-600 group-hover:text-emerald-700 transition-colors text-base"></i>
            </button>

            <button
                class="main-banner-next absolute right-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 md:w-10 md:h-10 rounded-full
                   bg-white/70 shadow-xl flex items-center justify-center transition-all duration-300
                   hover:bg-white hover:scale-105 group hidden md:flex">
                <i
                    class="fas fa-chevron-right text-emerald-600 group-hover:text-emerald-700 transition-colors text-base"></i>
            </button>

        </div>
    </section>

    <section class="bg-white py-12 md:py-16 px-4 sm:px-6">
        <div class="container mx-auto max-w-7xl">

            <div class="mb-10 md:mb-12">
                <div class="flex flex-col items-start">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                        Berita Terkini
                    </h2>
                    <p class="text-sm md:text-base text-gray-600 max-w-lg">
                        Berita terkini seputar Kementerian Agama Kabupaten Morotai
                    </p>
                    <div class="h-0.5 w-16 bg-gradient-to-r from-emerald-500 to-emerald-700 rounded-full mt-1"></div>
                </div>
            </div>


            <div class="flex flex-col lg:flex-row gap-10">

                <div class="lg:w-2/3">

                    @if ($beritaPopuler)
                        <div class="mb-10 pb-8 border-b border-gray-100">
                            <a href="{{ route('berita.detail', $beritaPopuler->slug) }}" class="group block">

                                <div class="mb-3">
                                    <span class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Berita Utama
                                    </span>
                                </div>

                                <div class="mb-5">
                                    <img src="{{ asset('storage/' . $beritaPopuler->gambar) }}"
                                        alt="{{ $beritaPopuler->judul }}"
                                        class="w-full h-64 md:h-80 object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                </div>

                                <h1
                                    class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                    {{ $beritaPopuler->judul }}
                                </h1>

                                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($beritaPopuler->isi), 150) }}
                                </p>

                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs md:text-sm text-gray-500">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="font-medium">{{ $beritaPopuler->user->name }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-medium">{{ $beritaPopuler->created_at->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-medium">{{ $beritaPopuler->created_at->format('H:i') }}
                                            WIB</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
                        @foreach ($beritasPopuler as $index => $berita)
                            @if ($index > 0 && $index < 5)
                                <div class="pb-2">
                                    <a href="{{ route('berita.detail', $berita->slug) }}" class="group">
                                        <div class="flex gap-4">

                                            <div
                                                class="flex-shrink-0 w-28 h-20 sm:w-32 sm:h-24 overflow-hidden rounded-lg shadow-sm">
                                                <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                    alt="{{ $berita->judul }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            </div>

                                            <div class="flex-1">
                                                <h3
                                                    class="text-base font-bold text-gray-900 group-hover:text-emerald-600 transition-colors line-clamp-2 mb-1">
                                                    {{ $berita->judul }}
                                                </h3>
                                                <div class="flex flex-col text-xs text-gray-500 mt-1">
                                                    <span
                                                        class="font-semibold text-emerald-600">{{ $berita->kategori->kategori }}</span>
                                                    <span class="mt-1">{{ $berita->created_at->format('d F Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="lg:w-1/3 mt-6 lg:mt-0">

                    <div class="sticky top-20 space-y-10">

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                            <h3 class="font-bold text-xl text-gray-900 mb-4 pb-2 border-b-2 border-emerald-600">Kategori
                            </h3>
                            <div class="space-y-2">
                                @foreach ($kategories as $kategori)
                                    <a href="#"
                                        class="flex justify-between items-center px-3 py-1.5 hover:bg-emerald-50 text-gray-700 hover:text-emerald-800 rounded-lg transition-colors">
                                        <span class="font-medium text-sm">{{ $kategori->kategori }}</span>
                                        <span
                                            class="text-xs bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">{{ $kategori->beritas_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                            <h3 class="font-bold text-xl text-gray-900 mb-4 pb-2 border-b-2 border-emerald-600">Berita
                                Populer</h3>
                            <div class="space-y-4">
                                @foreach ($beritasPopuler as $index => $berita)
                                    <div
                                        class="flex items-start gap-3 pb-3 border-b border-gray-100 last:border-0 last:pb-0">
                                        <div
                                            class="flex-shrink-0 w-6 h-6 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xs font-extrabold shadow-md mt-1">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <a href="{{ route('berita.detail', $berita->slug) }}" class="block">
                                                <h4
                                                    class="font-semibold text-sm text-gray-900 hover:text-emerald-700 transition-colors line-clamp-2 mb-0.5">
                                                    {{ $berita->judul }}
                                                </h4>
                                            </a>
                                            <div class="flex items-center gap-2 text-xs text-gray-500">
                                                <span>{{ $berita->created_at->format('d M') }}</span>
                                                <span>•</span>
                                                <span class="font-medium">{{ $berita->dibaca ?? rand(100, 1000) }}x
                                                    dibaca</span>
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
        <div class="relative">

            <div class="absolute inset-y-0 left-0 flex items-center z-10 -translate-x-1/2 hidden md:flex">
                <button
                    class="video-prev bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-xl border border-gray-100 transition-all duration-200 hover:bg-emerald-600 hover:text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 sm:h-6 sm:w-6 text-gray-800 transition-colors group-hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <div class="swiper video-slider">
                <div class="swiper-wrapper">
                    @foreach ($playLists as $playList)
                        <div class="swiper-slide">
                            <div class="overflow-hidden group">
                                <div class="aspect-video w-full relative cursor-pointer video-thumbnail overflow-hidden
                                        rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300"
                                    data-video-id="{{ $playList->youtube_id }}" onclick="loadYouTubeIframe(this)">

                                    <img src="https://img.youtube.com/vi/{{ $playList->youtube_id }}/maxresdefault.jpg"
                                        alt="{{ $playList->title }}" class="w-full h-full object-cover lazy"
                                        loading="lazy">

                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/50 transition-colors">
                                        <div
                                            class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center transition-all duration-300 transform group-hover:scale-110 shadow-lg">
                                            <i class="fa-solid fa-play text-emerald-600 text-xl pl-0.5"></i>
                                        </div>
                                    </div>

                                    <div
                                        class="absolute bottom-3 right-3 bg-black/70 text-white text-xs font-semibold px-2 py-1 rounded">
                                        5:30 </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="video-pagination mt-8"></div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center z-10 translate-x-1/2 hidden md:flex">
                <button
                    class="video-next bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-xl border border-gray-100 transition-all duration-200 hover:bg-emerald-600 hover:text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 sm:h-6 sm:w-6 text-gray-800 transition-colors group-hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-12">

            <div class="lg:w-2/3">

                <div class="flex items-center justify-between mb-6 pb-2 border-b-2 border-emerald-600">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-bullhorn text-emerald-700 text-base"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                            Pengumuman Terbaru
                        </h2>
                    </div>
                    <a href="/pengumuman"
                        class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 flex items-center transition-colors">
                        Lihat Semua
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>

                <div class="space-y-6 mt-8">
                    @if ($pengumumans->count() > 0)
                        @foreach ($pengumumans as $pengumuman)
                            <article
                                class="group bg-white border border-gray-100 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6">
                                <div class="flex flex-col md:flex-row md:items-start gap-6">

                                    <div class="flex-shrink-0">
                                        <div class="bg-emerald-600 text-white rounded-lg p-3 text-center w-20 shadow-md">
                                            <div class="text-2xl font-black leading-none">
                                                {{ $pengumuman->tanggal->format('d') }}</div>
                                            <div class="text-xs uppercase font-semibold mt-1">
                                                {{ $pengumuman->tanggal->format('M') }}</div>
                                            <div class="text-xs mt-0.5 opacity-80">{{ $pengumuman->tanggal->format('Y') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition-colors line-clamp-2">
                                            <a href="#">{{ $pengumuman->judul }}</a>
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-2">
                                            {{ Str::limit(strip_tags($pengumuman->isi), 120) }}
                                        </p>

                                        <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                            <div class="flex items-center text-xs font-medium text-gray-500">
                                                <i class="fa-solid fa-user-circle mr-1.5 text-emerald-500 text-sm"></i>
                                                <span class="text-gray-700">{{ $pengumuman->penulis }}</span>
                                            </div>
                                            <a href="#"
                                                class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 flex items-center">
                                                Baca selengkapnya
                                                <i
                                                    class="fa-solid fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-10 text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 rounded-full mb-4">
                                <i class="fa-solid fa-bullhorn text-emerald-700 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Tidak ada Pengumuman</h3>
                            <p class="text-gray-500 mb-6">Belum ada pengumuman resmi yang diterbitkan saat ini.</p>
                            <a href="/pengumuman"
                                class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-semibold transition-colors">
                                <i class="fa-solid fa-refresh mr-2"></i>
                                Periksa Arsip Pengumuman
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="lg:w-1/3 mt-6 lg:mt-0">
                <div class="sticky top-20">

                    <div class="flex items-center justify-between mb-6 pb-2 border-b-2 border-emerald-600">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                                <i class="fa-solid fa-file-lines text-emerald-700 text-base"></i>
                            </div>
                            <h2 class="text-xl md:text-2xl font-extrabold text-gray-900">
                                Dokumen Terbaru
                            </h2>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6">
                        @if ($dokumens->count() > 0)
                            <div class="space-y-4 pt-4">
                                @foreach ($dokumens as $dokumen)
                                    <div class="flex items-start gap-4 group">

                                        <div
                                            class="flex-shrink-0 w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center border border-emerald-100">
                                            @php
                                                $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                                                $icon = 'fa-file';
                                                $color = 'text-gray-600';

                                                if ($extension === 'pdf') {
                                                    $icon = 'fa-file-pdf';
                                                    $color = 'text-red-600';
                                                } elseif (in_array($extension, ['doc', 'docx'])) {
                                                    $icon = 'fa-file-word';
                                                    $color = 'text-blue-600';
                                                } elseif (in_array($extension, ['xls', 'xlsx'])) {
                                                    $icon = 'fa-file-excel';
                                                    $color = 'text-green-600'; // Tetap hijau untuk Excel
                                                } elseif (in_array($extension, ['ppt', 'pptx'])) {
                                                    $icon = 'fa-file-powerpoint';
                                                    $color = 'text-orange-600';
                                                } elseif (in_array($extension, ['zip', 'rar', '7z'])) {
                                                    $icon = 'fa-file-zipper';
                                                    $color = 'text-yellow-600';
                                                } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                    $icon = 'fa-file-image';
                                                    $color = 'text-purple-600';
                                                }
                                            @endphp
                                            <i class="fa-solid {{ $icon }} {{ $color }} text-lg"></i>
                                        </div>

                                        <div class="flex-1 min-w-0">
                                            <h4
                                                class="text-sm font-semibold text-gray-900 truncate group-hover:text-emerald-700 transition-colors">
                                                <a href="{{ asset('storage/' . $dokumen->file) }}"
                                                    target="_blank">{{ $dokumen->judul }}</a>
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1">
                                                <span class="text-emerald-600 font-medium">{{ $dokumen->kategori }}</span>
                                                •
                                                {{ \Carbon\Carbon::parse($dokumen->tanggal)->diffForHumans() }}
                                            </p>
                                        </div>

                                        <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank"
                                            class="flex-shrink-0 text-emerald-600 hover:text-emerald-700 transition-colors"
                                            title="Download"
                                            download="{{ Str::slug($dokumen->judul) }}.{{ $extension ?? 'pdf' }}">
                                            <i class="fa-solid fa-download text-sm"></i>
                                        </a>

                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 pt-4">
                                <div
                                    class="inline-flex items-center justify-center w-14 h-14 bg-emerald-100 rounded-full mb-4">
                                    <i class="fa-solid fa-file-circle-exclamation text-emerald-700 text-2xl"></i>
                                </div>
                                <h4 class="text-lg font-bold text-gray-700 mb-2">Tidak ada dokumen</h4>
                                <p class="text-gray-500 text-sm">Belum ada dokumen yang diunggah baru-baru ini.</p>
                            </div>
                        @endif

                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="/dokumen"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-emerald-100 hover:bg-emerald-200 text-emerald-800 font-semibold rounded-lg transition-colors shadow-sm">
                                <i class="fa-solid fa-folder-open mr-2"></i>
                                Lihat Semua Dokumen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">

        <div class="flex items-center justify-between mb-8 md:mb-10 pb-2 border-b-2 border-emerald-600">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 md:w-8 md:h-8 bg-emerald-600 rounded-lg flex items-center justify-center shadow-md">
                    <i class="fa-solid fa-camera-retro text-white text-sm md:text-base"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">
                    Galeri Desain
                </h2>
            </div>
            <a href="/galeri"
                class="text-base font-semibold text-emerald-600 hover:text-emerald-700 flex items-center transition-colors">
                Lihat Semua
                <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>

        <div class="relative">

            <div class="swiper gallerySwiper">
                <div class="swiper-wrapper">

                    @foreach ($galeries as $design)
                        <div class="swiper-slide">
                            <div class="rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300 group">
                                <a href="#"
                                    class="block bg-white rounded-xl overflow-hidden border border-gray-100">

                                    <div class="relative pt-[125%] overflow-hidden">
                                        <img src="{{ asset('storage/' . $design->gambar) }}"
                                            alt="{{ $design->caption }}"
                                            class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            loading="lazy">
                                    </div>

                                    <div class="p-3 text-center">
                                        <h3
                                            class="text-sm font-semibold text-gray-800 truncate group-hover:text-emerald-600 transition-colors">
                                            {{ $design->caption }}
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="gallery-pagination mt-6"></div>
            </div>

            <button
                class="gallery-prev absolute left-0 top-1/2 -mt-10 transform -translate-y-1/2 w-8 h-8 md:w-10 md:h-10 rounded-full
               bg-white/70 shadow-lg flex items-center justify-center hover:bg-white hover:opacity-100
               transition-all duration-300 z-10 opacity-90 hidden md:flex">
                <i class="fa-solid fa-chevron-left text-base md:text-lg text-emerald-600"></i>
            </button>

            <button
                class="gallery-next absolute right-0 top-1/2 -mt-10 transform -translate-y-1/2 w-8 h-8 md:w-10 md:h-10 rounded-full
               bg-white/70 shadow-lg flex items-center justify-center hover:bg-white hover:opacity-100
               transition-all duration-300 z-10 opacity-90 hidden md:flex">
                <i class="fa-solid fa-chevron-right text-base md:text-lg text-emerald-600"></i>
            </button>

        </div>
    </section>

    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12">

            @foreach ($beritasKategoriPopuler as $kategori)
                <div class="category-column">

                    <div class="flex items-center justify-between mb-6 pb-2 border-b-2 border-emerald-600">
                        <h3 class="text-xl font-extrabold text-gray-900 tracking-tight relative">
                            {{ strtoupper($kategori->kategori) }}
                        </h3>
                        <a href="#"
                            class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition-colors flex items-center">
                            Lainnya
                            <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>

                    <div class="space-y-6">

                        @if ($kategori->beritas->count() > 0)
                            @php $primaryPost = $kategori->beritas->first(); @endphp

                            <article class="primary-post group pb-6 border-b border-gray-100">
                                <a href="{{ route('berita.detail', $primaryPost->slug) }}"
                                    class="block overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 rounded-lg">
                                    <img src="{{ asset('storage/' . $primaryPost->gambar) }}"
                                        alt="{{ $primaryPost->judul }}"
                                        class="w-full object-cover aspect-video transform group-hover:scale-[1.05] transition-transform duration-500">
                                </a>

                                <h4
                                    class="mt-4 text-xl font-bold text-gray-900 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-3">
                                    <a
                                        href="{{ route('berita.detail', $primaryPost->slug) }}">{{ $primaryPost->judul }}</a>
                                </h4>

                                <p class="text-sm text-gray-500 mt-1">
                                    <i class="fa-regular fa-clock text-xs mr-1 text-emerald-500"></i>
                                    {{ \Carbon\Carbon::parse($primaryPost->created_at)->translatedFormat('l, d F Y') }}
                                </p>
                            </article>
                        @endif

                        <div class="space-y-4">
                            @foreach ($kategori->beritas->slice(1) as $secondaryPost)
                                <article
                                    class="secondary-post flex gap-4 items-start pb-4 border-b border-gray-100 last:border-b-0 last:pb-0">
                                    <a href="{{ route('berita.detail', $secondaryPost->slug) }}"
                                        class="flex-shrink-0 w-24 h-16 sm:w-28 sm:h-20 overflow-hidden rounded-md shadow-md">
                                        <img src="{{ asset('storage/' . $secondaryPost->gambar) }}"
                                            alt="{{ $secondaryPost->judul }}"
                                            class="w-full h-full object-cover transform hover:scale-[1.08] transition-transform duration-300">
                                    </a>

                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-sm font-semibold text-gray-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-3">
                                            <a
                                                href="{{ route('berita.detail', $secondaryPost->slug) }}">{{ $secondaryPost->judul }}</a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            <i class="fa-regular fa-calendar text-xs mr-1 text-emerald-500"></i>
                                            {{ \Carbon\Carbon::parse($secondaryPost->created_at)->translatedFormat('d M Y') }}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach

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

            const headingNewsMobile = new Swiper('.headingnews-mobile', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 500, // Lebih cepat di mobile
                effect: 'fade', // Gunakan fade untuk tampilan mobile yang bersih
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.headingnews-mobile-pagination',
                    clickable: true,
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
