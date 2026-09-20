@extends('layout')

@section('title', 'Cardápio - Bolos e Doces')

@section('content')
<h2>🎂 Gerenciamento do Cardápio</h2>
<a href="/produtos/create" class="btn btn-success mb-3">+ Novo Bolo ou Doce</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
@endif

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque (Unid.)</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->descricao }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->estoque }}</td>
                <td>
                    <a href="/produtos/{{ $produto->id }}/edit" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/produtos/{{ $produto->id }}" class="btn btn-info btn-sm text-white">Consultar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection