@extends( 'local.template-local')

@section('nivel2')<li class="active">{{$local->nome}}</li>@stop


@section('content')
<h3>
    {{$local->nome}}
</h3>
<p><strong>Identificador:</strong> {{$local->slug}}</p>
<p><strong>Cidade:</strong> {{$local->cidade}}/{{$local->uf}}</p>
@endsection
