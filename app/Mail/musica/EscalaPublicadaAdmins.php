<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EscalaPublicadaAdmins extends Mailable
{
    use Queueable, SerializesModels;

    protected $escala;
    protected $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($escala, $admin)
    {
        $this->escala = $escala;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Escala de música publicada')
            ->markdown('emails.musica.escala-publicada-admins')
                ->with([
                    'escala' => $this->escala,
                    'admin' => $this->admin
                ]);
    }
}
