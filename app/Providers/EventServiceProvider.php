<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Model\musica\EscalaMusica;
use App\Model\musica\ColaboradorMusica;

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
        ],
        'App\Events\musica\TarefaEscalaAdicionada' => [
            'App\Listeners\musica\NotifyNovaTarefaEscalaColaborador',
            'App\Listeners\musica\NotifyEscalaAlteradaLider',
        ],
        'App\Events\musica\TarefaEscalaRemovida' => [
            'App\Listeners\musica\NotifyTarefaRemovidaEscala',
        ],
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

        // Atualiza Token da Escala Música
        EscalaMusica::saving( function( $escala ) {
            $escala->token = str_random(5);
        });
        // Atualiza Token do Colaborador
        ColaboradorMusica::saving( function( $colaborador ) {
            $colaborador->token = str_random(4);
        });
    }
}
