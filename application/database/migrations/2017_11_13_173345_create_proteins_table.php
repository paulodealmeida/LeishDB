<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProteinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proteins', function (Blueprint $table) {
            
            $table->string('id')->unique();
            $table->text('entry_name');
            $table->text('protein_name');
            $table->string('gene_name');
            $table->string('organism');
            $table->text('taxonomic_lineage')->nullable();
            $table->text('protein_family')->nullable();

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
        Schema::dropIfExists('proteins');
    }
}
