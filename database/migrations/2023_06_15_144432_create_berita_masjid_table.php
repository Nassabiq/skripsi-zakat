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
        Schema::create('berita_masjid', function (Blueprint $table) {
            $table->string('id_berita_masjid')->unique();
            $table->primary('id_berita_masjid');

            $table->string('nama_berita');
            $table->dateTime('tgl_berita');
            $table->longText('deskripsi_berita');
            $table->longText('foto_berita');
            $table->boolean('is_published');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_masjid');
    }
};
