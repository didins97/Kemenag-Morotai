<!-- Enhanced Prayer Times Section - Mobile Optimized -->
<section class="prayer-times bg-gradient-to-b from-green-50 to-white py-8 sm:py-12 px-4 sm:px-6 relative">
    <div class="container mx-auto max-w-7xl pt-4 sm:pt-8">
        <!-- Header - Mobile Adjusted -->
        <div class="text-center mb-6 sm:mb-10 relative">
            <div class="inline-flex flex-col items-center">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2 relative pb-1">
                    <span class="relative">
                        Waktu Sholat
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-10 sm:w-12 h-0.5 sm:h-1 bg-green-500 rounded-full"></span>
                    </span>
                </h2>
                <div class="flex flex-col items-center justify-center gap-1 sm:gap-2 text-gray-600 mt-2 text-xs sm:text-sm md:text-base">
                    <div class="flex flex-wrap justify-center items-center gap-x-2 gap-y-1">
                        <span class="flex items-center whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 mr-1 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $jadwalSholat['lokasi']}}, {{ $jadwalSholat['daerah'] }}
                        </span>
                        <span class="hidden sm:inline text-gray-300 text-sm">|</span>
                    </div>
                    <div class="flex items-center whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} / {{ $kalenderHijriyah['date'][1] }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Prayer Times Grid - Mobile Adjusted -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 sm:gap-3 md:gap-4 mb-4 sm:mb-6 md:mb-8">
            <!-- Subuh -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center relative">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-moon text-sm sm:text-base md:text-lg text-green-600"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-green-600 mb-0.5">Subuh</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 mb-0.5">{{ $jadwalSholat['jadwal']['subuh'] }}</div>
                <div class="text-2xs sm:text-xs text-gray-500">Imsak {{ $jadwalSholat['jadwal']['imsak'] }}</div>
            </div>

            <!-- Dhuha -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-amber-100 transition-colors">
                    <i class="fas fa-sun text-sm sm:text-base md:text-lg text-amber-500"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-amber-500 mb-0.5">Dhuha</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dhuha'] }}</div>
            </div>

            <!-- Dzuhur -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-sun text-sm sm:text-base md:text-lg text-green-600"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-green-600 mb-0.5">Dzuhur</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dzuhur'] }}</div>
            </div>

            <!-- Ashar -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-cloud-sun text-sm sm:text-base md:text-lg text-green-600"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-green-600 mb-0.5">Ashar</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['ashar'] }}</div>
            </div>

            <!-- Maghrib -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-orange-100 transition-colors">
                    <i class="fas fa-sunset text-sm sm:text-base md:text-lg text-orange-500"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-green-600 mb-0.5">Maghrib</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['maghrib'] }}</div>
                <div class="text-2xs sm:text-xs text-gray-500">Terbit {{ $jadwalSholat['jadwal']['terbit'] }}</div>
            </div>

            <!-- Isya -->
            <div class="prayer-card bg-white p-2 sm:p-3 md:p-4 rounded-lg border border-gray-100 shadow-xs hover:shadow-sm transition-all duration-200 group text-center">
                <div class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-1 sm:mb-2 group-hover:bg-indigo-100 transition-colors">
                    <i class="fas fa-moon-stars text-sm sm:text-base md:text-lg text-indigo-600"></i>
                </div>
                <h3 class="text-xs sm:text-sm font-medium text-green-600 mb-0.5">Isya</h3>
                <div class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['isya'] }}</div>
            </div>
        </div>

        <!-- Next Prayer with Countdown - Mobile Adjusted -->
        <div class="mt-3 sm:mt-5 text-center">
            <div class="inline-block px-3 py-1 bg-green-50 rounded-full">
                <p class="text-xs sm:text-sm text-gray-700">
                    <span class="font-medium text-green-600" id="next-prayer-indicator">
                        Waktu Isya dalam <span id="countdown" class="font-bold">2:15:00</span>
                    </span>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="h-0 sm:h-4 bg-white"></div>
