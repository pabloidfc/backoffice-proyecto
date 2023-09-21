@extends("layouts.app")

@section("title", "Clientes")

@section("content")
    <h1>Información del Cliente N°<span>{{ $cliente->id }}</span></h1>
    <div>
        <ul>
            <li><strong>RUT: </strong> {{ $cliente->rut }}</li>
            <li><strong>Dirección de empresa: </strong> {{ $cliente->direccion }}</li>
            <li><strong>Email de contacto: </strong> {{ $cliente->email }}</li>
            <li><strong>Cuante bancaria: </strong> {{ $cliente->cuentabancaria }}</li>
            <li>
                <strong>Ubicacion el Almacen: </strong>
                <ul>
                    @if($ubicacion)
                    <li> <strong>Departamento: </strong> 
                        {{ $ubicacion->departamento }}
                    </li>
                    <li> <strong>Calle: </strong>
                        {{ $ubicacion->calle }}
                    </li>

                    @isset($ubicacion->esquina)
                        <li> <strong>Esquina: </strong>
                            {{ $ubicacion->esquina }}
                        </li>
                    @endisset

                    <li> <strong>N° de puerta: </strong> 
                        {{ $ubicacion->nro_de_puerta }}
                    </li>

                    @isset($ubicacion->coordenada)
                    <li> <strong>Coordenada: </strong>
                        {{ $ubicacion->coordenada }}
                    </li>
                @endisset
            @else
                <li>No tiene almacen propia!</li>
            @endif
                </ul>
            </li>
        </ul>
    </div>   
    <button>
        <a href="{{ route("cliente.index") }}">Volver</a>
    </button>

    {{-- <button>
        <a href="{{ route("cliente.edit", $cliente->id) }}">Modificar</a>
    </button> --}}

    <form 
        action="{{ route('cliente.destroy', $cliente->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection