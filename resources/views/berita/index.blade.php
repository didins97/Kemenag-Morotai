@extends('app')


@section('content')
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
                            <span class="text-sm font-medium text-gray-500">Berita</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="py-8 sm:py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Header -->
            <div class="section-header text-center sm:text-left mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Berita Terkini</h1>
                <p class="text-base text-gray-600 max-w-3xl">Informasi terbaru seputar kegiatan dan perkembangan terkini
                    dari Kemenag Morotai</p>
                <div class="w-16 h-1 bg-green-500 mt-3 mx-auto sm:mx-0"></div>
            </div>

            <div class="main-container flex flex-col lg:flex-row gap-6">
                <main class="w-full lg:w-2/3">
                    <!-- Category Filter -->
                    <div class="mb-6 bg-white p-3 rounded-lg shadow-sm overflow-hidden"> <!-- Tambahkan overflow-hidden -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                            <div class="w-full"> <!-- Ubah dari sm:w-auto ke w-full -->
                                <div class="overflow-x-auto pb-1 scrollbar-hide">
                                    <div class="flex space-x-1.5 min-w-max"> <!-- Tambahkan min-w-max -->
                                        <a href="{{ route('berita.index') }}"
                                            class="px-3 py-1.5 rounded-full text-xs font-medium {{ !request('kategori') ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                            Semua
                                        </a>
                                        @foreach ($kategories as $kategori)
                                            <a href="{{ route('berita.index', ['kategori' => $kategori->slug]) }}"
                                                class="px-3 py-1.5 rounded-full text-xs font-medium whitespace-nowrap {{ request('kategori') == $kategori->slug ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                                {{ $kategori->kategori }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News List -->
                    <div class="space-y-5">
                        @if ($beritas->count() > 0)
                            @foreach ($beritas as $berita)
                                <article
                                    class="group overflow-hidden rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100">
                                    <div class="flex flex-col sm:flex-row">
                                        <!-- Image -->
                                        <div class="sm:w-2/5 relative">
                                            <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('/assets/img/bg1.jpeg') }}"
                                                alt="{{ $berita->judul }}"
                                                class="w-full h-48 sm:h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                            <div class="absolute bottom-3 left-3">
                                                <span
                                                    class="px-2 py-0.5 bg-green-600 text-white text-xs font-semibold rounded-full">
                                                    {{ $berita->kategori->kategori ?? 'Berita' }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="sm:w-3/5 p-4 bg-white">
                                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                                <span class="flex items-center mr-3">
                                                    <i class="far fa-calendar-alt mr-1 text-green-600 text-xs"></i>
                                                    {{ $berita->created_at->translatedFormat('d M Y') }}
                                                </span>
                                                <span class="flex items-center">
                                                    <i class="far fa-clock mr-1 text-green-600 text-xs"></i>
                                                    {{ $berita->created_at->format('H:i') }} WIB
                                                </span>
                                            </div>

                                            <h3
                                                class="text-lg font-bold text-gray-900 mb-2 hover:text-green-600 transition-colors">
                                                <a
                                                    href="{{ route('berita.detail', $berita->slug) }}">{{ $berita->judul }}</a>
                                            </h3>

                                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                                {{ Str::limit(strip_tags($berita->isi), 150) }}
                                            </p>

                                            <a href="{{ route('berita.detail', $berita->slug) }}"
                                                class="inline-flex items-center text-sm text-green-600 font-medium hover:text-green-800 transition-colors">
                                                Baca Selengkapnya
                                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <div class="text-center py-8 bg-gray-50 rounded-lg">
                                <i class="far fa-newspaper text-3xl text-gray-400 mb-3"></i>
                                <h3 class="text-lg font-medium text-gray-700 mb-1">Belum ada berita tersedia</h3>
                                <p class="text-sm text-gray-500">Silakan kembali lagi nanti</p>
                            </div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    {{-- @if ($beritas->hasPages())
                        <div class="mt-8">
                            {{ $beritas->links('vendor.pagination.custom') }}
                        </div>
                    @endif --}}
                </main>

                <!-- Sidebar -->
                @include('sidebar')
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Category filter functionality
        document.querySelectorAll('.category-tag').forEach(tag => {
            tag.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all tags
                document.querySelectorAll('.category-tag').forEach(t => {
                    t.classList.remove('active');
                });

                // Add active class to clicked tag
                this.classList.add('active');

                // Here you would typically filter the news
                // For now we'll just scroll to the news section
                document.querySelector('.news-grid').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    </script>
@endpush
