<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('address_type'); // 'billing' or 'shipping'
            $table->string('address'); // Numéro et rue
            $table->string('city');
            $table->string('postal_code');
            $table->string('department')->nullable(); // Département (optionnel)
            $table->string('country'); // Pays
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_addresses');
    }
}
