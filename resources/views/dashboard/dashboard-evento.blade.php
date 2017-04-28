{{ Date::setLocale('pt_BR') }}
<div class="panel panel-default panel-dashboard dashboard-evento">
  <div class="panel-heading"><i class="fa fa-calendar" aria-hidden="true"></i> Eventos</div>
  <div class="panel-body">
      @if (count($data["evento.proximos"]) > 0)
          <p>
              Próximos eventos registrados:
          </p>
          <ul>

        @foreach ($data["evento.proximos"] as $evento)
            <li>
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                <a href="{{URL::route('evento.show', $evento->id)}}">
                {{$evento->titulo}}</a>
                <span class="text-border">
                    {{Date::parse($evento->data_hora_inicio)
                        ->format('l, j \d\e F \d\e Y, \à\s G\hi')}}
                </span>
            <span class="text-border">
                duração: <span>{{$evento->data_hora_inicio->diffForHumans(
                    $evento->data_hora_fim,true)}}
                </span></span>
                <span class="text-border">
                    Público Alvo: <span>{{$evento->publicoAlvo->nome}}
                    </span>                    
                </span>

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
