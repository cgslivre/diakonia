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


</div>

    @section('scripts')
    <script>
        var post = {!! $membro !!};
    </script>

    <script src="{{ url('js/membro/app-membro-module.min.js') }}"></script>

    <script type="text/javascript">
        $.datetimepicker.setLocale('pt-BR');
        $('#data_nascimento').datetimepicker({
            format: 'd/m/Y',
            timepicker:false,
            mask:'99/99/9999',
            value: '25/6/1983',
            closeOnDateSelect:true,
            onChangeDateTime:function(dp,$input){
                console.log($input.val());
                var dia = moment($input.val(),'D/M/YYYY', true);
                var agora = moment();
                //console.log(dia);
                if( dia.isValid()){
                    var idade = agora.diff(dia,'years');
                    if( idade > 1 ){
                        $('.idade').text(idade + ' anos.');
                    }
                    if( idade == 1 ){
                        $('.idade').text('Um ano.');
                    }
                    if( idade <= 0 ){
                        $('.idade').text('');
                    }
                    //console.log();
                }else{
                    console.log('opa');
                }
            }
        });
    </script>

    @endsection

@endsection
