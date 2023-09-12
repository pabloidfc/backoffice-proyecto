@extends("templates/header")

@section("content")
    <div>
        @foreach ($productos as $producto)
            <a href="{{ route("infoProducto", $producto["id"]) }}"> <strong>Producto N°{{ $producto["id"] }}</strong> </a>
        @endforeach
    </div>   
@endsection