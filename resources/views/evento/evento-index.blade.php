@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Lista de Eventos</li>@stop


@section('content')
    @can('evento-edit')
    <a href="{{URL::route('evento.create') }}" class="btn btn-success">
        <i class="fa fa-calendar-plus-o"></i> Adicionar evento
    </a>
    @endcan
    <a href="{{URL::route('evento.passado.index') }}" class="btn btn-default">
        <i class="fa fa-clock-o"></i> Eventos passados
    </a>
    <h2>Eventos nos próximos 30 dias</h2>
    @foreach ($eventos30Dias as $evento)
        @include('evento.card-evento',['evento'=>$evento])
    @endforeach
    <h2>Eventos após 30 dias</h2>
    @foreach ($eventosApos30Dias as $evento)
        @include('evento.card-evento',['evento'=>$evento])
    @endforeach
@endsection
