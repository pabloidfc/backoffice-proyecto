<?php

use App\Http\Controllers\UsuarioController;
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

Route::post("/usuarios", [UsuarioController::class, "Crear"]);
Route::get("/usuarios", [UsuarioController::class, "Listar"]);
Route::get("/usuarios/{id}", [UsuarioController::class, "ListarUno"]);
Route::put("/usuarios/{id}", [UsuarioController::class, "Modificar"]);
Route::delete("/usuarios/{id}", [UsuarioController::class, "Eliminar"]);