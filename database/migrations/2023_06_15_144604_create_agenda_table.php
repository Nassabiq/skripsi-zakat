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
        Schema::create('agenda', function (Blueprint $table) {
            $table->string('id_agenda')->unique();
            $table->primary('id_agenda');

            $table->string('nama_agenda');
            $table->dateTime('tgl_agenda');
            $table->integer('status_agenda');
            $table->longText('deskripsi_agenda');
            $table->longText('foto_agenda');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
