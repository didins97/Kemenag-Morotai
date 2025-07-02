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
        Schema::create('sejarahs', function (Blueprint $table) {
            $table->id();
            $table->string('latar_belakang')->nullable();
            $table->json('timeline')->nullable();
            /*

                {
                    "year": "2013",
                    "title": "Pembentukan Kantor",
                    "description": "Kementerian Agama Kabupaten Pulau Morotai berdasarkan Peraturan Presiden Nomor 23 Tahun 2013",
                    "highlight": "Pembentukan",
                    "icon": "heroicon-o-building-office"
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
        Schema::dropIfExists('sejarahs');
    }
};
