@extends('app')

@section('css')
    <style>
        /* Vision Card Styling */
        .vision-container {
            background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
            border: 1px solid #d1fae5;
        }

        .vision-mark {
            font-family: 'Georgia', serif;
            line-height: 1;
        }

        /* Mission List Styling */
        .mission-item {
            transition: all 0.3s ease;
        }

        .mission-item:hover {
            transform: translateX(8px);
        }

        .mission-number {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            background: #10b981;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.875rem;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
        }

        /* Value Card Styling */
        .value-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .value-card:hover {
            border-color: #10b981;
            box-shadow: 0 10px 30px -10px rgba(16, 185, 129, 0.1);
        }
    </style>
@endsection

@section('content')
    <section
        class="relative bg-gradient-to-b from-emerald-50 via-white to-gray-50 py-16 sm:py-24 overflow-hidden border-b border-emerald-100/50">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-200/30 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-green-200/30 rounded-full opacity-50 blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol
                        class="flex items-center space-x-2 text-emerald-600/80 text-[10px] uppercase tracking-[0.2em] font-bold">
                        <li><a href="/" class="hover:text-emerald-900 transition-colors">Beranda</a></li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="opacity-50">Profil</li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="text-emerald-950">Visi & Misi</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase">
                    Visi <span class="text-emerald-600">& Misi</span>
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Komitmen kami dalam melayani umat dan membangun fondasi keagamaan yang kokoh di Kabupaten Pulau Morotai.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto space-y-24">

                @if ($visiMisi)
                    <div class="relative">
                        <div
                            class="absolute -top-10 -left-10 text-[12rem] vision-mark text-emerald-50 opacity-60 select-none">
                            “</div>
                        <div class="relative z-10 vision-container rounded-[2.5rem] p-8 md:p-16 shadow-sm overflow-hidden">
                            <div class="flex flex-col md:flex-row gap-10 items-center">
                                <div class="w-full md:w-1/4 text-center md:text-left">
                                    <h2 class="text-xs font-black text-emerald-600 uppercase tracking-[0.3em] mb-2">Visi
                                        Kami</h2>
                                    <div class="h-1 w-12 bg-emerald-500 mx-auto md:mx-0"></div>
                                </div>
                                <div class="w-full md:w-3/4">
                                    <blockquote
                                        class="text-2xl md:text-4xl font-bold text-emerald-900 leading-tight italic">
                                        "{!! $visiMisi->visi !!}"
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-12 gap-12 items-start">
                        <div class="lg:col-span-4 sticky top-10">
                            <h2 class="text-3xl md:text-4xl font-black text-emerald-950 leading-tight">
                                Langkah Nyata <br>
                                <span class="text-emerald-600">Misi Kami</span>
                            </h2>
                            <p class="mt-4 text-slate-500 font-medium leading-relaxed">
                                Strategi operasional yang kami jalankan untuk mewujudkan cita-cita luhur kementerian.
                            </p>
                        </div>
                        <div class="lg:col-span-8 space-y-6">
                            @php
                                // Asumsi data misi dipisahkan oleh tag <li> jika dari editor
                                // Jika tidak, kita bisa melakukan manual parsing sederhana
                                $misiClean = str_replace(['<ul>', '</ul>'], '', $visiMisi->misi);
                                $misiItems = explode('<li>', $misiClean);
                            @endphp

                            @foreach ($misiItems as $index => $item)
                                @if (trim($item))
                                    <div
                                        class="mission-item flex gap-6 p-6 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:border-emerald-200 shadow-sm hover:shadow-xl transition-all group">
                                        <div class="mission-number">{{ $index }}</div>
                                        <div class="text-slate-700 font-bold leading-relaxed">
                                            {!! str_replace('</li>', '', $item) !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-12">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl font-black text-emerald-950">Nilai-Nilai Dasar</h2>
                            <p class="text-emerald-600/70 font-bold uppercase tracking-widest text-xs mt-2">Budaya Kerja
                                Kami</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @php
                                $values = [
                                    [
                                        'icon' => 'fa-hand-holding-heart',
                                        'title' => 'Profesionalisme',
                                        'desc' => 'Keahlian dan integritas dalam tanggung jawab.',
                                    ],
                                    [
                                        'icon' => 'fa-users',
                                        'title' => 'Pelayanan Prima',
                                        'desc' => 'Pelayanan yang cepat, tepat, dan ramah.',
                                    ],
                                    [
                                        'icon' => 'fa-balance-scale',
                                        'title' => 'Keadilan',
                                        'desc' => 'Memperlakukan semua pihak secara setara.',
                                    ],
                                    [
                                        'icon' => 'fa-shield-alt',
                                        'title' => 'Akuntabilitas',
                                        'desc' => 'Transparan dalam setiap tindakan.',
                                    ],
                                ];
                            @endphp

                            @foreach ($values as $v)
                                <div
                                    class="value-card p-8 bg-white border border-emerald-50 rounded-[2rem] text-center group">
                                    <div
                                        class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-500">
                                        <i class="fas {{ $v['icon'] }} text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-black text-emerald-900 mb-2">{{ $v['title'] }}</h3>
                                    <p class="text-sm text-slate-500 leading-relaxed font-medium">{{ $v['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="py-20 text-center bg-gray-50 rounded-[3rem] border border-dashed border-gray-200">
                        <i class="fas fa-info-circle text-emerald-200 text-6xl mb-6"></i>
                        <h3 class="text-2xl font-bold text-gray-400">Data Visi & Misi Belum Tersedia</h3>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <section class="relative py-24 overflow-hidden bg-white">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none overflow-hidden">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-50 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-green-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <span
                    class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-[0.3em] rounded-full mb-4">
                    Struktur Organisasi
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-emerald-950 mb-6 leading-tight">
                    Eksplorasi <span class="text-emerald-600">Unit Kerja</span> Kami
                </h2>
                <p class="text-emerald-800/60 font-medium text-lg italic">
                    "Bahu-membahu mewujudkan visi melalui pelayanan yang terintegrasi di setiap lini."
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="{{ route('profile.unit-kerja', ['slug' => 'bagian-tata-usaha']) }}"
                    class="group relative bg-white border border-emerald-100 p-8 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-emerald-50 rounded-bl-[3rem] -mr-8 -mt-8 transition-transform group-hover:scale-150 duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200">
                            <i class="fas fa-file-invoice text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-3">Subbag Tata Usaha</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">Pusat koordinasi administrasi, perencanaan,
                            keuangan, dan kepegawaian internal.</p>
                        <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            Lihat Detail <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </span>
                    </div>
                </a>

                <a href="{{ route('profile.unit-kerja', ['slug' => 'bimas-islam']) }}"
                    class="group relative bg-white border border-emerald-100 p-8 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2">
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200">
                            <i class="fas fa-mosque text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-3">Seksi Bimas Islam</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">Pelayanan kemasjidan, produk halal, kemitraan
                            umat, dan urusan agama Islam.</p>
                        <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            Lihat Detail <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </span>
                    </div>
                </a>

                <a href="{{ route('profile.unit-kerja', ['slug' => 'pendidikan-agama']) }}"
                    class="group relative bg-white border border-emerald-100 p-8 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2">
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200">
                            <i class="fas fa-graduation-cap text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-3">Seksi Pendis</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">Pengelolaan pendidikan Madrasah, PD Pontren,
                            dan Pendidikan Agama Islam.</p>
                        <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            Lihat Detail <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </span>
                    </div>
                </a>

                <a href="{{ route('profile.unit-kerja', ['slug' => 'haji-umrah']) }}"
                    class="group relative bg-white border border-emerald-100 p-8 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2">
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200">
                            <i class="fas fa-kaaba text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-3">Penyelenggaraan Haji</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">Pelayanan pendaftaran, dokumen, dan
                            pembinaan ibadah haji serta umrah.</p>
                        <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            Lihat Detail <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </span>
                    </div>
                </a>

                <a href="{{ route('profile.unit-kerja', ['slug' => 'bimas-kristen']) }}"
                    class="group relative bg-white border border-emerald-100 p-8 rounded-[2rem] transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-900/10 hover:-translate-y-2">
                    <div class="relative z-10">
                        <div
                            class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200">
                            <i class="fas fa-church text-xl"></i>
                        </div>
                        <h3 class="text-xl font-black text-emerald-950 mb-3">Bimas Kristen</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6">Pelayanan bimbingan masyarakat, urusan
                            agama, pendidikan keagamaan, dan pemberdayaan umat Kristen.</p>
                        <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2">
                            Lihat Detail <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                        </span>
                    </div>
                </a>

                <a href="/unit-kerja"
                    class="group relative bg-emerald-900 p-8 rounded-[2rem] transition-all duration-500 hover:bg-emerald-800 flex flex-col justify-center items-center text-center overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0 0 L100 100 M100 0 L0 100" stroke="white" stroke-width="0.5" />
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-emerald-300 font-bold text-xs uppercase tracking-[0.3em] mb-4">Lainnya</p>
                        <h3 class="text-2xl font-black text-white mb-6">Lihat Seluruh <br> Struktur</h3>
                        <div
                            class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-white group-hover:text-emerald-900 transition-all">
                            <i class="fas fa-th-large text-white group-hover:text-emerald-900"></i>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection
