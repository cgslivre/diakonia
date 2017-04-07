@extends( 'musica.template-musica')

@section('nivel2')<li class="active"><a href="/musica/staff">Equipe</a></li>@stop


@section('content')

    @foreach($servicos as $servico)
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><img src="{{URL($servico->iconeSmall)}}" class="img-servico-index"
                    alt="{{ $servico->descricao }}" /> {{ $servico->descricao }}</h4>
            </div>
            <div class="panel-body">
                @forelse( $servico->staff as $staff )
                    @include('musica.staff.card-staff-musica',['staff'=>$staff])
                @empty
                    Nenhum membro cadastrado.
                @endforelse
            </div>
        </div>
    @endforeach

@endsection

@section('scripts')

@endsection
