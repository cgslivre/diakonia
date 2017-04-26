<!DOCTYPE HTML>

<html lang="pt-BR">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  Diz ao browser para ser responsivo com a largura da tela --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Diakonia - Discípulos em Brasília - @yield('titulo')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,500,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>

    html,body{margin: 0;padding: 0;border: 0;height: 100%;}

    .welcome-container{
        background: url('/img/welcome-background.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 100%;
        min-height: 100%;
        overflow:auto;
        text-align: center;
        font-family: 'Dosis', sans-serif;
        font-weight: 200;
    }

    .wrapper{margin-top: 60px;}
    .logo{background-color:rgba(0, 0, 0, 0.6);padding: 25px 0;}
    .conteudo-wrapper{width: 76%;margin: 0 auto;display: inline-block;}

    .descricao{
        text-align: left;
        font-size: 1.2rem;
        color: #ffffff;
        margin-top: 30px;
        background-color:rgba(0, 0, 0, 0.3);
        border: 2px solid transparent;
        border-radius: 2px;    }
        .descricao p {margin:0;}
        .descricao strong{font-size: 1.9rem;color: #eb8c5d;}
    .botoes{
        margin-top: 30px;
        text-align: center;
    }
.btn{
    font-size: 1.2rem;
    margin:0 auto;
    border-radius: 2px;
    display: block;
    
    cursor: pointer;
    transition: all .25s ease;
    font-weight: 400;
    border: 1px solid transparent;
    padding: 6px 12px;
    text-decoration: none;
    color: #fff;}
    .btn-entrar{
        background-color: #5cb85c;
        border-color: #4cae4c;        }
    .btn-entrar:hover{
        background-color: #449d44;
        border-color: #398439;        }
    .btn-registrar{
        background-color: #5bc0de;
        border-color: #46b8da;}
    .btn-registrar:hover{
        background-color: #31b0d5;
        border-color: #269abc;}

span.primeiro-acesso{font-weight: bold;font-size: 0.9rem;color: #121313;}
.has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label,
.has-error .help-block, .has-error .radio, .has-error .radio-inline,
.has-error.checkbox label, .has-error.checkbox-inline label,
.has-error.radio label, .has-error.radio-inline label {
    color: #a94442;
}
input{margin:0;}
    </style>

  </head>

  <body>

    <div class="welcome-container">
        <div class="wrapper">
            <div class="logo">
                <img src="/img/logo_FRONT-WHITE.png" alt="Logo DIAKONIA">
            </div>

            <div class="conteudo-wrapper">
                @yield('conteudo')
            </div>

        </div>

    </div>



  </body>
</html>
