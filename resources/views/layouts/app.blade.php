<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERSolutions - @yield("title")</title>

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
            <a href="">Usuarios</a>
            <a href="{{ route("almacen.index") }}">Almacenes</a>
            <a href="{{ route("producto.index") }}">Productos</a>
            <a href="{{ route("lote.index") }}">Lotes</a>
            <a href="">Vehículos</a>
            <a href="">Rutas</a>
        </div>
    </header>
    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>