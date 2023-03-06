<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->integer('cart_detail_id');
            $table->integer('user_id');
            $table->integer('pay_method_id');
            $table->integer('ship_id');
            $table->timestamps();
            $table->primary(['cart_detail_id', 'user_id']);
            $table->foreign('cart_detail_id')->references('id')->on('cart_details')
                ->onUpdate('restrict')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
