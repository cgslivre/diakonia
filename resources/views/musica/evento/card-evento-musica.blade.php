<div class="card-evento musica">
    <div class="data text-center">
        {{ Date::setLocale('pt_BR') }}
        <p class="dia">{{ $evento->hora->day }}</p>
        <p class="mes">{{ Date::make($evento->hora)->format('F') }}</p>
    </div>
    <p class="titulo">{{$evento->titulo}}</p>
    <p class="dias-restando">{{ $evento->hora->diffForHumans() }}</p>
    <!--<p class="">
        <i class="fa fa-check-square-o" aria-hidden="true"></i> Escala confirmada
    </p>-->
</div>
