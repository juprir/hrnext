<?php

use App\Http\Controllers\Kelola\JabatanController;
use App\Http\Controllers\Kelola\PegawaiController;
use App\Http\Controllers\Kelola\RoleController;
use App\Http\Controllers\Kelola\UserController;
use Illuminate\Support\Facades\Route;

// index, create, store, show, edit, update, destroy

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::patch('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');

Route::get('/peran', [RoleController::class, 'index'])->name('peran.index');
Route::get('/peran/create', [RoleController::class, 'create'])->name('peran.create');
Route::get('/peran/{peran}', [RoleController::class, 'show'])->name('peran.show');
Route::get('/peran/{peran}/edit', [RoleController::class, 'edit'])->name('peran.edit');
Route::patch('/peran/{peran}', [RoleController::class, 'update'])->name('peran.update');

Route::resource('jabatan', JabatanController::class);
