@extends('app')

@section('css')
    <style>
        /* Gaya Khusus Data & Informasi */
        .data-gradient-bg {
            background: radial-gradient(circle at top right, #f0fdf4 0%, #ffffff 50%);
        }

        /* Styling konten yang berasal dari editor (prose) */
        .prose-custom {
            color: #334155; /* slate-700 */
        }

        .prose-custom :where(h2):not(:where([class~="not-prose"] *)) {
            color: #064e3b; /* emerald-950 */
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: -0.025em;
            margin-top: 2.5rem;
            border-bottom: 2px solid #ecfdf5;
            padding-bottom: 0.5rem;
        }

        .prose-custom :where(p):not(:where([class~="not-prose"] *)) {
            line-height: 1.8;
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        /* Tampilan Tabel di dalam Konten agar Responsif */
        .prose-custom table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            font-size: 0.875rem;
        }

        .prose-custom th {
            background: #f8fafc;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
        }

        .prose-custom td {
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
        }
    </style>
@endsection

@section('content')
    <section class="relative bg-gradient-to-b from-emerald-50 via-white to-gray-50 py-16 sm:py-24 overflow-hidden border-b border-emerald-100/50">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-200/30 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-green-200/30 rounded-full opacity-50 blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-emerald-600/80 text-[10px] uppercase tracking-[0.2em] font-bold">
                        <li><a href="/" class="hover:text-emerald-900 transition-colors">Beranda</a></li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="opacity-50 tracking-widest">Data & Informasi</li>
                        <li><i class="fas fa-chevron-right text-[8px] opacity-50"></i></li>
                        <li class="text-emerald-950">{{ $info->judul }}</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase leading-tight">
                    {{ $info->judul }}
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Informasi lengkap mengenai tata kelola, layanan, dan data teknis pada Kantor Urusan Agama (KUA).
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 data-gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                <article class="bg-white rounded-[2.5rem] shadow-sm border border-emerald-50 overflow-hidden">
                    <div class="h-1.5 w-full bg-emerald-50">
                        <div class="h-full bg-emerald-500 w-1/3"></div>
                    </div>

                    <div class="p-8 md:p-16">
                        <div class="prose prose-emerald prose-custom max-w-none">
                            {!! $info->isi !!}
                        </div>

                        @if ($info->file)
                            <div class="mt-16 p-8 bg-emerald-50 rounded-[2rem] border border-emerald-100 flex flex-col md:flex-row items-center justify-between gap-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-emerald-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200">
                                        <i class="fas fa-file-pdf text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-emerald-950">Dokumen Lampiran</h4>
                                        <p class="text-xs text-emerald-700/60 uppercase tracking-widest font-bold">Unduh berkas resmi terkait</p>
                                    </div>
                                </div>
                                <a href="{{ Storage::url($info->file) }}"
                                   class="group flex items-center gap-2 px-6 py-3 bg-white text-emerald-700 font-bold rounded-xl border border-emerald-200 hover:bg-emerald-600 hover:text-white transition-all shadow-sm"
                                   download>
                                    <span>Download berkas</span>
                                    <i class="fas fa-download text-sm group-hover:translate-y-1 transition-transform"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </article>

                <div class="mt-12 text-center">
                    <p class="text-slate-400 text-sm font-medium italic">
                        Terakhir diperbarui pada: {{ $info->updated_at->isoFormat('D MMMM Y') }}
                    </p>

                    <div class="mt-8">
                        <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-emerald-600 font-bold text-xs uppercase tracking-[0.2em] hover:text-emerald-800 transition-colors">
                            <i class="fas fa-arrow-left"></i> Kembali ke sebelumnya
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- @include('components.cta-soft') --}}
@endsection
