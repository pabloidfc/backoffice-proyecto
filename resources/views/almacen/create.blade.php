@extends("layouts.app")

@section('title', "Almacenes")
    
@section("content")
<h1>Crear Nuevo Almacen</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("almacen.store") }}"
    method="POST"
    style="max-width: 250px"
>
    @csrf
    <label>
        Nombre* <br>
        <input name="nombre" type="text" value="{{old("nombre")}}" >
        @error('nombre')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    
    <br>
    <fieldset>
        <legend>Selecciona un tipo*</legend>
        <div>
            <input type="radio" name="tipo" value="Propio" >
            <label for="propio">Propio</label>
            <input type="radio" name="tipo" value="De terceros">
            <label for="de-terceros">De terceros</label>
            @error('tipo')
                <br>
                <small style="color: red">{{ $message }}</small>   
             @enderror
        </div>
    </fieldset>

    <label>
        Departamento* <br>
        <input id="departamento" type="text" >
    </label>
    <br>
    <label>
        Calle* <br>
        <input id="calle" type="text" >
    </label>
    <br>
    <label>
        N de puerta* <br>
        <input id="nro_de_puerta" type="number" >
    </label>
    <br>
    <label>
        Esquina <br>
        <input id="esquina" type="text" >
    </label>
    <br>
    <label>
        Coordenada <br>
        <input id="coordenada" type="text" >
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection