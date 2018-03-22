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

    @include('layouts.app.menu.root-menu')

    @yield('main')

    @include('layouts.app.bottom')
    <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@endsection