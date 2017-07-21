<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaTemLiderImpedido extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $impedimento;
    protected $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($impedimento, $admin)
    {
        $this->impedimento = $impedimento;
        $this->admin = $admin;
        $this->onQueue('emails');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('O líder escolhido não pode particiar da escala do dia '.
            $this->impedimento->escala->evento->data_hora_inicio->format('d/m/Y'))
            ->markdown('emails.musica.escala-lider-impedido')
                ->with([
                    'impedimento' => $this->impedimento,
                    'admin' => $this->admin
                ]);;
    }
}
