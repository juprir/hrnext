<?php

use App\Http\Controllers\PresensiBawahanController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('bawahan.presensi.index'));
Route::get('/presensi', [PresensiBawahanController::class, 'index'])->name('presensi.index');
