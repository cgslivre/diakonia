@extends( 'musica.template-musica')

@section('nivel2', '<li class="active">Criar Evento</li>')


@section('content')
<div class="container-fluid" ng-app="musicaEventosRecord" ng-controller="musicaEventoCreateCtrl">
    {{ Form::open(array('url' => 'musica/evento', 'class'=> 'form-horizontal',
        'name'=>'musicaEventoForm')) }}
        @include('musica.evento.form',[
             'submitButton'=>'Criar evento'
            ])
    {{ Form::close() }}
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.datetimepicker.setLocale('pt-BR');
        $('#hora').datetimepicker({
            format: 'j/n/Y G:i',
            //format: 'Y-n-j G:i',
            minDate: 0,
            defaultTime:'10:00',
            closeOnDateSelect:true
        });
    </script>
    <script src="{{ url('js/musica/app-musica-module.min.js') }}"></script>
@endsection
</div>
