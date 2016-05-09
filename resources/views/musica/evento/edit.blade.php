@extends( 'musica.template-musica')

@section('nivel2', '<li class="active"><a href="/musica/evento">Eventos</a></li>')
@section('nivel3', '<li class="active">Editar Evento</li>')


@section('content')
<div class="container-fluid" ng-app="musicaEventosRecord" ng-controller="musicaEventoEditCtrl">

    {{ Form::model($evento, ['method' => 'PATCH', 'action' => ['MusicaEventoController@update',$evento->id], 'class'=> 'form-horizontal',
        'name'=>'musicaEventoForm']) }}
        @include('musica.evento.form',[
            'submitButton'=>'Atualizar evento'
            ])
    {{ Form::close() }}
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.datetimepicker.setLocale('pt-BR');
        $('#hora').datetimepicker({
            format: 'j/n/Y G:i',
            minDate: 0,
            defaultTime:'10:00',
            closeOnDateSelect:true
        });
    </script>

    <script type="text/javascript">
        var post = {!! $evento !!};
    </script>

    <script src="{{ url('js/musica/app-musica-module.min.js') }}"></script>

@endsection
</div>
