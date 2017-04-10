@extends( 'local.template-local')

@section('nivel2')<li class="active">Criar novo local</li>@stop


@section('content')
    {{ Form::model($local, ['method' => 'POST'
        , 'route'=>'local.store'
        , 'name'=>'localForm'
        ]) }}
        @include('local.local-form',[
            'btnAction'=>'Criar Local',
            'edicao'=>false,
        ])
    {{ Form::close() }}
@endsection
