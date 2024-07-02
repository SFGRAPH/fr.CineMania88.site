<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderProcessing extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderItems;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->orderItems = $order->items()->with('product')->get(); // Assuming you have a relationship defined
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject('Commande en cours')
                    ->markdown('emails.orders.processing')
                    ->with([
                        'order' => $this->order,
                        'orderItems' => $this->orderItems,
                    ]);
                    
    }
}



