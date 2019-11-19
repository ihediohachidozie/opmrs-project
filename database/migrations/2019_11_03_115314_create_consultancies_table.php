<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('bp')->nullable();
            $table->integer('pulse')->nullable();
            $table->integer('temp')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('nurse_id')->nullable();
            $table->integer('xcase')->nullable();
            $table->string('complain')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('consultancies');
    }
}
