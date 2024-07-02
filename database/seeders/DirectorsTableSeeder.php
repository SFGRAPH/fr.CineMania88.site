<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorsTableSeeder extends Seeder
{
    public function run()
    {
        $directors = [
            ['name' => 'Autre...'],
            ['name' => 'Dario Argento'],
            ['name' => 'Tim Burton'],
            ['name' => 'John Carpenter'],
            ['name' => 'Francis Ford Coppola'],
            ['name' => 'David Cronenberg'],
            ['name' => 'Brian De Palma'],
            ['name' => 'William Friedkin'],
            ['name' => 'Alfred Hitchcock'],
            ['name' => 'Pedro Almodovar'],
            ['name' => 'Wes Anderson'],
            ['name' => 'Luc Besson'],
            ['name' => 'Joel & Ethan Coen'],
            ['name' => 'Joe Dante'],
            ['name' => 'Federico Fellini'],
            ['name' => 'Lucio Fulci'],
            ['name' => 'Jean-Luc Godard'],
            ['name' => 'Stanley Kubrick'],
            ['name' => 'Akira Kurosawa'],
            ['name' => 'Sergio Leone'],
            ['name' => 'David Lynch'],
            ['name' => 'Russ Meyer'],
            ['name' => 'Hayao Miyazaki'],
            ['name' => 'Gaspar Noe'],
            ['name' => 'George Romero'],
            ['name' => 'Martin Scorsese'],
            ['name' => 'Steven Spielberg'],
            ['name' => 'Quentin Tarantino'],
            ['name' => 'François Truffaut'],
          
        ];

        foreach ($directors as $director) {
            Director::create($director);
        }
    }
}
