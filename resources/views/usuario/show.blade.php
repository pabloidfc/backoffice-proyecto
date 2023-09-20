@extends("layouts.app")

@section("title", "Usuarios")

@section("content")
    <h1>Información del Usuario N°<span>{{ $usuario->id }}</span></h1>
    <div>
        <ul>
            <li><strong>Nombre: </strong> {{ $usuario->nombre }}</li>
        </ul>
    </div>

    <button>
        <a href="{{ route("usuario.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("usuario.edit", $usuario->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('usuario.destroy', $usuario->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection