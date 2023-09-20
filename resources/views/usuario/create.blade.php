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

    <fieldset>
        <legend>Selecciona un tipo*</legend>
        <div>
            <label>
                <input 
                    type="radio" 
                    name="tipo" 
                    value="funcionario" {{ old('tipo') == 'funcionario' ? 'checked' : '' }}
                >
                Funcionario
            </label>
            <label>
                <input 
                    type="radio" 
                    name="tipo" 
                    value="transportista" {{ old('tipo') == 'transportista' ? 'checked' : '' }}
                >
                Transportista
            </label>
        </div>
    </fieldset>
    <button type="submit">Enviar</button>
</form>
@endsection