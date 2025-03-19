<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NganhHocSeeder extends Seeder
{
    public function run()
    {
        DB::table('NganhHoc')->insert([
            ['MaNganh' => 'CNTT', 'TenNganh' => 'Công nghệ thông tin'],
            ['MaNganh' => 'QTKD', 'TenNganh' => 'Quản trị kinh doanh'],
        ]);
    }
}