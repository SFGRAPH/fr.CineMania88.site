<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importez le trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory; // Utilisez le trait HasFactory

    protected $table = 'categories'; // Nom de la table dans la base de données
    protected $fillable = ['name'];

    // Exemple de relation avec les produits
    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }
}
