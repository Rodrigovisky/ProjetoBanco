<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'preco' => 'required|numeric|min:0',
                'estoque' => 'required|integer|min:0',
            ]);

            Produto::create($request->all());

            return redirect()->route('produtos.index')->with('success', 'Bolo/Doce cadastrado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao cadastrar produto: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')->with('failure', 'Erro ao cadastrar o bolo/doce!');
        }
    }

    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'preco' => 'required|numeric|min:0',
                'estoque' => 'required|integer|min:0',
            ]);

            $produto = Produto::findOrFail($id);
            $produto->update($request->all());

            return redirect()->route('produtos.index')->with('success', 'Bolo/Doce atualizado com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao atualizar produto: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id,
                'request' => $request->all()
            ]);
            return redirect()->route('produtos.index')->with('failure', 'Erro ao atualizar o registro!');
        }
    }

    public function destroy(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();

            return redirect()->route('produtos.index')->with('success', 'Bolo/Doce excluído com sucesso!');
        } catch (Exception $e) {
            Log::error('Erro ao excluir produto: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'produto_id' => $id
            ]);
            return redirect()->route('produtos.index')->with('failure', 'Erro ao excluir o registro!');
        }
    }
}