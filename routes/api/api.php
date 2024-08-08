<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AuthController;


Route::prefix('vehiculos')->group(function () {
    Route::get('/', [VehiculoController::class, 'index']);
    Route::get('/{id}', [VehiculoController::class, 'show']);
    Route::post('/', [VehiculoController::class, 'store']);
    Route::put('/{id}', [VehiculoController::class, 'update']);
    Route::delete('/{id}', [VehiculoController::class, 'destroy']);
});


Route::prefix('personas')->group(function () {
    Route::get('/', [PersonaController::class, 'index']);
    Route::get('/{id}', [PersonaController::class, 'show']);
    Route::post('/', [PersonaController::class, 'store']);
    Route::put('/{id}', [PersonaController::class, 'update']);
    Route::delete('/{id}', [PersonaController::class, 'destroy']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('me', [AuthController::class, 'me']);


Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::get('auth/me', [AuthController::class, 'me']);
