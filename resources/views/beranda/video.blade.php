<section class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
    <!-- Modern Elegant Header -->
    <div class="text-center mb-12">
        <div class="inline-flex flex-col items-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 relative pb-1">
                <span class="relative">
                    Video Kegiatan
                    <span
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 h-1 bg-green-500 rounded-full"></span>
                </span>
            </h2>
            <p class="text-base text-gray-600 max-w-xl mx-auto">
                Dokumentasi visual kegiatan Kemenag Kabupaten Morotai
            </p>
        </div>
    </div>

    <!-- Video Slider Container -->
    <div class="relative">
        <!-- Slider Navigation -->
        <div class="absolute inset-y-0 left-0 flex items-center z-10">
            <button
                class="video-prev bg-white/90 hover:bg-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg ml-2 transition-all hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <div class="absolute inset-y-0 right-0 flex items-center z-10">
            <button
                class="video-next bg-white/90 hover:bg-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg mr-2 transition-all hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Video Slider -->
        <div class="swiper video-slider">
            <div class="swiper-wrapper pb-12">
                @foreach ($playLists as $playList)
                    <div class="swiper-slide px-2">
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 group">
                            <div class="aspect-video w-full relative">
                                <iframe class="w-full h-full"
                                    src="https://www.youtube.com/embed/{{ $playList->youtube_id }}?autoplay=0"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <h3 class="text-white font-medium text-sm truncate">{{ $playList->title }}</h3>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 mb-1 truncate">{{ $playList->title }}</h3>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $playList->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Slider Pagination -->
            <div class="swiper-pagination mt-6"></div>
        </div>
    </div>
</section>
