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
                <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $locais as $local )
            <tr>
                <td><a href="{{ route('local.show', [$local->slug]) }}">
                    {{$local->nome}}</a></td>
                <td>{{$local->slug}}</td>
                <td>{{$local->endereco}}</td>
                <td>{{$local->cidade}}/{{$local->uf}}</td>
                <td class="text-center">
                    @if( $local->localizacao)
                    <a href="http://www.google.com/maps/place/{{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}" target="_blank">
                        <i class="fa fa-map-o" aria-hidden="true"></i>
                    </a>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('local.edit', [$local->id]) }}"
                    class="btn btn-info">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a href="{{ route('local.create') }}" title="Criar um novo local"
        class="btn-floating btn-large btn-primary">
        <i class="fa fa-plus fa-2x"></i>
    </a>
@endsection
