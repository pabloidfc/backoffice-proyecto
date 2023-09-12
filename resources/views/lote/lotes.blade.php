@extends("templates/layout")

@section("content")
<div style="display: flex;flex-direction: column">
    @foreach ($lotes as $lote)
        <a href="{{ route("infoLote", $lote["id"]) }}"> <strong>Lote N°{{ $lote["id"] }}</strong> </a>
    @endforeach
</div>   
@endsection