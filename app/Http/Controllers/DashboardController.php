<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\truyen;

class DashboardController extends Controller
{
    //
     public function __construct()
    {
       if(!Session::has('paginate'))
       {
       		Session::put('paginate', 2);
       }
    }
    public function load_dashboard()
    {
    	$truyen=truyen::all();
      $top_truyen=truyen::orderBy('luotxem', 'desc')->take(4)->get();
    	$count_story=$truyen->count();
    	return view('admin.Dashboard.trangchu',['count_story'=>$count_story,'top_truyen'=>$top_truyen]);
    }
    public function reload_login()
    {
      return redirect()->route('dashboard');
    }
}
