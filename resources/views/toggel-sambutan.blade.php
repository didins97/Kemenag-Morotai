<!-- Floating Button (Simplified) -->
<button id="toggleSambutan" aria-label="Buka Sambutan Kepala Kantor"
    class="fixed left-0 top-1/2 -translate-y-1/2 z-40
    bg-gradient-to-r from-green-700 to-emerald-800 text-white
    w-10 h-10 rounded-r-md shadow-md hover:shadow-lg
    flex items-center justify-center
    hover:from-green-800 hover:to-emerald-900
    transition-all duration-300
    group"
    style="z-index: 999">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
    </svg>
</button>

<!-- Overlay (Optimized) -->
<div id="sambutanOverlay" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Side Panel (Responsive) -->
<div id="sambutanPanel"
    class="fixed left-0 top-0 h-full w-80 max-w-full bg-white shadow-xl z-[80] transform -translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto"
    style="z-index: 9999">

    <!-- Panel Header -->
    <div class="h-48 bg-gradient-to-r from-green-700 to-emerald-800 relative">
        <!-- Close Button -->
        <button id="closeSambutan" class="absolute top-4 right-4 text-white/90 hover:text-white transition-colors">
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
                <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <!-- Panel Content -->
    <div class="pt-16 pb-6 px-5">
        <h3 class="text-xl font-bold text-center text-gray-900 mb-1">{{ $kepalaKantor->nama }}</h3>
        <p class="text-xs text-emerald-600 text-center font-medium mb-6">Kepala Kantor Kemenag Morotai</p>

        <!-- Quote Box -->
        <div class="bg-emerald-50 rounded-lg p-4 mb-6 border border-emerald-100">
            <p class="text-gray-700 text-sm leading-relaxed text-center italic">
                "{{ $kepalaKantor->sambutan }}"
            </p>
        </div>

        <!-- CTA Button -->
        <div class="flex justify-center">
            <a href="#"
                class="px-5 py-2 text-xs font-medium text-white bg-gradient-to-r from-green-600 to-emerald-700 rounded-md hover:from-green-700 hover:to-emerald-800 transition-colors shadow-sm flex items-center">
                Selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 ml-1.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</div>
