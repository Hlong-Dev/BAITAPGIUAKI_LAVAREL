<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'SinhVien';
    protected $primaryKey = 'MaSV';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['MaSV', 'HoTen', 'GioiTinh', 'NgaySinh', 'Hinh', 'MaNganh'];

    public function nganhHoc()
    {
        return $this->belongsTo(NganhHoc::class, 'MaNganh', 'MaNganh');
    }

    public function dangKys()
    {
        return $this->hasMany(DangKy::class, 'MaSV', 'MaSV');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'MaSV', 'MaSV');
    }
}
