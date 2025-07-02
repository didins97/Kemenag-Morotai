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
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit'); // Contoh: "Bagian Tata Usaha", "Seksi Pendidikan Agama"
            $table->text('deskripsi')->nullable();
            $table->string('slug')->unique();
            $table->text('profil')->nullable();
            $table->text('tugas_pokok')->nullable();
            $table->text('fungsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kerja');
    }
};
