<?php

namespace App\Events\musica;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Model\musica\ImpedimentoEscala;

class ImpedimentoEscalaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $impedimento;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ImpedimentoEscala $impedimento)
    {
        $this->impedimento = $impedimento;
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
