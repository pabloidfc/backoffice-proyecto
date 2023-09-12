<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{
    public function Listar() {
        $lotes = Lote::all();

        return view("lote/lotes", ["lotes" => $lotes]);
    }

    public function ListarUno(Request $req, $loteId) {
        $lote = Lote::find($loteId);

        return view("lote/infoLote", ["lote" => $lote]);
    }
}
