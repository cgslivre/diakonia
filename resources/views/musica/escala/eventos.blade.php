@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop
@if ($colaborador)
    @section('nivel3')<li class="active">Minhas escalas </li>@stop
@endif


@section('content')
    @if ($colaborador)
    <p class="na-escala">Escalas de <strong>{{$colaborador->user->name}}</strong></p>
    @endif
    <div class="legenda">
        Legenda:
        <span class="sem-escala">
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Sem Escala
        </span>
        <span class="escala-criada">
            <i class="fa fa-cog" aria-hidden="true"></i> Escala salva (não publicada)
        </span>
        <span class="escala-publicada">
            <i class="fa fa-check-circle" aria-hidden="true"></i> Escala definida e publicada
        </span>
    </div>


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

    {{-- @include('musica.escala.modal-remover-impedimento',[
        'colaborador'=>$colaborador
        ,'escala'=>$evento->escala]) --}}
    @include('musica.escala.modal-registrar-impedimento')




@endsection

@section('scripts')
<script type="text/javascript">

$(".criar-impedimento").click(function(){
    // var nomeGrupo = $(this).html();
    // $('#nomeEdicao').val(nomeGrupo);
    //
    var id = $(this).attr("escala");

    $('#c_imp_dt_evento').html($(this).attr("data-evento"));
    $('#imp_colaborador_id').val($(this).attr("colaborador"));
    var url = $('#frmCriarImpedimento').attr('action');
    var m = "musica";
    url = url.substr(0,url.lastIndexOf(m)+m.length) + "/escala/" + id + "/impedimento/create";
    //console.log(url);
    $('#frmCriarImpedimento').attr('action',url);
    $('#modalRegistrarImpedimento').modal('toggle');
});
</script>

@endsection
