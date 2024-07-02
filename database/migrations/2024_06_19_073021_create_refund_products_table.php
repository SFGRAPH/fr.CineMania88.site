<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundProductsTable extends Migration
{
    public function up()
    {
        Schema::create('refund_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('return_product_id');
            $table->decimal('amount', 8, 2);
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('return_product_id')->references('id')->on('return_products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('refund_products');
    }
}


