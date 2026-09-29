@extends('layout')

@section('title', 'Editar Produto')

@section('content')
<h2>✏️ Editar Bolo ou Doce</h2>

<form method="post" action="/produtos/{{ $produto->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Delícia</label>
        <input type="text" id="nome" name="sabor" class="form-control" value="{{ $produto->nome }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Ingredientes / Ingredientes</label>
        <textarea id="descricao" name="ingredientes" class="form-control" rows="3">{{ $produto->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Valor (R$)</label>
        <input type="number" step="0.01" id="valor" name="valor" class="form-control" value="{{ $produto->valor }}" required>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Quantidade em Estoque</label>
        <input type="number" id="estoque" name="quantidade" class="form-control" value="{{ $produto->quantidade }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="/produtos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection