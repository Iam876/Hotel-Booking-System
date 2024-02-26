<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Facades\Hash;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            // For Admin Seeder
            [
            'name' => 'Md Ibrahim',
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => HASH::make('111'),
            'role' => 'admin',
            'status' => 'active'
            ],
            // For User Seeder
            [
                'name' => 'Md Masud',
                'username' => 'User',
                'email' => 'user@user.com',
                'password' => HASH::make('111'),
                'role' => 'user',
                'status' => 'active',
            ]
            ]);
    }
}
