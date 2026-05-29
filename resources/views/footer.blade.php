<!-- Footer Menggunakan Class Gradasi Kustom Tailwind v4 -->
<footer class="bg-green-gradient text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 md:gap-8 lg:gap-12">

            <!-- Kolom Brand Logo & Media Sosial -->
            <div class="col-span-2 md:col-span-1 space-y-6 order-1">
                <div class="flex items-start space-x-4">
                    <div class="bg-white p-2 rounded-xl shadow-xl flex-shrink-0">
                        <img src="{{ asset('assets') }}/img/logokemenag.png" alt="Logo Kemenag Morotai" class="h-10 w-auto">
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold tracking-tight">KEMENAG MOROTAI</h2>
                        <p class="text-white/90 text-sm">Kementerian Agama Kabupaten</p>
                    </div>
                </div>

                <p class="text-white/90 leading-relaxed text-sm max-w-sm">
                    Pelayanan publik dan keagamaan yang profesional di Pulau Morotai.
                </p>

                <div>
                    <!-- Menggunakan border-green-soft langsung dari Tailwind v4 -->
                    <h4 class="text-yellow-400 mb-3 font-semibold text-base border-b border-green-soft pb-1 w-fit">Ikuti Kami</h4>
                    <div class="flex space-x-4 text-xl">
                        <a href="https://www.facebook.com/KemenagMorotai" class="text-white/80 hover:text-yellow-300 transition duration-200 hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/kemenagmorotai/" class="text-white/80 hover:text-yellow-300 transition duration-200 hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@humaskemenagmorotai?si=4LBHYiuYcAFvvmzm" class="text-white/80 hover:text-yellow-300 transition duration-200 hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@kemenagmorotai?_r=1&_t=ZS-92cZPyB6gmC" class="text-white/80 hover:text-yellow-300 transition duration-200 hover:scale-110">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom Navigasi Utama -->
            <div class="space-y-4 order-2 md:order-2">
                <!-- Menggunakan border-green-primary-light langsung dari Tailwind v4 -->
                <h3 class="text-lg font-bold border-b border-green-primary-light pb-2">Navigasi Utama</h3>
                <ul class="space-y-3 text-sm text-white/90">
                    <li>
                        <a href="{{ route('beranda') }}" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-chevron-right text-xs text-yellow-400 opacity-75"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.visi-misi') }}" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-chevron-right text-xs text-yellow-400 opacity-75"></i> Profil Kantor
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-chevron-right text-xs text-yellow-400 opacity-75"></i> Berita Terbaru
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('layanan.index') }}" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-chevron-right text-xs text-yellow-400 opacity-75"></i> Layanan Publik
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom Aplikasi Layanan -->
            <div class="space-y-4 order-3 md:order-3">
                <h3 class="text-lg font-bold border-b border-green-primary-light pb-2">Aplikasi Layanan</h3>
                <ul class="space-y-3 text-sm text-white/90">
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-external-link-alt text-xs text-yellow-400 opacity-75"></i> Mooc Pintar
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-external-link-alt text-xs text-yellow-400 opacity-75"></i> EMIS
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-external-link-alt text-xs text-yellow-400 opacity-75"></i> Simdummas
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-yellow-300 transition duration-150">
                            <i class="fas fa-external-link-alt text-xs text-yellow-400 opacity-75"></i> Lapor
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom Kontak Kami -->
            <div class="space-y-4 col-span-2 md:col-span-1 order-4 md:order-4">
                <h3 class="text-lg font-bold border-b border-green-primary-light pb-2">Kontak Kami</h3>
                <ul class="space-y-4 text-white/90 text-sm">
                    <li class="flex gap-3">
                        <i class="fas fa-map-marker-alt text-yellow-400 text-lg mt-0.5 flex-shrink-0"></i>
                        <span>
                            Jalan Raya Daruba, Kecamatan Morotai Selatan,
                            Kabupaten Pulau Morotai
                        </span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <i class="fas fa-phone-alt text-yellow-400 text-lg flex-shrink-0"></i>
                        <span>0813 4216 5567</span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <i class="fas fa-envelope text-yellow-400 text-lg flex-shrink-0"></i>
                        <span>kemenagmorotai@gmail.com</span>
                    </li>
                    <li class="flex gap-3 items-center">
                        <i class="far fa-clock text-yellow-400 text-lg flex-shrink-0"></i>
                        <span>Senin - Jumat: 08:00 - 16:00 WIT</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bagian Copyright -->
        <div class="border-t border-white/20 mt-12 pt-6">
            <div class="max-w-7xl mx-auto text-center">
                <p class="text-white/80 text-sm">
                    © {{ date('Y') }} Kementerian Agama Kabupaten Pulau Morotai. All Rights Reserved.
                </p>
                <p class="text-white/60 text-xs mt-1">
                    Developed & Designed by
                    <a href="https://github.com/didins97" target="_blank"
                        class="font-semibold text-yellow-400 hover:text-yellow-300 transition-colors underline underline-offset-2">
                        Didin Sibua
                    </a>
                    <span class="text-white/60"> | Versi 2.0</span>
                </p>
            </div>
        </div>

    </div>
</footer>
