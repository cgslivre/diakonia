@extends( 'material.template-material')

@section('nivel2')
    <li class="active"><a href="{{ route('material.ensino.index') }}">Currículo de Ensino</a></li>
@stop

@section('nivel3')
    <li class="active">Adicionar Ensino ao Currículo</li>
@stop

@section('content')
    {{ Form::model($ensino, [
        'method' => 'POST'
        , 'route'=>'material.ensino.store'
        , 'name'=>'ensinoForm'
        , 'files' => true
        ]) }}
        @include('material.ensino.ensino-form',[
            'submitButton'=>'Adicionar Ensino'
            , 'edicao'=>false
        ])
    {{ Form::close() }}
@endsection

@section('scripts')


@endsection
