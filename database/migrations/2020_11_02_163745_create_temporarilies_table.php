<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporariliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporarilies', function (Blueprint $table) {
            $table->bigIncrements('tmpID');
            $table->bigInteger('favLocID')->unsigned();
            $table->foreign('favLocID')->references('favLocID')->on('favoriteLocs');
            $table->string('name');
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
        Schema::dropIfExists('temporarilies');
    }
}
