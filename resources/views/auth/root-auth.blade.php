@extends('layouts.root') 
@section('app-scope','auth') 
@section('content')
<div class="login-box">
    <header id="login" class="center-align">            
        <img src="{{asset('img/logo_v2.png')}}" alt="Logo Diakonia">
    </header>
    <header class="titulo white-text center-align">@yield('auth-title')</header>
    @yield('formulario')
</div>
    <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@endsection