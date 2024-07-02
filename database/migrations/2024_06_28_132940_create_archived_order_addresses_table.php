<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedOrderAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('archived_order_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('archived_order_id');
            $table->string('address_type');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->timestamps();

            $table->foreign('archived_order_id')->references('id')->on('archived_orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('archived_order_addresses');
    }
}

