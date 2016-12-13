@extends( 'membro.template-membro')

@section('nivel3', '<li class="active">Cadastrar novo membro</li>')

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

    <script type="text/javascript">
        $.datetimepicker.setLocale('pt-BR');
        $('#data_nascimento').datetimepicker({
            format: 'd/m/Y',
            timepicker:false,
            mask:'99/99/9999',

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
