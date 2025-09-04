<!-- Modern Gallery Section -->
<section class="py-8 sm:py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-gray-50">
    <!-- Header -->
    <div class="text-center mb-10 md:mb-14">
        <div class="inline-flex flex-col items-center">
            <div class="flex items-center justify-center gap-2 mb-3">
                <div class="w-7 h-7 md:w-8 md:h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-images text-green-600 text-sm md:text-base"></i>
                </div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900">Galeri Kegiatan</h2>
            </div>
            <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-3"></div>
            <p class="text-sm md:text-base text-gray-600 max-w-lg mx-auto">Dokumentasi foto kegiatan Kemenag Kabupaten
                Morotai</p>
        </div>
    </div>

    <!-- Gallery Swiper -->
    <div class="gallery-container relative">
        <div class="gallery-nav-btn gallery-prev">
            <i class="fa-solid fa-chevron-left text-green-600"></i>
        </div>

        <div class="swiper gallery-swiper">
            <div class="swiper-wrapper">
                @foreach ($galeries as $index => $galeri)
                    <div class="swiper-slide gallery-slide">
                        <div class="gallery-image-container" onclick="openLightbox({{ $index }})">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->caption }}"
                                class="gallery-image">
                            <div class="gallery-overlay">
                                <h3 class="gallery-title">{{ $galeri->judul }}</h3>
                                <p class="gallery-caption">{{ $galeri->caption }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="gallery-nav-btn gallery-next">
            <i class="fa-solid fa-chevron-right text-green-600"></i>
        </div>
    </div>
</section>
<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">
        <i class="fa-solid fa-times"></i>
    </button>

    <button class="lightbox-nav lightbox-prev" onclick="navigateLightbox(-1)">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <div class="lightbox-content">
        <img id="lightbox-image" class="lightbox-image" src="" alt="">
        <div id="lightbox-caption" class="lightbox-caption"></div>
    </div>

    <button class="lightbox-nav lightbox-next" onclick="navigateLightbox(1)">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</div>
