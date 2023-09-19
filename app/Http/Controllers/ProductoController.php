<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Almacen;
use Illuminate\Validation\Rule;
use GuzzleHttp\Handler\Proxy;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();

        return view("producto.index", ["productos" => $productos]);
    }

    public function create(Request $req) { // TODO: Mostrar almacenes disponibles
        return view("producto.create");
    }

    public function store(Request $req) {
        $req -> validate([
            "almacen_id"        => ["required", "integer", Rule::exists('almacen', 'id')],
            "estado"            => "nullable|in:En espera, Almacenado, Loteado, Desloteado, En viaje, Entregado",
            "peso"              => "required|numeric",
            "departamento"      => "required|alpha|min:4",
            "direccion_entrega" => "required|string",
            "fecha_entrega"     => "required|date"
        ], [
            'almacen_id.exists' => 'The provided id does not match with any Almacen',
        ]);

        $producto = new Producto();
        $producto -> peso              = $req -> input("peso");
        $producto -> departamento      = $req -> input("departamento");
        $producto -> direccion_entrega = $req -> input("direccion_entrega");
        $producto -> fecha_entrega     = $req -> input("fecha_entrega");

        if($req -> has("estado")) 
            $producto -> estado = $req -> input("estado");

        $producto -> Almacen() -> associate($req -> almacen_id);
        $producto -> save();

        return redirect() -> route("producto.index");
    }

    public function destroy(Request $req, $productoId) {
        $producto = Producto::find($productoId);
        $producto -> delete();
        
        return redirect() -> route("producto.index");
    }

    public function show(Request $req, $idProducto) {
        $producto = Producto::find($idProducto);
        $almacen = $producto -> Almacen;
        $ubicacion = $almacen -> Ubicacion;
        $lote = $producto -> Lote;

        return view("producto.show", [
            "producto" => $producto,
            "almacen" => $almacen,
            "ubicacion" => $ubicacion,
            "lote" => $lote
        ]);
    }

    public function edit(Request $req, $idProducto) {
        $producto = Producto::find($idProducto);
        $almacen = $producto -> Almacen;
        $ubicacion = $almacen -> Ubicacion;
        $lote = $producto -> Lote;

        return view("producto.edit", [
            "producto" => $producto,
            "almacen" => $almacen,
            "ubicacion" => $ubicacion,
            "lote" => $lote
        ]);
    }

    public function update(Request $req, $idProducto) {
        $req -> validate([
            "almacen_id"        => ["required", "integer", Rule::exists('almacen', 'id')],
            "estado"            => "nullable|in:En espera, Almacenado, Loteado, Desloteado, En viaje, Entregado",
            "peso"              => "required|numeric",
            "departamento"      => "required|alpha|min:4",
            "direccion_entrega" => "required|string",
            "fecha_entrega"     => "required|date"
        ], [
            'almacen_id.exists' => 'The provided id does not match with any Almacen',
        ]);

        $producto = Producto::find($idProducto);
        $producto -> peso              = $req -> input("peso");
        $producto -> departamento      = $req -> input("departamento");
        $producto -> direccion_entrega = $req -> input("direccion_entrega");
        $producto -> fecha_entrega     = $req -> input("fecha_entrega");
        $producto -> estado            = $req -> input("estado");

        $producto -> Almacen() -> associate($req -> almacen_id);
        $producto -> save();
        
        return redirect() -> route("producto.index");
    }
}
