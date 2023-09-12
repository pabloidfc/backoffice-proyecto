<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backoffice</title>
</head>
<body>
    <header>
        <div>
            <a href="{{ route("home") }}">Home</a>
            <a href="">Usuarios</a>
            <a href="{{ route("almacenes") }}">Almacenes</a>
            <a href="{{ route("productos") }}">Productos</a>
            <a href="{{ route("lotes") }}">Lotes</a>
            <a href="">Camiones</a>
            <a href="">Rutas</a>
        </div>
    </header>
    <hr>

    <main>
    @yield('content')
    </main>
</body>
</html>