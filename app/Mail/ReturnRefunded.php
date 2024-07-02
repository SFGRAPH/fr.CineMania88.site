<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ReturnProduct;

class ReturnRefunded extends Mailable
{
    use Queueable, SerializesModels;

    public $return;

    public function __construct(ReturnProduct $return)
    {
        $this->return = $return;
    }

    public function build()
    {
        return $this->subject('Votre retour a été remboursé')
                    ->markdown('emails.returns.refunded')
                    ->with(['return' => $this->return]);
    }
}

