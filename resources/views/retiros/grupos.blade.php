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
          <td class="{{ ($grupo->ativo) ? 'text-success' : 'text-danger'}}">
            @if( $grupo->ativo)
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            @else
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            @endif
          </td>
        </tr>
      @endforeachIndexed

    </tbody>
  </table>

@else
  Nenhum registro.
@endif
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
</script>
@endsection
