<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
    public function logout()
    {
    	Session::forget('admin');
    	return redirect()->route('login_admin');
    }
    public function load_login()
    {
    	return view('admin.login');
    }
    private static function get_data($username,$pass)
    {
        $arr_level ="2,3";
        $arr_level = explode(',', $arr_level);
    	$user=User::where('name','=',$username)->whereIn('level',$arr_level)->first();
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
    		return redirect()->route('login_admin')->with('thatbai','Đăng nhập thất bại!');
    	}else{
    		Session::put('admin',$user);
    		return redirect()->route('dashboard');// sua lai trang dau tien load khi login
    	}
    }
}
