<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\binhluan;
use App\Models\daxem;
use Illuminate\Support\Facades\Session;

class PageTruyenController extends Controller
{
    //
    public function detail_story($id)
    {
    	$truyen_chitiet=Truyen::find($id);
        if(Session::has('user'))
        {
            $check_daxem=daxem::where('id_truyen','=',$id)->where('id_user','=',session('user')['id'])->get();
            if(count($check_daxem)<1)
            {
                $truyen_daxem=new daxem();
                $truyen_daxem->id_truyen=$id;
                $truyen_daxem->id_user=session('user')['id'];
                $truyen_daxem->save();
            }
        }
    	return view('page.chitiettruyen',['truyen_chitiet'=>$truyen_chitiet]);
    }
    public function post_comment(Request $req)
    {
    	$this->validate($req,['comment'=>'required']);
    	$binhluan=new binhluan();
    	$binhluan->noidung=$req->comment;
        $binhluan->id_truyen=$req->id_truyen;
        $binhluan->id_user=$req->id_user;
        $binhluan->save();
        return redirect()->back();

    }
}
