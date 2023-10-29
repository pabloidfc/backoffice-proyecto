@extends("layouts.app")

@section("title", "Usuarios")
    
@section("content")
<div class="container">
    <h1 class="mb-0">Crear nuevo usuario</h1>
    <p>Los campos con (*) son obligatorios!</p>
    <div class="col">
    <form 
        action="{{ route("usuario.store") }}"
        method="POST"
        class="row"
    >
    @csrf

        <div class="form-group col-auto">
            <label for="ci" class="form-label">CI sin puntos ni guíon*</label>
            <input 
            id="ci" 
            class="form-control"
            name="ci" 
            type="text" 
            value="{{old("ci")}}">
            @error("ci")
                <small class="form-text text-danger">{{ $message }}</small>   
            @enderror
        </div>
        
        <div class="form-group row">
            <div class="col-auto">
                <label for="nombre" class="form-label">Nombre*</label>
                <input 
                id="nombre" 
                class="form-control"
                name="nombre" 
                type="text" 
                value="{{old("nombre")}}">
                @error("nombre")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <div class="col-auto">
                <label for="nombre2" class="form-label">Segundo nombre</label>
                <input 
                id="nombre2" 
                class="form-control"
                name="nombre2" 
                type="text" 
                value="{{old("nombre2")}}">
                @error("nombre2")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <label for="apellido" class="form-label">Apellido*</label>
                <input 
                id="apellido" 
                class="form-control"
                name="apellido" 
                type="text" 
                value="{{old("apellido")}}">
                @error("apellido")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <div class="col-auto">
                <label for="apellido2" class="form-label">Segundo apellido*</label>
                <input 
                id="apellido2" 
                class="form-control"
                name="apellido2" 
                type="text" 
                value="{{old("apellido2")}}">
                @error("apellido2")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <label for="email" class="form-label">Email*</label>
                <input 
                id="email" 
                class="form-control"
                name="email" 
                type="email" 
                value="{{old("email")}}">
                @error("email")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <div class="col-auto">
                <label for="telefono" class="form-label">Teléfono*</label>
                <input 
                id="telefono" 
                class="form-control"
                name="telefono" 
                type="text" 
                value="{{old("telefono")}}">
                @error("telefono")
                    <small class="form-text text-danger">{{ $message }}</small>   
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <label for="password" class="form-label">Contraseña*</label>
                <input 
                id="password"
                class="form-control"
                name="password" 
                type="password" 
                >
                @error("password")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-auto">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña*</label>
                <input 
                id="password_confirmation"
                class="form-control"
                name="password_confirmation" 
                type="password" 
                >
                @error("password_confirmation")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <label for="departamento" class="form-label">Departamento*</label>
                <select 
                id="departamento"
                class="form-select"
                name="departamento"
                > 
                    <option value="Artigas">Artigas</option>
                    <option value="Salto">Salto</option>
                    <option value="Rivera">Rivera</option>
                    <option value="Paysandú">Paysandú</option>
                    <option value="Tacuarembó">Tacuarembó</option>
                    <option value="Cerro Largo">Cerro Largo</option>
                    <option value="Río Negro">Río Negro</option>
                    <option value="Durazno">Durazno</option>
                    <option value="Treinta y Tres">Treinta y Tres</option>
                    <option value="Soriano">Soriano</option>
                    <option value="Flores">Flores</option>
                    <option value="Florida">Florida</option>
                    <option value="Lavalleja">Lavalleja</option>
                    <option value="Rocha">Rocha</option>
                    <option value="Colonia">Colonia</option>
                    <option value="San José">San José</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Maldonado">Maldonado</option>
                    <option value="Montevideo" selected>Montevideo</option>

                </select>



                @error("departamento")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-auto">
                <label for="calle" class="form-label">Calle*</label>
                <input 
                id="calle"
                class="form-control"
                name="calle" 
                type="text" 
                >
                @error("calle")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-auto">
                <label for="nro_de_puerta" class="form-label">Número de puerta*</label>
                <input 
                id="nro_de_puerta"
                class="form-control"
                name="nro_de_puerta" 
                type="number" 
                >
                @error("nro_de_puerta")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-auto">
                <label for="esquina" class="form-label">Esquina</label>
                <input 
                id="esquina"
                class="form-control"
                name="esquina" 
                type="text" 
                >
                @error("esquina")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-auto">
                <label for="coordenada" class="form-label">Coordenada</label>
                <input 
                id="coordenada"
                class="form-control"
                name="coordenada" 
                type="text" 
                >
                @error("coordenada")
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>


        <div class="mt-2">
            <span class="fs-4">Selecciona un tipo*</span>
            <div class="mb-2">
                <label>
                    <input 
                        id="input-funcionario"
                        type="radio"
                        name="permisos" 
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
                @error("almacen_id")
                    <br>
                    <small style="color: red">{{ $message }}</small>   
                @enderror
                @error("empresa_id")
                    <br>
                    <small style="color: red">{{ $message }}</small>   
                @enderror
            </div>
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
        </div>

        <div id="almacen-empresa-contenedor" class="d-none mb-4">
            <label class="form-label">
                Almacen de trabajo* <br>
                <input name="almacen_id" type="number" id="input-almacen" class="form-control">
            </label>
        
            <label id="empresa-perteneciente" class="d-none" class="form-label">
                Empresa a la que pertenece* <br>
                <input name="empresa_id" type="number" id="input-empresa" class="form-control">
            </label>
        </div>

        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
    </div>
</div>
<script src="/js/usuario/usuario.create.js"></script>
@endsection