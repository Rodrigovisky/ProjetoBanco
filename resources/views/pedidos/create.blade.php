@extends('layout')

@section('title', 'Finalizar Compra')

@section('content')
<h2 class="mb-4">🛍️ Fechar Pedido / Compra</h2>

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="cliente_nome" class="form-label">Nome do Cliente</label>
        <input type="text" class="form-control" id="cliente_nome" name="cliente_nome" placeholder="Ex: Maria Silva" required autofocus>
    </div>

    <div class="mb-3">
        <label for="produto_id" class="form-label">Selecionar Doce / Bolo</label>
        <select class="form-select" id="produto_id" name="produto_id" required>
            <option value="">Escolha um produto...</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}" 
                    {{ isset($produtoSelecionado) && $produtoSelecionado->id == $produto->id ? 'selected' : '' }}>
                    {{ $produto->sabor }} — R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" value="1" min="1" required>
    </div>

    <button type="submit" class="btn btn-success">Finalizar Compra</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection