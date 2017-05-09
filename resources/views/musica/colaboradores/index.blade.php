@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.colaborador.index')}}">Equipe de Música</a></li>
@stop

@section('content')
    @foreach($servicos as $servico)
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><img src="{{URL($servico->iconeSmall)}}" class="img-servico-index"
                    alt="{{ $servico->descricao }}" /> {{ $servico->descricao }}</h4>
            </div>
            <div class="panel-body">
                @forelse( $servico->colaboradores as $colaborador )
                    @include('musica.colaboradores.card-colaborador-musica',
                        ['colaborador'=>$colaborador])
                @empty
                    Nenhum colaborador cadastrado.
                @endforelse
            </div>
        </div>
    @endforeach

    <div class="fixed-action-btn">
        <a href="{{ route('musica.colaborador.create') }}" title="Adicionar colaborador"
        class="btn-floating btn-large btn-primary">
        <i class="fa fa-user-plus fa-2x"></i>
    </a>
@endsection

@section('scripts')

@endsection
