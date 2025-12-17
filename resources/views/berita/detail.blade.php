@extends('app')

@section('head')
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->isi), 150) }}" />
    <meta property="og:image" content="{{ asset('storage/' . $berita->gambar) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <style>
        .article-body {
            font-size: 1.125rem;
            line-height: 1.85;
            color: #374151;
            /* Membuat rata kiri-kanan yang rapi */
            text-align: justify;
            text-justify: inter-word;
            hyphens: auto;
        }

        .article-body p {
            margin-bottom: 1.5rem;
        }

        /* Mempercantik tulisan miring (Italic) dengan kutip otomatis */
        .article-body em,
        .article-body i {
            font-style: italic;
            color: #065f46;
            background-color: #f0fdf4;
            padding: 0 6px;
            border-radius: 4px;
        }

        .article-body em::before,
        .article-body i::before {
            content: '"';
            opacity: 0.4;
        }

        .article-body em::after,
        .article-body i::after {
            content: '"';
            opacity: 0.4;
        }

        .article-body strong,
        .article-body b {
            color: #111827;
            font-weight: 800;
        }

        /* Style untuk Badge Tags */
        .tag-item {
            display: inline-block;
            padding: 6px 14px;
            background-color: #f3f4f6;
            color: #4b5563;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 99px;
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .tag-item:hover {
            background-color: #ecfdf5;
            color: #059669;
            border-color: #10b981;
            transform: translateY(-2px);
        }

        /* Responsif Mobile: Ukuran teks dan perataan */
        @media (max-width: 640px) {
            .article-body {
                font-size: 1.05rem;
                line-height: 1.75;
                text-align: justify;
                /* Tetap rata kiri kanan di mobile */
            }

            /* Jika layar sangat kecil, matikan justify agar tidak renggang */
            @media (max-width: 380px) {
                .article-body {
                    text-align: left;
                }
            }
        }
    </style>
@endsection

@section('content')
    <section class="py-4 md:py-16 bg-white min-h-screen">
        <div class="container max-w-6xl mx-auto px-5 sm:px-8">

            <div class="flex flex-col lg:flex-row gap-10 xl:gap-16">

                <main class="w-full lg:w-[65%]">
                    <nav
                        class="flex overflow-x-auto pb-4 mb-6 md:mb-10 text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-gray-400 no-scrollbar">
                        <ol class="inline-flex items-center space-x-2 whitespace-nowrap">
                            <li><a href="{{ route('beranda') }}" class="hover:text-emerald-600 transition-colors">Home</a>
                            </li>
                            <li class="text-gray-300">/</li>
                            <li><a href="{{ route('berita.index') }}"
                                    class="hover:text-emerald-600 transition-colors">Berita</a></li>
                            <li class="text-gray-300">/</li>
                            <li class="text-emerald-600">Detail</li>
                        </ol>
                    </nav>

                    <header class="mb-8 md:mb-10">
                        <div class="flex items-center gap-3 mb-4 md:mb-6">
                            <span class="w-10 md:w-12 h-[3px] bg-emerald-500 rounded-full"></span>
                            <span class="text-[10px] md:text-xs font-black text-emerald-600 uppercase tracking-widest">
                                {{ $berita->kategori->kategori ?? 'Update Terkini' }}
                            </span>
                        </div>

                        <h1
                            class="text-xl md:text-4xl font-black text-gray-900 leading-snug md:leading-[1.15] mb-6 md:mb-8 tracking-tight">
                            {{ $berita->judul }}
                        </h1>

                        <div class="py-6 border-y border-gray-100">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($berita->user->name ?? 'K') }}&background=10b981&color=fff"
                                        class="w-10 h-10 md:w-12 md:h-12 rounded-full ring-4 ring-emerald-50">
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-gray-900 truncate">{{ $berita->user->name ?? 'Admin Kemenag' }}
                                    </p>
                                    <p
                                        class="text-gray-400 text-[10px] md:text-[11px] font-bold uppercase tracking-widest leading-relaxed">
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y | H:i') }}
                                        WIT
                                        <span class="mx-1 text-gray-300">•</span>
                                        {{ number_format($berita->views) }} Kali Dilihat
                                    </p>
                                </div>
                            </div>
                        </div>
                    </header>

                    <figure class="mb-8 md:mb-10">
                        <div class="rounded-2xl md:rounded-3xl overflow-hidden shadow-xl shadow-emerald-900/5 bg-gray-50">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-auto object-cover">
                        </div>
                    </figure>

                    <div class="article-body px-1">
                        {!! $berita->isi !!}
                    </div>

                    @if ($berita->multi_gambar)
                        <section class="mt-16 pt-10 border-t border-gray-100">
                            <div class="flex items-center gap-3 mb-8 justify-center">
                                <span class="h-px w-8 bg-gray-200"></span>
                                <h3 class="text-[10px] md:text-xs font-black text-gray-400 uppercase tracking-[0.3em]">
                                    Dokumentasi Galeri
                                </h3>
                                <span class="h-px w-8 bg-gray-200"></span>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-4">
                                @foreach ($berita->multi_gambar as $image)
                                    <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery"
                                        data-caption="Dokumentasi: {{ $berita->judul }}"
                                        class="group relative aspect-[4/3] rounded-xl md:rounded-2xl overflow-hidden bg-gray-100 shadow-sm block">

                                        <img src="{{ asset('storage/' . $image) }}" alt="Dokumentasi"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                                        <div
                                            class="absolute inset-0 bg-emerald-900/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-white/90 text-emerald-600 flex items-center justify-center shadow-lg transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                                <i class="fas fa-expand-alt"></i>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if ($berita->caption_berita)
                        <div class="mt-8 pt-6 border-t border-dashed border-gray-200">
                            <p class="text-[11px] md:text-xs text-gray-500 leading-relaxed font-medium">
                                <span class="inline-block w-6 h-[1px] bg-emerald-300 mr-2 align-middle"></span>
                                {{ $berita->caption_berita }}
                            </p>
                        </div>
                    @endif

                    <div class="mt-12 pt-8 border-t border-gray-100">
                        @if ($berita->tags)
                            <div class="mb-8">
                                <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-4">Tags Terkait:
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($berita->tags as $tag)
                                        <a href="{{ route('berita.index', ['tag' => $tag->nama]) }}" class="tag-item">
                                            #{{ $tag->nama }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div
                            class="bg-gray-50 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div class="text-center sm:text-left">
                                <p class="text-sm font-bold text-gray-900 mb-1">Sukai artikel ini?</p>
                                <p class="text-xs text-gray-500">Bagikan informasi ini kepada rekan Anda.</p>
                            </div>

                            <div class="flex items-center gap-3">
                                @php
                                    $shareUrl = urlencode(url()->current());
                                    $shareText = urlencode($berita->judul);
                                @endphp

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"
                                    class="w-10 h-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-lg shadow-blue-200">
                                    <i class="fab fa-facebook-f text-xs"></i>
                                </a>

                                <a href="https://api.whatsapp.com/send?text={{ $shareText }}%20{{ $shareUrl }}"
                                    target="_blank"
                                    class="w-10 h-10 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-lg shadow-green-200">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>

                                <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}"
                                    target="_blank"
                                    class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center hover:scale-110 transition-transform shadow-lg shadow-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.055-4.425 5.055H.316l5.733-6.55L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>

                <aside class="w-full lg:w-[32%] mt-16 lg:mt-0">
                    <div class="sticky top-10 space-y-12 px-1">
                        <section>
                            <h3
                                class="text-sm font-black text-gray-900 uppercase tracking-[0.2em] mb-8 border-b border-gray-100 pb-4 flex items-center gap-3">
                                <span class="relative flex h-2 w-2">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                Trending
                            </h3>

                            <div class="space-y-6">
                                @foreach ($beritasPopuler as $popular)
                                    <a href="{{ route('berita.detail', $popular->slug) }}"
                                        class="group flex gap-4 items-center">
                                        <div class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden shadow-sm">
                                            <img src="{{ asset('storage/' . $popular->gambar) }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                        <div class="flex-1">
                                            <h4
                                                class="text-xs md:text-sm font-bold text-gray-800 leading-snug group-hover:text-emerald-600 line-clamp-2">
                                                {{ $popular->judul }}</h4>
                                            <p
                                                class="text-[9px] font-black text-emerald-600 mt-1 uppercase tracking-tighter">
                                                {{ number_format($popular->views) }} Views</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </section>

                        <section class="bg-gray-50 rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm">
                            <h3
                                class="text-gray-900 font-black mb-6 md:mb-8 text-[11px] uppercase tracking-[0.2em] text-center">
                                Akses Cepat</h3>
                            <div class="grid grid-cols-3 gap-y-6 gap-x-2">
                                @php
                                    $layanan = [
                                        ['n' => 'Mooc', 'img' => 'moc.jpg', 'url' => '#'],
                                        ['n' => 'Quran', 'img' => 'quran-digital.png', 'url' => '#'],
                                        ['n' => 'EMIS', 'img' => 'emis.png', 'url' => '#'],
                                        ['n' => 'Simdumas', 'img' => 'sindumas.png', 'url' => '#'],
                                        ['n' => 'Lapor', 'img' => 'lapor.jpeg', 'url' => '#'],
                                        ['n' => 'Srikandi', 'img' => 'srikandi.png', 'url' => '#'],
                                    ];
                                @endphp
                                @foreach ($layanan as $l)
                                    <a href="{{ $l['url'] }}" class="flex flex-col items-center group">
                                        <div
                                            class="w-12 h-12 rounded-full bg-white p-1 shadow-sm border border-gray-100 flex items-center justify-center overflow-hidden mb-2 group-hover:scale-110 transition-transform">
                                            <img src="{{ asset('assets/img/layanan/' . $l['img']) }}"
                                                alt="{{ $l['n'] }}"
                                                class="w-full h-full object-contain rounded-full">
                                        </div>
                                        <span
                                            class="text-[9px] font-bold text-gray-700 text-center leading-tight">{{ $l['n'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </section>

                        <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-white">
                            <div class="swiper bannersidebarSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/banner.jpeg') }}" alt="Banner 1">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('assets/img/banner2.jpeg') }}" alt="Banner 2">
                                    </div>
                                </div>

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="py-16 border-t border-gray-100 bg-gray-50/40">
        <div class="container max-w-6xl mx-auto px-6 sm:px-8">
            <div class="flex items-center justify-between mb-10">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight italic">
                    Berita <span class="text-emerald-600">Terkait</span>
                </h3>
                <a href="{{ route('berita.index') }}"
                    class="hidden sm:flex items-center gap-2 text-[10px] font-black uppercase text-gray-400 hover:text-emerald-600 transition-colors">
                    Lihat Semua <i class="fas fa-chevron-right text-[8px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($beritasTerkait as $terkait)
                    <article
                        class="group bg-white rounded-2xl p-3 shadow-sm hover:shadow-xl transition-all border border-gray-100">
                        <a href="{{ route('berita.detail', $terkait->slug) }}" class="block">
                            <div class="relative aspect-video rounded-xl overflow-hidden mb-4">
                                <img src="{{ asset('storage/' . $terkait->gambar) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute top-2 left-2">
                                    <span
                                        class="px-2 py-1 bg-emerald-600 text-white text-[8px] font-bold uppercase rounded shadow-lg">
                                        {{ $terkait->kategori->kategori ?? 'Update' }}
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-3 px-1 pb-2">
                                <div
                                    class="flex items-center gap-2 text-[9px] font-bold text-gray-400 uppercase tracking-widest">
                                    <span>{{ \Carbon\Carbon::parse($terkait->tanggal)->translatedFormat('d M Y') }}</span>
                                    <span class="text-emerald-500/40">•</span>
                                    <span>{{ number_format($terkait->views) }} Views</span>
                                </div>
                                <h4
                                    class="text-sm font-bold text-gray-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                    {{ $terkait->judul }}
                                </h4>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="mt-8 sm:hidden">
                <a href="{{ route('berita.index') }}"
                    class="flex items-center justify-center py-4 bg-white border border-gray-200 rounded-xl text-[10px] font-black uppercase text-gray-600">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiperSidebar = new Swiper('.bannersidebarSwiper', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                effect: 'fade', // Efek transisi halus (opsional)
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>
@endpush
