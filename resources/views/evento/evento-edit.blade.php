@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Editando: {{$evento->titulo}}</li>@stop


@section('content')
    {{ Form::model($evento, ['method' => 'PATCH'
        , 'route'=>['evento.update',$evento->id]
        , 'name'=>'eventoForm'
        ]) }}
        @include('evento.evento-form',[
            'btnAction'=>'Atualizar Evento',
            'edicao'=>true,
        ])
    {{ Form::close() }}
    @include('evento.modal-exclusao', ['evento'=>$evento])
@endsection
