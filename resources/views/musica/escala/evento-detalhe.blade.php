{{-- Dados do evento  --}}
<div class="show-evento">
    <div class="titulo">
        <h4>
            {{$evento->titulo}}
        </h4>
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

    <p class="local">
        Local: <strong><a target="_blank" href="{{ route('local.show',['id'=>$evento->local->slug])}}">
            {{$evento->local->nome}} <i class="fa fa-external-link" aria-hidden="true"></i></a></strong>
    </p>


</div>{{-- Fim div.show-evento --}}
