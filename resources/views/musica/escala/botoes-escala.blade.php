<a id="toolbar-btn-{{$evento->id}}" data-toolbar="content-option" class="btn-toolbar">
    <i class="fa fa-cog"></i>
</a>

<div id="toolbar-evento-{{$evento->id}}" class="hidden">
   <a href="#" class="btn " title="Carro"><i class="fa fa-car"></i></a>
   <a href="#" class="btn "><i class="fa fa-plane"></i></a>
   <a href="#" class="btn "><i class="fa fa-bicycle"></i></a>
</div>

@section('scripts')
    @parent

    <script type="text/javascript">
    $('#toolbar-btn-{{$evento->id}}').toolbar({
        content: '#toolbar-evento-{{$evento->id}}',
        position: 'right',
    });
    </script>
@endsection
{{-- @if($evento->statusEscalaMusica == "sem-escala")
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
@endif --}}

{{-- @if ($colaborador)
  @include('musica.escala.modal-registrar-impedimento',[
    'colaborador'=>$colaborador
    ,'escala'=>$evento->escala])
    @include('musica.escala.modal-remover-impedimento',[
      'colaborador'=>$colaborador
      ,'escala'=>$evento->escala])
@endif --}}
