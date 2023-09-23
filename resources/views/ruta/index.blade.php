@extends("layouts.app")

@section("title", "Rutas")

@section("content")
<h3>
    <a href="{{ route("ruta.create") }}">Crear nuevo ruta</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($rutas as $ruta)
        <a href="{{ route("ruta.show", $ruta->id) }}"> <strong>Ruta N°{{ $ruta->id }}</strong> </a>
    @endforeach
</div>   
@endsection