<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use GuzzleHttp\Handler\Proxy;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();

        return view("producto.index", ["productos" => $productos]);
    }

    public function create(Request $req) {
        return view("producto.create");
    }

    public function store(Request $req) { // ! Error integridad de BSDD
        $req -> validate([
            "almacen_id"        => "required|integer",
            "estado"            => "nullable|in:En espera, Almacenado, Loteado, Desloteado, En viaje, Entregado",
            "peso"              => "required|numeric",
            "departamento"      => "required|string|min:4",
            "direccion_entrega" => "required",
            "fecha_entrega"     => "required|date"
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

    public function show(Request $req, $productoId) {
        $producto = Producto::find($productoId);

        return view("producto.show", ["producto" => $producto]);
    }
}
