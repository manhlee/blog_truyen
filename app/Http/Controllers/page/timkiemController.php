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
        ->join('theloai','theloaitruyen.theloaicha','=','theloai.id')
    	->where('truyen.tentruyen','like',$key)
    	->orWhere('tacgia.ten','like',$key)
    	->orWhere('theloaitruyen.tentheloai','like',$key)
        ->orWhere('theloai.tentheloai','like',$key)
    	->select('truyen.id','truyen.tentruyen','truyen.tenkhongdau','truyen.hinhanh','truyen.luotxem','tacgia.ten')
        ->get();
    	return view('page.timkiem',['truyen'=>$truyen,'key'=>$req->key]);
    }
}
