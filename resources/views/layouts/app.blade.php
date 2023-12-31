<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SERSolutions - @yield("title")</title>

    <link rel="stylesheet" href="/css/main.css">

    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
  <div class="container-fluid sticky-top p-0">
    <div class="container-fluid p-0">
      <header>
        <nav class="navbar navbar-expand-lg bg-dark mb-4 border-body" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("home") }}">SERSolutions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route("usuario.index") }}">Usuarios</a>
                <a class="nav-link active" aria-current="page" href="{{ route("cliente.index") }}">Clientes</a>
                <a class="nav-link active" aria-current="page" href="{{ route("almacen.index") }}">Almacenes</a>
                <a class="nav-link active" aria-current="page" href="{{ route("producto.index") }}">Productos</a>
                <a class="nav-link active" aria-current="page" href="{{ route("lote.index") }}">Lotes</a>
                <a class="nav-link active" aria-current="page" href="{{ route("vehiculo.index") }}">Vehículos</a>
                <a class="nav-link active" aria-current="page" href="{{ route("ruta.index") }}">Rutas</a>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <main>
          @if (session('msg'))
              <div class="alert alert-success">
                  {{ session('msg') }}
              </div>
          @endif
          @yield('content')
      </main>
    </div>
  </div>
</body>
</html>