<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-green-border transition-all duration-300"
    id="mainNav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <a href="/" class="hidden md:flex items-center space-x-4 group">
                <div class="relative flex-shrink-0">
                    <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo Kemenag"
                        class="w-10 h-10 transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-green-primary rounded-full ring-2 ring-white">
                    </div>
                </div>

                <!-- Garis pembatas vertikal halus -->
                <div class="h-8 w-px bg-gray-200 transition-colors group-hover:bg-green-border"></div>

                <div class="flex flex-col justify-center">
                    <span class="font-bold text-gray-800 text-sm tracking-wide uppercase font-sans">
                        Kementerian Agama
                    </span>
                    <span
                        class="text-[11px] font-medium tracking-wider text-gray-500 uppercase font-sans group-hover:text-green-primary transition-colors duration-200">
                        Kab. Pulau Morotai
                    </span>
                </div>
            </a>

            <!-- Mobile Logo Section -->
            <a href="/" class="flex md:hidden items-center space-x-2">
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo Kemenag" class="w-8 h-8">
                <span class="font-bold bg-green-gradient bg-clip-text text-transparent font-sans">Morotai</span>
            </a>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="/"
                    class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-green-primary hover:bg-green-light-bg transition-all duration-200 rounded-lg">
                    Beranda
                </a>

                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-green-primary hover:bg-green-light-bg transition-all duration-200 rounded-lg">
                        Profil
                        <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180 text-gray-400 group-hover:text-green-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Wrapper Dropdown Diperhalus dengan shadow-xl dan border halus -->
                    <div
                        class="absolute top-full left-0 w-60 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50 pt-2">

                        <!-- FIX: 'overflow-hidden' DI SINI SUDAH DIHAPUS -->
                        <div class="bg-white border border-green-border rounded-xl shadow-xl py-1.5">

                            <!-- Menambahkan rounded-t-lg agar hover item paling atas pas dengan lekukan border induk -->
                            <a href="{{ route('profile.sejarah') }}"
                                class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors rounded-t-lg">
                                Sejarah
                            </a>

                            <a href="{{ route('profile.visi-misi') }}"
                                class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors">
                                Visi & Misi
                            </a>

                            <!-- Submenu Unit Kerja -->
                            <div class="relative group/sub">
                                <!-- Menambahkan rounded-b-lg agar hover item paling bawah pas dengan lekukan border induk -->
                                <button
                                    class="w-full text-left flex justify-between items-center px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors rounded-b-lg">
                                    <span>Unit Kerja</span>
                                    <svg class="w-3.5 h-3.5 text-gray-400 group-hover/sub:text-green-primary transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <!-- Submenu kini bebas meluncur ke samping tanpa terpotong -->
                                <!-- Di Tailwind v4, gunakan z-50 sebagai nilai lapisan tertinggi standar (z-100 tidak ada di utility default) -->
                                <div
                                    class="absolute left-full top-0 w-60 opacity-0 invisible translate-x-2 group-hover/sub:opacity-100 group-hover/sub:visible group-hover/sub:translate-x-0 transition-all duration-200 pl-1 z-50">
                                    <div
                                        class="bg-white border border-green-border rounded-xl shadow-xl py-1.5 max-h-64 overflow-y-auto">
                                        @foreach ($unitKerjas as $unit)
                                            <a href="{{ route('profile.unit-kerja', $unit->slug) }}"
                                                class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors first:rounded-t-lg last:rounded-b-lg">
                                                {{ $unit->nama_unit }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-green-primary hover:bg-green-light-bg transition-all duration-200 rounded-lg">
                    Berita
                </a>

                <!-- Dropdown Layanan -->
                <div class="relative group">
                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-green-primary hover:bg-green-light-bg transition-all duration-200 rounded-lg">
                        Layanan
                        <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180 text-gray-400 group-hover:text-green-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 w-56 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50 pt-2">
                        <div class="bg-white border border-green-border rounded-xl shadow-xl py-1.5 overflow-hidden">
                            <a href="{{ route('layanan.index') }}"
                                class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors">
                                PTSP Online
                            </a>
                            <a href="#"
                                class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors">
                                IKM
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dropdown Data & Informasi -->
                <div class="relative group">
                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-green-primary hover:bg-green-light-bg transition-all duration-200 rounded-lg">
                        Data & Info
                        <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180 text-gray-400 group-hover:text-green-primary"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 w-64 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-200 z-50 pt-2">
                        <div
                            class="bg-white border border-green-border rounded-xl shadow-xl py-1.5 max-h-72 overflow-y-auto">
                            @foreach ($informasi as $info)
                                <a href="{{ route('informasi.detail', $info->slug) }}"
                                    class="block px-4 py-2.5 text-sm text-gray-600 hover:bg-green-light-bg hover:text-green-primary transition-colors">
                                    {{ $info->judul }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi Utama Pengaduan: Menggunakan warna kustom solid & interaksi dinamis -->
                <a href="{{ route('pengaduan.index') }}"
                    class="inline-flex items-center px-5 py-2 rounded-full text-sm font-semibold text-white bg-green-primary hover:bg-green-primary-dark transition-all duration-200 shadow-sm hover:shadow ml-2">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Pengaduan
                </a>
            </div>

            <!-- Right Functional Action Area -->
            <div class="flex items-center space-x-2">
                <button id="searchButton"
                    class="p-2.5 text-gray-500 hover:text-green-primary hover:bg-green-light-bg rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <button id="mobileMenuButton"
                    class="md:hidden p-2.5 text-gray-500 hover:text-green-primary hover:bg-green-light-bg rounded-xl transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
</nav>

<div id="mobileMenu" class="fixed inset-0 z-[100] md:hidden invisible opacity-0 transition-all duration-300">
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm shadow-inner" id="mobileMenuBackdrop"></div>

    <div class="absolute right-0 top-0 h-full w-[300px] bg-white shadow-2xl translate-x-full transition-transform duration-300 flex flex-col"
        id="mobileMenuContent">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-green-light-bg">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo" class="w-8 h-8">
                <span class="font-bold text-gray-800 text-sm tracking-tight uppercase">Menu Utama</span>
            </div>
            <button id="closeMobileMenu" class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex-grow overflow-y-auto py-4 px-4 space-y-1">
            <a href="/"
                class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-green-light-bg hover:text-green-primary rounded-xl transition-all">
                Beranda
            </a>

            <div class="mobile-dropdown">
                <button
                    class="w-full flex justify-between items-center px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-green-light-bg rounded-xl transition-all">
                    <span>Profil</span>
                    <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Submenu Level 1 --}}
                <div class="hidden pl-4 space-y-1 mt-1 pb-2">
                    <a href="{{ route('profile.sejarah') }}"
                        class="block px-4 py-2.5 text-xs font-medium text-gray-500 hover:text-green-primary border-l-2 border-gray-100 ml-2">
                        Sejarah
                    </a>
                    <a href="{{ route('profile.visi-misi') }}"
                        class="block px-4 py-2.5 text-xs font-medium text-gray-500 hover:text-green-primary border-l-2 border-gray-100 ml-2">
                        Visi & Misi
                    </a>

                    {{-- Submenu Level 2: Unit Kerja --}}
                    <div class="mobile-dropdown-sub ml-2">
                        <button
                            class="w-full flex justify-between items-center px-4 py-2.5 text-xs font-medium text-gray-500 hover:text-green-primary border-l-2 border-gray-100 transition-all">
                            <span>Unit Kerja</span>
                            <svg class="w-3 h-3 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 space-y-1 mt-1">
                            @foreach ($unitKerjas as $unit)
                                <a href="{{ route('profile.unit-kerja', $unit->slug) }}"
                                    class="block px-4 py-2 text-[11px] text-gray-400 hover:text-green-primary border-l border-gray-100">
                                    {{ $unit->nama_unit }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('berita.index') }}"
                class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-green-light-bg hover:text-green-primary rounded-xl transition-all">
                Berita
            </a>

            <a href="{{ route('layanan.index') }}"
                class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 hover:bg-green-light-bg hover:text-green-primary rounded-xl transition-all">
                Layanan
            </a>

            <div class="pt-6 px-4">
                <a href="{{ route('pengaduan.index') }}"
                    class="flex items-center justify-center space-x-2 w-full py-3 bg-green-primary text-white rounded-xl font-bold text-sm shadow-lg shadow-green-primary/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Ajukan Pengaduan</span>
                </a>
            </div>
        </div>

        <div class="p-6 border-t border-gray-50 bg-gray-50">
            <p class="text-[10px] text-gray-400 text-center font-medium uppercase tracking-widest">
                © 2026 Kemenag Pulau Morotai
            </p>
        </div>
    </div>
</div>
