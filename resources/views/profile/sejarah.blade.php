@extends('app')

@section('css')
    <style>
        .timeline {
            position: relative;
            max-width: 100%;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #059669;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            border-radius: 3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -12px;
            background-color: white;
            border: 4px solid #059669;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left {
            left: 0;
        }

        .right {
            left: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid #e5e7eb;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #e5e7eb;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid #e5e7eb;
            border-width: 10px 10px 10px 0;
            border-color: transparent #e5e7eb transparent transparent;
        }

        .right::after {
            left: -12px;
        }

        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #059669;
        }

        .history-hero {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/sejarah.png');
            background-size: cover;
            background-position: center;
        }

        @media screen and (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item::before {
                left: 60px;
                border: medium solid #e5e7eb;
                border-width: 10px 10px 10px 0;
                border-color: transparent #e5e7eb transparent transparent;
            }

            .left::after,
            .right::after {
                left: 18px;
            }

            .right {
                left: 0%;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="history-hero py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Sejarah Kemenag Kabupaten Pulau Morotai</h1>
                <p class="text-xl md:text-2xl mb-8">Menelusuri Jejak Perjalanan Lembaga dari Masa ke Masa</p>
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Sejarah</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Introduction -->

                    <div class="prose max-w-none mb-16">
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">Latar Belakang Pembentukan</h2>
                        @if ($sejarah && $sejarah->latar_belakang)
                            <div class="text-gray-700 leading-relaxed space-y-4">
                                {{ $sejarah->latar_belakang }}
                            </div>
                        @else
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <p class="text-yellow-700">Konten latar belakang belum tersedia</p>
                            </div>
                        @endif
                    </div>

                    <!-- Timeline Section -->
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Linimasa Sejarah</h2>

                    @if ($sejarah && $sejarah->timeline)
                        <div class="timeline">
                            @foreach ($sejarah->timeline as $index => $item)
                                <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
                                    <div class="timeline-content">
                                        <h3 class="text-xl font-bold text-green-800 mb-2">{{ $item['year'] ?? 'Tahun' }}
                                        </h3>
                                        <p class="text-gray-700">
                                            {{ $item['description'] ?? 'Deskripsi tidak tersedia' }}
                                        </p>
                                        @if (isset($item['title']))
                                            <div class="mt-3">
                                                @foreach ((array) $item['title'] as $tag)
                                                    @php
                                                        $tagColors = [
                                                            'Peresmian' => ['bg-green-100', 'text-green-800'],
                                                            'SDM' => ['bg-blue-100', 'text-blue-800'],
                                                            'Program' => ['bg-yellow-100', 'text-yellow-800'],
                                                            'Infrastruktur' => ['bg-purple-100', 'text-purple-800'],
                                                            'Pelayanan' => ['bg-red-100', 'text-red-800'],
                                                            'Prestasi' => ['bg-indigo-100', 'text-indigo-800'],
                                                            'default' => ['bg-gray-100', 'text-gray-800'],
                                                        ];
                                                        $color = $tagColors[$tag] ?? $tagColors['default'];
                                                    @endphp
                                                    <span
                                                        class="inline-block {{ $color[0] }} {{ $color[1] }} text-xs px-2 py-1 rounded mr-1 mb-1">
                                                        {{ $tag }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 text-center">
                            <p class="text-yellow-700">Data timeline sejarah belum tersedia</p>
                        </div>
                    @endif
                </main>

                <!-- Sidebar - Desktop Version -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
