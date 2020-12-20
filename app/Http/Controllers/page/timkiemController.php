<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\truyen;
use DB;
class timkiemController extends Controller
{
    //
    public function find_story(Request $req)
    {
    	$key="%".$req->key."%";
    	$truyen=DB::table('truyen')
    	->join('tacgia','truyen.id_tacgia','=','tacgia.id')
    	->join('theloaitruyen','truyen.id_theloaitruyen','=','theloaitruyen.id')
    	->where('tentruyen','like',$key)
    	->orWhere('ten','like',$key)
    	->orWhere('tentheloai','like',$key)
    	->get();
    	return view('page.timkiem',['truyen'=>$truyen,'key'=>$req->key]);
    }
}
