<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\ReturnProduct;

class ReturnRejected1
{
    use Dispatchable, SerializesModels;

    public $returnProduct;

    public function __construct(ReturnProduct $returnProduct)
    {
        $this->returnProduct = $returnProduct;
    }
}

