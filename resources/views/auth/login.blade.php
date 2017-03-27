@extends('auth.template')

@section('content')
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
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="login-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="password"></label>
                        <input type="password" name="password" placeholder="senha">

                        @if ($errors->has('password'))
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
{{--
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lembrar da senha
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    --}}

@endsection
