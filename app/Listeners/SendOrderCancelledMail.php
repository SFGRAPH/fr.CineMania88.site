<?php

// app/Listeners/SendOrderCancelledMail.php
namespace App\Listeners;

use App\Events\OrderCancelled1;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCancelled as OrderCancelledMail;

class SendOrderCancelledMail
{
    public function handle(OrderCancelled1 $event)
    {
        try {
            Mail::to($event->order->user->email)->send(new OrderCancelledMail($event->order));
        } catch (\Exception $e) {
            \Log::error("Erreur lors de l'envoi de l'e-mail : " . $e->getMessage());
        }
    }
}



