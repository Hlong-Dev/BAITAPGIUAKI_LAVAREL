<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNganhHocTable extends Migration
{
    public function up()
    {
        Schema::create('NganhHoc', function (Blueprint $table) {
            $table->char('MaNganh', 4)->primary();
            $table->string('TenNganh', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('NganhHoc');
    }
}