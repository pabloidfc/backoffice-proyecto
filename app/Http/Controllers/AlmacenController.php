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
        $almacen -> Ubicacion;
        return view("almacen.show", ["almacen" => $almacen]);
    }

    public function create(Request $req) {
        return view("almacen.create");
    }

    public function store(Request $req) {
        $req -> validate([
            "nombre" => "required|string|min:2",
            "tipo" => "required|in:Propio,De terceros",
            "departamento" => "required|string|min:2",
            "calle" => "required|string|min:2",
            "esquina" => "nullable|string|min:2",
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
