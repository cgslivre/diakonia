<div class="card-colaborador musica middle-div">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        @if ($removerButton)
            {{ Form::open(['route' => ['musica.escala.tarefa.delete', $tarefa->id]
                , 'method' => 'delete']) }}
            <button class="remover-colaborador" type="submit">X</button>
            {{ Form::close() }}


        @endif
        <p class="nome">
            <a href="{{ URL::route('musica.colaborador.edit', $colaborador->id) }}">
                {{ $colaborador->user->name }}</a>
        </p>
        <p class="telefone-mask">{{ $colaborador->user->telefone }}</p>

    </div>

</div>
