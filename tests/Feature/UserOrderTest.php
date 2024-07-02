<?php

// tests/Feature/UserOrderTest.php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceived;
use App\Mail\OrderProcessing;
use App\Mail\OrderShipped;

class UserOrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Utiliser la base de données réelle
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => 'path/to/your/database.sqlite']);
    }

    public function testUserCanCreateOrder()
    {
        $this->withoutExceptionHandling();

        // Simulate user and product creation
        $user = User::factory()->create();
        $product = Product::factory()->create();

        // Mock the Mail facade
        Mail::fake();

        // Create an order
        $response = $this->actingAs($user)->post('/orders', [
            'items' => [
                ['product_id' => $product->id, 'quantity' => 1, 'price' => $product->price],
            ],
            'billing_address' => [
                'address' => '123 Billing St',
                'city' => 'Billing City',
                'state' => 'Billing State',
                'postal_code' => '12345',
                'country' => 'Billing Country',
            ],
            'shipping_address' => [
                'address' => '123 Shipping St',
                'city' => 'Shipping City',
                'state' => 'Shipping State',
                'postal_code' => '67890',
                'country' => 'Shipping Country',
            ],
        ]);

        $response->assertStatus(200);

        // Get the created order
        $order = Order::first();

        // Assert that the order was created
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        // Assert that the OrderReceived mail was sent
        Mail::assertSent(OrderReceived::class, function ($mail) use ($order) {
            return $mail->order->id === $order->id;
        });

        // Print the order details
        echo "Order ID: " . $order->id . "\n";
    }
}



