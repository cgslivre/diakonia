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

    @foreach ($validacao->errors as $error)
        <div class="alert bg-danger alert-important">
          <i class="fa fa-ban" aria-hidden="true"></i> {{$error}}
        </div>
    @endforeach

    @foreach ($validacao->warnings as $warning)
        <div class="alert bg-warning alert-important">
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$warning}}
        </div>
    @endforeach

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
        <a href="{{URL::route('musica.escala.edit',$escala->id)}}" class="btn btn-primary">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Alterar escala
        </a>
        {{ Form::open(['route' => ['musica.escala.publicar', $escala->id]
            , 'method' => 'post']) }}
        <button class="btn btn-success">
            <i class="fa fa-check-circle" aria-hidden="true"></i> Confirmar publicação da escala
        </button>
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')

@endsection
