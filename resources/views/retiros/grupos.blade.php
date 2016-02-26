@extends( 'retiros.layout')

@section('subtitulo', 'Grupos de Inscritos')


@section('content')
  {!! Form::open(array('url'=>'/retiros/grupos','class'=>'form-inline')) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome do grupo:' , ['class'=>'control-label'])!!}

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
@if( $errors->any())
    <ul class="alert alert-danger">
      @foreach( $errors->all() as $error)
        <li> {{ $error }}
        </li>
      @endforeach
    </ul>
    <hr class="divider">
@endif

@if( Session::has('message') )
  <div class="alert bg-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{Session::get('message')}}
  </div>
@endif

@if (count($grupos) > 0 )

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Ativo</th>

      </tr>
    </thead>
    <tbody>

      @foreachIndexed( $grupos as $grupo )
        <tr class="{{ ($grupo->ativo) ? 'grupo-ativo' : 'grupo-inativo'}}">
          <th scope="row" title="{{ $grupo->id }}">@index</th>
          <td
          @unless ($grupo->ativo)
          class="text-muted"
          @endunless
          >{{ $grupo->nome }}</td>
          <td class="{{ ($grupo->ativo) ? 'text-success' : 'text-danger'}}" grupo="{{ $grupo->nome }}">
            {!! Form::open(['method' => 'PATCH',
                'action' => ['GrupoInscricaoController@ativacao',$grupo->id],
                'nomeGrupo' => $grupo->nome,
                'id' => 'form-ativacao-id-' . $grupo->id,
                'class'=>'button-link form-ativacao']) !!}
              {{ Form::hidden('id', $grupo->id ) }}
              @if( $grupo->ativo)
                {!! Form::submit('1',['class'=>'button-link', 'data-toggle'=>'modal','data-target'=>'#modalWarning']) !!}
                <!--<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>-->
              @else
                {!! Form::submit('0',['class'=>'button-link', 'data-toggle'=>'modal','data-target'=>'#modalWarning']) !!}
                <!--<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>-->
              @endif

            {!! Form::close() !!}
          </td>

        </tr>
      @endforeachIndexed

    </tbody>
  </table>

@else
  Nenhum registro.
@endif

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary btn-warning" data-toggle="modal" data-target="#modalWarning">
    Modal Warning
</button>
-->
<!-- Modal -->
<div class="modal fade modal-warning bs-example-modal-sm" id="modalWarning" tabindex="-1"
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
  $('div.alert').not('.alert-important').delay(3000).slideUp(300);

  $('#radio-exibir-inativos').change( function() {
    if( $(this).is(':checked')){
      $('tr.grupo-inativo').show(200);
    } else{
      $('tr.grupo-inativo').hide(200);
    }
  });

var confirmacao = false;
$('.form-ativacao').submit( function(e){
  console.log( confirmacao);
  if( confirmacao){return;}
  e.preventDefault();

  var isAtivo = $(this).find('.button-link').val();
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
