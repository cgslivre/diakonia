@extends( 'local.template-local')

@section('nivel2')<li class="active">Editando: {{$local->nome}}</li>@stop


@section('content')
    {{ Form::model($local, ['method' => 'PATCH'
        , 'route'=>['local.update',$local->id]
        , 'name'=>'localForm'
        ]) }}
        @include('local.local-form',[
            'btnAction'=>'Atualizar Local',
            'edicao'=>true,
        ])
    {{ Form::close() }}
    {{--@include('membro.consulta.modal-exclusao', ['consulta'=>$consulta])--}}
@endsection
