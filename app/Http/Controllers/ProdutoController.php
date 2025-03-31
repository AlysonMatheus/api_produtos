<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Retorna todos os produtos cadastrados.
     */
    public function index()
    {
        return response()->json(Produto::all(), 200);
    }

    /**
     * Salva um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'integer|min:0',
        ]);

        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    /**
     * Retorna um produto específico pelo ID.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto, 200);
    }

  
    public function update(Request $request, string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'sometimes|required|numeric|min:0',
            'estoque' => 'sometimes|integer|min:0',
        ]);

        $produto->update($request->all());

        return response()->json($produto, 200);
    }

  
    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto removido com sucesso'], 200);
    }
}
