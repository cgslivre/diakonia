{{ Date::setLocale('pt_BR') }}
@extends( 'evento.template-evento')

@section('nivel2')<li class="active">{{$evento->titulo}} -
    {{Date::parse($evento->data_hora_inicio)->format('j \d\e F \d\e Y')}}</li>@stop


@section('content')
<div class="show-evento">
    <div class="titulo">
        <h3>
            {{$evento->titulo}}
        </h3>
    </div>

    <p class="card">
        <span class="datas">
            Data/Hora Início <span>{{Date::parse($evento->data_hora_inicio)
                ->format('l, j \d\e F \d\e Y, \à\s G:i')}}</span></span>
        <span class="datas">
            Data/Hora Fim <span>{{Date::parse($evento->data_hora_fim)
                ->format('l, j \d\e F \d\e Y, \à\s G:i')}}</span>
        </span>
    </p>

    <p class="card duracao">
        <span class="duracao">
            Duração <span>{{$evento->data_hora_inicio->diffForHumans(
                $evento->data_hora_fim,true)}}
            </span></span>
        <?php
            $today = new \Carbon\Carbon();
         ?>
        @if( $evento->data_hora_inicio > $today)
        <span class="comecaem">
            Começa em <span>{{$evento->data_hora_inicio->diffForHumans(null,true)}}</span>
        </span>
        @endif

    </p>

    <p>
        <small>Criado em:
            <strong>
                {{Date::parse($evento->created_at)->format('j/n/Y G:i')}}
            </strong>, por
            <strong>{{$evento->createdBy->name}}</strong>.
        </small>
    </p>
    <p>
        <small>Última alteração:
            <strong>
                {{Date::parse($evento->updated_at)->format('j/n/Y G:i')}}
            </strong>, por
            <strong>{{$evento->updatedBy->name}}</strong>.
        </small>
    </p>
</div>
@endsection
