<!-- Modern News Section - Mobile Optimized -->
<section class="modern-news py-8 md:py-16 bg-white">
    <div class="container mx-auto px-4 xl:px-0 max-w-7xl">
        <!-- Featured Layout -->
        <div class="featured-layout flex flex-col lg:grid lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-6 md:space-y-8">
                <!-- Primary Featured Article - Mobile Optimized -->
                <article class="relative group h-64 sm:h-80 md:h-[450px] overflow-hidden rounded-xl md:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500">
                    <!-- Image with Aspect Ratio -->
                    <div class="absolute inset-0 w-full h-full">
                        <img src="{{ asset('storage/' . $beritaPilihan->gambar) }}" alt="{{ $beritaPilihan->judul }}"
                            class="w-full h-full object-cover transition-all duration-700 ease-out opacity-90 group-hover:opacity-100 group-hover:scale-105"
                            loading="lazy">
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

                    <!-- Content -->
                    <div class="relative h-full flex flex-col justify-end p-4 sm:p-6 md:p-8 transform transition-transform duration-500 group-hover:-translate-y-2">
                        <div class="max-w-2xl">
                            <span class="inline-block mb-2 md:mb-4 px-2 py-0.5 md:px-3 md:py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md">
                                Trending
                            </span>
                            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-white leading-tight mb-2 md:mb-4 drop-shadow-lg">
                                <a href="{{ route('berita.detail', $beritaPilihan->slug) }}" class="hover:text-emerald-300 transition-colors duration-300">
                                    {{ $beritaPilihan->judul }}
                                </a>
                            </h1>

                            <!-- Author and Date Info -->
                            <div class="flex flex-wrap items-center gap-2 md:gap-4 text-white/90 text-xs sm:text-sm">
                                <div class="flex items-center group">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 sm:h-4 sm:w-4 mr-1 group-hover:text-emerald-300 transition-colors duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="group-hover:text-emerald-300 transition-colors duration-300">
                                        {{ \Carbon\Carbon::parse($beritaPilihan->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Secondary Featured Articles - Hidden on Mobile -->
                {{-- <div class="hidden md:grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($beritasPilihan as $index => $post)
                        <article class="group relative h-64 overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                            <!-- Content here -->
                        </article>
                    @endforeach
                </div> --}}
            </div>

            <!-- Trending Sidebar - Mobile Optimized -->
            <aside class="lg:col-span-1">
                <div class="sticky top-4">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">Trending Now</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-emerald-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($beritasPopuler as $post)
                            <article class="group flex gap-2 sm:gap-3 items-start p-1 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                <span class="flex-shrink-0 text-xl sm:text-2xl font-bold text-gray-300 group-hover:text-emerald-500 transition-colors duration-300">
                                    {{ $loop->iteration }}
                                </span>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs font-medium text-emerald-600 uppercase">
                                        {{ $post->kategori->kategori }}
                                    </span>
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-800 mt-0.5 mb-1 group-hover:text-emerald-600 transition-colors duration-300 line-clamp-2">
                                        <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->judul }}</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mb-1.5 line-clamp-2">
                                        {{ Str::limit($post->deskripsi, 80) }}
                                    </p>
                                    <div class="flex items-center justify-between text-xs text-gray-500">
                                        <span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
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
