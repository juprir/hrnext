<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ulid')->nullable();
            $table->string('nama');
            $table->string('panggilan')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->tinyInteger('jenis_kelamin')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->unsignedBigInteger('atasan_id')->nullable();
            $table->unsignedBigInteger('pangkat_id')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('unit_organisasi_id')->nullable();
            $table->string('id_sidik_jari')->nullable();
            $table->date('terakhir_mulai_aktif_kerja')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
