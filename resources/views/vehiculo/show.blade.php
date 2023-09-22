@extends("layouts.app")

@section("title", "Vehiculos")

@section("content")
    <h1>Información del Vehículo N°<span>{{ $vehiculo->id }}</span></h1>
    <div>
        <ul>
           <li><strong>Matrícula:</strong> {{ $vehiculo->matricula }}</li>
           <li><strong>Estado:</strong> {{ $vehiculo->estado }}</li>
           <li><strong>Peso del vehículo:</strong> {{ $vehiculo->peso }}</li>
           <li><strong>Límite de peso:</strong> {{ $vehiculo->limite_peso }}</li>
        </ul>
    </div>

    <button>
        <a href="{{ route("vehiculo.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("vehiculo.edit", $vehiculo->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('vehiculo.destroy', $vehiculo->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection