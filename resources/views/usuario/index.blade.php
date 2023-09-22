@extends('layouts.app')
@section('title', "Usuarios")

@section("content")
<h3>
    <a href="{{ route("usuario.create") }}">Crear nuevo usuario</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($usuarios as $usuario)
        <a href="{{ route("usuario.show", $usuario->id) }}"> <strong>Usuario N°{{ $usuario->id }}</strong> </a>
    @endforeach
</div>   

@endsection