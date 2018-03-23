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
@endsection