<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERSolutions - @yield("title")</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        a {
            text-decoration: none;
            color: #000;
        }
    </style>

</head>
<body>
    <header>
        <div>
            <a href="{{ route("home") }}">Home</a>
            <a href="{{ route("usuario.index") }}">Usuarios</a>
            <a href="{{ route("cliente.index") }}">Clientes</a>
            <a href="{{ route("almacen.index") }}">Almacenes</a>
            <a href="{{ route("producto.index") }}">Productos</a>
            <a href="{{ route("lote.index") }}">Lotes</a>
            <a href="">Vehículos</a>
            <a href="">Rutas</a>
        </div>
    </header>
    <hr>

    <main>

        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
    

        @yield('content')
    </main>
</body>
</html>