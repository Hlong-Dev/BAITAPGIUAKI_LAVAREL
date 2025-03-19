<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDangKy extends Model
{
    protected $table = 'ChiTietDangKy';
    protected $primaryKey = ['MaDK', 'MaHP'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['MaDK', 'MaHP'];

    public function dangKy()
    {
        return $this->belongsTo(DangKy::class, 'MaDK', 'MaDK');
    }

    public function hocPhan()
    {
        return $this->belongsTo(HocPhan::class, 'MaHP', 'MaHP');
    }
}