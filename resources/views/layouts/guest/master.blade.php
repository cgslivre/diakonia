<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diakonia - Discípulos em Brasília</title>

    <link rel="icon" href="{{asset('img/favicon-32px.png')}}" />
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    {{Html::style('css/guest.min.css')}}
</head>

<body id="page-top" class="index">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <img src="{{ url('img/logo_FRONT-WHITE.png') }}" alt="Diakonia Logo"
            class="img-responsive" />

    </nav>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>@yield('titulo')</h2>
                    <hr/>
                </div>
            </div>
            @yield('content')

        </div>
    </section>


    <!-- Footer -->
    <footer class="text-center">

        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Diakonia
                    </div>
                </div>
            </div>
        </div>
    </footer>



</body>

</html>
