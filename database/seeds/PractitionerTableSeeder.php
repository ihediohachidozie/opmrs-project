<?php

use Illuminate\Database\Seeder;

class PractitionerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Practitional::class, 4)->create();
    }
}
