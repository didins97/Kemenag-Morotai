<aside class="lg:block lg:w-1/3">
    <div class="space-y-6 sticky top-4">
        <!-- Berita Terbaru Section -->
        <div
            class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden transition-all hover:shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
            <div class="px-6 pt-5 pb-4 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </span>
                    <span>Berita Terbaru</span>
                </h3>
            </div>

            <div class="divide-y divide-gray-100">
                @foreach ($terbaru as $news)
                    <article class="group px-6 py-4 hover:bg-gray-50/50 transition-colors">
                        <div class="flex gap-4">
                            <div
                                class="flex-shrink-0 relative w-16 h-16 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                                <img src="{{ $news->gambar ? asset('storage/' . $news->gambar) : '/assets/img/bg1.jpeg' }}"
                                    alt="{{ $news->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span
                                    class="inline-block px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide rounded-full bg-green-100 text-green-800">
                                    {{ $news->kategori->kategori ?? 'Berita' }}
                                </span>
                                <h4 class="text-sm font-semibold text-gray-900 mt-2 line-clamp-2 leading-tight">
                                    <a href="{{ route('berita.detail', $news->slug) }}"
                                        class="hover:text-emerald-600 transition-colors">
                                        {{ $news->judul }}
                                    </a>
                                </h4>
                                <div class="flex items-center text-xs text-gray-500 mt-2 space-x-2">
                                    <span>{{ $news->created_at->format('d M Y') }}</span>
                                    <span class="text-gray-300">•</span>
                                    @php
                                        $wordCount = str_word_count(strip_tags($news->isi));
                                        $readingTime = max(1, round($wordCount / 200));
                                    @endphp
                                    <span>{{ $readingTime }} mnt baca</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="px-6 py-3 border-t border-gray-100">
                <a href="#"
                    class="text-sm font-medium text-emerald-600 hover:text-emerald-800 transition-colors flex items-center justify-center">
                    Lihat Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Link Cepat Section -->
        <div
            class="bg-white rounded-2xl shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden transition-all hover:shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
            <div class="px-6 pt-5 pb-4 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </span>
                    <span>Layanan Digital Populer</span>
                </h3>
            </div>

            <div class="grid grid-cols-2 gap-4 p-5">
                <!-- App Items with Modern Glass Morphism Effect -->
                <a href="https://sso.kemenag.go.id" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-blue-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-blue-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-blue-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">SSO
                            Kemenag</span>
                    </div>
                </a>

                <!-- Repeat similar structure for other apps with different colors -->
                <!-- SIMKAH -->
                <a href="https://simkah.kemenag.go.id" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-green-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-green-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-green-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-green-600 transition-colors">SIMKAH</span>
                    </div>
                </a>

                <!-- SIMPONI -->
                <a href="https://emis.kemenag.go.id/" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-green-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-green-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-green-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <i class="fas fa-graduation-cap text-2xl text-green-600"></i>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-green-600 transition-colors">EMIS</span>
                    </div>
                </a>

                <!-- SIHAT -->
                <a href="https://sihat.kemenag.go.id" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-orange-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-orange-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-orange-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-orange-600 transition-colors">SIHAT</span>
                    </div>
                </a>

                <!-- SIPADU -->
                <a href="https://sipadu.kemenag.go.id" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-red-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-red-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-red-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-red-600 transition-colors">SIPADU</span>
                    </div>
                </a>

                <!-- EMISPENDIS -->
                <a href="https://emispendis.kemenag.go.id" target="_blank" class="group relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-amber-500/5 backdrop-blur-sm rounded-xl transition-all duration-300 group-hover:bg-amber-500/10">
                    </div>
                    <div class="relative flex flex-col items-center p-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-white shadow-sm border border-amber-100 flex items-center justify-center mb-3 transition-all group-hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-semibold text-gray-700 group-hover:text-amber-600 transition-colors">EMISPENDIS</span>
                    </div>
                </a>
            </div>
        </div>

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
                                        <a href="{{ route('opini.detail', $opinion->slug) }}" class="hover:underline">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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
</aside>
