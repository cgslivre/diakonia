@extends( 'master')
@section('nivel1')
    <li><a href="/home">Início</a></li>
@stop

@section('content')
    @if( $dashboards["user"])
        @include('dashboard.dashboard-usuario')
    @endif

    @if( $dashboards["evento"])
        @include('dashboard.dashboard-evento')
    @endif

    @if( $dashboards["musica"])
        @include('dashboard.dashboard-musica')
    @endif

    @if( $dashboards["material"])
        @include('dashboard.dashboard-material')
    @endif

@endsection
