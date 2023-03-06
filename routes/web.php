<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dev.php';

Route::prefix('sub')->as('bawahan.')->middleware(['auth:sanctum'])->group(
    base_path('routes/resources/bawahan.php'),
);

Route::prefix('m')->as('kelola.')->middleware(['auth:sanctum'])->group(
    base_path('routes/resources/kelola.php'),
);

Route::prefix('s')->as('pengaturan.')->middleware(['auth:sanctum'])->group(
    base_path('routes/resources/pengaturan.php'),
);
