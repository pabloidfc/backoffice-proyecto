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
        $req -> validate([
            "matricula" => "required|string|max:10",
            "estado" => "required|in:Disponible,No disponible,En reparación",
            "peso" => "required|numeric",
            "limite_peso" => "required|numeric"
        ]);

        $vehiculo = new Vehiculo;
        $vehiculo -> matricula   = $req -> matricula; 
        $vehiculo -> estado      = $req -> estado; 
        $vehiculo -> peso        = $req -> peso; 
        $vehiculo -> limite_peso = $req -> limite_peso; 
        $vehiculo -> save();

        return redirect() -> route("vehiculo.index");
    }
}
