<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_carts', function (Blueprint $table) {
            $table->id();
            $table->string('hash');
            $table->unsignedBigInteger('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            $table->string('discount_coupon', 255)->nullable();
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
        Schema::table('product_carts', function (Blueprint $table) {
            $table->dropForeign(['product_variant_id']);
        });

        Schema::dropIfExists('product_carts');
    }
}
