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

    <style>

    html,body{margin: 0;padding: 0;border: 0;height: 100%;}

    .welcome-container{
        background: url('/img/landing-background.jpg') no-repeat center center fixed;
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
    .conteudo-wrapper > div{
        width: 45%;
        display: inline-block;
        float: left;
        padding: 40px 10px;
    }
    .descricao{
        text-align: left;
        font-size: 1.8rem;
        color: #3c2324;
        margin-top: 30px;
        background-color:rgba(246, 240, 240, 0.6);
        border: 2px solid transparent;
        border-radius: 10px;
    }

    .icon {
    width: 260px;
    height: 260px;

}

.icon path {
  fill: none;
  stroke-width: 1.5px;
  stroke-dashoffset: 0;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-width: 1.5;
  stroke: #FFF;
}
.icon path.long {
  stroke-dasharray: 420,420;
  transition: 1.5s all ease;
}
.icon path.longer {
  stroke-dasharray: 512,512;
  transition: 1.5s all ease;
}
.icon path.short {
  stroke-dasharray: 90,90;
  transition: 1s all ease;
}
.icon path.round {
  stroke-linecap: round ;
  stroke-linejoin: round ;
}
.icon path.virtual {
  transition: 1.5s all ease;
  stroke-dasharray: 1.1, 3;
  stroke-linecap: round ;
}
path.virtual {
  -webkit-animation: virtual-outline 60s infinite linear;
  -moz-animation: virtual-outline 60s infinite linear;
  animation: virtual-outline 60s infinite linear;
}
@-webkit-keyframes virtual-outline {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 512;
  }
}
@-moz-keyframes virtual-outline {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 512;
  }
}
@keyframes virtual-outline {
  0% {
    stroke-dashoffset: 0;
  }
  100% {
    stroke-dashoffset: 512;
  }
}
/*
@-webkit-keyframes rotate {  0%   {
    -webkit-transform:rotate(0deg) }  100% {
    -webkit-transform:rotate(360deg) }}

@-moz-keyframes rotate {  0%   {
    -moz-transform:rotate(0deg) }  100% {
    -moz-transform:rotate(360deg) }}

@keyframes rotate {  0%   {
    transform:rotate(0deg) }  100% {
    transform:rotate(360deg) }}

*/
div:hover .icon path.long {
  stroke-dashoffset: 420;
}
div:hover .icon path.longer {
  stroke-dashoffset: 512;
}
div:hover .icon path.short {
  stroke-dashoffset: 90;
}
div:hover .icon path.virtual {
  stroke-dasharray: 11.1, 22 ;
  stroke-width: 9;
  opacity: 0;
}
.btn{
    font-size: 1rem;

    border-radius: 0.5rem;
    display: inline-block;
    cursor: pointer;
    transition: all .25s ease;
    padding: 10px;
    font-weight: 500;
    border: 0;
    text-decoration: none;
    color: rgba(255, 255, 255, 0.8);
}

