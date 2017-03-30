@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Resultado da Consulta</li>')
@section('nivel3', '<li>'. $consulta->titulo.'</li>')

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
                    <th>Idade</th>
                    <th>Região</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach( $membros as $membro )
                <tr>
                    <td>{{$i++}}</td>
                    <td><a href="/membro/{{$membro->id}}/edit">{{$membro->nome}}</a></td>
                    @if($membro->grupo)
                        <td>{{$membro->grupo->nome}}</td>
                    @else
                        <td class="text-muted">Sem grupo</td>
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
