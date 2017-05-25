<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaTarefaEscala extends Mailable
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

        return $this->subject('Você foi incluído na escala do dia ' .
            $tarefa->escala->evento->data_hora_inicio->format('d/m/Y'))
                ->markdown('emails.musica.nova-tarefa-escala')
                    ->with([
                        'tarefa' => $this->tarefa
                    ]);
    }
}
