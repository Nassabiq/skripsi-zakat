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
            $table->primary('id_zis');

            $table->string('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('no_pembayaran');
            $table->string('nama_muzakki')->nullable();

            $table->string('tipe_zis');
            $table->string('jenis_bank');
            $table->integer('nominal_pembayaran');

            $table->integer('status_pembayaran');
            $table->longText('bukti_pembayaran')->nullable();

            $table->integer('validasi_data')->nullable();

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
