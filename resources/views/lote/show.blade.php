@extends("layouts.app")

@section("title", "Productos")

@section("content")
    <h1>Información del Lote N°<span>{{ $lote->id }}</span></h1>
    <div>
        <ul>
            <li><strong>Estado:</strong> {{ $lote->estado }} </li>
            <li><strong>Peso:</strong> {{ $lote->peso }} </li>
            <li>
                <strong>Creador del lote: </strong><br>
                <ul>
                    <li><strong>CI: </strong> {{ $creador->ci }}</li>
                    <li><strong>Nombre: </strong> {{ $creador->nombre }}</li>
                    @isset($creador->nombre2)
                        <li><strong>Segundo nombre: </strong> {{ $creador->nombre2 }}</li>
                    @endisset
                    <li><strong>Apellido: </strong> {{ $creador->apellido }}</li>
                    <li><strong>Segundo apellido: </strong> {{ $creador->apellido2 }}</li>
                    <li><strong>Email: </strong> {{ $creador->email }}</li>
                </ul>
            </li>
            <li>
                <strong>Almacen destino</strong><br>
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
            </li>
        </ul>
    </div>

    <button>
        <a href="{{ route("lote.index") }}">Volver</a>
    </button>

    {{-- <button>
        <a href="{{ route("lote.edit", $lote->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('lote.destroy', $lote->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form> --}}
@endsection