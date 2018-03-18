@extends('layouts.entrada.root-entrada')

@section('conteudo')    
    <div class="descricao">
        <div class="grego">
            <p><strong>διακονία</strong></p>
            <p>(di-a-co-ni-a)</p>
            <p>atendimento (como um servo, atendente)</p>
            <p>de <strong>διάκονος</strong></p>
            <p>um atendente, servo</p>
            <hr/>
        </div>

    </div>
    <div class="botoes">
        <a class="btn btn-entrar" href="{{URL::route('home')}}">Entrar</a>
        <br/>
        <a class="btn btn-registrar" href="{{URL::route('register')}}">Registrar novo usuário</a>
    </div>
@endsection