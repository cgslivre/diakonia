@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Lista de Eventos</li>@stop


@section('content')
    <h2>Eventos nos próximos 30 dias</h2>
    @foreach ($eventos30Dias as $evento)
        @include('evento.card-evento',['evento'=>$evento])
    @endforeach
    <h2>Eventos após 30 dias</h2>
    @foreach ($eventosApos30Dias as $evento)
        @include('evento.card-evento',['evento'=>$evento])
    @endforeach
@endsection
