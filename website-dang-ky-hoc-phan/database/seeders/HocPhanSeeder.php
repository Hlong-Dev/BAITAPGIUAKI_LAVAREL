<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocPhanSeeder extends Seeder
{
    public function run()
    {
        DB::table('HocPhan')->insert([
            ['MaHP' => 'CNTT01', 'TenHP' => 'Lập trình C', 'SoTinChi' => 3, 'SoLuong' => 30],
            ['MaHP' => 'CNTT02', 'TenHP' => 'Cơ sở dữ liệu', 'SoTinChi' => 2, 'SoLuong' => 30],
            ['MaHP' => 'QTKD01', 'TenHP' => 'Kinh tế vi mô', 'SoTinChi' => 2, 'SoLuong' => 30],
            ['MaHP' => 'QTDK02', 'TenHP' => 'Xác suất thống kê 1', 'SoTinChi' => 3, 'SoLuong' => 30],
        ]);
    }
}