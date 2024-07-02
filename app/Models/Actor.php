<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importez le trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{


    use HasFactory; // Utilisez le trait HasFactory

    protected $table = 'actors'; // Nom de la table dans la base de données
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
