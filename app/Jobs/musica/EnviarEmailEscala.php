<?php

namespace App\Jobs\musica;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Model\musica\EscalaMusica;
use Log;

class EnviarEmailEscala implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $escala;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(EscalaMusica $escala)
    {
        $this->escala = $escala;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Escala 2: '.$this->escala);
    }
}
