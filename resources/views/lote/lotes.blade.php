@extends("templates/header")

@section("content")
    <div>
        @foreach ($lotes as $lote)
            <a href="{{ route("loteInfo", $lote["id"]) }}"> <strong>Lote N°{{ $lote["id"] }}</strong> </a>
        @endforeach
    </div>   
@endsection