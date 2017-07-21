<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaTemImpedimento extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $impedimento;
    protected $lider;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($impedimento, $lider)
    {
        $this->impedimento = $impedimento;
        $this->lider = $lider;
        $this->onQueue('emails');
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
                    'impedimento' => $this->impedimento,
                    'lider' => $this->lider
                ]);;
    }
}
