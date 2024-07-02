<?php

namespace App\Listeners;

use App\Events\OrderProcessing1;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderProcessing as OrderProcessingMail;

class SendOrderProcessingMail
{
    public function __construct()
    {
        //
    }

    public function handle(OrderProcessing1 $event)
    {
        Mail::to($event->order->user->email)->send(new OrderProcessingMail($event->order));
    }
}



