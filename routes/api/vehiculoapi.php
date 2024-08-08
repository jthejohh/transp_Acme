<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PersonaController;


Route::prefix('vehiculos')->group(function () {
    Route::get('/', [VehiculoController::class, 'index']);
    Route::get('/{id}', [VehiculoController::class, 'show']);
    Route::post('/', [VehiculoController::class, 'store']);
    Route::put('/{id}', [VehiculoController::class, 'update']);
    Route::delete('/{id}', [VehiculoController::class, 'destroy']);
});