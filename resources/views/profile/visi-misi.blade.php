@extends('app')

@section('css')
    <style>
        .vision-mission-card {
            border-left: 4px solid #059669;
            transition: all 0.3s ease;
        }

        .vision-mission-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hero-visimisi {
            background: linear-gradient(rgba(5, 150, 105, 0.8), rgba(5, 150, 105, 0.8)),
                url('/assets/img/visimisi.png');
            background-size: cover;
            background-position: center;
        }

        .konten-misi li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .konten-misi li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #059669;
            font-weight: bold;
        }

        .konten-misi p {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-visimisi py-16 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Visi & Misi</h1>
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
                            <span class="text-sm font-medium text-gray-500">Visi & Misi</span>
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
                    @if ($visiMisi)
                        <!-- Visi Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 vision-mission-card">
                            <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                                <i class="fas fa-eye mr-3 text-green-600"></i>
                                Visi Kementerian Agama
                            </h2>
                            <div class="prose max-w-none text-gray-700">
                                <blockquote
                                    class="text-xl italic border-l-4 border-green-500 pl-4 py-2 bg-green-50 text-green-800">
                                    "{!! $visiMisi->visi !!}"
                                </blockquote>
                                <p class="mt-4 text-gray-700">
                                    Visi ini menjadi panduan bagi seluruh jajaran Kementerian Agama Kabupaten Pulau Morotai
                                    dalam menjalankan tugas dan fungsi pelayanan kepada masyarakat.
                                </p>
                            </div>
                        </div>

                        <!-- Misi Section -->
                        <div class="bg-white rounded-lg shadow-sm p-6 vision-mission-card">
                            <h2 class="text-3xl font-bold text-green-800 mb-6 flex items-center">
                                <i class="fas fa-bullseye mr-3 text-green-600"></i>
                                Misi Kementerian Agama
                            </h2>
                            <div class="prose max-w-none text-gray-700 konten-misi">
                                <p class="mb-4">Untuk mewujudkan visi tersebut, Kementerian Agama Kabupaten Pulau Morotai
                                    melaksanakan misi sebagai berikut:</p>
                                {!! $visiMisi->misi !!}
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                            <p class="text-gray-500">Data visi dan misi belum tersedia</p>
                        </div>
                    @endif
                </main>

                <!-- Sidebar - Same as Previous Pages -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
