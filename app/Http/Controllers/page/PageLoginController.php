<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageLoginController extends Controller
{
    //
     private static function get_data($username,$pass)
    {
    	$user=User::where('name','=',$username)->first();
    	if(!$user) return false;
    	//Hash::check($pass, $user->password)
    	if(Hash::check($pass, $user->password))
    	{
    		return $user;
    	}else{
    		return false;
    	}
    }
   public function post_login(Request $req)
   {

   		$user=$this->get_data($req->username,$req->pass);
    	if(!$user){
    		return redirect()->back()->with('thatbai','Đăng nhập thất bại!');
    	}else{
    		Session::put('user',$user);
    		return redirect()->back();// sua lai trang dau tien load khi login
    	}
   }
   public function logout()
   {
    
   		Session::forget('user');
   		return redirect()->back();
   }
   public function sign(Request $req)
   {
   		$this->validate($req,
   		[
   			'username'=>'required|max:10|min:6|unique:users,name',
   			'email'=>'required|email|unique:users,email',
   			'pass'=>'required|max:10|min:6',	
   		]);
   		$user= new User();
   		$user->name=$req->username;
   		$user->password=Hash::make($req->pass);
   		$user->level=1;
   		$user->email=$req->email;
   		$user->save();
   		return redirect()->back()->with('thanhcong','Đăng ký thành công vui lòng đăng nhập!');
   }
}
