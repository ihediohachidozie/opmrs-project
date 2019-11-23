<?php

use Illuminate\Database\Seeder;

class DependentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Dependent::class, 5)->create();
    }
}
