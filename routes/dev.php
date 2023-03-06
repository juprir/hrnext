<?php

use App\Http\Resources\Kelola\PegawaiResource;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;

/**
 * Route untuk uji coba di local saja
 */
if (! app()->isProduction()) {
    Route::prefix('dev')->group(
        function () {
            Route::get('/', function () {
                $pegawai = Pegawai::first();

                $pegawai = new PegawaiResource(
                    $pegawai->load(['pangkat:id,nama', 'jabatan:id,nama'])
                );

                return $pegawai;
            });
        }
    );
}
