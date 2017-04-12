@extends( 'evento.template-evento')

@section('nivel2')<li class="active">Editando: {{$evento->titulo}}</li>@stop


@section('content')
    {{ Form::model($evento, ['method' => 'PATCH'
        , 'route'=>['evento.update',$evento->id]
        , 'name'=>'eventoForm'
        ]) }}
        @include('evento.evento-form',[
            'btnAction'=>'Atualizar Evento',
            'edicao'=>true,
        ])
    {{ Form::close() }}
    @include('evento.modal-exclusao', ['evento'=>$evento])
@endsection

@section('scripts')
    <script type="text/javascript">        

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
