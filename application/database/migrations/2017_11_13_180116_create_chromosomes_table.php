<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChromosomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chromosomes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('gbid');
            $table->integer('number');
            $table->integer('organism_id')->unsigned();
            $table->foreign('organism_id')->references('id')->on('organisms');
            $table->string('description');
            $table->longText('sequence');
            $table->integer('size');

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
        Schema::dropIfExists('chromosomes');
    }
}
