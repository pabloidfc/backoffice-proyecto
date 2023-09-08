@extends("templates/header")

@section("content")
    <div>
        @foreach ($productos as $producto)
            <a href="{{ route("ver-producto", $producto["id"]) }}"> <strong>Producto N°{{ $producto["id"] }}</strong> </a>
        @endforeach
    </div>   
@endsection