<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function index(){
        

        
        // $user = User::find($userId);
     
        dd(hasPermissionTo('view-student'));


    }
}
