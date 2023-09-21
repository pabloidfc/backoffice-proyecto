@extends("layouts.app")

@section('title', "Clientes")
    
@section("content")
<h1>Modificar Cliente - {{ $cliente->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("cliente.update", $cliente->id) }}"
    method="POST"
    style="display: inline-block"
>
    
    @csrf @method("PUT")
    <label>
        RUT* <br>
        <input name="rut" type="text" value="{{old("rut", $cliente->rut)}}" >
        @error("rut")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Dirección de la Empresa* <br>
        <input name="direccion" type="text" value="{{old("direccion", $cliente->direccion)}}" >
        @error("direccion")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Email de contacto* <br>
        <input name="email" type="email" value="{{old("email", $cliente->email)}}" >
        @error("email")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Cuenta bancaria* <br>
        <input name="cuentabancaria" type="number" value="{{old("cuentabancaria", $cliente->cuentabancaria)}}" >
        @error("cuentabancaria")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>

    
    <br>
    @if($ubicacion)
    <div id="ubicacion-contenedor">
        <label>
            Ubicacion Almacen de Empresa: Departamento* <br>
            <input name="departamento" type="text" value="{{old('departamento', $ubicacion->departamento)}}">
            @error('departamento')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </label>
        <br>
        <label>
            Ubicacion Almacen de Empresa: Calle* <br>
            <input name="calle" type="text" value="{{old('calle', $ubicacion->calle)}}">
            @error('calle')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </label>
        <br>
        <label>
            Ubicacion Almacen de Empresa: N° de puerta* <br>
            <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta', $ubicacion->nro_de_puerta)}}">
            @error('nro_de_puerta')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </label>
        <br>
        <label>
            Ubicacion Almacen de Empresa: Esquina <br>
            <input name="esquina" type="text" value="{{old('esquina', $ubicacion->esquina)}}">
        </label>
        <br>
        <label>
            Ubicacion Almacen de Empresa: Coordenada <br>
            <input name="coordenada" type="text" value="{{old('coordenada', $ubicacion->coordenada)}}">
        </label>
        <br>
    </div>    
    @endif

    <button type="submit">Enviar</button>
</form>
@endsection