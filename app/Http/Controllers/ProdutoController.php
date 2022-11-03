<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index', compact('produtos'));
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.crud', compact('categorias'));
    }


    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:500',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'categoria_id' => 'required'
        ];
        $data = $request->validate($rules);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = '/storage/' . $request->file('imagem')->store('produtos', 'public');
        }

        Produto::create($data);
        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }


    public function show($id)
    {
        $produto = Produto::find($id);
        $produto->categoria;
        return response()->json($produto);
    }


    public function edit($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return view('produto.crud', compact('produto', 'categorias'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:500',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'categoria_id' => 'required'
        ];
        $data = $request->validate($rules);

        $produto = Produto::find($id);

        if ($request->hasFile('imagem')) {
            Storage::delete('public/' . substr($produto->imagem, 9));
            $data['imagem'] = '/storage/' . $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($data);
        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if ($produto->imagem) {
            Storage::delete('public/' . substr($produto->imagem, 9));
        }
        $produto->delete();
        return redirect()->route('produto.index')->with('success', 'Produto deletado com sucesso!');
    }
}
