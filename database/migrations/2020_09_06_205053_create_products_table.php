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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('stock');
            $table->bigInteger('quantity')->nullable();
            $table->decimal('actualPrice',12,2);
            $table->decimal('previousPrice',12,2);
            $table->integer('discountRate');
            $table->text('shortDescription');
            $table->text('longDescription');
            $table->string('state');
            $table->enum('status',['PUBLISHED','DRAFT'])->default('DRAFT');  
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
