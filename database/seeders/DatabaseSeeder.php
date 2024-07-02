<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenresTableSeeder::class,
            ActorsTableSeeder::class,
            DirectorsTableSeeder::class,
            SagasTableSeeder::class,
            AdminSeeder::class,
            CategoriesTableSeeder::class,
            OrderSeeder1::class
        ]);
    }
}
