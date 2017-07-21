<?php

namespace App\Events\musica;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Model\musica\EscalaMusica;

class EscalaLiderTrocado
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $escala;
    public $antigoLider;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EscalaMusica $escala, $antigoLider){
        $this->escala = $escala;
        $this->antigoLider = $antigoLider;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
