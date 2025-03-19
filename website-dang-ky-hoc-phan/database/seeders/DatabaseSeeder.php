<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            NganhHocSeeder::class,
            SinhVienSeeder::class,
            HocPhanSeeder::class,
            UserSeeder::class,
        ]);
    }
}