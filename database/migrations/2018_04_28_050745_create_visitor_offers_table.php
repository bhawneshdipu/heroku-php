<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('definition_id');
            $table->string('api_password');
            $table->string('notification_tel');
            $table->string('transaction_type');
            $table->string('product_title');
            $table->string('category');
            $table->integer('quantity');
            $table->string('product_url');
            $table->string('product_id');
            $table->string('variant');
            $table->string('offer_price');
            $table->boolean('matched')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_offers');
    }
}
