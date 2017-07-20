{{ Date::setLocale('pt_BR') }}
<div class="panel panel-default panel-dashboard dashboard-musica">
    <div class="panel-heading"><i class="fa fa-music" aria-hidden="true"></i> Escalas de Música</div>
    <div class="panel-body">
        @if (count($data["musica.proximas-escalas"]) > 0)
            <div class="alert alert-info alert-important">
            <p class="alert-header">
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
            </div>
        @else
            <div class="alert alert-info alert-important">
                Você não está convocado(a) nas próximas escalas.
            </div>
        @endif
        @isset($data["musica.eventos-sem-escala"])
            @if (count($data["musica.eventos-sem-escala"]) > 0)
                <div class="alert alert-warning alert-important">
                    <p class="alert-header text-danger">
                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"
                            title="Sem escala"></i>
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
                                    <span class="text-border">
                                        {{ $evento->data_hora_inicio->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endisset
        @isset($data["musica.escalas-nao-publicadas"])
            @if (count($data["musica.escalas-nao-publicadas"]) > 0)
                <div class="alert alert-warning alert-important">
                    <p class="alert-header">
                        <i class="fa fa-exclamation-circle" aria-hidden="true" title="Sem escala"></i>
                        Escalas ainda não publicadas</p>
                    <ul>
                        @foreach ($data["musica.escalas-nao-publicadas"] as $escala)
                            <li>
                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                <a href="{{URL::route('musica.escala.edit',$escala->id)}}">
                                    {{$escala->evento->titulo}}</a>
                                <span class="text-border">
                                    {{Date::parse($escala->evento->data_hora_inicio)
                                        ->format('l, j \d\e F \d\e Y')}}
                                    </span>
                                    <span class="text-border">
                                        {{ $escala->evento->data_hora_inicio->diffForHumans() }}</span>

                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endisset

        @if (count($data["musica.impedimentos"]) > 0)
            <div class="alert alert-warning alert-important">
                <p class="alert-header text-danger">
                    <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"
                        title="Sem escala"></i>
                    Impedimentos na escala (nas escalas que você é o líder)</p>
                <ul>
                    @foreach ($data["musica.impedimentos"] as $imp)
                        <li>
                            <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                            <span class="text-border text-info">{{$imp->name}}</span> não pode participar no dia
                            <span class="text-border text-info">{{$imp->dia}}</span>
                            <a href="{{URL::route('musica.escala.edit',$imp->id)}}" class="btn btn-default">
                                <i class="fa fa-retweet"></i> Escolher substituto(a)</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>
