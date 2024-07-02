<?php

// database/factories/OrderAddressFactory.php

use App\Models\OrderAddress;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderAddressFactory extends Factory
{
    protected $model = OrderAddress::class;

    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'address_type' => 'billing',
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
        ];
    }
}

