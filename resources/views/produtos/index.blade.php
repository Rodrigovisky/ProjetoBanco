@extends('layout')

@section('title', 'Doces & Bolos Caseiros - Nossas Delícias')

@section('content')
<style>
    /* Estilos da Vitrine */
    .hero-banner {
        background: linear-gradient(135deg, #fbeee0 0%, #fae2cc 100%);
        border-radius: 18px;
        padding: 40px 25px;
        margin-bottom: 35px;
        border: 1px solid #ebd4bc;
    }
    .hero-banner h1 {
        color: #5c3826;
        font-weight: 700;
        font-family: Georgia, serif;
    }
    .hero-banner p {
        color: #7d5b45;
        font-size: 1.15rem;
    }
    .product-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(92, 56, 38, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        background: #fff;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 22px rgba(92, 56, 38, 0.15);
    }
    .product-img-wrapper {
        height: 200px;
        background-color: #f8f1eb;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }
    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .badge-stock {
        position: absolute;
        top: 12px;
        right: 12px;
        background-color: #5c3826;
        color: #fff;
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 30px;
    }
    .product-title {
        color: #442617;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .product-desc {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.4;
        flex-grow: 1;
        margin-bottom: 15px;
    }
    .product-price {
        font-size: 1.35rem;
        font-weight: 700;
        color: #c45a27;
    }
    .btn-buy {
        background-color: #c45a27;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 8px 18px;
        font-weight: 600;
        transition: 0.2s;
    }
    .btn-buy:hover {
        background-color: #9d3e14;
        color: #fff;
    }
    .auth-bar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 20px;
        gap: 12px;
    }
</style>

{{-- Barra de Login / Perfil --}}
<div class="auth-bar">
    @if(session('cliente_logado'))
        <span class="text-secondary">Olá, <strong>{{ session('cliente_nome', 'Cliente') }}</strong> 👋</span>
        <a href="/logout" class="btn btn-outline-danger btn-sm">Sair</a>
    @else
        <button type="button" class="btn btn-outline-dark btn-sm px-3" data-bs-toggle="modal" data-bs-target="#loginModal">
            👤 Entrar / Cadastrar
        </button>
    @endif
    <a href="/produtos/create" class="btn btn-outline-secondary btn-sm" title="Apenas Administrador">
        ⚙️ Painel Admin
    </a>
</div>

{{-- Banner de Destaque --}}
<div class="hero-banner text-center">
    <h1>🧁 Doces & Bolos Caseiros</h1>
    <p class="mb-0">Receitas feitas à mão, com ingredientes frescos e aquele sabor especial de casa.</p>
</div>

{{-- Alertas do Sistema --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if (session('failure'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failure') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Grade de Produtos --}}
<div class="row g-4">
    @forelse ($produtos as $produto)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="product-card">
                <div class="product-img-wrapper">
                    {{-- Se você tiver coluna de imagem no banco (ex: foto ou imagem_url), ele carrega, se não, carrega imagem demonstrativa --}}
                    @if(!empty($produto->imagem))
                        <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->sabor }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500&auto=format&fit=crop&q=80" alt="{{ $produto->sabor }}">
                    @endif

                    @if($produto->quantidade_disponivel > 0)
                        <span class="badge-stock">{{ $produto->quantidade_disponivel }} disp.</span>
                    @else
                        <span class="badge-stock bg-secondary">Esgotado</span>
                    @endif
                </div>

                <div class="card-body p-3 d-flex flex-column">
                    <h3 class="product-title">{{ $produto->sabor }}</h3>
                    <p class="product-desc">{{ $produto->ingredientes }}</p>

                    <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top">
                        <span class="product-price">
                            R$ {{ number_format($produto->valor_unitario, 2, ',', '.') }}
                        </span>
                        
                        @if($produto->quantidade_disponivel > 0)
                            <button type="button" class="btn btn-buy btn-sm" onclick="comprarItem({{ $produto->id }}, '{{ addslashes($produto->sabor) }}', {{ $produto->valor_unitario }})">
                                Comprar
                            </button>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Indisponível</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5 text-muted">
            <p>Nenhum doce ou bolo cadastrado no momento. Volte logo!</p>
        </div>
    @endforelse
</div>

{{-- Modal de Login / Cadastro para o Cliente --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="loginModalLabel" style="color: #5c3826;">Acesse sua Conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary small fw-semibold">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg fs-6" placeholder="seu@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label text-secondary small fw-semibold">Senha</label>
                        <input type="password" name="password" id="senha" class="form-control form-control-lg fs-6" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-buy w-100 py-2 fs-6 mb-3">Entrar</button>
                    
                    <div class="text-center">
                        <span class="small text-muted">Ainda não tem conta?</span>
                        <a href="/cadastro" class="small fw-bold text-decoration-none" style="color: #c45a27;">Cadastre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function comprarItem(id, sabor, preco) {
        // Se estiver logado ou não, pode direcionar direto para o carrinho ou checkout
        @if(session('cliente_logado'))
            alert('Item adicionado ao pedido: ' + sabor + ' - R$ ' + preco.toFixed(2));
        @else
            // Abre o modal de login automaticamente se não estiver autenticado
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        @endif
    }
</script>
@endsection