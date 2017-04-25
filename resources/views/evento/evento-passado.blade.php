{{ Date::setLocale('pt_BR') }}
@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Passado de Eventos</li>@stop


@section('content')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Evento</th>
                <th>Tempo</th>
                <th>Data/Hora Início</th>
                <th>Data/Hora Fim</th>
                <th>Duração</th>
                <th>Tipo</th>
                <th>Público Alvo</th>
                <th>Local</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($eventos as $evento)
        <tr>
            <td><a href="{{route('evento.edit',['id'=>$evento->id])}}">
                {{$evento->titulo}}
            </a></td>
            <td>{{$evento->data_hora_inicio->diffForHumans(null,false)}}</td>
            <td>{{Date::parse($evento->data_hora_inicio)
                ->format('j/m/Y G\h:i')}}</td>
            <td>{{Date::parse($evento->data_hora_fim)
                ->format('j/m/Y G\h:i')}}</td>
            <td>{{$evento->data_hora_inicio->diffForHumans(
                $evento->data_hora_fim,true)}}</td>
            <td>{{$evento->tipoEvento->nome}}</td>
            <td>{{$evento->publicoAlvo->nome}}</td>
            <td>{{$evento->local->nome}}</td>
        </tr>
    @empty
        Nenhum evento passado.

    @endforelse
        </tbody>
    </table>

@endsection
