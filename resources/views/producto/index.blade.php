@extends("layouts.app")

@section("title", "Productos")

@section("content")
<h3>
    <a href="{{ route("producto.create") }}">Crear nuevo producto</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($productos as $producto)
        <a href="{{ route("producto.show", $producto->id) }}"> <strong>Producto N°{{ $producto->id }}</strong> </a>
    @endforeach
</div>   
@endsection