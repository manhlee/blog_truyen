<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhanTrangController extends Controller
{
    //
       public function changePagi($PageName,$amount)
    {   
        Session::put('paginate', $amount);
        $link_prev="admin/".$PageName."/danhsach";
        return redirect($link_prev);
    }
}
