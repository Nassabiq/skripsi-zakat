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
        Schema::create('zis', function (Blueprint $table) {
            $table->string('id_zis')->unique();

            $table->string('no_pembayaran');
            $table->string('nama_muzakki')->nullable();

            $table->string('tipe_zis');
            $table->string('jenis_bank');
            $table->integer('nominal_pembayaran');

            $table->integer('status_pembayaran');

            $table->string('validasi_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zis');
    }
};
