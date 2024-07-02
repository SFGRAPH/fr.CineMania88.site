<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'total', 'created_at', 'updated_at', 'completed_at', 'canceled_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(ArchivedOrderItem::class, 'archived_order_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(ArchivedOrderAddress::class, 'archived_order_id', 'id');
    }

    public function billingAddress()
    {
        return $this->hasOne(ArchivedOrderAddress::class, 'archived_order_id', 'id')->where('address_type', 'billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(ArchivedOrderAddress::class, 'archived_order_id', 'id')->where('address_type', 'shipping');
    }
}





