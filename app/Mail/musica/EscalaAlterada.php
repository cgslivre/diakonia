<?php

namespace App\Mail\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaAlterada extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $escala;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escala)
    {
        $this->escala = $escala;
        $this->onQueue('emails');

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Escala de música alterada')
            ->view('emails.musica.escala-alterada')
                ->with([
                    'escala' => $this->escala,
                    'user' => $this->escala->lider->user
                ]);
    }
}
