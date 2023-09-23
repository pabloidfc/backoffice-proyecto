<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Ubicacion;

class AlmacenController extends Controller
{
    public function index(Request $req) {
        $almacenes = Almacen::all();
        return view("almacen.index", ["almacenes" => $almacenes]);
    }

    public function show(Request $req, $idAlmacen) {
        $almacen = Almacen::findOrFail($idAlmacen);
        $ubicacion = $almacen -> Ubicacion;
        return view("almacen.show", [
            "almacen" => $almacen,
            "ubicacion" => $ubicacion
        ]);
    }

    public function create(Request $req) {
        return view("almacen.create");
    }

    public function store(Request $req) {
        $req -> validate([
            "nombre" => "required|alpha|min:2",
            "tipo" => "required|in:Propio,De terceros",
            "departamento" => "required|alpha|min:2",
            "calle" => "required|alpha|min:2",
            "esquina" => "nullable|alpha|min:2",
            "nro_de_puerta" => "required|integer",
            "coordenada" => "nullable|string|min:2"
        ]);


        $almacen = new Almacen;
        $almacen -> nombre = $req -> input("nombre");
        $almacen -> tipo   = $req -> input("tipo");
        $almacen -> save();

        $almacen -> Ubicacion() -> create([
            "departamento"  => $req -> input("departamento"),
            "calle"         => $req -> input("calle"),
            "esquina"       => $req -> input("esquina"),
            "nro_de_puerta" => $req -> input("nro_de_puerta"),
            "coordenada"    => $req -> input("coordenada")
        ]);

        return redirect() -> route("almacen.index");
    }

    public function edit(Request $req, $idAlmacen) {
        $almacen = Almacen::findOrFail($idAlmacen);
        $ubicacion = $almacen -> Ubicacion;

        return view("almacen.edit", [
            "almacen" => $almacen,
            "ubicacion" => $ubicacion
        ]);
    }

    public function update(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);

        $req -> validate([
            "nombre" => "required|alpha|min:2",
            "tipo" => "required|in:Propio,De terceros",
            "departamento" => "required|alpha|min:2",
            "calle" => "required|alpha|min:2",
            "esquina" => "nullable|alpha|min:2",
            "nro_de_puerta" => "required|integer",
            "coordenada" => "nullable|string|min:2"
        ]);

        $almacen -> nombre = $req -> input("nombre");
        $almacen -> tipo   = $req -> input("tipo");
        $almacen -> save();

        $ubicacion = $almacen -> Ubicacion;
        $ubicacion -> departamento  = $req -> input("departamento");
        $ubicacion -> calle         = $req -> input("calle");
        $ubicacion -> esquina       = $req -> input("esquina");
        $ubicacion -> nro_de_puerta = $req -> input("nro_de_puerta");
        $ubicacion -> coordenada    = $req -> input("coordenada");
        $ubicacion -> save();

        return redirect() -> route("almacen.index");
    }

    public function destroy(Request $req, $idAlmacen) {
        $almacen = Almacen::find($idAlmacen);
        $ubicacion = $almacen -> Ubicacion;

        $ubicacion -> delete();
        $almacen -> delete();

        return redirect() -> route("almacen.index");
    }
}
