@extends('app')

@section('head')
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->isi), 150) }}" />
    <meta property="og:image" content="{{ asset('storage/' . $berita->gambar) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <style>
        .article-body {
            font-size: 1.1rem;
            line-height: 1.85;
            color: #374151;
        }

        .article-body p {
            text-align: justify;
            text-justify: inter-word;
            margin-bottom: 1.5rem;
        }

        .article-body em,
        .article-body i {
            font-style: italic;
            color: #059669;
            background-color: #f0fdf4;
            padding: 0 4px;
            border-radius: 4px;
        }

        .article-body strong,
        .article-body b {
            color: #111827;
            font-weight: 800;
        }

        @media (max-width: 640px) {
            .article-body p {
                text-align: left;
            }
        }
    </style>
@endsection

@section('content')
    <section class="py-8 md:py-16 bg-[#ffffff] min-h-screen">
        <div class="container max-w-6xl mx-auto px-5 sm:px-8">

            <nav class="flex mb-10 text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.15em] text-gray-400">
                <ol class="inline-flex items-center space-x-2">
                    <li><a href="{{ route('beranda') }}" class="hover:text-emerald-600 transition-colors">Home</a></li>
                    <li class="text-gray-300">/</li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-emerald-600 transition-colors">News</a></li>
                    <li class="text-gray-300">/</li>
                    <li class="text-emerald-600">Detail</li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-12 xl:gap-16">

                <main class="w-full lg:w-[65%]">
                    <header class="mb-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-12 h-[3px] bg-emerald-500 rounded-full"></span>
                            <span class="text-xs font-black text-emerald-600 uppercase tracking-widest">
                                {{ $berita->kategori->nama ?? 'Update Terkini' }}
                            </span>
                        </div>

                        <h1 class="text-3xl md:text-5xl font-black text-gray-900 leading-[1.2] mb-8 tracking-tight">
                            {{ $berita->judul }}
                        </h1>

                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between py-6 border-y border-gray-100 gap-6">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($berita->user->name ?? 'K') }}&background=10b981&color=fff"
                                    class="w-12 h-12 rounded-full ring-2 ring-emerald-50">
                                <div class="text-sm">
                                    <p class="font-bold text-gray-900">{{ $berita->user->name ?? 'Admin Kemenag' }}</p>
                                    <p class="text-gray-400 text-[11px] font-bold uppercase tracking-widest">
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }} •
                                        {{ number_format($berita->views) }} Views
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <span
                                    class="text-[10px] font-black uppercase text-gray-400 tracking-widest mr-2">Bagikan:</span>

                                @php
                                    // Mengambil 100 karakter pertama dari berita untuk teks pratinjau
                                    $previewText = Str::limit(strip_tags($berita->isi), 100);
                                    // Menyusun pesan lengkap
                                    $shareMessage =
                                        $berita->judul .
                                        "\n\n" .
                                        $previewText .
                                        "\n\nBaca selengkapnya di link berikut: " .
                                        url()->current();
                                @endphp

                                {{-- Facebook --}}
                                {{-- Facebook biasanya otomatis menarik preview dari Meta Tag OG, jadi link saja cukup --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank"
                                    class="w-9 h-9 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fab fa-facebook-f text-xs"></i>
                                </a>

                                {{-- WhatsApp --}}
                                {{-- Di WhatsApp kita masukkan pesan lengkap yang sudah disusun --}}
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($shareMessage) }}" target="_blank"
                                    class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fab fa-whatsapp text-sm"></i>
                                </a>

                                {{-- Twitter / X --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->judul . ' - ' . $previewText . '...') }}"
                                    target="_blank"
                                    class="w-9 h-9 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center hover:scale-110 transition-transform shadow-sm">
                                    <i class="fab fa-twitter text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </header>

                    <figure class="mb-12">
                        <div class="rounded-3xl overflow-hidden shadow-2xl shadow-emerald-900/5 bg-gray-50">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-auto object-cover">
                        </div>
                        @if ($berita->caption_berita)
                            <figcaption class="mt-5 text-sm text-gray-500 text-center italic font-medium px-10">
                                &ldquo; {{ $berita->caption_berita }} &rdquo;
                            </figcaption>
                        @endif
                    </figure>

                    <div class="article-body prose prose-emerald max-w-none">
                        {!! $berita->isi !!}
                    </div>

                    @if ($berita->multi_gambar)
                        <section class="mt-20 pt-10 border-t border-gray-100">
                            <h3 class="text-xs font-black text-gray-400 mb-8 uppercase tracking-[0.3em] text-center">
                                Dokumentasi Galeri
                            </h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                @foreach ($berita->multi_gambar as $image)
                                    <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery"
                                        class="aspect-[4/3] rounded-2xl overflow-hidden bg-gray-100 group shadow-sm border border-gray-50">
                                        <img src="{{ asset('storage/' . $image) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </main>

                <aside class="w-full lg:w-[32%]">
                    <div class="sticky top-10 space-y-12">

                        <section>
                            <h3
                                class="text-xs font-black text-emerald-600 uppercase tracking-[0.2em] mb-8 flex items-center gap-3">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                                Trending
                            </h3>
                            <div class="space-y-10">
                                @foreach ($beritasPopuler as $index => $popular)
                                    <a href="{{ route('berita.detail', $popular->slug) }}"
                                        class="group flex gap-5 items-start">
                                        <span
                                            class="text-4xl font-black text-gray-100 group-hover:text-emerald-500 transition-colors leading-none italic">
                                            {{ $index + 1 }}
                                        </span>
                                        <div>
                                            <h4
                                                class="text-sm font-bold text-gray-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                                {{ $popular->judul }}
                                            </h4>
                                            <span
                                                class="text-[10px] font-bold text-gray-300 uppercase mt-2 block tracking-widest">{{ number_format($popular->views) }}
                                                Views</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </section>

                        <section class="bg-gray-50 rounded-[2.5rem] p-8 border border-gray-100 shadow-sm">
                            <h3 class="text-gray-900 font-black mb-8 text-[11px] uppercase tracking-[0.2em] text-center">
                                Akses Cepat</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-8 gap-x-4">
                                @php
                                    $layanan = [
                                        ['n' => 'Mooc Pintar', 'img' => 'moc.jpg', 'url' => '#'],
                                        ['n' => 'Quran Digital', 'img' => 'quran-digital.png', 'url' => '#'],
                                        ['n' => 'EMIS', 'img' => 'emis.png', 'url' => '#'],
                                        ['n' => 'Simdumas', 'img' => 'sindumas.png', 'url' => '#'],
                                        ['n' => 'Lapor', 'img' => 'lapor.jpeg', 'url' => '#'],
                                        ['n' => 'Srikandi', 'img' => 'srikandi.png', 'url' => '#'],
                                    ];
                                @endphp
                                @foreach ($layanan as $l)
                                    <a href="{{ $l['url'] }}" class="flex flex-col items-center group">
                                        <div
                                            class="w-14 h-14 rounded-full bg-white p-1 shadow-sm group-hover:shadow-md group-hover:scale-110 transition-all border border-gray-100 flex items-center justify-center overflow-hidden mb-2">
                                            <img src="{{ asset('assets/img/layanan/' . $l['img']) }}"
                                                alt="{{ $l['n'] }}"
                                                class="w-full h-full object-contain rounded-full">
                                        </div>
                                        <span
                                            class="text-[10px] font-bold text-gray-700 text-center leading-tight">{{ $l['n'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </section>

                        <div class="rounded-3xl overflow-hidden shadow-lg border-4 border-white group">
                            <img src="{{ asset('assets/img/banner.jpeg') }}" alt="Banner"
                                class="w-full h-auto group-hover:scale-105 transition-transform duration-700">
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
