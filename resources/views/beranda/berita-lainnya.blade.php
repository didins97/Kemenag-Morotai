<!-- Ultra Modern News Layout -->
<section class="modern-news-layout bg-white py-12 px-4 sm:px-6">
    <div class="container mx-auto max-w-7xl">

        <div class="text-center mb-12">
            <div class="inline-flex flex-col items-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 relative pb-1">
                    <span class="relative">
                        Berita Terbaru
                        <span
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-green-500 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-base text-gray-600 max-w-xl mx-auto">
                    Berita terbaru seputar kegiatan Kemenag Kabupaten Morotai
                </p>
            </div>
        </div>


        <!-- Main Headline - Split Layout -->
        <div class="flex flex-col lg:flex-row gap-8 mb-12">
            <!-- Image - Left -->
            <div class="lg:w-1/2">
                <div
                    class="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="aspect-[16/10] w-full">
                        <img src="{{ asset('storage/' . $beritaTerbaru->gambar) }}" alt="Main News"
                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-transparent"></div>
                    {{-- <span
                        class="absolute top-5 left-5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">HIGHLIGHT</span> --}}
                    <div class="absolute bottom-5 left-5 right-5">
                        <span
                            class="inline-block mb-4 px-3 py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md">{{ $beritaTerbaru->kategori->kategori }}</span>
                        <h1 class="text-xl md:text-2xl font-bold text-white mt-1 mb-2 leading-tight">
                            {{ \Illuminate\Support\Str::limit($beritaTerbaru->judul, 80) }}
                        </h1>
                        <div class="flex items-center text-xs text-white/90">
                            <span>{{ \Carbon\Carbon::parse($beritaTerbaru->created_at)->format('d M Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $beritaTerbaru->user->name }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content - Right -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                <div class="max-w-lg">
                    <a href="{{ route('berita.detail', $beritaPilihan->slug) }}"
                        class="hover:text-emerald-300 transition-colors duration-300">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ $beritaPilihan->judul }}
                        </h1>
                    </a>

                    {{-- <a href="{{ route('berita.detail', $beritaPilihan->slug) }}"
                        class="hover:text-emerald-300 transition-colors duration-300">
                        {{ $beritaPilihan->judul }}
                    </a> --}}

                    <p class="text-base text-gray-600 mb-6 leading-relaxed">
                        {{ Str::limit(strip_tags($beritaTerbaru->isi), 250) }}
                    </p>

                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-green-100 to-teal-100 overflow-hidden shadow-inner">
                                <img src="{{ asset('assets/img/user.png') }}" alt="Author"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $beritaTerbaru->user->name }}</p>
                            <p class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($beritaTerbaru->created_at)->diffForHumans() }}</p>
                        </div>
                        <div class="ml-auto flex gap-2">
                            <button class="text-gray-400 hover:text-green-600 transition-colors p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </button>
                            <button class="text-gray-400 hover:text-green-600 transition-colors p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trending News - Grid Cards -->
        <div class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($beritasTerbaru as $berita)
                    <article
                        class="group rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                        <div class="relative aspect-[16/9] overflow-hidden">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="News"
                                class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            <span
                                class="absolute top-3 left-3 text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 text-xs font-bold px-2 py-1 rounded">{{ $berita->kategori->kategori }}</span>
                                {{-- inline-block mb-4 px-3 py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md --}}
                        </div>
                        <div class="p-5">
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <span>{{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $berita->user->name }}</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors line-clamp-2">
                                <a href="{{ route('berita.detail', $berita->slug) }}">{{ $berita->judul }}</a>
                            </h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ Str::limit(strip_tags($berita->isi), 100) }}
                            </p>
                            <a href="#"
                                class="inline-flex items-center text-sm text-green-600 hover:text-green-800 font-medium">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <!-- View All Button - Centered at Bottom -->
        <div class="text-center mt-8">
            <a href="{{ route('berita.index') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white font-medium rounded-full shadow-md hover:shadow-lg transition-all hover:scale-[1.02]">
                Lihat Semua Berita
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
