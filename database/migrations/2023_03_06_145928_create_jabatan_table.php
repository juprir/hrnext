<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis'); // Struktural, Fungsional, Pelaksana, PPNPN
            $table->unsignedInteger('grade');
            $table->string('kategori'); // JPT Utama, JPT Madya, JPT Pratama, Administrator, Pengawas, Ahli Utama, Ahli Madya, Ahli Muda, Ahli Pertama, Penyelia, Mahir, Terampil, Pelaksana, PPNPN
            $table->date('berlaku_mulai')->nullable()->default(null);
            $table->date('berlaku_sampai')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
};
