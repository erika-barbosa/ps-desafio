<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{



    public function index()
    {
        //pegar os dados
        $categorias = Categoria::all();
        //retornar os dados
        return view('categoria.index', compact('categorias'));
    }


    public function create()
    {
        return view('categoria.crud');
    }


    public function store(Request $request)
    {
        $rules = [
            'categoria' => 'required|string|max:255'
        ];
        $data = $request->validate($rules);
        $categoria = Categoria::create($data);

        return redirect()->route('categoria.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.crud', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'categoria' => 'required|string|max:255'
        ];
        $data = $request->validate($rules);

        $categoria = Categoria::find($id);
        $categoria->update($data);

        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
