<header class="bg-white shadow-md border-b border-gray-100 hidden md:block">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center justify-between header-content">
            <div class="flex items-center gap-4 logo-container">
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo Kemenag"
                    class="w-14 h-14 object-contain logo">
                <div class="site-info">
                    <h1 class="text-xl font-extrabold text-emerald-900 site-title tracking-tight">KEMENAG MOROTAI</h1>
                    <p class="text-sm text-gray-500 site-subtitle">Kantor Kemenag Kabupaten Pulau Morotai</p>
                </div>
            </div>
            <div class="banner-container w-1/3 h-14 overflow-hidden hidden lg:block">
                <div class="banner-slider">
                    <img src="{{ asset('assets/img/banner1.jpg') }}" alt="Banner 1"
                        class="w-full h-full object-cover rounded-lg shadow-inner">
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="sticky top-0 z-50 bg-white shadow-lg main-nav border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 nav-container">
        <div class="flex justify-between items-center h-14">

            <a href="/"
                class="flex items-center md:hidden text-emerald-800 font-bold text-lg tracking-wider z-[60]">
                <img src="{{ asset('assets/img/logokemenag.png') }}" alt="Logo" class="w-7 h-7 mr-2">
                MOROTAI
            </a>

            <div class="hidden md:flex items-stretch space-x-1 desktop-nav h-14">
                <a href="/"
                    class="flex items-center h-12 px-4 text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg font-semibold transition duration-200">
                    Beranda
                </a>

                <div class="relative group h-12 flex items-center">
                    <button
                        class="nav-link text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 px-4 h-full rounded-lg font-semibold flex items-center transition duration-200">
                        Profil
                        <svg class="w-4 h-4 ml-1 transition duration-300 group-hover:rotate-180 text-emerald-600"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div
                        class="absolute top-full left-0 w-60 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 dropdown-menu-wrapper z-50">
                        <div class="dropdown-content">
                            <div class="py-1">
                                <a href="{{ route('profile.sejarah') }}"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">Sejarah</a>
                                <a href="{{ route('profile.visi-misi') }}"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">Visi & Misi</a>
                            </div>
                            <div class="py-1 border-t border-gray-100 relative group/sub">
                                <button
                                    class="w-full text-left flex justify-between items-center px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">
                                    Unit Kerja
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-full top-0 w-56 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible submenu-wrapper transition-all duration-200">
                                    <div class="submenu-content py-1">
                                        @foreach ($unitKerjas as $unit)
                                            <a href="{{ route('profile.unit-kerja', $unit->slug) }}"
                                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">{{ $unit->nama_unit }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}"
                    class="flex items-center h-12 px-4 text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg font-semibold transition duration-200">
                    Berita
                </a>

                <div class="relative group h-12 flex items-center">
                    <button
                        class="nav-link text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 px-4 h-full rounded-lg font-semibold flex items-center transition duration-200">
                        Layanan Publik
                        <svg class="w-4 h-4 ml-1 transition duration-300 group-hover:rotate-180 text-emerald-600"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 dropdown-menu-wrapper z-50">
                        <div class="dropdown-content">
                            <div class="py-1">
                                <a href="{{ route('layanan.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">PTSP</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">IKM</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative group h-12 flex items-center">
                    <button
                        class="nav-link text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 px-4 h-full rounded-lg font-semibold flex items-center transition duration-200">
                        Data & Informasi
                        <svg class="w-4 h-4 ml-1 transition duration-300 group-hover:rotate-180 text-emerald-600"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 dropdown-menu-wrapper z-50">
                        <div class="dropdown-content">
                            <div class="py-1">
                                @foreach ($informasi as $info)
                                    <a href="{{ route('informasi.detail', $info->slug) }}"
                                        class="block px-4 py-2 text-sm text-gray-800 hover:bg-emerald-50">{{ $info->judul }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('pengaduan.index') }}"
                    class="flex items-center h-12 px-4 text-gray-800 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg font-semibold transition duration-200">
                    Pengaduan Masyarakat
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <button class="text-gray-700 hover:text-emerald-500 p-1 rounded transition duration-150">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                <button class="mobile-menu-button md:hidden text-gray-700 hover:text-emerald-500 p-1 rounded z-[110]"
                    id="mobileMenuButton">
                    <svg class="w-6 h-6 menu-icon" id="icon-menu" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 close-icon hidden" id="icon-close" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-overlay"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-100 hidden md:hidden transition-opacity duration-300 opacity-0">
    </div>

    <div id="mobile-menu"
        class="fixed top-0 left-0 w-80 max-w-[80vw] h-full
                transform -translate-x-full transition-transform duration-500 ease-in-out
                md:hidden z-[105] shadow-2xl bg-white overflow-y-auto">

        <div class="py-4 px-4 border-b border-gray-100 bg-emerald-600">
            <h4 class="text-lg font-bold text-white">Menu Navigasi</h4>
            <p class="text-xs text-emerald-100">Kemenag Kabupaten Pulau Morotai</p>
        </div>

        <div class="p-4 space-y-1">

            <a href="/"
                class="block px-3 py-2 text-gray-800 text-base font-semibold hover:bg-emerald-50 rounded-lg transition duration-150">
                <i class="fa-solid fa-home w-4 mr-2 text-emerald-600"></i> Beranda
            </a>

            <div class="border-t border-gray-100 mt-2 pt-2">
                <button
                    class="w-full text-left px-3 py-2 text-gray-800 text-base font-semibold flex justify-between items-center hover:bg-emerald-50 rounded-lg transition duration-150"
                    onclick="toggleMobileSubmenu('profile-mobile')">
                    <span class="flex items-center"><i class="fa-solid fa-user-tie w-4 mr-2 text-emerald-600"></i>
                        Profil</span>
                    <svg class="w-4 h-4 ml-1 transform transition duration-300 text-emerald-500"
                        id="profile-mobile-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div id="profile-mobile" class="hidden pl-4 pb-2 space-y-1 bg-gray-50 rounded-b-lg">
                    <a href="{{ route('profile.sejarah') }}"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Sejarah</a>
                    <a href="{{ route('profile.visi-misi') }}"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Visi
                        & Misi</a>
                    <a href="{{ route('profile.tugas-fungsi') }}"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Tugas
                        & Fungsi</a>
                    <a href="{{ route('profile.struktur-organisasi') }}"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Struktur
                        Organisasi</a>

                    <div class="pl-2 border-t border-gray-100 pt-1">
                        <button
                            class="w-full text-left px-2 py-1.5 text-sm text-gray-700 font-medium flex justify-between items-center hover:bg-emerald-100 rounded transition duration-150"
                            onclick="toggleMobileSubmenu('unitkerja-mobile')">
                            Unit Kerja
                            <svg class="w-3 h-3 ml-1 transform transition duration-300 text-emerald-500"
                                id="unitkerja-mobile-arrow" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <div id="unitkerja-mobile" class="hidden pl-2 space-y-1">
                            @foreach ($unitKerjas as $unit)
                                <a href="{{ route('profile.unit-kerja', $unit->slug) }}"
                                    class="block px-4 py-1 text-xs text-gray-600 hover:bg-emerald-200 rounded transition duration-150">{{ $unit->nama_unit }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('berita.index') }}"
                class="block px-3 py-2 text-gray-800 text-base font-semibold hover:bg-emerald-50 rounded-lg transition duration-150 border-t border-gray-100 mt-2 pt-2">
                <i class="fa-solid fa-newspaper w-4 mr-2 text-emerald-600"></i> Berita
            </a>

            <div class="border-t border-gray-100 mt-2 pt-2">
                <button
                    class="w-full text-left px-3 py-2 text-gray-800 text-base font-semibold flex justify-between items-center hover:bg-emerald-50 rounded-lg transition duration-150"
                    onclick="toggleMobileSubmenu('layanan-mobile')">
                    <span class="flex items-center"><i class="fa-solid fa-headset w-4 mr-2 text-emerald-600"></i>
                        Layanan Publik</span>
                    <svg class="w-4 h-4 ml-1 transform transition duration-300 text-emerald-500"
                        id="layanan-mobile-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div id="layanan-mobile" class="hidden pl-4 pb-2 space-y-1 bg-gray-50 rounded-b-lg">
                    <a href="{{ route('layanan.index') }}"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Pelayanan
                        Terpadu Satu Pintu (PTSP)</a>
                    <a href="#"
                        class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">Index
                        Kepuasan Masyarakat (IKM)</a>
                </div>
            </div>

            <div class="border-t border-gray-100 mt-2 pt-2">
                <button
                    class="w-full text-left px-3 py-2 text-gray-800 text-base font-semibold flex justify-between items-center hover:bg-emerald-50 rounded-lg transition duration-150"
                    onclick="toggleMobileSubmenu('data-mobile')">
                    <span class="flex items-center"><i class="fa-solid fa-database w-4 mr-2 text-emerald-600"></i>
                        Data & Informasi</span>
                    <svg class="w-4 h-4 ml-1 transform transition duration-300 text-emerald-500"
                        id="data-mobile-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div id="data-mobile" class="hidden pl-4 pb-2 space-y-1 bg-gray-50 rounded-b-lg">
                    @foreach ($informasi as $info)
                        <a href="{{ route('informasi.detail', $info->slug) }}"
                            class="block px-4 py-1.5 text-sm text-gray-700 hover:bg-emerald-100 rounded transition duration-150">{{ $info->judul }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('pengaduan.index') }}"
                class="block px-3 py-2 text-gray-800 text-base font-semibold hover:bg-emerald-50 rounded-lg transition duration-150 border-t border-gray-100 mt-2 pt-2">
                <i class="fa-solid fa-comments w-4 mr-2 text-emerald-600"></i> Pengaduan Masyarakat
            </a>

        </div>
    </div>
</nav>
