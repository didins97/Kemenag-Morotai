@extends('app')

@section('css')
    <style>
        .complaint-hero {
            background: linear-gradient(rgba(5, 150, 105, 0.9), rgba(5, 150, 105, 0.9)),
                url('/assets/img/aduan.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }

        .form-input:focus {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2);
        }

        .contact-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(5, 150, 105, 0.15);
        }

        .submit-btn {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(5, 150, 105, 0.3);
        }

        .floating-label {
            transition: all 0.3s ease;
        }

        .form-group:focus-within .floating-label {
            transform: translateY(-24px);
            font-size: 0.875rem;
            color: #059669;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="complaint-hero py-20 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Layanan Pengaduan Masyarakat</h1>
                <p class="text-xl md:text-2xl mb-8">Sampaikan keluhan dan masukan Anda kepada kami</p>
                <div class="w-24 h-1 bg-yellow-300 mx-auto"></div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="bg-white py-3 border-b">
        <div class="container mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 transition-colors">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-sm font-medium text-gray-500">Pengaduan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-br from-green-50 to-white/80">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-3 gap-10">
                    <!-- Form Section -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white/20 backdrop-blur-sm">
                            <div class="bg-gradient-to-r from-green-600 to-emerald-700 p-8">
                                <h2 class="text-3xl font-bold text-white flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    Formulir Pengaduan
                                </h2>
                                <p class="mt-2 text-emerald-100">Sampaikan keluhan atau masukan Anda dengan lengkap</p>
                            </div>

                            <div class="p-8 md:p-10">
                                @if (session('success'))
                                    <div
                                        class="mb-8 p-4 rounded-xl bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 flex items-start">
                                        <svg class="h-5 w-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p>{{ session('success') }}</p>
                                    </div>
                                @endif

                                <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-8"
                                    enctype="multipart/form-data">
                                    @csrf @method('POST')

                                    <div class="space-y-2">
                                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap
                                            <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input type="text" id="nama" name="nama" required
                                                class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400"
                                                placeholder="Nama lengkap Anda">
                                        </div>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                                <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <input type="email" id="email" name="email" required
                                                    class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400"
                                                    placeholder="email@contoh.com">
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label for="no_telepon" class="block text-sm font-medium text-gray-700">Nomor
                                                Telepon <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <input type="tel" id="no_telepon" name="no_telepon" required
                                                    class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400"
                                                    placeholder="08xxxxxxxxxx">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="subjek" class="block text-sm font-medium text-gray-700">Subjek
                                            Pengaduan <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input type="text" id="subjek" name="subjek" required
                                                class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400"
                                                placeholder="Ringkasan pengaduan Anda">
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="isi" class="block text-sm font-medium text-gray-700">Isi
                                            Pengaduan <span class="text-red-500">*</span></label>
                                        <textarea id="isi" name="isi" rows="6" required
                                            class="block w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition placeholder-gray-400"
                                            placeholder="Jelaskan pengaduan Anda secara detail"></textarea>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Lampiran (Opsional)</label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-dashed border-gray-300 rounded-xl hover:border-emerald-400 transition cursor-pointer relative group">
                                            <div class="space-y-2 text-center">
                                                <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-emerald-500 transition"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <div class="flex items-center justify-center text-sm text-gray-600">
                                                    <label for="file"
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none">
                                                        <span>Upload file</span>
                                                        <input id="file" name="file" type="file"
                                                            class="sr-only">
                                                    </label>
                                                    <p class="pl-1">atau drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PDF, JPG, PNG, DOC (Maks. 5MB)
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-4">
                                        <button type="submit"
                                            class="w-full flex justify-center items-center px-6 py-4 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition transform hover:-translate-y-0.5">
                                            <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Kirim Pengaduan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Info Section -->
                    <div class="space-y-8">
                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white/20 backdrop-blur-sm">
                            <div class="bg-gradient-to-r from-emerald-600 to-green-600 p-8">
                                <h3 class="text-2xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Informasi Pengaduan
                                </h3>
                            </div>
                            <div class="p-8">
                                <ul class="space-y-5">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-2 rounded-lg">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-base font-semibold text-gray-900">Waktu Proses</h4>
                                            <p class="mt-1 text-sm text-gray-600">Pengaduan akan diproses dalam waktu 1-3
                                                hari kerja setelah kami menerima data lengkap</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-2 rounded-lg">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-base font-semibold text-gray-900">Data Valid</h4>
                                            <p class="mt-1 text-sm text-gray-600">Pastikan data yang diisi valid dan dapat
                                                dihubungi untuk proses verifikasi</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-2 rounded-lg">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-base font-semibold text-gray-900">Kerahasiaan</h4>
                                            <p class="mt-1 text-sm text-gray-600">Data Anda akan kami jaga kerahasiaannya
                                                sesuai dengan kebijakan privasi kami</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white/20 backdrop-blur-sm">
                            <div class="bg-gradient-to-r from-emerald-600 to-green-600 p-8">
                                <h3 class="text-2xl font-bold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    Kontak Langsung
                                </h3>
                            </div>
                            <div class="p-8">
                                <div class="space-y-6">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-3 rounded-xl">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-500">Telepon</p>
                                            <a href="tel:{{ $kontak->no_telepon }}"
                                                class="text-base font-semibold text-gray-900 hover:text-emerald-600 transition">{{ $kontak->no_telepon }}</a>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-3 rounded-xl">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-500">WhatsApp</p>
                                            <a href="https://wa.me/{{ $kontak->no_telepon }}"
                                                class="text-base font-semibold text-gray-900 hover:text-emerald-600 transition">{{ $kontak->no_telepon }}</a>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-3 rounded-xl">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-500">Email</p>
                                            <a href="mailto:{{ $kontak->email }}"
                                                class="text-base font-semibold text-gray-900 hover:text-emerald-600 transition">{{ $kontak->email }}</a>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-emerald-100 p-3 rounded-xl">
                                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-500">Alamat Kantor</p>
                                            <p class="text-base font-semibold text-gray-900">{{ $kontak->alamat }}</p>
                                            <a href="#"
                                                class="mt-1 inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-800 transition">
                                                Lihat di peta
                                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
