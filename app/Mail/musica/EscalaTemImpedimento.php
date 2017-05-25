<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaTemImpedimento extends Mailable
{
    use Queueable, SerializesModels;

    protected $impedimento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($impedimento)
    {
        $this->impedimento = $impedimento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Um colaborador não pode particiar da escala do dia '.
            $this->impedimento->escala->evento->data_hora_inicio->format('d/m/Y'))
            ->markdown('emails.musica.escala-impedimento')
                ->with([
                    'impedimento' => $this->impedimento
                ]);;
    }
}
