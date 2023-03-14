<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ketentuan_kehadiran', function (Blueprint $table) {
            $table->id();
            $table->integer('musim_id');
            $table->string('hari');
            $table->time('waktu_datang');
            $table->time('waktu_pulang');
            $table->time('toleransi_keterlambatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ketentuan_kehadiran');
    }
};
