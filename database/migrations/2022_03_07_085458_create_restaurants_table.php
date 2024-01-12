<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->string('location');
            $table->string('area');
            $table->string('home_delivery');
            $table->integer('user_id');
            $table->integer('isfeature')->default(0);
            $table->string('description')->nullable();
            $table->string('area');
            $table->string('breakfast');
            $table->string('hitea');
            $table->string("cellno");
            $table->string('lunch_buffet');
            $table->string('dinner_buffet');
            $table->string("brunch_menu");
            $table->string('alacate');
            $table->string('lat');
            $table->string('lng');
            $table->string('slug');
            $table->integer('publish')->default(0);
            $table->string("contact")->nullable();
            $table->integer('count')->default(0);




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
        Schema::dropIfExists('restaurants');
    }
}
