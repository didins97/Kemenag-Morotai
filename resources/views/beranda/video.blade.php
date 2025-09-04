<section class="py-8 sm:py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
    <!-- Header Section -->
    <div class="text-center mb-10 md:mb-14">
        <div class="inline-flex flex-col items-center">
            <div class="flex items-center justify-center gap-2 mb-3">
                <div class="w-7 h-7 md:w-8 md:h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-newspaper text-green-600 text-sm md:text-base"></i>
                </div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900">
                    Video Edukasi & Kegiatan
                </h2>
            </div>

            <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-3"></div>

            <p class="text-sm md:text-base text-gray-600 max-w-lg mx-auto">
                Video edukasi dan kegiatan Kementerian Agama Kabupaten Morotai
            </p>
        </div>
    </div>

    <!-- Video Slider Container -->
    <div class="relative">
        <!-- Slider Navigation -->
        <div class="absolute inset-y-0 left-0 flex items-center z-10">
            <button
                class="video-prev bg-white/90 hover:bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-lg ml-2 transition-all hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-gray-800" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <div class="absolute inset-y-0 right-0 flex items-center z-10">
            <button
                class="video-next bg-white/90 hover:bg-white rounded-full w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center shadow-lg mr-2 transition-all hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-gray-800" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
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
                            <!-- Thumbnail Container with Play Button -->
                            <div class="aspect-video w-full relative cursor-pointer video-thumbnail"
                                data-video-id="{{ $playList->youtube_id }}" onclick="loadYouTubeIframe(this)">
                                <!-- YouTube Thumbnail (lazy loaded) -->
                                <img src="https://img.youtube.com/vi/{{ $playList->youtube_id }}/maxresdefault.jpg"
                                    alt="{{ $playList->title }}" class="w-full h-full object-cover lazy" loading="lazy">

                                <!-- Play Button Overlay -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition-colors">
                                    <div
                                        class="w-12 h-12 sm:w-16 sm:h-16 bg-white/90 hover:bg-white rounded-full flex items-center justify-center transition-all group-hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 sm:h-6 sm:w-6 text-red-600" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <div
                                    class="absolute bottom-2 right-2 bg-black/75 text-white text-xs px-1.5 py-1 rounded">
                                    5:30 <!-- You may need to fetch this from YouTube API -->
                                </div>
                            </div>

                            <!-- Video Info -->
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2">{{ $playList->title }}</h3>
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
