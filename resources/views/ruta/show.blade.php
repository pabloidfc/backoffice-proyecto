@extends("layouts.app")

@section("title", "Rutas")

@section("content")
    <h1>Información de la Ruta N°<span>{{ $ruta->id }}</span></h1>
    <div>
        <ul>
           <li><strong>Distancia en Kilómetros:</strong> {{ $ruta->distanciakm }}</li>
           <li><strong>Tiempo Estimado:</strong> {{ $ruta->tiempo_estimado }}</li>

        </ul>
    </div>

    <button>
        <a href="{{ route("ruta.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("ruta.edit", $ruta->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('ruta.destroy', $ruta->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection