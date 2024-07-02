<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\ArchivedOrder;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use App\Models\ArchivedOrderItem;
use App\Models\ArchivedOrderAddress;
use Carbon\Carbon;
use DB;

class ArchiveOrders extends Command
{
    protected $signature = 'orders:archive';
    protected $description = 'Archive orders based on specific criteria';

    public function handle()
    {
        // Pour tester, nous allons utiliser un délai plus court
        $date = Carbon::now()->subDay(); // Pour tester avec 1 jour

        $orders = Order::where(function($query) {
                            $query->where('status', 'shipped')
                                  ->orWhere('status', 'canceled');
                        })
                        ->where('updated_at', '<', $date)
                        ->get();

        foreach ($orders as $order) {
            DB::transaction(function () use ($order) {
                // Create the archived order
                $archivedOrder = ArchivedOrder::create([
                    'user_id' => $order->user_id,
                    'status' => $order->status,
                    'total' => $order->total,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at,
                    'completed_at' => $order->status === 'shipped' ? $order->updated_at : null,
                    'canceled_at' => $order->status === 'canceled' ? $order->updated_at : null,
                ]);

                // Transfer order items
                foreach ($order->items as $item) {
                    ArchivedOrderItem::create([
                        'archived_order_id' => $archivedOrder->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at,
                    ]);
                }

                // Transfer order addresses
                foreach ($order->addresses as $address) {
                    ArchivedOrderAddress::create([
                        'archived_order_id' => $archivedOrder->id,
                        'address_type' => $address->address_type,
                        'address' => $address->address,
                        'city' => $address->city,
                        'state' => $address->state,
                        'postal_code' => $address->postal_code,
                        'country' => $address->country,
                        'created_at' => $address->created_at,
                        'updated_at' => $address->updated_at,
                    ]);
                }

                // Delete the original order
                $order->delete();
            });
        }

        $this->info('Orders archived successfully!');
    }
}





