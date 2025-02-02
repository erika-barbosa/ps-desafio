<header id="site-header">
    <div id="header-container">
      <div id="header-busca">
        <a href="{{ route('produtos') }}">
          <span class="material-symbols-outlined">search</span>
        </a>  
      </div>
      
      <div id="header-produtos">
          <a href="{{ route('produtos') }}">Produtos</a>
      </div>

      <div id="header-logo">
        <a href="{{ route('siteIndex') }}">
          <img src="{{asset("site/img/Logo-ERK-horizontal4.png")}}" alt="Logo ERK">
        </a>
        
      </div>

      <div id="header-categorias">
        <a href="{{ route('produtos') }}">Categorias</a>
      </div>

      <div id="header-sacola">
        <span id="icone-sacola" class="material-symbols-outlined">shopping_bag</span>
      </div>

    </div>
</header>