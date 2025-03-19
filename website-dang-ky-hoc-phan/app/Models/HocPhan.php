<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    protected $table = 'HocPhan';
    protected $primaryKey = 'MaHP';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['MaHP', 'TenHP', 'SoTinChi', 'SoLuong'];

    public function chiTietDangKys()
    {
        return $this->hasMany(ChiTietDangKy::class, 'MaHP', 'MaHP');
    }
}