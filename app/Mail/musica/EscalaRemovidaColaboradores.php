<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaRemovidaColaboradores extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $evento;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escala, $user)
    {
        $this->evento = $escala->evento->toArray();
        $this->user = $user;
        $this->onQueue('emails');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $dhi = new \Carbon\Carbon($this->evento["data_hora_inicio"]);
        $dt = $dhi->format('d/m/Y');

        return $this->subject('Escala de música cancelada!')
            ->markdown('emails.musica.escala-cancelada')
                ->with([
                    'dia' => $dt,
                    'hora' => $dhi->format('G\hi'),
                    'titulo' => $this->evento["titulo"],
                    'user' => $this->user
                ]);
    }
}
