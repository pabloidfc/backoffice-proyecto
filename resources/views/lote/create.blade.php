@extends("layouts.app")

@section('title', "Lote")
    
@section("content")
<h1>Crear Nuevo Lote</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("lote.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        ID Creador* <br>
        <input name="creador_id" type="number" value="{{old("creador_id")}}">
        @error('creador_id')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Almacen Destino* <br>
        <input name="almacen_destino" type="number" value="{{old("almacen_destino")}}">
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
                    value="Creado" {{ old('estado') == 'Creado' ? 'checked' : '' }}
                >
                Creado
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="En viaje" {{ old('estado') == 'En viaje' ? 'checked' : '' }}
                >
                En viaje
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Desarmado" {{ old('estado') == 'Desarmado' ? 'checked' : '' }}
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