@extends('app')

@section('head')
    <!-- Open Graph untuk WhatsApp / Facebook -->
    <meta property="og:title" content="{{ $berita->judul }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($berita->isi), 150) }}" />
    <meta property="og:image" content="{{ asset('storage/' . $berita->gambar) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $berita->judul }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->isi), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $berita->gambar) }}">
@endsection

@section('css')
    <style>
        /* Base Styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #374151;
        }

        /* Container */
        .container-news {
            max-width: 1200px;
        }

        /* Prose Styles */
        .prose {
            max-width: 100%;
            word-wrap: break-word;
            overflow-wrap: break-word;
            color: #4b5563;
        }

        .prose p {
            margin-bottom: 1.25em;
            font-size: 1rem;
            line-height: 1.7;
            text-align: justify;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1.25em;
            padding-left: 1.5em;
        }

        .prose ul {
            list-style-type: disc;
        }

        .prose ol {
            list-style-type: decimal;
        }

        .prose li {
            margin-bottom: 0.5em;
            color: #4b5563;
        }

        .prose img {
            border-radius: 0.5rem;
            margin: 1.5em 0;
            max-width: 100%;
            height: auto;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.05);
        }

        .prose h2 {
            font-size: 1.375rem;
            font-weight: 600;
            margin: 1.5em 0 0.75em;
            color: #111827;
            line-height: 1.3;
        }

        .prose h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin: 1.25em 0 0.5em;
            color: #111827;
            line-height: 1.4;
        }

        .prose blockquote {
            border-left: 3px solid #10b981;
            padding-left: 1em;
            margin: 1.25em 0;
            font-style: italic;
            color: #4b5563;
        }

        /* News Detail Header */
        .news-header {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        /* Featured Image */
        .featured-image {
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .featured-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Tags */
        .tag {
            display: inline-block;
            background-color: #e5e7eb;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #374151;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s;
        }

        .tag:hover {
            background-color: #d1fae5;
            color: #065f46;
        }

        /* Share Buttons */
        .share-btn {
            width: 2rem;
            height: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 0.875rem;
            transition: transform 0.2s;
            margin-right: 0.5rem;
        }

        .share-btn:hover {
            transform: scale(1.1);
        }

        /* Related News */
        .related-news {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .related-news-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 1rem;
        }

        .news-card {
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .news-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .news-card-img-container {
            height: 120px;
            overflow: hidden;
        }

        .news-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .news-card:hover .news-card-img {
            transform: scale(1.05);
        }

        .news-card-body {
            padding: 0.75rem;
        }

        /* Breadcrumb */
        .breadcrumb {
            font-size: 0.875rem;
            display: flex;
            flex-wrap: wrap;
            padding: 0.5rem 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
        }

        .breadcrumb-item:not(:last-child):after {
            content: "/";
            margin: 0 0.5rem;
            color: #9ca3af;
        }

        .breadcrumb-link {
            color: #6b7280;
            transition: color 0.2s;
        }

        .breadcrumb-link:hover {
            color: #10b981;
        }

        .breadcrumb-active {
            color: #10b981;
            font-weight: 500;
        }

        /* News title */
        .news-title {
            font-size: 1.5rem;
            line-height: 1.3;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.75rem;
        }

        /* Meta info */
        .meta-info {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .meta-item {
            display: flex;
            align-items: center;
        }

        .meta-icon {
            margin-right: 0.25rem;
            color: #10b981;
        }

        /* Share section */
        .share-section {
            margin: 1.5rem 0;
            padding: 1rem 0;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
        }

        .share-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-right: 0.75rem;
        }

        /* Responsive adjustments */
        @media (min-width: 640px) {
            .prose p {
                font-size: 1.05rem;
            }

            .news-title {
                font-size: 1.75rem;
            }

            .news-card-img-container {
                height: 140px;
            }

            .related-news-title {
                font-size: 1.375rem;
            }
        }

        @media (min-width: 768px) {
            .news-title {
                font-size: 2rem;
            }

            .prose h2 {
                font-size: 1.5rem;
            }

            .prose h3 {
                font-size: 1.25rem;
            }

            .news-card-img-container {
                height: 150px;
            }

            .related-news {
                margin-top: 3rem;
            }
        }

        @media (min-width: 1024px) {
            .news-title {
                font-size: 2.25rem;
            }

            .prose {
                font-size: 1.05rem;
            }

            .news-card-img-container {
                height: 160px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Detail Berita Section -->
    <section class="py-8 bg-white">
        <div class="container container-news mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Breadcrumb -->
                    <nav class="breadcrumb" aria-label="Breadcrumb">
                        <div class="breadcrumb-item">
                            <a href="{{ route('beranda') }}" class="breadcrumb-link">
                                <i class="fas fa-home mr-1"></i> Beranda
                            </a>
                        </div>
                        <div class="breadcrumb-item">
                            <a href="{{ route('berita.index') }}" class="breadcrumb-link">Berita</a>
                        </div>
                        <div class="breadcrumb-item">
                            <span class="breadcrumb-active">Detail</span>
                        </div>
                    </nav>

                    <!-- News Header -->
                    <div class="news-header">
                        <!-- Judul -->
                        <h1 class="news-title">{{ $berita->judul }}</h1>

                        <!-- Meta Info -->
                        <div class="meta-info">
                            <span class="meta-item">
                                <i class="far fa-calendar-alt meta-icon"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </span>
                            <span class="meta-item">
                                <i class="far fa-user meta-icon"></i>
                                {{ $berita->user->name ?? 'Admin' }}
                            </span>
                            <span class="meta-item">
                                <i class="far fa-eye meta-icon"></i>
                                {{ number_format($berita->views, 0, ',', '.') }} Dilihat
                            </span>
                            {{-- <span class="meta-item">
                                <i class="far fa-clock meta-icon"></i>
                                {{ $berita->reading_time }} menit baca
                            </span> --}}
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <figure class="featured-image">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full">
                    </figure>

                    <!-- Article Content -->
                    <article class="prose max-w-none">
                        {!! $berita->isi !!}
                    </article>

                    <!-- Multi Image Gallery -->
                    @if ($berita->multi_gambar)
                        <div class="mt-10 space-y-4 mb-10">
                            @foreach ($berita->multi_gambar as $image)
                                <div class="rounded-lg overflow-hidden">
                                    <a href="{{ asset('storage/' . $image) }}" data-fancybox="gallery" class="block">
                                        <img src="{{ asset('storage/' . $image) }}"
                                            alt="Gambar pendukung {{ $berita->judul }}"
                                            class="w-full max-h-[500px] object-contain mx-auto">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Caption -->
                        @if ($berita->caption_berita)
                    <span class="text-sm text-gray-500 mt-10 block">{{ $berita->caption_berita }}</span>
                    @endif

                    <!-- Tags & Share -->
                    <div class="share-section">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="mb-3 sm:mb-0">
                                <span class="share-label">Tags:</span>
                                @foreach ($berita->tags as $tag)
                                    <a href="#" class="tag">
                                        #{{ $tag->nama }}
                                    </a>
                                @endforeach
                            </div>

                            <div class="flex items-center">
                                <span class="share-label">Bagikan:</span>
                                <div class="flex">
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn bg-blue-600 hover:bg-blue-700" aria-label="Bagikan ke Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    <!-- Twitter -->
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn bg-blue-400 hover:bg-blue-500" aria-label="Bagikan ke Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn bg-green-500 hover:bg-green-600" aria-label="Bagikan ke WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related News - Max 3 Items -->
                    @if ($beritaTerkait->count() > 0)
                        <div class="related-news">
                            <h3 class="related-news-title">Berita Terkait</h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($beritaTerkait->take(3) as $related)
                                    <div class="news-card">
                                        <a href="{{ route('berita.detail', $related->slug) }}" class="block h-full">
                                            <div class="news-card-img-container">
                                                <img src="{{ asset('storage/' . $related->gambar) ?? asset('/assets/img/bg1.jpeg') }}"
                                                    alt="{{ $related->judul }}" class="news-card-img">
                                            </div>
                                            <div class="news-card-body">
                                                <div class="flex items-center text-xs text-gray-500 mb-1">
                                                    <span class="inline-flex items-center mr-2">
                                                        <i class="far fa-calendar-alt mr-1 text-green-500"></i>
                                                        {{ \Carbon\Carbon::parse($related->tanggal)->translatedFormat('d M Y') }}
                                                    </span>
                                                    <span class="inline-flex items-center">
                                                        <i class="far fa-eye mr-1"></i>
                                                        {{ number_format($related->views, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <h4
                                                    class="font-semibold text-gray-900 text-sm sm:text-base mb-1 line-clamp-2 hover:text-green-600 transition-colors">
                                                    {{ $related->judul }}
                                                </h4>
                                                <div class="mt-2">
                                                    <span
                                                        class="inline-block px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $related->kategori->nama ?? 'Berita' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            @if ($beritaTerkait->count() > 3)
                                <div class="text-center mt-4">
                                    <a href="{{ route('berita.index') }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors">
                                        Lihat Lebih Banyak Berita
                                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </main>

                <!-- Sidebar - Desktop Version -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
