<div id="modalLider" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <h5 class="modal-title">Selecionar Líder</h4>
            </div>
            <div class="modal-body">
                <ul class="lideres">
                @forelse ($lideres as $lider)
                    {{ Form::open(['route' => ['musica.escala.lider.update', $evento->id], 'method' => 'post']) }}
                    {{ Form::hidden('lider_id', $lider->id) }}
                    @if(isset($escala->id))
                        {{ Form::hidden('escala_id', $escala->id) }}
                        @if ($escala->lider_id == $lider->id)
                            <li class="escalado">
                        @else
                            <li class="link">
                        @endif

                        @if ($escala->impedimentos->contains('colaborador_id',$lider->id))
                            <i class="fa fa-exclamation-triangle impedimento" aria-hidden="true"
                                title="Não pode participar neste dia"></i>
                        @endif
                    @else
                        <li class="link">
                    @endif

                        {{$lider->user->name}}

                    </li>
                    {{ Form::close() }}
                @empty
                    Nenhum líder cadastrado.
                @endforelse
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@push('scripts-1')
<script type="text/javascript">
    $('ul.lideres > form > li.link').on( "click", function() {
      console.log( $( this ).text() );
       $(this).closest("form").submit();
      //console.log($(this).closest("form"));
    });
</script>
@endpush
