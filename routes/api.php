<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\Bitacora;
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
Route::get('/personas/{id}', [PersonaController::class, 'indexByID']);

// Otras rutas de API

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'indexByID']);
Route::post('/usuarios/create', [UsuarioController::class, 'create']);
Route::post('/usuarios/update/{id}', [UsuarioController::class, 'update']);
Route::post('/usuarios/inactive', [UsuarioController::class, 'inactive']);

Route::get('/roles', [RolController::class, 'index']);
Route::post('/roles/create', [RolController::class, 'create']);
Route::post('/roles/inactive', [RolController::class, 'inactive']);

Route::get('/paginas', [PaginaController::class, 'index']);
Route::post('/paginas/create', [PaginaController::class, 'create']);

Route::get('/bitacoras', [BitacoraController::class, 'index']);
