<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RutaController;

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

Route::post("/usuarios", [UsuarioController::class, "Crear"]);
Route::get("/usuarios", [UsuarioController::class, "Listar"]);
Route::get("/usuarios/{id}", [UsuarioController::class, "ListarUno"]);
Route::put("/usuarios/{id}", [UsuarioController::class, "Modificar"]);
Route::delete("/usuarios/{id}", [UsuarioController::class, "Eliminar"]);

Route::post("/rutas", [RutaController::class, "Crear"]);
Route::get("/rutas", [RutaController::class, "Listar"]);
Route::get("/rutas/{id}", [RutaController::class, "ListarUno"]);
Route::put("/rutas/{id}", [RutaController::class, "Modificar"]);
Route::delete("/rutas/{id}", [RutaController::class, "Eliminar"]);