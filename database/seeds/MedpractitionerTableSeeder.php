<?php

use Illuminate\Database\Seeder;

class MedpractitionerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Medpractitioner::class, 10)->create();
    }
}
