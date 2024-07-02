<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importez le trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    use HasFactory; // Utilisez le trait HasFactory

    protected $table = 'genres'; // Nom de la table dans la base de données
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
