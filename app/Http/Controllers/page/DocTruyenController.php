<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\truyen;
use App\Models\chuong;

class DocTruyenController extends Controller
{
    //
    public function load_read_chapter($id)
    {
    	$chuong=chuong::find($id);
    	$truyen=truyen::find($chuong->id_truyen);
    	$truyen->luotxem=$truyen->luotxem+1;
    	$truyen->save();
    	return view('page.doctruyen',['chuong'=>$chuong,'truyen'=>$truyen]);
    }
}
