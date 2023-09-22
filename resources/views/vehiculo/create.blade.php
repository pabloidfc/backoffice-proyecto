@extends("layouts.app")

@section('title', "Vehiculos")
    
@section("content")
<h1>Crear Nuevo Vehículo</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("vehiculo.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        Matrícula* <br>
        <input name="matricula" type="text" value="{{old("matricula")}}">
        @error('matricula')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <fieldset>
        <legend>Selecciona un estado</legend>
        <div>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="Disponible" {{ old('estado') == 'Disponible' ? 'checked' : '' }}
                >
                Disponible
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="No disponible" {{ old('estado') == 'No disponible' ? 'checked' : '' }}
                >
                No disponible
            </label>
            <label>
                <input 
                    type="radio" 
                    name="estado" 
                    value="En reparación" {{ old('estado') == 'En reparación' ? 'checked' : '' }}
                >
                En reparación
            </label>
            @error('estado')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </div>
    </fieldset>
    <br>
    <label>
        Peso del vehículo* <br>
        <input name="peso" type="numeric" value="{{old("peso")}}">
        @error('peso')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Límite de peso* <br>
        <input name="limite_peso" type="numeric" value="{{old("limite_peso")}}">
        @error('limite_peso')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection