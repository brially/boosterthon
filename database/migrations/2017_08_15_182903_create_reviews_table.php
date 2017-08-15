<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fundraiser_id', false, true);
            $table->integer('user_id', false, true);
            $table->text('comments');
            $table->integer('stars', false, true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fundraiser_id')->references('id')->on('fundraisers');


            $table->unique(['user_id', 'fundraiser_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
