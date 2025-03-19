<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietDangKyTable extends Migration
{
    public function up()
    {
        Schema::create('ChiTietDangKy', function (Blueprint $table) {
            $table->integer('MaDK')->unsigned();
            $table->char('MaHP', 6);
            $table->primary(['MaDK', 'MaHP']);
            $table->foreign('MaDK')->references('MaDK')->on('DangKy');
            $table->foreign('MaHP')->references('MaHP')->on('HocPhan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ChiTietDangKy');
    }
}