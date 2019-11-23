<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dependent;
use Faker\Generator as Faker;

$factory->define(Dependent::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween(2,10),
        'name' => $faker->name,
        'dob' => $faker->date,
        'relationship' => $faker->numberBetween(0,3)
    ];
});
