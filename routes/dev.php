<?php

use Illuminate\Support\Facades\Route;

/**
 * Route untuk uji coba di local saja
 */
if (! app()->isProduction()) {
    Route::prefix('dev')->group(
        function () {
            Route::get('/', function () {
                return 'Local only';
            });
        }
    );
}
