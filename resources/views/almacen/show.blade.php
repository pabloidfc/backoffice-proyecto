@extends("layouts.app")

@section("title", "Almacenes")

@section("content")
    <h1>Información del Almacen N°<span>{{ $almacen->id }}</span></h1>
    <div>
        <ul>
            <li><strong>Nombre: </strong> {{ $almacen->nombre }}</li>
            <li><strong>Tipo: </strong> {{ $almacen->tipo }}</li>
            <li>
                <strong>Ubicacion: </strong>
                <ul>
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
                </ul>
            </li>
        </ul>
    </div>   
    <button>
        <a href="{{ route("almacen.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("almacen.edit", $almacen->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('almacen.destroy', $almacen->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection