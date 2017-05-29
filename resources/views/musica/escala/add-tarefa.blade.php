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
            <div class="historico" escala="{{$escala->id}}" colaborador="{{$colaborador->id}}"
                data-url="{{route('musica.colaborador.historico', [$colaborador->id, $escala->id])}}">
                <span class="loading">
                    <i class="fa fa-spin fa-spinner" aria-hidden="true"></i>
                    Carregando
                </span>
                <ul></ul>
            </div>

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

                @if ($escala->impedimentos->contains('colaborador_id',$colaborador->id))
                  <div class="impedimento">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    Não poderá participar neste dia
                  </div>
                @endif
            </div> {{-- Fim ação  --}}

        </div>
    @empty
        Nenhum colaborador cadastrado
    @endforelse

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function () {
            $('.historico').each( function(){
                var id_escala = $(this).attr("escala");
                var id_colaborador = $(this).attr("colaborador");
                var url = $(this).attr("data-url");
                var ul = $(this).children('ul');
                // console.log(url);
                $.getJSON(url, function( data ){
                    for( var i = 0 ; i < data.length ; i++){
                        //console.log(data[i]);
                        var escalado = "";
                        if( data[i].escalado == "escalado"){
                            escalado = '<i class="fa fa-check" aria-hidden="true"></i>';
                        } else{
                            escalado = '<i class="fa fa-circle-thin" aria-hidden="true"></i>';
                        }

                        ul.append('<li title="' + data[i].data +  '" class="'
                            + data[i].escalado + ' ' +  data[i].referencia +'">'
                            + escalado +'</li>');
                    }
                });
                // console.log(id_escala + "**" + id_colaborador);
                $(this).children('.loading').hide();

            });
        });

    </script>

@endsection
