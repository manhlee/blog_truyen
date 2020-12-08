<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function load_change_infor()
    {
    	return view('admin.account.ChangeInfo');
    }
    public function post_change_infor(Request $req)
    {
    	$this->validate($req,
    	[
    		'email'=>'email|unique:users,email,'.session('admin')['id'],
    	],
    	[
    		'email.email'=>"Bạn chưa nhập đúng email!",
    		'email.unique'=>"Email bị trùng !"
    	]);

    	$user=User::find(session('admin')['id']);
    	$user->email=$req->email;
    	$old_pass=$req->old_pass;
    	$new_pass=$req->new_pass;
    	$pass_again=$req->pass_again;
    	if(!empty($old_pass)||!empty($new_pass)||!empty($pass_again))
    	{
    		$this->validate($req,
    			[
    				'new_pass'=>'required|max:10|min:6',
    			],
    			[
    				'new_pass.required'=>"Bạn mật khẩu mới không được bỏ trống !",
    				'new_pass.max'=>"Mật khẩu mới phải từ 6 tới 10 ký tự !",
    				'new_pass.min'=>"Mật khẩu mới phải từ 6 tới 10 ký tự"
    			]);

    		if(!Hash::check($old_pass,$user->password))
    		{
    			return redirect('admin/taikhoan/thaydoithongtin')->with('thongbao',"Mật khẩu cũ không đúng!");
    		}
    		if($new_pass!=$pass_again){
    			return redirect('admin/taikhoan/thaydoithongtin')->with('thongbao',"Mật khẩu xác nhận không đúng!");
    		}
    		$user->password=Hash::make($new_pass);
    	}
    	$user->save();
    	$user=User::find(session('admin')['id']);
    	Session::put('admin',$user);
    	return redirect('admin/taikhoan/thaydoithongtin')->with('thanhcong',"Thay đổi thông tin thành công!");

    }
    public function load_create_accout()
    {
    	return view('admin.account.CreateAccout');
    }
    public function post_create_accout(Request $req)
    {
    	$this->validate($req,
    		[
    			'username'=>'min:5|max:8|required|unique:users,name',
    			'email'=>'email|required|unique:users,email',
    			'password'=>'required|max:10|min:6',
    			'pass_again'=>'same:password',
    		]);
    	$user=new User();
    	$user->name=$req->username;
    	$user->level=$req->level;
    	$user->email=$req->email;
    	$user->password=Hash::make($req->password);
    	$user->save();
    	return redirect('admin/taikhoan/taotaikhoan')->with('thanhcong',"Tạo tài khoản thành công!");

    }
}
