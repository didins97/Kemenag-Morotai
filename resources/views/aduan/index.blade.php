@extends('app')

@section('css')
    <style>
        /* Gradient Background Theme */
        .complaint-gradient-bg {
            background: radial-gradient(circle at bottom left, #f0fdf4 0%, #ffffff 50%);
        }

        /* Custom Form Styling */
        .form-input-premium {
            @apply w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all outline-none text-slate-700 placeholder:text-slate-400 text-sm font-medium;
        }

        .form-label-premium {
            @apply block text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 ml-1;
        }

        /* File Upload Custom */
        .upload-area {
            @apply relative border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center hover:border-emerald-400 hover:bg-emerald-50/50 transition-all cursor-pointer;
        }

        /* Map Container Custom */
        .map-wrapper iframe {
            filter: grayscale(100%) invert(5%) contrast(1.1);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .map-wrapper:hover iframe {
            filter: grayscale(0%) invert(0%) contrast(1);
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
                        <li class="text-emerald-950">Layanan Pengaduan</li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-emerald-950 mb-6 tracking-tight uppercase leading-tight">
                    Suara <span class="text-emerald-600">Masyarakat</span>
                </h1>

                <p class="text-emerald-800/70 text-base md:text-xl leading-relaxed font-medium max-w-2xl">
                    Sampaikan aspirasi, kendala, atau laporan Anda secara langsung. Kami berkomitmen untuk merespons setiap
                    laporan secara profesional dan rahasia.
                </p>

                <div class="flex items-center gap-4 mt-8">
                    <div class="w-12 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-200 rounded-full"></div>
                    <div class="w-2 h-1 bg-emerald-100 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 complaint-gradient-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">

                <div class="flex flex-col lg:flex-row gap-12">
                    <div class="lg:w-2/3">
                        <div
                            class="bg-white rounded-[2.5rem] shadow-xl shadow-emerald-900/5 border border-emerald-50 overflow-hidden relative">
                            <div class="h-1.5 w-full bg-emerald-50">
                                <div class="h-full bg-emerald-500 w-1/3"></div>
                            </div>

                            <div class="p-8 md:p-12">
                                <div class="mb-10">
                                    <h2 class="text-xl font-black text-emerald-950 uppercase flex items-center gap-4">
                                        <span
                                            class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-base">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        Formulir Pengaduan
                                    </h2>
                                    <p class="text-slate-400 text-xs mt-2 ml-14 uppercase tracking-widest font-bold">
                                        Lengkapi data di bawah ini secara valid</p>
                                </div>

                                @if (session('success'))
                                    <div
                                        class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <p class="text-emerald-800 font-bold text-sm">{{ session('success') }}</p>
                                    </div>
                                @endif

                                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data"
                                    class="space-y-7">
                                    @csrf

                                    <div class="grid md:grid-cols-2 gap-7">
                                        <div class="flex flex-col">
                                            <label
                                                class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Nama
                                                Lengkap</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute inset-y-0 left-0 flex items-center pl-5 text-slate-400">
                                                    <i class="fas fa-user text-xs"></i>
                                                </span>
                                                <input type="text" name="nama" required
                                                    class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all text-sm font-semibold text-slate-700 placeholder:text-slate-300"
                                                    placeholder="Nama Lengkap Anda">
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Nomor
                                                WhatsApp</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute inset-y-0 left-0 flex items-center pl-5 text-slate-400">
                                                    <i class="fab fa-whatsapp text-sm"></i>
                                                </span>
                                                <input type="tel" name="no_telepon" required
                                                    class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all text-sm font-semibold text-slate-700 placeholder:text-slate-300"
                                                    placeholder="08xxxxxxxxxx">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label
                                            class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Alamat
                                            Email</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-slate-400">
                                                <i class="fas fa-envelope text-xs"></i>
                                            </span>
                                            <input type="email" name="email" required
                                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all text-sm font-semibold text-slate-700 placeholder:text-slate-300"
                                                placeholder="contoh@email.com">
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label
                                            class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Subjek
                                            Laporan</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-slate-400">
                                                <i class="fas fa-bookmark text-xs"></i>
                                            </span>
                                            <input type="text" name="subjek" required
                                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all text-sm font-semibold text-slate-700 placeholder:text-slate-300"
                                                placeholder="Judul singkat laporan Anda">
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label
                                            class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Isi
                                            Pengaduan</label>
                                        <textarea name="isi" rows="6" required
                                            class="w-full px-6 py-5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all text-sm font-semibold text-slate-700 placeholder:text-slate-300 resize-none"
                                            placeholder="Ceritakan kronologi pengaduan Anda di sini..."></textarea>
                                    </div>

                                    <div class="flex flex-col">
                                        <label
                                            class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-900 mb-3 px-1">Dokumen
                                            Pendukung (Opsional)</label>
                                        <div onclick="document.getElementById('file-input').click()"
                                            class="group relative border-2 border-dashed border-slate-200 rounded-3xl p-10 text-center hover:bg-emerald-50 hover:border-emerald-400 transition-all cursor-pointer">
                                            <input type="file" name="file" id="file-input" class="hidden">
                                            <div
                                                class="w-14 h-14 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                                                <i class="fas fa-cloud-arrow-up text-xl"></i>
                                            </div>
                                            <h4 class="text-sm font-black text-slate-700 uppercase tracking-wider">Unggah
                                                Berkas</h4>
                                            <p class="text-[10px] text-slate-400 mt-2 font-medium">Klik untuk mencari file
                                                (PDF, JPG, PNG - Maks 5MB)</p>
                                        </div>
                                    </div>

                                    <div class="pt-4">
                                        <button type="submit"
                                            class="w-full py-5 bg-emerald-950 text-white rounded-[1.5rem] font-black uppercase tracking-[0.3em] text-[11px] shadow-2xl shadow-emerald-950/20 hover:bg-emerald-800 transition-all flex items-center justify-center gap-4 group">
                                            Kirim Laporan Resmi
                                            <i
                                                class="fas fa-paper-plane text-emerald-400 group-hover:translate-x-2 group-hover:-translate-y-1 transition-transform"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w-1/3 space-y-8">
                        <div class="bg-emerald-950 rounded-[2.5rem] p-8 text-white relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl -mr-16 -mt-16">
                            </div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-emerald-400 mb-6 italic">Hubungi
                                Kami</h3>
                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 bg-emerald-900 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fas fa-phone-alt"></i></div>
                                    <div>
                                        <p class="text-[9px] uppercase font-bold text-emerald-500 tracking-widest">Telepon
                                        </p>
                                        <p class="text-sm font-bold">{{ $kontak->no_telepon }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 bg-emerald-900 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fas fa-envelope"></i></div>
                                    <div>
                                        <p class="text-[9px] uppercase font-bold text-emerald-500 tracking-widest">Email
                                            Resmi</p>
                                        <p class="text-sm font-bold truncate">{{ $kontak->email }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-10 h-10 bg-emerald-900 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fas fa-map-marker-alt"></i></div>
                                    <div>
                                        <p class="text-[9px] uppercase font-bold text-emerald-500 tracking-widest">Alamat
                                            Kantor</p>
                                        <p class="text-[11px] font-medium leading-relaxed opacity-80">{{ $kontak->alamat }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-[2.5rem] p-8 border border-emerald-50 shadow-sm">
                            <h3 class="text-xs font-black uppercase tracking-widest text-emerald-950 mb-6">Informasi
                                Penting</h3>
                            <div class="space-y-4">
                                <div class="p-4 bg-slate-50 rounded-2xl">
                                    <h4 class="text-xs font-bold text-emerald-900 mb-1 italic">Proses Verifikasi</h4>
                                    <p class="text-[11px] text-slate-500 leading-relaxed italic">Setiap aduan akan
                                        diverifikasi oleh tim internal dalam 1-3 hari kerja.</p>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl">
                                    <h4 class="text-xs font-bold text-emerald-900 mb-1 italic">Kerahasiaan</h4>
                                    <p class="text-[11px] text-slate-500 leading-relaxed italic">Data pelapor dijamin
                                        kerahasiaannya dan tidak dipublikasikan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="w-full h-[450px] relative border-t border-emerald-100/50">
        <div class="map-wrapper w-full h-full bg-slate-200">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.592817342654!2d128.283!3d2.05!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3296bc8e6f1f4b8f%3A0x6a1f8e8f8f8f8f8f!2sKemenag%20Kab.%20Pulau%20Morotai!5e0!3m2!1sid!2sid!4v1234567890"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
        <div class="absolute bottom-10 left-10 hidden md:block">
            <div class="bg-white/90 backdrop-blur-md p-6 rounded-3xl border border-emerald-100 shadow-2xl max-w-xs">
                <div class="flex items-center gap-3 mb-3">
                    <div
                        class="w-8 h-8 bg-emerald-600 text-white rounded-lg flex items-center justify-center shadow-lg shadow-emerald-200">
                        <i class="fas fa-location-arrow text-xs"></i>
                    </div>
                    <span class="text-xs font-black uppercase tracking-widest text-emerald-950">Lokasi Kami</span>
                </div>
                <p class="text-[11px] text-slate-600 font-medium leading-relaxed">
                    Kunjungi kantor kami untuk informasi lebih lanjut dan konsultasi tatap muka.
                </p>
            </div>
        </div>
    </section>

    {{-- @include('components.cta-soft') --}}
@endsection
