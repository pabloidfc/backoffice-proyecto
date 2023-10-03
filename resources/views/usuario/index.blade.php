@extends('layouts.app')
@section('title', "Usuarios")

@section("content")
    
<div class="container">
    <h1>Usuario</h1>
    <div class="col">
        <a href="{{ route("usuario.create") }}" class="btn btn-primary mb-4">Crear nuevo usuario</a>
        <div class="row gap-1">
            @foreach ($usuarios as $usuario)
            <div class="col-12 col-lg d-grid gap-4 rounded shadow-sm p-3">
                <a 
                    class="text-decoration-none text-dark"
                    href="{{ route("usuario.show", $usuario->id) }}"
                    role="button"
                >
                    <strong>{{ $usuario->id }} - {{ $usuario->nombre }} {{ $usuario->apellido }}</strong> 
                </a>
                <div class="btn-group col-1">
                    <a class="btn btn-success" href="{{ route("usuario.edit", $usuario->id) }}">
                        Editar
                    </a>
                    <form 
                        action="{{ route('usuario.destroy', $usuario->id) }}"
                        method="POST"
                        role="button"
                        class="btn btn-danger"
                    >
                        @csrf
                        @method("DELETE")
                        <input 
                            type="submit" 
                            class="bg-transparent border-0 text-light" 
                            value="Eliminar"
                        >
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection