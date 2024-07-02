<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedOrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['archived_order_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at'];

    public function archivedOrder()
    {
        return $this->belongsTo(ArchivedOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

