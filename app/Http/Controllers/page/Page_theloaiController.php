<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\truyen;
use App\Models\theloaitruyen;

class Page_theloaiController extends Controller
{
    //
    public function find_cate($id)
    {
    	$theloaitruyen=theloaitruyen::find($id);
    	$truyen=truyen::where('id_theloaitruyen','=',$id)->get();
    	return view('page.tim_theotheloai',['truyen'=>$truyen,'theloaitruyen'=>$theloaitruyen]);
    }
}
