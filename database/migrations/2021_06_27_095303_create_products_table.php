<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('sale_price')->default(0);
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->enum('status', ['Active', 'Draft']);
            $table->unsignedFloat('weight')->nullable();
            $table->unsignedFloat('height')->nullable();
            $table->unsignedFloat('wedth')->nullable();
            $table->unsignedFloat('length')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->foreignId('category_id')->constrained('categories', 'id')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
