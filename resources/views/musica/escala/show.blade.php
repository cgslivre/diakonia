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

@endsection

@section('scripts')

@endsection
