<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = User::all();

        return view("usuario.index", [
            "usuarios" => $usuarios
        ]);
    }

    public function create() {
        return view("usuario.create");
    }

    public function show(Request $req, $idUsuario) {
        $usuario = User::find($idUsuario);
        return view("usuario.show", [
            "usuario" => $usuario
        ]);
    }

    public function store(Request $req) {
        $req -> validate([
            "ci"        => "required|string|max:8|unique:users",
            "nombre"    => "required|alpha|max:40",
            "nombre2"   => "nullable|alpha|max:40",
            "apellido"  => "required|alpha|max:40",
            "apellido2" => "required|alpha|max:40",
            "email"     => "required|email|unique:users",
            "password"  => "required|confirmed",
            "permisos"  => "required|in:Funcionario,Transportista",
        ]);

        if($req->permisos == "Funcionario") {
            $req -> validate([
                "tipo" => "required|in:Propio,De terceros",
                "almacen_id" => ["required", "integer", Rule::exists('almacen', 'id')]
            ], [
                'almacen_id.exists' => 'The provided id does not match any Almacen',
            ]);
        }
        if ($req->tipo == "De terceros") {
            $req -> validate([
                "empresa_id" => ["required", "integer", Rule::exists('cliente', 'id')]
            ], [
                'empresa_id.exists' => 'The provided id does not match any Cliente',
            ]);
        }

        $usuario = new User;
        $usuario->ci = $req->input("ci");
        $usuario->nombre = $req->input("nombre");
        $usuario->nombre2 = $req->input("nombre2");
        $usuario->apellido = $req->input("apellido");
        $usuario->apellido2 = $req->input("apellido2");
        $usuario->email = $req->input("email");
        $usuario->password = Hash::make($req->input("password"));
        $usuario->save();

        if($req->permisos == "Transportista") {
            $this -> crearTransportista($req, $usuario);
        } else {
            $this -> crearFuncionario($req, $usuario);
        }

        return redirect() -> route("usuario.index");
    }

    private function crearTransportista($req, $usuario) {
        $usuario->Transportista()->create();
    }

    private function crearFuncionario($req, $usuario) {
        if($req->tipo == "De terceros") {
            $usuario->Funcionario()->create([
                "almacen_id" => $req->almacen_id,
                "empresa_id" => $req->empresa_id,
                "tipo" => $req->tipo
            ]);
        } else {
            $usuario->Funcionario()->create([
                "almacen_id" => $req->almacen_id,
                "tipo" => $req->tipo
            ]);
        }
    }
}
