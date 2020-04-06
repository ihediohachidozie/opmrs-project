<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('othernames')->nullable();
            $table->string('country');
            $table->string('tin')->unique();
            $table->string('state');
            $table->string('lga');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('contact_phone')->nullable();
            $table->string('emg_phone1')->nullable();
            $table->string('emg_phone2')->nullable();
            $table->string('postal')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('hospitals');
    }
}
