@extends( 'evento.template-evento')

@section('nivel2')<li class="active">{{$evento->titulo}}</li>@stop


@section('content')
<h3>
    {{$evento->titulo}}
</h3>

{{--
<iframe width="90%" height="400px" frameborder="0" scrolling="no"
    marginheight="0" marginwidth="0"
    src="https://maps.google.com/maps?q={{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}&hl=pt;z=14&amp;output=embed">
</iframe><br />
<a href="https://maps.google.com/maps?q={{$local->localizacaoJson->latitude}},{{$local->localizacaoJson->longitude}}&hl=es;z=14&amp;output=embed"
    target="_blank">Ver mapa maior</a>
    --}}
@endsection
