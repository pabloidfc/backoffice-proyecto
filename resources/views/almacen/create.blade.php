@extends("layouts.app")

@section('title', "Almacenes")
    
@section("content")
<h1>Crear Nuevo Almacen</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("almacen.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        Nombre* <br>
        <input name="nombre" type="text" value="{{old('nombre')}}" >
        @error('nombre')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    
    <br>
    <fieldset>
        <legend>Selecciona un tipo*</legend>
        <div>
            <input type="radio" name="tipo" id="propio" value="Propio">
            <label for="propio">Propio</label>
            <input type="radio" name="tipo" id="de-terceros" value="De terceros">
            <label for="de-terceros">De terceros</label>
            @error('tipo')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </div>
    </fieldset>

    <label>
        Departamento* <br>
        <input name="departamento" type="text" value="{{old('departamento')}}">
        @error('departamento')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Calle* <br>
        <input name="calle" type="text" value="{{old('calle')}}">
        @error('calle')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        N de puerta* <br>
        <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta')}}">
        @error('nro_de_puerta')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Esquina <br>
        <input name="esquina" type="text" value="{{old('esquina')}}">
    </label>
    <br>
    <label>
        Coordenada <br>
        <input name="coordenada" type="text" value="{{old('coordenada')}}">
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection