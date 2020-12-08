<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuong', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('tenkhongdau');
            $table->longText('noidung');
            $table->foreignId('id_truyen');
            $table->foreign('id_truyen')->references('id')->on('truyen');
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
        Schema::dropIfExists('chuong');
    }
}
