<!-- Centered Image Banner Popup -->
<div id="imageBannerPopup" class="fixed inset-0 z-[9999] hidden flex items-center justify-center bg-black/50 p-4 backdrop-blur-sm">
  <!-- Main Content Container - Centered -->
  <div class="relative mx-auto w-full max-w-4xl animate-scaleIn">

    <!-- Close Button -->
    <button id="closeBannerBtn" class="absolute -top-12 right-0 z-10 text-white hover:text-emerald-300 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
      <span class="sr-only">Close</span>
    </button>

    <!-- Banner Image Container -->
    <div class="relative group rounded-xl overflow-hidden shadow-2xl border-4 border-white">
      <a href="#your-link-here" target="_blank" class="block">
        <!-- Responsive Banner Image -->
        <img src="{{ asset('assets/img/banner3.png') }}"
             alt="Promotional Banner"
             class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105"
             loading="lazy">

        <!-- Optional Countdown Badge -->
        <div class="absolute top-4 right-4 bg-black/70 text-white text-sm px-3 py-1 rounded-full">
          <span id="bannerCountdown">5</span>s
        </div>
      </a>
    </div>

    <!-- Optional Footer - Centered -->
    <div class="flex justify-center mt-2">
      <button id="disableBannerBtn" class="text-xs text-white/80 hover:text-white underline">
        Jangan tampilkan lagi
      </button>
    </div>
  </div>
</div>
