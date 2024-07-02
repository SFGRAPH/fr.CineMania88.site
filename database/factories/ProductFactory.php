<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Saga;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(1, 100),
            'image_path' => null,
            'categories_id' => Category::factory(),
            'genres_id' => Genre::factory(),
            'actors_id' => Actor::factory(),
            'directors_id' => Director::factory(),
            'sagas_id' => Saga::factory()
        ];
    }
}

