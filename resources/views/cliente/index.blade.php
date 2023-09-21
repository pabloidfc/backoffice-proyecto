@extends('layouts.app')
@section('title', "Clientes")

@section("content")
<h3>
    <a href="{{ route("cliente.create") }}">Crear nuevo cliente</a>
</h3>

<div style="display: inline-flex;flex-direction: column">
    @foreach ($clientes as $cliente)
        <a href="{{ route("cliente.show", $cliente->id) }}"> <strong>Cliente N°{{ $cliente->id }}</strong> </a>
    @endforeach
</div>   

@endsection