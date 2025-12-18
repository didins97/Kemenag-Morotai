@extends('app')

@section('css')
    <style>
        /* Gaya Alur Pelayanan Modern */
        .service-gradient {
            background: radial-gradient(circle at top right, #f0fdf4 0%, #ffffff 50%);
        }

        /* Timeline / Flow Styles */
        .flow-container {
            position: relative;
            padding-left: 20px;
        }

        .flow-step-card {
            position: relative;
            padding-left: 50px;
            transition: all 0.3s ease;
        }

        .flow-step-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: -40px;
            width: 2px;
            background: #e2e8f0; /* slate-200 */
        }

        .flow-step-card:last-child::before {
            display: none;
        }

        .step-number {
            position: absolute;
            left: -18px;
            top: 0;
            width: 36px;
            height: 36px;
            background: #10b981;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 0.875rem;
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
            z-index: 10;
        }

        /* Hero Animation */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
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
                        <li class="text-emerald-950">Alur Pelayanan</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase">
                    Layanan <span class="text-emerald-600">PTSP</span>
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Sistem Pelayanan Terpadu Satu Pintu yang transparan, cepat, dan profesional untuk masyarakat Morotai.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 service-gradient">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto space-y-20">

                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-emerald-600 text-[10px] font-black uppercase tracking-[0.3em]">Komitmen Layanan</span>
                        <h2 class="text-3xl font-black text-emerald-950 mt-2 mb-6 uppercase leading-tight">Mengenal <br>PTSP Kemenag</h2>
                        <div class="prose prose-emerald text-slate-600 leading-relaxed text-justify">
                            Pelayanan Terpadu Satu Pintu merupakan bagian dari wujud komitmen Kementerian Agama untuk lebih dekat melayani umat. Inovasi pelayanan yang terpusat ini diharapkan akan mempermudah publik dalam mendapat layanan secara transparan dan akuntabel.
                        </div>
                        <div class="mt-8">
                            <a target="_blank" href="https://kemenagternate.id/wp-content/uploads/2022/01/Persyaratan-Layanan-PTSP-Final.pdf"
                               class="inline-flex items-center gap-3 px-8 py-4 bg-emerald-600 text-white font-bold rounded-2xl shadow-xl shadow-emerald-600/20 hover:bg-emerald-700 transition-all">
                                <i class="fas fa-file-pdf"></i>
                                Download Persyaratan (PDF)
                            </a>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-emerald-100/50 rounded-[3rem] blur-2xl group-hover:bg-emerald-200/50 transition-colors"></div>
                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white">
                            <img src="/assets/img/image.png" alt="Ruang PTSP" class="w-full h-auto">
                        </div>
                    </div>
                </div>

                <div class="bg-emerald-800 rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                        <div class="text-center md:text-left">
                            <h3 class="text-2xl font-black mb-2 uppercase tracking-tight">Jam Pelayanan</h3>
                            <p class="text-emerald-300 font-medium">Melayani sepenuh hati di hari kerja</p>
                        </div>
                        <div class="grid grid-cols-2 gap-8 border-l border-emerald-800 pl-8">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-emerald-500 font-bold mb-2">Senin - Kamis</p>
                                <p class="text-xl font-bold italic">08.00 - 16.00 <span class="text-xs">WIT</span></p>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-emerald-500 font-bold mb-2">Jumat</p>
                                <p class="text-xl font-bold italic">08.00 - 16.30 <span class="text-xs">WIT</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-black text-emerald-950 uppercase">Alur Visual PTSP</h2>
                        <div class="w-12 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
                    </div>
                    <div class="bg-white p-4 rounded-[3rem] shadow-sm border border-emerald-50 overflow-hidden">
                        <img src="{{ $pelayanan->gambar ? asset('storage/' . $pelayanan->gambar) : '/assets/img/pelayanan.png' }}"
                             alt="Alur Pelayanan" class="w-full h-auto rounded-[2.5rem]">
                    </div>
                </div>

                <div class="space-y-12">
                    <div class="text-center">
                        <h2 class="text-3xl font-black text-emerald-950 uppercase">Tahapan Prosedur</h2>
                    </div>
                    <div class="flow-container max-w-3xl mx-auto">
                        @foreach ($pelayanan->proses as $index => $step)
                            <div class="flow-step-card mb-12 group">
                                <div class="step-number group-hover:scale-110 transition-transform">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div class="bg-white p-8 rounded-[2rem] border border-emerald-50 shadow-sm group-hover:shadow-xl transition-all group-hover:border-emerald-200">
                                    <h3 class="text-xl font-black text-emerald-950 mb-3 uppercase tracking-tight">{{ $step['judul'] }}</h3>
                                    <p class="text-slate-600 leading-relaxed font-medium text-sm">
                                        {{ $step['description'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="fixed bottom-8 right-8 z-50 animate-float">
        <a href="https://wa.me/6281234567890" target="_blank"
           class="flex items-center gap-4 bg-emerald-600 hover:bg-emerald-700 text-white p-2 pr-6 rounded-full shadow-2xl transition-all hover:scale-105 group">
            <div class="w-12 h-12 bg-white text-emerald-600 rounded-full flex items-center justify-center text-2xl shadow-inner">
                <i class="fab fa-whatsapp"></i>
            </div>
            <div class="hidden md:block">
                <p class="text-[10px] uppercase font-black tracking-widest leading-none mb-1 opacity-70">Butuh Bantuan?</p>
                <p class="text-sm font-bold leading-none">Chat PTSP Center</p>
            </div>
        </a>
    </div>

    {{-- @include('components.cta-soft') --}}
@endsection
