<!-- Modern Prayer Times Section -->
    <section class="prayer-times bg-gradient-to-br from-green-50 via-white to-green-100 py-12 md:py-16 px-4 md:px-6 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-32 h-32 bg-green-100/30 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-40 h-40 bg-green-200/20 rounded-full translate-x-1/3 translate-y-1/3"></div>

        <div class="container mx-auto max-w-7xl pt-8 md:pt-12 relative z-10">
            <!-- Header -->
            <div class="text-center mb-10 md:mb-14">
                <div class="inline-flex flex-col items-center">
                    <div class="flex items-center justify-center gap-2 mb-2">
                        <div class="w-6 h-6 md:w-8 md:h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-clock text-green-600 text-sm md:text-base"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900">
                            Waktu Sholat
                        </h2>
                    </div>

                    <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-4"></div>

                    <div class="flex flex-col md:flex-row items-center justify-center gap-3 md:gap-5 text-gray-600 text-sm md:text-base">
                        <div class="flex items-center">
                            <i class="fa-solid fa-location-dot text-green-600 text-xs md:text-sm mr-1.5"></i>
                            <span> {{ $jadwalSholat['lokasi'] }}, {{ $jadwalSholat['daerah'] }}</span>
                        </div>

                        <div class="hidden md:block text-gray-300">|</div>

                        <div class="flex items-center">
                            <i class="fa-solid fa-calendar-day text-amber-500 text-xs md:text-sm mr-1.5"></i>
                            <span>
                                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} /
                                {{ $kalenderHijriyah['date'][1] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prayer Times Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 md:gap-4 lg:gap-5 mb-8 md:mb-12">
                <!-- Subuh -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center relative active-prayer">
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-play text-white text-xs"></i>
                    </div>
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-green-100 transition-colors">
                        <i class="fa-solid fa-moon text-green-600 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-green-600 mb-1">Subuh</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800 mb-1">{{ $jadwalSholat['jadwal']['subuh'] }}</div>
                    <div class="text-xs text-gray-500">
                        Imsak {{ $jadwalSholat['jadwal']['imsak'] }}
                    </div>
                </div>

                <!-- Dhuha -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-amber-100 transition-colors">
                        <i class="fa-solid fa-sun text-amber-500 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-amber-500 mb-1">Dhuha</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dhuha'] }}</div>
                </div>

                <!-- Dzuhur -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-green-100 transition-colors">
                        <i class="fa-solid fa-sun text-green-600 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-green-600 mb-1">Dzuhur</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['dzuhur'] }}</div>
                </div>

                <!-- Ashar -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-green-100 transition-colors">
                        <i class="fa-solid fa-cloud-sun text-green-600 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-green-600 mb-1">Ashar</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['ashar'] }}</div>
                </div>

                <!-- Maghrib -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-orange-100 transition-colors">
                        <i class="fa-solid fa-cloud-sun text-orange-500 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-green-600 mb-1">Maghrib</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['maghrib'] }}</div>
                </div>

                <!-- Isya -->
                <div class="prayer-card bg-white p-4 md:p-5 rounded-xl border border-gray-100 shadow-xs hover:shadow-md transition-all duration-300 group text-center">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-2 md:mb-3 group-hover:bg-indigo-100 transition-colors">
                        <i class="fa-solid fa-moon text-indigo-600 text-base md:text-lg"></i>
                    </div>
                    <h3 class="text-xs md:text-sm font-medium text-green-600 mb-1">Isya</h3>
                    <div class="text-xl md:text-2xl font-bold text-gray-800">{{ $jadwalSholat['jadwal']['isya'] }}</div>
                </div>
            </div>

            <!-- Next Prayer with Countdown -->
            <div class="mt-6 md:mt-8 text-center">
                <div class="inline-flex flex-col md:flex-row items-center justify-center gap-3 bg-white px-4 py-3 rounded-xl shadow-xs border border-gray-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-2">
                            <i class="fa-solid fa-clock text-green-600 text-sm"></i>
                        </div>
                        <p id="next-prayer-indicator" class="text-sm text-gray-700">
                            <span class="font-medium text-green-600">Waktu sholat berikutnya</span>
                        </p>
                    </div>
                    <div id="countdown" class="bg-green-50 text-green-700 font-bold px-3 py-1.5 rounded-lg text-lg">
                        --:--:--
                    </div>
                </div>
            </div>
        </div>
    </section>
