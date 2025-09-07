<aside class="lg:w-1/3 space-y-6">
    <!-- Sticky Wrapper for Desktop -->
    <div class="lg:sticky lg:top-4 space-y-6">

        <!-- News Section - Improved -->
        <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="px-5 py-4 border-b border-gray-100 flex items-center bg-gray-50">
                <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-800">Berita Terkini</h3>
            </div>

            <!-- News Items -->
            <div class="divide-y divide-gray-100">
                @foreach($terbaru as $news)
                <article class="px-4 py-3 hover:bg-gray-50 transition-colors duration-150">
                    <a href="{{ route('berita.detail', $news->slug) }}" class="flex gap-3 items-start">
                        <!-- Thumbnail -->
                        <div class="flex-shrink-0 relative w-12 h-12 rounded-md overflow-hidden border border-gray-200">
                            <img src="{{ $news->gambar ? asset('storage/' . $news->gambar) : '/assets/img/news-thumb.jpg' }}"
                                 alt="{{ $news->judul }}"
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <!-- Category Tag -->
                            <span class="inline-block px-2 py-0.5 text-[10px] font-medium uppercase rounded-full bg-emerald-100 text-emerald-800 mb-1">
                                {{ $news->kategori->kategori ?? 'Berita' }}
                            </span>

                            <!-- Title -->
                            <h4 class="text-sm font-medium text-gray-800 line-clamp-2 leading-tight hover:text-emerald-600 transition-colors">
                                {{ $news->judul }}
                            </h4>

                            <!-- Meta -->
                            <div class="flex items-center text-xs text-gray-500 mt-1 space-x-2">
                                <span>{{ $news->created_at->format('d M Y') }}</span>
                                <span class="text-gray-300">•</span>
                                <span>{{ max(1, round(str_word_count(strip_tags($news->isi)) / 200)) }} mnt</span>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>

            <!-- Footer -->
            <div class="px-4 py-3 border-t border-gray-100 text-center bg-gray-50">
                <a href="#" class="text-sm font-medium text-emerald-600 hover:text-emerald-800 inline-flex items-center justify-center">
                    Lihat Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- New Banner Slider Section -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
            <!-- Slider Container with adjusted height -->
            <div class="swiper sidebar-banner-slider aspect-[16/9]">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <a href="#" class="block relative h-full">
                            <img src="{{ asset('assets/img/banner.jpeg') }}"
                                 alt="Banner 1"
                                 class="w-full h-full object-contain bg-gray-100">
                        </a>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <a href="#" class="block relative h-full">
                            <img src="{{ asset('assets/img/banner2.jpeg') }}"
                                 alt="Banner 2"
                                 class="w-full h-full object-contain bg-gray-100">
                        </a>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !bottom-1"></div>

                <!-- Navigation Buttons -->
                <button class="swiper-button-next !right-2 !text-white/80 hover:!text-white" aria-label="Next slide"></button>
                <button class="swiper-button-prev !left-2 !text-white/80 hover:!text-white" aria-label="Previous slide"></button>
            </div>
        </div>

        <!-- Digital Services - Improved Grid -->
        <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="px-5 py-4 border-b border-gray-100 flex items-center bg-gray-50">
                <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-800">Layanan Digital Populer</h3>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-2 gap-3 p-4">
                @foreach([
                    ['name' => 'SSO Kemenag', 'url' => 'https://sso.kemenag.go.id', 'icon' => 'key', 'color' => 'blue'],
                    ['name' => 'SIMKAH', 'url' => 'https://simkah.kemenag.go.id', 'icon' => 'users', 'color' => 'green'],
                    ['name' => 'EMIS', 'url' => 'https://emis.kemenag.go.id', 'icon' => 'academic-cap', 'color' => 'purple'],
                    ['name' => 'SIHAT', 'url' => 'https://sihat.kemenag.go.id', 'icon' => 'heart', 'color' => 'red']
                ] as $service)
                <a href="{{ $service['url'] }}" target="_blank" class="group">
                    <div class="p-3 rounded-lg bg-{{ $service['color'] }}-50 hover:bg-{{ $service['color'] }}-100 transition-colors duration-200 text-center">
                        <div class="w-10 h-10 mx-auto mb-2 rounded-lg bg-white border border-{{ $service['color'] }}-200 flex items-center justify-center group-hover:shadow-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $service['color'] }}-600" viewBox="0 0 20 20" fill="currentColor">
                                @if($service['icon'] == 'key')
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                @elseif($service['icon'] == 'users')
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                @elseif($service['icon'] == 'academic-cap')
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                @elseif($service['icon'] == 'heart')
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                @endif
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 group-hover:text-{{ $service['color'] }}-600">{{ $service['name'] }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Opinion Section - Improved -->
        <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="px-5 py-4 border-b border-gray-100 flex items-center bg-gray-50">
                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-gray-800">Kolom Opini</h3>
            </div>

            @if($opinions && $opinions->count() > 0)
            <div class="divide-y divide-gray-100">
                @foreach($opinions as $opinion)
                <article class="px-4 py-3 hover:bg-gray-50 transition-colors duration-150">
                    <a href="{{ route('opini.detail', $opinion->slug) }}" class="flex gap-3 items-start">
                        <!-- Author Avatar -->
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-800 font-medium">
                            {{ strtoupper(substr($opinion->narasumber, 0, 1)) }}
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-medium text-gray-800 line-clamp-2 hover:text-amber-600 transition-colors">
                                {{ $opinion->judul }}
                            </h4>
                            <p class="text-xs text-gray-500 mt-1">Oleh: {{ $opinion->narasumber }}</p>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>

            <!-- Footer -->
            <div class="px-4 py-3 border-t border-gray-100 text-center bg-gray-50">
                <a href="#" class="text-sm font-medium text-amber-600 hover:text-amber-800 inline-flex items-center justify-center">
                    Lihat Semua Opini
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            @else
            <!-- Empty State -->
            <div class="p-6 text-center">
                <div class="mx-auto w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500">Belum ada opini tersedia</p>
            </div>
            @endif
        </div>
    </div>
</aside>
