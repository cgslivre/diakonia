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

  </div>
</div>
