{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')<li class="active">Eventos de Música</li>@stop


@section('content')

    <div class="btn-group pull-right" role="group" aria-label="Default button group">
        <a type="button" href="{{URL::action('MusicaEventoController@create')}}"
            class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Criar Evento de Música</a>
    </div>
    <div class="clearfix"></div>

    <h2>Eventos cadastrados nos próximos 30 dias</h2>
    <div class="eventos-card">
        @forelse( $eventos30 as $evento )
            @include('musica.evento.card-evento-musica',['evento'=>$evento])
        @empty
            Nenhum evento cadastrado para os próximos 30 dias.
        @endforelse
    </div>

    <hr/>

    <h2>Eventos futuros (após {{ Date::now()->add('30 day')->format('j \\d\\e F \\d\\e Y') }})</h2>
    @forelse( $eventosFuturos as $evento )
        <li>{{$evento->titulo}}</li>
    @empty
        Nenhum evento após {{ Date::now()->add('30 day')->format('j \\d\\e F \\d\\e Y') }}.
    @endforelse
@endsection
