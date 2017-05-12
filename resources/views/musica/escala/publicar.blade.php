{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')
    <li class="active">
        <a href="{{URL::route('musica.escala.edit',$escala->id)}}">
        Escala dia: {{
        Date::parse($escala->evento->data_hora_inicio)->format('j/M/Y')}}</a></li>
@stop
@section('nivel4')
    <li class="active">
        Publicar escala
    </li>
@stop

@section('content')

    <div class="escala publicacao">
        <h3>Escala para o dia {{Date::parse($escala->evento->data_hora_inicio)->format('j/M/Y')}}</h3>
    </div>

    @foreach ($validacao->errors as $error)
        <p>{{$error}}</p>
    @endforeach

    @foreach ($validacao->warnings as $warning)
        <p>{{$warning}}</p>
    @endforeach

@endsection

@section('scripts')

@endsection
