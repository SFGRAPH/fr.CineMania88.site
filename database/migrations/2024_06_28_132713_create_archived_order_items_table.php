<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('archived_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('archived_order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('archived_order_id')->references('id')->on('archived_orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('archived_order_items');
    }
}

