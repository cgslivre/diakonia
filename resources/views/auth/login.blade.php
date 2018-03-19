@extends('auth.root-auth') 
@section('content')

<div class="login-box">
    <header id="login" class="center-align">            
        <img src="{{asset('img/logo_v2.png')}}" alt="Logo Diakonia">
    </header>
    <div class="login-conteudo hoverable">
        <div class="login-header center-align">Login</div>
        <form role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
            {!! csrf_field() !!}
            <div class="row">
                <div class="input-field col s12">
                    <i class="fa fa-user prefix" aria-hidden="true"></i>                    
                    <input id="email" type="email"  class="validate {{ $errors->has('email') ? 'invalid' : '' }}" 
                    type="email" name="email" value="{{ old('email') }}" style="color:#e8e9eb">
                    <label for="email">Email</label>
                    <span class="helper-text" 
                        data-error="{{ $errors->has('email') ? $errors->first('email') : 'Email inválido' }}"></span>                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="fa fa-lock prefix" aria-hidden="true"></i>
                    <input type="password" name="password" class="validate  {{ $errors->has('password') ? 'invalid' : '' }}" style="color:#e8e9eb">
                    <label for="password">Senha</label>
                    <span class="helper-text" 
                        data-error="{{ $errors->has('password') ? $errors->first('password') : 'Senha inválida' }}"></span>
                    
                </div>
            </div>          

            <div class="center-align">
                <button type="submit" class="btn red darken-4">
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
        <p class="right-align">
            <a class="text-center esqueci-senha red-text text-lighten-3" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
        </p>
    </div>
</div>
@endsection