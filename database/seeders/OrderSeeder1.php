<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\Product;
use App\Models\User;

class OrderSeeder1 extends Seeder
{
    public function run()
    {
        // Créer un utilisateur
        $user = User::factory()->create();

        // Créer des produits
        $product1 = Product::factory()->create(['price' => 50.00]);
        $product2 = Product::factory()->create(['price' => 30.00]);

        // Créer une commande
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'received',
            'total' => ($product1->price * 2) + ($product2->price),
        ]);

        // Créer des items de commande
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product1->id,
            'quantity' => 2,
            'price' => $product1->price,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product2->id,
            'quantity' => 1,
            'price' => $product2->price,
        ]);

        // Créer des adresses de commande
        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'billing',
            'address' => '123 Main St',
            'city' => 'Anytown',
            'state' => 'Anystate',
            'postal_code' => '12345',
            'country' => 'USA',
        ]);

        OrderAddress::create([
            'order_id' => $order->id,
            'address_type' => 'shipping',
            'address' => '123 Main St',
            'city' => 'Anytown',
            'state' => 'Anystate',
            'postal_code' => '12345',
            'country' => 'USA',
        ]);
    }
}



