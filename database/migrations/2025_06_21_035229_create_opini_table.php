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
        Schema::create('opini', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable();
            $table->string('caption_gambar')->nullable();
            $table->string('slug')->unique();
            $table->string('sumber')->nullable();
            $table->timestamps();
        });

        Schema::create('profil_pimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('sambutan');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opini');
        Schema::dropIfExists('profil_pimpinan');
    }
};
