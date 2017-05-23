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
    <p class="titulo"><a href="{{URL::route('evento.show',$evento->id)}}">{{$evento->titulo}}</a>
        @if ($evento->statusEscalaMusica == "sem-escala")
            <i class="fa fa-exclamation-circle sem-escala" aria-hidden="true"></i>
        @elseif ($evento->statusEscalaMusica == "escala-criada")
            <i class="fa fa-cog escala-criada" aria-hidden="true"></i>
        @elseif ($evento->statusEscalaMusica == "escala-publicada")
            <i class="fa fa-check-circle escala-publicada" aria-hidden="true"></i>
        @endif

        @if ($is_lider)
            <i class="fa fa-street-view lider" aria-hidden="true"></i>
        @endif

    </p>
    <p class="dias-restando">{{ $evento->data_hora_inicio->diffForHumans() }}</p>
        @if($evento->statusEscalaMusica == "sem-escala")
            @can('musica-escala-edit')
                <a href="{{URL::route('musica.escala.create',$evento->id)}}"
                    class="btn btn-primary" title="Adicionar Escala">
                    <i class="fa fa-plus"></i>  Adicionar escala</a>
            @endcan
        @elseif ($evento->statusEscalaMusica == "escala-criada")
            @can('musica-escala-edit')
            <a href="{{URL::route('musica.escala.analisar',$evento->escalaMusica->id)}}"
                class="btn btn-success" title="Publicar Escala">
                <i class="fa fa-feed"></i>  Publicar escala</a>
            @endcan

        @elseif ($evento->statusEscalaMusica == "escala-publicada")
            @can('musica-escala-view')
            <a href="{{URL::route('musica.escala.show',$evento->escalaMusica->id)}}"
                class="btn btn-primary" title="Ver Escala">
                <i class="fa fa-eye"></i>  Ver escala</a>
            @endcan
        @endif
        @if ($colaborador)
            @if( $impedido)
                <button class="btn btn-success" type="button"
                    data-toggle="modal" data-target="#modalRemoverImpedimento">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Remover Impedimento
                </button>
            @else
                <button class="btn btn-danger" type="button"
                    data-toggle="modal" data-target="#modalRegistrarImpedimento">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Registrar Impedimento
                </button>
            @endif
        @endif
</div>
@if ($colaborador)
  @include('musica.escala.modal-registrar-impedimento',[
    'colaborador'=>$colaborador
    ,'escala'=>$evento->escala])
    @include('musica.escala.modal-remover-impedimento',[
      'colaborador'=>$colaborador
      ,'escala'=>$evento->escala])
@endif
