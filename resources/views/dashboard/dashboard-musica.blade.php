{{ Date::setLocale('pt_BR') }}
<div class="panel panel-default panel-dashboard dashboard-musica">
  <div class="panel-heading"><i class="fa fa-music" aria-hidden="true"></i> Escalas de Música</div>
  <div class="panel-body">
      @if (count($data["musica.proximas-escalas"]) > 0)
          <p>
              Você está escalado(a) nas escalas abaixo:
          </p>
          <ul>

        @foreach ($data["musica.proximas-escalas"] as $evento)
            <li>
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                <a href="{{URL::route('musica.escala.show', $evento->escala_musica_id)}}">
                {{$evento->titulo}}</a>
                <span class="text-border">
                    {{Date::parse($evento->data_hora_inicio)
                        ->format('l, j \d\e F \d\e Y, \à\s G\hi')}}
                </span>

            </li>
        @endforeach
        </ul>
      @else
          <div class="alert alert-info alert-important">
              Você não está convocado(a) nas próximas escalas.
          </div>
      @endif

      @if (count($data["musica.eventos-sem-escala"]) > 0)
          <div class="alert alert-warning alert-important">
            <p class="alert-header text-danger">
                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true" title="Sem escala"></i>
                Eventos sem escala</p>
            <ul>
        @foreach ($data["musica.eventos-sem-escala"] as $evento)
            <li>
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                <a href="{{URL::route('musica.escala.create',$evento->id)}}">
                {{$evento->titulo}}</a>
                <span class="text-border">
                    {{Date::parse($evento->data_hora_inicio)
                        ->format('l, j \d\e F \d\e Y')}}
                </span>
                <span class="text-border">{{ $evento->data_hora_inicio->diffForHumans() }}</span>

            </li>
        @endforeach
    </ul>
        </div>
      @endif

  </div>
</div>
