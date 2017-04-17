{{ Date::setLocale('pt_BR') }}
@extends( 'evento.template-evento')

@section('nivel2')<li class="active">{{$evento->titulo}} -
    {{Date::parse($evento->data_hora_inicio)->format('j \d\e F \d\e Y')}}</li>@stop


@section('content')
<div class="show-evento">
    <div class="titulo">
        <h1>
            {{$evento->titulo}}
            @can('evento-edit')
                <a href="{{route('evento.edit',['id'=>$evento->id])}}"
                class="btn btn-primary">Editar</a>
            @endcan
        </h1>
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
            Começa em <span>{{$evento->data_hora_inicio->diffForHumans(null,true)}}
        </span></span>
        @endif
        <span class="tipo-evento">
            Tipo <span>{{$evento->tipoEvento->nome}}
        </span></span>
        <span class="publico-alvo">
            Público Alvo <span>{{$evento->publicoAlvo->nome}}
        </span></span>
    </p>

    @if( $evento->descricao )
    <h3>Descrição</h3>
    <p>
        {{$evento->descricao}}
    </p>
    @endif

    <div class="local">
        <h3>Local</h3>
        <p><strong><a target="_blank" href="{{ route('local.show',['id'=>$evento->local->slug])}}">
            {{$evento->local->nome}} <i class="fa fa-external-link" aria-hidden="true"></i></a></strong>
        </p>
            @if($evento->local->endereco)
                <p>
                    {{$evento->local->endereco}}
                </p>
            @endif
        <p>{{$evento->local->cidade}}/{{$evento->local->uf}}</p>
    </div>

    @if( $evento->programacao )
        <h3>Programação</h3>
        <p>
            {{$evento->programacao}}
        </p>
    @endif
    <hr/>
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
