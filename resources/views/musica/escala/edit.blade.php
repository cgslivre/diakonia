{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')<li class="active">Editar escala de música</li>@stop

@section('content')
    @include('musica.escala.evento-detalhe',['evento'=>$evento])
    <hr/>
    <div class="escala-musica">
        <div class="row add-servico">
            <div class="linha-servico lider">

                <div class="col-md-2 text-center no-margin">
                    <img alt="Líder" src="{{URL('img/musica/lider.svg')}}" class="lider-icon"/>
                    <p class="text-center descricao-servico no-margin">
                        Líder
                    </p>
                </div>
                <div class="col-md-8 no-margin">
                    @include('musica.escala.card-colaborador-musica',
                        ['colaborador'=>$escala->lider ,
                         'removerButton' => false])
                    <button class="btn btn-primary btn-add-colaborador" type="button"
                    data-toggle="modal" data-target="#modalLider">
                    Alterar
                </button>
                </div>
            </div>
        </div>
        @foreach ($servicos as $servico)
            <div class="row add-servico">
                <div class="linha-servico">
                    <div class="col-md-2 text-center no-margin">
                        <img alt="{{ $servico->descricao }}"
                        src="{{URL($servico->iconeSmall)}}"/>
                        <p class="text-center descricao-servico no-margin">
                            {{ $servico->descricao }}
                        </p>
                    </div>
                    <div class="col-md-8 no-margin">
                        @forelse ($escala->tarefas->where('servico_id',$servico->id) as $tarefa)
                            @include('musica.escala.card-colaborador-musica',
                                ['colaborador'=>$tarefa->colaborador,
                                 'tarefa'=>$tarefa,
                                 'removerButton' => true])
                        @empty

                        @endforelse
                        @if( count($servico->colaboradores) > 0 )
                                <a href="{{ route('musica.escala.tarefa.add',[$escala->id, $servico->id]) }}"
                                    title="Adicionar colaborador" class="btn btn-primary btn-add-colaborador">
                                <i class="fa fa-user-plus"></i> Adicionar
                                </a>
                        @else
                            <p style="line-height: 128px;">Nenhum colaborador para este serviço.</p>
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
