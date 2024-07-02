<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\ReturnProduct;
use App\Models\Product;
use App\Models\OrderItem;
use App\Mail\ReturnApproved;
use App\Mail\ReturnRejected;
use App\Mail\ReturnRefunded;

class ReturnControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_an_email_when_return_is_approved()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'completed']);
        $product = Product::factory()->create();
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price,
        ]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id, 'status' => 'pending']);
        $return->products()->attach($product->id, ['quantity' => 1]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.approve', $return->id));

        $response->assertStatus(302);

        Mail::assertSent(ReturnApproved::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    /** @test */
    public function it_sends_an_email_when_return_is_rejected()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'completed']);
        $product = Product::factory()->create();
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price,
        ]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id, 'status' => 'pending']);
        $return->products()->attach($product->id, ['quantity' => 1]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.reject', $return->id));

        $response->assertStatus(302);

        Mail::assertSent(ReturnRejected::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    /** @test */
    public function it_sends_an_email_when_return_is_refunded()
    {
        Mail::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'status' => 'completed']);
        $product = Product::factory()->create();
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => $product->price,
        ]);
        $return = ReturnProduct::factory()->create(['order_id' => $order->id, 'status' => 'approved']);
        $return->products()->attach($product->id, ['quantity' => 1]);

        $this->actingAs($user);

        $response = $this->post(route('admin.returns.refund', $return->id));

        $response->assertStatus(302);

        Mail::assertSent(ReturnRefunded::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}

