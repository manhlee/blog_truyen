<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    use HasFactory;
    protected $table="theloai";
    protected function theloaitruyen()
    {
    	return $this->hasMany('App\Models\theloaitruyen','theloaicha','id');
    }
    protected function truyen()
    {
    	return $this->hasManyThrough('App\Models\truyen','App\Models\theloaitruyen');
    }
}
