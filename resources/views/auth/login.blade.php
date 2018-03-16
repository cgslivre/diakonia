@extends('layouts.root-auth')
<div class="row">
    <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require
                    little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>
{{-- @section('content')
<div class="login-container">
    <div class="login-box">
        <header id="login" class="text-center">
            <img src="../img/logo_v2.png" alt="Logo Diakonia">
        </header>
        <div class="login-conteudo">
            <div class="login-header text-center">Login</div>
            <form role="form" method="POST" action="{{ url('/login') }}" autocomplete="off">
                {!! csrf_field() !!}
                <div class="login-form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="user"></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="email"> @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>

                <div class="login-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="password"></label>
                    <input type="password" name="password" placeholder="senha"> @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                    @endif
                </div>

                <button type="submit" class="btn-login text-center">
                    entrar
                </button>

                <div class="remember-password">
                    <label>
                        <input type="checkbox" name="remember"> Lembrar da senha
                    </label>
                </div>

            </form>


        </div>
        <a class="text-center esqueci-senha" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
    </div>

</div>


@endsection --}}