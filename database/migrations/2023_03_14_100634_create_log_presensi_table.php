<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_presensi', function (Blueprint $table) {
            $table->id();
            $table->string('id_sidik_jari');
            $table->bigInteger('log_original_id');
            $table->dateTime('waktu_mesin');
            $table->dateTime('waktu_server');
            $table->integer('terminal_id');
            $table->string('nama_terminal');
            $table->string('metode');
            $table->string('status');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_presensi');
    }
};
