<!-- Modern News Section -->
<section class="modern-news py-8 md:py-12 bg-white">
    <div class="container mx-auto px-4 xl:px-0 max-w-7xl">
        <!-- Featured Layout -->
        <div class="featured-layout flex flex-col lg:grid lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-6 md:space-y-8">
                <!-- Primary Featured Article -->
                <article
                    class="relative group h-64 sm:h-80 md:h-[450px] overflow-hidden rounded-xl md:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500">
                    <div class="inset-0 w-full h-full">
                        <img src="{{ asset('storage/' . $beritaPilihan->gambar) }}" alt="{{ $beritaPilihan->judul }}"
                            class="w-full h-full object-cover transition-all duration-700 ease-out opacity-90 group-hover:opacity-100 group-hover:scale-105"
                            loading="lazy">
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

                    <!-- Content -->
                    <div
                        class="absolute bg-gradient-to-t from-black/90 via-black/50 to-transparent inset-0 h-full flex flex-col justify-end p-4 sm:p-6 md:p-8 transform transition-transform duration-500 group-hover:-translate-y-2 z-100">
                        <div class="max-w-2xl">
                            <span
                                class="inline-block mb-2 md:mb-4 px-2 py-0.5 md:px-3 md:py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md">
                                Trending
                            </span>
                            <h1
                                class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-white leading-tight mb-2 md:mb-4 drop-shadow-lg">
                                <a href="{{ route('berita.detail', $beritaPilihan->slug) }}"
                                    class="hover:text-emerald-300 transition-colors duration-300">
                                    {{ $beritaPilihan->judul }}
                                </a>
                            </h1>

                            <!-- Author and Date Info -->
                            <div class="flex flex-wrap items-center gap-2 md:gap-4 text-white/90 text-xs sm:text-sm">
                                <div class="flex items-center group">
                                    <i
                                        class="fa-solid fa-clock text-xs md:text-sm mr-1.5 group-hover:text-emerald-300 transition-colors duration-300"></i>
                                    <span class="group-hover:text-emerald-300 transition-colors duration-300">
                                        {{ \Carbon\Carbon::parse($beritaPilihan->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Trending Sidebar -->
            <aside class="lg:col-span-1">
                <div class="sticky top-4">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Trending Now</h3>
                        <i class="fa-solid fa-arrow-trend-up text-emerald-500 text-lg"></i>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($beritasPopuler as $post)
                            <article
                                class="group flex gap-2 sm:gap-3 items-start p-1 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                <span
                                    class="flex-shrink-0 text-xl sm:text-2xl font-bold text-gray-300 group-hover:text-emerald-500 transition-colors duration-300">
                                    {{ $loop->iteration }}
                                </span>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs font-medium text-emerald-600 uppercase">
                                        {{ $post->kategori->kategori }}
                                    </span>
                                    <h4
                                        class="text-sm sm:text-base font-semibold text-gray-800 mt-0.5 mb-1 group-hover:text-emerald-600 transition-colors duration-300 line-clamp-2">
                                        <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->judul }}</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mb-1.5 line-clamp-2">
                                        {{ Str::limit($post->deskripsi, 80) }}
                                    </p>
                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                        <span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                        <span class="flex items-center">
                                            <i class="fa-solid fa-eye mr-1 text-xs"></i>
                                            {{ number_format(rand(1000, 10000)) }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
