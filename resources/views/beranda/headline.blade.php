<!-- Modern News Section - Clean Version (No Dark Mode) -->
<section class="modern-news py-16 bg-white">
    <div class="container mx-auto px-4 xl:px-0 max-w-7xl">
        <!-- Featured Layout -->
        <div class="featured-layout grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Primary Featured Article - Enhanced -->
                <article
                    class="relative group h-[450px] overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500">
                    <!-- Image with Stronger Gradient -->
                    <img src="{{ asset('storage/' . $beritaPilihan->gambar) }}" alt="{{ $beritaPilihan->judul }}"
                        class="absolute inset-0 w-full h-full object-cover transition-all duration-700 ease-out opacity-90 group-hover:opacity-100 group-hover:scale-105"
                        loading="lazy">

                    <!-- Enhanced Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

                    <!-- Content -->
                    <div
                        class="relative h-full flex flex-col justify-end p-8 transform transition-transform duration-500 group-hover:-translate-y-2">
                        <div class="max-w-2xl">
                            <span
                                class="inline-block mb-4 px-3 py-1 text-xs font-bold tracking-wider text-white uppercase bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full shadow-md">
                                Trending
                            </span>
                            <h1
                                class="text-xl md:text-2xl lg:text-3xl font-bold text-white leading-tight mb-4 drop-shadow-lg">
                                <a href="{{ route('berita.detail', $beritaPilihan->slug) }}" class="hover:text-emerald-300 transition-colors duration-300">
                                    {{ $beritaPilihan->judul }}
                                </a>
                            </h1>

                            <!-- Author and Date Info -->
                            <div class="flex flex-wrap items-center gap-4 text-white/90">
                                <div class="flex items-center group">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1 group-hover:text-emerald-300 transition-colors duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm group-hover:text-emerald-300 transition-colors duration-300">
                                        {{ \Carbon\Carbon::parse($beritaPilihan->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Action Button -->
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <button
                            class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white hover:bg-emerald-500 transition-all duration-300 shadow-lg hover:shadow-emerald-500/30 opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </button>
                        <button
                            class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-white hover:bg-emerald-500 transition-all duration-300 shadow-lg hover:shadow-emerald-500/30 opacity-0 group-hover:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </button>
                    </div>
                </article>

                <!-- Secondary Featured Articles - Enhanced -->
                {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($beritasPilihan as $index => $post)
                        <article
                            class="group relative h-64 overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                            <!-- Number Indicator -->
                            <span class="absolute top-4 left-4 z-10 text-2xl font-black text-white/70 drop-shadow-md">
                                {{ $index + 1 }}
                            </span>

                            <!-- Image -->
                            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                loading="lazy">

                            <!-- Stronger Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent">
                            </div>

                            <!-- Content -->
                            <div
                                class="relative h-full flex flex-col justify-end p-5 transform transition-transform duration-300 group-hover:-translate-y-2">
                                <span class="text-xs font-semibold text-emerald-300 mb-1 uppercase tracking-wider">
                                    {{ $post->kategori->kategori }}
                                </span>
                                <h3
                                    class="text-lg font-bold text-white mb-2 group-hover:text-emerald-300 transition-colors duration-300 line-clamp-2">
                                    <a href="#">{{ $post->judul }}</a>
                                </h3>
                                <p class="text-sm text-gray-300 mb-3 line-clamp-2">
                                    {{ Str::limit($post->deskripsi, 100) }}
                                </p>
                                <div class="flex items-center text-xs text-white/80">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>

                            <!-- Bookmark Button -->
                            <button
                                class="absolute top-3 right-3 p-2 rounded-full bg-black/30 hover:bg-emerald-500/90 transition-colors duration-300 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                            </button>
                        </article>
                    @endforeach
                </div> --}}
            </div>

            <!-- Trending Sidebar - Enhanced -->
            <aside class="lg:col-span-1">
                <div class="sticky top-6">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900">Trending Now</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>

                    <div class="space-y-5">
                        @foreach ($beritasPopuler as $post)
                            <article
                                class="group flex gap-3 items-start p-1 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                <span
                                    class="flex-shrink-0 text-2xl font-bold text-gray-300 group-hover:text-emerald-500 transition-colors duration-300">
                                    {{ $loop->iteration }}
                                </span>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs font-medium text-emerald-600 uppercase">
                                        {{ $post->kategori->kategori }}
                                    </span>
                                    <h4
                                        class="text-base font-semibold text-gray-800 mt-1 mb-1 group-hover:text-emerald-600 transition-colors duration-300 line-clamp-2">
                                        <a href="{{ route('berita.detail', $post->slug) }}">{{ $post->judul }}</a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mb-2 line-clamp-2">
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
