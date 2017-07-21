<?php

namespace App\Listeners\musica;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\musica\EscalaRemovida;
use App\Mail\musica\EscalaRemovidaColaboradores;
use Log;

class NotifyEscalaRemovida
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
     * @param  EscalaRemovida  $event
     * @return void
     */
    public function handle(EscalaRemovida $event)
    {

        Log::info('$colaboradores: '. $event->colaboradores);
        foreach ($event->colaboradores as $user) {
          Mail::to($user)
            ->send(new EscalaRemovidaColaboradores($event->escala, $user));
        }
    }
}
