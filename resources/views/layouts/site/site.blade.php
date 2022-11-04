<!DOCTYPE html>
<html lang="pt-BR">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>@yield('titulo')</title>

      <link rel="stylesheet" href="{{asset("site/css/site.css")}}">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;300;400;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Noto+Sans:wght@200;300&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  </head>
  <body>
  
    @include('layouts.site.header')
    
    @yield('conteudo')

    @include('layouts.site.footer')

    <script src="{{asset('site/js/siteScripts.js')}}"></script>
  </body>
</html>