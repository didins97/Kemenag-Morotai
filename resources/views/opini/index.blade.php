@extends('app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .opinion-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .opinion-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-color: #059669;
        }

        .author-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            font-weight: bold;
        }

        .opinion-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: #059669;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
        }

        .read-more-btn {
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            background-color: #047857;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-green-700 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Kolom Opini</h1>
                <p class="text-lg opacity-90">Pandangan dan analisis mendalam dari para ahli dan praktisi tentang isu-isu keagamaan terkini</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Opinion List -->
                <main class="w-full lg:w-2/3">
                    <!-- Breadcrumb -->
                    <div class="mb-6 text-sm text-gray-600">
                        <a href="{{ route('beranda') }}" class="hover:text-green-600">Beranda</a> &raquo;
                        <span class="text-green-600">Kolom Opini</span>
                    </div>

                    <!-- Featured Opinion -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8 opinion-card">
                        <div class="relative">
                            <img src="/assets/img/featured-opinion.jpg" alt="Featured Opinion" class="w-full h-64 object-cover">
                            <span class="opinion-category">Utama</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="author-avatar rounded-full flex items-center justify-center mr-4">
                                    DR
                                </div>
                                <div>
                                    <h4 class="font-semibold">Dr. Siti Aminah, M.Ag</h4>
                                    <p class="text-sm text-gray-500">Akademisi UIN Jakarta</p>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">Pentingnya Moderasi Beragama di Era Digital</h2>
                            <p class="text-gray-600 mb-4">Dalam era digital ini, moderasi beragama menjadi semakin penting untuk menjaga kerukunan antarumat beragama. Media sosial seringkali menjadi tempat penyebaran paham radikal...</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">12 Juni 2025 • 4 min read</span>
                                <a href="#" class="read-more-btn px-4 py-2 bg-green-600 text-white rounded-md text-sm font-medium">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Opinion Grid -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Opinion 1 -->
                        <div class="bg-white rounded-lg shadow-sm p-6 opinion-card">
                            <div class="flex items-center mb-4">
                                <div class="author-avatar rounded-full flex items-center justify-center mr-4">
                                    AF
                                </div>
                                <div>
                                    <h4 class="font-semibold">Ahmad Fauzi, S.Ag</h4>
                                    <p class="text-sm text-gray-500">Ketua MUI Morotai</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Peran Pemuda dalam Menjaga Kerukunan</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Pemuda sebagai agen perubahan memiliki peran strategis dalam menjaga kerukunan umat beragama di Kabupaten Pulau Morotai...</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">8 Juni 2025 • 3 min read</span>
                                <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </div>

                        <!-- Opinion 2 -->
                        <div class="bg-white rounded-lg shadow-sm p-6 opinion-card">
                            <div class="flex items-center mb-4">
                                <div class="author-avatar rounded-full flex items-center justify-center mr-4">
                                    HS
                                </div>
                                <div>
                                    <h4 class="font-semibold">H. Syamsuddin, M.Pd</h4>
                                    <p class="text-sm text-gray-500">Pengawas Pendidikan Agama</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Transformasi Pendidikan Agama di Era Digital</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Pendidikan agama perlu beradaptasi dengan perkembangan teknologi digital untuk tetap relevan dengan kebutuhan generasi muda...</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">5 Juni 2025 • 5 min read</span>
                                <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </div>

                        <!-- Opinion 3 -->
                        <div class="bg-white rounded-lg shadow-sm p-6 opinion-card">
                            <div class="flex items-center mb-4">
                                <div class="author-avatar rounded-full flex items-center justify-center mr-4">
                                    RW
                                </div>
                                <div>
                                    <h4 class="font-semibold">Rahmat Wahyudi</h4>
                                    <p class="text-sm text-gray-500">Ketua FKUB Morotai</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Strategi Membangun Toleransi di Tingkat Lokal</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Kabupaten Pulau Morotai memiliki keragaman agama yang perlu dikelola dengan baik melalui pendekatan kearifan lokal...</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">1 Juni 2025 • 4 min read</span>
                                <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </div>

                        <!-- Opinion 4 -->
                        <div class="bg-white rounded-lg shadow-sm p-6 opinion-card">
                            <div class="flex items-center mb-4">
                                <div class="author-avatar rounded-full flex items-center justify-center mr-4">
                                    DM
                                </div>
                                <div>
                                    <h4 class="font-semibold">Dewi Masyitoh</h4>
                                    <p class="text-sm text-gray-500">Aktivis Perempuan</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Peran Perempuan dalam Pendidikan Agama Keluarga</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Perempuan sebagai madrasah pertama bagi anak-anak memiliki peran krusial dalam menanamkan nilai-nilai agama yang moderat...</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">28 Mei 2025 • 6 min read</span>
                                <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                    Baca →
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            <a href="#" class="px-3 py-1 rounded-md bg-green-600 text-white">1</a>
                            <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-100">2</a>
                            <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-100">3</a>
                            <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-100">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </main>

                <!-- Sidebar -->
                <aside class="w-full lg:w-1/3">
                    <!-- Popular Opinions -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Opini Populer</h3>
                        <div class="space-y-4">
                            <a href="#" class="block hover:bg-gray-50 p-2 rounded transition-colors">
                                <h4 class="font-medium text-gray-800">Moderasi Beragama di Media Sosial</h4>
                                <p class="text-sm text-gray-500">10 Juni 2025 • 1200x dibaca</p>
                            </a>
                            <a href="#" class="block hover:bg-gray-50 p-2 rounded transition-colors">
                                <h4 class="font-medium text-gray-800">Pendidikan Karakter Berbasis Agama</h4>
                                <p class="text-sm text-gray-500">7 Juni 2025 • 980x dibaca</p>
                            </a>
                            <a href="#" class="block hover:bg-gray-50 p-2 rounded transition-colors">
                                <h4 class="font-medium text-gray-800">Tantangan Dai Milenial</h4>
                                <p class="text-sm text-gray-500">3 Juni 2025 • 850x dibaca</p>
                            </a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Kategori Opini</h3>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-green-600 hover:text-white rounded-full text-sm transition-colors">Moderasi Beragama</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-green-600 hover:text-white rounded-full text-sm transition-colors">Pendidikan</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-green-600 hover:text-white rounded-full text-sm transition-colors">Kerukunan</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-green-600 hover:text-white rounded-full text-sm transition-colors">Hukum Agama</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 hover:bg-green-600 hover:text-white rounded-full text-sm transition-colors">Kehidupan Beragama</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
