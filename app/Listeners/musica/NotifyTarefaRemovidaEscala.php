<?php

namespace App\Listeners\musica;

use App\Events\musica\TarefaEscalaRemovida;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\musica\TarefaRemovidaEscala;

class NotifyTarefaRemovidaEscala
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
     * @param  TarefaEscalaRemovida  $event
     * @return void
     */
    public function handle(TarefaEscalaRemovida $event)
    {
        $tarefa = $event->tarefa;

        $user = $tarefa->colaborador->user;
        Mail::to($user)->send(new TarefaRemovidaEscala($tarefa));

        $lider = $tarefa->escala->lider->user;


    }
}
