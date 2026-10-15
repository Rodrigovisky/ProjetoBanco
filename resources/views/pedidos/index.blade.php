@extends('layout')

@section('title', 'Gestão de Pedidos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>🛒 Pedidos e Vendas Realizadas</h2>
    
    @auth
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Sair do Sistema</button>
        </form>
    @endauth
</div>

<div class="mb-3 d-flex gap-2">
    <a href="{{ route('pedidos.create') }}" class="btn btn-success">+ Novo Pedido</a>
    <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary">Voltar ao Cardápio</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Produto / Doce</th>
            <th>Quantidade</th>
            <th>Valor Total</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->cliente_nome }}</td>
                <td>{{ $pedido->produto->sabor ?? 'Produto Indisponível' }}</td>
                <td>{{ $pedido->quantidade }} un.</td>
                <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                <td>
                    <span class="badge bg-warning text-dark">{{ $pedido->status }}</span>
                </td>
                <td>
                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente cancelar este pedido?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum pedido registado até o momento.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection