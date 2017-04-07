
@extends( 'musica.template-musica')

@section('nivel2')<li class="active"><a href="/musica/evento">Eventos</a></li>@stop
@section('nivel3')<li class="active">Remover Evento</li>@stop

    <?php
        use Jenssegers\Date\Date;
        Date::setLocale('pt_BR');?>
@section('content')

    <div class="text-center name-title-2 alert alert-warning alert-important">
        Tem certeza que deseja excluir o evento <span class="destaque">"{{$evento->titulo}}"</span>?
    </div>

    <hr/>

    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Título do Evento:</div>
        <div class="col-md-8 text-left">{{$evento->titulo}}</div>
    </div>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Data do Evento:</div>
        <div class="col-md-8 text-left">
            <?php echo Date::parse($evento->hora)->format('l, j \\d\\e F \\d\\e Y \\à\\s H\\hi'); ?>
            ({{ $evento->hora->diffForHumans()}})
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Criado por:</div>
        <div class="col-md-8 text-left">{{$evento->createBy->name}}</div>
    </div>

    <div class="form-group">

      <div class="col-sm-offset-2 col-sm-10">
          <div class="btn-group">

              {{ Form::model($evento, ['method' => 'DELETE' , 'route'=>['musica.evento.destroy',$evento->id],
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

    </div>

@endsection
