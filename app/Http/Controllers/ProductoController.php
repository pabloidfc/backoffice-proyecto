<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function Listar() {
        $productos = Producto::all();

        return view("producto/productos", ["productos" => $productos]);
    }

    public function ListarUno(Request $req, $productoId) {
        $producto = Producto::find($productoId);

        return view("producto/productoInfo", ["producto" => $producto]);
    }
}
