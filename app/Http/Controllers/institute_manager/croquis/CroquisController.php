<?php

namespace App\Http\Controllers\institute_manager\croquis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CroquisController extends Controller
{
    //

    public function index(){
        return  view('user.institute.croquis.croquis');
   
        

    }
}
