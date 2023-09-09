@extends("templates/header")

@section("content")
    <h1>Información del Almacen N°<span>{{ $almacen["id"] }}</span></h1>
    <div>
        <ul>
            <li><strong>Nombre: </strong> {{ $almacen["nombre"] }}</li>
            <li><strong>Tipo: </strong> {{ $almacen["tipo"] }}</li>
            <li>
                <strong>Ubicacion: </strong>
                <ul>
                    <li> {{ $almacen["ubicacion"]["departamento"] }}</li>
                    <li> {{ $almacen["ubicacion"]["calle"] }}</li>
                    <li> {{ $almacen["ubicacion"]["nro_de_puerta"] }}</li>
                </ul>
            </li>
        </ul>
    </div>   
@endsection