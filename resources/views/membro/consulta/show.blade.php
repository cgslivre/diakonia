@extends( 'membro.template-membro')
@section('nivel2')<li><a href="/membros/consulta">Consulta de Membros</a></li>@stop
@section('nivel3')<li>{{$consulta->titulo}}</li>@stop

@section('titulo', 'Consulta: ' . $consulta->titulo)

@section('content')

    <div class="dados-consulta">

        <p class="text-right">Total de membros encontrados: <strong>{{$total}}</strong></p>
        <?php $index = 1;?>
        @forelse ($membrosAgrupados as $grupo => $membros)
        <h4>Grupo Caseiro: <strong>{{$grupo}}</strong>
            <span class="count">total: <strong>{{count($membros)}}</strong></span>
        </h4>

        <div class="tabela">
            <table class="table table-striped table-hover consulta-membros">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Discipulador</th>
                        <th>Idade</th>
                        <th>Região</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach( $membros as $membro )
                    <tr>
                        <td>{{$index++}}</td>
                        <td><a href="/membro/{{$membro->id}}/edit">{{$membro->nome}}</a></td>


                        @if($membro->discipulador())
                            <td><a href="/membro/{{$membro->discipulador()->id}}/edit">{{$membro->discipulador()->nome}}</a></td>
                        @else
                            <td class="text-muted text-center"><i class="fa fa-ban" aria-hidden="true"></i></td>
                        @endif

                        <td title="{{$membro->data_nascimento->format('d/M/Y')}}">{{$membro->idade}}</td>
                        <td>{{$membro->regiao}}</td>
                        <td>{{$membro->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @empty
            <strong>Nenhum membro encontrado.</strong>
        @endforelse
    </div>

@endsection
