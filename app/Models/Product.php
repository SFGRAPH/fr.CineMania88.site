<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image_path', 'categories_id', 'genres_id', 'actors_id', 'directors_id', 'sagas_id', 'visible'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genres_id');
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actors_id');
    }

    public function director()
    {
        return $this->belongsTo(Director::class, 'directors_id');
    }

    public function saga()
    {
        return $this->belongsTo(Saga::class, 'sagas_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }

    public function returns()
    {
        return $this->belongsToMany(ReturnProduct::class, 'return_product_items')->withPivot('quantity');
    }
}





