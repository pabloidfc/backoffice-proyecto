<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index(Request $req) {
        $almacenes = Almacen::all();
        return view("almacen.index", ["almacenes" => $almacenes]);
    }

    public function show(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);
        $almacen -> Ubicacion;
        return view("almacen.show", ["almacen" => $almacen]);
    }

    public function create(Request $req) {
        return view("almacen.create");
    }

    public function store(Request $req) {
        $almacen = new Almacen;
        $almacen -> tipo        = $req -> post("tipo");
        $almacen -> nombre      = $req -> post("nombre");
        $almacen -> direccion   = $req -> post("direccion");
        $almacen -> coordenadas = $req -> post("coordenadas");
        $almacen -> save();

        return $almacen;
    }

    public function update(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);

        if($req -> input("tipo"))        $almacen -> tipo        = $req -> post("tipo");
        if($req -> input("nombre"))      $almacen -> nombre      = $req -> post("nombre");
        if($req -> input("direccion"))   $almacen -> direccion   = $req -> post("direccion");
        if($req -> input("coordenadas")) $almacen -> coordenadas = $req -> post("coordenadas");

        $almacen -> save();
        return $almacen;
    }

    public function destroy(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);
        $almacen -> delete();

        return ["msg" => "La Almacen ha sido eliminada correctamente!"];
    }
}
