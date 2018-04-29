<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellToAniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_to_anies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('definition_id');
            $table->string('api_password');
            $table->string('notification_email_id');
            $table->string('transaction_type');
            $table->integer('quantity');
            $table->string('product_or_service');
            $table->string('category');
            $table->string('parameter1');
            $table->string('parameter2');
            $table->string('parameter3');
            $table->string('parameter4');
            $table->string('parameter5');
            $table->string('parameter6');
            $table->string('parameter7');
            $table->string('seller_price');
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
        Schema::dropIfExists('sell_to_anies');
    }
}
