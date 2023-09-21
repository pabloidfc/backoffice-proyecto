<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view("cliente.index", [
            "clientes" => $clientes
        ]);
    }

    public function create() {
        return view("cliente.create");
    }

    public function store(Request $req) {
        $req->validate([
            "rut" => "required|string|max:12",
            "direccion" => "required|string",
            "email" => "required|email",
            "cuentabancaria" => "required|numeric"
        ]);
        
        if ($req->ubicacion == "on") {
            $req->validate([
                "departamento" => "required|alpha|min:2",
                "calle" => "required|alpha|min:2",
                "esquina" => "nullable|alpha|min:2",
                "nro_de_puerta" => "required|integer",
                "coordenada" => "nullable|string|min:2"
            ]);
        }

        $cliente = new Cliente;
        $cliente -> rut            = $req -> rut;
        $cliente -> direccion      = $req -> direccion;
        $cliente -> email          = $req -> email;
        $cliente -> cuentabancaria = $req -> cuentabancaria;
        $cliente->save();

        if($req->ubicacion == "on") {
            $this->crearUbicacion($req, $cliente);
        }

        return redirect()->route("cliente.index");
    }

    private function crearUbicacion($req, $cliente) {
        $cliente -> Ubicacion() -> create([
            "departamento"  => $req -> input("departamento"),
            "calle"         => $req -> input("calle"),
            "esquina"       => $req -> input("esquina"),
            "nro_de_puerta" => $req -> input("nro_de_puerta"),
            "coordenada"    => $req -> input("coordenada")
        ]);
    }

    public function show() {
        return view("cliente.show");
    }
}
