<div class="card-colaborador musica">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        <p class="nome">
            @can('musica-colaborador-view')
            <a href="{{ URL::route('musica.colaborador.show', $colaborador->id) }}">
                {{ $colaborador->user->name }}</a>
            @endcan

        </p>
        <p class="email">{{ $colaborador->user->email }}</p>
        @if($colaborador->lider)
            <p class="lider">
                <i class="fa fa-star" aria-hidden="true"></i> Líder
            </p>
        @endif
    </div>

</div>
