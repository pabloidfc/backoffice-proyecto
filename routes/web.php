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
    Route::get("/producto", "index") -> name("producto.index");
    Route::get("/producto/crear", "create") -> name("producto.create");
    Route::get("/producto/{id}", "show") -> name("producto.show");
    Route::post("producto/", "store") -> name("producto.store");
});

Route::controller(LoteController::class) -> group(function () {
    Route::get("/lote", "index") -> name("lote.index");
    Route::get("/lote/{id}", "show") -> name("lote.show");
});

Route::controller(AlmacenController::class) -> group(function () {
    Route::get("/almacen", "index")            -> name("almacen.index");
    Route::get("/almacen/crear", "create")     -> name("almacen.create");
    Route::delete("/almacen/{id}", "destroy")  -> name("almacen.destroy");
    Route::put("/almacen/{id}", "update")      -> name("almacen.update");
    Route::get("/almacen/{id}/editar", "edit") -> name("almacen.edit");
    Route::get("/almacen/{id}", "show")        -> name("almacen.show");
    Route::post("/almacen", "store")           -> name("almacen.store");
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