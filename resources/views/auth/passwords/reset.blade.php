@extends('auth.root-auth') 
@section('auth-title','Trocar senha') 

@section('formulario')
@if (session('status'))
    <div class="card-panel green lighten-4 green-text text-darken-4">                        
        {{ session('status') }}
    </div>
    @endif        
<form class="form-horizontal" role="form" method="POST"
action="{{ route('password.request') }}">
{{ csrf_field() }}

<input type="hidden" name="token" value="{{ $token }}">

<div class="row">
    <div class="input-field col s12">
        <i class="fa fa-envelope prefix" aria-hidden="true"></i>
        <input id="email" name="email" type="email" value="{{ $email or old('email') }}"
            class="validate white-text {{ $errors->has('email') ? 'invalid' : '' }}" autofocus>
        <label for="email">Email</label>
        @if ($errors->has('email'))
            <span class="helper-text" data-error="{{ $errors->first('email') }}"></span>
        @endif
    </div>
</div>
<div class="row">
    <div class="input-field col m6 s12">
            <i class="fa fa-lock prefix" aria-hidden="true"></i>
            <input name="password" id="password" type="password" 
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
    <button type="submit" class="btn red darken-4">
        Trocar senha
    </button>
</div>

</form>
@endsection
