@extends( 'usuario.template-usuario')

@section('nivel2', '<li class="active">Grupos Caseiros</li>')


@section('content')
  {!! Form::open(array('url'=>'/membro/grupo-caseiro','class'=>'form-inline')) !!}

    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
        {!! Form::label('nome', 'Nome do grupo:' , ['class'=>'control-label'])!!}
        @if ($errors->has('nome'))
            <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
            </span>
        @endif
        {!! Form::text('nome', null ,['class'=>'form-control','placeholder'=>'Nome do grupo'])!!}

        {!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}

    </div>
  {!! Form::close() !!}

<hr class="divider">



@if (count($grupos) > 0 )

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
      </tr>
    </thead>
    <tbody>

      @foreachIndexed( $grupos as $grupo )

        <tr class="grupo-ativo">
          <th scope="row" title="{{ $grupo->id }}">@index</th>
          <td>{{ $grupo->nome }}</td>
        </tr>
      @endforeachIndexed

    </tbody>
  </table>

@else
  Nenhum registro.
@endif

@endsection

@section('scripts')

@endsection
