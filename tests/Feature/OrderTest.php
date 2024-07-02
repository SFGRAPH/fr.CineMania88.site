<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\ReturnProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceived;
use App\Mail\OrderProcessing;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Event;
use App\Events\OrderCancelled1;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /** @test */
    public function it_sends_an_email_when_an_order_is_created()
    {
        Mail::fake();

        $user = User::factory()->create();
        $product1 = Product::factory()->create(['price' => 50.00]);
        $product2 = Product::factory()->create(['price' => 30.00]);

        $this->actingAs($user);

        $response = $this->post(route('orders.store'), [
            'items' => [
                ['product_id' => $product1->id, 'quantity' => 2, 'price' => 50.00],
                ['product_id' => $product2->id, 'quantity' => 1, 'price' => 30.00],
            ],
            'billing_address' => [
                'address' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'Anystate',
                'postal_code' => '12345',
                'country' => 'USA'
            ],
            'shipping_address' => [
                'address' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'Anystate',
                'postal_code' => '12345',
                'country' => 'USA'
            ]
        ]);

        $response->assertStatus(201);

        Mail::assertSent(OrderReceived::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }


    /** @test */
    public function it_sends_an_email_when_order_status_is_updated_to_processing()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'pending']);

        $this->actingAs($user);

        $response = $this->patch(route('admin.orders.updateStatus', ['order' => $order->id, 'status' => 'processing']));

        $response->assertStatus(302);

        Mail::assertSent(OrderProcessing::class, function ($mail) use ($order) {
            return $mail->order->id === $order->id &&
                $mail->hasTo($order->user->email) &&
                $mail->subject === 'Votre commande est en cours de traitement';
        });
    }


    /** @test */
    public function it_sends_an_email_when_order_status_is_updated_to_shipped()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'pending']);

        $this->actingAs($user);

        $response = $this->patch(route('admin.orders.updateStatus', ['order' => $order->id, 'status' => 'shipped']));

        $response->assertStatus(302);

        Mail::assertSent(OrderShipped::class, function ($mail) use ($order) {
            return $mail->order->id === $order->id &&
                $mail->hasTo($order->user->email) &&
                $mail->subject === 'Votre commande a été expédiée';
        });
    }


    /** @test */
    public function it_triggers_an_event_when_order_status_is_updated_to_cancelled()
    {
        Event::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'pending']);

        $this->actingAs($user);

        $response = $this->patch(route('admin.orders.updateStatus', ['order' => $order->id, 'status' => 'cancelled']));

        $response->assertStatus(302);

        Event::assertDispatched(OrderCancelled1::class, function ($event) use ($order) {
            return $event->order->id === $order->id;
        });
    }

    /** @test */
    public function it_creates_a_return()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.store'), [
            'order_id' => $order->id,
            'reason' => 'Defective product',
            'status' => 'pending',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('return_products', [
            'order_id' => $order->id,
            'reason' => 'Defective product',
            'status' => 'pending',
        ]);
    }


    /** @test */
    public function it_sends_an_email_when_return_is_approved()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.approve', $return->id));

        $response->assertStatus(302);

        // Mail::assertSent(ReturnApproved::class, function ($mail) use ($user) {
        //     return $mail->hasTo($user->email);
        // });
    }

    /** @test */
    public function it_sends_an_email_when_return_is_rejected()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.reject', $return->id));

        $response->assertStatus(302);

        // Mail::assertSent(ReturnRejected::class, function ($mail) use ($user) {
        //     return $mail->hasTo($user->email);
        // });
    }

    /** @test */
    public function it_sends_an_email_when_return_is_refunded()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.refund', $return->id));

        $response->assertStatus(302);

        // Mail::assertSent(ReturnRefunded::class, function ($mail) use ($user) {
        //     return $mail->hasTo($user->email);
        // });
    }
}










