<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            "ci"        => "required|string|max:8",
            "nombre"    => "required|alpha|max:40",
            "nombre2"   => "nullable|alpha|max:40",
            "apellido"  => "required|alpha|max:40",
            "apellido2" => "required|alpha|max:40",
            "email"     => "required|email|unique:users",
            "password"  => "required|confirmed",
            "permisos"  => "required|in:Funcionario, Tranportista",
            "tipo"      => "nullable|in:Propio, De terceros"
        ]);

        $user = new User();
        $user -> ci        = $req -> input("ci");
        $user -> nombre    = $req -> input("nombre");
        $user -> nombre2   = $req -> input("nombre2");
        $user -> apellido  = $req -> input("apellido");
        $user -> apellido2 = $req -> input("apellido2");
        $user -> email     = $req -> input("email");
        $user -> password  = Hash::make($req -> input("password"));   
        $user -> save();
    }


    // public function Listar(Request $req) {
    //     return Usuario::all();
    // }

    // public function ListarUno(Request $req, $idUsuario) {
    //     return Usuario::find($idUsuario);
    // }

    // public function Crear(Request $req) {
    //     $usuario = new Usuario;
    //     $usuario -> nombre    = $req -> post("nombre");
    //     $usuario -> apellido  = $req -> post("apellido");
    //     $usuario -> apellido2 = $req -> post("apellido2");
    //     $usuario -> celular   = $req -> post("celular");
    //     $usuario -> direccion = $req -> post("direccion");
    //     $usuario -> tipo      = $req -> post("tipo");
    //     $usuario -> email     = $req -> post("email");
    //     $usuario -> password  = Hash::make( $req -> post("password") );
    //     $usuario -> save();

    //     return $usuario;
    // }

    // public function Modificar(Request $req, $idUsuario) {
    //     $usuario = Usuario::find($idUsuario);

    //     if($req -> input("tipo"))      $usuario -> tipo      = $req -> post("tipo");
    //     if($req -> input("email"))     $usuario -> email     = $req -> post("email");
    //     if($req -> input("celular"))   $usuario -> celular   = $req -> post("celular");
    //     if($req -> input("direccion")) $usuario -> direccion = $req -> post("direccion");
    //     if($req -> input("password"))  $usuario -> password  = Hash::make( $req -> post("password") );

    //     $usuario -> save();
    //     return $usuario;
    // }

    // public function Eliminar(Request $req, $idUsuario) {
    //     $usuario = Usuario::find($idUsuario);
    //     $usuario -> delete();

    //     return ["msg" => "El Usuario ha sido eliminado correctamente!"];
    // }
}
