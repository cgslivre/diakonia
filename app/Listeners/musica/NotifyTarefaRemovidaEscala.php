<?php

namespace App\Listeners\musica;

use App\Events\musica\TarefaEscalaRemovida;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        //
    }
}
