<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_product_id', 'amount', 'status'
    ];

    public function returnProduct()
    {
        return $this->belongsTo(ReturnProduct::class);
    }
}



