@extends( 'material.template-material')

@section('nivel2')
    <li class="active"><a href="{{ route('material.ensino.index') }}">Currículo de Ensino</a></li>
@stop

@section('nivel3')
    <li class="active">Editando: {{$ensino->titulo}}</li>
@stop

@section('content')
    {{ Form::model($ensino, [
        'method' => 'PATCH'
        , 'route'=>['material.ensino.update',$ensino->id]
        , 'name'=>'ensinoForm'
        , 'files' => true
        ]) }}
        @include('material.ensino.ensino-form',[
            'submitButton'=>'Atualizar Ensino'
            , 'edicao'=>true
        ])
    {{ Form::close() }}
@endsection
@include('material.ensino.modal-exclusao', ['ensino'=>$ensino])

@section('scripts')


@endsection
