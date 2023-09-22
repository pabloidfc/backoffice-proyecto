@extends("layouts.app")

@section("title", "Usuarios")

@section("content")
    <h1>Información del Usuario N°<span>{{ $usuario->id }}</span></h1>
    <div>
        <ul>
            <li><strong>CI: </strong> {{ $usuario->ci }}</li>
            <li><strong>Nombre: </strong> {{ $usuario->nombre }}</li>
            @isset($usuario->nombre2)
                <li><strong>Segundo nombre: </strong> {{ $usuario->nombre2 }}</li>
            @endisset
            <li><strong>Apellido: </strong> {{ $usuario->apellido }}</li>
            <li><strong>Segundo apellido: </strong> {{ $usuario->apellido2 }}</li>
            <li><strong>Email: </strong> {{ $usuario->email }}</li>
            @foreach ($telefonos as $telefono)
                <li><strong>Teléfono: </strong> {{ $telefono->telefono }}</li>
            @endforeach

            @foreach ($permisos as $tipo)
                @if ($tipo != null)
                    <li><strong>Permisos: </strong>{{ ucfirst($tipo->getTable()) }}</li> 
                    @isset($tipo->tipo)
                        <li><strong>Tipo: </strong>{{ $tipo->tipo }}</li> 
                    @endisset
                @endif
            @endforeach

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
            @isset($almacen)
                <li>
                    <strong>Trabaja en Almacen:</strong>
                    <ul>
                        <li><strong>ID: </strong> {{ $almacen->id }}</li>
                        <li><strong>Nombre: </strong> {{ $almacen->nombre }}</li>
                        <li><strong>Tipo: </strong> {{ $almacen->tipo }}</li>
                    </ul>
                </li>    
            @endisset
        </ul>
    </div>

    <button>
        <a href="{{ route("usuario.index") }}">Volver</a>
    </button>

    <button>
        <a href="{{ route("usuario.edit", $usuario->id) }}">Modificar</a>
    </button>

    {{-- <form 
        action="{{ route('usuario.destroy', $usuario->id) }}"
        method="POST"
        style="display: inline"
    >
        @csrf
        @method("DELETE")
        <button type="submit">Eliminar</button>
    </form> --}}
@endsection