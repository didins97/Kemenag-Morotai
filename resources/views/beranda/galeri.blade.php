<section class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
    <div class="mb-12">
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 relative pb-1">
                <span class="relative">
                    Galeri Kegiatan
                    <span
                        class="absolute bottom-0 left-1/2 md:left-0 transform md:transform-none -translate-x-1/2 md:translate-x-0 w-10 h-1 bg-green-500 rounded-full"></span>
                </span>
            </h2>
            <p class="text-base text-gray-600 max-w-xl">
                Galeri kegiatan Kemenag Kabupaten Morotai
            </p>
        </div>
    </div>


    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Gallery Content (2/3 width) -->
        <div class="lg:w-2/3">
            <!-- Slider Container -->
            <div class="relative">
                <!-- Gallery Slider with Coverflow Effect -->
                <div class="swiper gallery-coverflow">
                    <div class="swiper-wrapper">
                        @foreach ($galeries as $galeri)
                            <div class="swiper-slide">
                                <div
                                    class="relative overflow-hidden rounded-xl shadow-lg aspect-[16/9] transform transition-transform duration-300">
                                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Kegiatan 1"
                                        class="w-full h-full object-cover">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                                        <div>
                                            <h3 class="text-white font-bold text-xl">{{ $galeri->judul }}</h3>
                                            <p class="text-white/90 text-sm mt-1">
                                                {{ \Illuminate\Support\Str::limit($galeri->caption, 100) }}</p>
                                            {{-- <button
                                            class="mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-colors">
                                            Lihat Album
                                        </button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider Pagination -->
                    <div class="swiper-pagination mt-6"></div>
                </div>

                <!-- Slider Navigation -->
                <div class="absolute inset-0 flex items-center justify-between z-10 pointer-events-none">
                    <button
                        class="gallery-coverflow-prev bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md pointer-events-auto transition-all hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        class="gallery-coverflow-next bg-white/80 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md pointer-events-auto transition-all hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar (1/3 width) - Keep your existing sidebar content -->
        <div class="lg:w-1/3">
            <!-- Kolom Opini Section -->
            <div
                class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden transition-all hover:shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
                <div class="px-6 pt-5 pb-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </span>
                        <span>Kolom Opini</span>
                    </h3>
                </div>

                @if ($opinions && $opinions->count() > 0)
                    <div class="divide-y divide-gray-100">
                        @foreach ($opinions as $opinion)
                            <article class="group px-6 py-4 hover:bg-gray-50/50 transition-colors">
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 relative">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gradient-to-br from-green-100 to-green-50 border border-green-200 shadow-sm flex items-center justify-center text-green-800 font-bold text-lg">
                                            {{ strtoupper(substr($opinion->narasumber, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-sm font-semibold text-gray-900 line-clamp-2 group-hover:text-green-600 transition-colors leading-tight">
                                            <a href="{{ route('opini.detail', $opinion->slug) }}"
                                                class="hover:underline">
                                                {{ $opinion->judul }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-600 mt-2">Oleh: {{ $opinion->narasumber }}</p>
                                        <div class="flex items-center text-xs text-gray-500 mt-1 space-x-2">
                                            <span>{{ $opinion->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="px-6 py-3 border-t border-gray-100">
                        <a href="#"
                            class="text-sm font-medium text-green-600 hover:text-green-800 transition-colors flex items-center justify-center">
                            Lihat Semua Opini
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="px-6 py-8 text-center">
                        <div class="mx-auto w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-sm">Tidak ada opini tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
