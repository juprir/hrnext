<?php

use App\Http\Controllers\Api\PresensiController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});

Route::get('/tokens/create', function (Request $request) {
    $token = User::first()->createToken('presensi');

    return ['token' => $token->plainTextToken];
});

Route::post('/presensi', [PresensiController::class, 'store'])->middleware('auth:sanctum');
