<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedOrderAddress extends Model
{
    use HasFactory;

    protected $fillable = ['archived_order_id', 'address_type', 'address', 'city', 'state', 'postal_code', 'country', 'created_at', 'updated_at'];

    public function archivedOrder()
    {
        return $this->belongsTo(ArchivedOrder::class);
    }
}
