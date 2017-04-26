@extends('template-guest')
@include('auth.style')
@section('conteudo')

@section('conteudo')
<div class="formulario">
    <div class="row">
        <div class="panel-heading">Trocar a senha</div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST"
                action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <p>
                    Identifique-se para receber um e-mail com as instruções e o link
                    para criar uma nova senha.
                </p>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-campo">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-campo col-md-offset-4">
                        <button type="submit" class="btn btn-registrar">
                            <i class="fa fa-btn fa-envelope"></i>
                            Enviar link para trocar a senha
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
