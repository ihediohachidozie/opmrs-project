<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedpractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('medpractitioners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('profession');
            $table->string('license');
            $table->date('validity');
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
        Schema::dropIfExists('medpractitioners');
    }
}
