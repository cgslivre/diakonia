@extends('template-guest')

@section('conteudo')
<style>
    .formulario{
        margin: 10px 0;
        font-family: 'Dosis', sans-serif;
        background-color:rgba(255, 255, 255, 0.8);
        margin-right: -15px;
        margin-left: 16.66666667%;
        width: 66.66666667%;
        font-weight: normal;
        border-radius: 4px;}
        .formulario .panel-heading{
            color: #eee;
            background-color: #206b81;
            border-color: #ddd;
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;}
        .formulario .panel-body{
            padding: 15px;
        }
    .form-group {margin-bottom: 15px; }
    .form-group:before{box-sizing: border-box;}
    .form-group:after{display: table;}
    .form-group .control-label{
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
        float: left;
        font-weight: bold;
        width: 33.33333333%;}
    .form-group .col-campo{
        width: 50%;
        float: left;
        position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    }

    .formulario button{font-family: 'Dosis', sans-serif;}

    .panel-body:before, .row:after, .row:before {
    display: table;
    content: " ";
}
    .row:after {clear: both;display: table;
    content: " ";}
    .form-control {
    display: block;
    width: 100%;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after,
.form-horizontal .form-group:before,
.form-horizontal .form-group:after,
.panel-body:before,
.panel-body:after {
  display: table;
  content: " ";
}
.clearfix:after,
.container:after,
.container-fluid:after,
.row:after,
.form-horizontal .form-group:after,
.panel-body:after {
  clear: both;
}
input.form-control{
    background-color:rgba(255, 255, 255, 0.4);
}
.col-md-offset-4{margin-left: 33.33333333%;}
.form-control:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}
</style>
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
                            <i class="fa fa-btn fa-user"></i>Registrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
