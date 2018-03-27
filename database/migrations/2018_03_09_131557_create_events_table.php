<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('event_category_id')->unsigned()->nullable()->index();
            $table->integer('event_channel_id')->unsigned()->nullable()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('cascade');
            $table->foreign('event_channel_id')->references('id')->on('event_channels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
