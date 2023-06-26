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
        Schema::create('galeri', function (Blueprint $table) {
            $table->string('id_galeri')->unique();
            $table->primary('id_galeri');

            $table->string('nama_galeri');
            $table->dateTime('tgl_galeri');
            $table->longText('deskripsi_galeri');
            $table->longText('foto_galeri');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
