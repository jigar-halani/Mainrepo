<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CardImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_image', function (Blueprint $table) {
            $table->increments('card_image_id');
            $table->integer('cards_id')->unsigned();
            $table->foreign('cards_id')->references('cards_id')->on('cards')->onDelete('cascade');
            $table->string('image');
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
        Schema::drop('card_image');
    }
}
