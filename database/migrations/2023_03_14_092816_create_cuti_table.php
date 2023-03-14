<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status');
            $table->integer('jenis_cuti_id');
            $table->integer('alasan_cuti_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti');
    }
};
