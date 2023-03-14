<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori_kehadiran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('melalui_pengajuan');
            $table->boolean('hadir')->default(false);
            $table->boolean('tunjangan_kinerja_dipotong')->default(false);
            $table->integer('batas_waktu_potongan')->nullable();
            $table->string('satuan_waktu_potongan')->nullable();
            $table->integer('persentase_potongan')->nullable(); //disimpan di dalam integer, sebelum dipakai dibagi 100
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_kehadiran');
    }
};
