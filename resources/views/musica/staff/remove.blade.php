@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/staff">Equipe</a></li>')
@section('nivel3', '<li class="active">Remover membro da equipe de música</li>')


@section('content')

    <div class="text-center name-title-2 alert alert-warning alert-important">
        Tem certeza que deseja remover <span class="destaque">"{{$staff->user->name}}"</span> da equipe de música?
    </div>


    <div class="form-group text-center">
          <div class="btn-group">
              {{ Form::model($staff, ['method' => 'DELETE' , 'route'=>['musica.staff.destroy',$staff->id],
                  'id'=>'deleteForm']) }}
              <a class="btn btn-success" href="{{URL::previous()}}">
                  <i class="fa fa-undo" aria-hidden="true"></i> Não quero remover
              </a>
              <button
                 class="btn btn-danger">
                  <i class="fa fa-trash" aria-hidden="true"></i> Confirmar exclusão
              </button>
              {{ Form::close() }}
          </div>
    </div>
@endsection
