<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivedOrderIdToOrderAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('order_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('archived_order_id')->nullable()->after('order_id');
            $table->foreign('archived_order_id')->references('id')->on('archived_orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_addresses', function (Blueprint $table) {
            $table->dropForeign(['archived_order_id']);
            $table->dropColumn('archived_order_id');
        });
    }
}
