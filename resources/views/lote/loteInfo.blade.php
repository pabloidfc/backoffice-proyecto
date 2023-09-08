@extends("templates/header")

@section("content")
    <h1>Información del Lote N°<span>{{ $lote["id"] }}</span></h1>
    <div>
        <ul>
            <li><strong>Peso: </strong> {{ $lote["peso"] }}</li>
            <li><strong>Estado: </strong> {{ $lote["estado"] }}</li>

            @isset($lote["almacen_destino"])
                <li><strong>Almacen destino: </strong> {{ $lote["almacen_destino"] }}</li>
            @endisset
        </ul>
    </div>   
@endsection