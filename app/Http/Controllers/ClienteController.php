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
            "cuentabancaria" => "required|numeric",
            "telefono" => "required|digits:9"
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

        $this->crearTelefono($req, $cliente);

        if($req->ubicacion == "on") {
            $this->crearUbicacion($req, $cliente);
        }

        return redirect()->route("cliente.index");
    }

    private function crearTelefono($req, $cliente) {
        $cliente -> Telefono() -> create([
            "telefono" => $req -> telefono
        ]);
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

    public function show(Request $req, $idCliente) {
        $cliente = Cliente::findOrFail($idCliente);
        $ubicacion = $cliente->Ubicacion;
        $telefonos = $cliente->Telefono;
        return view("cliente.show", [
            "cliente" => $cliente,
            "ubicacion" => $ubicacion,
            "telefonos" => $telefonos
        ]);
    }

    public function destroy(Request $req, $idCliente) {
        $cliente = Cliente::find($idCliente);
        $ubicacion = $cliente->Ubicacion;

        $cliente->delete();
        if ($ubicacion)
            $ubicacion->delete();

        return redirect() -> route("cliente.index");
    }

    public function edit(Request $req, $idCliente) {
        $cliente = Cliente::find($idCliente);
        $ubicacion = $cliente->Ubicacion;
        $telefonos = $cliente->Telefono;
        return view("cliente.edit", [
            "cliente" => $cliente,
            "ubicacion" => $ubicacion,
            "telefonos" => $telefonos
        ]);
    }

    public function update(Request $req, $idCliente) {
        $cliente = Cliente::find($idCliente);

        $req->validate([
            "rut" => "required|string|max:12",
            "direccion" => "required|string",
            "email" => "required|email",
            "cuentabancaria" => "required|numeric",
            "telefono" => "required|digits:9"
        ]);
        
        if ($req->has("departamento")) {
            $req->validate([
                "departamento" => "required|alpha|min:2",
                "calle" => "required|alpha|min:2",
                "esquina" => "nullable|alpha|min:2",
                "nro_de_puerta" => "required|integer",
                "coordenada" => "nullable|string|min:2"
            ]);
        }

        $cliente -> rut            = $req -> rut;
        $cliente -> direccion      = $req -> direccion;
        $cliente -> email          = $req -> email;
        $cliente -> cuentabancaria = $req -> cuentabancaria;
        $cliente -> save();

        $telefonos = $cliente -> Telefono;
        foreach ($telefonos as $telefono) {
            $telefono -> telefono = $req -> telefono;
            $telefono -> save();
        }

        if ($req->has("departamento")) {
            $ubicacion = $cliente->Ubicacion;
            $ubicacion -> departamento  = $req -> input("departamento");
            $ubicacion -> calle         = $req -> input("calle");
            $ubicacion -> esquina       = $req -> input("esquina");
            $ubicacion -> nro_de_puerta = $req -> input("nro_de_puerta");
            $ubicacion -> coordenada    = $req -> input("coordenada");
            $ubicacion -> save();
        }

        return redirect()->route("cliente.index");
    }
}
