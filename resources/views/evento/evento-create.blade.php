@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Criar novo evento</li>@stop


@section('content')
    {{ Form::model($evento, ['method' => 'POST'
        , 'route'=>'evento.store'
        , 'name'=>'eventoForm'
        ]) }}
        @include('evento.evento-form',[
            'btnAction'=>'Criar Evento',
            'edicao'=>false,
        ])
    {{ Form::close() }}
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#template-evento').on('change', function(){
            var val = this.value;
            $("input[name='titulo']").val(val);
        });

        $.datetimepicker.setLocale('pt-BR');
        $('#data_hora_inicio').datetimepicker({
            format: 'j/n/Y G:i',
            //format: 'Y-n-j G:i',
            minDate: 0,
            defaultTime:'10:00',
            closeOnDateSelect:true
        });
        $('#data_hora_fim').datetimepicker({
            format: 'j/n/Y G:i',
            //format: 'Y-n-j G:i',
            minDate: 0,
            defaultTime:'10:00',
            closeOnDateSelect:true
        });
    </script>
@endsection
