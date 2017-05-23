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
    <a data-toolbar="content-option" class="btn-toolbar btn-toolbar-primary"><i class="fa fa-cog"></i></a>

    <div id="toolbar-options" class="hidden">
       <a href="#" class="btn "><i class="fa fa-car"></i></a>
       <a href="#" class="btn "><i class="fa fa-plane"></i></a>
       <a href="#" class="btn "><i class="fa fa-bicycle"></i></a>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(".btn-toolbar").toolbar({
        content: '#toolbar-options',
        position: 'right',
        style: 'primary',
        event: 'click',
        hideOnClick: true,
    })
</script>


@endsection
