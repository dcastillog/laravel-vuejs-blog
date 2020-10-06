<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $repplyMessage;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $repplyMessage)
    {
        $this->data = $data;
        $this->repplyMessage = $repplyMessage;
    }

}
