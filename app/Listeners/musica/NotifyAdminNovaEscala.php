<?php

namespace App\Listeners\musica;

use App\Events\musica\EscalaPublicada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Silber\Bouncer\Database\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\musica\EscalaPublicadaAdmins;
use Log;

class NotifyAdminNovaEscala
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
    public function handle(EscalaPublicada $event){
       
        $roleAdmin = Role::where('name','role-musica-admin')->first();
        $admins = $roleAdmin->users()->get();
        foreach ($admins as $user) {
            Mail::to($user)->send(new EscalaPublicadaAdmins($event->escala, $user));
        }
    }
}
