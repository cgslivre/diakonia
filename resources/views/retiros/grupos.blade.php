@extends( 'retiros.layout')

@section('titulo', 'Grupos de Inscritos')


@section('content')
<form class="form-inline">
<div class="form-group">
    <label for="nomeGrupo" class="control-label">Nome do Grupo:</label>
    <input type="email" class="form-control" id="nomeGrupo" placeholder="Nome do Grupo">
    <button type="submit" class="btn btn-primary">Adicionar</button>
</div>
</form>

@if (count($grupos) > 0 )

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Ativo</th>
      </tr>
    </thead>
    <tbody>

      @foreach( $grupos as $grupo )
        <tr>
          <th scope="row">{{ $grupo->id }}</th>
          <th>{{ $grupo->nome }}</th>
          <th>{{ $grupo->ativo }}</th>
        </tr>

      @endforeach

    </tbody>
  </table>

@else
  Nenhum registro.
@endif

@endsection
