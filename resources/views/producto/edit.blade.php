@extends("layouts.app")

@section('title', "Productos")
    
@section("content")
<h1>Modificar Producto - {{ $producto->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("producto.update", $producto->id) }}"
    method="POST"
    style="display: inline-block"
>
    @csrf @method("PUT")
    <label>
        Almacen* <br>
        <input name="almacen_id" type="number" value="{{old("almacen_id", $producto->almacen_id)}}">
        @error('almacen_id')
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
                    value="En espera" {{ old('estado', $producto->estado) == 'En espera' ? 'checked' : '' }}
                >
                En espera 
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Almacenado" {{ old('estado', $producto->estado) == 'Almacenado' ? 'checked' : '' }}
                >
                Almacenado 
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Loteado" {{ old('estado', $producto->estado) == 'Loteado' ? 'checked' : '' }}
                >
                Loteado 
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Desloteado" {{ old('estado', $producto->estado) == 'Desloteado' ? 'checked' : '' }}
                >
                Desloteado 
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="En viaje" {{ old('estado', $producto->estado) == 'En viaje' ? 'checked' : '' }}
                >
                En viaje 
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Entregado" {{ old('estado', $producto->estado) == 'Entregado' ? 'checked' : '' }}
                >
                Entregado 
            </label>
        </div>
    </fieldset>
    <label>
        Peso* <br>
        <input name="peso" type="number" value="{{old("peso", $producto->peso)}}">
        @error('peso')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Departamento destino* <br>
        <input name="departamento" type="text" value="{{old("departamento", $producto->departamento)}}">
        @error('departamento')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Dirección de entrega* <br>
        <input name="direccion_entrega" type="text" value="{{old("direccion_entrega", $producto->direccion_entrega)}}">
        @error('direccion_entrega')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Fecha de entrega* <br>
        <input name="fecha_entrega" type="date" value="{{old("fecha_entrega", $producto->fecha_entrega)}}">
        @error('fecha_entrega')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>

    <button type="submit">Enviar</button>
</form>
@endsection