<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TarefaRemovidaEscala extends Mailable
{
    use Queueable, SerializesModels;

    protected $tarefa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tarefa)
    {
        $this->tarefa = $tarefa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Você foi removido(a) da escala do dia ' .
            $this->tarefa->escala->evento->data_hora_inicio->format('d/m/Y'))
                ->markdown('emails.musica.tarefa-escala-removida')
                    ->with([
                        'tarefa' => $this->tarefa
                    ]);
    }
}
