<?php

namespace App\Events;

use App\Models\RefundProduct;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RefundProcessed1
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $refund;

    public function __construct(RefundProduct $refund)
    {
        $this->refund = $refund;
    }

    public function broadcastOn()
    {
        return new Channel('channel-name');
    }
}




