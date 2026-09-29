@extends('layout')

@section('title', 'Detalhes do Produto')

@section('content')
<h2>🔍 Detalhes do Bolo/Doce</h2>

<form method="post" action="/produtos/{{ $produto->id }}">
    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="nome" class="form-label">Sabor</label>
        <input type="text" id="nome" class="form-control" value="{{ $produto->nome }}" disabled>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Ingredientes</label>
        <textarea id="descricao" class="form-control" rows="3" disabled>{{ $produto->ingredientes }}</textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Valor (R$)</label>
        <input type="text" id="preco" class="form-control" value="R$ {{ number_format($produto->preco, 2, ',', '.') }}" disabled>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Quantidade</label>
        <input type="text" id="estoque" class="form-control" value="{{ $produto->estoque }}" disabled>
    </div>

    <a href="/produtos" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir Bolo/Doce</button>
</form>
@endsection