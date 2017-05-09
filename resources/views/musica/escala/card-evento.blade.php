<div class="card-evento musica {{$evento->statusEscalaMusica}}">
    <div class="data text-center">
        {{ Date::setLocale('pt_BR') }}
        <p class="dia">{{ $evento->data_hora_inicio->day }}</p>
        <p class="mes">{{ Date::make($evento->data_hora_inicio)->format('F') }}</p>
    </div>
    <p class="titulo"><a href="{{URL::route('evento.show',$evento->id)}}">{{$evento->titulo}}</a></p>
    <p class="dias-restando">{{ $evento->data_hora_inicio->diffForHumans() }}</p>
    @if($evento->statusEscalaMusica == "sem-escala")
    <a href="{{URL::route('musica.escala.create',$evento->id)}}" class="btn btn-success" title="Adicionar Escala">
        <i class="fa fa-plus"></i>  Adicionar escala</a>
    @endif
</div>
