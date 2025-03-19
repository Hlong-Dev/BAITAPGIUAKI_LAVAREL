<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhHoc extends Model
{
    protected $table = 'NganhHoc';
    protected $primaryKey = 'MaNganh';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['MaNganh', 'TenNganh'];

    public function sinhViens()
    {
        return $this->hasMany(SinhVien::class, 'MaNganh', 'MaNganh');
    }
}