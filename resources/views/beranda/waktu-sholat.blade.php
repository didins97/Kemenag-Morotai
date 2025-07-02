<!-- Enhanced Prayer Times Section -->
<section class="prayer-times bg-gradient-to-b from-green-50 to-white py-12 px-4 sm:px-6 relative">
    <!-- Current Time Ribbon with Seconds -->
    <div class="absolute right-0 top-0 bg-green-600 text-white px-4 py-2 rounded-bl-lg shadow-md flex items-center z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-sm font-medium" id="real-time-clock">{{ date('H:i:s') }} </span>
    </div>

    <div class="container mx-auto max-w-7xl pt-8">
        <!-- Header -->
        <div class="text-center mb-12 relative">
            <div class="inline-flex flex-col items-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 relative pb-1">
                    <span class="relative">
                        Waktu Sholat
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-green-500 rounded-full"></span>
                    </span>
                </h2>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 text-gray-600 mt-2">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $jadwalSholat['lokasi']}}, {{ $jadwalSholat['daerah'] }}
                    </span>
                    <span class="text-gray-300">|</span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} / {{ $kalenderHijriyah['date'][1] }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Prayer Times Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
            <!-- Subuh -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center relative">
                <div class="w-14 h-14 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-moon text-xl text-green-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-green-600 mb-1">Subuh</h3>
                <div class="text-2xl font-bold text-gray-800 mb-1">{{ $jadwalSholat['jadwal']['subuh'] }}</div>
                <div class="text-xs text-gray-500">Imsak {{ $jadwalSholat['jadwal']['imsak'] }}</div>
            </div>

            <!-- Dhuha -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-amber-100 transition-colors">
                    <i class="fas fa-sun text-xl text-amber-500"></i>
                </div>
                <h3 class="text-sm font-semibold text-amber-500 mb-1">Dhuha</h3>
                <div class="text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dhuha'] }}</div>
            </div>

            <!-- Dzuhur -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-sun text-xl text-green-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-green-600 mb-1">Dzuhur</h3>
                <div class="text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dzuhur'] }}</div>
            </div>

            <!-- Ashar -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-green-100 transition-colors">
                    <i class="fas fa-cloud-sun text-xl text-green-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-green-600 mb-1">Ashar</h3>
                <div class="text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['ashar'] }}</div>
            </div>

            <!-- Maghrib -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-orange-100 transition-colors">
                    <i class="fas fa-sunset text-xl text-orange-500"></i>
                </div>
                <h3 class="text-sm font-semibold text-green-600 mb-1">Maghrib</h3>
                <div class="text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['maghrib'] }}</div>
                <div class="text-xs text-gray-500">Terbit {{ $jadwalSholat['jadwal']['terbit'] }}</div>
            </div>

            <!-- Isya -->
            <div class="prayer-card bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-indigo-100 transition-colors">
                    <i class="fas fa-moon-stars text-xl text-indigo-600"></i>
                </div>
                <h3 class="text-sm font-semibold text-green-600 mb-1">Isya</h3>
                <div class="text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['isya'] }}</div>
            </div>
        </div>

        <!-- Next Prayer with Countdown -->
        <div class="mt-6 text-center">
            <div class="inline-block px-4 py-2 bg-green-50 rounded-full">
                <p class="text-sm text-gray-700">
                    <span class="font-medium text-green-600" id="next-prayer-indicator">
                        Waktu Isya dalam <span id="countdown">2:15:00</span>
                    </span>
                </p>
            </div>
        </div>
    </div>
</section>
