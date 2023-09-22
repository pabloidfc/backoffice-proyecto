<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
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
}) 
-> name("home")
-> middleware("auth");

Route::controller(SessionController::class) -> group(function () {
    Route::get("/login",  "login") -> name("login");
    Route::post("/login", "store") -> name("login");
});

Route::middleware("auth")->group(function () {
    Route::controller(UsuarioController::class)    -> group(function () {
        Route::get("/usuario", "index")            -> name("usuario.index");
        Route::get("/usuario/crear", "create")     -> name("usuario.create");
        Route::get("/usuario/{id}", "show")        -> name("usuario.show");
        Route::get("/usuario/{id}/editar", "edit") -> name("usuario.edit");
        Route::put("/usuario/{id}", "update")      -> name("usuario.update");
        Route::delete("/usuario/{id}", "destroy")  -> name("usuario.destroy");
        Route::post("/usuario", "store")           -> name("usuario.store");
    });
    
    Route::controller(VehiculoController::class)    -> group(function () {
        Route::get("/vehiculo", "index")            -> name("vehiculo.index");
        Route::get("/vehiculo/crear", "create")     -> name("vehiculo.create");
        Route::get("/vehiculo/{id}", "show")        -> name("vehiculo.show");
        Route::get("/vehiculo/{id}/editar", "edit") -> name("vehiculo.edit");
        Route::put("/vehiculo/{id}", "update")      -> name("vehiculo.update");
        Route::delete("/vehiculo/{id}", "destroy")  -> name("vehiculo.destroy");
        Route::post("/vehiculo", "store")           -> name("vehiculo.store");
    });

    Route::controller(ProductoController::class) -> group(function () {
        Route::get("/producto", "index") -> name("producto.index");
        Route::get("/producto/crear", "create") -> name("producto.create");
        Route::get("/producto/{id}", "show") -> name("producto.show");
        Route::get("/producto/{id}/editar", "edit") -> name("producto.edit");
        Route::put("/producto/{id}", "update") -> name("producto.update");
        Route::delete("/producto/{id}", "destroy") -> name("producto.destroy");
        Route::post("producto/", "store") -> name("producto.store");
    });
    
    Route::controller(LoteController::class)   -> group(function () {
        Route::get("/lote", "index")           -> name("lote.index");
        Route::get("/lote/crear", "create")    -> name("lote.create");
        Route::get("/lote/{id}", "show")       -> name("lote.show");
        Route::get("/lote/{id}/editar", "edit") -> name("lote.edit");
        Route::put("/lote/{id}", "update") -> name("lote.update");
        Route::delete("/lote/{id}", "destroy") -> name("lote.destroy");
        Route::post("lote", "store")           -> name("lote.store");
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

    Route::controller(ClienteController::class)    -> group(function () {
        Route::get("/cliente", "index")            -> name("cliente.index");
        Route::get("/cliente/crear", "create")     -> name("cliente.create");
        Route::get("/cliente/{id}", "show")        -> name("cliente.show");
        Route::delete("/cliente/{id}", "destroy")  -> name("cliente.destroy");
        Route::put("/cliente/{id}", "update")      -> name("cliente.update");
        Route::get("/cliente/{id}/editar", "edit") -> name("cliente.edit");
        Route::post("/cliente", "store")           -> name("cliente.store");
    });
});
