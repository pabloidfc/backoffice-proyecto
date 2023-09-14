<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function Listar(Request $req) {
        return Vehiculo::all();
    }

    public function ListarUno(Request $req, $idVehiculo) {
        return Vehiculo::find($idVehiculo);
    }

    public function Crear(Request $req) {
        $vehiculo = new Vehiculo;
        $vehiculo -> peso        = $req -> post("peso");
        $vehiculo -> estado      = $req -> post("estado");
        $vehiculo -> matricula   = $req -> post("matricula");
        $vehiculo -> peso_limite = $req -> post("peso_limite");
        $vehiculo -> save();

        return $vehiculo;
    }

    public function Modificar(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::find($idVehiculo);

        if($req -> input("peso"))        $vehiculo -> peso        = $req -> post("peso");
        if($req -> input("estado"))      $vehiculo -> estado      = $req -> post("estado");
        if($req -> input("matricula"))   $vehiculo -> matricula   = $req -> post("matricula");
        if($req -> input("peso_limite")) $vehiculo -> peso_limite = $req -> post("peso_limite");
        
        $vehiculo -> save();
        return $vehiculo;
    }

    public function Eliminar(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::find($idVehiculo);
        $vehiculo -> delete();

        return ["msg" => "El Vehiculo ha sido eliminado correctamente!"];
    }
}
