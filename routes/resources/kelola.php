<?php

use App\Http\Controllers\Kelola\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::patch('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
