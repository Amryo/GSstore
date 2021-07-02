<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //string 
            $table->string('slug')->unique(); //For SEO ^__^
            $table->text('description')->nullable();
            //$table->unsignedBigInteger('parent_id')->nullable();
            $table->string('image')->nullable();
            //$table->foreignId()->nullabe()->constrained('categories','id');
            $table->foreignId('parent_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->enum('status', ['Active', 'Draft']);
            $table->timestamps();
        });

        //  Restrict    -----> (default) 
        //  Cascade     -----> If Remove Father ,the Parent was Deleted.
        //  Set Null (nullOnDelete)   -----> If Remove Father ,the Parent was Null .notice : the record should be nullable() .^_^
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
