@extends('layout')

@section('title', 'Editar Produto')

@section('content')
<h2>✏️ Editar Bolo ou Doce</h2>

<form method="post" action="/produtos/{{ $produto->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Delícia</label>
        <input type="text" id="nome" name="nome" class="form-control" value="{{ $produto->nome }}" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição / Ingredientes</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="3">{{ $produto->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço (R$)</label>
        <input type="number" step="0.01" id="preco" name="preco" class="form-control" value="{{ $produto->preco }}" required>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Quantidade em Estoque</label>
        <input type="number" id="estoque" name="estoque" class="form-control" value="{{ $produto->estoque }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="/produtos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection