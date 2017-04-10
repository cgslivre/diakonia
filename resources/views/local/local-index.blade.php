@extends( 'local.template-local')

@section('nivel2')<li class="active">Lista de Locais</li>@stop


@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Identificador</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Mapa</th>
                <th class="text-center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $locais as $local )
            <tr>
                <td><a href="{{ route('local.show', [$local->id]) }}">
                    {{$local->nome}}</a></td>
                <td>{{$local->slug}}</td>
                <td>{{$local->endereco}}</td>
                <td>{{$local->cidade}}/{{$local->uf}}</td>
                <td><a href="http://www.google.com/maps/place/{{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}" target="_blank">
                    <i class="fa fa-map-o" aria-hidden="true"></i>
                </a></td>
                <td class="text-center">
                    <a href="{{ route('local.edit', [$local->id]) }}"
                    class="btn btn-info">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
