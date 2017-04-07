@extends( 'membro.template-membro')

@section('nivel2')<li class="active">Grupos Caseiros</li>@stop


@section('content')
    @can('membro-grupo-create')
  {!! Form::open(array('url'=>'/membro/grupo-caseiro','class'=>'form-inline')) !!}
    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
        {!! Form::label('nome', 'Nome do grupo:' , ['class'=>'control-label'])!!}

        {!! Form::text('nome', null ,['class'=>'form-control','placeholder'=>'Nome do grupo'])!!}
        @if ($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif

        {!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}

    </div>
  {!! Form::close() !!}
    @endcan

<hr class="divider">



@if (count($grupos) > 0 )

  <table class="table table-striped table-hover grupo-caseiro">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        @can('membro-grupo-remove')<th>Remover</th>@endcan
      </tr>
    </thead>
    <tbody>
      @foreach( $grupos as $grupo )

        <tr class="grupo-ativo">
          <th scope="row" title="{{ $grupo->id }}">{{$loop->iteration}}</th>
          <td class="nome-grupo">{{ $grupo->nome }}</td>
          @can('membro-grupo-remove')<td>
              {{ Form::open([ 'method'  => 'delete',
                  'route' => [ 'membros.grupo-caseiro.remover', $grupo->id ] ]) }}
              {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',
                  ['class' => 'btn btn-danger','type'=>'submit']) }}
              {{ Form::close() }}
          </td>@endcan
        </tr>

      @endforeach
    </tbody>
  </table>

@else
  Nenhum registro.
@endif

<div id="modalEditGrupoCaseiro" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            {!! Form::open(array('url'=>'/membro/grupo-caseiro/','id'=>'frmAtualizarGrupo')) !!}
            <div class="modal-header modal-header-info">
                <h5 class="modal-title">Alterar nome do Grupo Caseiro</h4>
            </div>
            <div class="modal-body">

                {!! Form::text('nomeEdicao', null ,
                    ['class'=>'form-control','placeholder'=>'Nome do grupo','id'=>'nomeEdicao'])!!}
            </div>
            <div class="modal-footer">
                {!! Form::submit('Atualizar',['class'=>'btn btn-primary']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $("td.nome-grupo").click(function(){
            var nomeGrupo = $(this).html();
            $('#nomeEdicao').val(nomeGrupo);

            var id = $(this).prev().attr("title");

            var url = $('#frmAtualizarGrupo').attr('action');
            var gc = "grupo-caseiro";
            url = url.substr(0,url.lastIndexOf(gc)+gc.length) + "/" + id;
            console.log(url);
            $('#frmAtualizarGrupo').attr('action',url);

            $('#modalEditGrupoCaseiro').modal('toggle');
        });
    </script>
@endsection
