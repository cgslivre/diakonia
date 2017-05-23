@php
    if( $evento->statusEscalaMusica != "sem-escala"){
        $is_lider = $evento->escalaMusica->lider_id ==
            Auth::user()->id ? true : false;
    } else{
        $is_lider = false;
    }

    if( $evento->escalaMusica != NULL ){
        $impedido = $evento->escalaMusica->impedimentos->contains('colaborador_id',Auth::user()->id);
    } else{
        $impedido = false;
    }
@endphp

<div class="card-evento musica {{$evento->statusEscalaMusica}}">
    <div class="data text-center">
        {{ Date::setLocale('pt_BR') }}
        <p class="dia">{{ $evento->data_hora_inicio->day }}</p>
        <p class="mes">{{ Date::make($evento->data_hora_inicio)->format('F') }}</p>
    </div>
    <p class="titulo">{{$evento->titulo}}</p>
    <p class="dias-restando">{{ $evento->data_hora_inicio->diffForHumans() }}</p>
    @include('musica.escala.status-escala', [
        'evento' => $evento,
        'user' => Auth::user()
    ])
    @include('musica.escala.botoes-escala', [
        'evento' => $evento,
        'user' => Auth::user()
    ])

</div>
