@extends("layouts.app")

@section("title", "Almacenes")

@section("content")
<h3>
    <a href="{{ route("almacen.create") }}">Crear nuevo almacen</a>
</h3>

<div style="display: flex;flex-direction: column">
    @foreach ($almacenes as $almacen)
        <a href="{{ route("almacen.show", $almacen["id"]) }}">
                <strong>
                Almacen N°{{ $almacen["id"] }} - {{ $almacen["nombre"] }}
            </strong> 
        </a>
    @endforeach
</div>   
@endsection