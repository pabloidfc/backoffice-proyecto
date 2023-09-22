@extends("layouts.app")

@section('title', "Usuarios")
    
@section("content")
<h1>Modificar Usuario - {{ $usuario->id }}</h1>
<p>Los campos con (*) son obligatorios!</p>
<form 
    action="{{ route("usuario.update", $usuario->id) }}"
    method="POST"
    style="display: inline-block"
>
    @csrf @method("PUT")
    <label>
        Nombre* <br>
        <input name="nombre" type="text" value="{{old("nombre", $usuario->nombre)}}">
        @error('nombre')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Segundo nombre <br>
        <input name="nombre2" type="text" value="{{old("nombre2", $usuario->nombre2)}}">
        @error('nombre2')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>

    <br>

    <label>
        Apellido* <br>
        <input name="apellido" type="text" value="{{old("apellido", $usuario->apellido)}}">
        @error('apellido')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>
    <br>
    <label>
        Segundo apellido* <br>
        <input name="apellido2" type="text" value="{{old("apellido2", $usuario->apellido2)}}">
        @error('apellido2')
            <br>
            <small style="color: red">{{ $message }}</small>   
        @enderror
    </label>

    <br>

    <label>
        Email* <br>
        <input name="email" type="email" value="{{old("email", $usuario->email)}}">
        @error('email')
            <br>
            <small style="color: red">{{ $message }}</small>   
         @enderror
    </label>
    <br>

    @foreach ($telefonos as $telefono)
    <label>
        Teléfono* <br>
        <input name="telefono" type="number" value="{{old("telefono", $telefono->telefono)}}">
        @error('telefono')
            <br>
            <small style="color: red">{{ $message }}</small>   
         @enderror
    </label>
    @endforeach
    <br>
    <div>
        <label>
            Departamento* <br>
            <input name="departamento" type="text" value="{{old('departamento', $ubicacion->departamento)}}">
        </label>
        @error("departamento")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            Calle* <br>
            <input name="calle" type="text" value="{{old('calle', $ubicacion->calle)}}">
        </label>
        @error("calle")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            N° de puerta* <br>
            <input name="nro_de_puerta" type="number" value="{{old('nro_de_puerta', $ubicacion->nro_de_puerta)}}">
        </label>
        @error("nro_de_puerta")
            <br>
            <small style="color: red">{{ $message }}</small> 
        @enderror
        <br>
        <label>
            Esquina <br>
            <input name="esquina" type="text" value="{{old('esquina', $ubicacion->esquina)}}">
            @error("esquina")
                <br>
                <small style="color: red">{{ $message }}</small> 
            @enderror
        </label>
        <br>
        <label>
            Coordenada <br>
            <input name="coordenada" type="text" value="{{old('coordenada', $ubicacion->coordenada)}}">
            @error("coordenada")
                <br>
                <small style="color: red">{{ $message }}</small> 
            @enderror
        </label>
        <br>
    </div>
    <br>
    <button type="submit">Enviar</button>
</form>
@endsection