<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medpractitioner;
use Faker\Generator as Faker;

$factory->define(Medpractitioner::class, function (Faker $faker) {
    return [
        'profession' => $faker->numberBetween(0,3),
        'license' => $faker->ean13,
        'validity' => $faker->date
    ];
});
