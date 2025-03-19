<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('Users')->insert([
            [
                'username' => '0123456789',
                'password' => Hash::make('password'),
                'MaSV' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '9876543210',
                'password' => Hash::make('password'),
                'MaSV' => '9876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}