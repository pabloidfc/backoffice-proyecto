@extends("layouts.app")

@section("title", "Productos")

@section("content")
    <h1>Información del Producto N°<span>{{ $producto["id"] }}</span></h1>
    <div>
        <ul>
            <li><strong>Peso: </strong> {{ $producto["peso"] }}</li>
            <li><strong>Estado: </strong> {{ $producto["estado"] }}</li>
            <li><strong>Fecha de entrega: </strong> {{ $producto["fecha_entrega"] }}</li>
            <li><strong>Dirección de entrega: </strong> {{ $producto["direccion_entrega"] }}</li>

            @isset($producto["lote_id"])
                <li><strong>Lote contenedor: </strong> {{ $producto["lote_id"] }}</li>
            @endisset
            
            @isset($producto["almacen_id"])
                <li><strong>Almacen contenedora: </strong> {{ $producto["almacen_id"] }}</li>
            @endisset
        </ul>
    </div>   
@endsection