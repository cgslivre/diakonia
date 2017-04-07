@extends( 'membro.template-membro')

@section('nivel3')
    <li class="active">Cadastrar novo membro</li>
@stop

@section('content')
<div class="container-fluid" ng-app="membrosRecord" ng-controller="membroCreateCtrl">
        {{ Form::open(array('url' => 'membro','files' => true, 'class'=> 'form-horizontal',
            'name'=>'membroForm')) }}
            @include('membro.form',[
                'userAvatar'=>'users/avatar/000-default-150px.jpg'
                , 'submitButton'=>'Cadastrar Membro'
                , 'regiao'=>null])
        {{ Form::close() }}

</div>
@endsection

@section('scripts')
    <script src="{{ url('js/membro/app-membro-module.min.js') }}"></script>

@endsection
