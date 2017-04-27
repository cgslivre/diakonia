{{ Date::setLocale('pt_BR') }}
<div class="panel panel-default panel-dashboard">
  <div class="panel-heading">Eventos</div>
  <div class="panel-body">
      @if (count($data["evento.proximos"]) > 0)
          Próximos eventos registrados:
          <ul>

        @foreach ($data["evento.proximos"] as $evento)
            <li><a href="{{URL::route('evento.show', $evento->id)}}">
                {{$evento->titulo}}</a>, {{Date::parse($evento->data_hora_inicio)
                ->format('l, j \d\e F \d\e Y, \à\s G:i')}}
            , <span class="duracao">
                duração: <span>{{$evento->data_hora_inicio->diffForHumans(
                    $evento->data_hora_fim,true)}}
                </span></span>
                , <span class="publico-alvo">
                    Público Alvo: <span>{{$evento->publicoAlvo->nome}}
                </span></span>
            </li>
        @endforeach
        </ul>
      @else
          <div class="alert alert-info alert-important">
              Nenhum evento futuro cadastrado.
          </div>
      @endif
  </div>
</div>
