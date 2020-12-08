<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    use HasFactory;
    protected $table="binhluan";
    protected function truyen()
    {
    	return $this->belongsTo('App\Models\truyen','id_truyen','id');
    }
    protected function chuong()
    {
    	return $this->belongsTo('App\Models\chuong','id_chuong','id');
    }
    protected function user()
    {
    	return $this->belongsTo('App\Models\User','id_user','id');
   	}
}
