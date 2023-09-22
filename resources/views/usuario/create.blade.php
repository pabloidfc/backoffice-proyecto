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
        Teléfono* <br>
        <input name="telefono" type="number" value="{{old("telefono")}}">
        @error('telefono')
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

    <div>
        <label>
            Departamento* <br>
            <input name="departamento" type="text" value="{{old('departamento')}}">
        </label>
        @error("departamento")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            Calle* <br>
            <input name="calle" type="text" value="{{old('calle')}}">
        </label>
        @error("calle")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            N° de puerta* <br>
            <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta')}}">
        </label>
        @error("nro_de_puerta")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            Esquina <br>
            <input name="esquina" type="text" value="{{old('esquina')}}">
            @error("esquina")
                <br>
                <small style="color: red">{{ $message }}</small> 
            @enderror
        </label>
        <br>
        <label>
            Coordenada <br>
            <input name="coordenada" type="text" value="{{old('coordenada')}}">
            @error("esquina")
                <br>
                <small style="color: red">{{ $message }}</small> 
            @enderror
        </label>
        <br>
    </div>

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