<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Ruta principal que muestra la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el panel de control, protegida por autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para probar la conexión a la base de datos
Route::get('/test-db', function () {
    try {
        // Intenta obtener una instancia de PDO para verificar la conexión
        DB::connection()->getPdo();
        // Si la conexión es exitosa, muestra un mensaje
        return 'Conexión a la base de datos exitosa!';
    } catch (\Exception $e) {
        // Si ocurre un error, muestra el mensaje de error
        return 'No se pudo conectar a la base de datos. Error: ' . $e->getMessage();
    }
});

// Rutas para el controlador de ítems
Route::resource('items', ItemController::class)->middleware('auth');

// Rutas para el controlador de personas
Route::resource('personas', PersonaController::class)->middleware('auth');

// Rutas para el controlador de vehículos
Route::resource('vehiculos', VehiculoController::class)->middleware('auth');

// Requiere el archivo de rutas para autenticación
require __DIR__.'/auth.php';
