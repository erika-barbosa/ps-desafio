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
    @isset($produtos)
      @foreach ($produtos as $produto)
        <div class="index-produto">
          <img src="{{$produto['imagem']}}" />
          <div class="info-produto">
            <p>{{$produto['nome']}}</p>
            <p>{{$produto['preco_formatted']}}</p>
          </div>
          <div class="botoes-produto">
            <button>
              conhecer
            </button>
            <button>
              <span class="material-symbols-outlined">local_mall</span>
            </button>
          </div>
        </div>
      @endforeach
    @endisset
  </section>

@endsection