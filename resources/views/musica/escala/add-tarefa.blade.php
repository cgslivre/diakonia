{{ Date::setLocale('pt_BR') }}
@extends( 'musica.template-musica')

@section('nivel2')
    <li class="active"><a href="{{route('musica.eventos')}}">
    Escalas de Música </a></li>
@stop

@section('nivel3')
    <li class="active">
        <a href="{{URL::route('musica.escala.edit',[$escala->evento->id, $escala->id])}}">
        Escala dia: {{
        Date::parse($escala->evento->data_hora_inicio)->format('j/m/Y')}}</a></li>
@stop
@section('nivel4')
    <li>
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
    @forelse ($servico->colaboradores as $colaborador)
        <div class="row add-servico-colaborador
            {{in_array($colaborador->id, $colaboradoresServico) ?
                 'escalado' : 'nao-escalado'}}">
            <div class="col-md-2">
                {{-- Dados do colaborador --}}
                <div class="colaborador-data">
                    <img src="{{ URL($colaborador->user->avatarPathSmall()) }}"
                    alt="{{ $colaborador->user->name }}" class="colaborador"/>
                    {{ $colaborador->user->name }}
                </div>
            </div>
            {{-- Dados de outras escalas --}}
            <div>

            </div>
            {{-- Ações --}}
            <div class="tarefa-action">
                @if (!in_array($colaborador->id, $colaboradoresServico))
                    {{ Form::open(['route' => ['musica.escala.tarefa.store', $escala->id, $servico->id]
                        , 'method' => 'post']) }}
                        {{ Form::hidden('colaborador_id', $colaborador->id) }}
                    <button class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> Adicionar à escala
                    </button>
                    {{ Form::close() }}
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
