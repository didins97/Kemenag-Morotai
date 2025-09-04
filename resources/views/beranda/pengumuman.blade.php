<!-- Section Pengumuman & Pusat Dokumen -->
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto bg-white">
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
        <!-- Main Content - Pengumuman -->
        <div class="lg:w-2/3">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-8 md:mb-10">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 md:w-8 md:h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-bullhorn text-green-600 text-sm md:text-base"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-900">
                        Pengumuman Terbaru
                    </h2>
                </div>
                <a href="/pengumuman" class="text-sm font-medium text-green-600 hover:text-green-700 flex items-center">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                </a>
            </div>

            <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-6"></div>

            <!-- Pengumuman List -->
            <div class="space-y-6">
                @if ($pengumumans->count() > 0)
                    @foreach ($pengumumans as $pengumuman)
                        <!-- Pengumuman Item -->
                        <article
                            class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-6">
                            <div class="flex flex-col md:flex-row md:items-start gap-4">
                                <!-- Date Badge -->
                                <div class="flex-shrink-0">
                                    <div class="bg-green-50 text-green-700 rounded-lg p-3 text-center w-16">
                                        <div class="text-sm font-bold">{{ $pengumuman->tanggal->format('d') }}</div>
                                        <div class="text-xs uppercase">{{ $pengumuman->tanggal->format('M') }}</div>
                                        <div class="text-xs mt-1">{{ $pengumuman->tanggal->format('Y') }}</div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <h3
                                        class="text-lg md:text-xl font-semibold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">
                                        <a
                                            href="#">{{ $pengumuman->judul }}</a>
                                    </h3>
                                    <p class="text-gray-600 text-sm md:text-base mb-4 line-clamp-2">
                                        {{ Str::limit(strip_tags($pengumuman->isi), 72) }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fa-solid fa-user-circle mr-1.5 text-green-500"></i>
                                            <span>{{ $pengumuman->penulis }}</span>
                                        </div>
                                        <a href="#"
                                            class="text-sm font-medium text-green-600 hover:text-green-700 flex items-center">
                                            Baca selengkapnya
                                            <i
                                                class="fa-solid fa-arrow-right ml-1.5 text-xs transition-transform group-hover:translate-x-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <!-- Tampilan jika tidak ada pengumuman -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-8 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-50 rounded-full mb-4">
                            <i class="fa-solid fa-bullhorn text-green-500 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Tidak ada pengumuman</h3>
                        <p class="text-gray-500 mb-4">Belum ada pengumuman yang diterbitkan</p>
                        <a href="#"
                            class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            <i class="fa-solid fa-refresh mr-2"></i>
                            Periksa kembali nanti
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar - Pusat Dokumen -->
        <div class="lg:w-1/3">
            <div class="sticky top-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-7 h-7 md:w-8 md:h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-file-lines text-emerald-600 text-sm md:text-base"></i>
                        </div>
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-900">
                            Pusat Dokumen
                        </h2>
                    </div>
                </div>
                <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-6"></div>

                <!-- Dokumen Categories -->
                <div class="bg-gray-50 rounded-xl p-6 mb-8">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fa-solid fa-folder-tree mr-2 text-emerald-600"></i>
                        Kategori Dokumen
                    </h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-white transition-colors group">
                                <span class="text-gray-700 group-hover:text-emerald-600">Surat</span>
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-0.5 rounded-full">{{ $dokumenCounts['Surat'] ?? 0 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-white transition-colors group">
                                <span class="text-gray-700 group-hover:text-emerald-600">Peraturan</span>
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-0.5 rounded-full">{{ $dokumenCounts['Peraturan'] ?? 0 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-white transition-colors group">
                                <span class="text-gray-700 group-hover:text-emerald-600">Laporan</span>
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-0.5 rounded-full">{{ $dokumenCounts['Laporan'] ?? 0 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-white transition-colors group">
                                <span class="text-gray-700 group-hover:text-emerald-600">Panduan</span>
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-0.5 rounded-full">{{ $dokumenCounts['Panduan'] ?? 0 }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-white transition-colors group">
                                <span class="text-gray-700 group-hover:text-emerald-600">Lainnya</span>
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2 py-0.5 rounded-full">{{ $dokumenCounts['Lainnya'] ?? 0 }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Recent Documents -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 max-w-2xl mx-auto">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fa-solid fa-clock-rotate-left mr-2 text-green-600"></i>
                        Dokumen Terbaru
                    </h3>

                    @if ($dokumens->count() > 0)
                        <div class="space-y-4">
                            @foreach ($dokumens as $dokumen)
                                <div class="flex items-start gap-3 group">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                                        @php
                                            $extension = pathinfo($dokumen->file_path, PATHINFO_EXTENSION);
                                            $icon = 'fa-file';
                                            $color = 'text-gray-600';

                                            if ($extension === 'pdf') {
                                                $icon = 'fa-file-pdf';
                                                $color = 'text-red-600';
                                            } elseif (in_array($extension, ['doc', 'docx'])) {
                                                $icon = 'fa-file-word';
                                                $color = 'text-blue-600';
                                            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                                                $icon = 'fa-file-excel';
                                                $color = 'text-green-600';
                                            } elseif (in_array($extension, ['ppt', 'pptx'])) {
                                                $icon = 'fa-file-powerpoint';
                                                $color = 'text-orange-600';
                                            } elseif (in_array($extension, ['zip', 'rar', '7z'])) {
                                                $icon = 'fa-file-zipper';
                                                $color = 'text-yellow-600';
                                            } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                $icon = 'fa-file-image';
                                                $color = 'text-purple-600';
                                            }
                                        @endphp
                                        <i class="fa-solid {{ $icon }} {{ $color }}"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="text-sm font-medium text-gray-900 truncate group-hover:text-green-600 transition-colors">
                                            <a href="{{ asset('storage/' . $dokumen->file_path) }}"
                                                target="_blank">{{ $dokumen->judul }}</a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $dokumen->kategori }} •
                                            {{ \Carbon\Carbon::parse($dokumen->tanggal)->diffForHumans() }}
                                        </p>
                                    </div>
                                    <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank"
                                        class="flex-shrink-0 text-green-600 hover:text-green-700" title="Download"
                                        download>
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Tampilan jika tidak ada dokumen -->
                        <div class="text-center py-8">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-green-50 rounded-full mb-4">
                                <i class="fa-solid fa-file-circle-exclamation text-green-500 text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-700 mb-2">Tidak ada dokumen</h4>
                            <p class="text-gray-500 text-sm">Belum ada dokumen yang diunggah</p>
                        </div>
                    @endif

                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="/dokumen"
                            class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                            <i class="fa-solid fa-folder-open mr-2"></i>
                            Lihat Semua Dokumen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
