@extends("layouts.app")

@section('title', "Usuarios")
    
@section("content")
<h1>Crear Nuevo Usuario</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("usuario.store") }}"
    method="POST"
    style="display: inline-block"
>
    @csrf
    <label>
        CI sin puntos ni guíon* <br>
        <input name="ci" type="text" value="{{old("ci")}}">
        @error('ci')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Nombre* <br>
        <input name="nombre" type="text" value="{{old("nombre")}}">
        @error('nombre')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Segundo nombre <br>
        <input name="nombre2" type="text" value="{{old("nombre2")}}">
        @error('nombre2')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>

    <br>

    <label>
        Apellido* <br>
        <input name="apellido" type="text" value="{{old("apellido")}}">
        @error('apellido')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Segundo apellido* <br>
        <input name="apellido2" type="text" value="{{old("apellido2")}}">
        @error('apellido2')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>

    <br>

    <label>
        Email* <br>
        <input name="email" type="email" value="{{old("email")}}">
        @error('email')
            <br>
            <small style="color: red">{{ $message }}</small>   
         @enderror
    </label>
    <br>
    <label>
        Contraseña* <br>
        <input name="password" type="password" value="{{old("password")}}">
        @error('password')
            <br>
            <small style="color: red">{{ $message }}</small>   
         @enderror
    </label>
    <br>
    <label>
        Confirmar contraseña* <br>
        <input name="password_confirmation" type="password" value="{{old("password_confirmation")}}">
        @error('password_confirmation')
            <br>
            <small style="color: red">{{ $message }}</small>   
         @enderror
    </label>

    <fieldset>
        <legend>Selecciona un tipo*</legend>
        <div>
            <label>
                <input 
                    type="radio"
                    name="permisos" 
                    id="input-funcionario"
                    value="Funcionario" 
                >
                Funcionario
            </label>
            <label>
                <input 
                    type="radio"
                    name="permisos" 
                    value="Transportista" 
                >
                Transportista
            </label>
            @error("permisos")
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
            @error("tipo")
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
            @error('almacen_id')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
            @error('empresa_id')
                <br>
                <small style="color: red">{{ $message }}</small>   
            @enderror
        </div>
        <br>
        <div id="radio-tipo-contenedor" class="d-none">
            <label>
                <input 
                    type="radio"
                    name="tipo" 
                    value="Propio" 
                >
                Propio
            </label>
            <label>
                <input 
                    type="radio"
                    name="tipo" 
                    value="De terceros" 
                >
                De terceros
            </label>
        </div>
    </fieldset>

    <div id="almacen-empresa-contenedor" class="d-none">
        <label>
            Almacen de trabajo* <br>
            <input name="almacen_id" type="number" id="input-almacen">
        </label>
     
        <label id="empresa-perteneciente" class="d-none">
            Empresa a la que pertenece* <br>
            <input name="empresa_id" type="number" id="input-empresa">
        </label>
    </div>

    <br>

    <button type="submit">Enviar</button>
</form>
<script src="/js/usuario/usuario.create.js"></script>
@endsection