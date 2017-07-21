{{-- {{$escala == NULL ? "n/a" : $escala->id}}
{{$user->id}} --}}
<div class="escala-info">

    <div class="status-escala {{$evento->statusEscalaMusica}}">
        @if ($evento->statusEscalaMusica == "sem-escala")
            <i class="fa fa-exclamation-circle" aria-hidden="true" title="Sem escala"></i>
        @elseif ($evento->statusEscalaMusica == "escala-criada")
            <i class="fa fa-exclamation-triangle" aria-hidden="true"
                title="Escala não publicada"></i>
        @elseif ($evento->statusEscalaMusica == "escala-publicada")
            <i class="fa fa-check-circle" aria-hidden="true"
                title="Escala publicada"></i>
        @endif
    </div>

    @isset($evento->escalaMusica)
        {{-- O usuário está nesta escala? --}}
        @if ($evento->escalaMusica->tarefas->contains('colaborador_id',$user->id) ||
            $evento->escalaMusica->lider_id == $user->id )
            <div class="escalado">
                <i class="fa fa-hand-peace-o" aria-hidden="true"
                    title="Você está escalado"></i>
            </div>
        @endif

        {{-- O usuário é o líder da escala? --}}
        @if ($evento->escalaMusica->lider_id == $user->id)
            <div class="lider">
                <i class="fa fa-star" aria-hidden="true"
                    title="Você é o líder da escala"></i>
            </div>
        @endif
        {{-- Há impedimentos na escala? --}}
        @if ($evento->escalaMusica->impedimentos->pluck('colaborador_id')
                ->intersect($evento->escalaMusica->tarefas->pluck('colaborador_id')
                ->push($evento->escalaMusica->lider_id))->isNotEmpty())
            <div class="impedimento">
                <i class="fa fa-hand-paper-o" aria-hidden="true"
                    title="Nem todos colaboradores podem particiar desta escala"></i>
            </div>
        @endif
        {{-- O usuário declarou-se impedido para este dia --}}
        @if ($evento->escalaMusica->impedimentos->contains('colaborador_id',$user->id))
            <div class="usuario-impedido">
                <i class="fa fa-thumbs-down" aria-hidden="true"
                    title="Você declarou-se impedido de participar desta escala"></i>
            </div>
        @endif
    @endisset
</div>
