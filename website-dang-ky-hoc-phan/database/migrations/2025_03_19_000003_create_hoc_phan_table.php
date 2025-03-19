<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocPhanTable extends Migration
{
    public function up()
    {
        Schema::create('HocPhan', function (Blueprint $table) {
            $table->char('MaHP', 6)->primary();
            $table->string('TenHP', 30);
            $table->integer('SoTinChi');
            $table->integer('SoLuong')->default(30); // Thêm trường SoLuong theo yêu cầu Câu 6
        });
    }

    public function down()
    {
        Schema::dropIfExists('HocPhan');
    }
}