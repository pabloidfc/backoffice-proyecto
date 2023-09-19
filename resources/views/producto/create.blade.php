@extends("layouts.app")

@section('title', "Productos")
    
@section("content")
<h1>Crear Nuevo Producto</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("producto.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        Almacen* <br>
        <input name="almacen_id" type="number">
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
                <input type="radio" name="estado" value="En espera">
                En espera 
            </label>
            <label>
                <input type="radio" name="estado" value="Almacenado">
                Almacenado 
            </label>
            <label>
                <input type="radio" name="estado" value="Loteado">
                Loteado 
            </label>
            <label>
                <input type="radio" name="estado" value="Desloteado">
                Desloteado 
            </label>
            <label>
                <input type="radio" name="estado" value="En viaje">
                En viaje 
            </label>
            <label>
                <input type="radio" name="estado" value="Entregado">
                Entregado 
            </label>
        </div>
    </fieldset>
    <label>
        Peso* <br>
        <input name="peso" type="number">
        @error('peso')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Departamento* <br>
        <input name="departamento" type="text">
        @error('departamento')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Dirección de entrega* <br>
        <input name="direccion_entrega" type="number">
        @error('direccion_entrega')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Fecha de entrega* <br>
        <input name="fecha_entrega" type="date">
        @error('fecha_entrega')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>

    <button type="submit">Enviar</button>
</form>
@endsection