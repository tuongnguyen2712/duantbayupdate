<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sanphamchitiet');
        Schema::dropIfExists('sanpham');
        Schema::dropIfExists('danhmuc');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('role');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('danhmuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('img',255)->nullable();
            $table->boolean('loai');
            $table->timestamps();
        });
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('iddanhmuc');
            $table->unsignedInteger('idthuonghieu');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('img',255);
            $table->unsignedInteger('soluotmua')->default(0);
            $table->unsignedInteger('tonkho');
            $table->double('dongia',10,0);
            $table->string('mota',255);
            $table->longText('noidung');
            $table->unsignedInteger('giamgia')->nullable();
            $table->boolean('trangthai')->default(1)->nullable();
            $table->foreign('iddanhmuc')->references('id')->on('danhmuc');
            $table->timestamps();
        });


        // Schema::create('sanphamchitiet', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('idsanpham');
        //     $table->unsignedInteger('soluotmua')->default(0);
        //     $table->unsignedInteger('tonkho');
        //     $table->double('dongia',10,0);
        //     $table->foreign('idsanpham')->references('id')->on('sanpham');
        //     $table->timestamps();
        // });

     Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::enableForeignKeyConstraints();
    }
};
