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
        Schema::table('opini', function (Blueprint $table) {
            $table->string('foto_narasumber')->nullable();
            $table->text('tentang_narasumber')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('published')->default(false);
        });

        Schema::create('opini_tag', function (Blueprint $table) {
            $table->foreignId('opini_id')->constrained('opini')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->primary(['opini_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opini', function (Blueprint $table) {
            $table->dropColumn('foto_narasumber');
            $table->dropColumn('tentang_narasumber');
            $table->dropColumn('views');
            $table->dropColumn('published');
        });

        Schema::dropIfExists('opini_tag');
    }
};
