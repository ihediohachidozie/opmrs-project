<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Practitional;
use Faker\Generator as Faker;

$factory->define(Practitional::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->unique()->numberBetween(2,10),
        'license' => $faker->ean8,
        'valid' => $faker->date,
        'profession' => $faker->unique()->numberBetween(0,3)
    ];
});
