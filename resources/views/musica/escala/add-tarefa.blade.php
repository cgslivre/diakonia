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
        Date::parse($escala->evento->data_hora_inicio)->format('j/m/Y')}}</a></li>
@stop
@section('nivel4')
    <li class="active">
        Adicionar serviço à escala
    </li>
@stop

@section('content')
    @include('musica.escala.evento-detalhe',['evento'=>$escala->evento])
    <hr/>
    <h3>
        Selecionar colaborador
    </h3>
    <img alt="{{ $servico->descricao }}"
    src="{{URL($servico->iconeSmall)}}"/>
    <strong>
        {{$servico->descricao}}
    </strong>
    <hr/>
    @forelse ($servico->colaboradores->sortBy(function($col){
      return str_slug($col->user->name);}) as $colaborador)
        <div class="row add-servico-colaborador
            {{in_array($colaborador->id, $colaboradoresServico) ?
                 'escalado' : 'nao-escalado'}}">
            <div class="col-md-2">
                {{-- Dados do colaborador --}}
                <div class="colaborador-data">
                    <img src="{{ URL($colaborador->user->avatarPathSmall()) }}"
                    alt="{{ $colaborador->user->name }}" class="colaborador"/>
                    <div class="nome">{{ $colaborador->user->name }}</div>
                </div>
            </div>
            {{-- Dados de outras escalas --}}

            <div></div>
            {{-- Ações --}}
            <div class="tarefa-action">
                @if (!in_array($colaborador->id, $colaboradoresServico))
                    {{ Form::open(['route' => ['musica.escala.tarefa.store', $escala->id, $servico->id]
                        , 'method' => 'post']) }}
                        {{ Form::hidden('colaborador_id', $colaborador->id) }}
                        {{ Form::hidden('servico_id', $servico->id) }}
                    <button class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> Adicionar à escala
                    </button>
                    {{ Form::close() }}

                    @if ($escala->tarefas->where('colaborador_id',$colaborador->id)->count() > 0 )
                      <div class="outros-servicos">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        Já escalado(a) em outro serviço:
                        @foreach ($escala->tarefas->where('colaborador_id',$colaborador->id) as $tarefa)
                          {{$tarefa->servico->descricao}}@if (!$loop->last), @endif
                        @endforeach
                      </div>
                    @endif
                @else
                    <span class="escalado">Já escalado</span>
                @endif
            </div>
        </div>
    @empty
        Nenhum colaborador cadastrado
    @endforelse

@endsection

@section('scripts')

@endsection
