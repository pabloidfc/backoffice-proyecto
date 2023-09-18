@extends("layouts.app")

@section("title", "Almacenes")

@section("content")
<div style="display: flex;flex-direction: column">
    @foreach ($almacenes as $almacen)
        <a href="{{ route("infoAlmacen", $almacen["id"]) }}">
                <strong>
                Almacen N°{{ $almacen["id"] }} - {{ $almacen["nombre"] }}
            </strong> 
        </a>
    @endforeach
</div>   
@endsection