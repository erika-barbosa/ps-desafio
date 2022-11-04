@extends('layouts.site.site')

@section('titulo')
  Index
@endsection

@section('conteudo')
  <div class="produto-especifico">
    <div class="imagem-produto-especifico">
      <div>
        @if ($produto['quantidade'] === 0)
          <p class="tag-sem-estoque"> <span> Sem estoque.</span></p>
        @endif 
        <img src="{{$produto['imagem']}}" />
      </div>
    </div>
   <div class="info-produto-especifico">
      <h3>{{$produto['nome']}}</h3>
      <p>{{$produto['descricao']}}</p>
      <p>{{$produto['preco_formatted']}}</p>
      <button class="botao-detalhes">
          comprar
      </button>
    </div>
  </div>


@endsection