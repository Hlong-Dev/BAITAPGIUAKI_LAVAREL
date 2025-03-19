<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SinhVienSeeder extends Seeder
{
    public function run()
    {
        DB::table('SinhVien')->insert([
            [
                'MaSV' => '0123456789',
                'HoTen' => 'Nguyễn Văn A',
                'GioiTinh' => 'Nam',
                'NgaySinh' => '2000-02-12',
                'Hinh' => '/Content/images/sv1.jpg',
                'MaNganh' => 'CNTT'
            ],
            [
                'MaSV' => '9876543210',
                'HoTen' => 'Nguyễn Thị B',
                'GioiTinh' => 'Nữ',
                'NgaySinh' => '2000-07-03',
                'Hinh' => '/Content/images/sv2.jpg',
                'MaNganh' => 'QTKD'
            ],
        ]);
    }
}