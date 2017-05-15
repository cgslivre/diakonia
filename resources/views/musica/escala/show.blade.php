{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')<li class="active">Escala de música</li>@stop

@section('content')
    @include('musica.escala.evento-detalhe',['evento'=>$escala->evento])
    <hr/>

    <div class="escala publicacao">

    <p>Publicada em: <strong>
        {{Date::parse($evento->publicado_em)
            ->format('j \d\e F \d\e Y, G\hi')}}</p>
    </strong>
    <h3>Serviços definidos:</h3>
    <div class="tarefa lider">
        <div class="servico">
            <img alt="Líder"
            src="{{URL('img/musica/lider.svg')}}" class="servico-icon"/>
            <span class="text-center descricao-servico no-margin">
                Líder
            </span>
        </div>
        <div class="colaborador">
            <div class="avatar">
                <img src="{{ URL($escala->lider->user->avatarPathSmall()) }}"
                     alt="{{$escala->lider->user->name}}" />
            </div>
            {{$escala->lider->user->name}}
        </div>
    </div>
    @foreach ($escala->tarefas->sortBy('servico_id')->groupBy('servico_id') as $servico_id => $tarefas)
        <div class="tarefa {{$loop->index % 2 == 0 ? 'even' : 'odd'}}">
            @php
                $servico = $servicos->where('id',$servico_id)->first();
            @endphp
            <div class="servico">
                <img alt="{{ $servico->descricao }}"
                src="{{URL($servico->iconeSmall)}}" class="servico-icon"/>
                <span class="text-center descricao-servico no-margin">
                    {{ $servico->descricao }}
                </span>
            </div>
            @foreach ($tarefas as $tarefa)
                <div class="colaborador">

                <div class="avatar">
                    <img src="{{ URL($tarefa->colaborador->user->avatarPathSmall()) }}"
                         alt="{{$tarefa->colaborador->user->name}}" />
                </div>
                {{$tarefa->colaborador->user->name}}
                </div>

            @endforeach
        </div>
    @endforeach
    </div>
    <hr/>
    <div class="text-center">
        @can('musica-escala-remove')
            <button class="btn btn-danger" type="button"
                    data-toggle="modal" data-target="#modalRemoverEscala">
                Remover escala
            </button>
        @endcan
    </div>

    @component('layouts.geral.modal-exclusao')
        @slot('modalId')modalRemoverEscala @endslot
        @slot('modalTitle')Remover Escala de Música @endslot
        @slot('deleteRoute')
            musica.escala.destroy
        @endslot
        @slot('deleteId'){{$escala->id}} @endslot
        <h4>Deseja remover a escala?</h4>
        @if ($escala->publicada)
            <p><strong>Atenção: </strong>A escala já foi publica.</p>
                <p>
            Os participantes da escala receberão um email informando o cancelamento da
            escala</p>
        @endif
    @endcomponent

@endsection

@section('scripts')

@endsection
