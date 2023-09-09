@extends("templates/header")

@section("content")
    <div>
        @foreach ($almacenes as $almacen)
            <a href="{{ route("almacenInfo", $almacen["id"]) }}">
                 <strong>
                    Almacen N°{{ $almacen["id"] }} - {{ $almacen["nombre"] }}
                </strong> 
            </a>
        @endforeach
    </div>   
@endsection