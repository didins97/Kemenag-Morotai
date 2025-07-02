@extends('app')

@section('css')
    <style>
        .data-hero {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/kua-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .main-image-container {
            margin: 2rem 0;
            text-align: center;
        }

        .main-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .image-caption {
            margin-top: 1rem;
            font-size: 1rem;
            color: #666;
            line-height: 1.5;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="data-hero py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $info->judul }}</h1>
                <p class="text-xl md:text-2xl mb-8">Kantor Urusan Agama Kecamatan</p>
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
                            <a href="#" class="text-sm font-medium text-gray-700 hover:text-green-600">Data &
                                Informasi</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">{{ $info->judul }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Modern Information Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <article class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <!-- Header with Title -->
                        <div class="px-6 py-4 border-b border-gray-100">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $info->judul }}</h1>
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 prose max-w-none">
                            {!! $info->isi !!}
                        </div>

                        <!-- File Attachment (if exists) -->
                        @if ($info->file)
                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <a href="{{ Storage::url($info->file) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors" download>
                                        Download Lampiran
                                    </a>
                                </div>
                            </div>
                        @endif
                    </article>
                </main>

                <!-- Sidebar -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