.btn-entrar{background-color: #376c8c;margin-right: 25px;}
.btn-registrar{background-color: #dae8f1;color: #214c66;}
span.primeiro-acesso{font-weight: bold;font-size: 0.9rem;color: #121313;}
    </style>

  </head>

  <body>

    <div class="welcome-container">
        <div class="wrapper">
            <div class="logo">
                <img src="/img/logo_FRONT-WHITE.png" alt="Logo DIAKONIA">
            </div>

            <div class="conteudo-wrapper">
                <div class="descricao">
                    <p>
                    Visando atender uma necessidade crescente de gestão dos membros, grupos caseiros
                    e eventos da igreja foi desenvolvido o Sistema Diakonia.
                    </p>

                </div>
                <div class="animacao">
                    <svg width="144" height="144" viewBox="0 0 144 144" class="icon icon-serverstack-virtual stroked">
                    <path class="long" d="m 101.7,41.83 -58.76,0 m 58.76,16.25 -58.76,0 m 58.76,16.35 -58.76,0 m 58.76,16.2 -58.76,0 m 0,-49.01 11.02,-5 36.75,0 10.99,5 0,65.18 -58.76,0 z"></path>
                    <path class="short" d="m 53.42,98.63 c 0,0.4 0.34,0.8 0.75,0.8 0.42,0 0.75,-0.4 0.75,-0.8 0,-0.4 -0.33,-0.7 -0.75,-0.7 -0.41,0 -0.75,0.3 -0.75,0.7 z m -3.32,0 c 0,0.4 -0.34,0.8 -0.75,0.8 -0.42,0 -0.75,-0.4 -0.75,-0.8 0,-0.4 0.33,-0.7 0.75,-0.7 0.41,0 0.75,0.3 0.75,0.7 z m 37.21,-4.2 3.3,0 0,8.47 -3.3,0 z m 9.5,0 -3.3,0 0,8.47 3.3,0 z M 53.42,82.53 c 0,0.4 0.34,0.7 0.75,0.7 0.42,0 0.75,-0.3 0.75,-0.7 0,-0.5 -0.33,-0.8 -0.75,-0.8 -0.41,0 -0.75,0.3 -0.75,0.8 z m -3.32,0 c 0,0.4 -0.34,0.7 -0.75,0.7 -0.42,0 -0.75,-0.3 -0.75,-0.7 0,-0.5 0.33,-0.8 0.75,-0.8 0.41,0 0.75,0.3 0.75,0.8 z m 37.21,-4.3 3.3,0 0,8.5 -3.3,0 z m 9.5,0 -3.3,0 0,8.5 3.3,0 z m -43.39,-12 c 0,0.4 0.34,0.7 0.75,0.7 0.42,0 0.75,-0.3 0.75,-0.7 0,-0.4 -0.33,-0.8 -0.75,-0.8 -0.41,0 -0.75,0.4 -0.75,0.8 z m -3.32,0 c 0,0.4 -0.34,0.7 -0.75,0.7 -0.42,0 -0.75,-0.3 -0.75,-0.7 0,-0.4 0.33,-0.8 0.75,-0.8 0.41,0 0.75,0.4 0.75,0.8 z m 37.21,-4.29 3.3,0 0,8.59 -3.3,0 z m 9.5,0 -3.3,0 0,8.59 3.3,0 z M 53.42,49.95 c 0,0.41 0.34,0.75 0.75,0.75 0.42,0 0.75,-0.34 0.75,-0.75 0,-0.41 -0.33,-0.75 -0.75,-0.75 -0.41,0 -0.75,0.34 -0.75,0.75 z m -3.32,0 c 0,0.41 -0.34,0.75 -0.75,0.75 -0.42,0 -0.75,-0.34 -0.75,-0.75 0,-0.41 0.33,-0.75 0.75,-0.75 0.41,0 0.75,0.34 0.75,0.75 z m 37.21,-4.26 3.3,0 0,8.52 -3.3,0 z m 9.5,0 -3.3,0 0,8.52 3.3,0 z"></path>
                    <path class="virtual" d="m 53.97,32.5 a 4.105,4.105 0 0 0 -1.69,0.38 l -11.03,5 a 4.105,4.105 0 0 0 -2.41,3.74 l 0,65.18 a 4.105,4.105 0 0 0 4.1,4.1 l 58.76,0 a 4.105,4.105 0 0 0 4.1,-4.1 l 0,-65.18 a 4.105,4.105 0 0 0 -2.4,-3.74 l -10.99,-5 a 4.105,4.105 0 0 0 -1.7,-0.38 l -36.74,0 z"></path>
                    </svg>
                </div>
            </div>
            <div class="conteudo-wrapper">
                <div>
                    <a class="btn btn-entrar" href="/home">Entrar</a>

                    <a class="btn btn-registrar" href="">Registrar</a> <span class="primeiro-acesso">
                        Para o primeiro acesso
                        é necessário fazer o registro de usuário
                    </span>
                </div>

            </div>
        </div>

    </div>



  </body>
</html>
