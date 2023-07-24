<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function Listar(Request $req) {
        return Almacen::all();
    }

    public function ListarUno(Request $req, $idAlmacen) {
        return Almacen::find($idAlmacen);
    }

    public function Crear(Request $req) {
        $almacen = new Almacen;
        $almacen -> tipo        = $req -> post("tipo");
        $almacen -> nombre      = $req -> post("nombre");
        $almacen -> direccion   = $req -> post("direccion");
        $almacen -> coordenadas = $req -> post("coordenadas");
        $almacen -> save();

        return $almacen;
    }

    public function Modificar(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);

        if($req -> input("tipo"))        $almacen -> tipo        = $req -> post("tipo");
        if($req -> input("nombre"))      $almacen -> nombre      = $req -> post("nombre");
        if($req -> input("direccion"))   $almacen -> direccion   = $req -> post("direccion");
        if($req -> input("coordenadas")) $almacen -> coordenadas = $req -> post("coordenadas");

        $almacen -> save();
        return $almacen;
    }

    public function Eliminar(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);
        $almacen -> delete();

        return ["msg" => "La Almacen ha sido eliminada correctamente!"];
    }
}
