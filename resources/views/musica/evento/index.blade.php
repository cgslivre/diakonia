{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2', '<li class="active">Eventos de Música</li>')


@section('content')
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
