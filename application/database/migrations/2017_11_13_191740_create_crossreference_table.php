<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crossreference', function (Blueprint $table) {

            $table->string('protein_id');
            $table->foreign('protein_id')->references('id')->on('proteins');
            $table->integer('database_id')->unsigned();
            $table->foreign('database_id')->references('id')->on('databases');
            $table->string('reference_id');
            $table->integer('gene_id')->unsigned();
            $table->foreign('gene_id')->references('id')->on('genes');

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
        Schema::dropIfExists('crossreference');
    }
}
