@extends('app')

@section('css')
    <style>
        /* Prose Styles */
        .prose {
            line-height: 1.75;
            max-width: 100%;
        }

        .prose p {
            margin-bottom: 1.25em;
            font-size: 1.05rem;
            color: #4b5563;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1.25em;
            padding-left: 1.625em;
        }

        .prose img {
            border-radius: 0.5rem;
            margin: 1.5em 0;
        }

        .prose h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 1.5em 0 0.75em;
            color: #111827;
        }

        .prose h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 1.25em 0 0.5em;
            color: #111827;
        }

        /* Comment Section Styles */
        .comment-form input,
        .comment-form textarea {
            transition: all 0.3s ease;
        }

        .comment-form input:focus,
        .comment-form textarea:focus {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }

        .comment-item {
            transition: all 0.3s ease;
        }

        .reply-item {
            position: relative;
        }

        .reply-item:before {
            content: "";
            position: absolute;
            left: -2px;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #e5e7eb;
        }

        /* News Detail Header */
        .news-header {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Featured Image */
        .featured-image {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            margin-bottom: 2.5rem;
        }

        /* Tags */
        .tag {
            transition: all 0.2s ease;
        }

        .tag:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Share Buttons */
        .share-btn {
            transition: transform 0.2s ease;
        }

        .share-btn:hover {
            transform: scale(1.1);
        }

        /* Related News */
        .related-news {
            background-color: #f9fafb;
            border-radius: 0.75rem;
            padding: 2rem;
            margin-top: 4rem;
        }

        .related-news-title {
            position: relative;
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .related-news-title:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: #10b981;
        }

        .news-card {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .news-card-img {
            height: 180px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-card-img {
            transform: scale(1.05);
        }

        .news-card-date {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .news-card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Author Box */
        .author-box {
            background-color: #f3f4f6;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-top: 3rem;
        }
    </style>
@endsection

@section('content')
    <!-- Detail Berita Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Breadcrumb -->
                    <nav class="mb-6" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li>
                                <a href="{{ route('beranda') }}"
                                    class="text-gray-600 hover:text-green-600 transition-colors">
                                    <i class="fas fa-home mr-1"></i> Beranda
                                </a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            </li>
                            <li>
                                <a href="{{ route('berita.index') }}"
                                    class="text-gray-600 hover:text-green-600 transition-colors">Berita</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            </li>
                            <li>
                                <span class="text-green-600 font-medium">Detail</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- News Header -->
                    <div class="news-header">
                        <!-- Judul -->
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $berita->judul }}
                        </h1>

                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <i class="far fa-calendar-alt mr-2 text-green-600"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-user mr-2 text-green-600"></i>
                                {{ $berita->user->name ?? 'Admin' }}
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-eye mr-2 text-green-600"></i>
                                {{ number_format($berita->views, 0, ',', '.') }} Dilihat
                            </span>
                            <span class="flex items-center">
                                <i class="far fa-clock mr-2 text-green-600"></i>
                                {{ $berita->reading_time }} menit baca
                            </span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <figure class="featured-image">
                        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}"
                            class="w-full h-auto object-cover">
                        <figcaption class="text-xs text-gray-500 mt-2 px-1">Foto: {{ $berita->judul }}</figcaption>
                    </figure>

                    <!-- Article Content -->
                    <article class="prose max-w-none">
                        {!! $berita->isi !!}
                    </article>

                    <!-- Tags & Share -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                            <div>
                                <span class="text-sm font-medium text-gray-700 mr-3">Tags:</span>
                                @foreach ($berita->tags as $tag)
                                    <a href="#"
                                        class="tag inline-block bg-gray-100 hover:bg-green-100 hover:text-green-800 rounded-full px-4 py-1 text-sm font-medium text-gray-700 mr-2 mb-2 transition-all">
                                        #{{ $tag->nama }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-700 mr-3">Bagikan:</span>
                                <div class="flex space-x-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn w-9 h-9 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="share-btn w-9 h-9 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                    <a href="mailto:?subject={{ rawurlencode($berita->judul) }}&body={{ rawurlencode('Baca selengkapnya: ' . url()->current()) }}"
                                        class="share-btn w-9 h-9 rounded-full bg-gray-600 text-white flex items-center justify-center hover:bg-gray-700">
                                        <i class="far fa-envelope text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related News - Max 3 Items -->
                    @if ($beritaTerkait->count() > 0)
                        <div class="mt-16 pt-8 border-t border-gray-200">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Berita Terkait</h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach ($beritaTerkait->take(3) as $related)
                                    <div
                                        class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                                        <a href="{{ route('berita.detail', $related->slug) }}" class="block h-full">
                                            <div class="relative aspect-video overflow-hidden">
                                                <img src="{{ asset('storage/' . $related->gambar) ?? asset('/assets/img/bg1.jpeg') }}"
                                                    alt="{{ $related->judul }}"
                                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/10 to-transparent">
                                                </div>
                                            </div>
                                            <div class="p-5">
                                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                                    <span class="inline-flex items-center mr-3">
                                                        <i class="far fa-calendar-alt mr-1 text-green-500"></i>
                                                        {{ \Carbon\Carbon::parse($related->tanggal)->translatedFormat('d M Y') }}
                                                    </span>
                                                    <span class="inline-flex items-center">
                                                        <i class="far fa-eye mr-1"></i>
                                                        {{ number_format($related->views, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <h4
                                                    class="font-semibold text-gray-900 mb-3 line-clamp-2 hover:text-green-600 transition-colors">
                                                    {{ $related->judul }}
                                                </h4>
                                                <div class="mt-4">
                                                    <span
                                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    bg-green-100 text-green-800">
                                                        {{ $related->kategori->nama ?? 'Berita' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            @if ($beritaTerkait->count() > 3)
                                <div class="text-center mt-8">
                                    <a href="{{ route('berita.index') }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-600
                  hover:text-green-800 transition-colors">
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
