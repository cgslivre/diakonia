@extends( 'membro.template-membro')

@section('nivel2', '<li class="active">Consultas de Membros</li>')
@section('titulo', 'Consultas de Membros')

@section('content')
<div class="consultas-publicas">
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
                <td><a href="/membros/consulta/{{$consulta->slug}}">{{$consulta->titulo}}
                     <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                <td>{{$consulta->updated_at->format('d/M/Y - H\\hi\\m\\i\\n')}}</td>
                <td>{{$consulta->modifiedBy->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
