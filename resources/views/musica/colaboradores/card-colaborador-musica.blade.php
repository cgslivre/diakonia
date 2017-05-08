<div class="card-staff musica">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        <p class="nome">
            <a href="{{ URL::route('musica.colaborador.edit', $colaborador->id) }}">
                {{ $colaborador->user->name }}</a>
        </p>
        <p class="email">{{ $colaborador->user->email }}</p>
        @if($colaborador->lider)
            <p class="lider">
                <i class="fa fa-street-view" aria-hidden="true"></i> Líder
            </p>
        @endif
    </div>

</div>
