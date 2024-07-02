<?php

namespace App\Listeners;

use App\Events\RefundProcessed1;
use App\Mail\RefundProcessed;
use Illuminate\Support\Facades\Mail;

class SendRefundProcessed1Notification
{
    public function handle(RefundProcessed1 $event)
    {
        // Envoyer l'email de remboursement traité
        Mail::to($event->refund->returnProduct->order->user->email)->send(new RefundProcessed($event->refund));
    }
}


