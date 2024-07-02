<?php

namespace Database\Factories;

use App\Models\Saga;
use Illuminate\Database\Eloquent\Factories\Factory;

class SagaFactory extends Factory
{
    protected $model = Saga::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}


