<?php

namespace App\Listeners\musica;

use App\Events\musica\EscalaPublicada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\musica\EscalaPublicadaColaborador;

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
        $colaboradores = $event->escala->tarefas->map( function($item){
          return $item->colaborador->user;}
          )->push($event->escala->lider->user)->unique();
        foreach ($colaboradores as $user) {
          Mail::to($user)
            ->send(new EscalaPublicadaColaborador($event->escala, $user));
        }
    }
}
