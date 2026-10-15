@extends('layout')

@section('title', 'Registrar Nova Compra')

@section('content')
<h2 class="mb-4">🛍️ Registrar Nova Compra</h2>

<form action="{{ route('compras.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="item" class="form-label">Item / Insumo</label>
        <input type="text" class="form-control" id="item" name="item" placeholder="Ex: Leite Condensado" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" step="0.01" class="form-control" id="quantidade" name="quantidade" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="unidade_medida" class="form-label">Unidade de Medida</label>
            <select class="form-select" id="unidade_medida" name="unidade_medida" required>
                <option value="un">Unidade (un)</option>
                <option value="kg">Quilograma (kg)</option>
                <option value="g">Grama (g)</option>
                <option value="l">Litro (L)</option>
                <option value="ml">Mililitro (ml)</option>
                <option value="cx">Caixa (cx)</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="valor_total" class="form-label">Valor Total (R$)</label>
            <input type="number" step="0.01" class="form-control" id="valor_total" name="valor_total" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="data_compra" class="form-label">Data da Compra</label>
            <input type="date" class="form-control" id="data_compra" name="data_compra" value="{{ date('Y-m-d') }}" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="fornecedor" class="form-label">Fornecedor (Opcional)</label>
        <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Ex: Atacadão / Zaffari">
    </div>

    <button type="submit" class="btn btn-success">Salvar Compra</button>
    <a href="{{ route('compras.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection