<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();

        return view("producto.index", ["productos" => $productos]);
    }

    public function create(Request $req) {
        return view("producto.create");
    }

    public function store(Request $req) {
        return redirect() -> route("producto.index");
    }

    public function show(Request $req, $productoId) {
        $producto = Producto::find($productoId);

        return view("producto.show", ["producto" => $producto]);
    }
}
