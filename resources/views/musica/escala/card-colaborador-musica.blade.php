<div class="card-colaborador musica middle-div">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}"
             alt="{{$colaborador->user->name}}" />
    </div>
    <div class="dados">
        @if ($removerButton)
            {{ Form::open(['route' => ['musica.escala.tarefa.delete', $tarefa->id]
                , 'method' => 'delete']) }}
            <button class="remover-colaborador" type="submit">X</button>
            {{ Form::close() }}


        @endif
        <p class="nome">
            @if ($escala->impedimentos->contains('colaborador_id',$colaborador->id))
                <i class="fa fa-exclamation-triangle impedimento" aria-hidden="true"
                    title="Não pode participar neste dia"></i>
            @endif
            <a href="{{ URL::route('usuario.show', $colaborador->user->id) }}">
                {{ $colaborador->user->name }}</a>
        </p>
        <p class="telefone-mask telefone">{{ $colaborador->user->telefone }}</p>

    </div>

</div>
