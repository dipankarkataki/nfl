<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@4teamfantasy.com',
            'role' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
