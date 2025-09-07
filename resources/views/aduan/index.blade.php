@extends('app')

@section('css')
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <style>
        :root {
            --hero-image: url('/assets/img/aduan.png');
        }

        /* Modern Card Design */
        .modern-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .modern-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #047857, #059669);
            padding: 1.5rem;
            color: white;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            background-color: #f9fafb;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
            background-color: white;
        }

        .form-input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }

        /* File Upload */
        .file-upload {
            border: 2px dashed #e5e7eb;
            border-radius: 0.75rem;
            padding: 2rem;
            text-align: center;
            background-color: #f9fafb;
            transition: all 0.2s ease;
        }

        .file-upload:hover {
            border-color: #059669;
            background-color: rgba(5, 150, 105, 0.05);
        }

        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, #047857, #059669);
            color: white;
            padding: 0.875rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #065f46, #047857);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        /* Contact Item */
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.25rem;
        }

        .contact-icon {
            flex-shrink: 0;
            background-color: #d1fae5;
            color: #059669;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 1.25rem;
            }
            .card-body {
                padding: 1.25rem;
            }
            .file-upload {
                padding: 1.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center hero-content">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">Layanan Pengaduan Masyarakat</h1>
                <p class="text-xl md:text-2xl mb-6">Sampaikan keluhan dan masukan Anda kepada kami</p>
                <div class="hero-divider"></div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb-nav">
        <div class="container mx-auto px-4">
            <nav aria-label="Breadcrumb">
                <div class="flex flex-wrap items-center">
                    <div class="breadcrumb-item">
                        <a href="/" class="breadcrumb-link flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Beranda
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <span class="text-gray-600">Pengaduan</span>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Form Section -->
                <div class="w-full lg:w-2/3">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="flex items-center">
                                <div class="bg-white/20 p-2 rounded-lg backdrop-blur-sm mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold">Formulir Pengaduan</h2>
                                    <p class="text-sm opacity-90 mt-1">Sampaikan keluhan atau masukan Anda dengan lengkap</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="mb-6 p-4 rounded-lg bg-green-50 border-l-4 border-green-500 flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-green-800">{{ session('success') }}</p>
                                </div>
                            @endif

                            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('POST')

                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="form-input-icon">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="nama" name="nama" required class="form-input pl-10" placeholder="Nama lengkap Anda">
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="form-input-icon">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <input type="email" id="email" name="email" required class="form-input pl-10" placeholder="email@contoh.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telepon" class="form-label">Nomor Telepon <span class="text-red-500">*</span></label>
                                        <div class="relative">
                                            <div class="form-input-icon">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                            </div>
                                            <input type="tel" id="no_telepon" name="no_telepon" required class="form-input pl-10" placeholder="08xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subjek" class="form-label">Subjek Pengaduan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="form-input-icon">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="subjek" name="subjek" required class="form-input pl-10" placeholder="Ringkasan pengaduan Anda">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="isi" class="form-label">Isi Pengaduan <span class="text-red-500">*</span></label>
                                    <textarea id="isi" name="isi" rows="6" required class="form-input" placeholder="Jelaskan pengaduan Anda secara detail"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Lampiran (Opsional)</label>
                                    <div class="file-upload">
                                        <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <div class="mt-4 flex text-sm text-gray-600 justify-center">
                                            <label for="file" class="relative cursor-pointer font-medium text-green-600 hover:text-green-700">
                                                <span>Upload file</span>
                                                <input id="file" name="file" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">atau drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-2">PDF, JPG, PNG, DOC (Maks. 5MB)</p>
                                    </div>
                                </div>

                                <button type="submit" class="btn-primary mt-2">
                                    <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Kirim Pengaduan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="w-full lg:w-1/3 space-y-6">
                    <!-- Complaint Info Card -->
                    <div class="modern-card">
                        <div class="card-header">
                            <h3 class="text-xl font-bold flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Informasi Pengaduan
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="space-y-5">
                                <li class="flex items-start">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-base font-semibold text-gray-900">Waktu Proses</h4>
                                        <p class="mt-1 text-sm text-gray-600">Pengaduan akan diproses dalam waktu 1-3 hari kerja setelah kami menerima data lengkap</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-base font-semibold text-gray-900">Data Valid</h4>
                                        <p class="mt-1 text-sm text-gray-600">Pastikan data yang diisi valid dan dapat dihubungi untuk proses verifikasi</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-base font-semibold text-gray-900">Kerahasiaan</h4>
                                        <p class="mt-1 text-sm text-gray-600">Data Anda akan kami jaga kerahasiaannya sesuai dengan kebijakan privasi kami</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="modern-card">
                        <div class="card-header">
                            <h3 class="text-xl font-bold flex items-center">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Kontak Langsung
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="space-y-5">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Telepon</p>
                                        <a href="tel:{{ $kontak->no_telepon }}" class="text-base font-semibold text-gray-900 hover:text-green-600 transition">{{ $kontak->no_telepon }}</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">WhatsApp</p>
                                        <a href="https://wa.me/{{ $kontak->no_telepon }}" class="text-base font-semibold text-gray-900 hover:text-green-600 transition">{{ $kontak->no_telepon }}</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Email</p>
                                        <a href="mailto:{{ $kontak->email }}" class="text-base font-semibold text-gray-900 hover:text-green-600 transition">{{ $kontak->email }}</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Alamat Kantor</p>
                                        <p class="text-base font-semibold text-gray-900">{{ $kontak->alamat }}</p>
                                        <a href="#" class="mt-1 inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700 transition">
                                            Lihat di peta
                                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
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
    </section>
@endsection
