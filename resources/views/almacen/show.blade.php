@extends("layouts.app")

@section("title", "Almacenes")

@section("content")
    <h1>Información del Almacen N°<span>{{ $almacen["id"] }}</span></h1>
    <div>
        <ul>
            <li><strong>Nombre: </strong> {{ $almacen["nombre"] }}</li>
            <li><strong>Tipo: </strong> {{ $almacen["tipo"] }}</li>
            <li>
                <strong>Ubicacion: </strong>
                <ul>
                    <li> <strong>Departamento: </strong> 
                        {{ $almacen["ubicacion"]["departamento"] }}
                    </li>
                    <li> <strong>Calle: </strong>
                        {{ $almacen["ubicacion"]["calle"] }}
                    </li>

                    @isset($almacen["ubicacion"]["esquina"])
                        <li> <strong>Esquina: </strong>
                            {{ $almacen["ubicacion"]["esquina"] }}
                        </li>
                    @endisset

                    <li> <strong>N° de puerta: </strong> 
                        {{ $almacen["ubicacion"]["nro_de_puerta"] }}
                    </li>

                    @isset($almacen["ubicacion"]["coordenada"])
                    <li> <strong>Coordenada: </strong>
                        {{ $almacen["ubicacion"]["coordenada"] }}
                    </li>
                @endisset
                </ul>
            </li>
        </ul>
    </div>   
    <button>
        <a href="{{ route("almacen.index") }}">Volver</a>
    </button>

    <form 
        action="{{ route('almacen.update', $almacen["id"]) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("PUT")
        <button type="submit">Modificar</button>
    </form>

    <form 
        action="{{ route('almacen.destroy', $almacen["id"]) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form>
@endsection