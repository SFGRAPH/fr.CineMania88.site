<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saga;

class SagasTableSeeder extends Seeder
{
    public function run()
    {
        $sagas = [
            ['name' => 'Autre...'],
            ['name' => 'Indiana Jones'],
            ['name' => 'Batman'],
            ['name' => 'Alien'],
            ['name' => 'Dents de la mer'],
            ['name' => 'Harry Potter'],
            ['name' => 'Seigneur des anneaux'],
            ['name' => 'Star Wars'],
            ['name' => 'Marvel'],
            ['name' => 'Jurassic Park'],
            ['name' => 'Sos Fantome'],
            ['name' => 'Robocop'],
            ['name' => 'Tarzan'],
            ['name' => 'Zorro'],
            ['name' => 'Terminator'],
            ['name' => 'James Bond'],
        ];

        foreach ($sagas as $saga) {
            Saga::create($saga);
        }
    }
}
