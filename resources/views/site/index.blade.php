@extends('layouts.site.site')

@section('titulo')
  Index
@endsection

@section('conteudo')
  <ul class="slider">
    <li>
          <input type="radio" id="slide1" name="slide" checked>
          <label for="slide1"></label>
          <img src="site/img/capa1.jpg" />
    </li>
    <li>
          <input type="radio" id="slide2" name="slide">
          <label for="slide2"></label>
          <img src="site/img/capa2.jpg" />
    </li>
    <li>
          <input type="radio" id="slide3" name="slide">
          <label for="slide3"></label>
          <img src="site/img/capa3.png" />
    </li>
  </ul>

  <section class="produtos">
    <h1>Protutos em destaque:</h1>

    @isset($produtos)
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

        <div class="botao-ver-todos">
          <a href="{{ route('produtos') }}">
            <button class="ver-todos-produtos">
              Ver todos os produtos
            </button>
          </a>
        </div>


      @else
          <p class="estoque-zerado">Sem estoque no momento!</p>
      @endif
    @endisset
  </section>
@endsection