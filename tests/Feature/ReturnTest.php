<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;
use App\Models\ReturnProduct;
use App\Models\RefundProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReturnAccepted;
use App\Mail\ReturnRejected;
use App\Mail\RefundProcessed;
use App\Events\ReturnAccepted1;
use App\Events\ReturnRejected1;
use App\Events\RefundProcessed1;

class ReturnTest extends TestCase
{
    use RefreshDatabase;

    public function testReturnApprovalMail()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $returnProduct = ReturnProduct::factory()->create(['order_id' => $order->id]);

        Mail::fake();

        event(new ReturnAccepted1($returnProduct));

        Mail::assertSent(ReturnAccepted::class, function ($mail) use ($returnProduct) {
            return $mail->returnProduct->id === $returnProduct->id;
        });
    }

    public function testReturnRejectionMail()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $returnProduct = ReturnProduct::factory()->create(['order_id' => $order->id]);

        Mail::fake();

        event(new ReturnRejected1($returnProduct));

        Mail::assertSent(ReturnRejected::class, function ($mail) use ($returnProduct) {
            return $mail->returnProduct->id === $returnProduct->id;
        });
    }

    public function testRefundProcessedMail()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $returnProduct = ReturnProduct::factory()->create(['order_id' => $order->id]);

        $refundProduct = RefundProduct::create([
            'return_product_id' => $returnProduct->id,
            'amount' => $order->total,
            'status' => 'processed',
        ]);

        Mail::fake();

        event(new RefundProcessed1($refundProduct));

        Mail::assertSent(RefundProcessed::class, function ($mail) use ($refundProduct) {
            return $mail->refund->id === $refundProduct->id;
        });
    }
}




