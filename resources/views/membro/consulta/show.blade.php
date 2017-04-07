@extends( 'membro.template-membro')
@section('nivel2')<li><a href="/membros/consulta">Consulta de Membros</a></li>@stop
@section('nivel3')<li>{{$consulta->titulo}}</li>@stop

@section('titulo', 'Consulta: ' . $consulta->titulo)

@section('content')

    <div class="dados-consulta">
        <p>Título da consulta: <span>{{$consulta->titulo}}</span></p>
    </div>
    <p>Total de membros encontrados: <strong>{{$membros->count()}}</strong></p>
    <div class="tabela">
        <table class="table table-striped table-hover consulta-membros">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Grupo Caseiro</th>
                    <th>Discipulador</th>
                    <th>Idade</th>
                    <th>Região</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>

                @foreach( $membros as $membro )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/membro/{{$membro->id}}/edit">{{$membro->nome}}</a></td>
                    @if($membro->grupo)
                        <td>{{$membro->grupo->nome}}</td>
                    @else
                        <td class="text-muted">Sem grupo</td>
                    @endif

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

@endsection
