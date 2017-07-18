<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TarefaRemovidaEscala extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $tarefa;
    protected $evento;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tarefa)
    {
        $this->evento = $tarefa->escala->evento->toArray();
        $this->tarefa = $tarefa->toArray();
        $this->onQueue('emails');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dhi = new \Carbon\Carbon($this->evento["data_hora_inicio"]);
        $dt = $dhi->format('d/m/Y');
        return $this->subject('Você foi removido(a) da escala do dia ' . $dt)
                ->markdown('emails.musica.tarefa-escala-removida')
                    ->with([
                        'dia' => $dt,
                        'hora' => $dhi->format('G\hi'),
                        'titulo' => $this->evento["titulo"],
                        'servico' => $this->tarefa["servico"]["descricao"],
                        'usuario' => $this->tarefa["colaborador"]["user"]["name"]
                    ]);
    }
}
