<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function index() {
        $vehiculos = vehiculo::all();
        return view("vehiculo.index", ["vehiculos" => $vehiculos]);
    }

    public function create() {
        return view("vehiculo.create");
    }

    public function store(Request $req) {


        $vehiculo = new Vehiculo;
        $vehiculo -> matricula   = $req -> matricula; 
        $vehiculo -> estado      = $req -> estado; 
        $vehiculo -> peso        = $req -> peso; 
        $vehiculo -> limite_peso = $req -> limite_peso; 
        $vehiculo -> save();

        return redirect() -> route("vehiculo.index");
    }

    public function show(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);

        return view("vehiculo.show", [
            "vehiculo" => $vehiculo
        ]);
    }

    public function destroy(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
        $vehiculo -> delete();

        return redirect() -> route("vehiculo.index");
    }

    public function edit(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
        return view("vehiculo.edit", [
            "vehiculo" => $vehiculo
        ]);
    }

    public function update(Request $req, $idVehiculo) {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);

        $req -> validate([
            "matricula" => "required|string|max:10",
            "estado" => "required|in:Disponible,No disponible,En reparación",
            "peso" => "required|numeric",
            "limite_peso" => "required|numeric"
        ]);

        $vehiculo -> matricula   = $req -> matricula; 
        $vehiculo -> estado      = $req -> estado; 
        $vehiculo -> peso        = $req -> peso; 
        $vehiculo -> limite_peso = $req -> limite_peso; 
        $vehiculo -> save();

        $vehiculo -> save();

        return redirect()->route("vehiculo.index");
    }
}
