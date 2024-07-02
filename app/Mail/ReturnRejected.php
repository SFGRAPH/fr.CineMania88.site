<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ReturnProduct;

class ReturnRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $return;

    public function __construct(ReturnProduct $return)
    {
        $this->return = $return;
    }

    public function build()
    {
        return $this->subject('Votre demande de retour a été rejetée')
                    ->markdown('emails.returns.rejected')
                    ->with(['return' => $this->return]);
    }
}



