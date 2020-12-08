<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truyen extends Model
{
    use HasFactory;
    protected $table="truyen";
    protected function theloaitruyen()
    {
    	return $this->belongsTo('App\Models\theloaitruyen','id_theloaitruyen','id');
    }
    protected function user()
    {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }
    protected function tacgia()
    {
    	return $this->belongsTo('App\Models\tacgia','id_tacgia','id');
    }
    protected function chuong()
    {
    	return $this->hasMany('App\Models\chuong','id_truyen','id');
    }
    protected function daxem()
    {
    	return $this->belongsTo('App\Models\daxem','id_truyen','id');
    }
    protected function binhluan()
    {
    	return $this->hasMany('App\Models\binhluan','id_truyen','id');
    }
}
