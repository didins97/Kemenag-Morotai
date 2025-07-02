@extends('app')

@section('css')
    <style>
        .function-card {
            border-left: 4px solid #059669;
            transition: all 0.3s ease;
        }

        .function-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hero-tugas {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/tungsi.png');
            background-size: cover;
            background-position: center;
        }

        .list-fungsi li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .list-fungsi li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #059669;
            font-weight: bold;
        }

        .list-fungsi p {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-tugas py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tugas & Fungsi</h1>
                <p class="text-xl md:text-2xl mb-8">Kementerian Agama Kabupaten Pulau Morotai</p>
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
                            <span class="text-sm font-medium text-gray-500">Tugas & Fungsi</span>
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
                    @if ($tugasFungsi)
                        <!-- Tugas Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 function-card">
                            <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                                <i class="fas fa-tasks mr-3 text-green-600"></i>
                                Tugas Kementerian Agama
                            </h2>
                            <div class="prose max-w-none text-gray-700">
                                <p class="text-lg leading-relaxed">
                                    {!! $tugasFungsi->tugas !!}
                                </p>
                            </div>
                        </div>

                        <!-- Fungsi Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6 function-card">
                            <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                                <i class="fas fa-cogs mr-3 text-green-600"></i>
                                Fungsi Kementerian Agama
                            </h2>
                            <div class="prose max-w-none text-gray-700 list-fungsi">
                                {!! $tugasFungsi->fungsi !!}
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                            <p class="text-gray-500">Data tugas dan fungsi belum tersedia</p>
                        </div>
                    @endif
                </main>

                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
