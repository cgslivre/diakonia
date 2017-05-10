{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')<li class="active">Editar escala de música</li>@stop

@section('content')
    @include('musica.escala.evento-detalhe',['evento'=>$evento])

    <div class="escala-musica">
        <div class="row add-servico">
            <div class="linha-servico">

                <div class="col-md-1 text-center no-margin">
                    <img alt="Líder" src="{{URL('img/musica/lider.svg')}}" class="lider-icon"/>
                    <p class="text-center descricao-servico no-margin">
                        Líder
                    </p>
                </div>
                <div class="col-md-8 no-margin">
                    <div class="escala-colaborador">
                        <div class="avatar">
                            <img src="{{URL($escala->lider->user->avatarPathSmall())}}" alt="" />
                        </div>
                        <div class="dados">
                            <p class="nome">{{$escala->lider->user->name}}</p>
                            <button class="btn btn-primary" type="button"
                            data-toggle="modal" data-target="#modalLider">
                             Alterar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($servicos as $servico)
            <div class="row add-servico">
                <div class="linha-servico">
                    <div class="col-md-1 text-center no-margin">
                        <img alt="{{ $servico->descricao }}"
                        src="{{URL($servico->iconeSmall)}}"/>
                        <p class="text-center descricao-servico no-margin">
                            {{ $servico->descricao }}
                        </p>
                    </div>
                    <div class="col-md-8 no-margin">
                        @if( count($servico->colaboradores) > 0 )
                            <a href="{{ route('musica.escala.tarefa.add',[$escala->id, $servico->id]) }}"
                                title="Adicionar serviço" class="btn-floating btn-large btn-primary">
                            <i class="fa fa-user-plus fa-2x"></i>
                        </a>
                        @else
                            Nenhum colaborador para este serviço.
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    @include('musica.escala.modal-lider',[
        'lideres'=>$lideres
        ,'escala'=>$escala
        ,'evento'=>$evento])


@endsection

@section('scripts')

@endsection
