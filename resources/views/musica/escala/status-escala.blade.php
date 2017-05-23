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
        {{-- Há impedimentos na escala? --}}
        @if( $evento->escalaMusica->impedimentos->count() > 0)
            <div class="impedimento">
                <i class="fa fa-hand-paper-o" aria-hidden="true"
                    title="Nem todos colaboradores podem particiar desta escala"></i>
            </div>
        @endif
    @endisset
</div>
