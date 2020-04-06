<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'System',
            'middlename' => 'System',
            'lastname' => 'Admin',
            'phone' => '08011223344',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'national_id' => 11223344,
            'image' => null,
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
