<?php

namespace App\Listeners\musica;

use App\Events\musica\EscalaPublicada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyColaboradoresNovaEscala
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
     * @param  NovaEscalaMusica  $event
     * @return void
     */
    public function handle(EscalaPublicada $event)
    {
        //
    }
}
