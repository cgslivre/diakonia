<!DOCTYPE HTML>

<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  Diz ao browser para ser responsivo com a largura da tela --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Diakonia - Discípulos em Brasília - @yield('titulo')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{Html::style('css/all.min.css')}}

  </head>

  <body class="flat-blue">

    <div class="app-container">




{{-- Inclui o Menu  --}}
@if (Auth::guest())
@else
  @include('layouts.menu')
@endif
      <div class="side-body">
          {{-- Inclui o cabeçalho da página --}}
    @include('header')
          <ol id="navegador" class="breadcrumb">
            @yield('nivel1')
            @yield('nivel2')
            @yield('nivel3')
          </ol>

          <hr class="divider">
          @include('layouts.mensagens')
          @yield('content')


      </div>



    </div> {{-- Fim div.app-container --}}

    <footer class="app-footer">
      <div class="wrapper">
        © 2016 Copyright
      </div>
    </footer>

    {{ HTML::script('js/app.min.js') }}

    @yield('scripts')

  </body>
</html>
