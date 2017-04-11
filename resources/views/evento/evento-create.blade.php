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
    </script>
@endsection
