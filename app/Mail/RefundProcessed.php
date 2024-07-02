<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RefundProduct;

class RefundProcessed extends Mailable
{
    use Queueable, SerializesModels;

    public $refund;

    public function __construct(RefundProduct $refund) // Type hint pour RefundProduct
    {
        $this->refund = $refund;
    }

    public function build()
    {
        return $this->subject('Votre remboursement a été effectué')
                    ->markdown('emails.returns.refunded');
    }
}


