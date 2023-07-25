<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function Listar(Request $req) {
        return Usuario::all();
    }

    public function ListarUno(Request $req, $idUsuario) {
        return Usuario::find($idUsuario);
    }

    public function Crear(Request $req) {
        $usuario = new Usuario;
        $usuario -> nombre    = $req -> post("nombre");
        $usuario -> apellido  = $req -> post("apellido");
        $usuario -> apellido2 = $req -> post("apellido2");
        $usuario -> celular   = $req -> post("celular");
        $usuario -> direccion = $req -> post("direccion");
        $usuario -> tipo      = $req -> post("tipo");
        $usuario -> email     = $req -> post("email");
        $usuario -> password  = Hash::make( $req -> post("password") );
        $usuario -> save();

        return $usuario;
    }

    public function Modificar(Request $req, $idUsuario) {
        $usuario = Usuario::find($idUsuario);

        if($req -> input("tipo"))      $usuario -> tipo      = $req -> post("tipo");
        if($req -> input("email"))     $usuario -> email     = $req -> post("email");
        if($req -> input("celular"))   $usuario -> celular   = $req -> post("celular");
        if($req -> input("direccion")) $usuario -> direccion = $req -> post("direccion");
        if($req -> input("password"))  $usuario -> password  = Hash::make( $req -> post("password") );

        $usuario -> save();
        return $usuario;
    }

    public function Eliminar(Request $req, $idUsuario) {
        $usuario = Usuario::find($idUsuario);
        $usuario -> delete();

        return ["msg" => "El Usuario ha sido eliminado correctamente!"];
    }
}
