<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->text('description');
            $table->string('color_code', 50);
            $table->string('color_name', 50);
            $table->string('model', 50);
            $table->decimal('price', 10, 2);
            $table->decimal('promotional_price', 10, 2)->nullable();
            $table->string('voltage',12)->nullable();
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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('product_variants');
    }
}
