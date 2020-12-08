<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theloaitruyen extends Model
{
    use HasFactory;
    protected $table="theloaitruyen";
    protected function theloai()
    {
    	return $this->belongsTo('App\Models\theloai','theloaicha','id');
    }
    protected function truyen()
    {
    	return $this->hasMany('App\Models\truyen','id_theloaitruyen','id');
    }
}
