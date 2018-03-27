<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_product_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned()->nullable()->index();
            $table->string('name')->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_product_lists');
    }
}


//$table->string('product_name')->nullable();
//$table->string('supplier')->nullable();
//$table->string('supplier_ref')->nullable();
//$table->string('product_ref')->nullable();
//$table->string('color')->nullable();
//$table->string('quantity')->nullable();
//$table->integer('wholesale_price')->nullable();
//$table->integer('price_inc_tax')->nullable();
//$table->integer('regular_price_inc_tax')->nullable();
//$table->integer('in_store')->nullable();