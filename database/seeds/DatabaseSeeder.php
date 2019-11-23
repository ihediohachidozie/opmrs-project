<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ProfileTableSeeder::class]);
        $this->call([DependentTableSeeder::class]);
        $this->call([PractitionerTableSeeder::class]);
        //factory(\App\User::class, 10)->create();
    }
}
