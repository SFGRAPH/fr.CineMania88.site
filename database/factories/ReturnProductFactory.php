<?php

namespace Database\Factories;

use App\Models\ReturnProduct;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReturnProductFactory extends Factory
{
    protected $model = ReturnProduct::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'reason' => 'Defective product',
            'status' => 'pending',
        ];
    }
}

