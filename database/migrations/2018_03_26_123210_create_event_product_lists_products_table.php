<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventProductListsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_product_lists_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_id')->unsigned()->nullable()->index();
            $table->string('product_name')->nullable();
            $table->string('supplier')->nullable();
            $table->string('supplier_ref')->nullable();
            $table->string('product_ref')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->integer('wholesale_price')->nullable();
            $table->integer('price_inc_tax')->nullable();
            $table->integer('regular_price_inc_tax')->nullable();
            $table->integer('is_active')->nullable();
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('event_product_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_product_lists_products');
    }
}
