<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyen', function (Blueprint $table) {
            $table->id();
            $table->string('tentruyen');
            $table->string('tenkhongdau');
            $table->string('gioithieu')->nullable();
            $table->tinyInteger('trangthai')->default(1);
            $table->string('hinhanh');
            $table->foreignId('user_id');
            $table->foreignId('id_theloaitruyen');
            $table->foreignId('id_tacgia');
            $table->bigInteger('luotxem');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_tacgia')->references('id')->on('tacgia');
            $table->foreign('id_theloaitruyen')->references('id')->on('theloaitruyen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyen');
    }
}
