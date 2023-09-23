@extends("layouts.app")

@section('title', "Lote")
    
@section("content")
<h1>Modificar Lote - {{ $lote->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("lote.update", $lote->id) }}"
    method="POST"
    style="display: inline-block"
>
    @csrf @method("PUT")
    <label>
        Almacen Destino* <br>
        <input name="almacen_destino" type="number" value="{{old("almacen_destino", $almacen->id)}}">
        @error('almacen_destino')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>

    <fieldset>
        <legend>Selecciona un estado</legend>
        <div>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Creado" {{ old('estado', $lote->estado) == 'Creado' ? 'checked' : '' }}
                >
                Creado
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="En viaje" {{ old('estado', $lote->estado) == 'En viaje' ? 'checked' : '' }}
                >
                En viaje
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Desarmado" {{ old('estado', $lote->estado) == 'Desarmado' ? 'checked' : '' }}
                >
                Desarmado
            </label>
            @error('estado')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </div>
    </fieldset>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection