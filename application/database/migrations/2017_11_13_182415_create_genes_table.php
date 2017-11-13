<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('start');
            $table->integer('end');
            $table->string('strand');
            $table->integer('chromosome_id')->unsigned();
            $table->foreign('chromosome_id')->references('id')->on('chromosomes');
            $table->integer('size');
            $table->string('protein_id');
            $table->foreign('protein_id')->references('id')->on('proteins');

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
        Schema::dropIfExists('genes');
    }
}
