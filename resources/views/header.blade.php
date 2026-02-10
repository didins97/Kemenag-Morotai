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
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-md z-[100] hidden md:hidden transition-opacity duration-300 opacity-0"
        onclick="toggleMobileMenu()">
    </div>

    <div id="mobile-menu"
        class="fixed top-0 left-0 w-[80vw] max-w-[320px] h-full transform -translate-x-full transition-transform duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] md:hidden z-[105] bg-white flex flex-col shadow-2xl">

        <div class="px-6 pt-10 pb-6 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <img src="{{ asset('assets/img/logokemenag.png') }}" class="h-10 w-auto" alt="Logo Kemenag">
                <button onclick="toggleMobileMenu()"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 text-slate-500">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div>
                <h4 class="text-xl font-black text-slate-900 leading-none">Menu Utama</h4>
                <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-[0.2em] mt-2">Kabupaten Pulau
                    Morotai</p>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto px-4 pb-8">

            <div class="px-3 mb-2 mt-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Utama</div>

            <nav class="space-y-1">
                <a href="/"
                    class="flex items-center px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 rounded-xl transition-all group">
                    <i
                        class="fa-solid fa-house-user w-6 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3 text-[15px]">Beranda</span>
                </a>

                <div class="space-y-1">
                    <button onclick="toggleMobileSubmenu('profile-modern')"
                        class="w-full flex items-center justify-between px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 rounded-xl transition-all group">
                        <div class="flex items-center">
                            <i
                                class="fa-solid fa-building-columns w-6 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                            <span class="ml-3 text-[15px]">Profil</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-slate-300 transition-transform"
                            id="profile-modern-arrow"></i>
                    </button>
                    <div id="profile-modern"
                        class="hidden pl-10 pr-2 space-y-1 overflow-hidden transition-all duration-300">
                        <a href="{{ route('profile.sejarah') }}"
                            class="block py-2 text-[14px] text-slate-500 hover:text-emerald-600">Sejarah</a>
                        <a href="{{ route('profile.visi-misi') }}"
                            class="block py-2 text-[14px] text-slate-500 hover:text-emerald-600">Visi & Misi</a>

                        <button onclick="toggleMobileSubmenu('unit-modern')"
                            class="w-full text-left py-2 text-[14px] text-slate-700 font-bold flex items-center justify-between">
                            Unit Kerja <i class="fa-solid fa-plus text-[8px]" id="unit-modern-arrow"></i>
                        </button>
                        <div id="unit-modern" class="hidden pl-4 space-y-2 border-l border-slate-100 ml-1">
                            @foreach ($unitKerjas as $unit)
                                <a href="{{ route('profile.unit-kerja', $unit->slug) }}"
                                    class="block text-[13px] text-slate-400 hover:text-emerald-500">{{ $unit->nama_unit }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>

            <div class="px-3 mb-2 mt-8 text-[10px] font-black text-slate-400 uppercase tracking-widest">Informasi &
                Layanan</div>

            <nav class="space-y-1">
                <a href="{{ route('berita.index') }}"
                    class="flex items-center px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 rounded-xl transition-all group">
                    <i
                        class="fa-solid fa-newspaper w-6 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3 text-[15px]">Berita</span>
                </a>

                <button onclick="toggleMobileSubmenu('layanan-modern')"
                    class="w-full flex items-center justify-between px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 rounded-xl transition-all group">
                    <div class="flex items-center">
                        <i
                            class="fa-solid fa-fingerprint w-6 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                        <span class="ml-3 text-[15px]">Layanan Publik</span>
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-300 transition-transform"
                        id="layanan-modern-arrow"></i>
                </button>
                <div id="layanan-modern" class="hidden pl-10 pr-2 space-y-1">
                    <a href="{{ route('layanan.index') }}"
                        class="block py-2 text-[14px] text-slate-500 hover:text-emerald-600">PTSP Online</a>
                </div>

                <a href="{{ route('pengaduan.index') }}"
                    class="flex items-center px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 rounded-xl transition-all group">
                    <i
                        class="fa-solid fa-shield-heart w-6 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                    <span class="ml-3 text-[15px]">Pengaduan</span>
                </a>
            </nav>
        </div>

        <div class="p-6 bg-slate-50 mt-auto">
            <div class="flex justify-center gap-6 text-slate-400">
                <a href="#" class="hover:text-emerald-600 transition-colors"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="hover:text-emerald-600 transition-colors"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:text-emerald-600 transition-colors"><i
                        class="fa-brands fa-youtube"></i></a>
                <a href="#" class="hover:text-emerald-600 transition-colors"><i
                        class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</nav>
