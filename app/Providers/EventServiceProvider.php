<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Model\musica\EscalaMusica;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserRegister' => [
            'App\Listeners\NotifyAdminsNewUser',
        ],
        'App\Events\musica\EscalaPublicada' => [
            'App\Listeners\musica\NotifyAdminNovaEscala',
            'App\Listeners\musica\NotifyColaboradoresNovaEscala',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Atualiza Token da tarefa
        EscalaMusica::saving( function( $escala ) {
            $escala->token = str_random(50);
        });
    }
}
