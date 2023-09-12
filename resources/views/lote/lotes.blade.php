@extends("templates/header")

@section("content")
    <div>
        @foreach ($lotes as $lote)
            <a href="{{ route("infoLote", $lote["id"]) }}"> <strong>Lote N°{{ $lote["id"] }}</strong> </a>
        @endforeach
    </div>   
@endsection