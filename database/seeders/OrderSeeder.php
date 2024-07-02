<?php

// database/seeders/OrderSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'received',
            'total' => $product->price,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);
    }
}
