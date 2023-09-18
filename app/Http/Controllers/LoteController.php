<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{
    public function index() {
        $lotes = Lote::all();

        return view("lote.index", ["lotes" => $lotes]);
    }

    public function show(Request $req, $loteId) {
        $lote = Lote::find($loteId);

        return view("lote.show", ["lote" => $lote]);
    }
}
