<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('archived_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->decimal('total', 8, 2);
            $table->timestamps(); // created_at, updated_at
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();

            // Add any other relevant fields

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('archived_orders');
    }
}
