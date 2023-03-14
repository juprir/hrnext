<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alasan_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('alasan');
            $table->string('nama_bukti_dukung')->nullable();
            $table->boolean('wajib_bukti_dukung');
            $table->boolean('perlu_verifikasi');
            $table->boolean('ada_saldo');
            $table->boolean('dapat_dibatalkan_per_hari');
            $table->integer('maksimal_waktu')->nullable();
            $table->string('jenis_waktu')->nullable();
            $table->integer('syarat_lama_kerja_dalam_tahun')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alasan_cuti');
    }
};
