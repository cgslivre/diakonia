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
    @foreach ($escala->tarefas->sortBy('servico_id')->groupBy('servico_id') as $servico_id => $tarefas)
        <div class="tarefa {{$loop->index % 2 == 0 ? 'even' : 'odd'}}">
            @php
                $servico = $servicos->where('id',$servico_id)->first();
            @endphp
            <div class="servico">
                <img alt="{{ $servico->descricao }}"
                src="{{URL($servico->iconeSmall)}}" class="servico-icon"/>
                <span class="text-center descricao-servico no-margin">
                    {{ $servico->descricao }}:
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
