@extends('app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .prose {
            line-height: 1.75;
        }

        .prose p {
            margin-bottom: 1.25em;
            text-align: justify;
        }

        .prose ul,
        .prose ol {
            margin-bottom: 1.25em;
            padding-left: 1.625em;
            text-align: justify;
        }

        .prose li {
            text-align: justify;
        }


        .opinion-header {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .author-avatar {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .opinion-meta span {
            position: relative;
            padding-right: 1rem;
            margin-right: 1rem;
        }

        .opinion-meta span:not(:last-child):after {
            content: "•";
            position: absolute;
            right: 0;
            color: #9ca3af;
        }

        .opinion-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .opinion-content blockquote {
            border-left: 4px solid #059669;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #065f46;
        }

        .related-opinion {
            transition: all 0.3s ease;
        }

        .related-opinion:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection

@section('content')
    {{-- <!-- Breadcrumb -->
    <div class="bg-gray-50 py-3 border-b">
        <div class="container mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('beranda') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="" class="text-sm font-medium text-gray-700 hover:text-green-600">Kolom Opini</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Detail Opini</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Opinion Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center opinion-meta text-gray-500 mb-8 text-sm">
                        <span><i class="far fa-calendar-alt mr-1"></i> 12 Juni 2025</span>
                        <span><i class="far fa-clock mr-1"></i> 4 menit baca</span>
                        <span><i class="far fa-eye mr-1"></i> 1.245 Dilihat</span>
                    </div>

                    <!-- Featured Image -->
                    <figure class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="/assets/img/bg1.jpeg" alt="Moderasi Beragama di Era Digital" class="w-full h-auto object-cover">
                        <figcaption class="text-xs text-gray-500 mt-2 px-2">Diskusi panel tentang moderasi beragama di era digital</figcaption>
                    </figure>

                    <!-- Article Content -->
                    <article class="prose max-w-none opinion-content text-gray-700">
                        <p class="text-lg font-medium">Dalam era digital yang semakin berkembang pesat, konsep moderasi beragama menjadi semakin relevan dan penting untuk diterapkan dalam kehidupan bermasyarakat.</p>

                        <p>Media sosial dan platform digital telah menjadi ruang baru bagi penyebaran pemahaman keagamaan. Namun sayangnya, ruang ini juga sering kali dimanfaatkan untuk menyebarkan konten-konten radikal dan pemahaman yang sempit tentang agama.</p>

                        <blockquote>
                            "Moderasi beragama bukan berarti mengurangi keyakinan, tetapi lebih kepada bagaimana kita menyikapi perbedaan dengan bijak dan santun di ruang digital."
                        </blockquote>

                        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Tantangan di Ruang Digital</h2>

                        <p>Beberapa tantangan utama yang kita hadapi dalam menerapkan moderasi beragama di era digital:</p>

                        <ul class="list-disc pl-5 space-y-2">
                            <li>Penyebaran konten radikal yang masif</li>
                            <li>Algoritma media sosial yang cenderung memperkuat echo chamber</li>
                            <li>Literasi digital yang belum merata</li>
                            <li>Anonimitas yang memicu ujaran kebencian</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Peran Stakeholder</h2>

                        <p>Berbagai pihak memiliki peran penting dalam mengembangkan moderasi beragama di era digital:</p>

                        <div class="grid md:grid-cols-2 gap-4 my-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-green-700 mb-2">1. Pemerintah</h3>
                                <p>Menyediakan regulasi yang melindungi sekaligus mendorong konten positif tentang kerukunan beragama.</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-green-700 mb-2">2. Tokoh Agama</h3>
                                <p>Menjadi narasumber terpercaya yang memberikan pemahaman agama yang moderat dan kontekstual.</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-green-700 mb-2">3. Masyarakat</h3>
                                <p>Menjadi filter aktif dengan tidak menyebarkan konten-konten yang provokatif dan tidak bertanggung jawab.</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-green-700 mb-2">4. Platform Digital</h3>
                                <p>Mengembangkan algoritma yang mendorong konten-konten yang mempromosikan toleransi dan kerukunan.</p>
                            </div>
                        </div>

                        <p>Dengan kolaborasi semua pihak, kita dapat menciptakan ekosistem digital yang sehat dan mendukung moderasi beragama.</p>
                    </article>

                    <!-- Tags & Share -->
                    <div class="mt-12 pt-8 border-t">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <span class="text-sm font-medium text-gray-700 mr-2">Tags:</span>
                                <a href="#" class="inline-block bg-gray-100 hover:bg-green-600 hover:text-white rounded-full px-3 py-1 text-sm text-gray-700 mr-2 mb-2 transition-colors">Moderasi Beragama</a>
                                <a href="#" class="inline-block bg-gray-100 hover:bg-green-600 hover:text-white rounded-full px-3 py-1 text-sm text-gray-700 mr-2 mb-2 transition-colors">Era Digital</a>
                                <a href="#" class="inline-block bg-gray-100 hover:bg-green-600 hover:text-white rounded-full px-3 py-1 text-sm text-gray-700 mb-2 transition-colors">Kerukunan</a>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-700 mr-3">Bagikan:</span>
                                <div class="flex space-x-2">
                                    <a href="#" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-colors">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500 transition-colors">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition-colors">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    <div class="mt-12 bg-gray-50 rounded-xl p-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-shrink-0">
                                <div class="author-avatar rounded-full flex items-center justify-center">
                                    DR
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Tentang Penulis</h3>
                                <p class="font-medium text-green-600 mb-1">Dr. Siti Aminah, M.Ag</p>
                                <p class="text-sm text-gray-500 mb-3">Dosen Fakultas Ushuluddin UIN Jakarta</p>
                                <p class="text-gray-700">Dr. Siti Aminah adalah pakar studi agama dengan fokus pada moderasi beragama dan dampak teknologi terhadap kehidupan beragama. Beliau telah menulis berbagai buku dan artikel ilmiah tentang toleransi beragama di era digital.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Opinions -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Opini Terkait</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Related 1 -->
                            <a href="#" class="related-opinion bg-white rounded-lg shadow-sm p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3">
                                        AF
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Ahmad Fauzi, S.Ag</h4>
                                        <p class="text-xs text-gray-500">Ketua MUI Morotai</p>
                                    </div>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Peran Pemuda dalam Menjaga Kerukunan</h4>
                                <p class="text-sm text-gray-500 line-clamp-2">Bagaimana pemuda dapat menjadi garda terdepan dalam menjaga kerukunan umat beragama di era digital.</p>
                                <div class="flex items-center text-xs text-gray-400 mt-3">
                                    <span>8 Juni 2025</span>
                                    <span class="mx-2">•</span>
                                    <span>3 min read</span>
                                </div>
                            </a>

                            <!-- Related 2 -->
                            <a href="#" class="related-opinion bg-white rounded-lg shadow-sm p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold mr-3">
                                        DM
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Dewi Masyitoh</h4>
                                        <p class="text-xs text-gray-500">Aktivis Perempuan</p>
                                    </div>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Peran Perempuan dalam Pendidikan Agama Keluarga</h4>
                                <p class="text-sm text-gray-500 line-clamp-2">Strategi perempuan dalam menanamkan nilai-nilai moderasi beragama sejak dini di lingkungan keluarga.</p>
                                <div class="flex items-center text-xs text-gray-400 mt-3">
                                    <span>28 Mei 2025</span>
                                    <span class="mx-2">•</span>
                                    <span>6 min read</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </main>

                <!-- Sidebar - Desktop Version -->
                @include('sidebar')
            </div>
        </div>
    </section> --}}

    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <main class="w-full lg:w-2/3">
                    <div class="mb-6 text-sm text-gray-600">
                        <a href="#" class="hover:text-green-600">Beranda</a> &raquo;
                        <a href="#" class="hover:text-green-600">Opini</a> &raquo;
                        <span class="text-green-600">Detail</span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 leading-tight">{{ $opini->judul }}</h1>

                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-6 pb-6 border-b">
                        <span class="flex items-center">
                            <i class="far fa-calendar-alt mr-2"></i>
                            {{ \Carbon\Carbon::parse($opini->tanggal)->translatedFormat('d F Y') }}
                        </span>
                        <span class="flex items-center">
                            <i class="far fa-user mr-2"></i>
                            {{ $opini->narasumber ?? 'Admin' }}
                        </span>
                        <span class="flex items-center">
                            <i class="far fa-eye mr-2"></i>
                            {{ number_format($opini->views, 0, ',', '.') }} Dilihat
                        </span>
                        <span class="flex items-center">
                            <i class="far fa-clock mr-2"></i>
                            {{ $opini->reading_time }} menit baca
                        </span>
                    </div>

                    @if ($opini->gambar)
                        <!-- Featured Image -->
                        <figure class="mb-8 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ Storage::url($opini->gambar) }}" alt="{{ $opini->judul }}"
                                class="w-full h-auto object-cover">
                            <figcaption class="text-xs text-gray-500 mt-2 px-2">Foto: {{ $opini->caption_gambar }}</figcaption>
                        </figure>
                    @endif

                    <!-- Article Content -->
                    <article class="prose max-w-none text-gray-700">
                        {!! $opini->isi !!}
                    </article>

                    <!-- Tags & Share -->
                    <div class="mt-8 pt-6 border-t">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <span class="text-sm font-medium text-gray-700 mr-2">Tags:</span>
                                @foreach ($opini->tags as $tag)
                                    <a href="#"
                                        class="inline-block bg-gray-100 hover:bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2 mb-2">
                                        {{ $tag->nama }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-700 mr-3">Bagikan:</span>
                                <div class="flex space-x-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        target="_blank"
                                        class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($opini->judul) }}&url={{ urlencode(url()->current()) }}"
                                        target="_blank"
                                        class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($opini->judul . ' ' . url()->current()) }}"
                                        target="_blank"
                                        class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600">
                                        <i class="fab fa-whatsapp text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Opinions -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Opini Terkait</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Related 1 -->
                            <a href="#" class="related-opinion bg-white rounded-lg shadow-sm p-6">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3">
                                        AF
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Ahmad Fauzi, S.Ag</h4>
                                        <p class="text-xs text-gray-500">Ketua MUI Morotai</p>
                                    </div>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Peran Pemuda dalam Menjaga Kerukunan</h4>
                                <p class="text-sm text-gray-500 line-clamp-2">Bagaimana pemuda dapat menjadi garda terdepan
                                    dalam menjaga kerukunan umat beragama di era digital.</p>
                                <div class="flex items-center text-xs text-gray-400 mt-3">
                                    <span>8 Juni 2025</span>
                                    <span class="mx-2">•</span>
                                    <span>3 min read</span>
                                </div>
                            </a>

                            <!-- Related 2 -->
                            <a href="#" class="related-opinion bg-white rounded-lg shadow-sm p-6">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold mr-3">
                                        DM
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Dewi Masyitoh</h4>
                                        <p class="text-xs text-gray-500">Aktivis Perempuan</p>
                                    </div>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Peran Perempuan dalam Pendidikan Agama Keluarga
                                </h4>
                                <p class="text-sm text-gray-500 line-clamp-2">Strategi perempuan dalam menanamkan
                                    nilai-nilai moderasi beragama sejak dini di lingkungan keluarga.</p>
                                <div class="flex items-center text-xs text-gray-400 mt-3">
                                    <span>28 Mei 2025</span>
                                    <span class="mx-2">•</span>
                                    <span>6 min read</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </main>

                <!-- Sidebar -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection
