@extends("layouts.app")

@section("title", "Vehiculos")

@section("content")
<h3>
    <a href="{{ route("vehiculo.create") }}">Crear nuevo Vehiculo</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($vehiculos as $vehiculo)
        <a href="{{ route("vehiculo.show", $vehiculo->id) }}"> <strong>Vehiculo N°{{ $vehiculo->id }}</strong> </a>
    @endforeach
</div>   
@endsection