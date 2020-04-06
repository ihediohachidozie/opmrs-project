<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('national_id')->unique();
            $table->integer('profession');
            $table->integer('license');
            $table->integer('specialty');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('practitioners');
    }
}
