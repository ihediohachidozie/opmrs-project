<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('drug_allergies')->nullable();
            $table->string('food_allergies')->nullable();
            $table->string('env_allergies')->nullable();
            $table->string('emg_name')->nullable();
            $table->string('emg_phone')->nullable();
            $table->integer('relationship')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
