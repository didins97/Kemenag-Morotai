<!-- Ultra Responsive News Layout -->
    <section class="news-layout bg-white pt-8 pb-6 sm:pt-12 sm:pb-10 px-4 sm:px-6">
        <div class="container mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="text-center mb-10 md:mb-14">
                <div class="inline-flex flex-col items-center">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <div class="w-7 h-7 md:w-8 md:h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-newspaper text-green-600 text-sm md:text-base"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900">
                            Berita Lainnya
                        </h2>
                    </div>

                    <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-3"></div>

                    <p class="text-sm md:text-base text-gray-600 max-w-lg mx-auto">
                        Berita terbaru seputar Kementerian Agama Kabupaten Morotai
                    </p>
                </div>
            </div>

            <!-- Featured News -->
            <div class="flex flex-col lg:flex-row gap-5 sm:gap-8 mb-8 sm:mb-12">
                @foreach ($beritasPilihan as $berita)
                    <!-- Main Featured News -->
                    <div class="lg:w-1/2">
                        <article class="featured-card group h-full">
                            <a href="{{ route('berita.detail', $berita->slug) }}" class="block h-full">
                                <div class="relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg hover:shadow-xl h-full transition-all duration-300">
                                    <div class="aspect-[4/3] sm:aspect-[16/9] w-full">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                            loading="lazy">
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6">
                                        <span class="inline-block mb-2 md:mb-4 px-2 py-0.5 md:px-3 md:py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md">
                                            {{ $berita->kategori->kategori }}
                                        </span>
                                        <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight mb-2 line-clamp-2">
                                            {{ $berita->judul }}
                                        </h3>
                                        <div class="flex items-center text-xs sm:text-sm text-white/90">
                                            <span>{{ $berita->user->name }}</span>
                                            <span class="mx-2">•</span>
                                            <span>{{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Clean News Grid Layout -->
            <div class="mb-8 sm:mb-12">
                <!-- News Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($beritasTerbaru as $berita)
                        <article class="group">
                            <a href="{{ route('berita.detail', $berita->slug) }}" class="block">
                                <div class="flex flex-row sm:flex-col h-full rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 bg-white">
                                    <!-- Image - Left on Mobile -->
                                    <div class="w-2/5 sm:w-full aspect-[4/3] relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                            loading="lazy">
                                    </div>

                                    <!-- Content - Right on Mobile -->
                                    <div class="w-3/5 sm:w-full p-3 sm:p-4 flex flex-col">
                                        <!-- Category as Simple Text -->
                                        <span class="text-xs text-green-600 font-medium mb-1">
                                            {{ $berita->kategori->kategori }}
                                        </span>

                                        <!-- News Title -->
                                        <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-1 group-hover:text-green-600 transition-colors line-clamp-2">
                                            {{ $berita->judul }}
                                        </h3>

                                        <!-- Date and Author -->
                                        <div class="flex items-center text-[10px] sm:text-xs text-gray-500 mb-2">
                                            <span>{{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}</span>
                                            <span class="mx-1 sm:mx-2">•</span>
                                            <span>{{ $berita->user->name }}</span>
                                        </div>

                                        <!-- Excerpt -->
                                        <p class="text-xs sm:text-sm text-gray-600 mb-2 line-clamp-2 sm:line-clamp-3">
                                            {{ Str::limit(strip_tags($berita->isi), 80) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-6 sm:mt-10">
                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center px-5 py-2.5 sm:px-6 sm:py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white text-sm sm:text-base font-medium rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                    Lihat Semua Berita
                    <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
        </div>
    </section>
