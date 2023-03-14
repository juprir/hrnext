<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('periode_musim', function (Blueprint $table) {
            $table->id();
            $table->integer('musim_id');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->boolean('aktif')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periode_musim');
    }
};
