<?php

namespace App\Listeners;

use App\Events\OrderShipped1;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped as OrderShippedMail;

class SendOrderShippedMail
{
    public function __construct()
    {
        //
    }

    public function handle(OrderShipped1 $event)
    {
        Mail::to($event->order->user->email)->send(new OrderShippedMail($event->order));
    }
}

