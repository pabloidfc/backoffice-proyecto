<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camion;

class CamionController extends Controller
{
    public function Listar(Request $req) {
        return Camion::all();
    }

    public function ListarUno(Request $req, $idCamion) {
        return Camion::find($idCamion);
    }

    public function Crear(Request $req) {
        $camion = new Camion;
        $camion -> peso        = $req -> post("peso");
        $camion -> estado      = $req -> post("estado");
        $camion -> matricula   = $req -> post("matricula");
        $camion -> peso_limite = $req -> post("peso_limite");
        $camion -> save();

        return $camion;
    }

    public function Modificar(Request $req, $idCamion) {
        $camion = Camion::find($idCamion);

        if($req -> input("peso"))        $camion -> peso        = $req -> post("peso");
        if($req -> input("estado"))      $camion -> estado      = $req -> post("estado");
        if($req -> input("matricula"))   $camion -> matricula   = $req -> post("matricula");
        if($req -> input("peso_limite")) $camion -> peso_limite = $req -> post("peso_limite");
        
        $camion -> save();
        return $camion;
    }

    public function Eliminar(Request $req, $idCamion) {
        $camion = Camion::find($idCamion);
        $camion -> delete();

        return ["msg" => "El Camión ha sido eliminado correctamente!"];
    }
}
