@extends('auth.root-auth')
@section('content')
<div class="login-box">
    <header id="login" class="center-align">            
        <img src="{{asset('img/logo_v2.png')}}" alt="Logo Diakonia">
    </header>

    <header class="light-blue darken-4 white-text center-align">Registrar novo usuário</header>

    <div class="login-conteudo hoverable">

        <div class="row">
            <div class="input-field col s12">
                    <i class="fa fa-user prefix" aria-hidden="true"></i> 
                <input name="name" type="text" class="validate white-text">
                <label for="name">Nome</label>
                @if ($errors->has('name'))                    
                    <span class="helper-text" data-error="{{ $errors->first('name') }}"></span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="fa fa-envelope prefix" aria-hidden="true"></i> 
                <input name="email" type="email" class="validate white-text">
                <label for="email">Email</label>
                @if ($errors->has('email'))                    
                    <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="fa fa-lock prefix" aria-hidden="true"></i> 
                <input  name="password" type="password" class="validate white-text">
                <label for="password">Senha</label>
                @if ($errors->has('password'))                    
                    <span class="helper-text" data-error="{{ $errors->first('password') }}"></span>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12">
                <i class="fa fa-lock prefix" aria-hidden="true"></i> 
                <input name="password_confirmation" type="password" class="validate white-text">
                <label for="password_confirmation">Confirmar senha</label>
                @if ($errors->has('password_confirmation'))                    
                    <span class="helper-text" data-error="{{ $errors->first('password_confirmation') }}"></span>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-registrar">
            <i class="fa fa-btn fa-user"></i> Registrar
        </button>
       
    </div>
</div>
@endsection

{{--  @extends('template-guest')
@include('auth.style')
@section('conteudo')

<div class="formulario">
    <div class="row">
        <div class="panel-heading">Registrar novo usuário</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Nome</label>

                    <div class="col-campo">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Email</label>

                    <div class="col-campo">
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

                    <div class="col-campo">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Confirmar senha</label>

                    <div class="col-campo">
                        <input type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-campo col-md-offset-4">
                        <button type="submit" class="btn btn-registrar">
                            <i class="fa fa-btn fa-user"></i> Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection  --}}
