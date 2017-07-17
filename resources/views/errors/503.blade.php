<!DOCTYPE html>
<html>
    <head>
        <title>Site em manutenção</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {height: 100%;width: 100%;}

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content > img{}

            img.logo{position: absolute;left: 50%; width: 286px;margin-left: -143px; /* Half the width */}

            .content {text-align: center;display: inline-block;}

            .title {
                font-size: 56px;
                color: #E63946;
                margin-bottom: 40px;
            }
            .message{color: #457B9D;font-size: 24px;font-weight: bold;}

        </style>
    </head>
    <body>
        <img src="{{ url('img/logo_v1.png') }}" alt="Logo" class="logo">
        <div class="container">
            <div class="content">
                <img src="{{ url('img/sad-grape.gif') }}" alt="Site fora do ar">
                <div class="title">Ooops! Site temporariamente fora do ar.</div>
                <div class="message">{{ $exception->getMessage() }}</div>
            </div>
        </div>
    </body>
</html>
