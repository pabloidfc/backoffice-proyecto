<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
}) -> name("home");

Route::controller(ProductoController::class) -> group(function () {
    Route::get("/productos", "Listar") -> name("productos");
    Route::get("/productos/{id}", "ListarUno") -> name("infoProducto");
});

Route::controller(LoteController::class) -> group(function () {
    Route::get("/lotes", "Listar") -> name("lotes");
    Route::get("/lotes/{id}", "ListarUno") -> name("infoLote");
});

Route::controller(AlmacenController::class) -> group(function () {
    Route::get("/almacenes", "Listar") -> name("almacenes");
    Route::get("/almacenes/{id}", "ListarUno") -> name("infoAlmacen");
});

// Route::post("/usuarios", [UsuarioController::class, "Crear"]);
// Route::get("/usuarios", [UsuarioController::class, "Listar"]);
// Route::get("/usuarios/{id}", [UsuarioController::class, "ListarUno"]);
// Route::put("/usuarios/{id}", [UsuarioController::class, "Modificar"]);
// Route::delete("/usuarios/{id}", [UsuarioController::class, "Eliminar"]);

// Route::post("/rutas", [RutaController::class, "Crear"]);
// Route::get("/rutas", [RutaController::class, "Listar"]);
// Route::get("/rutas/{id}", [RutaController::class, "ListarUno"]);
// Route::put("/rutas/{id}", [RutaController::class, "Modificar"]);
// Route::delete("/rutas/{id}", [RutaController::class, "Eliminar"]);

// Route::post("/camiones", [CamionController::class, "Crear"]);
// Route::get("/camiones", [CamionController::class, "Listar"]);
// Route::get("/camiones/{id}", [CamionController::class, "ListarUno"]);
// Route::put("/camiones/{id}", [CamionController::class, "Modificar"]);
// Route::delete("/camiones/{id}", [CamionController::class, "Eliminar"]);

// Route::post("/almacenes", [AlmacenController::class, "Crear"]);
// Route::get("/almacenes", [AlmacenController::class, "Listar"]);
// Route::get("/almacenes/{id}", [AlmacenController::class, "ListarUno"]);
// Route::put("/almacenes/{id}", [AlmacenController::class, "Modificar"]);
// Route::delete("/almacenes/{id}", [AlmacenController::class, "Eliminar"]);