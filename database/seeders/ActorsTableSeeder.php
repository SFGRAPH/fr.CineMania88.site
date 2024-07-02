<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorsTableSeeder extends Seeder
{
    public function run()
    {
        $actors = [
            ['name' => 'Autre...'],
            ['name' => 'Alain Delon'],
            ['name' => 'George Clooney'],
            ['name' => 'Jean-Paul Belmondo'],
            ['name' => 'Harison Ford'],
            ['name' => 'All Pacino'],
            ['name' => 'Hill & Spencer'],
            ['name' => 'Jean-Claude Van Damme'],
            ['name' => 'Arnold Scharzenegger'],
            ['name' => 'Jason Statham'],
            ['name' => 'Silvester Stallone'],
            ['name' => 'Julia Roberts'],
            ['name' => 'Brad Pitt'],
            ['name' => 'Kevin costner'],
            ['name' => 'Léonardo DiCaprio'],
            ['name' => 'Bruce Willis'],
            ['name' => 'Johnny Depp'],
            ['name' => 'Charles Bronson'],
            ['name' => 'Johnny Hallyday'],
            ['name' => 'Christopher Lee'],
            ['name' => 'Louis De Funès '],
            ['name' => 'Clint Eastwood'],
            ['name' => 'Lino Ventura'],
            ['name' => 'Eddie Murphy'],
            ['name' => 'Marilyn Monroe'],
            ['name' => 'Will Smith'],
            ['name' => 'Vincent Cassel'],
            ['name' => 'Tom Hanks'],
            ['name' => 'Tom Cruise'],
            ['name' => 'Steve McQueen'],
            ['name' => 'Sophie Marceau'],
            ['name' => 'Sean Connery'],
            ['name' => 'Rommy Schneider'],
            ['name' => 'Robert De Niro'],
            ['name' => 'Mel Gibson'],
        ];

        foreach ($actors as $actor) {
            Actor::create($actor);
        }
    }
}
