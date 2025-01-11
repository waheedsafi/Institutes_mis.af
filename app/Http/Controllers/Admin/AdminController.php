<?php

namespace App\Http\Controllers\Admin;

use view;
use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\component\HttpFoundation\Response;


class AdminController extends Controller
{
    //
    public function index(){
    //   $admin = Auth::guard('user')->user()
        // echo "welcome".' <a href="' .route('adminlogout').'">logout</a>';
        $sesid=session('userid');
     //   $admin=DB::table('admin')->where('Uid','=',$sesid)->get();
        return view('admin.admindashboard');
       
    }

}
