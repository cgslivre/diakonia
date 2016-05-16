<div class="card-staff musica">
    <div class="avatar">
        <img src="{{ URL($staff->user->avatarPathSmall()) }}" alt="" />
    </div>
    <div class="dados">
        <p class="nome">
            <a href="{{ URL::route('musica.staff.edit', $staff->id) }}">{{ $staff->user->name }}</a>
        </p>
        <p class="email">{{ $staff->user->email }}</p>
        @if($staff->lideranca)
            <p class="lider">
                <i class="fa fa-street-view" aria-hidden="true"></i> Líder
            </p>
        @endif
    </div>

</div>
