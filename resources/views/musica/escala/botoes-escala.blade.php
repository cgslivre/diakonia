<a id="toolbar-btn-{{$evento->id}}" data-toolbar="content-option"
    data-toolbar-animation="bounce" class="btn-toolbar">
    <i class="fa fa-cog"></i>
</a>

<div id="toolbar-evento-{{$evento->id}}" class="hidden">
   <a href="{{URL::route('evento.show',$evento->id)}}" title="Ver detalhes do evento">
       <i class="fa fa-calendar-o"></i></a>
   @if ($evento->statusEscalaMusica == "sem-escala")
       @can('musica-escala-edit')
           {{--
           - Quando não houver escala criada para o evento
           - Quando o usuário for admin de música
           --}}
           <a href="{{URL::route('musica.escala.create',$evento->id)}}"
                title="Criar escala"><i class="fa fa-plus"></i></a>
        @endcan
   @elseif ($evento->statusEscalaMusica == "escala-criada")
       @can('musica-escala-edit')
           {{--
           - Quando houver escala criada mas não publicada
           - Quando o usuário for admin de música
           --}}
           <a href="{{URL::route('musica.escala.analisar',$evento->escalaMusica->id)}}"
                title="Publicar escala"><i class="fa fa-feed"></i></a>
        @endcan
   @else
       {{--
           - Escala já publicada
           - Usuário com perfil padrão de música
       --}}
       @can('musica-escala-view')
           <a href="{{URL::route('musica.escala.show',$evento->escalaMusica->id)}}"
                title="Ver escala"><i class="fa fa-eye"></i></a>
       @endcan
   @endif

   @isset($evento->escalaMusica)
     @if( Bouncer::allows('musica-escala-edit') ||
       $evento->escalaMusica->lider_id == $user->id)
       <a href="{{URL::route('musica.escala.edit',$evento->escalaMusica->id)}}"
            title="Alterar escala"><i class="fa fa-retweet"></i></a>
     @endif
       @if ($evento->escalaMusica->tarefas->contains('colaborador_id',$user->id) ||
           $evento->escalaMusica->lider_id == $user->id )
           @if ($evento->escalaMusica->impedimentos->contains('colaborador_id',$user->id))
               <a href="#" title="Posso particiar" class="modal-link remover-impedimento"
                   escala="{{$evento->escalaMusica->id}}" colaborador="{{$user->id}}"
                   data-evento="{{Date::parse($evento->data_hora_inicio)->format('j/M/Y')}}">
                   <i class="fa fa-thumbs-up" aria-hidden="true"></i>
               </a>
           @else
               <a href="#" title="Não posso particiar" class="modal-link criar-impedimento"
               escala="{{$evento->escalaMusica->id}}" colaborador="{{$user->id}}"
               data-evento="{{Date::parse($evento->data_hora_inicio)->format('j/M/Y')}}">
               <i class="fa fa-thumbs-down"></i></a>

           @endif
       @endif
   @endisset
</div>

@section('scripts')
    @parent

    <script type="text/javascript">
    // console.log('botoes-{{$evento->id}}');
    $('#toolbar-btn-{{$evento->id}}').toolbar({
        content: '#toolbar-evento-{{$evento->id}}',
        position: 'right',
        event: 'click',
        hideOnClick: true
    });
    $('.tool-item').not('.modal-link').on( "click", function() {
        window.location = $(this).attr('href');
    });
    </script>
@endsection
