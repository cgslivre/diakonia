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
       @if ($evento->escalaMusica->impedimentos->contains('colaborador_id',$user->id))
           <a href="#" title="Posso particiar"><i class="fa fa-thumbs-up"></i></a>
       @else
           <a href="#" title="Não posso particiar"><i class="fa fa-thumbs-down"></i></a>
       @endif
   @endisset
</div>

@section('scripts')
    @parent

    <script type="text/javascript">
    $('#toolbar-btn-{{$evento->id}}').toolbar({
        content: '#toolbar-evento-{{$evento->id}}',
        position: 'right',
        event: 'click',
        hideOnClick: true
    });
    $('.tool-item').on( "click", function() {
        window.location = $(this).attr('href');
    });
    </script>
@endsection
{{--


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
@endif --}}

{{-- @if ($colaborador)
  @include('musica.escala.modal-registrar-impedimento',[
    'colaborador'=>$colaborador
    ,'escala'=>$evento->escala])
    @include('musica.escala.modal-remover-impedimento',[
      'colaborador'=>$colaborador
      ,'escala'=>$evento->escala])
@endif --}}
