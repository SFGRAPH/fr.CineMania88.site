<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            ['name' => 'Autre...'],
            ['name' => 'Walt Disney'],
            ['name' => 'Hommage / Retrospective'],
            ['name' => 'Ressortie / Classique'],
            ['name' => 'Musique / Concert'],
            ['name' => 'Film action'],
            ['name' => 'Sport'],
            ['name' => 'Comédie'],
            ['name' => 'Art Martiaux'],
            ['name' => 'Black exploitation'],
            ['name' => 'Policier / Thrillers'],
            ['name' => 'Cinéma Italien'],
            ['name' => 'Comédie musicale'],
            ['name' => 'Film animation'],
            ['name' => 'Erotique'],
            ['name' => 'Cinéma Asiatique'],
            ['name' => 'Horreur'],
            ['name' => 'Science fiction'],
            ['name' => 'Manga'],
            ['name' => 'Western'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
