<?php

namespace App\Events;

use App\Models\ReturnProduct;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReturnAccepted1
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $returnProduct;

    public function __construct(ReturnProduct $returnProduct)
    {
        $this->returnProduct = $returnProduct;
    }

    public function broadcastOn()
    {
        return new Channel('channel-name');
    }
}


