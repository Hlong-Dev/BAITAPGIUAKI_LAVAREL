<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKyTable extends Migration
{
    public function up()
    {
        Schema::create('DangKy', function (Blueprint $table) {
            $table->increments('MaDK');
            $table->date('NgayDK')->nullable();
            $table->char('MaSV', 10);
            $table->foreign('MaSV')->references('MaSV')->on('SinhVien');
        });
    }

    public function down()
    {
        Schema::dropIfExists('DangKy');
    }
}