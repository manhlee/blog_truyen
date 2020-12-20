<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\truyen;

class trangchuController extends Controller
{
    //
    public function load_homepage()
    {	
    	$top_truyen=truyen::orderBy('luotxem', 'desc')->take(6)->get();
    	$truyen_moi=truyen::where('luotxem','=',0)->take(6)->get();
    	return view('page.trangchu',['top_truyen'=>$top_truyen,'truyen_moi'=>$truyen_moi]);
    }
}
