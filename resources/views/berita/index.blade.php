@extends('app')

@section('content')
    <section
        class="relative bg-gradient-to-b from-emerald-50 via-white to-gray-50 py-16 sm:py-24 overflow-hidden border-b border-emerald-100/50">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-200/30 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-green-200/30 rounded-full opacity-50 blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol
                        class="flex items-center space-x-2 text-emerald-600/80 text-xs uppercase tracking-[0.15em] font-bold">
                        <li>
                            <a href="/" class="hover:text-emerald-900 transition-colors flex items-center">
                                <i class="fas fa-home mr-2"></i>Beranda
                            </a>
                        </li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="text-emerald-900/40">Arsip Berita</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight">
                    Berita <span class="text-emerald-600">Kemenag</span>
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Informasi resmi, agenda kegiatan, dan perkembangan terkini dari Kantor Kementerian Agama Kabupaten Pulau
                    Morotai.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 lg:px-8">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                <div class="w-full md:w-auto overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                    <div class="flex items-center space-x-2 min-w-max">
                        <a href="{{ route('berita.index') }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 {{ !request('kategori') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-200' : 'bg-white text-gray-600 hover:bg-emerald-50 border border-gray-100' }}">
                            Semua Berita
                        </a>
                        @foreach ($kategories as $kategori)
                            <a href="{{ route('berita.index', ['kategori' => $kategori->slug]) }}"
                                class="px-5 py-2.5 rounded-xl text-sm font-bold whitespace-nowrap transition-all duration-300 {{ request('kategori') == $kategori->slug ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-200' : 'bg-white text-gray-600 hover:bg-emerald-50 border border-gray-100' }}">
                                {{ $kategori->kategori }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('berita.index') }}" method="GET" class="relative w-full md:w-80 group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita..."
                        class="w-full pl-11 pr-4 py-3 bg-white border border-gray-200 rounded-2xl text-sm shadow-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none">
                    <i
                        class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-emerald-600 transition-colors"></i>
                </form>
            </div>

            @if ($beritas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
                    @foreach ($beritas as $berita)
                        <article
                            class="group relative bg-white rounded-[2.5rem] p-3 transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(16,185,129,0.15)] border border-transparent hover:border-emerald-100 flex flex-col h-full">

                            <div class="relative aspect-[12/9] overflow-hidden rounded-[2rem] z-10">
                                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('/assets/img/bg1.jpeg') }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-1000 cubic-bezier group-hover:scale-110">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-emerald-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <div
                                    class="absolute top-4 left-4 transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 delay-100">
                                    <span
                                        class="px-4 py-2 bg-white/90 backdrop-blur-md text-emerald-700 text-[10px] font-bold uppercase tracking-[0.2em] rounded-2xl shadow-lg">
                                        {{ $berita->kategori->kategori ?? 'Berita' }}
                                    </span>
                                </div>
                            </div>

                            <div class="px-5 pt-6 pb-4 flex flex-col flex-1 relative">
                                <div class="flex items-center gap-3 mb-4">
                                    <div
                                        class="flex items-center px-3 py-1 bg-emerald-50 rounded-full text-[10px] font-bold text-emerald-600 uppercase">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        {{ $berita->created_at->translatedFormat('d M Y') }}
                                    </div>
                                    <div
                                        class="flex items-center px-3 py-1 bg-gray-50 rounded-full text-[10px] font-bold text-gray-400 uppercase">
                                        <i class="far fa-eye mr-2"></i>
                                        {{ number_format($berita->views ?? 0) }}
                                    </div>
                                </div>

                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 leading-tight transition-colors group-hover:text-emerald-700">
                                    <a href="{{ route('berita.detail', $berita->slug) }}" class="line-clamp-2">
                                        {{ $berita->judul }}
                                    </a>
                                </h3>

                                <p
                                    class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3 font-medium opacity-80 group-hover:opacity-100 transition-opacity">
                                    {{ Str::limit(strip_tags($berita->isi), 110) }}
                                </p>

                                <div class="mt-auto pt-5 border-t border-slate-50 flex items-center justify-between">
                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                        class="text-xs font-black uppercase tracking-widest text-slate-400 group-hover:text-emerald-600 transition-colors flex items-center gap-2">
                                        Selengkapnya
                                        <div class="w-0 group-hover:w-6 h-[2px] bg-emerald-500 transition-all duration-500">
                                        </div>
                                    </a>

                                    <a href="{{ route('berita.detail', $berita->slug) }}"
                                        class="w-12 h-12 rounded-2xl bg-slate-50 group-hover:bg-emerald-600 group-hover:shadow-[0_10px_20px_-5px_rgba(16,185,129,0.4)] flex items-center justify-center transition-all duration-500 transform group-hover:rotate-[-45deg]">
                                        <i
                                            class="fas fa-arrow-right text-slate-400 group-hover:text-white transition-colors"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-20 flex justify-center">
                    <div class="inline-flex p-2 bg-white rounded-3xl shadow-sm border border-gray-100">
                        {{ $beritas->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div
                    class="relative overflow-hidden bg-white rounded-[3rem] p-12 text-center border border-gray-100 shadow-sm">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-50 rounded-full opacity-50"></div>
                    <div class="relative z-10">
                        <div
                            class="w-24 h-24 bg-emerald-50 rounded-[2rem] flex items-center justify-center mx-auto mb-6 transform rotate-12">
                            <i class="far fa-newspaper text-4xl text-emerald-400"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-800 mb-2">Belum Ada Kabar Terbaru</h3>
                        <p class="text-slate-500 max-w-xs mx-auto mb-8 font-medium">Kami sedang menyiapkan informasi menarik
                            untuk Anda. Silakan kembali beberapa saat lagi.</p>
                        <a href="{{ route('berita.index') }}"
                            class="inline-flex items-center px-8 py-4 bg-emerald-600 text-white font-bold rounded-2xl hover:bg-emerald-700 transition-all shadow-xl shadow-emerald-200 hover:scale-105 active:scale-95">
                            Refresh Halaman
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
