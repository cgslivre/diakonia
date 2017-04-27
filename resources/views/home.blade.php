@extends( 'master')
@section('nivel1')
    <li><a href="/membros">Início</a></li>
@stop

@section('content')
    @if( $dashboards["user"])
        @include('dashboard.dashboard-usuario')
    @endif

    @if( $dashboards["evento"])
        @include('dashboard.dashboard-evento')
    @endif

@endsection
