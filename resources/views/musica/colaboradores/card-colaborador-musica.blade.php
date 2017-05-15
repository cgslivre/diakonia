<div class="card-colaborador musica">
    <div class="avatar">
        <img src="{{ URL($colaborador->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        <p class="nome">
            @can('musica-colaborador-edit')
            <a href="{{ URL::route('musica.colaborador.edit', $colaborador->id) }}">
                {{ $colaborador->user->name }}</a>
            @endcan
            @cannot('musica-colaborador-edit')
                {{ $colaborador->user->name }}
            @endcannot
        </p>
        <p class="email">{{ $colaborador->user->email }}</p>
        @if($colaborador->lider)
            <p class="lider">
                <i class="fa fa-street-view" aria-hidden="true"></i> Líder
            </p>
        @endif
    </div>

</div>
