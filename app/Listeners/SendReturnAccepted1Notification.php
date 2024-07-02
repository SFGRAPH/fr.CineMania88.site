<?php

namespace App\Listeners;

use App\Events\ReturnAccepted1;
use App\Mail\ReturnAccepted;
use Illuminate\Support\Facades\Mail;

class SendReturnAccepted1Notification
{
    public function handle(ReturnAccepted1 $event)
    {
        Mail::to($event->returnProduct->order->user->email)->send(new ReturnAccepted($event->returnProduct));
    }
}

