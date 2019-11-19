<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labtests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consultancy_id');
            $table->string('test_sample')->nullable();
            $table->string('test_required')->nullable();
            $table->string('test_result')->nullable();
            $table->integer('lab_tech_id')->nullable();
            $table->integer('doctor_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('labtests');
    }
}
