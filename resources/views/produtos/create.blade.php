@extends('layout')

@section('title', 'Cadastrar Bolo/Doce')

@section('content')
<h2>🍰 Cadastrar Novo Bolo ou Doce</h2>

<form method="post" action="/produtos">
    @csrf
    <div class="mb-3">
        <label for="sabor" class="form-label">Sabor / Nome da Delícia</label>
        <input type="text" id="sabor" name="sabor" class="form-control" placeholder="Ex: Bolo de Cenoura com Chocolate" required>
    </div>

    <div class="mb-3">
        <label for="ingredientes" class="form-label">Ingredientes / Descrição</label>
        <textarea id="ingredientes" name="ingredientes" class="form-control" rows="3" placeholder="Ex: Bolo fofinho com cobertura de brigadeiro caseiro"></textarea>
    </div>

    <div class="mb-3">@extends('layout')

@section('title', 'Cadastrar Bolo/Doce')

@section('content')
<h2>🍰 Cadastrar Novo Bolo ou Doce</h2>

<form method="post" action="/produtos">
    @csrf
    <div class="mb-3">
        <label for="sabor" class="form-label">Sabor / Nome da Delícia</label>
        <input type="text" id="sabor" name="sabor" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="ingredientes" class="form-label">Ingredientes / Descrição</label>
        <textarea id="ingredientes" name="ingredientes" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="valor_unitario" class="form-label">Valor (R$)</label>
        <input type="number" step="0.01" id="valor_unitario" name="valor_unitario" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="quantidade_disponivel" class="form-label">Estoque (Quantidade)</label>
        <input type="number" id="quantidade_disponivel" name="quantidade_disponivel" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar no Cardápio</button>
    <a href="/produtos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
        <label for="valor_unitario" class="form-label">Valor (R$)</label>
        <input type="number" step="0.01" id="valor" name="valor" class="form-control" placeholder="00.00" required>
    </div>

    <div class="mb-3">
        <label for="quantidade_disponivel" class="form-label">Estoque (Quantidade)</label>
        <input type="number" id="quantidade_disponivel" name="quantidade" class="form-control" placeholder="Ex: 10" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar no Cardápio</button>
    <a href="/produtos" class="btn btn-secondary">Cancelar</a>
</form>
@endsection