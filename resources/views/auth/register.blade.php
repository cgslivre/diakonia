@extends('auth.root-auth') 
@section('content-1')
<div class="login-box">
    <header id="login" class="center-align">
    <a href="{{url("/")}}" title="Diakonia">
            <img src="{{asset('img/logo_v2.png')}}" alt="Logo Diakonia">
        </a>
    </header>

    <header class="titulo white-text center-align">Registrar novo usuário</header>

    <div class="login-conteudo hoverable">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            {{--  {{$errors}}  --}}
            <div class="row">
                <div class="input-field col m6 s12">
                    <i class="fa fa-user prefix" aria-hidden="true"></i>
                    <input id="name" name="name" type="text"
                         class="validate white-text {{ $errors->has('name') ? 'invalid' : '' }}">
                    <label for="name">Nome</label>
                    @if ($errors->has('email'))
                        <span class="helper-text" data-error="{{ $errors->first('name') }}"></span>
                    @endif
                </div>
                
                <div class="input-field col m6 s12">
                    <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                    <input id="email" name="email" type="email" 
                        class="validate white-text {{ $errors->has('email') ? 'invalid' : '' }}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                    <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                    @endif
                </div>
                <div class="input-field col m6 s12">
                    <i class="fa fa-lock prefix" aria-hidden="true"></i>
                    <input name="password" type="password" 
                        class="validate white-text {{ $errors->has('password') ? 'invalid' : '' }}">
                    <label for="password">Senha</label>
                    @if ($errors->has('password'))
                    <span class="helper-text" data-error="{{ $errors->first('password') }}"></span>
                    @endif
                </div>
                <div class="input-field col m6 s12">
                    <i class="fa fa-lock prefix" aria-hidden="true"></i>
                    <input name="password_confirmation" type="password" 
                        class="validate white-text {{ $errors->has('password_confirmation') ? 'invalid' : '' }}">
                    <label for="password_confirmation">Confirmar senha</label>
                    @if ($errors->has('password_confirmation'))
                    <span class="helper-text" data-error="{{ $errors->first('password_confirmation') }}"></span>
                    @endif
                </div>                
            </div>    

            <div class="row center-align">
                <button type="submit" class="btn green darken-1">
                    <i class="fa fa-btn fa-user-plus"></i> Registrar
                </button>
            </div>
        </form>

    </div>
</div>
@endsection 