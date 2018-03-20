@extends('auth.root-auth') 
@section('auth-title','Solicitar trocar de senha') 

@section('formulario')
@if (session('status'))
    <div class="card-panel green lighten-4 green-text text-darken-4">                        
        {{ session('status') }}
    </div>
@endif
<form class="form-horizontal" role="form" method="POST"
    action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <p>
        Identifique-se para receber um email com as instruções e o link
        para criar uma nova senha.
    </p>

    <div class="row">
        <div class="input-field col s12">
                <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    class="validate white-text {{ $errors->has('email') ? 'invalid' : '' }}" autofocus>
                <label for="email">Email</label>
                @if ($errors->has('email'))
                <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
                @endif
            </div>
    </div>    

    <div class="row center-align">        
        <button type="submit" class="btn red darken-4">
            <i class="fa fa-btn fa-envelope"></i>
            Enviar link para trocar a senha
        </button>        
    </div>
</form>
@endsection
