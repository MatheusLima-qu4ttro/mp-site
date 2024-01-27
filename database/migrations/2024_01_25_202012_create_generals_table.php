<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('logo_path');
            $table->string('company_description', 255);
            $table->string('facebook_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();
            $table->string('tiktok_url', 255)->nullable();
            $table->string('address', 255);
            $table->string('email', 255);
            $table->string('whatsapp', 255);
            $table->text('terms_and_conditions');
            $table->text('lgpd');
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
        Schema::dropIfExists('generals');
    }
}
