<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('adtype'); // 1 for feature ads 2 for Buzz in town
            $table->integer('price');
            $table->string('package_name');
            $table->string('file_name'); //payment receipt
            $table->string('buzzintownmenu')->nullable();
            $table->integer('payment_status')->default(0); // 0 pending, 1 accpeted, 2 rejected
            $table->integer('ad_status')->default(0); // 0 pending, 1 publish, 2 completed
            $table->integer('restaurant_id');
            $table->integer('days');
            $table->dateTime('ad_date')->nullable();
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
        Schema::dropIfExists('ads_requests');
    }
}
