{{-- Dados do evento  --}}
<div class="show-evento escala">
    <p class="card titulo">
        Evento: <span>{{$evento->titulo}}</span>
    </p>

    <p class="card">
        <span class="datas">
            <i class="fa fa-calendar-o" aria-hidden="true"></i> <span>
                {{Date::parse($evento->data_hora_inicio)
                ->format('l, j \d\e F \d\e Y, G\hi')}}</span>
        </span>
        <?php
        $today = new \Carbon\Carbon();
        ?>
        @if( $evento->data_hora_inicio > $today)
            <span class="comecaem">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <span>{{$evento->data_hora_inicio->diffForHumans(null,false)}}
                </span></span>
        @endif
        <span class="tipo-evento">
            Tipo <span>{{$evento->tipoEvento->nome}}
            </span></span>
        <span class="publico-alvo">
            Público Alvo <span>{{$evento->publicoAlvo->nome}}
            </span>
        </span>
        <span class="publico-alvo">
            Local <span><a target="_blank" href="{{ route('local.show',['id'=>$evento->local->slug])}}">
                {{$evento->local->nome}} <i class="fa fa-external-link" aria-hidden="true"></i></a>
            </span>
        </span>
    </p>




</div>{{-- Fim div.show-evento --}}
