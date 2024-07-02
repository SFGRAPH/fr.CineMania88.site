<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('image_path')->nullable();
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('genres_id')->constrained('genres')->onDelete('cascade');
            $table->foreignId('actors_id')->constrained('actors')->onDelete('cascade');
            $table->foreignId('directors_id')->constrained('directors')->onDelete('cascade');
            $table->foreignId('sagas_id')->nullable()->constrained('sagas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

