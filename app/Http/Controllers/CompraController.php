<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::orderBy('data_compra', 'desc')->get();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0.01',
            'unidade_medida' => 'required|string',
            'valor_total' => 'required|numeric|min:0.01',
            'fornecedor' => 'nullable|string|max:255',
            'data_compra' => 'required|date',
        ]);

        Compra::create($request->all());

        return redirect()->route('compras.index')->with('success', 'Compra registrada com sucesso!');
    }

    public function edit(Compra $compra)
    {
        return view('compras.edit', compact('compra'));
    }

    public function update(Request $request, Compra $compra)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0.01',
            'unidade_medida' => 'required|string',
            'valor_total' => 'required|numeric|min:0.01',
            'fornecedor' => 'nullable|string|max:255',
            'data_compra' => 'required|date',
        ]);

        $compra->update($request->all());

        return redirect()->route('compras.index')->with('success', 'Compra atualizada com sucesso!');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra excluída com sucesso!');
    }
}