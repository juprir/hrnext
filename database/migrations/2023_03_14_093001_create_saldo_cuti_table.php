<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saldo_cuti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_id');
            $table->integer('tahun');
            $table->integer('jumlah');
            $table->string('jenis');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('saldo_cuti');
    }
};
