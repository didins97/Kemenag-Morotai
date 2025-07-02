<!-- Floating Button (keep your existing button) -->
    <button id="toggleSambutan" aria-label="Buka Sambutan Kepala Kantor"
        class="fixed left-0 top-1/2 -translate-y-1/2 z-50
     bg-gradient-to-br from-emerald-600 to-teal-500 text-white
     w-10 h-10 rounded-r-lg shadow-lg hover:shadow-xl
     flex items-center justify-center
     border-l-0 border-r border-t border-b border-emerald-700/30
     hover:from-emerald-700 hover:to-teal-600
     transition-all duration-300
     group animate-soft-glow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
        </svg>
        <span
            class="absolute inset-0 rounded-r-lg bg-emerald-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></span>
    </button>

    <!-- Overlay -->
    <div id="sambutanOverlay" class="fixed inset-0 bg-black/50 z-[9998] hidden opacity-0 transition-opacity duration-300">
    </div>

    <!-- Side Panel -->
    <div id="sambutanPanel"
        class="fixed left-0 top-0 h-full w-80 max-w-full bg-white shadow-xl z-[9999] transform -translate-x-full transition-transform duration-300 ease-in-out">
        <!-- Panel Header -->
        <div class="h-48 bg-gradient-to-br from-emerald-500 to-teal-600 relative">
            <!-- Close Button -->
            <button id="closeSambutan" class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Profile Photo -->
            <div
                class="absolute -bottom-12 left-1/2 transform -translate-x-1/2 w-24 h-24 rounded-xl border-4 border-white shadow-lg overflow-hidden bg-white">
                @if ($kepalaKantor->foto)
                    <img src="{{ asset('storage/' . $kepalaKantor->foto) }}" alt="{{ $kepalaKantor->nama }}"
                        class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif
            </div>
        </div>

        <!-- Panel Content -->
        <div class="pt-16 pb-6 px-6 overflow-y-auto h-[calc(100%-12rem)]">
            <h3 class="text-xl font-bold text-center text-gray-800 mb-1">{{ $kepalaKantor->nama }}</h3>
            <p class="text-sm text-emerald-600 text-center font-medium mb-6">Kepala Kantor Kemenag Morotai</p>

            <div class="bg-emerald-50/50 rounded-lg p-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-400 mx-auto mb-3"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                </svg>
                <p class="text-gray-700 text-sm leading-relaxed text-center italic">
                    "{{ $kepalaKantor->sambutan }}"
                </p>
            </div>

            <div class="flex justify-center">
                <a href="#"
                    class="px-4 py-2 text-sm font-medium text-emerald-600 hover:text-emerald-800 flex items-center transition-colors">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
