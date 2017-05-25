<?php

namespace App\Listeners\musica;

use App\Events\musica\EscalaLiderTrocado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\musica\EscalaNaoMaisLider;
use App\Mail\musica\EscalaNovoLider;


class NotifyEscalaLiderTrocado
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
     * @param  EscalaLiderTrocado  $event
     * @return void
     */
    public function handle(EscalaLiderTrocado $event)
    {
        $novoLider = $event->escala->lider->user;
        Mail::to($novoLider)->send( new EscalaNovoLider( $event->escala, $novoLider));
        $antigoLider = $event->antigoLider;
        Mail::to($antigoLider->user)->send( new EscalaNaoMaisLider( $event->escala, $antigoLider));
    }
}
