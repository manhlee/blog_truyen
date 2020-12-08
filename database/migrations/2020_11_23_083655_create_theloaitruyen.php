<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheloaitruyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theloaitruyen', function (Blueprint $table) {
            $table->id();
            $table->string('tentheloai')->unique();
            $table->string('tenkhongdau')->nullable();
            $table->foreignId('theloaicha')->nullable();
            $table->foreign('theloaicha')->references('id')->on('theloai');
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
        Schema::dropIfExists('theloaitruyen');
    }
}
