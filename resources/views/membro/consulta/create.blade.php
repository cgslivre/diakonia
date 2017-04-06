@extends( 'membro.template-membro')
@section('nivel2', '<li><a href="/membros/consulta">Consulta de Membros</a></li>')
@section('nivel3', '<li>Nova Consulta</li>')

@section('titulo', 'Nova Consulta')

@section('content')
    {{ Form::model($consulta, ['method' => 'POST'
        , 'action'=>['membro\ConsultaController@store']
        , 'name'=>'consultaMembroForm'
        ]) }}
        @include('membro.consulta.form',['btnAction'=>'Criar Pesquisa'])
    {{ Form::close() }}
    <hr/>


@endsection

@section('scripts')
<script>
    $(".select-regioes").select2({
      placeholder: "Selecione uma ou mais opções",
      allowClear: true
    });
    $(".select-grupos").select2({
      placeholder: "Selecione um ou mais grupos caseiros",
      allowClear: true
    });

    $('input.titulo').on('input',function(){
        $('input.slug').val(slug($('input.titulo').val(),{lower: true}));
    });
</script>
@endsection
