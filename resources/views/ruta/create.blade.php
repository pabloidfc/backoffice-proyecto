@extends("layouts.app")

@section('title', "Rutas")
    
@section("content")
<h1>Crear Nueva Ruta</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("ruta.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        Distancia en Kilómetros* <br>
        <input name="distanciakm" type="number" value="{{old("distanciakm")}}">
        @error('distanciakm')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Tiempo estimado (HH:mm:ss)* <br>
        <input name="tiempo_estimado" type="text" value="{{old("tiempo_estimado")}}">
        @error('tiempo_estimado')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection