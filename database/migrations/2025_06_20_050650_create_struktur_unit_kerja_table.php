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
        Schema::create('struktur_unit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_kerja_id');
            $table->string('jabatan');
            $table->string('nama');
            $table->string('pangkat_golongan');
            $table->string('nip')->nullable();
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja')->onDelete('cascade');
        });

        Schema::create('anggota_unit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_kerja_id');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nip');
            $table->string('foto')->nullable();
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_unit');
        Schema::dropIfExists('anggota_unit');
    }
};
