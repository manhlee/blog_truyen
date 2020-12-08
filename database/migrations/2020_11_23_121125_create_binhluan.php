<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id();
            $table->longText('noidung');
            $table->foreignId('id_truyen');
            $table->foreignId('id_chuong');
            $table->foreignId('id_user');
            $table->foreign('id_truyen')->references('id')->on('truyen');
            $table->foreign('id_chuong')->references('id')->on('chuong');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('binhluan');
    }
}
