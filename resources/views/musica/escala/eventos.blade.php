@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active">Escalas de Música</li>
@stop

@section('content')
    <div class="legenda">
        Legenda:
        <span class="sem-escala">
            <i class="fa fa-circle" aria-hidden="true"></i> Sem Escala
        </span>
        <span class="escala-ok">
            <i class="fa fa-circle" aria-hidden="true"></i> Escala definida
        </span>
    </div>


    <h2>Eventos nos próximos 30 dias</h2>
    @forelse ($eventos30Dias as $evento)
        @include('musica.escala.card-evento',['evento'=>$evento])
    @empty
        Nenhum evento
    @endforelse
    <h2>Eventos após 30 dias</h2>
    @forelse ($eventosApos30Dias as $evento)
        @include('musica.escala.card-evento',['evento'=>$evento])
    @empty
        Nenhum evento
    @endforelse

@endsection

@section('scripts')



@endsection
