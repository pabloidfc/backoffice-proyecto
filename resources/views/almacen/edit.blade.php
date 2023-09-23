@extends("layouts.app")

@section('title', "Almacenes")
    
@section("content")
<h1>Modificar Almacen - {{ $almacen->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("almacen.update", $almacen->id) }}"
    method="POST"
    style="display: inline-block"
>
    @csrf @method("PUT")
    <label>
        Nombre* <br>
        <input name="nombre" type="text" value="{{old('nombre', $almacen->nombre)}}">
        @error('nombre')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    
    <br>
    <fieldset>
        <legend>Selecciona un tipo*</legend>
        <div>

            <label>
                <input 
                    type="radio" 
                    name="tipo" 
                    value="Propio" {{ old('tipo', $almacen->tipo) == 'Propio' ? 'checked' : '' }}
                >
                Propio
            </label>
            <label>
                <input 
                    type="radio" 
                    name="tipo" 
                    value="De terceros" {{ old('tipo', $almacen->tipo) == 'De terceros' ? 'checked' : '' }}
                >
                De terceros
            </label>
            @error('tipo')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </div>
    </fieldset>

    <label>
        Departamento* <br>
        <input name="departamento" type="text" value="{{old('departamento', $ubicacion->departamento)}}">
        @error('departamento')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Calle* <br>
        <input name="calle" type="text" value="{{old("calle", $ubicacion->calle)}}">
        @error('calle')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        N de puerta* <br>
        <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta', $ubicacion->nro_de_puerta)}}">
        @error('nro_de_puerta')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Esquina <br>
        <input name="esquina" type="text" value="{{old('esquina', $ubicacion->esquina)}}">
    </label>
    <br>
    <label>
        Coordenada <br>
        <input name="coordenada" type="text" value="{{old('coordenada', $ubicacion->coordenada)}}">
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection