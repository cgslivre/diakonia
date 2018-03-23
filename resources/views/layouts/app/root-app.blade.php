{{--  
root
--master
----top
------user-menu
----menu
------submenus ?
----content
-------> *
----bottom
--}}
@extends( 'layouts.root')
@section('app-scope','app') 

@section('content')

    @include('layouts.app.top')

    <div id="main">
        <div class="wrapper">
            @include('layouts.app.menu.root-menu')

            <section id="content">

                <div class="container">
                    @yield('main')
                </div>
            </section>
        </div>
    </div>


    @include('layouts.app.bottom')
    <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    {{--  <script src="https://cdn.jsdelivr.net/npm/cash-dom@1.3.5/dist/cash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>  --}}
@endsection