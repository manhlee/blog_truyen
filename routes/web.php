<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TheLoaiTruyenController;
use App\Http\Controllers\PhanTrangController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin/logout',[LoginController::class,'logout'])->name('logout');
Route::post('admin/login',[LoginController::class,'post_login'])->name('post_login');
Route::get('admin/login',[LoginController::class,'load_login'])->name('login_admin');
Route::group(['prefix'=>'admin','middleware' =>'AdminRole'],function(){
	Route::get('phantrang/{page_name}/{amount}',[PhanTrangController::class,'changePagi']);
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach',[TheloaiController::class,'list_category'])->name('list_cate');
		Route::get('themmoi',[TheloaiController::class,'load_add']);
		Route::post('themmoi',[TheloaiController::class,'post_add']);
		Route::get('sua/{id}',[TheloaiController::class,'load_edit']);
		Route::post('sua/{id}',[TheloaiController::class,'post_edit']);
		Route::get('xoa/{id}',[TheloaiController::class,'delete_cate']);
		Route::get('search',[TheloaiController::class,'search_live'])->name('search_cate');
	});
	Route::group(['prefix'=>'theloaitruyen'],function(){
		Route::get('danhsach',[TheLoaiTruyenController::class,'list_category_story']);
		Route::get('themmoi',[TheLoaiTruyenController::class,'load_add']);
		Route::post('themmoi',[TheLoaiTruyenController::class,'post_add'])->name('post-add-category-story');
		Route::get('sua/{id}',[TheLoaiTruyenController::class,'load_edit']);
		Route::post('sua/{id}',[TheLoaiTruyenController::class,'post_edit']);
		Route::get('xoa/{id}',[TheLoaiTruyenController::class,'delete_cate_story']);
		Route::get('search',[TheLoaiTruyenController::class,'search_live'])->name('search_cate_story');
	});
	Route::group(['prefix'=>'tacgia'],function(){
		Route::get('danhsach',[TacGiaController::class,'load_list']);
		Route::get('themmoi',[TacGiaController::class,'load_add']);
		Route::post('themmoi',[TacGiaController::class,'post_add']);
		Route::get('sua/{id}',[TacGiaController::class,'load_edit']);
		Route::post('sua/{id}',[TacGiaController::class,'post_edit']);
		Route::get('xoa/{id}',[TacGiaController::class,'delete_author']);
		Route::get('search',[TacGiaController::class,'search_live'])->name('search_author');
		});
	Route::group(['prefix'=>'truyen'],function(){
		Route::get('danhsach',[TruyenController::class,'load_list']);
		Route::get('themmoi',[TruyenController::class,'load_add']);
		Route::post('themmoi',[TruyenController::class,'post_add'])->name('add_story');
		Route::get('sua/{id}',[TruyenController::class,'load_edit']);
		Route::post('sua/{id}',[TruyenController::class,'post_edit']);
		Route::get('xoa/{id}',[TruyenController::class,'delete_story']);
		Route::get('search',[TruyenController::class,'search_live'])->name('search_story');
	});
	Route::get('dashboard',[DashboardController::class,'load_dashboard'])->name('dashboard');
	Route::group(['prefix'=>'taikhoan'],function(){
		Route::get('thaydoithongtin',[AccountController::class,'load_change_infor']);
		Route::post('thaydoithongtin',[AccountController::class,'post_change_infor'])->name('change_infor_admin');
		Route::get('taotaikhoan',[AccountController::class,'load_create_accout']);
		Route::post('taotaikhoan',[AccountController::class,'post_create_accout'])->name('create_account_admin');
	});
});
