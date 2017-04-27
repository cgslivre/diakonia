<?php

namespace App\Listeners;

use App\Events\UserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Silber\Bouncer\Database\Role;
use App\Mail\NovoUsuario;
use Illuminate\Support\Facades\Mail;

class NotifyAdminsNewUser
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
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {
        \Log::info("Registro de Usuário \n" . $event->user);
        $roleAdmin = Role::where('name','role-user-admin')->first();
        $usuarios = $roleAdmin->users()->get();
        foreach ($usuarios as $usuario) {
            Mail::to($usuario)->send(new NovoUsuario($event->user));
        }
    }
}
