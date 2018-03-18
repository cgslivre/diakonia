@extends('layouts.root') 
    @section('app-scope','entrada')


<div class="wrapper">
    <div class="logo">
        <img src="/img/logo_FRONT-WHITE.png" alt="Logo DIAKONIA">
    </div>

    <div class="conteudo-wrapper">
        @yield('conteudo')
    </div>
</div>