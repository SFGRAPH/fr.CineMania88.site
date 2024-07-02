<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use App\Mail\OrderReceived;
use App\Mail\OrderProcessing;
use App\Mail\OrderShipped;
use App\Mail\OrderCancelled;
use App\Events\OrderProcessing1;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_an_email_when_order_is_created()
    {
        Mail::fake();

        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create(['price' => 100]);

        // Désactiver le middleware CSRF
        $this->withoutMiddleware();

        $response = $this->post(route('orders.store'), [

            'items' => [
                ['product_id' => $product->id, 'quantity' => 2, 'price' => 100],
            ],
            'billing_address' => [
                'address' => '123 Billing St', 'city' => 'Billing City', 'state' => 'Billing State',
                'postal_code' => '12345', 'country' => 'Billing Country'
            ],
            'shipping_address' => [
                'address' => '123 Shipping St', 'city' => 'Shipping City', 'state' => 'Shipping State',
                'postal_code' => '67890', 'country' => 'Shipping Country'
            ],
        ]);

        $response->assertStatus(201);

        Mail::assertSent(OrderReceived::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }


    /** @test */
    public function it_sends_an_email_when_order_is_processing()
    {
        Mail::fake();
        Log::spy();
        Event::fake([OrderProcessing1::class]);

        $admin = User::factory()->create();
        $this->actingAs($admin, 'admin');

        $product = Product::factory()->create(['price' => 100]);
        $order = Order::factory()->create(['user_id' => $admin->id, 'status' => 'pending']);
        OrderItem::factory()->create(['order_id' => $order->id, 'product_id' => $product->id, 'price' => 100, 'quantity' => 2]);

        $response = $this->patch(route('admin.orders.update', ['order' => $order->id]), ['status' => 'processing']);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.orders.index'));

        Event::assertDispatched(OrderProcessing1::class, function ($event) use ($order) {
            return $event->order->id === $order->id;
        });

        Log::shouldHaveReceived('info')->with('Sending OrderProcessing email to ' . $admin->email);

        Mail::assertSent(OrderProcessing::class, function ($mail) use ($admin) {
            return $mail->hasTo($admin->email);
        });
    }



    /** @test */
    public function it_sends_an_email_when_order_is_shipped()
    {
        Mail::fake();

        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create(['price' => 100]);
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'pending']);
        OrderItem::factory()->create(['order_id' => $order->id, 'product_id' => $product->id, 'price' => 100, 'quantity' => 2]);

        $response = $this->patch(route('admin.orders.setShipped', ['order' => $order->id]));

        $response->assertStatus(302);

        Mail::assertSent(OrderShipped::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    /** @test */
    public function it_sends_an_email_when_order_is_cancelled()
    {
        Mail::fake();

        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create(['price' => 100]);
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'pending']);
        OrderItem::factory()->create(['order_id' => $order->id, 'product_id' => $product->id, 'price' => 100, 'quantity' => 2]);

        $response = $this->patch(route('admin.orders.setCancelled', ['order' => $order->id]));

        $response->assertStatus(302);

        Mail::assertSent(OrderCancelled::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}




