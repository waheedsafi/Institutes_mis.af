<?php

namespace App\Http\Controllers\role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\userController;

class permission extends Controller
{
    //
public function adduser(){
    $data = DB::table('roles')->join('users','role','=','roles.id')->where('users.id', session()->get('userid'))->get()->first();
 
    if($data->role_name== 'admin' ){


    }
    else{
        return 'faild you can not add user';
    }


    }
}
