@extends("layouts.app")

@section("title", "Lote")

@section("content")
<h3>
    <a href="{{ route("lote.create") }}">Crear nuevo Lote</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($lotes as $lote)
        <a href="{{ route("lote.show", $lote->id) }}"> <strong>Lote N°{{ $lote->id }}</strong> </a>
    @endforeach
</div>   
@endsection