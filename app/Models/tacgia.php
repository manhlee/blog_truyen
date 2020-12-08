<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tacgia extends Model
{
    use HasFactory;
    protected $table="tacgia";
    protected function truyen()
    {
    	return $this->hasMany('App\Models\truyen','id_tacgia','id');
    }
}
