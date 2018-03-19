@extends('auth.root-auth') 
@section('content')

<div class="login-box hoverable">
    <header id="login" class="center-align">            
        <img src="{{asset('img/logo_v2.png')}}" alt="Logo Diakonia">
    </header>
    <div class="login-conteudo">
        <div class="login-header center-align">Login</div>
        <form role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
            {!! csrf_field() !!}
            <div class="row">
                <div class="input-field col s12">
                    <i class="fa fa-user prefix" aria-hidden="true"></i>
                    
                    <input id="email" type="email"  class="validate {{ $errors->has('email') ? ' has-error' : '' }}" 
                    type="email" name="email" value="{{ old('email') }}" style="color:#e8e9eb">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                        <i class="fa fa-lock prefix" aria-hidden="true"></i>
                    <input type="password" name="password" class="validate" style="color:#e8e9eb">
                            <label for="password">Senha</label>
                    @if ($errors->has('password'))
                        <span class="help-block">                 
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
            </div>          

            <div class="center-align">
                <button type="submit" class="btn btn-login">
                    entrar
                </button>
            </div>

            <div class="remember-password right-align">
                <label>
                    <input type="checkbox" name="remember"/>
                    <span>Lembrar da senha?</span>
                </label>                
            </div>

        </form>
    </div>
    <a class="text-center esqueci-senha" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
</div>
@endsection