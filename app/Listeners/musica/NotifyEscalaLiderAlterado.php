<?php

namespace App\Listeners\musica;

use App\Events\musica\EscalaLiderAlterado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyEscalaLiderAlterado
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
     * @param  EscalaLiderAlterado  $event
     * @return void
     */
    public function handle(EscalaLiderAlterado $event)
    {
        //
    }
}
