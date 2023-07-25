<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;

class RutaController extends Controller
{
    public function Listar(Request $req) {
        return Ruta::all();
    }

    public function ListarUno(Request $req, $idRuta) {
        return Ruta::find($idRuta);
    }

    public function Crear(Request $req) {
        $ruta = new Ruta;
        $ruta -> distanciakm     = $req -> post("distanciakm");
        $ruta -> tiempo_estimado = $req -> post("tiempo_estimado");
        $ruta -> save();

        return $ruta;
    }

    public function Modificar(Request $req, $idRuta) {
        $ruta = Ruta::find($idRuta);

        if($req -> input("distanciakm"))     $ruta -> distanciakm     = $req -> post("distanciakm");
        if($req -> input("tiempo_estimado")) $ruta -> tiempo_estimado = $req -> post("tiempo_estimado");

        $ruta -> save();
        return $ruta;
    }

    public function Eliminar(Request $req, $idRuta) {
        $ruta = Ruta::find($idRuta);
        $ruta -> delete();

        return ["msg" => "La Ruta ha sido eliminada correctamente!"];
    }
}
