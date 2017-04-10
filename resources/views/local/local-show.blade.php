@extends( 'local.template-local')

@section('nivel2')<li class="active">{{$local->nome}}</li>@stop


@section('content')
<h3>
    {{$local->nome}}
</h3>
<p><strong>Identificador:</strong> {{$local->slug}}</p>
<p><strong>Endereço:</strong> {{$local->endereco}}</p>
<p><strong>Cidade:</strong> {{$local->cidade}}/{{$local->uf}}</p>


<iframe width="90%" height="400px" frameborder="0" scrolling="no"
    marginheight="0" marginwidth="0"
    src="https://maps.google.com/maps?q={{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}&hl=pt;z=14&amp;output=embed">
</iframe><br />
<a href="https://maps.google.com/maps?q={{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}&hl=es;z=14&amp;output=embed"
    target="_blank">Ver mapa maior</a>
@endsection
