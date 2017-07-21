@extends( 'musica.template-musica')

@if ($colaborador)
    @section('nivel2')
        <li class="active"><a href="{{route('musica.eventos', $colaborador->id)}}">
        Minhas escalas </a></li>
    @stop
@else
@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop
@endif



@section('content')
    @if ($colaborador)
    <h4 class="na-escala">Escalas de <strong>{{$colaborador->user->name}}</strong></h4>
    @endif
    <button class="btn btn-default" data-toggle="modal" data-target="#modalAjudaEscala">
        <i class="fa fa-question-circle" aria-hidden="true"></i> Ajuda
    </button>



    <h2>Eventos nos próximos 30 dias</h2>
    @forelse ($eventos30Dias as $evento)
        @include('musica.escala.card-evento',[
            'evento'=>$evento,
            'colaborador'=>$colaborador,
        ])
    @empty
        @if ($colaborador)
            Não está escalado(a) em nenhum evento nos próximos 30 dias
        @else
            Nenhum evento
        @endif
    @endforelse
    <h2>Eventos após 30 dias</h2>
    @forelse ($eventosApos30Dias as $evento)
        @include('musica.escala.card-evento',[
            'evento'=>$evento,
            'colaborador'=>$colaborador,
        ])
    @empty
        @if ($colaborador)
            Não está escalado(a) em nenhum evento após 30 dias
        @else
            Nenhum evento
        @endif
    @endforelse

    @include('musica.escala.modal-remover-impedimento')
    @include('musica.escala.modal-registrar-impedimento')
    @include('musica.escala.modal-ajuda')




@endsection

@section('scripts')
<script type="text/javascript">

$(".criar-impedimento").click(function(){
    var id = $(this).attr("escala");

    $('#c_imp_dt_evento').html($(this).attr("data-evento"));
    $('input#imp_colaborador_id').val($(this).attr("colaborador"));
    console.log($(this).attr("colaborador"));
    console.log($('input#imp_colaborador_id').val());
    var url = $('#frmCriarImpedimento').attr('action');
    var m = "musica";
    url = url.substr(0,url.lastIndexOf(m)+m.length) + "/escala/" + id + "/impedimento/create";
    //console.log(url);
    $('#frmCriarImpedimento').attr('action',url);
    $('#modalRegistrarImpedimento').modal('toggle');
});

$(".remover-impedimento").click(function(){
    var id = $(this).attr("escala");

    $('#c_imp_dt_evento').html($(this).attr("data-evento"));
    $('input#imp_colaborador_id_rem').val($(this).attr("colaborador"));
    var url = $('#frmRemoverImpedimento').attr('action');
    var m = "musica";
    url = url.substr(0,url.lastIndexOf(m)+m.length) + "/escala/" + id + "/impedimento/destroy";
    //console.log(url);
    $('#frmRemoverImpedimento').attr('action',url);
    $('#modalRemoverImpedimento').modal('toggle');
});

</script>

@endsection
