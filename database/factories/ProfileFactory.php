<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //  
        'user_id' => factory(App\User::class),
        'dob' => $faker->date,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'marital_status' => $faker->numberBetween(0,5),
        'religion' => $faker->numberBetween(0,4),
        'gender' => $faker->numberBetween(0,1),
        'blood_group' => $faker->numberBetween(0,3),
        'emg_name' => $faker->name,
        'emg_phone' => $faker->phoneNumber,
        'drug_allergies' => $faker->randomElement($array = array('Milk', 'Eggs', 'Celery', 'Mustard', 'Sesame', 'Soya', 'Nuts', 'Crustaceans', 'Fish', 'Peanuts', 'Lupin', 'Molluscs')),
        'food_allergies' => $faker->randomElement($array = array('Antibiotics', 'Aspirin', 'Ibuprogen', 'Carbamazepine', 'Lamotrigine', 'Trastuzumab', 'Ibritumomab', 'Paclitaxel', 'Docetaxel', 'Procarbazine')),
        'env_allergies' => $faker->randomElement($array = array('Pollen', 'Pet-dander', 'Mold', 'Cigrarette-Smoke')),
        'relationship' => $faker->numberBetween(0, 4)
    ];
});
