<div class="card-evento musica {{$evento->statusEscalaMusica}}">
    <div class="data text-center">
        {{ Date::setLocale('pt_BR') }}
        <p class="dia">{{ $evento->data_hora_inicio->day }}</p>
        <p class="mes">{{ Date::make($evento->data_hora_inicio)->format('F') }}</p>
    </div>
    <p class="titulo"><a href="{{URL::route('evento.show',$evento->id)}}">{{$evento->titulo}}</a>
        @if ($evento->statusEscalaMusica == "sem-escala")
            <i class="fa fa-exclamation-circle sem-escala" aria-hidden="true"></i>
        @elseif ($evento->statusEscalaMusica == "escala-criada")
            <i class="fa fa-cog escala-criada" aria-hidden="true"></i>
        @elseif ($evento->statusEscalaMusica == "escala-publicada")
            <i class="fa fa-check-circle escala-publicada" aria-hidden="true"></i>
        @endif

    </p>
    <p class="dias-restando">{{ $evento->data_hora_inicio->diffForHumans() }}</p>
    @if($evento->statusEscalaMusica == "sem-escala")
    <a href="{{URL::route('musica.escala.create',$evento->id)}}" class="btn btn-primary" title="Adicionar Escala">
        <i class="fa fa-plus"></i>  Adicionar escala</a>
    @elseif ($evento->statusEscalaMusica == "escala-criada")
        <a href="{{URL::route('musica.escala.analisar',$evento->escalaMusica->id)}}"
            class="btn btn-success" title="Publicar Escala">
            <i class="fa fa-feed"></i>  Publicar escala</a>
    @elseif ($evento->statusEscalaMusica == "escala-publicada")
        <a href="{{URL::route('musica.escala.show',$evento->escalaMusica->id)}}"
            class="btn btn-primary" title="Ver Escala">
            <i class="fa fa-eye"></i>  Ver escala</a>
    @endif
</div>
