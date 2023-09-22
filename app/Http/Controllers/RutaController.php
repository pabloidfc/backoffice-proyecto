<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use Carbon\Carbon;

class RutaController extends Controller
{
    public function index() {
        $rutas = Ruta::all();
        return view("ruta.index", ["rutas" => $rutas]);
    }

    public function create() {
        return view("ruta.create");
    }

    public function store(Request $req) {
        $req->validate([
            "distanciakm" => "required|numeric|min:1",
            "tiempo_estimado" => "required|date_format:H:i:s",
        ]);

        $tiempoEstimado = Carbon::createFromFormat('H:i:s', $req->input('tiempo_estimado'));
        $tiempoEstimadoFormateado = $tiempoEstimado->format('H:i:s');

        $ruta = new Ruta;
        $ruta -> distanciakm = $req -> distanciakm;
        $ruta -> tiempo_estimado = $tiempoEstimadoFormateado;
        $ruta -> save();

        return redirect() -> route("ruta.index");
    }

    public function show(Request $req, $idRuta) {
        $ruta = Ruta::findOrFail($idRuta);
        return view("ruta.show", ["ruta" => $ruta]);
    }

    public function destroy(Request $req, $idRuta) {
        $ruta = Ruta::findOrFail($idRuta);
        $ruta -> delete();
        return redirect() -> route("ruta.index");
    }

    public function edit(Request $req, $idRuta) {
        $ruta = Ruta::findOrFail($idRuta);
        return view("ruta.edit", ["ruta" => $ruta]);
    }

    public function update(Request $req, $idRuta) {
        $ruta = Ruta::findOrFail($idRuta);

        $req->validate([
            "distanciakm" => "required|numeric|min:1",
            "tiempo_estimado" => "required|date_format:H:i:s",
        ]);

        $tiempoEstimado = Carbon::createFromFormat('H:i:s', $req->input('tiempo_estimado'));
        $tiempoEstimadoFormateado = $tiempoEstimado->format('H:i:s');

        $ruta -> distanciakm = $req -> distanciakm;
        $ruta -> tiempo_estimado = $tiempoEstimadoFormateado;
        $ruta -> save();

        return redirect() -> route("ruta.index");
    }
}
