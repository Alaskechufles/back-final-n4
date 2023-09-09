<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [PersonaController::class, 'create']);
Route::post('/login', [PersonaController::class, 'login']);
Route::get('/verificar', [PersonaController::class, 'verificar']);
Route::get('/', [PersonaController::class, 'index']);

/* Route::middleware(['web'])->group(function () {
    // Rutas que necesitan sesiones
    Route::post('/login', [PersonaController::class, 'login']);
    Route::get('/verificar', [PersonaController::class, 'verificar']);
}); */

// Otras rutas de API