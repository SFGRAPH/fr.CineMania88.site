<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\OrderProcessing1;
use App\Events\OrderShipped1;
use App\Events\OrderCancelled1;
use App\Listeners\SendOrderProcessingMail;
use App\Listeners\SendOrderShippedMail;
use App\Listeners\SendOrderCancelledMail;
use App\Events\ReturnAccepted1;
use App\Events\RefundProcessed1;
use App\Events\ReturnRejected1;
use App\Listeners\SendReturnAccepted1Notification;
use App\Listeners\SendRefundProcessed1Notification;
use App\Listeners\SendReturnRejected1Notification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Événements et écouteurs pour les commandes
        OrderProcessing1::class => [
            SendOrderProcessingMail::class,
        ],
        OrderShipped1::class => [
            SendOrderShippedMail::class,
        ],
        OrderCancelled1::class => [
            SendOrderCancelledMail::class,
        ],
        // Événements et écouteurs pour les retours
        ReturnAccepted1::class => [
            SendReturnAccepted1Notification::class,
        ],
        RefundProcessed1::class => [
            SendRefundProcessed1Notification::class,
        ],
        ReturnRejected1::class => [
            SendReturnRejected1Notification::class,
        ],

    ];

    public function boot()
    {
        parent::boot();
    }
}


