<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->json('proses');
            /*

                {
                    "judul": "Pendaftaran",
                    "description": "Kunjungi loket pendaftaran dengan membawa dokumen yang diperlukan. Petugas akan memverifikasi kelengkapan dokumen dan memberikan nomor antrian.",
                }
                {
                    "judul": "Verifikasi Dokumen",
                    "description": "Tunggu pemanggilan nomor antrian untuk proses verifikasi dokumen oleh petugas. Pastikan semua dokumen asli dan fotokopi telah disiapkan.",
                },

            */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};
