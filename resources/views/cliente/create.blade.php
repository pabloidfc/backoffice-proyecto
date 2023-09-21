@extends("layouts.app")

@section("title", "Clientes")
    
@section("content")
<h1>Crear Nuevo Cliente</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("cliente.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        RUT* <br>
        <input name="rut" type="text" value="{{old("rut")}}" >
        @error("rut")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Dirección de la Empresa* <br>
        <input name="direccion" type="text" value="{{old("direccion")}}" >
        @error("direccion")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Email de contacto* <br>
        <input name="email" type="email" value="{{old("email")}}" >
        @error("email")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Cuenta bancaria* <br>
        <input name="cuentabancaria" type="number" value="{{old("cuentabancaria")}}" >
        @error("cuentabancaria")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Telefono* <br>
        <input name="telefono" type="numeric" value="{{old("telefono")}}" >
        @error("telefono")
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>

    <label>
        <input type="checkbox" name="ubicacion" id="tiene-ubicacion">
        Tiene Almacen
        @error('departamento')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
        @error('calle')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
        @error('nro_de_puerta')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <div id="ubicacion-contenedor" class="d-none">
        <label>
            Ubicacion Almacen: Departamento* <br>
            <input name="departamento" type="text" value="{{old('departamento')}}">
        </label>
        <br>
        <label>
            Ubicacion Almacen: Calle* <br>
            <input name="calle" type="text" value="{{old('calle')}}">
        </label>
        <br>
        <label>
            Ubicacion Almacen: N° de puerta* <br>
            <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta')}}">
        </label>
        <br>
        <label>
            Ubicacion Almacen: Esquina <br>
            <input name="esquina" type="text" value="{{old('esquina')}}">
        </label>
        <br>
        <label>
            Ubicacion Almacen: Coordenada <br>
            <input name="coordenada" type="text" value="{{old('coordenada')}}">
        </label>
        <br>
    </div>
    <button type="submit">Enviar</button>
</form>
<script src="/js/cliente/cliente.create.js"></script>
@endsection