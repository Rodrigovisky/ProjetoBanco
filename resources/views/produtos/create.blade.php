@extends('layout')

@section('title', 'Cadastrar Bolo/Doce')

@section('content')
<h2>🍰 Cadastrar Novo Bolo ou Doce</h2>

<form method="post" action="/produtos">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Delícia</label>
        <input type="text" id="nome" name="sabor" class="form-control" placeholder="Ex: Bolo de Cenoura com Chocolate" required>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição / Ingredientes</label>
        <textarea id="descricao" name="igredientes" class="form-control" rows="3" placeholder="Ex: Bolo fofinho com cobertura de brigadeiro caseiro"></textarea>
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço (R$)</label>
        <input type="number" step="0.01" id="valor" name="preco" class="form-control" placeholder="00.00" required>
    </div>

    <div class="mb-3">
        <label for="estoque" class="form-label">Quantidade em Estoque</label>
        <input type="number" id="estoque" name="quantidade" class="form-control" placeholder="Ex: 10" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar no Cardápio</button>
    <a href="/produtos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection