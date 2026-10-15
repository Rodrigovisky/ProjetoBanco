@extends('layout')

@section('title', 'Editar Compra')

@section('content')
<h2 class="mb-4">✏️ Editar Registro de Compra</h2>

<form action="{{ route('compras.update', $compra->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="item" class="form-label">Item / Insumo</label>
        <input type="text" class="form-control" id="item" name="item" value="{{ $compra->item }}" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" step="0.01" class="form-control" id="quantidade" name="quantidade" value="{{ $compra->quantidade }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="unidade_medida" class="form-label">Unidade de Medida</label>
            <select class="form-select" id="unidade_medida" name="unidade_medida" required>
                @foreach (['un' => 'Unidade (un)', 'kg' => 'Quilograma (kg)', 'g' => 'Grama (g)', 'l' => 'Litro (L)', 'ml' => 'Mililitro (ml)', 'cx' => 'Caixa (cx)'] as $key => $label)
                    <option value="{{ $key }}" {{ $compra->unidade_medida == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="valor_total" class="form-label">Valor Total (R$)</label>
            <input type="number" step="0.01" class="form-control" id="valor_total" name="valor_total" value="{{ $compra->valor_total }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="data_compra" class="form-label">Data da Compra</label>
            <input type="date" class="form-control" id="data_compra" name="data_compra" value="{{ $compra->data_compra }}" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="fornecedor" class="form-label">Fornecedor (Opcional)</label>
        <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="{{ $compra->fornecedor }}">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Compra</button>
    <a href="{{ route('compras.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection