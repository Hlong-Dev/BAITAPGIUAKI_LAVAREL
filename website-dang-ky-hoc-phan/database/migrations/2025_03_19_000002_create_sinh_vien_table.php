<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhVienTable extends Migration
{
    public function up()
    {
        Schema::create('SinhVien', function (Blueprint $table) {
            $table->char('MaSV', 10)->primary();
            $table->string('HoTen', 50);
            $table->string('GioiTinh', 5)->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('Hinh', 50)->nullable();
            $table->char('MaNganh', 4);
            $table->foreign('MaNganh')->references('MaNganh')->on('NganhHoc');
        });
    }

    public function down()
    {
        Schema::dropIfExists('SinhVien');
    }
}