<?php

namespace App\Listeners;

use App\Events\ReturnRejected1;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ReturnRejected;
use Illuminate\Support\Facades\Mail;

class SendReturnRejected1Notification
{
    public function handle(ReturnRejected1 $event)
    {
        Mail::to($event->returnProduct->order->user->email)->send(new ReturnRejected($event->returnProduct));
    }
}


