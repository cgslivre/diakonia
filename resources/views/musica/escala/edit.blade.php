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
                         <div class="alterar-lider">
                             <button class="btn btn-primary" type="button"
                             data-toggle="modal" data-target="#modalLider">
                             Alterar
                         </button>
                         </div>
                </div>
            </div>
        </div>
        @foreach ($servicos as $servico)
            <div class="row add-servico">
                <div class="linha-servico">
                    <div class="col-md-2 text-center no-margin">
                        <img alt="{{ $servico->descricao }}"
                        src="{{URL($servico->iconeSmall)}}" class="servico-icon"/>
                        <p class="text-center descricao-servico no-margin">
                            {{ $servico->descricao }}
                        </p>
                        @if( count($servico->colaboradores) > 0 )

                            <a href="{{ route('musica.escala.tarefa.add',[$escala->id, $servico->id]) }}"
                                title="Adicionar colaborador" class="btn-add-colaborador">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> </a>
                        @endif
                    </div>
                    <div class="col-md-10 no-margin">
                        @forelse ($escala->tarefas->where('servico_id',$servico->id) as $tarefa)
                            @include('musica.escala.card-colaborador-musica',
                                ['colaborador'=>$tarefa->colaborador,
                                 'tarefa'=>$tarefa,
                                 'removerButton' => true])
                        @empty
                            <p class="nenhum-escalado">Ninguém escalado para este serviço</p>
                        @endforelse

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
