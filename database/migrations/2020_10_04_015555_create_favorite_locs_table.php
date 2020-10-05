<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoriteLocs', function (Blueprint $table) {
            $table->bigIncrements('favLocID');
            $table->bigInteger('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->bigInteger('locationID')->unsigned();
            $table->foreign('locationID')->references('locationID')->on('locations');
            $table->string('title');
            $table->integer('rating')->default(0);
            $table->text('comment');
            $table->binary('iamges1')->nullable();
            $table->binary('iamges2')->nullable();
            $table->binary('iamges3')->nullable();
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
        Schema::dropIfExists('favoriteLocs');
    }
}
