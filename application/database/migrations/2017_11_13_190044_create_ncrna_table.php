<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcrnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncrna', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('chromosome_id')->unsigned();
            $table->foreign('chromosome_id')->references('id')->on('chromosomes');
            $table->text('family');
            $table->integer('start');
            $table->integer('end');
            $table->text('type');
            $table->text('predictor');
            $table->boolean('covariance_model');
            $table->boolean('similarity');
            $table->boolean('transcript');
            $table->boolean('have_target_genes');
            $table->text('conserved_species');

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
        Schema::dropIfExists('ncrna');
    }
}
