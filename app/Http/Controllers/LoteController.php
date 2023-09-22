<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use Illuminate\Validation\Rule;

class LoteController extends Controller
{
    public function index() {
        $lotes = Lote::all();

        return view("lote.index", ["lotes" => $lotes]);
    }

    public function show(Request $req, $idLote) {
        $lote = Lote::find($idLote);
        $creador = $lote -> Creador;
        $almacen = $lote -> Almacen;
        $ubicacion = $almacen -> Ubicacion;

        return view("lote.show", [
            "lote" => $lote,
            "creador" => $creador,
            "almacen" => $almacen,
            "ubicacion" => $ubicacion
        ]);
    }

    public function create() {
        return view("lote.create");
    }

    public function store(Request $req) {
        $req -> validate([
            "almacen_destino" => ["required", "integer", Rule::exists('almacen', 'id')],
            "estado" => "nullable|in:Creado,En viaje,Desarmado"
        ]);

        $lote = new Lote;
        $lote -> peso = 0;
        $lote -> Creador() -> associate(1);
        $lote -> Almacen() -> associate($req->almacen_destino);
        $lote -> save();

        return redirect()->route("lote.index");
    }

    public function destroy(Request $req, $idLote) {
        $lote = Lote::findOrFail($idLote);
        $lote -> delete();

        return redirect() -> route("lote.index");
    }

    public function edit(Request $req, $idLote) {
        $lote = Lote::findOrFail($idLote);
        $almacen = $lote -> Almacen; 
        return view("lote.edit", [
            "lote" => $lote,
            "almacen" => $almacen
        ]);
    }

    public function update(Request $req, $idLote) {
        $lote = Lote::findOrFail($idLote);

        $req -> validate([
            "almacen_destino" => ["required", "integer", Rule::exists('almacen', 'id')],
            "estado" => "nullable|in:Creado,En viaje,Desarmado"
        ], [
            "almacen_destino.exists" => "The provided id not match any Almacen"
        ]);

        $lote -> Almacen() -> associate($req->almacen_destino);
        $lote -> save();

        return redirect()->route("lote.index");
    }
}
