@extends( 'retiros.template-retiro')

@section('nivel2')<li class="active">Grupos Caseiros</li>@stop


@section('content')
  {!! Form::open(array('url'=>'/retiros/grupos','class'=>'form-inline')) !!}

    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
        {!! Form::label('nome', 'Nome do grupo:' , ['class'=>'control-label'])!!}
        @if ($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
        {!! Form::text('nome', null ,['class'=>'form-control','placeholder'=>'Nome do grupo'])!!}

        {!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}
        <!--<button type="submit" class="btn btn-primary">Adicionar</button>-->
        <div class="checkbox3 checkbox-success checkbox-inline checkbox-check  checkbox-round">
          <input type="checkbox" id="radio-exibir-inativos" checked="">
          <label for="radio-exibir-inativos">Exibir inativos</label>
        </div>
    </div>
  {!! Form::close() !!}

<hr class="divider">



@if (count($grupos) > 0 )

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th class="text-center">Ativo</th>

      </tr>
    </thead>
    <tbody>

      @foreach( $grupos as $grupo )

        <tr class="{{ ($grupo->ativo) ? 'grupo-ativo' : 'grupo-inativo'}}">
          <th scope="row" title="{{ $grupo->id }}">{{$loop->iteration}}</th>
          <td
          @unless ($grupo->ativo)
          class="text-muted"
          @endunless
          >{{ $grupo->nome }}</td>
          <td class="{{ ($grupo->ativo) ? 'text-success' : 'text-danger'}} text-center" grupo="{{ $grupo->nome }}">
            {!! Form::open(['method' => 'PATCH',
                'action' => ['GrupoInscricaoController@ativacao',$grupo->id],
                'nomeGrupo' => $grupo->nome,
                'grupoAtivo' => $grupo->ativo,
                'id' => 'form-ativacao-id-' . $grupo->id,
                'class'=>'form-ativacao']) !!}
              {{ Form::hidden('id', $grupo->id ) }}
              @if( $grupo->ativo)
                <button type="submit" class="btn no-margin no-padding no-background"
                    data-toggle="modal" data-target="#modalWarning">
                    <i class="fa fa-check-circle"></i>
                </button>
              @else
                  <button type="submit" class="btn no-margin no-padding no-background"
                      data-toggle="modal" data-target="#modalWarning">
                      <i class="fa fa-times"></i>
                  </button>
              @endif

            {!! Form::close() !!}
          </td>

        </tr>
      @endforeach

    </tbody>
  </table>

@else
  Nenhum registro.
@endif

<!-- Modal -->
<div class="modal fade modal-warning" id="modalWarning" tabindex="-1"
      role="dialog" aria-labelledby="modal-ativacao" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-ativacao">Confirmação</h4>
            </div>
            <div class="modal-body">
                Deseja ativar/desativar o grupo XXXX?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-warning" id="confirmAtivacao">Sim</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>

  $('#radio-exibir-inativos').change( function() {
    if( $(this).is(':checked')){
      $('tr.grupo-inativo').show(200);
    } else{
      $('tr.grupo-inativo').hide(200);
    }
  });

var confirmacao = false;
$('.form-ativacao').submit( function(e){

  if( confirmacao){return;}
  e.preventDefault();

  var isAtivo = $(this).attr('grupoAtivo');
  console.log(isAtivo);
  var txt = (isAtivo == 1) ? 'Deseja desativar o grupo ' : 'Deseja ativar o grupo ';
  var nome = $(this).attr('nomeGrupo') ;
  txt = txt + nome + '?';

  $('.modal-body').text(txt);

  var idForm = $(this).attr('id');
  $('#confirmAtivacao').attr('formId',idForm);


});

$('#confirmAtivacao').click(function(){
  confirmacao = true;
  var formId = $(this).attr('formId');
  console.log(formId);
  $('#' + formId).submit();

});


</script>
@endsection
