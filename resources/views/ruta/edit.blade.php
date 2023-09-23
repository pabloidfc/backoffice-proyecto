@extends("layouts.app")

@section('title', "Rutas")
    
@section("content")
<h1>Modificar Ruta - {{ $ruta->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("ruta.update", $ruta->id) }}"
    method="POST"
    style="display: inline-block"
>
    @csrf @method("PUT")
    <label>
        Distancia en Kilómetros* <br>
        <input name="distanciakm" type="number" value="{{old("distanciakm", $ruta->distanciakm)}}">
        @error('distanciakm')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Tiempo estimado (HH:mm:ss)* <br>
        <input name="tiempo_estimado" type="text" value="{{old("tiempo_estimado", $ruta->tiempo_estimado)}}">
        @error('tiempo_estimado')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection