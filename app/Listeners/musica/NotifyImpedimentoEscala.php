<?php

namespace App\Listeners\musica;

use App\Events\musica\ImpedimentoEscalaEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\musica\EscalaTemImpedimento;
use App\Mail\musica\EscalaTemLiderImpedido;
use Silber\Bouncer\Database\Role;

class NotifyImpedimentoEscala
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
     * @param  ImpedimentoEscala  $event
     * @return void
     */
    public function handle(ImpedimentoEscalaEvent $event)
    {
        $impedimento = $event->impedimento;

        if( $impedimento->colaborador_id == $impedimento->escala->lider_id){
            // O líder está impedido
            $roleAdmin = Role::where('name','role-musica-admin')->first();
            $admins = $roleAdmin->users()->get();
            // Envia para todos os administradores de música
            foreach ($admins as $user) {
                Mail::to($user)->send(new EscalaTemLiderImpedido($impedimento,$user));
            }
        } else{
            $lider = $impedimento->escala->lider->user;
            Mail::to($lider)->send(new EscalaTemImpedimento($impedimento,$lider));

        }
    }
}
