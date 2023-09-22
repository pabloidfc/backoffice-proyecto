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

    public function store(Request $req) {
        $req -> validate([
            "ci"        => "required|digits:8|unique:users",
            "nombre"    => "required|alpha|max:40",
            "nombre2"   => "nullable|alpha|max:40",
            "apellido"  => "required|alpha|max:40",
            "apellido2" => "required|alpha|max:40",
            "email"     => "required|email|unique:users",
            "password"  => "required|confirmed",
            "permisos"  => "required|in:Funcionario,Transportista",
            "telefono"  => "required|digits:9",
            "departamento" => "required|alpha|min:2",
            "calle" => "required|alpha|min:2",
            "esquina" => "nullable|alpha|min:2",
            "nro_de_puerta" => "required|integer",
            "coordenada" => "nullable|string|min:2"
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
        $this->crearUsuario($req, $usuario);
        $this->crearTelefono($req, $usuario);
        $this->crearUbicacion($req, $usuario);

        if($req->permisos == "Transportista") {
            $this -> crearTransportista($req, $usuario);
        } else {
            $this -> crearFuncionario($req, $usuario);
        }

        return redirect() -> route("usuario.index");
    }

    private function crearUsuario($req, $usuario) {
        $usuario->ci = $req->input("ci");
        $usuario->nombre = $req->input("nombre");
        $usuario->nombre2 = $req->input("nombre2");
        $usuario->apellido = $req->input("apellido");
        $usuario->apellido2 = $req->input("apellido2");
        $usuario->email = $req->input("email");
        $usuario->password = Hash::make($req->input("password"));
        $usuario->save();
    }

    private function crearTelefono($req, $usuario) {
        $usuario -> Telefono() -> create([
            "telefono" => $req -> telefono
        ]);
    }

    private function crearUbicacion($req, $usuario) {
        $usuario -> Ubicacion() -> create([
            "departamento"  => $req -> input("departamento"),
            "calle"         => $req -> input("calle"),
            "esquina"       => $req -> input("esquina"),
            "nro_de_puerta" => $req -> input("nro_de_puerta"),
            "coordenada"    => $req -> input("coordenada")
        ]);
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

    public function show(Request $req, $idUsuario) {
        $usuario   = User::find($idUsuario);
        $telefonos = $usuario->Telefono;
        $ubicacion = $usuario->Ubicacion;
        $permisos  = [
            $usuario->Transportista,
            $usuario->Funcionario,
            $usuario->Administrador,
        ];

        $almacen = null;
        if($permisos[1]) {
            $almacen = $permisos[1]->Almacen;
        }

        return view("usuario.show", [
            "usuario"   => $usuario,
            "telefonos" => $telefonos,
            "ubicacion" => $ubicacion,
            "permisos"  => $permisos,
            "almacen"   => $almacen
        ]);
    }

    public function destroy(Request $req, $idUsuario) {
        $usuario = User::find($idUsuario);
        if($usuario->id == 1) 
            return redirect()->route("usuario.index")->with("msg", "No puedes eliminar al Administrador!!");
        $usuario -> delete();
        return redirect()->route("usuario.index");

    }
}
