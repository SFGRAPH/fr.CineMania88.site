<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'reason', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function refundProduct()
    {
        return $this->hasOne(RefundProduct::class, 'return_product_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'return_product_items')
                    ->withPivot('quantity');
    }
}




