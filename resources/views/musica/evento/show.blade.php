{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2', '<li class="active">Visualização do Evento</li>')


@section('content')

    <div class="btn-group pull-right" role="group" aria-label="Default button group">
        <a type="button" href="{{URL::action('MusicaEventoController@edit',$evento->id)}}"
            class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Editar Evento</a>
        <a href="{{ URL::route('musica.evento.remover', $evento->id) }}"
               class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Remover evento</a>
    </div>
    <div class="clearfix"></div>
    <hr/>

    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Título do Evento:</div>
        <div class="col-md-8 text-left">{{$evento->titulo}}</div>
    </div>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Data do Evento:</div>
        <div class="col-md-8 text-left">
            {{ Date::parse($evento->hora)->format('l, j \\d\\e F \\d\\e Y \\à\\s H\\hi') }}
            ({{ $evento->hora->diffForHumans()}})
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-2 text-right destaque">Criado por:</div>
        <div class="col-md-8 text-left">{{$evento->createBy->name}} ({{ Date::parse($evento->created_at)->format('l, j \\d\\e F \\d\\e Y \\à\\s H\\hi') }})</div>
    </div>
@endsection



@section('scripts')
@endsection
