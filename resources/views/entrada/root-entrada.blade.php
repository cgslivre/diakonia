@extends('layouts.root') 
    @section('app-scope','entrada')


<div class="wrapper">
    <div class="logo">
        <img src="/img/logotipo-white-h70px.png" alt="Logo DIAKONIA">
    </div>

    <div class="conteudo">
        @yield('conteudo')
    </div>
</div>