<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaNaoMaisLider extends Mailable
{
    use Queueable, SerializesModels;

    protected $escala;
    protected $antigoLider;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escala, $antigoLider)
    {
        $this->escala = $escala;
        $this->antigoLider = $antigoLider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Você não é mais o líder da escala do dia ' .
            $this->escala->evento->data_hora_inicio->format('d/m/Y'))
                ->markdown('emails.musica.escala-nao-mais-lider')
                    ->with([
                        'escala' => $this->escala,
                        'antigoLider' => $this->antigoLider
                    ]);
    }
}
