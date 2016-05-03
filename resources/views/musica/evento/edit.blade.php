@extends( 'musica.template-musica')

@section('nivel2', '<li class="active">Editar Evento</li>')


@section('content')

    {{ Form::open(array('url' => 'musica/evento', 'class'=> 'form-horizontal',
        'name'=>'musicaEventoForm')) }}
        @include('musica.evento.form',[
            'submitButton'=>'Editar evento' 
            ])
    {{ Form::close() }}


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
@endsection
</div>
