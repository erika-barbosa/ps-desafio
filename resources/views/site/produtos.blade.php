@extends('layouts.site.site')

@section('titulo')
  Index
@endsection

@section('conteudo')

<section class="produtos">
  <h1>Todos os nossos produtos:</h1>

  @isset($produtos)

  <div class="filtros">
    <form class="busca" action="{{ route('produtosBuscados') }}">
      <label for="busca">Buscar:</label>
      <input type="search" id="busca" name="busca">
      <button type="submit">OK</button>
    </form>
  
    <form class="select" action="{{ route('produtosFiltrados') }}">
      <div class="select-container">
        <label for="categorias">Filtrar por categoria:</label>
        <select name="categorias" id="categorias">
          <option class="selecione" value="default">Selecione uma categoria</option>
          @foreach ($categorias as $categoria)
            <option value="{{$categoria['categoria']}}">{{$categoria['categoria']}}</option>
          @endforeach 
        </select>
        <input type="submit" value="Filtrar">
      </div>
    </form>
  </div>

    @if(count($produtos))
      @foreach ($produtos as $produto)
        <div class="index-produto">
          <div>
            @if ($produto['quantidade'] === 0)
              <p class="tag-sem-estoque"> <span> Sem estoque.</span></p>
            @endif  
            <img src="{{$produto['imagem']}}" />
          </div>
          <div class="info-produto">
            <p>{{$produto['nome']}}</p>
            <p>{{$produto['preco_formatted']}}</p>
          </div>
          <div class="botoes-produto">
            <a href="{{ route('ver-produto', $produto->id) }}">
              <button class="botao-detalhes">
                + detalhes
              </button>
            </a>
            <button class="botao-sacola">
              <span class="material-symbols-outlined">local_mall</span>
            </button>
          </div>
        </div>
      @endforeach

    @else
        <p class="estoque-zerado">Sem estoque{{isset($categoriaSelect)? " da categoria " . $categoriaSelect->categoria : ""}} no momento!</p>
    @endif
  @endisset
</section>
@endsection