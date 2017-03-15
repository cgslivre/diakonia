@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Editar membro</li>')

@section('content')

<div class="container-fluid" ng-app="membrosRecord" ng-controller="membroEditCtrl as ctrl">
    {{ Form::model($membro, ['method' => 'PATCH' , 'action'=>['membro\MembroController@update',$membro->id]
        ,'files' => true, 'name'=>'membroForm'
        , 'class'=> 'form-horizontal']) }}
        @include('membro.form',[
            'readony'=>'readonly'
            , 'regiao'=>$membro->regiao
            , 'passwordForm'=>false])
    {{ Form::close() }}
    @include('membro.edit-relacionamentos')


</div>

    @section('scripts')
    <script>
        var post = {!! $membro !!};
    </script>

    <script src="{{ url('js/membro/app-membro-module.min.js') }}"></script>
    

    @endsection

@endsection
