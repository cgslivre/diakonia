{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')<li class="active">Criar escala de música</li>@stop

@section('content')
    @include('musica.escala.evento-detalhe',['evento'=>$evento])

    <button class="btn btn-primary" type="button"
            data-toggle="modal" data-target="#modalLider">
        <i class="fa fa-street-view" aria-hidden="true"></i> Líder
    </button>

    @include('musica.escala.modal-lider',[
        'lideres'=>$lideres
        ,'evento'=>$evento])


@endsection

@section('scripts')

@endsection
