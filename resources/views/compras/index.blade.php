@extends('layout')

@section('title', 'Gestão de Compras')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>🛍️ Registro de Compras de Insumos</h2>
    
    @auth
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Sair do Sistema</button>
        </form>
    @endauth
</div>

<div class="mb-3 d-flex gap-2">
    <a href="{{ route('compras.create') }}" class="btn btn-success">+ Nova Compra</a>
    <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary">Voltar aos Produtos</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Item / Insumo</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Fornecedor</th>
            <th>Data da Compra</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($compras as $compra)
            <tr>
                <td>{{ $compra->item }}</td>
                <td>{{ number_format($compra->quantidade, 2, ',', '.') }} {{ $compra->unidade_medida }}</td>
                <td>R$ {{ number_format($compra->valor_total, 2, ',', '.') }}</td>
                <td>{{ $compra->fornecedor ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir esta compra?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Nenhuma compra registrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection