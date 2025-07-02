<section class="py-6 sm:py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
    <!-- Header Section -->
        <div class="text-center mb-8 sm:mb-12">
            <div class="inline-flex flex-col items-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 relative pb-2">
                    <span class="relative">
                        Galeri Kegiatan
                        <span
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 sm:w-16 h-1 sm:h-1.5 bg-green-500 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-sm sm:text-base text-gray-600 max-w-lg mx-auto">
                    Galeri kegiatan Kemenag Kabupaten Morotai
                </p>
            </div>
        </div>

    <div class="flex flex-col lg:flex-row gap-4 sm:gap-6">
        <!-- Main Featured Image (2/3 width on desktop) -->
        <div class="w-full lg:w-2/3">
            <!-- Featured Image -->
            <div class="relative rounded-lg sm:rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 aspect-[4/3] sm:aspect-[16/9]">
                @if(count($galeries) > 0)
                    <img src="{{ asset('storage/' . $galeries[0]->gambar) }}" alt="{{ $galeries[0]->judul }}"
                        class="w-full h-full object-cover" loading="lazy" id="featured-image">

                    <!-- Image overlay with gradient and info -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent flex flex-col justify-end p-3 sm:p-4 md:p-6">
                        <h3 class="text-white font-semibold text-base sm:text-lg md:text-xl leading-tight" id="featured-title">
                            {{ $galeries[0]->judul }}
                        </h3>
                        <p class="text-white/90 text-xs sm:text-sm mt-1 line-clamp-2" id="featured-caption">
                            {{ $galeries[0]->caption }}
                        </p>
                    </div>
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <p class="text-gray-500">Tidak ada gambar tersedia</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Gallery Thumbnail Sidebar (1/3 width on desktop) -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-lg sm:rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all h-full">
                <!-- Gallery Thumbnail Header -->
                <div class="px-4 sm:px-5 py-3 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-sm sm:text-base font-bold text-gray-900 flex items-center">
                        <span class="flex-shrink-0 w-6 h-6 sm:w-7 sm:h-7 rounded-md bg-green-50 flex items-center justify-center mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-[18px] sm:w-[18px] text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </span>
                        <span class="truncate">Galeri Lainnya</span>
                    </h3>
                </div>

                <!-- Gallery Thumbnail Slider -->
                <div class="swiper gallery-thumbnails p-2 sm:p-3">
                    <div class="swiper-wrapper">
                        @foreach(array_chunk($galeries->toArray(), 6) as $chunk)
                            <div class="swiper-slide">
                                <div class="grid grid-cols-2 gap-2 sm:gap-3">
                                    @foreach($chunk as $index => $galeri)
                                        <div class="cursor-pointer thumbnail-item transition-all hover:scale-[1.02] {{ $loop->parent->first && $loop->first ? 'ring-2 ring-green-500' : '' }}"
                                            data-index="{{ $loop->parent->index * 6 + $loop->index }}"
                                            onclick="showFeaturedImage({{ $loop->parent->index * 6 + $loop->index }})">
                                            <div class="relative aspect-[4/3] rounded-md overflow-hidden shadow-sm">
                                                <img src="{{ asset('storage/' . $galeri['gambar']) }}" alt=""
                                                    class="w-full h-full object-cover">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end p-1 sm:p-2">
                                                    <p class="text-white text-xs font-medium truncate w-full px-1">
                                                        {{--  --}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Arrows -->
                    <div class="flex justify-between px-1 pt-2">
                        <button class="gallery-thumbnails-prev bg-white/90 hover:bg-white rounded-full w-7 h-7 flex items-center justify-center shadow-md transition-all active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <div class="swiper-pagination !relative !w-auto"></div>
                        <button class="gallery-thumbnails-next bg-white/90 hover:bg-white rounded-full w-7 h-7 flex items-center justify-center shadow-md transition-all active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
