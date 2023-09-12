@extends("templates/layout")

@section("content")
<div style="display: flex;flex-direction: column">
    @foreach ($productos as $producto)
        <a href="{{ route("infoProducto", $producto["id"]) }}"> <strong>Producto N°{{ $producto["id"] }}</strong> </a>
    @endforeach
</div>   
@endsection