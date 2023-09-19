@extends("layouts.app")

@section("title", "Productos")

@section("content")
    <h1>Información del Producto N°<span>{{ $producto->id }}</span></h1>
    <div>
        <ul>
            <li><strong>Peso: </strong> {{ $producto->peso }}</li>
            <li><strong>Estado: </strong> {{ $producto->estado }}</li>
            <li><strong>Fecha de entrega: </strong> {{ $producto->fecha_entrega }}</li>
            <li><strong>Dirección de entrega: </strong> {{ $producto->direccion_entrega }}</li>

            <li>
                <strong>Lote perteneciente: </strong>
                <ul>
                @if ($lote)
                    <li> <strong>ID: </strong>
                        {{ $lote->id }}
                    </li>
                    <li> <strong>Estado: </strong>
                        {{ $lote->estado }}
                    </li>
                @else
                    <li>No asignado</li>
                @endif
                </ul>
            </li>

            <li>
                <strong>Almacen contenedora del producto: </strong>
                <ul>
                    <li><strong>ID: </strong> {{ $almacen->id }}</li>
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
        <a href="{{ route("producto.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("producto.edit", $producto->id) }}">Modificar</a>
    </button>

    <form 
        action="{{ route('producto.destroy', $producto->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection