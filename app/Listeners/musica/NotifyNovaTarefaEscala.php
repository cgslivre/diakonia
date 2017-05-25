<?php

namespace App\Listeners\musica;

use App\Events\musica\TarefaEscalaAdicionada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\musica\NovaTarefaEscala;
use App\Mail\musica\EscalaAlterada;

class NotifyNovaTarefaEscala
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TarefaEscalaAdicionada  $event
     * @return void
     */
    public function handle(TarefaEscalaAdicionada $event)
    {
        $user = $event->tarefa->colaborador->user;
        Mail::to($user)->send(new NovaTarefaEscala($event->tarefa));

        $lider = $event->tarefa->escala->lider->user;
        Mail::to($lider)->send(new EscalaAlterada($event->tarefa->escala));
    }
}
