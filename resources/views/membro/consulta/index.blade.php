@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Consultas de Membros</li>')
@section('titulo', 'Consultas de Membros')

@section('content')
<div class="consultas-membros">
    <h3>Consultas Públicas</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Atualizada em</th>
                <th>Atualizada por</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $consultasPublicas as $consulta )
            <tr>
                <td><a href="/membros/consulta/{{$consulta->slug}}">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                    {{$consulta->titulo}}</a></td>
                <td>{{$consulta->updated_at->format('d/M/Y - H\\hi\\m\\i\\n')}}</td>
                <td>{{$consulta->modifiedBy->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="consultas-membros">
    <h3>Minha consultas</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Atualizada em</th>
                <th class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $consultasPrivadas as $consulta )
            <tr>
                <td><a href="/membros/consulta/{{$consulta->slug}}"><i class="fa fa-search-plus" aria-hidden="true"></i>
                {{$consulta->titulo}}</a></td>
                <td>{{$consulta->updated_at->format('d/M/Y - H\\hi\\m\\i\\n')}}</td>
                <td class="text-center"><a href="{{ route('consulta.edit', [$consulta->id]) }}"
                    class="btn btn-info">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
