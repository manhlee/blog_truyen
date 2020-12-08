<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuong extends Model
{
    use HasFactory;
    protected $table="chuong";
    protected function truyen()
    {
    	return $this->belongsTo('App\Models\truyen','id_truyen','id');
    }
    protected function binhluan()
    {
    	return $this->hasMany('App\Models\binhluan','id_chuong','id');
    }
}
