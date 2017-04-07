@extends( 'membro.template-membro')

@section('nivel2')<li class="active">Consultas de Membros</li>@stop
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
                <th class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
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
                <td class="text-center">
                    @if($consulta->created_by == Auth::user()->id)
                    <a href="{{ route('consulta.edit', [$consulta->id]) }}"
                    class="btn btn-info">Editar</a>
                @else
                    <a href="" class="text-muted btn disabled " role="button">Editar</a>
                @endif
                </td>
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
<div class="fixed-action-btn">
    <a href="{{ url('/membros/consulta/create') }}" title="Criar nova consulta"
    class="btn-floating btn-large btn-primary">
    <i class="fa fa-plus fa-2x"></i>
</a>
@endsection
