<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id');
            $table->date('tanggal');
            $table->dateTime('waktu_datang')->nullable();
            $table->dateTime('waktu_pulang')->nullable();
            $table->integer('kategori_id')->nullable();
            $table->integer('potongan_tunjangan_kinerja')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
