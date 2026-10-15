<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('produto')->orderBy('created_at', 'desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    // Exibe o formulário de fechar a compra para um produto específico
    public function create(Request $request)
    {
        $produtoSelecionado = Produto::find($request->produto_id);
        $produtos = Produto::all();
        return view('pedidos.create', compact('produtos', 'produtoSelecionado'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_nome' => 'required|string|max:255',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        $produto = Produto::findOrFail($request->produto_id);
        $valorTotal = $produto->valor_unitario * $request->quantidade;

        Pedido::create([
            'cliente_nome' => $request->cliente_nome,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'valor_total' => $valorTotal,
            'status' => 'Pendente',
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido cancelado/excluído com sucesso!');
    }
}