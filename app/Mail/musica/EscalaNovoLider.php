<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaNovoLider extends Mailable
{
    use Queueable, SerializesModels;

    protected $escala;
    protected $novoLider;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escala, $novoLider)
    {
        $this->escala = $escala;
        $this->novoLider = $novoLider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Você é líder da escala do dia ' .
            $this->escala->evento->data_hora_inicio->format('d/m/Y'))
            ->view('emails.musica.escala-novo-lider')
                ->with([
                    'escala' => $this->escala,
                    'novoLider' => $this->novoLider
                ]);

    }
}
