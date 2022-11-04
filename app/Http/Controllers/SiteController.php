<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->take(6)->get();
        return view('site.index', compact('produtos'));
    }

    public function todosProdutos()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('site.produtos', compact('produtos', 'categorias'));
    }

    public function produtosFiltrados(Request $request)
    {

        $categoriaSelect = Categoria::where('categoria', $request['categorias'])->first();
        $produtos = [];
        if (isset($categoriaSelect))
            $produtos = Produto::where('categoria_id', $categoriaSelect->id)->get();
        $categorias = Categoria::all();
        return view('site.produtos', compact('produtos', 'categoriaSelect', 'categorias'));
    }

    public function produtosBuscados(Request $request)
    {
        $produtos = Produto::where('nome', 'LIKE', "%{$request['busca']}%")
            ->orWhere('descricao', 'LIKE', "%{$request['busca']}%")
            ->get();
        $categorias = Categoria::all();
        return view('site.produtos', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        return view('site.produto', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
