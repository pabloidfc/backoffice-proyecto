@extends("layouts.app")
@section("title", "Usuarios")

@section("content")
<div class="container">
    <div class="d-lg-flex justify-content-lg-between mb-lg-2">
        <h1>Usuarios</h1>
        <a href="{{ route("usuario.create") }}" class="btn btn-primary mb-4">Crear nuevo usuario</a>
    </div>
    <div class="col px-2">
        <div class="row">
            @foreach ($usuarios as $usuario)
            <div class="col-12 col-lg-4 d-grid rounded shadow-sm py-3">
                <div class="header mb-4">
                    <a 
                        class="text-decoration-none text-dark d-block"
                        href="{{ route("usuario.show", $usuario->id) }}"
                        role="button"
                    >
                        <strong>{{ $usuario->nombre }} {{ $usuario->apellido }} {{ $usuario->apellido2 }}</strong> 
                    </a>
                    <span class="d-block text-primary"> <strong> {{ $usuario->permisos }} </strong> </span>
                    <span> {{ $usuario->email }} </span>
                </div>
                <div class="btn-group col-1">
                    <a class="btn btn-success" href="{{ route("usuario.edit", $usuario->id) }}">
                        Editar
                    </a>
                    <form 
                        action="{{ route("usuario.destroy", $usuario->id) }}"
                        method="POST"
                        role="button"
                        class="btn btn-danger"
                    >
                        @csrf
                        @method("DELETE")
                        <input 
                            type="submit" 
                            class="bg-transparent border-0 text-light" 
                            value="Eliminar"
                        >
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $usuarios->links() }}
            </ul>
        </nav>
    </div>
</div>


@endsection