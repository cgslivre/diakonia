<div class="card-colaborador musica middle-div">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        <p class="nome">
            <a href="{{ URL::route('musica.colaborador.edit', $colaborador->id) }}">
                {{ $colaborador->user->name }}</a>
        </p>
        <p class="telefone-mask">{{ $colaborador->user->telefone }}</p>

    </div>

</div>
