@extends('app')

@section('css')
    <style>
        /* Modern Sejarah Design Custom Styles */
        .sejarah-gradient-bg {
            background: radial-gradient(circle at top right, #ecfdf5 0%, #ffffff 50%);
        }

        /* Timeline Connector Line */
        .timeline-line::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: repeating-linear-gradient(to bottom, #10b981 0, #10b981 8px, transparent 8px, transparent 16px);
            opacity: 0.3;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);
            width: 16px;
            height: 16px;
            background: #fff;
            border: 4px solid #059669;
            border-radius: full;
            z-index: 10;
        }

        .prose p {
            line-height: 1.8;
            color: #374151;
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .timeline-line::before {
                left: 20px;
                transform: none;
            }

            .timeline-dot {
                left: 20px;
                transform: none;
            }
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
                        <li>
                            <a href="/" class="hover:text-emerald-900 transition-colors flex items-center">
                                Beranda
                            </a>
                        </li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="opacity-50">Profil</li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="text-emerald-950">Sejarah</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase">
                    Jejak <span class="text-emerald-600">Sejarah</span>
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Mengenal lebih dekat perjalanan Kantor Kementerian Agama Kabupaten Pulau Morotai dari masa ke masa.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 sejarah-gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">

                <div
                    class="bg-white rounded-[2.5rem] p-8 md:p-16 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.05)] border border-emerald-50 relative overflow-hidden mb-20">
                    <div class="absolute top-0 left-0 w-2 h-full bg-emerald-500"></div>

                    <div class="flex flex-col md:flex-row gap-12 items-start">
                        <div class="w-full md:w-1/3">
                            <h2 class="text-3xl font-black text-emerald-950 leading-tight">
                                Latar Belakang <br>
                                <span
                                    class="text-emerald-600 text-xl font-bold uppercase tracking-widest">Pembentukan</span>
                            </h2>
                            <div class="w-20 h-1.5 bg-emerald-100 mt-4 rounded-full"></div>
                        </div>

                        <div class="w-full md:w-2/3 prose prose-emerald max-w-none">
                            @if ($sejarah && $sejarah->latar_belakang)
                                {!! $sejarah->latar_belakang !!}
                            @else
                                <div
                                    class="p-6 bg-gray-50 rounded-2xl border border-dashed border-gray-200 text-gray-400 text-center">
                                    Konten latar belakang belum tersedia.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-center mb-16">
                    <span
                        class="px-4 py-2 bg-emerald-100 text-emerald-700 text-xs font-black uppercase tracking-[0.3em] rounded-full">Linimasa</span>
                    <h2 class="text-3xl md:text-4xl font-black text-emerald-950 mt-4">Perjalanan Waktu</h2>
                </div>

                @if ($sejarah && $sejarah->timeline && count($sejarah->timeline) > 0)
                    <div class="relative timeline-line space-y-12">
                        @foreach ($sejarah->timeline as $index => $item)
                            <div class="relative flex flex-col md:flex-row items-center md:justify-between group">

                                <div class="timeline-dot group-hover:scale-125 transition-transform duration-300"></div>

                                <div
                                    class="w-full md:w-[45%] {{ $index % 2 == 0 ? 'md:text-right md:order-1' : 'md:order-2 text-left md:ml-auto' }}">
                                    <div
                                        class="bg-white p-6 rounded-3xl shadow-sm border border-emerald-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                        <span
                                            class="text-2xl font-black text-emerald-600 mb-2 block">{{ $item['year'] ?? '' }}</span>
                                        <p class="text-slate-600 font-medium leading-relaxed">
                                            {{ $item['description'] ?? '' }}
                                        </p>

                                        @if (isset($item['title']))
                                            <div
                                                class="mt-4 flex flex-wrap gap-2 {{ $index % 2 == 0 ? 'md:justify-end' : 'justify-start' }}">
                                                @foreach ((array) $item['title'] as $tag)
                                                    <span
                                                        class="px-3 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-emerald-100">
                                                        {{ $tag }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="hidden md:block w-[45%] {{ $index % 2 == 0 ? 'order-2' : 'order-1' }}"></div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </section>

    <section class="relative py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-emerald-100/50 to-white"></div>

        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-200/20 rounded-full blur-[120px] -mr-64 -mt-64">
        </div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-green-200/20 rounded-full blur-[120px] -ml-64 -mb-64">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div
                class="relative bg-white/40 backdrop-blur-xl border border-white/60 rounded-[3rem] md:rounded-[5rem] p-10 md:p-20 shadow-xl shadow-emerald-900/5 overflow-hidden">

                <div
                    class="absolute top-0 left-0 w-32 h-32 border-t-4 border-l-4 border-emerald-500/20 rounded-tl-[3rem] md:rounded-tl-[5rem]">
                </div>

                <div class="max-w-3xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500/10 rounded-full mb-8">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span class="text-emerald-700 text-[10px] font-black uppercase tracking-widest">Eksplorasi Lebih
                            Jauh</span>
                    </div>

                    <h3 class="text-3xl md:text-5xl font-black text-emerald-950 mb-6 leading-tight">
                        Mari mengenal kami <br>
                        <span class="text-emerald-600">lebih dekat lagi.</span>
                    </h3>

                    <p class="text-emerald-800/60 text-base md:text-lg mb-12 font-medium">
                        Jelajahi visi utama kami dan ikuti setiap perkembangan terkini melalui arsip berita resmi.
                    </p>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                        <a href="/profil/visi-misi"
                            class="group w-full sm:w-auto px-10 py-5 bg-emerald-600 text-white font-bold rounded-2xl transition-all duration-300 hover:bg-emerald-700 hover:scale-105 shadow-xl shadow-emerald-600/20 flex items-center justify-center gap-3">
                            <span>Visi & Misi</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>

                        <a href="/berita"
                            class="w-full sm:w-auto px-10 py-5 bg-white text-emerald-700 font-bold rounded-2xl border border-emerald-100 hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-300 shadow-sm flex items-center justify-center gap-3">
                            <i class="far fa-newspaper opacity-60"></i>
                            <span>Arsip Berita</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
